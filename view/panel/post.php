<?php
require_once "../../auto_load.php";
if (isset($_GET['action']))
    $action = $_GET['action'];
else
    header('location: admin-panel.php');

if ($action !== 'add') {
    $post = (new post)->select_post("id = $action");
}

if (isset($_POST['submit'])) {
    $id = checkInput($_POST['id']);
    $user_id = checkInput($_POST['user_id']);
    $title = checkInput($_POST['title']);
    $thumbnail = $_FILES['thumbnail'];
    $thumbnail_name = time() . $thumbnail['name'];
    $result = move_uploaded_file($thumbnail['tmp_name'], "../upload/" . $thumbnail_name);
    if ($result)
        $thumbnail = $thumbnail_name;
    else {
        if (isset($post))
            $thumbnail = $post->thumbnail;
        else
            $thumbnail = 'بدون تصویر';
        }
    $des = checkInput($_POST['des']);
    $category_id = checkInput($_POST['category_id']);


    if (empty($user_id) || empty($title) || empty($thumbnail_name) || empty($des) || empty($category_id))
        header('post.php?err=empty');
    else if ($action !== 'add')
        $post = (new post)->edit($id, $user_id, $title, $thumbnail, $des, $category_id);
    else
        $post = (new post)->add($user_id, $title, $thumbnail, $des, $category_id);

    if ($post)
        header("location: admin-panel.php?page=post");
    else
        header("post.php?err=$post");
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
        <header><?= $action == 'add' ? 'ثبت پست' : 'ویرایش پست' ?></header>
        <?php
        if ($action !== 'add') {
            $post = (new post)->select_post("id = $action");
        }
        ?>
        <form method="post" enctype="multipart/form-data">
            <input value="<?= isset($post) ? $post->id : '' ?>" type="hidden" placeholder="شناسه" required name="id"/>
            <input value="<?= isset($post) ? $post->user_id : "{$_SESSION['user_id']}" ?>" type="hidden" placeholder="نویسنده" required name="user_id"/>
            <input value="<?= isset($post) ? $post->title : '' ?>" type="text" placeholder="عنوان" required name="title"/>
            <?php if (isset($post)): ?>
            <input type="file" name="thumbnail">
            <img src="../upload/<?= $post->thumbnail ?>" alt="thumbnail">
            <?php else : ?>
            <input type="file" name="thumbnail" required>
            <?php endif; ?>
            <select name="category_id" id="category_id">
                <?php $categories = (new category)->select_categories();
                if ($categories):
                    foreach ($categories as $category): ?>
                        <option <?php if (isset($post)) {if ($post->category_id == $category->id) echo 'selected'; else echo '';}
                        ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach; endif; ?>
            </select>
            <textarea placeholder=" توضیحات" rows="10" required name="des"><?= isset($post) ? $post->des : '' ?></textarea>
            <input type="submit" value="<?= isset($post) ? 'ویرایش' : 'ثبت' ?>" name="submit"/>
        </form>
    </div>
</section>
</body>
</html>
