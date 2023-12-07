<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

global $total;
//SELECT STATEMENT FOR COUNTRY ASSOCIATION 
//SELECT C.country_name, V.userid FROM `Countries` C LEFT JOIN `CountriesVisited` V ON C.country_name = V.country_name AND V.userid=1 LIMIT 100
$userid = get_user_id();
$query = "SELECT C.id, C.country_name Country, capital Capital, population Population, from_api `From API`, V.userid `Change Visited Status` FROM Countries C LEFT JOIN CountriesVisited V ON C.country_name = V.country_name AND V.userid=$userid WHERE is_active=";
$sname = "";
$scap = "";
$slim = 10;
$order = "ASC";
$real = [];
$inactive = [];
$params = [];
$page = se($_GET, "page", 1, false);
if(isset($_GET["inactive"]) && count($_GET["inactive"]) == 1) {
    $query .= "is_active";
}
else {
    $query .= "1";
}

if(isset($_GET["name"]) || isset($_GET["capital"]) || (isset($_GET["type"]) && count($_GET["type"]) == 1)) {
    if(isset($_GET["name"]) && !empty($_GET["name"])) {
        $sname = se($_GET, "name", "", false);
        $query .= " AND C.country_name LIKE :sname";
        $params[":sname"] = "%$sname%";
    }
    if(isset($_GET["capital"]) && !empty($_GET["capital"])) {
        $scap = se($_GET, "capital", "", false);
        $query .= " AND C.capital LIKE :scap";
        $params[":scap"] = "%$scap%";
    }
    if(isset($_GET["type"]) && count($_GET["type"]) == 1) {
        $real = $_GET["type"][0];
        $query .= " AND is_real=";
        if($real == "real") {
            $query .= "1";
        }
        else {
            $query .= "0";
        }
    }
}

//before order by clause, get $total
$totalquery = "SELECT COUNT(id) total FROM Countries C " . substr($query, strpos($query, "WHERE"));
if(isset($_GET["order"])) {
    $order = se($_GET, "order", "", false);
    $query .= " ORDER BY C.country_name $order";
}
if(isset($_GET["lim"])) {
    $slim = se($_GET, "lim", "", false);
}
//generate limit offset for pagination
$offset = ($page - 1) * $slim;
$query .= " LIMIT $offset, $slim";

$data = [];
if($slim < 1 || $slim > 100) flash("Limit filter must be between 1 and 100 inclusive", "warning");
else {
    $db = getDB();

    //totalquery already generated, get value for $total
    $stmt = $db->prepare($totalquery);
    try {
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($results) {
            $total = $results[0]["total"];
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    if($total > 0) {
        $stmt = $db->prepare($query);

        try {
            $stmt->execute($params);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($results) {
                $data = $results;
            }
            else {
                flash("No matches found", "warning"); //should never enter this 
            }
        } catch (PDOException $e) {
            flash(var_export($e->errorInfo, true), "danger");
        }
    }
    else {
        flash("No matches found", "warning");
    }
}
//construct redirect location for delete for query persisting
$queryparams = http_build_query($_GET);

$table = ["data" => $data, "delete_url" => "admin/delete_country.php", "view_url" => "view_country.php", "edit_url" => "admin/edit_countries.php", "persist" => $queryparams, "visit_column" => "Change Visited Status", "visit_assoc_url" => "user_visit_assoc.php", "visit_key_col" => "Country"];
?>

<div class="container-fluid">
    <h1>Countries List</h1>
    <?php render_button(["type" => "button", "text" => "Clear filters", "onclick" => "clearFilters()", "color" => "secondary btn-sm"]); ?>
    <br>
    <br>
    <p>Filter by:</p>
    <form method="GET">
        <?php render_input(["type" => "search", "name" => "name", "label" => "Country Name", "placeholder" => "Name Filter", "value"=>$sname]);/*lazy value to check if form submitted, not ideal*/ ?>
        <?php render_input(["type" => "search", "name" => "capital", "label" => "Country Capital", "placeholder" => "Capital Filter", "value"=>$scap]); ?>
        <?php render_input(["type" => "number", "name" => "lim", "label" => "Max results per page", "placeholder" => "Limit", "value"=>$slim, "rules" => ["required" => true, "min" => 1, "max" => 100]]) ?>;
        <p>Order by:</p>
        <?php render_input(["type" => "radio", "name" => "order", "label" => "Ascending", "value" => "ASC", "rules" => ($order == "ASC" ? ["checked" => true] : [])]); ?>
        <?php render_input(["type" => "radio", "name" => "order", "label" => "Descending", "value" => "DESC", "rules" => ($order == "DESC" ? ["checked" => true] : [])]); ?>
        <p>Country type:</p>
        <small>On no value checked, returns both real and fake countries.</small>
        <?php render_input(["type" => "checkbox", "name" => "type[]", "label" => "Include real countries", "value" => "real", "rules" => ($real == "real" || $real == [] ? ["checked" => true] : [])]); ?>
        <?php render_input(["type" => "checkbox", "name" => "type[]", "label" => "Include fake countries", "value" => "fake", "rules" => ($real == "fake" || $real == [] ? ["checked" => true] : [])]); ?>
        <!-- Only admins should see inactive countries -->
        <?php if(has_role("Admin")) : ?>
            <p>Advanced:</p>
            <?php render_input(["type" => "checkbox", "name" => "inactive[]", "label" => "Include inactive records", "value" => "inactive", "rules" => ($inactive == "inactive" ? ["checked" => true] : [])]); ?>
        <?php endif; ?>
            <?php render_button(["text" => "Search", "type" => "submit", "color" => "primary"]); ?>
    </form>
    <div id="tableScroll">
        <?php render_table($table);?>
    </div>
    <div class="row">
        <?php include(__DIR__ . "/../../partials/pagination_nav.php"); ?>
    </div>
</div>

<script>
    //capitalize id column
    document.querySelector("th").innerHTML = "ID";
    //resets all filters
    function clearFilters() {
        //search filters set to empty
        let search = document.querySelectorAll("input[type=\"search\"]");
        search.forEach(clearval);
        //limit set to 10
        let lim = document.querySelector("input[type=\"number\"]");
        lim.value=10;
        //default order is ascending
        document.querySelector("input[value=\"ASC\"]").checked = true;
        //both real and fake countries checked
        let cb = document.querySelectorAll("input[name=\"type[]\"]");
        cb.forEach(check);
        //do not include inactive countries
        document.querySelector("input[name=\"inactive[]\"]").checked = false;
    }

    function clearval(item) {
        item.value="";
    }
    function check(item) {
        item.checked = true;
    }
</script>

<style>
    p, small, a {margin-left: 7px;}
</style>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>