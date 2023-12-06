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


require(__DIR__ . "/../../partials/flash.php");
?>