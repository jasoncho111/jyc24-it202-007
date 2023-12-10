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

$atable = ["data" => $associated, "title" => "Users Who Visited"];
?>

<div class="container-fluid">
    <?php render_table($ctable); ?>
    <br>
    <?php render_table($atable); ?>
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