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
$stmt = $db->prepare("SELECT id ID, country_name Country, capital Capital, currency_name Currency, is_independent Independent, is_un_member `United Nations Member`, population Population, is_real `Is real`, from_api `From API`, is_active Active, created Created, modified Modified FROM Countries WHERE id=$id");
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

$stmt = $db->prepare("SELECT language Language, L.created Created, L.modified Modified FROM CountryLanguages L, Countries C WHERE C.id=$id AND L.country_name = C.country_name");
$languages = [];
try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result) $languages = $result;
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$ltable = ["data" => $languages];
?>

<div class="container-fluid">
    <h4>Country entity</h4>
    <?php render_table($ctable) ?>
    <br>
    <br>
    <h4>Languages spoken</h4>
    <?php render_table($ltable) ?>
    <br>
    <br>
    <h4>Other actions</h4>
    <?php echo "<a href=" . get_url("list_countries.php") . " class=\"btn btn-primary\">Go back</a>" ?>
    <?php if(has_role("Admin")) : ?>
        <?php echo "<a href=" . get_url("admin/edit_countries.php?id=$id") . " class=\"btn btn-secondary\">Edit</a>" ?>
        <?php echo "<a href=" . get_url("admin/delete_country.php?id=$id") . " class=\"btn btn-danger\">Delete</a>" ?>
    <?php endif; ?>
</div>

<script>
    //replace 1 and 0 with true and false in table
    let d = document.querySelectorAll("td");
    let ind = [4, 5, 7, 8, 9];
    for(let i = 0; i < 5; i++) {
        if(d[ind[i]].innerHTML == 1) d[ind[i]].innerHTML = "True";
        else if (d[ind[i]].innerHTML == 0) d[ind[i]].innerHTML = "False";
    }
    
</script>