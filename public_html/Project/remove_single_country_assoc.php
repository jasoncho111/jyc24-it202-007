<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$id = get_user_id();

$country = "";
if(isset($_GET["Country"])) {
    $country = $_GET["Country"];
    unset($_GET["Country"]);
}

$persisted = http_build_query($_GET);

if(empty($country)) {
    flash("Country was not set (trying to access the page manually?)", "warning");
    redirect("profile.php?$persisted#tableScroll");
}

$query = "DELETE FROM CountriesVisited WHERE userid=$id AND country_name=:name";
$db = getDB();
$stmt = $db->prepare($query);
try{
    $stmt->execute([":name" => $country]);
    flash("Successfully country $country from countries visited", "success");
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}
redirect("profile.php?$persisted#tableScroll");

require_once(__DIR__ . "/../../partials/flash.php");
