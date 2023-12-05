<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

$id = -1;
$persisted = "";
if(isset($_GET["id"])) {
    $id = se($_GET, "id", -1, false); 
    //unset so we don't accidentally persist id
    unset($_GET["id"]);
}

$persisted = http_build_query($_GET);

if($id < 1) {
    flash("Entity does not exist: ID = $id", "warning");
    redirect("list_countries.php?$persisted");
}

$country = [];

$db = getDB();

$name = "";
$updatesuccess = false;
//once form is submitted
//countries table
if (isset($_POST["name"]) && isset($_POST["capital"]) && isset($_POST["currency"]) && isset($_POST["independent"]) && 
    isset($_POST["un-member"]) && isset($_POST["population"]) && isset($_POST["is-real"])) {
        $name = $_POST["name"];
        $capital = $_POST["capital"];
        $currency = $_POST["currency"];
        $independent = $_POST["independent"];
        $un = $_POST["un-member"];
        $pop = $_POST["population"];
        $real = $_POST["is-real"];
        $active = $_POST["is-active"];

        //validation
        //jyc24 - 12/4/23
        if(empty($name) || empty($capital) || empty($currency)) flash("All fields are reqiuired", "warning");
        else if(!preg_match('/^[a-zA-Z]+(([\-\s]|[\.][\s]?)[a-zA-Z]+[\.]?)*$/', $name) || !preg_match('/^[a-zA-Z]+(([\-\s]|[\.][\s]?|[,][\s]?)[a-zA-Z]+[\.]?)*$/', $capital) || !preg_match('/^[a-zA-Z]+(([\-\s]|[\.][\s]?)[a-zA-Z]+[\.]?)*$/', $currency)) flash("Countries, capitals, and currencies must be alphabetical (hyphens permitted)", "warning");
        else if($un > 1 || $un < 0 || $independent < 0 || $independent > 1 || $real > 1 || $real < 0 || $active > 1 || $active < 0) flash("Independent, UN Member, is real, and is active must have a value of either 1 or 0", "warning");
        else if($pop < 0) flash("Population must be positive", "warning");
        else {//validation passed
            $stmt = $db->prepare("UPDATE Countries SET country_name=:name, capital=:capital, currency_name=:currency, is_independent=:independent, is_un_member=:un, population=:pop, is_real=:real, is_active=:active WHERE id=$id");
            try {
                $stmt->execute([":name" => $name, ":capital" => $capital, ":currency" => $currency, ":independent" => $independent, ":un" => $un, ":pop" => $pop, ":real" => $real, ":active" => $active]);
                flash("Successfully updated country ID=" . $id, "success");
                $updatesuccess = true;
            } catch (PDOException $e) {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
}

//countrylanguages table
if(isset($_POST["lang"]) && $updatesuccess) {
    $lang = $_POST["lang"];
    if(empty($lang)) { //remove all instances from table
        $stmt = $db->prepare("DELETE FROM CountryLanguages WHERE country_name=:name");
        try {
            $stmt->execute([":name" => $name]);
            flash("Successfully updated languages spoken for country id=$id, name=$name", "success");
        } catch (PDOException $e) {
            flash(var_export($e->errorInfo, true), "danger");
        }
    }
    else if(!preg_match('/^[a-zA-Z]+(,[\s]?[a-zA-Z]+)*$/', $lang)) flash("Languages can only contain letters and must be separated by commas", "warning");
    else {
        $newlanglist = explode(",", $lang);
        //remove any leading white space from new lang list languages
        for ($i = 0; $i < count($newlanglist); $i++) $newlanglist[$i] = trim($newlanglist[$i]);
        $newlanglist = array_unique($newlanglist);
        $oldlanglist = [];
        //get existing languages in db
        $stmt = $db->prepare("SELECT language FROM CountryLanguages WHERE country_name=:name");
        $languages = [];
        try {
            $stmt->execute([":name" => $name]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result) $languages = $result;
        } catch (PDOException $e) {
            flash(var_export($e->errorInfo, true), "danger");
        }

        foreach($languages as $l) {
            array_push($oldlanglist, $l["language"]);
        }

        //if new language does not already exist in table, add it to table
        $query = "INSERT INTO CountryLanguages(country_name, language) VALUES"; 
        foreach($newlanglist as $l) {
            $l = trim($l);
            if (!in_array($l, $oldlanglist)) $query .= "(\"" . $name . "\", \"" . $l . "\"), ";
        }
        //truncate final comma
        if(str_ends_with($query, ", ")) {
            $query = substr($query, 0, strlen($query)-2);
            $stmt = $db->prepare($query);
            try {
                $stmt->execute();
                flash("Successfully added new languages spoken for country id=$id, name=$name", "success");
            } catch (PDOException $e) {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
        //if old language not in new language list, remove from table
        if(!empty($oldlanglist)) {
            $query = "DELETE FROM CountryLanguages WHERE country_name=:name AND (";
            foreach($oldlanglist as $l) {
                if(!in_array($l, $newlanglist)) {
                    $query .= "language=\"$l\" OR ";
                }
            }
            if(str_ends_with($query, " OR ")) $query = substr($query, 0, strlen($query)-4);
            $query .= ")";
            if(!str_ends_with($query, "()")) {
                $stmt = $db->prepare($query);
                try {
                    $stmt->execute([":name" => $name]);
                    flash("Successfully removed old languages spoken for country id=$id, name=$name", "success");
                } catch (PDOException $e) {
                    flash(var_export($e->errorInfo, true), "danger");
                }
            }
        }
    }
}

//preload form
$stmt = $db->prepare("SELECT id, country_name, capital, currency_name, is_independent, is_un_member, population, is_real, is_active FROM Countries WHERE id=$id");
$errorflag = false;
try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result) $country = $result[0];
    else {
        flash("Entity does not exist: ID = $id", "warning");
        redirect("list_countries.php?$persisted");
    }
} catch (PDOException $e) {
    $errorflag = true;
    flash(var_export($e->errorInfo, true), "danger");
}

$languages = [];

if(!$errorflag) {
    $cname = $country["country_name"];

    $stmt = $db->prepare("SELECT language Language FROM CountryLanguages WHERE country_name=:cname");
    try {
        $stmt->execute([":cname" => $cname]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result) $languages = $result;
        else $languages = []; //redundant
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }
}

$lstring = "";
if(!empty($languages)) {
    foreach ($languages as $l) {
        $lstring .= $l["Language"] . ", ";
    }
    $lstring = substr($lstring, 0, strlen($lstring) -2); //remove final comma
}
?>

<div class="container-fluid">
    <h4>Edit country</h4>
    <form method="POST">
        <?php render_input(["type" => "text", "label" => "ID", "value" => "$id", "rules" => ["disabled" => true, "required" => true]]) ?>
        <?php render_input(["type" => "text", "id" => "name", "name" => "name", "label" => "Name", "value" => $country["country_name"], "rules" => ["required" => true]]) ?>
        <?php render_input(["type" => "text", "id" => "capital", "name" => "capital", "label" => "Capital", "value" => $country["capital"], "rules" => ["required" => true]]) ?>
        <?php render_input(["type" => "text", "id" => "currency", "name" => "currency", "label" => "Currency", "value" => $country["currency_name"], "rules" => ["required" => true]]) ?>
        <?php render_input(["type" => "number", "id" => "independent", "name" => "independent", "label" => "Is independent (0 = false, 1 = true)", "value" => $country["is_independent"], "rules" => ["min" => 0, "max" => 1, "required" => true]]) ?>
        <?php render_input(["type" => "number", "id" => "un", "name" => "un-member", "label" => "Is UN Member (0 = false, 1 = true)", "value" => $country["is_un_member"], "rules" => ["min" => 0, "max" => 1, "required" => true]]) ?>
        <?php render_input(["type" => "number", "id" => "population", "name" => "population", "label" => "Population", "value" => $country["population"], "rules" => ["min" => 0, "max" => 10000000000, "required" => true]]) ?>
        <?php render_input(["type" => "number", "id" => "real", "name" => "is-real", "label" => "Is a real country (0 = false, 1 = true)", "value" => $country["is_real"], "rules" => ["min" => 0, "max" => 1, "required" => true]]) ?>
        <?php render_input(["type" => "number", "id" => "active", "name" => "is-active", "label" => "Is active (0 = false, 1 = true)", "value" => $country["is_active"], "rules" => ["min" => 0, "max" => 1, "required" => true]]) ?>

        <h4>Languages</h4>
        <?php render_table(["data" => $languages]); ?>
        <?php render_input(["type" => "text", "id" => "lang", "name" => "lang", "label" => "Languages spoken (comma-separated list)", "value" => $lstring]) ?>
        <?php render_button(["text" => "Update Country", "type" => "submit", "color" => "primary"]) ?>
    </form>
    <br>
    <br>
    <h4>Other actions</h4>
    <?php echo "<a href=" . get_url("list_countries.php?$persisted") . " class=\"btn btn-primary\">Back To Country List</a>" ?><br><br>
    <?php echo "<a href=" . get_url("view_country.php?id=$id") . " class=\"btn btn-primary\">Detailed View</a>" ?>
    <?php echo "<a href=" . get_url("admin/delete_country.php?id=$id&from=edit") . " class=\"btn btn-danger\">Delete</a>" ?>
    <br><br><br>
</div>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>