<?php
require_once "../../auto_load.php";
if (isset($_GET['action']))
    $action = $_GET['action'];
else
    header('location: admin-panel.php');

if ($action !== 'add') {
    $user = (new user)->select_user("id = $action");
}

if (isset($_POST['submit'])) {
    $id = checkInput($_POST['id']);
    $name = checkInput($_POST['name']);
    $username = checkInput($_POST['username']);
    $mobile = checkInput($_POST['mobile']);
    $email = checkInput($_POST['email']);
    $password = checkInput($_POST['password']);
    $role = checkInput($_POST['role']);

    if (empty($name) || empty($username) || empty($email) || empty($password))
        header('user.php?err=empty');
    else if (isset($user)) {
        $user = (new user)->edit($id, $name, $username, $password, $mobile, $email, $role);
    }
    else {
        $user = (new user)->register($name, $username, $password, $mobile, $email, $role);
    }
    if ($user)
        header("location: admin-panel.php?page=user");
    else
        header("user.php?err=$user");
}
function checkInput($value)
{
    return htmlspecialchars(trim($value));
}

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="description"
          content=" Today in this blog you will learn how to create a responsive Login & Registration Form in HTML CSS & JavaScript. The blog will cover everything from the basics of creating a Login & Registration in HTML, to styling it with CSS and adding with JavaScript."/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>AMA Tech | panel</title>
    <link rel="stylesheet" href="assets/style/auth.css"/>
    <link rel="stylesheet" href="assets/style/style.css"/>
</head>
<body>
<section class="wrapper">
    <div class="form signup">
        <header><?= $action == 'add' ? 'ثبت کاربر' : 'ویرایش کابر' ?></header>
        <?php
        if ($action !== 'add') {
            $user = (new user)->select_user("id = $action");
        }
        ?>
        <form method="post">
            <input value="<?= isset($user) ? $user->id : '' ?>" type="hidden" placeholder="موبایل" required name="id"/>
            <input value="<?= isset($user) ? $user->name : '' ?>" type="text" placeholder="نام" required name="name"/>
            <input value="<?= isset($user) ? $user->username : '' ?>" type="text" placeholder="نام کاربری" required name="username"/>
            <input value="<?= isset($user) ? $user->mobile : '' ?>" type="<?= isset($user) ? 'text' : 'hidden' ?>" placeholder="موبایل" required name="mobile"/>
            <input value="<?= isset($user) ? $user->email : '' ?>" type="email" placeholder="ایمیل" required name="email">
            <input value="<?= isset($user) ? $user->password : '' ?>" type="password" placeholder="رمز عبور" required name="password"/>

            <select name="role" id="role">
                <option <?php if (isset($user->role)) {
                    if ($user->role == 'user')
                        echo 'selected';
                    else
                        echo '';
                } ?> value="user">user</option>
                <option <?php if (isset($user->role)) {
                    if ($user->role == 'writer')
                        echo 'selected';
                    else
                        echo '';
                } ?> value="writer">writer</option>
                <option <?php if (isset($user->role)) {
                    if ($user->role == 'admin')
                        echo 'selected';
                    else
                        echo '';
                } ?> value="admin">admin</option>
            </select>
            <input type="submit" value="<?= isset($user) ? 'ویرایش' : 'ثبت' ?>" name="submit"/>
        </form>
    </div>
</section>
</body>
</html>
