<?php
require_once "../auto_load.php";
if (isset($_GET['cat_id']) && !is_numeric($_GET['cat_id']))
    header('location: index.php');
if (isset($_GET['search']))
    $search = trim($_GET['search']);
?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- title -->
    <title>AMA Tech</title>
    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css"/>
    <!-- bootstrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body dir="rtl">
<!-- start nav -->
<?php require_once 'nav.php'; ?>
<!-- end nav -->

<div class="container py-3">
    <!-- start header -->
    <?php if (!isset($_GET['show']) && !isset($_GET['cat_id']) && !isset($search)):?>
    <header style="height: 80vh">
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded">
                <?php
                $sliders = new slider();
                $sliders = $sliders->select_sliders();
                foreach ($sliders as $slider):
                    $post = new post();
                    $post = $post->select_post("id = $slider->post_id");
                    ?>
                    <a class="text-black" href="single.php?id=<?= $post->id ?>">
                        <div class="carousel-item pt-4 carousel-height <?= $slider->active == 1 ? 'active' : '' ?>">
                            <div class="d-flex">
                                <!-- left -->
                                <div class="text-end m-5">
                                    <h3 class="text-secondary d-inline mb-3"><?= $post->title ?></h3>
                                    <span class="badge text-bg-secondary mx-3 p-2"><?=(new category())->select_category("id = $post->category_id")->name ?></span>
                                    <p class="mt-4 pt-3"><?= mb_substr($post->des, 0, 600) . " ..." ?></p>
                                </div>
                                <!-- right -->
                                <div class="">
                                    <img src="upload/<?= $post->thumbnail ?>" class="image-right shadow" style="width: 600px; height: 400px;border-radius: 15px;" alt="post-img">
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
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
                        if (isset($_GET['cat_id']) && isset($search))
                            $posts = $posts->select_posts("category_id = {$_GET['cat_id']} AND title LIKE '%{$search}%'");
                        else if (isset($_GET['cat_id']))
                            $posts = $posts->select_posts("category_id = {$_GET['cat_id']} ORDER BY id DESC");
                        else if (isset($search))
                            $posts = $posts->select_posts("title LIKE '%{$search}%' ORDER BY id ASC");
                        else if (isset($_GET['show']) && $_GET['show'] == 'all')
                            $posts = $posts->select_posts("1=1 ORDER BY id DESC");
                        else
                             $posts = $posts->select_posts('1=1 ORDER BY id DESC',9);

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
                                                    <span class="badge p-2 text-bg-secondary"><?= $category->select_category("id = $post->category_id")->name ?></span>
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
                                                    <?php $views = (new post())->select_views($post->id); ?>
                                                    <span><img class="me-3" src="assets/icons/eye.svg" alt="eye"> <?= $views ?></span>
                                                    <a href="<?= "single.php?id=$post->id"?>" class="text-black text-decoration-none"><img class="me-3" src="assets/icons/heart-fill.svg" alt="heart"><?php $like = (new post())->select_post_likes($post->id) ?><?= $like ? ' ' . count($like)  : ' 0' ?></a>
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
                        <?php if (!isset($_GET['show']) && !isset($_GET['cat_id']) && !isset($search)): ?>
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