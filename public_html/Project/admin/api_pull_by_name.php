<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

$rapidapihost = "geography4.p.rapidapi.com";


$cname = "";
$offset = 0;
$records = [];
if(isset($_POST["name"]) && isset($_POST["offset"])) {
    $cname = se($_POST, "name", "", false);
    $offset = se($_POST, "offset", 0, false);
    if(empty($cname)) flash("Name field is required", "warning");
    else if(!preg_match('/^[a-zA-Z]+(([\-\s]|[\.][\s]?)[a-zA-Z]+[\.]?)*$/', $cname)) flash("Country name must match regex: '/^[a-zA-Z]+(([\-\s]|[\.][\s]?)[a-zA-Z]+[\.]?)*$/'", "warning");
    else if($offset < 0 || $offset > 1000) flash("Offset must have a value between 0 and 1000 inclusive", "warning");
    else { //validation success, pull from API
        $params = ["limit" => 10, "sortOrder" => "asc", "sortBy" => "name"];
        if($offset != 0) $params["offset"] = $offset;
        $result = get("https://geography4.p.rapidapi.com/apis/geography/v1/country/name/$cname", "COUNTRY_API_KEY", $params, true, $rapidapihost);
        $status = se($result, "status", 400, false);
        
        if ($status == 200) {
            $data_string = html_entity_decode(se($result, "response", "{}", false));
            $wrapper = "{\"data\":$data_string}";
            $data = json_decode($wrapper, true);

            if (!isset($data["data"])) flash("No matches found in API", "warning");
            else {
                $data = $data["data"];
                $records = map_data($data);
                
                $db = getDB();
                //pull old entries
                $stmt = $db->prepare("SELECT country_name cname FROM Countries WHERE is_real=1");
                $raw = [];

                try {
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if($results) $raw = $results;
                } catch (PDOException $e) {
                    flash(var_export($e->errorInfo, true), "danger");
                }

                $namelist = [];
                foreach($raw as $country) {
                    array_push($namelist, $country["cname"]);
                }

                //for all API countries not in DB list, insert new value into table
                $query = "INSERT INTO Countries(country_name, capital, currency_name, is_independent, is_un_member, population, from_api, is_active) VALUES";
                $languagequery = "INSERT INTO CountryLanguages(country_name, language) VALUES";
                foreach($records as $country) {
                    $name = $country["name"];
                    if(!in_array($name, $namelist)) {
                        $capital = $country["capital"];
                        $currency = $country["currency"];
                        $independent = $country["independent"];
                        $un = $country["un"];
                        $pop = $country["population"];
                        $langs = $country["languages"];

                        $query .= "('$name', '$capital', '$currency', $independent, $un, $pop, 1, 1), ";

                        //insert languages
                        foreach($langs as $lang) {
                            $languagequery .= "('$name', '" . $lang["name"] . "'), ";
                        }
                    }
                }
                //remove final comma
                if(str_ends_with($query, ", ")) $query = substr($query, 0, strlen($query) -2);
                if(str_ends_with($languagequery, ", ")) $languagequery = substr($languagequery, 0, strlen($languagequery) -2);

                //insert values
                $inserted = false;
                if(!str_ends_with($query, "VALUES")) { //if at least 1 value was inserted
                    $stmt = $db->prepare($query);
                    try {
                        $stmt->execute();
                        flash("Successfully inserted new countries into database", "success");
                        $inserted = true;
                    } catch (PDOException $e) {
                        flash(var_export($e->errorInfo, true), "danger");
                    }
                }

                if($inserted && !str_ends_with($languagequery, "VALUES")) {
                    $stmt = $db->prepare($languagequery);
                    try {
                        $stmt->execute();
                        flash("Successfully inserted new languages into database", "success");
                    } catch (PDOException $e) {
                        flash(var_export($e->errorInfo, true), "danger");
                    }
                }
            }
        }
    }
}
?>

<div class="container-fluid">
    <h1>Manual API Pull</h1>
    <p>Pull country data from API based on country name</p>
    <form method="POST">
        <?php render_input(["type" => "text", "id" => "name", "name" => "name", "label" => "Country Name", "value" => $cname, "rules" => ["required" => true]]) ?>
        <?php render_input(["type" => "number", "id" => "offset", "name" => "offset", "label" => "Search Offset (0 indexed)", "value" => $offset, "rules" => ["min" => 0, "max" => 1000]]) ?>
        <?php render_button(["text" => "Pull from API", "type" => "submit", "color" => "primary"]) ?>
    </form>
    <br>
    <br>
    <br>
    <?php if(!empty($records)) : ?>
        <h4>Records pulled from API</h4>
        <?php render_table(["data" => $records]); ?>
    <?php endif; ?>
</div>

<style>
    p {margin: left 7px;}
</style>

<script>
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    let heads = document.querySelectorAll("th");
    for (let i = 0; i < heads.length; i++) {
        let text = heads[i].innerHTML;
        if(text == "un") heads[i].innerHTML = toUpperCase(text);
        else heads[i].innerHTML = capitalizeFirstLetter(text);
    }

</script>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>