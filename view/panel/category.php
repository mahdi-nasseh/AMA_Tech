<?php
require_once "../../auto_load.php";
if (isset($_GET['action']))
    $action = $_GET['action'];
else
    header('location: admin-panel.php');

if ($action !== 'add') {
    $category = (new category)->select_category("id = $action");
}

if (isset($_POST['submit'])) {
    $id = checkInput($_POST['id']);
    $name = checkInput($_POST['name']);

    if (empty($name))
        header('user.php?err=empty');
    else if (isset($user)) {
        $category = (new category)->edit($id, $name);
    }
    else {
        $category = (new category)->add($name);
    }
    if ($category)
        header("location: admin-panel.php?page=category");
    else
        header("user.php?err=$category");
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
        <header><?= $action == 'add' ? 'ثبت دسته بندی' : 'ویرایش دسته بندی' ?></header>
        <?php
        if ($action !== 'add') {
            $category = (new category)->select_category("id = $action");
        }
        ?>
        <form method="post">
            <input value="<?= isset($category) ? $category->id : '' ?>" type="hidden" placeholder="شناسه" required name="id"/>
            <input value="<?= isset($category) ? $category->name : '' ?>" type="text" placeholder="نام" required name="name"/>
            
            <input type="submit" value="<?= isset($user) ? 'ویرایش' : 'ثبت' ?>" name="submit"/>
        </form>
    </div>
</section>
</body>
</html>
