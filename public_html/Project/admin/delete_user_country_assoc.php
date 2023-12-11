<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

$country = "";
if(isset($_GET["Country"])) {
    $country = se($_GET, "Country", "", false);
    unset($_GET["Country"]);
}

$persisted = http_build_query($_GET);

if(empty($country)) {
    flash("Country parameter not set", "warning");
    redirect("admin/all_user_country_assocs.php?$persisted");
}

$db = getDB();
$stmt = $db->prepare("SELECT id `Country ID`, country_name Country, capital Capital, currency_name Currency, is_independent Independent, is_un_member `United Nations Member`, population Population, is_real `Is real`, from_api `From API`, is_active `Is active`, created Created, modified Modified FROM Countries WHERE country_name=:cname");
$countryentity = [];
try {
    $stmt->execute([":cname" => $country]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($results) {
        $countryentity = $results;
    }
    else {
        flash("Country $country does not exist", "warning");
        redirect("admin/all_user_country_assocs.php?$persisted");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}
$ctable = ["data" => $countryentity, "title" => "Country entity"];

//handle deletion of assocs
if(isset($_POST["submitted"]) && $_POST["submitted"] == "true") {
    $ids = [];
    if(isset($_POST["del"])) $ids = $_POST["del"];
    if(empty($ids)) flash("No entries were marked for deletion", "warning");
    else {
        $delquery = "DELETE FROM CountriesVisited WHERE country_name=:cname AND (";
        foreach($ids as $id) {
            $delquery .= "userid=$id OR ";
        }

        $delquery = substr($delquery, 0, strlen($delquery) -4) . ")";

        $stmt = $db->prepare($delquery);
        try {
            $stmt->execute([":cname" => $country]);
            flash("Marked associations succesfully deleted", "success");
        } catch (PDOException $e) {
            flash(var_export($e->errorInfo, true), "danger");
        }
    }
}


//get all associated users
$query = "SELECT U.id `User ID`, U.username Username, U.email Email, U.created `User Created`, U.modified `User Modified`, V.created `Association Created`, V.modified `Association Modified` FROM Users U, CountriesVisited V WHERE V.country_name=:cname AND U.id=V.userid";
$stmt = $db->prepare($query);
$associated = [];
try {
    $stmt->execute([":cname" => $country]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($results) {
        $associated = $results;
    }
    else {
        flash("Country $country has no users associated", "warning");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<div class="container-fluid">
    <?php render_table($ctable); ?>
    <br>
    <h3>Users Who Visited</h3>
    <form method="POST">
        <input type="hidden" name="submitted" value="true">
        <table class="table">
            <thead>
                <?php if(!empty($associated)) : ?>
                    <?php foreach(array_keys($associated[0]) as $k) : ?>
                        <th><?php se($k) ?></th>
                    <?php endforeach; ?>
                    <th>Delete Associations</th>
                <?php endif; ?>
            </thead>
            <?php if(!empty($associated)) : ?>
                <?php foreach($associated as $assoc) : ?>
                    <tr>
                        <?php foreach($assoc as $v) : ?>
                            <td><?php se($v) ?></td>
                        <?php endforeach; ?>
                        <td><input type="checkbox" name="del[]" value="<?php echo $assoc["User ID"]; ?>"><label for="del[]">Delete Association</label></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td>No records to show</td>
                </tr>
            <?php endif; ?>
        </table>
        <?php if(!empty($associated)) : ?>
            <?php render_button(["text" => "Delete Marked Associations", "type" => "submit", "color" => "danger"]) ?>
        <?php endif; ?>
    </form>
    <br>
    <br>

    <a href="<?php echo "all_user_country_assocs.php?$persisted" ?>" class="btn btn-primary">Go Back</a>
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

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>