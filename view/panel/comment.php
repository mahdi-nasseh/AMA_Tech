<?php
require_once "../../auto_load.php";
if (isset($_GET['action'])) {
    if (!empty($_GET['action'])) {
        $comment = (new comment)->select_comment("id = {$_GET['action']}");
        $user = (new user)->select_user("id=$comment->user_id")->username;
        $post = (new post)->select_post("id=$comment->post_id")->title;
        $post_id = (new post)->select_post("id=$comment->post_id")->id;
    }
}else
    header('location: admin-panel.php');

if (!$comment)
    header('location: admin-panel.php');

if (isset($_POST['submit'])) {
    $reply = trim($_POST['reply']);

    if (empty($reply) || empty($user) || empty($post))
        header('user.php?err=empty');
    else {
        $result = (new comment)->add($post_id, $_SESSION['user_id'], $reply, $_GET['action']);
        if ($result)
            header('location: writer-panel.php?page=comment');
    }
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
        <header> پاسخ به کامنت </header>
        <form method="post">
            <input value="<?= $user ?>" type="text" disabled required name="name"/>
            <input value="<?= $post ?>" type="text" disabled required name="post"/>
            <textarea type="text" placeholder="پاسخ" required name="reply"></textarea>

            <input type="submit" value="<?= !isset($comment) ? 'ویرایش' : 'ثبت' ?>" name="submit"/>
        </form>
    </div>
</section>
</body>
</html>
