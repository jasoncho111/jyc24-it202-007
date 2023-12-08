<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}
?>

<div class="container-fluid">
    <h1>Admin Country User Association Actions</h1>
    <br>
    <a href="assoc_user_country.php" class="btn btn-primary">Associate Users to Countries</a>
    <br>
    <br>
    <?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}
?>

<div class="container-fluid">
    <h1>Admin Country User Association Actions</h1>
    <br>
    <a href="assoc_user_country.php" class="btn btn-primary">Associate Users to Countries</a>
    <br>
    <br>
    <a href="all_user_country_assocs.php" class="btn btn-primary">View All Associated Users and Countries</a>
    <br>
    <br>
    <p>More options may eventually be added.</p>
</div>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>
    <p>More options may eventually be added.</p>
</div>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>