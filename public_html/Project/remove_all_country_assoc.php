<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$id = get_user_id();
$persisted = http_build_query($_GET);

$query = "DELETE FROM CountriesVisited WHERE userid=$id";
$db = getDB();
$stmt = $db->prepare($query);
try{
    $stmt->execute();
    flash("Successfully removed all countries visited", "success");
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}
redirect("profile.php?$persisted#tableScroll");

require_once(__DIR__ . "/../../partials/flash.php");
