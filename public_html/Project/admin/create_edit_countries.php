<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect("home.php");
}

$name = "";
if (isset($_POST["name"]) && isset($_POST["capital"]) && isset($_POST["currency"]) && isset($_POST["independent"]) && 
    isset($_POST["un-member"]) && isset($_POST["population"]) && isset($_POST["is-real"])) {
        $name = $_POST["name"];
        $capital = $_POST["capital"];
        $currency = $_POST["currency"];
        $independent = $_POST["independent"];
        $un = $_POST["un-member"];
        $pop = $_POST["population"];
        $real = $_POST["is-real"];

        //form validation
        //jyc24 - 12/4/23
        if(empty($name) || empty($capital) || empty($currency)) flash("All fields are required", "warning");
        else if(!preg_match('/^[a-zA-Z]+(([\-\s]|[\.][\s]?)[a-zA-Z]+[\.]?)*$/', $name) || !preg_match('/^[a-zA-Z]+(([\-\s]|[\.][\s]?|[,][\s]?)[a-zA-Z]+[\.]?)*$/', $capital) || !preg_match('/^[a-zA-Z]+(([\-\s]|[\.][\s]?)[a-zA-Z]+[\.]?)*$/', $currency)) flash("Countries, capitals, and currencies must be alphabetical (hyphens permitted)", "warning");
        else if($un > 1 || $un < 0 || $independent < 0 || $independent > 1 || $real > 1 || $real < 0) flash("Independent, UN Member, and is real must have values between 0 and 1", "warning");
        else if($pop < 0) flash("Population must be positive", "warning");
        else { //validation passed
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO Countries (country_name, capital, currency_name, is_independent, is_un_member, population, is_real, from_api, is_active) VALUES(:name, :capital, :currency, :independent, :un, :pop, :real, 0, 1)");

            $update = false;
            try {
                $stmt->execute([":name" => $name, ":capital" => $capital, ":currency" => $currency, ":independent" => $independent, ":un" => $un, ":pop" => $pop, ":real" => $real]);
                flash("Successfully created new country '" . $name . "'", "success");
            } catch (PDOException $e) {
                if ($e->errorInfo[1] === 1062) {
                    $update = true;
                } else {
                    flash(var_export($e->errorInfo, true), "danger");
                }
            }

            if ($update) {
                $stmt = $db->prepare("UPDATE Countries SET capital=:capital, currency_name=:currency, is_independent=:independent, is_un_member=:un, population=:pop, is_real=:real WHERE country_name=:name");
                try {
                    $stmt->execute([":name" => $name, ":capital" => $capital, ":currency" => $currency, ":independent" => $independent, ":un" => $un, ":pop" => $pop, ":real" => $real]);
                    flash("Successfully updated existing country " . $name, "success");
                } catch (PDOException $e) {
                    flash(var_export($e->errorInfo, true), "danger");
                }
            }
        }
}
$langs = "";
if(isset($_POST["lang"]) && !empty($name)) {
    $langs = $_POST["lang"];
    if(empty($langs)) flash("No languages inserted"); //skip insert
    else if(!preg_match('/^[a-zA-Z]+(,[\s]?[a-zA-Z]+)*$/', $langs)) flash("Languages can only contain letters and must be separated by commas", "warning");
    else {
        $db = getDB();
        $query = "INSERT INTO CountryLanguages(country_name, language) VALUES";
        $langs = explode(",", $langs);
        //remove leading and trailing white space from new langs, remove duplicates
        for ($i = 0; $i < count($langs); $i++) $langs[$i] = trim($langs[$i]); 
        $langs = array_unique($langs);
        foreach($langs as $l) {
            $query .= "(\"" . $name . "\", \"" . $l . "\"), ";
        }
        //truncate final comma
        $query = substr($query, 0, strlen($query)-2);
        $stmt = $db->prepare($query);
        try {
            $stmt->execute();
            flash("Successfully inserted languages", "success");
        } catch (PDOException $e) {
            flash(var_export($e->errorInfo, true), "danger");
        }
    }
}
?>

<div class="container-fluid">
    <h1>Create or Edit Country</h1>
    <small>Note: If the country name already exists, its data will be updated instead of creating a new country.</small>
    <br>

    <form method="POST">
        <?php render_input(["type" => "text", "id" => "name", "name" => "name", "label" => "Name", "rules" => ["required" => true]]) ?>
        <?php render_input(["type" => "text", "id" => "capital", "name" => "capital", "label" => "Capital", "rules" => ["required" => true]]) ?>
        <?php render_input(["type" => "text", "id" => "currency", "name" => "currency", "label" => "Currency", "rules" => ["required" => true]]) ?>
        <?php render_input(["type" => "number", "id" => "independent", "name" => "independent", "label" => "Is independent (0 = false, 1 = true)", "rules" => ["min" => 0, "max" => 1, "required" => true], "value" => 1]) ?>
        <?php render_input(["type" => "number", "id" => "un", "name" => "un-member", "label" => "Is UN Member (0 = false, 1 = true)", "rules" => ["min" => 0, "max" => 1, "required" => true], "value" => 1]) ?>
        <?php render_input(["type" => "number", "id" => "population", "name" => "population", "label" => "Population", "rules" => ["min" => 0, "max" => 10000000000, "required" => true]]) ?>
        <?php render_input(["type" => "number", "id" => "real", "name" => "is-real", "label" => "Is a real country (0 = false, 1 = true)", "rules" => ["min" => 0, "max" => 1, "required" => true], "value" => 1]) ?>
        <?php render_input(["type" => "text", "id" => "lang", "name" => "lang", "label" => "Optional: Languages spoken (comma-separated list)"]) ?>
        <?php render_button(["text" => "Create Country", "type" => "submit", "color" => "primary"]) ?>
    </form>
</div>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>