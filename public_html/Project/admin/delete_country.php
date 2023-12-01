<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

$id = -1;
if(isset($_GET["id"])) $id = se($_GET, "id", -1, false);
if($id < 1) {
    flash("Entity does not exist: ID = $id", "warning");
    redirect("list_countries.php");
}

?>