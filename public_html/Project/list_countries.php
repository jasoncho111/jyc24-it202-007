<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<h1>Countries List</h1>

<?php render_button(["type" => "button", "color" => "primary", "text" => "Generate Countries"]) ?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>