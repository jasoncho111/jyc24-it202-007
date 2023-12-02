<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

$id = -1;
$from = "";
if(isset($_GET["id"])) $id = se($_GET, "id", -1, false); 
if($id < 1) {
    flash("Entity does not exist: ID = $id", "warning");
    redirect("list_countries.php");
}

if(!isset($_GET["from"])) $from = "list_countries.php";
else if($_GET["from"] == "view") $from = "view_country.php?id=$id";
else if($_GET["from"] == "edit") $from = "admin/edit_countries.php?id=$id";

$db = getDB();
$stmt = $db->prepare("SELECT id ID, country_name Country, capital Capital, population Population FROM Countries WHERE id=$id");
$country = [];
try{
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

$table = ["data" => $country];

if(isset($_POST["deltype"])) {
    $deltype = $_POST["deltype"];
    if ($deltype == "soft") {
        $stmt = $db->prepare("UPDATE Countries SET is_active=0 WHERE id=$id");
        try {
            $stmt->execute();
            flash("Country successfully set to inactive", "success");
            redirect($from);
        } catch (PDOException $e) {
            flash(var_export($e->errorInfo, true), "danger");
        }
    }
    else if ($deltype == "full") {
        $cname = $country[0]["Country"];
        $success = false;
        $stmt = $db->prepare("DELETE FROM CountryLanguages WHERE country_name=:cname");
        try {
            $stmt->execute([":cname" => $cname]);
            flash("Language entries successfully deleted", "success");
            $success = true;
        } catch (PDOException $e) {
            flash(var_export($e->errorInfo, true), "danger");
        }
        if($success) {
            $stmt = $db->prepare("DELETE FROM Countries WHERE id=$id");
            try {
                $stmt->execute();
                flash("Country entry successfully deleted", "success");
                redirect("list_countries.php"); //on successful delete from DB, ID no longer exists so all prior pages would redirect to list_countries.php
            } catch (PDOException $e) {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
    }
}
?>

<div class="container-fluid">
    <h4>Delete this country?</h4>
    <?php render_table($table); ?>
    <form method="POST">
        <table>
            <tr>
                <td>Soft delete sets country as inactive (recoverable)</td>
                <td>Full delete removes country from database</td>
            </tr>
            <tr>
                <td class="deltype"><?php render_input(["type" => "radio", "name" => "deltype", "label" => "Soft Delete", "value" => "soft", "rules" => ["checked" => true]]); ?></td>
                <td class="deltype"><?php render_input(["type" => "radio", "name" => "deltype", "label" => "Full Delete", "value" => "full"]); ?></td>
            </tr>
        </table>
        <?php render_button(["text" => "Delete", "type" => "submit", "color" => "danger"]); ?>
    </form>
    <br>
    <br>
    <h4>Other actions</h4>
    <?php echo "<a href=" . get_url("list_countries.php") . " class=\"btn btn-primary\">Country List</a>" ?>
    <?php echo "<a href=" . get_url("view_country.php?id=$id") . " class=\"btn btn-primary\">Detailed View</a>" ?>
    <?php echo "<a href=" . get_url("admin/edit_countries.php?id=$id") . " class=\"btn btn-secondary\">Edit</a>" ?>
</div>

<style>
    .deltype {text-align: center;}
</style>