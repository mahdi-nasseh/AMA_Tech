<?php
require_once "../auto_load.php";
if (isset($_GET['cat_id']) && !is_numeric($_GET['cat_id'])) {
    header('location: index.php');
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
    <link rel="stylesheet" href="assets/css/style.css"/>
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
            <a href=""><img class="mx-4 link-body-emphasis" src="assets/icons/profile.png" alt="person-circle"
                            width="35"></a>
        <?php endif; ?>
    </div>
</nav>
<!-- end nav -->

<div class="container py-3">
    <!-- start header -->
    <?php if (!isset($_GET['show']) && !isset($_GET['cat_id'])):?>
    <header>
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded">
                <?php
                $sliders = new slider();
                $sliders = $sliders->select_sliders();
                foreach ($sliders as $slider):
                    $post = new post();
                    $post = $post->select_post("id = $slider->post_id");
                    ?>
                    <div class="carousel-item overlay carousel-height <?= $slider->active == 1 ? 'active' : '' ?>">
                        <img src="upload/<?= $post->thumbnail ?>" class="d-block w-100" alt="post-image"/>
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= $post->title ?></h5>
                            <p>
                                <?= mb_substr($post->des, 0, 100) . " ..." ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
    <?php endif;?>
    <!-- end header -->

    <!-- start main-->
    <main>
        <!-- start top posts -->
        <section class="mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row g-3">
                        <?php $posts = new post;
                         if (isset($_GET['cat_id'])) {
                            $posts = $posts->select_posts("category_id = {$_GET['cat_id']} ORDER BY id DESC");
                        } else if (isset($_GET['show']) && $_GET['show'] == 'all') {
                            $posts = $posts->select_posts("1=1 ORDER BY id DESC");
                        } else {
                            $posts = $posts->select_posts('1=1 ORDER BY id DESC',9);
                        }
                        if (count($posts) > 0): $i = 0;
                            foreach ($posts as $post): $i++?>
                            <div class="col-sm-4 post-card" style="<?= $i > 3 ? 'opacity: 0;' : '' ?>" >
                                <div class="card">
                                    <a href="single.php?id=<?= $post->id ?>" class="text-black text-decoration-none">
                                        <img loading="lazy" src="<?= "upload/$post->thumbnail"; ?>" class="card-img-top"
                                             alt="post-image"
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
                                                    <span><img class="me-3" src="assets/icons/eye.svg"
                                                               alt="eye"> 100</span>
                                                    <span><img class="me-3" src="assets/icons/heart.svg"
                                                               alt="heart"> 10</span>
                                                    <span><img class="me-3" src="assets/icons/bookmark.svg"
                                                               alt="bookmark"> 5</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; elseif (isset($_GET['cat_id'])): ?>
                            <div class="alert alert-danger text-center">خبری برای این دسته بندی یافت نشد!</div>
                        <?php else: ?>
                            <div class="alert alert-danger text-center">خبری یافت نشد!</div>
                        <?php endif; ?>
                        <?php if (!isset($_GET['show']) && !isset($_GET['cat_id'])): ?>
                        <div class="d-flex justify-content-center align-items-center">
                            <a class="btn btn-info text-white" href="index.php?show=all">نمایش همه</a>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
        <!-- end top posts -->
    </main>
    <!-- end main-->

    <!-- start footer-->
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
    <!-- end footer-->
</div>
<!--js-->
<script src="assets/js/app.js"></script>
<!-- bootstrap js -->
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>