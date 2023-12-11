<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

$db = getDB();
$totalquery = "SELECT COUNT(country_name) total FROM Countries WHERE country_name NOT IN (SELECT country_name FROM CountriesVisited)";
$stmt = $db->prepare($totalquery);
$total = 0;
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($results) {
        $total = $results[0]["total"];
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$query = "SELECT id, country_name Country, capital Capital, population Population FROM Countries WHERE country_name NOT IN (SELECT country_name FROM CountriesVisited) AND 1=1";
$sname = "";
$scap = "";
$slim = 10;
$params = [];
if(isset($_GET["name"]) && isset($_GET["capital"]) && isset($_GET["lim"])) {
    $sname = se($_GET, "name", "", false);
    $scap = se($_GET, "capital", "", false);
    $slim = se($_GET, "lim", 10, false);

    if(!empty($sname)) {
        $query .= " AND country_name LIKE :name";
        $params[":name"] = "%$sname%";
    }
    if(!empty($scap)) {
        $query .= " AND capital LIKE :cap";
        $params[":cap"] = "%$scap%";
    }
    if($slim < 1 || $slim > 100) {
        flash("Limit filter must be between 1 and 100 inclusive", "warning");
        $slim = 10;
    }
}

$query .= " LIMIT $slim";

$stmt = $db->prepare($query);

$countries = [];
try {
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($results) {
        $countries = $results;
    }
    else {
        flash("No matches found", "warning");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$persisted = http_build_query($_GET);
$table = ["data" => $countries, "view_url" => "../view_country.php", "persist" => $persisted,"from_query" => "noassoc"];
?>

<div class="container-fluid">
    <h4>Unassociated Data</h4>
    <form method="GET">
        <?php render_input(["type" => "search", "name" => "name", "label" => "Country Name", "placeholder" => "Name Filter", "value"=>$sname]);/*lazy value to check if form submitted, not ideal*/ ?>
        <?php render_input(["type" => "search", "name" => "capital", "label" => "Country Capital", "placeholder" => "Capital Filter", "value"=>$scap]); ?>
        <?php render_input(["type" => "number", "name" => "lim", "label" => "Max results per page", "placeholder" => "Limit", "value"=>$slim, "rules" => ["required" => true, "min" => 1, "max" => 100]]); ?>
        <?php render_button(["text" => "Search", "type" => "submit", "color" => "primary"]); ?>
    </form>

    <h6>Total countries not visited: <?php se($total); ?><br>
    Countries shown: <?php se(count($countries)); ?></h6>
    <?php render_table($table); ?>

</div>

<script>
    //change id header to caps
    let head = document.querySelector("th");
    head.innerHTML = head.innerHTML.toUpperCase();
</script>

<?php
require_once(__DIR__ . "/../../../partials/flash.php");
?>