<?php
require(__DIR__ . "/../../partials/nav.php");
reset_session();
?>
<form id="non-admin-form" onsubmit="return validate(this)" method="POST">
    <table class="forms-table">
        <tr>
            <div>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" required /></td>
            </div>
        </tr>
        <tr>
            <div>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id= "username" name="username" required maxlength="30" /></td>
            </div>
        </tr>
        <tr>
            <div>
                <td><label for="pw">Password:</label></td>
                <td><input type="password" id="pw" name="password" required minlength="8" /></td>
            </div>
        </tr>
        <tr>
            <div>
                <td><label for="confirm">Confirm:</label></td>
                <td><input type="password" name="confirm" required minlength="8" /></td>
            </div>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Register" /></td>
        </tr>
    </table>
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let user = form.username.value;
        let pw = form.password.value;
        let conf = form.confirm.value;

        const userRe = /^[a-z0-9_-]{3,16}$/;
        let isValid = true;
        if (!pw) {
            flash("Password field cannot be empty", "warning");
            isValid = false;
        }
        if (pw !== con) {
            flash("Password and confirm password must match", "warning");
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
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["username"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se($_POST, "confirm", "", false);
    $username = se($_POST, "username", "", false);
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
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
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty", "danger");
        $hasError = true;
    }
    if (!is_valid_password($password)) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (
        strlen($password) > 0 && $password !== $confirm
    ) {
        flash("Passwords must match", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
            flash("Successfully registered!", "success");
        } catch (PDOException $e) {
            users_check_duplicate($e->errorInfo);
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>