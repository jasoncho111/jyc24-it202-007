<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

$id = -1;
$persisted = "";
if(isset($_GET["id"])) {
    $id = se($_GET, "id", -1, false); 
    //unset so we don't accidentally persist id
    unset($_GET["id"]);
}

$persisted = http_build_query($_GET);

if($id < 1) {
    flash("Entity does not exist: ID = $id", "warning");
    redirect("list_countries.php?$persisted");
}

$country = [];

$db = getDB();
$stmt = $db->prepare("SELECT id, country_name, capital, currency_name, is_independent, is_un_member, population, is_real, from_api, is_active FROM Countries WHERE id=$id");
$errorflag = false;
try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result) $country = $result[0];
    else {
        flash("Entity does not exist: ID = $id", "warning");
        redirect("list_countries.php?$persisted");
    }
} catch (PDOException $e) {
    $errorflag = true;
    flash(var_export($e->errorInfo, true), "danger");
}

$languages = [];

if(!$errorflag) {
    $cname = $country["country_name"];

    $stmt = $db->prepare("SELECT language FROM CountryLanguages WHERE country_name=:cname");
    try {
        $stmt->execute([":cname" => $cname]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result) $languages = $result;
        else $languages = [];
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }
}

var_export($country);
echo "<br>";
var_export($languages);
?>

<div class="container-fluid">
    <h4>Edit country</h4>
    <form method="POST">
        <?php render_input(["type" => "text", "label" => "ID", "value" => "$id", "rules" => ["disabled" => true, "required" => true]]) ?>
        <?php render_input(["type" => "text", "id" => "name", "name" => "name", "label" => "Name", "value" => "preload", "rules" => ["required" => true]]) ?>
        <?php render_button(["text" => "Update Country", "type" => "submit", "color" => "primary"]) ?>
    </form>
    <br>
    <br>
    <h4>Other actions</h4>
    <?php echo "<a href=" . get_url("list_countries.php?$persisted") . " class=\"btn btn-primary\">Back To Country List</a>" ?><br><br>
    <?php echo "<a href=" . get_url("view_country.php?id=$id") . " class=\"btn btn-primary\">Detailed View</a>" ?>
    <?php echo "<a href=" . get_url("admin/delete_country.php?id=$id") . " class=\"btn btn-danger\">Delete</a>" ?>
    <br><br><br>
</div>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>