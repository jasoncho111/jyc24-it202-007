<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

$rapidapihost = "geography4.p.rapidapi.com";


$cname = "";
$pullfromapi = false;
if(isset($_POST["name"])) {
    $cname = se($_POST, "name", "", false);
    if(empty($cname)) flash("Name field is required", "warning");
    else if(!preg_match('/^[a-zA-Z]+(([\-\s]|[\.][\s]?)[a-zA-Z]+[\.]?)*$/', $cname)) flash("Country name must match regex: `/^[a-zA-Z]+(([\-\s]|[\.][\s]?)[a-zA-Z]+)*$/`", "warning");
}
//GET COUNTRIES URL = "https://geography4.p.rapidapi.com/apis/geography/v1/country"
// United States
//GET COUNTRIES BY NAME URL = "https://geography4.p.rapidapi.com/apis/geography/v1/country/name/$cname?$data"

/*
$result = get("https://geography4.p.rapidapi.com/apis/geography/v1/country/name/taiwan", "COUNTRY_API_KEY", ["limit" => 10, "sortOrder" => "asc", "sortBy" => "name"], true, $rapidapihost);
$status = se($result, "status", 400, false);
if ($status == 200) {
    $response = $result["response"];
}
*/
?>

<div class="container-fluid">
    <h1>Manual API Pull</h1>
    <p>Pull country data from API based on country name</p>
    <form method="POST">
        <?php render_input(["type" => "text", "id" => "name", "name" => "name", "label" => "Name", "rules" => ["required" => true]]) ?>
        <?php render_button(["text" => "Pull from API", "type" => "submit", "color" => "primary"]) ?>
    </form>
</div>

<style>
    p {margin: left 7px;}
</style>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>