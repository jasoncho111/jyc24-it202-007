<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

//DELETES MUST HAPPEN FIRST 

//MAP USERS TO THEIR IDS
$query = "SELECT "
// $query = "SELECT V.country_name Country, GROUP_CONCAT(' ', U.username) Users, A.`Total Users` FROM `CountriesVisited` V, Users U, 
//             (SELECT V.country_name, COUNT(U.username) `Total Users` FROM CountriesVisited V, Users U WHERE V.userid=U.id GROUP BY V.country_name) A 
//             WHERE V.country_name=A.country_name AND V.userid=U.id AND U.username LIKE '%a%' GROUP BY V.country_name LIMIT 0,100";

$totalquery = "SELECT COUNT(DISTINCT country_name) total FROM CountriesVisited";
$total = 0;
$db = getDB();
$stmt = $db->prepare($totalquery);
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($results) {
        $total = $results[0]["total"];
    }
    else $total = 0;
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$query = "SELECT V.country_name Country, GROUP_CONCAT(' ', U.username) Users, COUNT(U.username) `Total Users` FROM CountriesVisited V, Users U WHERE V.userid=U.id";
$scname = "";
$suname = "";
$slim = 10;
$params = [];
$delquery = "DELETE FROM CountriesVisited WHERE 1=1";
$filtered = false;
if(isset($_GET["cname"]) && isset($_GET["username"]) && isset($_GET["lim"])) {
    $scname = $_GET["cname"];
    $suname = $_GET["username"];
    $slim = $_GET["lim"];

    if($slim < 1 || $slim > 100) {
        $slim = 10;
        flash("Limit filter must be between 1 and 100 inclusive", "warning");
    }

    $query = "SELECT V.country_name Country, GROUP_CONCAT(' ', U.username) Users, A.`Total Users` FROM `CountriesVisited` V, Users U, 
                 (SELECT V.country_name, COUNT(U.username) `Total Users` FROM CountriesVisited V, Users U WHERE V.userid=U.id GROUP BY V.country_name) A 
                 WHERE V.country_name=A.country_name AND V.userid=U.id";

    if(!empty($scname)) {
        $query .= " AND V.country_name LIKE :cname";
        $delquery .= " AND country_name LIKE :cname";
        $params[":cname"] = "%$scname%";
        $filtered = true;
    }
    if(!empty($suname)) {
        $query .= " AND U.username LIKE :username";
        $delquery .= "TBD";
        $params[":username"] = "%$suname%";
        $filtered = true;
    }
}
$query .= " GROUP BY V.country_name ORDER BY V.country_name ASC LIMIT $slim";

$stmt = $db->prepare($query);
$data = [];
try{
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($results) {
        $data = $results;
    }
    else {
        flash("No matches found", "warning");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$table = ["data" => $data];
?>

<div class="container-fluid">
    <h4>View Countries Visited by Users</h4>

    <form method="GET">
        <?php render_input(["type" => "search", "name" => "cname", "label" => "Country Name", "placeholder" => "Country Filter", "value"=>$scname]);/*lazy value to check if form submitted, not ideal*/ ?>
        <?php render_input(["type" => "search", "name" => "username", "label" => "Username", "placeholder" => "Username Filter", "value"=>$suname]); ?>
        <?php render_input(["type" => "number", "name" => "lim", "label" => "Max results per page", "placeholder" => "Limit", "value"=>$slim, "rules" => ["required" => true, "min" => 1, "max" => 100]]); ?>
        <?php render_button(["text" => "Search", "type" => "submit", "color" => "primary"]); ?>
    </form>

    <br>
    <h6>Total countries associated: <?php se($total); ?><br>
    Total countries shown: <?php se(count($data)); ?></h6>
    <?php render_table($table); ?>
</div>


<?php
require(__DIR__ . "/../../../partials/flash.php");
?>