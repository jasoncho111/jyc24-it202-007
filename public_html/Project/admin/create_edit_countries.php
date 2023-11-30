<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect("home.php");
}
?>

<h1>Create or Edit Country</h1>
<small>Note: If the country name already exists, its data will be updated instead of creating a new country.</small>

<form method="POST">
    
</form>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>