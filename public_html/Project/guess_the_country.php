<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
require(__DIR__ . "/../../lib/get_country_table.php");

if(isset($_POST["name"])) {
    $name = $_POST["name"];
    $temp = $_SESSION["user"]["answer"];
    if($temp == $name) flash("You guessed correctly!", "success");
    else flash("You guessed incorrectly, the answer was $temp", "danger");
    unset($_SESSION["user"]["answer"]);
}

$country = $countriestable[array_rand($countriestable)];
$cap = $country["capital"];
$pop = $country["population"];
if(!isset($_SESSION["user"]["answer"])) $_SESSION["user"]["answer"] = $country["country_name"];


?>

<div class="container-fluid">
    <p>Country capital: <?php echo $cap; ?></p><br>
    <p>Population: <?php echo $pop; ?></p><br>
    <form method="POST">
        <?php render_input(["type" => "text", "label" => "Guess the country", "name" => "name"]); ?>
    </form>
</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>