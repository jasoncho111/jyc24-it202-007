<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$query = "SELECT country_name Country, capital Capital, population Population FROM Countries";
$sname = "";
$scap = "";
$slim = 10;
$order = "ASC";
$real = [];
$params = [];
if(isset($_POST["name"]) || isset($_POST["capital"]) || (isset($_POST["type"]) && count($_POST["type"]) == 1)) {
    $query .= " WHERE ";
    if(isset($_POST["name"]) && !empty($_POST["name"])) {
        $sname = se($_POST, "name", "", false);
        $query .= "country_name LIKE :sname AND ";
        $params[":sname"] = "%$sname%";
    }
    if(isset($_POST["capital"]) && !empty($_POST["capital"])) {
        $scap = se($_POST, "capital", "", false);
        $query .= "capital LIKE :scap AND ";
        $params[":scap"] = "%$scap%";
    }
    if(isset($_POST["type"]) && count($_POST["type"]) == 1) {
        $real = $_POST["type"][0];
        $query .= "is_real=";
        if($real == "real") {
            $query .= "1 AND ";
        }
        else {
            $query .= "0 AND ";
        }
    }

    $query = substr($query, 0, strlen($query) -5);
}
if(isset($_POST["order"])) {
    $order = se($_POST, "order", "", false);
    $query .= " ORDER BY country_name $order";
}
if(isset($_POST["lim"])) {
    $slim = se($_POST, "lim", "", false);
}
$query .= " LIMIT $slim";

$data = [];
if($slim < 1 || $slim > 100) flash("Limit filter must be between 1 and 100 inclusive", "warning");
else {
    $db = getDB();
    $stmt = $db->prepare($query);

    try {
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $data = $results;
        }
        else {
            flash("No matches found", "warning");
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }
}
$table = ["data" => $data];
?>




<div class="containeer-fluid">
    <h1>Countries List</h1>
    <?php render_button(["type" => "button", "text" => "Clear filters", "onclick" => "clearFilters()", "color" => "secondary btn-sm"]); ?>
    <br>
    <br>
    <p>Filter by:</p>
    <form method="POST">
        <?php render_input(["type" => "search", "name" => "name", "label" => "Country Name", "placeholder" => "Name Filter", "value"=>$sname]);/*lazy value to check if form submitted, not ideal*/ ?>
        <?php render_input(["type" => "search", "name" => "capital", "label" => "Country Capital", "placeholder" => "Capital Filter", "value"=>$scap]); ?>
        <?php render_input(["type" => "number", "name" => "lim", "label" => "Max Results", "placeholder" => "Limit", "value"=>$slim, "rules" => ["required" => true, "min" => 1, "max" => 100]]) ?>;
        <p>Order by:</p>
        <?php render_input(["type" => "radio", "name" => "order", "label" => "Ascending", "value" => "ASC", "rules" => ($order == "ASC" ? ["checked" => true] : [])]); ?>
        <?php render_input(["type" => "radio", "name" => "order", "label" => "Descending", "value" => "DESC", "rules" => ($order == "DESC" ? ["checked" => true] : [])]); ?>
        <p>Country type:</p>
        <small>On no value checked, returns both real and fake countries.</small>
        <?php render_input(["type" => "checkbox", "name" => "type[]", "label" => "Include real countries", "value" => "real", "rules" => ($real == "real" || $real == [] ? ["checked" => true] : [])]); ?>
        <?php render_input(["type" => "checkbox", "name" => "type[]", "label" => "Include fake countries", "value" => "fake", "rules" => ($real == "fake" || $real == [] ? ["checked" => true] : [])]); ?>
        <?php render_button(["text" => "Search", "type" => "submit", "color" => "primary"]); ?>
    </form>
    <?php render_table($table);?>
</div>

<script>
    function clearFilters() {
        let search = document.querySelectorAll("input[type=\"search\"]");
        search.forEach(clearval);
        let lim = document.querySelector("input[type=\"number\"]");
        lim.value=10;
        let rad = document.querySelector("input[value=\"ASC\"]").checked = true;
        let cb = document.querySelectorAll("input[type=\"checkbox\"]");
        cb.forEach(checkall);
    }

    function clearval(item) {
        item.value="";
    }
    function checkall(item) {
        item.checked = true;
    }
</script>

<style>
    p, small {margin-left: 7px;}
</style>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>