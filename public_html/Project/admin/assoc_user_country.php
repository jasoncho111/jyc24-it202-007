<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect('home.php');
}

//PERFORM NECESSARY TABLE UPDATES BEFORE GETTING NEW TABLE TO DISPLAY
if(isset($_POST["assoc_submit"])) {
    if (!isset($_POST["users"]) || !isset($_POST["countries"])) {
        flash("At least one value from both Users and Countries must be selected", "warning");
    }
    else {
        $user_ids = $_POST["users"];
        $c_names = $_POST["countries"];

        if(empty($user_ids) || empty($c_names)) flash("At least one value from both Users and Countries must be selected", "danger"); //should not be possible to his this case
        else {
            $query = "INSERT INTO CountriesVisited(userid, country_name) VALUES";
            $params = [];
            $valnum = 0;
            foreach($user_ids as $id) {
                foreach($c_names as $name) {
                    $query .= "(:id$valnum, :name$valnum), ";
                    $params[":id$valnum"] = "$id";
                    $params[":name$valnum"] = "$name";
                    $valnum++;
                }
            }

            //will always have trailing comma - truncate
            $query = substr($query, 0, strlen($query)-2);
            $query .= " ON DUPLICATE KEY UPDATE do_delete=1";

            $updated = false;
            $db = getDB();
            $stmt = $db->prepare($query);
            try {
                $stmt->execute($params);
                $updated = true;
            } catch (PDOException $e) {
                flash(var_export($e->errorInfo, true), "danger");
            }

            if($updated) {
                $query = "DELETE FROM CountriesVisited WHERE do_delete=1";
                $stmt = $db->prepare($query);

                try {
                    $stmt->execute();
                    flash("Successfully updated user associations", "success");
                } catch (PDOException $e) {
                    flash(var_export($e->errorInfo, true), "danger");
                }
            }
            else flash("Failed to update user associations", "danger");
        }
    }
}

$username = "";
$country = "";
if (isset($_POST["username"]) && isset($_POST["country"])) {
    $username = se($_POST, "username", "", false);
    $country = se($_POST, "country", "", false);

    if(empty($username) || empty($country)) flash("Username and country fields cannot be empty", "warning");
}

$assocs = [];
$users = [];
$countries = [];
if(!empty($username) && !empty($country)) {
    $params = [":username" => "%$username%", ":country" => "%$country%"];
    $assocquery = "SELECT DISTINCT U.username Username, GROUP_CONCAT(\" \", V.country_name) `Countries Visited` FROM CountriesVisited V, Users U WHERE U.id=V.userid AND U.username LIKE :username AND V.country_name LIKE :country GROUP BY U.username ORDER BY U.username ASC LIMIT 25";
    $db = getDB();
    $stmt = $db->prepare($assocquery);
    $temp = [];
    try {
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $temp = $results;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    if(!empty($temp)) {
        foreach($temp as $entry) {
            $assocs[$entry["Username"]] = $entry["Countries Visited"];
        }
    }

    $usersquery = "SELECT id, username FROM Users WHERE username LIKE :username ORDER BY username ASC LIMIT 25";
    $stmt = $db->prepare($usersquery);
    try {
        $stmt->execute([":username" => "%$username%"]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $users = $results;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    $countryquery = "SELECT country_name FROM Countries WHERE country_name LIKE :country ORDER BY country_name ASC LIMIT 25";
    $stmt = $db->prepare($countryquery);
    try {
        $stmt->execute([":country" => "%$country%"]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $countries = $results;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }
}
?>

<div class="container-fluid">
    <h1>Associate Users to Countries</h1>
    <form method="POST">
        <?php render_input(["type" => "search", "name" => "username", "placeholder" => "Username Filter", "value" => $username]); ?>
        <?php render_input(["type" => "search", "name" => "country", "placeholder" => "Country Filter", "value" => $country]); ?>
        <?php render_button(["text" => "Search", "type" => "submit"]); ?>
    </form>
    <br>
    <!-- jyc24 12-10-23 table logic -->
    <h3>Change Associations</h3>
    <form method="POST">
        <?php if (isset($username) && !empty($username) && isset($country) && !empty($country)) : ?>
            <input type="hidden" name="username" value="<?php se($username, false); ?>" />
            <input type="hidden" name="country" value="<?php se($country, false); ?>" />
        <?php endif; ?>
        <input type="hidden" name="assoc_submit" value="true" />
        <table class="table">
            <thead>
                <th>Users</th>
                <th>Countries</th>
            </thead>
            <tr>
                <td>
                    <table class="table">
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td>
                                    <input id="user_<?php se($user, 'id'); ?>" type="checkbox" name="users[]" value="<?php se($user, 'id'); ?>" />
                                    <label for="user_<?php se($user, 'id'); ?>"><?php se($user, "username"); ?></label>
                                </td>
                                <td>
                                    <?php se($assocs, $user["username"], "No Countries"); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </td>
                <td>
                    <table class="table">
                        <?php foreach ($countries as $c) : ?>
                            <tr>
                                <td>
                                    <input id="<?php se($c, 'country_name'); ?>" type="checkbox" name="countries[]" value="<?php se($c, 'country_name'); ?>" />
                                    <label for="<?php se($c, 'country_name'); ?>"><?php se($c, "country_name"); ?></label>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </td>
            </tr>
        </table>
        <?php render_button(["text" => "Toggle Country Associations", "type" => "submit", "color" => "secondary"]); ?>
    </form>
</div>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>