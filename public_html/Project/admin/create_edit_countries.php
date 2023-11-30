<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect("home.php");
}
?>

<div class="container-fluid">
    <h1>Create or Edit Country</h1>
    <small>Note: If the country name already exists, its data will be updated instead of creating a new country.</small>
    <br>

    <form method="POST">
        <?php render_input(["type" => "text", "id" => "name", "name" => "name", "label" => "Name", "rules" => ["required" => true]]) ?>
        <?php render_input(["type" => "text", "id" => "capital", "name" => "capital", "label" => "Capital", "rules" => ["required" => true]]) ?>
        <?php render_input(["type" => "text", "id" => "currency", "name" => "currency", "label" => "Currency", "rules" => ["required" => true]]) ?>
        <?php render_input(["type" => "number", "id" => "independent", "name" => "independent", "label" => "Is independent (0 = false, 1 = true)", "rules" => ["min" => 0, "max" => 1, "required" => true], "value" => 1]) ?>
        <?php render_input(["type" => "number", "id" => "un", "name" => "un-member", "label" => "Is UN Member (0 = false, 1 = true)", "rules" => ["min" => 0, "max" => 1, "required" => true], "value" => 1]) ?>
        <?php render_input(["type" => "number", "id" => "population", "name" => "population", "label" => "Population", "rules" => ["min" => 0, "max" => 10000000000, "required" => true]]) ?>
        <?php render_input(["type" => "number", "id" => "real", "name" => "is-real", "label" => "Is a real country (0 = false, 1 = true)", "rules" => ["min" => 0, "max" => 1, "required" => true], "value" => 1]) ?>
        <?php render_button(["text" => "Create Country", "type" => "submit", "color" => "primary"]) ?>
    </form>
</div>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>