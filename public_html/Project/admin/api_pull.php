<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

//COUNTRY API HOST: geography4.p.rapidapi.com
?>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>