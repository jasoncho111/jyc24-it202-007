<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$id = -1;
if(isset($_GET["id"])) $id = se($_GET, "id", -1, false);
if($id < 1) {
    flash("Entity does not exist: ID = $id", "warning");
    redirect("list_countries.php");
}
?>