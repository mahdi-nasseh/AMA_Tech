<?php
require_once (substr(__DIR__,0,39))."auto_load.php";
?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>blog</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css" />
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
        <header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="index.php" class="fs-4 fw-medium link-body-emphasis text-decoration-none">
                blog
            </a>
        </header>

        <main>
            <!-- Content Section -->
            <section class="mt-4">
                <div class="row">
                    <!-- Posts Content -->
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-secondary">
                                    پست های مرتبط با کلمه [ .... ]
                                </div>

                                <div class="alert alert-danger">
                                    مقاله مورد نظر پیدا نشد !!!!
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="card">
                                    <img src="./assets/images/4.jpg" class="card-img-top" alt="post-image" />
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title fw-bold">
                                                لورم ایپسوم
                                            </h5>
                                            <div>
                                                <span class="badge text-bg-secondary">طبیعت</span>
                                            </div>
                                        </div>
                                        <p class="card-text text-secondary pt-3">
                                            لورم ایپسوم متن ساختگی با تولید
                                            سادگی نامفهوم از صنعت چاپ و با
                                            استفاده از طراحان گرافیک است.
                                            چاپگرها و متون بلکه روزنامه و
                                            مجله در ستون و سطرآنچنان که لازم
                                            است و برای شرایط فعلی تکنولوژی
                                            مورد نیاز و کاربردهای متنوع با
                                            هدف بهبود
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="single.php" class="btn btn-sm btn-dark">مشاهده</a>

                                            <p class="fs-7 mb-0">
                                                نویسنده : علی شیخ
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <img src="./assets/images/5.jpg" class="card-img-top" alt="post-image" />
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title fw-bold">
                                                لورم ایپسوم
                                            </h5>
                                            <div>
                                                <span class="badge text-bg-secondary">گردشگری</span>
                                            </div>
                                        </div>
                                        <p class="card-text text-secondary pt-3">
                                            لورم ایپسوم متن ساختگی با تولید
                                            سادگی نامفهوم از صنعت چاپ و با
                                            استفاده از طراحان گرافیک است.
                                            چاپگرها و متون بلکه روزنامه و
                                            مجله در ستون و سطرآنچنان که لازم
                                            است و برای شرایط فعلی تکنولوژی
                                            مورد نیاز و کاربردهای متنوع با
                                            هدف بهبود
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="single.php" class="btn btn-sm btn-dark">مشاهده</a>

                                            <p class="fs-7 mb-0">
                                                نویسنده : علی شیخ
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <img src="./assets/images/6.jpg" class="card-img-top" alt="post-image" />
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title fw-bold">
                                                لورم ایپسوم
                                            </h5>
                                            <div>
                                                <span class="badge text-bg-secondary">متفزقه</span>
                                            </div>
                                        </div>
                                        <p class="card-text text-secondary pt-3">
                                            لورم ایپسوم متن ساختگی با تولید
                                            سادگی نامفهوم از صنعت چاپ و با
                                            استفاده از طراحان گرافیک است.
                                            چاپگرها و متون بلکه روزنامه و
                                            مجله در ستون و سطرآنچنان که لازم
                                            است و برای شرایط فعلی تکنولوژی
                                            مورد نیاز و کاربردهای متنوع با
                                            هدف بهبود
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="single.php" class="btn btn-sm btn-dark">مشاهده</a>

                                            <p class="fs-7 mb-0">
                                                نویسنده : علی شیخ
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Section -->
                    <div class="col-lg-4">
                        <!-- Sesrch Section -->
                        <div class="card">
                            <div class="card-body">
                                <p class="fw-bold fs-6">جستجو در وبلاگ</p>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="جستجو ..." />
                                    <button class="btn btn-secondary" type="button">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Categories Section -->
                        <div class="card mt-4">
                            <div class="fw-bold fs-6 card-header">دسته بندی ها</div>
                            <ul class="list-group list-group-flush p-0">
                                <li class="list-group-item">
                                    <a class="link-body-emphasis text-decoration-none" href="#">طبیعت</a>
                                </li>
                                <li class="list-group-item">
                                    <a class="link-body-emphasis text-decoration-none" href="#">گردشگری</a>
                                </li>
                                <li class="list-group-item">
                                    <a class="link-body-emphasis text-decoration-none" href="#">تکنولوژی</a>
                                </li>
                                <li class="list-group-item">
                                    <a class="link-body-emphasis text-decoration-none" href="#">متفرقه</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Subscribue Section -->
                        <div class="card mt-4">
                            <div class="card-body">
                                <p class="fw-bold fs-6">عضویت در خبرنامه</p>

                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">نام</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ایمیل</label>
                                        <input type="email" class="form-control" />
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-secondary">
                                            ارسال
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- About Section -->
                        <div class="card mt-4">
                            <div class="card-body">
                                <p class="fw-bold fs-6">درباره ما</p>
                                <p class="text-justify">
                                    لورم ایپسوم متن ساختگی با تولید سادگی
                                    نامفهوم از صنعت چاپ و با استفاده از
                                    طراحان گرافیک است. چاپگرها و متون بلکه
                                    روزنامه و مجله در ستون و سطرآنچنان که
                                    لازم است و برای شرایط فعلی تکنولوژی مورد
                                    نیاز و کاربردهای متنوع با هدف بهبود
                                    ابزارهای کاربردی می باشد.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer Section -->
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