<?php
require_once "../auto_load.php";
if (isset($_POST['submit'])) {
    $comment = new Comment();
    $comment = $comment->add($_GET['id'], $_SESSION['user_id'], $_POST['content']);
    if ($comment) {
        $message = "کامنت با موفقیت ثبت شد و پس تایید نمایش داده می شود";
    } else {
        $err_message = 'کامنت ثبت نشد!';
    }
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- title -->
    <title>AMA Tech</title>
    <!-- bootstrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- css -->
    <link rel="stylesheet" href="./assets/css/style.css"/>
</head>

<body>
<!-- start nav -->
<nav style="top: 5px; background: linear-gradient(360deg, #e9ecef, #fff 100px, #fff);" class="d-flex justify-content-between align-items-start mx-2 mt-2 px-4 rounded py-3 mb-4 border-bottom sticky-top">
    <div class="d-flex flex-column flex-md-row align-items-center d-inline-flex gap-3">
        <h1 class="fs-4 mt-2 fw-medium link-body-emphasis text-decoration-none ms-5"><a
                    class="text-decoration-none text-black" href="index.php">AMA<span
                        class="text-danger fst-italic">T</span>ech</a></h1>
        <a class=" <?= !isset($_GET['cat_id']) ? 'fw-bold' : '' ?> me-3 py-2 link-body-emphasis text-decoration-none" href="index.php">خانه</a>
        <?php $category = new category();
        $categories = $category->select_categories();
        if (isset($_GET['cat_id'])) {
            $result = $category->select_categories("id = {$_GET['cat_id']}");
            if (!$result){
                header('location: index.php');
            }
        }
        foreach ($categories as $category):?>
            <a class="me-3 py-2 link-body-emphasis text-decoration-none <?= isset($_GET['cat_id']) && $category->id == $_GET['cat_id'] ? 'fw-bold' : '' ?>" href="index.php?cat_id=<?= $category->id ?>"><?= $category->name ?></a>
        <?php endforeach; ?>
    </div>
    <form method="post" action="search.php"
          class="btn-search mt-1 d-flex justify-content-center align-items-center">
        <label for="search" style="cursor: pointer">
            <img width="25" src="assets/icons/search.svg" class="mx-2" alt="search">
        </label>
        <input type="text" class="form-control" name="search" id="search" placeholder="جست و جو">
    </form>
    <div class="mt-1">
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="auth.php" class="btn btn-info text-white link-body-emphasis">ورود</a>
        <?php else: ?>
            <a href="./panel/admin-panel.php"><img class="mx-4 link-body-emphasis" src="assets/icons/profile.png" alt="person-circle"
                            width="35"></a>
        <?php endif; ?>
    </div>
</nav>
<!-- end nav -->

<div class="container py-3">
    <main>
        <!-- Content -->
        <?php if (isset($_GET['id']) && $_GET['id'] > 0):?>
        <section class="mt-4">
            <div class="row">
                <!-- Posts & Comments Content -->
                <div class="col-lg-8">
                    <div class="row justify-content-center">
                        <!-- Post Section -->
                        <?php
                        $post = new post();
                        $post = $post->select_post("id = {$_GET['id']}");
                        ?>
                        <div class="col">
                            <div class="card">
                                <img src="upload/<?= $post->thumbnail; ?>" alt="">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title fw-bold"><?= $post->title; ?></h5>
                                        <div><?php $category = new category(); ?>
                                            <span class="badge text-bg-secondary"><?= $category->select_category("id = $post->category_id")->name; ?></span>
                                        </div>
                                    </div>
                                    <p class="card-text text-secondary text-justify pt-3">
                                        <?= $post->des; ?>
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center mt-5 mb-1">
                                        <p class="fs-6 mb-0 me-4">
                                            <?php
                                            $user = new user();
                                            $user = $user->select_user("role = 'writer' AND id = $post->user_id");
                                            echo 'نویسنده : ' . $user->name;
                                            ?>
                                        </p>
                                        <div class="ms-4">
                                            <span><img class="me-3" src="assets/icons/eye.svg"
                                                       alt="eye"> 100</span>
                                            <span><img class="me-3" src="assets/icons/heart.svg"
                                                       alt="heart"> 10</span>
                                            <span><img class="me-3" src="assets/icons/bookmark.svg"
                                                       alt="bookmark"> 5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-4"/>

                        <!-- Comment Section -->
                        <div class="col">
                            <!-- Comment Form -->
                            <div class="card">
                                <?php if (isset($_SESSION['user_id'])) : ?>
                                    <div class="card-body">
                                        <p class="fw-bold fs-5">ارسال کامنت</p>
                                        <form method="post">
                                            <div class="mb-3">
                                                <label for="content" class="form-label">متن کامنت</label>
                                                <textarea id="content" name="content" class="form-control"
                                                          rows="3" required></textarea>
                                            </div>
                                            <button name="submit" type="submit" class="btn btn-dark">
                                                ارسال
                                            </button>
                                        </form>
                                    </div>
                                <?php else : ?>
                                    <p class="fs-5 pt-3 px-3">برای ثبت کامنت ابتدا وارد حساب کاربری خود شوید <a
                                                href="auth.php"
                                                class="btn btn-info text-white link-body-emphasis">ورود</a></p>
                                <?php endif; ?>

                                <?php if (isset($message)) : ?>
                                    <div class="alert alert-success mx-2"><?= $message ?></div>
                                <?php elseif (isset($err_message)) : ?>
                                    <div class="alert alert-danger mx-2"><?= $err_message ?></div>
                                <?php endif; ?>
                            </div>

                            <hr class="mt-4"/>
                            <!-- Comment Content -->
                            <?php
                            $comments = new comment();
                            $comments = $comments->select_comments("post_id = {$_GET['id']} AND status = 1 AND reply = 0");
                            ?>
                            <?php if (count($comments)) : ?>
                                <?php $allComment = new comment(); $allComment = $allComment->select_comments("post_id = {$_GET['id']}") ?>
                                <p class="alert alert-info fs-6">تعداد کامنت ها : <?= count($allComment) ?></p>
                            <?php else : ?>
                                <p class="alert alert-danger fs-6">کامنتی برای این خبر وجود ندارد!</p>
                            <?php endif ?>
                            <?php foreach ($comments as $comment): ?>
                                <div class="card bg-light-subtle mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/icons/profile.png" width="45" height="45"
                                                 alt="user-profle"/>
                                            <?php $user = new user;
                                            $user = $user->select_user("id = $comment->user_id") ?>
                                            <h5 class="card-title me-2 mb-0"><?= $user->name ?></h5>
                                        </div>
                                        <p class="card-text pt-3 pr-3"><?= $comment->content ?></p>
                                    </div>
                                </div>
                                <?php
                                $replies = new comment();
                                $replies = $replies->select_comments("post_id = {$_GET['id']} AND status = 1 AND reply = $comment->id");
                                ?>
                                <?php if (count($replies)) :
                                    foreach ($replies as $reply): ?>
                                        <div class="card bg-light-subtle mb-3" style="margin-right: 75px;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/icons/profile.png" width="45" height="45"
                                                         alt="user-profle"/>
                                                    <?php $user = new user;
                                                    $user = $user->select_user("id = $reply->user_id") ?>
                                                    <h5 class="card-title me-2 mb-0"><?= $user->name ?></h5>
                                                </div>
                                                <p class="card-text pt-3 pr-3"><?= $reply->content ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Section -->
                <div class="col-lg-4">
                    <?php
                    $posts = new post;
                    $posts = $posts->select_posts("category_id = $post->category_id AND id !=$post->id ORDER BY id DESC", '3');
                    if (count($posts)) :
                        ?>
                        <span class="card-title fs-3 fw-bold me-4" style="line-height: 33px">
                        خبر های مرتبط
                    </span>
                    <?php
                    else :
                        $posts = new post;
                        $posts = $posts->select_posts("id !=$post->id ORDER BY id DESC", '3');
                        ?>
                        <span class="card-title fs-3 fw-bold me-4" style="line-height: 33px">
                        خبر های جدید
                    </span>
                    <?php endif ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="col-sm-12 my-3 me-4">
                            <div class="card">
                                <a href="single.php?id=<?= $post->id ?>" class="text-black text-decoration-none">
                                    <img src="<?= "upload/$post->thumbnail"; ?>" class="card-img-top" alt="post-image"
                                         height="250"/>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between" style="height: 50px;">
                                            <h4 class="card-title fw-bold" style="line-height: 33px">
                                                <?= $post->title ?>
                                            </h4>
                                            <div><?php $category = new category(); ?>
                                                <span class="badge text-bg-secondary"><?= $category->select_category("id = $post->category_id")->name ?></span>
                                            </div>
                                        </div>
                                        <p class="card-text text-secondary pt-3">
                                            <?= mb_substr($post->des, 0, 300) . " ..." ?>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fs-7 mb-0">
                                                <?php
                                                $user = new user();
                                                $user = $user->select_user("role = 'writer' AND id = $post->user_id");
                                                echo 'نویسنده : ' . $user->name;
                                                ?>
                                            </span>
                                            <div>
                                                <span><img class="me-3" src="assets/icons/eye.svg" alt="eye"> 100</span>
                                                <span><img class="me-3" src="assets/icons/heart.svg"
                                                           alt="heart"> 10</span>
                                                <span><img class="me-3" src="assets/icons/bookmark.svg" alt="bookmark"> 5</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php else:?>
        <div class="alert alert-danger text-center">خبر مورد نظر یافت نشد!</div>
        <?php endif;?>
    </main>

    <!-- Footer -->
    <footer class="text-center pt-4 my-md-5 pt-md-5 border-top">
        <div class="row flex-column">
            <div>
                <p class="">
                    کلیه حقوق محتوا این سایت محفوظ
                    میباشد.
                </p>
            </div>
            <div>
                <a href="#"><i class="bi bi-telegram fs-3 text-secondary ms-2"></i></a>
                <a href="#"><i class="bi bi-whatsapp fs-3 text-secondary ms-2"></i></a>
                <a href="#"><i class="bi bi-instagram fs-3 text-secondary"></i></a>
            </div>
        </div>
    </footer>
</div>
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>