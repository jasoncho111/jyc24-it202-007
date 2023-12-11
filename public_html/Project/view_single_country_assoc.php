<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$id = get_user_id();

$country = "";
if(isset($_GET["Country"])) {
    $country = $_GET["Country"];
    unset($_GET["Country"]);
}

$persisted = http_build_query($_GET);

if(empty($country)) {
    flash("Country was not set (trying to access the page manually?)", "warning");
    redirect("profile.php?$persisted#tableScroll");
}
$query = "SELECT id ID, country_name Country, capital Capital, currency_name Currency, is_independent Independent, is_un_member `United Nations Member`, population Population, is_real `Is real`, from_api `From API`, is_active `Is active`, created Created, modified Modified FROM Countries WHERE country_name=:name";
$db = getDB();
$stmt = $db->prepare($query);
$data = [];
try{
    $stmt->execute([":name" => "$country"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($results) $data = $results;
    else {
        flash("Country $country does not exist", "warning");
        redirect("profile.php?$persisted#tableScroll");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$languages = [];
$query = "SELECT language Language, created Created, modified Modified FROM CountryLanguages WHERE country_name=:name";
$stmt = $db->prepare($query);
try{
    $stmt->execute([":name" => "$country"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($results) $languages = $results;
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<div class="container-fluid">
    <?php render_table(["data" => $data, "title" => "Country Info"]); ?>
    <?php render_table(["data" => $languages, "title" => "Languages"]); ?>
    <br>
    <a href="profile.php?<?php echo $persisted ?>#tableScroll" class="btn btn-primary">Back to profile</a>
</div>

<?php
    require_once(__DIR__ . "/../../partials/flash.php");
?>