<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Home</h1>
<p>This is the home page for the countries database and guessing game.</p>
<br>
<p><a href="guess_the_country.php" class="btn btn-primary">Click here</a> to proceed to the game</p>
<?php

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>