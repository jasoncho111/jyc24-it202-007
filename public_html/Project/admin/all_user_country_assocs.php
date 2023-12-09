<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

//DELETES MUST HAPPEN FIRST 

$db = getDB();

// $query = "SELECT V.country_name Country, GROUP_CONCAT(' ', U.username) Users, A.`Total Users` FROM `CountriesVisited` V, Users U, 
//             (SELECT V.country_name, COUNT(U.username) `Total Users` FROM CountriesVisited V, Users U WHERE V.userid=U.id GROUP BY V.country_name) A 
//             WHERE V.country_name=A.country_name AND V.userid=U.id AND U.username LIKE '%a%' GROUP BY V.country_name LIMIT 0,100";

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
        //create mapping first to map users to ids
        $mappingquery = "SELECT id, username FROM Users WHERE username LIKE :username";
        $stmt = $db->prepare($mappingquery);
        $users = [];
        try {
            $stmt->execute([":username" => "%$suname%"]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($results) {
                foreach($results as $user) {
                    $users[$user["username"]] = $user["id"];
                }
            }
        } catch (PDOException $e) {
            flash(var_export($e->errorInfo, true), "danger");
        }

        $query .= " AND U.username LIKE :username";

        if(count($users) > 0) {
            $delquery .= " AND (";
            foreach($users as $id) {
                $delquery .= "userid=$id OR ";
            }
            $delquery = substr($delquery, 0, strlen($delquery)-4);
            $delquery .= ")";
        }

        $params[":username"] = "%$suname%";
        $filtered = true;
    }
}

//DELETE GOES HERE
//CHECK POST VARIABLE DELETE=TRUE
if (isset($_POST["delete"])) {
    $delete = $_POST["delete"];
    unset($_POST["delete"]);
    if($delete == "true") {
        $stmt = $db->prepare($delquery);
        try{
            $stmt->execute([":cname" => "%$scname%"]);
            flash("Successfully deleted all associations shown", "success");
        } catch (PDOException $e) {
            flash(var_export($e->errorInfo, true), "danger");
        }
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

$totalquery = "SELECT COUNT(DISTINCT country_name) total FROM CountriesVisited";
$total = 0;
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
    <?php if ($filtered) : ?>
        <form method="POST">
            <input type="hidden" name="delete" value="true" />
            <?php render_button(["text" => "Delete all entries shown", "type" => "submit", "color" => "primary"]); ?>
        </form>
    <?php endif; ?>
</div>


<?php
require(__DIR__ . "/../../../partials/flash.php");
?>