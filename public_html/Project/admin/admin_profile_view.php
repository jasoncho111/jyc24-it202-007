<?php
require_once(__DIR__ . "/../../../partials/nav.php");


if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

$db = getDB();
$user = "";
if (isset($_GET["user"])) {
    $user = $_GET["user"];
    unset($_GET["user"]);
}

$persisted = http_build_query($_GET);

if (empty($user)) {
    flash("User query was not set", "warning");
    redirect("admin/all_user_country_assocs.php?$persisted");
}

$stmt = $db->prepare("SELECT id ID, username Username, email Email, created Created, modified Modified FROM Users WHERE username=:name");
$data = [];
try {
    $stmt->execute([":name" => $user]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $data = $results;
    }
    else {
        flash("User $user not found", "warning");
        redirect("admin/all_user_country_assocs.php?$persisted");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}


//for countries visited filters
$total = 0;
$id = $data[0]["ID"];
$query = "SELECT COUNT(country_name) total FROM CountriesVisited WHERE userid=$id";
//get total countries associated
$stmt = $db->prepare($query);
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $total = $results[0]["total"];
    }
    else {
        flash("No matches found for total count", "warning"); //shouldn't ever be hit
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$query = "SELECT V.country_name Country, C.capital Capital, C.population Population FROM CountriesVisited V, Countries C WHERE V.userid=$id AND V.country_name=C.country_name";

$sname = "";
$slim = 10;
$scap = "";
$params = [];
if(isset($_POST["name"]) && isset($_POST["capital"]) && isset($_POST["lim"])) {
    $sname = $_POST["name"];
    $slim = $_POST["lim"];
    $scap = $_POST["capital"];

    if($slim < 1 || $slim > 100) {
        flash("Limit filter must be between 1 and 100 inclusive", "warning");
        $slim = 10;
    }

    if(!empty($sname)) {
        $query .= " AND V.country_name LIKE :name";
        $params[":name"] = "%$sname%";
    }
    if(!empty($scap)) {
        $query .= " AND C.capital LIKE :cap";
        $params[":cap"] = "%$scap%";
    }
}
$query .= " ORDER BY V.country_name ASC LIMIT $slim";

$stmt = $db->prepare($query);
$countries = [];
try {
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $countries = $results;
    }
    else {
        flash("No visited countries found", "warning");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$table = ["data" => $countries];
?>

<div class="container-fluid">
    <h4><?php echo $user; ?>'s Profile</h4>
    <?php render_table(["data" => $data]); ?>
    <br>
    <br>
    <h4 id="tableScroll">Countries Visited</h4>

    <form method="POST">
        <?php render_input(["type" => "search", "name" => "name", "label" => "Country Name", "placeholder" => "Name Filter", "value"=>$sname]);/*lazy value to check if form submitted, not ideal*/ ?>
        <?php render_input(["type" => "search", "name" => "capital", "label" => "Country Capital", "placeholder" => "Capital Filter", "value"=>$scap]); ?>
        <?php render_input(["type" => "number", "name" => "lim", "label" => "Max results per page", "placeholder" => "Limit", "value"=>$slim, "rules" => ["required" => true, "min" => 1, "max" => 100]]); ?>
        <?php render_button(["text" => "Search", "type" => "submit", "color" => "primary"]); ?>
    </form>

    <br>
    <h6>Total countries visited: <?php se($total); ?><br>
    Countries shown: <?php se(count($countries)); ?></h6>
    <?php render_table($table); ?>
    <a href="all_user_country_assocs.php?<?php echo $persisted ?>" class="btn btn-primary">Return to All Users Associations Page</a>
</div>

<script>
    function validate(form) {
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let username = form.username.value;
        const userRe = /^[a-z0-9_-]{3,16}$/;
        let isValid = true;
        //TODO add other client side validation....

        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (pw !== con) {
            flash("Password and Confirm password must match", "warning");
            isValid = false;
        }
        if (!userRe.test(username)) {
            flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
            isValid = false;
        }
        return isValid;
    }
</script>
<?php
require_once(__DIR__ . "/../../../partials/flash.php");
?>