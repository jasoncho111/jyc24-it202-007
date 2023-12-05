<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<?php
if (isset($_POST["save"])) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $hasError = false;
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!is_valid_username($username)) {
        flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        $params = [":email" => $email, ":username" => $username, ":id" => get_user_id()];
        $db = getDB();
        $stmt = $db->prepare("UPDATE Users set email = :email, username = :username where id = :id");
        try {
            $stmt->execute($params);
            flash("Profile saved", "success");
        } catch (PDOException $e) {
            users_check_duplicate($e->errorInfo);
        }
        //select fresh data from table
        $stmt = $db->prepare("SELECT id, email, username from Users where id = :id LIMIT 1");
        try {
            $stmt->execute([":id" => get_user_id()]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                //$_SESSION["user"] = $user;
                $_SESSION["user"]["email"] = $user["email"];
                $_SESSION["user"]["username"] = $user["username"];
            } else {
                flash("User doesn't exist", "danger");
            }
        } catch (Exception $e) {
            flash("An unexpected error occurred, please try again", "danger");
            //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        }
    }


    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        $hasError = false;
        if (!is_valid_password($new_password)) {
            flash("Password too short", "danger");
            $hasError = true;
        }
        if (!$hasError) {
            if ($new_password === $confirm_password) {
                //TODO validate current
                $stmt = $db->prepare("SELECT password from Users where id = :id");
                try {
                    $stmt->execute([":id" => get_user_id()]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (isset($result["password"])) {
                        if (password_verify($current_password, $result["password"])) {
                            $query = "UPDATE Users set password = :password where id = :id";
                            $stmt = $db->prepare($query);
                            $stmt->execute([
                                ":id" => get_user_id(),
                                ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                            ]);

                            flash("Password reset", "success");
                        } else {
                            flash("Current password is invalid", "warning");
                        }
                    }
                } catch (PDOException $e) {
                    echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                }
            } else {
                flash("New passwords don't match", "warning");
            }
        }
    }
}
?>

<?php
$email = get_user_email();
$username = get_username();
?>
<form id="non-admin-form" method="POST" onsubmit="return validate(this);">
    <table class="forms-table">
        <tr>
            <div class="mb-3">
                <td><label for="email" class="form-label">Email</label></td>
                <td><input type="email" name="email" id="email" value="<?php se($email); ?>" class="form-control" /></td>
            </div>
        </tr>
        <tr>
            <div class="mb-3">
                <td><label for="username" class="form-label">Username</label></td>
                <td><input type="text" name="username" id="username" value="<?php se($username); ?>" class="form-control" /></td>
            </div>
        </tr>
        <!-- DO NOT PRELOAD PASSWORD -->
        <tr><td><br></td></tr>
        <tr>
            <td><div>Password Reset</div><td>
        </tr>
        <tr>
            <div class="mb-3">
                <td><label for="cp" class="form-label">Current Password</label></td>
                <td><input type="password" name="currentPassword" id="cp" class="form-control" /></td>
            </div>
        </tr>
        <tr>
            <div class="mb-3">
                <td><label for="np" class="form-label">New Password</label></td>
                <td><input type="password" name="newPassword" id="np" class="form-control" /></td>
            </div>
        </tr>
        <tr>
            <div class="mb-3">
                <td><label for="conp" class="form-label">Confirm Password</label></td>
                <td><input type="password" name="confirmPassword" id="conp" class="form-control" /></td>
            </div>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Update Profile" name="save" class="btn btn-primary" /></td>
        </tr>
    </table>
</form>

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
require_once(__DIR__ . "/../../partials/flash.php");
?>