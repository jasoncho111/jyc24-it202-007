<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}
?>

<h1>Manual API Pull</h1>
<br>
<a href="api_pull_by_name.php" class="btn btn-primary">Associate Users to Countries</a>
<br>
<br>
<p>More options may eventually be added.</p>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>