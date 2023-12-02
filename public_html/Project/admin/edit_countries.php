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
//once form is submitted
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
        if(empty($name) || empty($capital) || empty($currency)) flash("All fields are reqiuired", "warning");
        else if(!preg_match('/^[a-zA-Z][a-zA-Z\-\s\.]*$/', $name) || !preg_match('/^[a-zA-Z][a-zA-Z\-\s\.]*$/', $capital) || !preg_match('/^[a-zA-Z][a-zA-Z\-\s\.]*$/', $currency)) flash("Countries, capitals, and currencies must be alphabetical (hyphens permitted)", "warning");
        else if($un > 1 || $un < 0 || $independent < 0 || $independent > 1 || $real > 1 || $real < 0 || $active > 1 || $active < 0) flash("Independent, UN Member, is real, and is active must have a value of either 1 or 0", "warning");
        else if($pop < 0) flash("Population must be positive", "warning");
        else {//validation passed
            $stmt = $db->prepare("UPDATE Countries SET country_name=:name, capital=:capital, currency_name=:currency, is_independent=:independent, is_un_member=:un, population=:pop, is_real=:real, is_active=:active WHERE id=$id");
            try {
                $stmt->execute([":name" => $name, ":capital" => $capital, ":currency" => $currency, ":independent" => $independent, ":un" => $un, ":pop" => $pop, ":real" => $real, ":active" => $active]);
                flash("Successfully updated country ID=" . $id, "success");
            } catch (PDOException $e) {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
}

if(isset($_POST["lang"])) {
    $lang = $_POST["lang"];
    if(empty($lang)) { //remove all instances from table
        //TODO
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

    $stmt = $db->prepare("SELECT language FROM CountryLanguages WHERE country_name=:cname");
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
        $lstring .= $l["language"] . ", ";
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
        <?php render_input(["type" => "text", "id" => "lang", "name" => "lang", "label" => "Optional: Languages spoken (comma-separated list)", "value" => $lstring]) ?>
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