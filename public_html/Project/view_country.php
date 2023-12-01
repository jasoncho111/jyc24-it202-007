<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$id = -1;
if(isset($_GET["id"])) $id = se($_GET, "id", -1, false);
if($id < 1) {
    flash("Entity does not exist: ID = $id", "warning");
    redirect("list_countries.php");
}

$db = getDB();
$stmt = $db->prepare("SELECT id ID, country_name Country, capital Capital, currency_name Currency, is_independent Independent, is_un_member `United Nations Member`, population Population, is_real `Is real`, from_api `From API`, is_active Active, created, modified FROM Countries WHERE id=$id");
$country = [];
try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result) $country = $result;
    else {
        flash("Entity does not exist: ID = $id", "warning");
        redirect("list_countries.php");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$ctable = ["data" => $country];

$stmt = $db->prepare("SELECT language Language FROM CountryLanguages L, Countries C WHERE C.id=$id AND L.country_name = C.country_name");
$languages = [];
try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result) $languages = $result;
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$lstring = "";
foreach($languages as $arr) {
    $lstring .= $arr["Language"] . ", ";
}

$lstring = substr($lstring, 0, strlen($lstring)-2);
?>

<div class="container-fluid">
    <h4>Country entity</h4>
    <?php render_table($ctable) ?>
    <br>
    <br>
    <h4>Languages spoken</h4>
    <?php echo "<h6>$lstring</h6>" ?>
    <br>
    <br>
    <h4>Other actions</h4>
    <?php echo "<a href=" . get_url("admin/edit_countries.php") . " class=\"btn btn-secondary\">Edit</a>" ?>
    <?php echo "<a href=" . get_url("admin/delete_country.php") . " class=\"btn btn-danger\">delete</a>" ?>
</div>

<script>
    document.querySelectorAll("")
</script>