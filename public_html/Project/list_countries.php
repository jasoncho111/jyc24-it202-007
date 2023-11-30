<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$query = "SELECT country_name, capital, population, FROM Countries";
$sname = "";
$scap = "";
$slim = 10;
if(isset($_POST["name"]) || isset($_POST["capital"])) {
    $query .= " WHERE ";
    if(isset($_POST["name"])) {
        $sname = se($_POST, "name", "", false);
        $query .= "country_name LIKE '%$sname%', ";
    }
    if(isset($_POST["capital"])) {
        $scap = se($_POST, "capital", "", false);
        $query .= "capital LIKE '%$scap%'";
    }

    $query = substr($query, 0, strlen($query) -2);
}
if(isset($_POST["lim"])) {
    $slim = se($_POST, "lim", "", false);
}
$query .= " LIMIT $slim";

if($slim < 1 || $slim > 100) flash("Limit filter must be between 1 and 100 inclusive", "warning");
else {
    ;
}
?>




<div class="containeer-fluid">
    <h1>Countries List</h1>
    <p style="margin-left:7px">Filter by:</p>
    <form method="POST">
        <?php render_input(["type" => "search", "name" => "name", "label" => "Country Name", "placeholder" => "Name Filter", "value"=>$sname]);/*lazy value to check if form submitted, not ideal*/ ?>
        <?php render_input(["type" => "search", "name" => "capital", "label" => "Country Capital", "placeholder" => "Capital Filter", "value"=>$scap]); ?>
        <?php render_input(["type" => "number", "name" => "lim", "label" => "Max Results", "placeholder" => "Limit", "value"=>$slim, "rules" => ["required" => true, "min" => 1, "max" => 100]]) ?>;
        <p style="margin-left: 7px">Order by:</p>
        <?php render_input(["type" => "radio", "name" => "order", "label" => "Ascending", "value" => "asc", "rules" => ["checked" => true]]); ?>
        <?php render_input(["type" => "radio", "name" => "order", "label" => "Descending", "value" => "desc"]); ?>
        <?php render_button(["text" => "Search", "type" => "submit", "color" => "primary"]); ?>
    </form>
</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>