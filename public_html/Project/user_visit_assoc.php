<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$key = "";
$intent = "";
$paramsNotSet = false;
if (isset($_GET["key"])) {
    $key = $_GET["key"];
    unset($_GET["key"]);
}
else {
    flash("Key is not set", "warning");
    $paramsNotSet = true;
}

if (isset($_GET["intent"])) {
    $intent = $_GET["intent"];
    unset($_GET["intent"]);
}
else {
    flash("Intent is not set", "warning");
    $paramsNotSet = true;
}

$persisted = http_build_query($_GET);
if ($paramsNotSet) redirect("list_countries.php?$persisted");

$userid = get_user_id();
$query = "";
if($intent == "add") {
    $query = "INSERT INTO CountriesVisited(userid, country_name) VALUES($userid, :country)";
}
else if ($intent == "del") {
    $query = "DELETE FROM CountriesVisited WHERE userid=$userid AND country_name=:country";
}

$db = getDB();
$stmt = $db->prepare($query);
try {
    $stmt->execute([":country" => $key]);
    flash("Successfully changed visitation status of $key", "success");
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

redirect("list_countries.php?$persisted#tableScroll");

require(__DIR__ . "/../../partials/flash.php");
?>