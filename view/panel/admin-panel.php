<<<<<<< Updated upstream
<?php
require_once "../../auto_load.php";
=======
<?php require_once '../../auto_load.php';

$user = new user();
$user = $user->select_user("id =" . $_SESSION['user_id']);
if ($user->role == "admin") {
    $role = "مدیر";
} else if ($user->role == "writer") {
    header('location: ./writer-panel.php');
} else if ($user->role == "user") {
    header('location: ./user-panel.php');
}
>>>>>>> Stashed changes
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>AMA Tech | Panel</title>
</head>

<body>

<div class="container-fluid">
    <div class="row">
        <!-- start sidebar -->
        <?php include 'admin-sidebar.php'; ?>
        <!-- end sidebar -->


        <?php
        if (!isset($_GET['page'])) {
            ?>
            <div class="col-lg-10 p-0">
                <main>
                    <!-- title -->
                    <div class="py-4 px-3">
                        <h2><?= $user->name; ?> شما مدیر هستید."🙌</h2>
                    </div>
                    <!-- start cards -->
                    <div class="container">
                        <!-- cards -->
                        <div class="row">
                            <!-- card 1 -->
                            <div class="col-xxl-4 col-lg-4 col-12 my-2 col-sm-6">
                                <div class="bg-info rounded-3 py-4 px-3 d-flex align-items-center justify-content-between position-relative overflow-hidden">
                                    <div class="">
                                        <h5 class="text-white fw-bold text-nowrap">پیشرفت کاربر</h5>
                                        <span class="text-white fs-3">53%</span>
                                    </div>
                                    <!-- more information text -->
                                    <div class="position-absolute bottom-0 bg-dark bg-opacity-25 end-0 w-100 text-center p-1">
                                        <a href="#" class="text-light text-decoration-none">اطلاعات بیشتر
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" fill="#fff"
                                                      d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- card 2 -->
                            <div class="col-xxl-4 col-lg-4 col-12 my-2 col-sm-6">
                                <div class="bg-danger rounded-3 py-4 px-3 d-flex align-items-center justify-content-between position-relative overflow-hidden">
                                    <div class="">
                                        <h5 class="text-white fw-bold text-nowrap">دوره‌ها</h5>
                                        <span class="text-white fs-3">10</span>
                                    </div>
                                    <!-- more information text -->
                                    <div class="position-absolute bottom-0 bg-dark bg-opacity-25 end-0 w-100 text-center p-1">
                                        <a href="#" class="text-light text-decoration-none">اطلاعات بیشتر
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" fill="#fff"
                                                      d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- card 3 -->
                            <div class="col-xxl-4 col-lg-4 col-12 my-2 col-sm-6">
                                <div class="bg-primary rounded-3 py-4 px-3 d-flex align-items-center justify-content-between position-relative overflow-hidden">
                                    <div class="">
                                        <h5 class="text-white fw-bold text-nowrap">مجموع تیکت‌ها</h5>
                                        <span class="text-white fs-3">20</span>
                                    </div>
                                    <!-- more information text -->
                                    <div class="position-absolute bottom-0 bg-dark bg-opacity-25 end-0 w-100 text-center p-1">
                                        <a href="#" class="text-light text-decoration-none">اطلاعات بیشتر
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" fill="#fff"
                                                      d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end cards -->
                    <!-- start table -->
                    <div class="container-fluid">
                        <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100">
                            <div class="p-2 w-100">
                                <span class="fw-bold fs-5 w-100">وضعیت</span>
                            </div>
                            <table class="table table-borderless border-top border-secondary-subtle">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>دوره</th>
                                    <th>مدرس</th>
                                    <th>تصویر</th>
                                    <th>شروع</th>
                                    <th>وضعیت</th>
                                    <th class="text-nowrap">درصد یادگیری</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="fw-bold">1</td>
                                    <td class="text-nowrap">پایتون</td>
                                    <td class="text-nowrap">جادی میرمیرانی</td>
                                    <td>
                                        <div class="bg-primary rounded-circle" style="height: 35px; width: 35px;">
                                        </div>
                                    </td>
                                    <td class="text-nowrap">10 بهمن 1402</td>
                                    <td>
                                        <div class="badge bg-success">گذرانده شده</div>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar w-100 bg-success">100%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">2</td>
                                    <td class="text-nowrap">هک و امنیت</td>
                                    <td class="text-nowrap">ارسلان خسروی</td>
                                    <td>
                                        <div class="bg-primary rounded-circle" style="height: 35px; width: 35px;">
                                        </div>
                                    </td>
                                    <td class="text-nowrap">10 مهر 1402</td>
                                    <td>
                                        <div class="badge bg-danger">گذرانده نشده</div>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar w-0 bg-danger">0%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">2</td>
                                    <td class="text-nowrap">بوت استرپ</td>
                                    <td class="text-nowrap">امیر محمد صالحی</td>
                                    <td>
                                        <div class="bg-primary rounded-circle" style="height: 35px; width: 35px;">
                                        </div>
                                    </td>
                                    <td class="text-nowrap">10 فروردین 1403</td>
                                    <td>
                                        <div class="badge bg-warning">درحال یادگیری</div>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar w-25 bg-warning">25%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">1</td>
                                    <td class="text-nowrap">جاوا اسکریپت</td>
                                    <td class="text-nowrap">احمد چاجی</td>
                                    <td>
                                        <div class="bg-primary rounded-circle" style="height: 35px; width: 35px;">
                                        </div>
                                    </td>
                                    <td class="text-nowrap">21 آبان 1402</td>
                                    <td>
                                        <div class="badge bg-warning">درحال یادگیری</div>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar w-75 bg-warning">75%</div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                    <!-- end table -->
                </main>
            </div>

        <?php } elseif (isset($_GET['page'])) {
            //users
            if ($_GET['page'] == "user") {?>
                <div class="col-lg-10 p-0">
                    <main>
                        <?php
                        $users = new user();
                        $users = $users->select_users();
                        ?>
                        <!-- title -->
                        <div class="py-4 px-3">
                            <h2>کاربران</h2>
                        </div>


                        <!-- start table -->
                        <div class="container-fluid">
                            <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100">

                                <div class="p-2 w-100">
                                    <div class="d-flex justify-content-between align-items-center  w-100">
                                        <a href="#" class="btn btn-primary">اضافه کردن کاربر جدید</a>
                                        <div>
                                            <span class="">مجموعه کاربران: </span>
                                            <span class="fw-bold"><?= count($users); ?></span>
                                        </div>
                                    </div>
                                    <!--                            <span class="fw-bold fs-5 w-100">وضعیت</span>-->
                                </div>
                                <table class="table table-borderless border-top border-secondary-subtle">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>نام کاربری</th>
                                        <th>ایمیل</th>
                                        <th>موبایل</th>
                                        <th>نقش کاربر</th>
                                        <!--                                        <th class="text-nowrap">درصد یادگیری</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $counter = 0;
                                    foreach ($users as $user) :
                                        $counter++; ?>
                                        <tr>
                                            <!--counter-->
                                            <td class="fw-bold"><?= $counter; ?></td>
                                            <!-- name -->
                                            <td class="text-nowrap"><?= $user->name; ?></td>
                                            <!-- username -->
                                            <td class="text-nowrap"><?= $user->username; ?></td>
                                            <!-- email -->
                                            <td class="text-nowrap"><?= $user->email; ?></td>
                                            <!-- mobile -->
                                            <td class="text-nowrap"><?= $user->mobile == null ? 'وارد نشده' : $user->mobile; ?></td>
                                            <!-- role -->
                                            <td class="text-nowrap"><?php if($user->role == "admin")echo 'مدیر'; elseif($user->role == 'user') echo 'کاربر'; elseif($user->role == 'writer') echo 'نویسنده'; ?></td>
                                            <td class="text-nowrap d-flex gap-2">
                                                <a href="">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg" stroke="#0a9900">

                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                           stroke-linejoin="round"/>

                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M20.1498 7.93997L8.27978 19.81C7.21978 20.88 4.04977 21.3699 3.32977 20.6599C2.60977 19.9499 3.11978 16.78 4.17978 15.71L16.0498 3.84C16.5979 3.31801 17.3283 3.03097 18.0851 3.04019C18.842 3.04942 19.5652 3.35418 20.1004 3.88938C20.6356 4.42457 20.9403 5.14781 20.9496 5.90463C20.9588 6.66146 20.6718 7.39189 20.1498 7.93997V7.93997Z"
                                                                  stroke="#0a9900" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>

                                                    </svg>
                                                </a>
                                                <a href="#">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">

                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                           stroke-linejoin="round"/>

                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M10 11V17" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M14 11V17" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M4 7H20" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                                  stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                                  stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>

                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                        <!-- end table -->

                    </main>
                </div>

                <!--posts-->
            <?php } elseif ($_GET['page'] == "post") { ?>
                <div class="col-lg-10 p-0">
                    <main>
                        <?php
                        $posts = new post();
                        $posts = $posts->select_posts();
                        ?>
                        <!-- title -->
                        <div class="py-4 px-3">
                            <h2>پست ها</h2>
                        </div>


                        <!-- start table -->
                        <div class="container-fluid">
                            <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100">

                                <div class="p-2 w-100">
                                    <div class="d-flex justify-content-between align-items-center  w-100">
                                        <a href="#" class="btn btn-primary">اضافه کردن پست جدید</a>
                                        <div>
                                            <span class="">مجموع پست ها: </span>
                                            <span class="fw-bold"><?= count($posts); ?></span>
                                        </div>
                                    </div>
                                    <!--                            <span class="fw-bold fs-5 w-100">وضعیت</span>-->
                                </div>
                                <table class="table table-borderless border-top border-secondary-subtle">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان</th>
                                        <th>دسته بندی</th>
                                        <th>نویسنده</th>
                                        <th>توضیحات</th>
                                        <th>تاریخ انتشار</th>
                                        <!--                                        <th class="text-nowrap">درصد یادگیری</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $counter = 0;
                                    foreach ($posts as $post) :
                                        $counter++; ?>
                                        <tr>
                                            <!--                                            counter-->
                                            <td class="fw-bold"><?= $counter; ?></td>
                                            <!--                                            title-->
                                            <td class="text-nowrap"><?= $post->title; ?></td>
                                            <td class="text-nowrap"><?php echo (new category())->select_category('id = ' . $post->category_id)->name; ?></td>
                                            <td class="text-nowrap"><?php echo (new user())->select_user('id = ' . $post->user_id)->username; ?></td>
                                            <td class="text-nowrap"><?= mb_substr($post->des, 0, 30); ?>...</td>
                                            <td class="text-nowrap"><?= $post->create_date; ?></td>
                                            <td class="text-nowrap d-flex gap-2">
                                                <a href="">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg" stroke="#0a9900">

                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                           stroke-linejoin="round"/>

                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M20.1498 7.93997L8.27978 19.81C7.21978 20.88 4.04977 21.3699 3.32977 20.6599C2.60977 19.9499 3.11978 16.78 4.17978 15.71L16.0498 3.84C16.5979 3.31801 17.3283 3.03097 18.0851 3.04019C18.842 3.04942 19.5652 3.35418 20.1004 3.88938C20.6356 4.42457 20.9403 5.14781 20.9496 5.90463C20.9588 6.66146 20.6718 7.39189 20.1498 7.93997V7.93997Z"
                                                                  stroke="#0a9900" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>

                                                    </svg>
                                                </a>
                                                <a href="#">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">

                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                           stroke-linejoin="round"/>

                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M10 11V17" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M14 11V17" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M4 7H20" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                                  stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                                  stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>

                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                        <!-- end table -->

                    </main>
                </div>

                <!--categories-->
            <?php } elseif ($_GET['page'] == "category") { ?>
                <div class="col-lg-10 p-0">
                    <main>
                        <?php
                        $categories = new category();
                        $categories = $categories->select_categories();
                        ?>
                        <!-- title -->
                        <div class="py-4 px-3">
                            <h2>دسته بندی</h2>
                        </div>


                        <!-- start table -->
                        <div class="container-fluid">
                            <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100">

                                <div class="p-2 w-100">
                                    <div class="d-flex justify-content-between align-items-center  w-100">
                                        <a href="#" class="btn btn-primary">اضافه کردن دسته جدید</a>
                                        <div>
                                            <span class="">مجموعه دسته ها: </span>
                                            <span class="fw-bold"><?= count($categories); ?></span>
                                        </div>
                                    </div>
                                    <!--                            <span class="fw-bold fs-5 w-100">وضعیت</span>-->
                                </div>
                                <table class="table table-borderless border-top border-secondary-subtle">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>تعداد پست ها</th>
                                        <!--                                        <th class="text-nowrap">درصد یادگیری</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $counter = 0;
                                    foreach ($categories as $category) :
                                        $counter++; ?>
                                        <tr>
                                            <!--counter-->
                                            <td class="fw-bold"><?= $counter; ?></td>
                                            <!-- name -->
                                            <td class="text-nowrap"><?= $category->name; ?></td>
                                            <!-- post counts -->
                                            <td class="text-nowrap "><?= count((new post())->select_posts('category_id = '.$category->id)) ?></td>
                                           <td class="text-nowrap d-flex gap-2">
                                                <a href="">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg" stroke="#0a9900">

                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                           stroke-linejoin="round"/>

                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M20.1498 7.93997L8.27978 19.81C7.21978 20.88 4.04977 21.3699 3.32977 20.6599C2.60977 19.9499 3.11978 16.78 4.17978 15.71L16.0498 3.84C16.5979 3.31801 17.3283 3.03097 18.0851 3.04019C18.842 3.04942 19.5652 3.35418 20.1004 3.88938C20.6356 4.42457 20.9403 5.14781 20.9496 5.90463C20.9588 6.66146 20.6718 7.39189 20.1498 7.93997V7.93997Z"
                                                                  stroke="#0a9900" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>

                                                    </svg>
                                                </a>
                                                <a href="#">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">

                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                           stroke-linejoin="round"/>

                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M10 11V17" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M14 11V17" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M4 7H20" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                                  stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                                  stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>

                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                        <!-- end table -->

                    </main>
                </div>
                <!--comments-->
            <?php } elseif ($_GET['page'] == "comment") {  ?>
                <div class="col-lg-10 p-0">
                    <main>
                        <?php
                        $comments = new comment();
                        $comments = $comments->select_comments();
                        ?>
                        <!-- title -->
                        <div class="py-4 px-3">
                            <h2>کامنت ها</h2>
                        </div>


                        <!-- start table -->
                        <div class="container-fluid">
                            <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100">

                                <div class="p-2 w-100">
                                    <div class="d-flex justify-content-between align-items-center  w-100">
<!--                                        <a href="#" class="btn btn-primary">اضافه کردن کامنت ج</a>-->
                                        <div>
                                            <span class="">مجموعه کامنت ها: </span>
                                            <span class="fw-bold"><?= count($comments); ?></span>
                                        </div>
                                    </div>
                                    <!--                            <span class="fw-bold fs-5 w-100">وضعیت</span>-->
                                </div>
                                <table class="table table-borderless border-top border-secondary-subtle">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>کاربر</th>
                                        <th>پست</th>
                                        <th>محتوا</th>
                                        <th>وضعیت</th>
                                        <th>تاریخ ثبت</th>
                                        <!--                                        <th class="text-nowrap">درصد یادگیری</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $counter = 0;
                                    foreach ($comments as $comment) :
                                        $counter++; ?>
                                        <tr>
                                            <!--counter-->
                                            <td class="fw-bold"><?= $counter; ?></td>
                                            <!-- user -->
                                            <td class="text-nowrap"><?= (new user)->select_user('id = '.$comment->user_id)->username ?></td>
                                            <!--content-->
                                            <td class="text-nowrap"><?= (new user)->select_user('id = '.$comment->user_id)->username ?></td>
                                            <!-- post  -->
                                            <td class="text-nowrap "><?= mb_substr($comment->content,0,20) ?>...</td>
                                            <!--status-->
                                            <td class="text-nowrap"><?= $comment->status ? 'فعال' : 'غیر فعال ' ?></td>
                                            <!--date-->
                                            <td class="text-nowrap"><?= $comment->create_date ?></td>
                                            <td class="text-nowrap d-flex gap-2">
                                                <a href="">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg" stroke="#0a9900">

                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                           stroke-linejoin="round"/>

                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M20.1498 7.93997L8.27978 19.81C7.21978 20.88 4.04977 21.3699 3.32977 20.6599C2.60977 19.9499 3.11978 16.78 4.17978 15.71L16.0498 3.84C16.5979 3.31801 17.3283 3.03097 18.0851 3.04019C18.842 3.04942 19.5652 3.35418 20.1004 3.88938C20.6356 4.42457 20.9403 5.14781 20.9496 5.90463C20.9588 6.66146 20.6718 7.39189 20.1498 7.93997V7.93997Z"
                                                                  stroke="#0a9900" stroke-width="1.5"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>

                                                    </svg>
                                                </a>
                                                <a href="#">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">

                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                           stroke-linejoin="round"/>

                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M10 11V17" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M14 11V17" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M4 7H20" stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                                                  stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                                  stroke="#f00000" stroke-width="2"
                                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>

                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                        <!-- end table -->

                    </main>
                </div>
            <?php }
        } ?>

    </div>
</div>

<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>