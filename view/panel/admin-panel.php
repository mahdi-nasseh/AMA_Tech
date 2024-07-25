<?php
require_once "../../auto_load.php";
$user = new user();
if (isset($_GET['logout'])){
    unset($_SESSION['user_id']);
    header('location=./../index.php');
}
if (isset($_SESSION['user_id'])) {
    $user = $user->select_user("id =" . $_SESSION['user_id']);
    if ($user->role == "admin") {
        $role = "مدیر";
    } else if ($user->role == "writer") {
        header('location: ./writer-panel.php');
    } else if ($user->role == "user") {
        header('location: ./user-panel.php');
    }
} else
    header('location: ./../index.php');
$mass = false;
if (isset($_GET['page']) && isset($_GET['delete'])){
    $table = $_GET['page'];
    $id = (int) $_GET['delete'];
    if ($table == 'user')
        $mass = (new user)->remove($id);
    else if ($table == 'post') {
        @$delImg = (new post)->select_post("id = {$_GET['delete']}");
        @$delImg = $delImg->thumbnail;
        @unlink('../upload/' . $delImg);
        $mass = (new post)->remove($id);
    }
    else if ($table == 'category')
        $mass = (new category)->remove($id);
    else if ($table == 'comment')
        $mass = (new comment)->remove($id);
    else
        header('location: admin-panel.php');
}
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

        <div class="col-lg-10 p-0">
            <?php if ($mass) : ?>
                <div class="alert alert-success mt-3 mx-3">عملیات حذف با موفقیت انجام شد.</div>
            <?php endif ?>
            <?php if ($mass === 0) : ?>
                <div class="alert alert-danger mt-3 mx-3">عملیات حذف انجام نشد.</div>
            <?php endif ?>
            <!--home-->
            <?php if (!isset($_GET['page'])) : ?>
                <main>
                    <!-- title -->
                    <div class="pt-4 px-3">
                        <h2><?= $user->name; ?> شما مدیر هستید. 🙌</h2>
                    </div>
                    <?php
                    $users = new user();
                    $users = $users->select_users();
                    ?>
                    <!-- title -->
                    <div class="pt-4 px-3">
                        <h2>کاربران اخیر</h2>
                    </div>
                    <!-- start table -->
                    <div class="container-fluid">
                        <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100">
                            <div class="p-2 w-100">
                                <div class="d-flex justify-content-between align-items-center w-100 px-2">
                                    <a href="user.php?action=add" class="btn btn-primary">اضافه کردن کاربر جدید</a>
                                    <div>
                                        <span class="">مجموعه کاربران: </span>
                                        <span class="fw-bold"><?= count($users); ?></span>
                                    </div>
                                </div>
                                <!--<span class="fw-bold fs-5 w-100">وضعیت</span>-->
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
                                    <!--<th class="text-nowrap">درصد یادگیری</th>-->
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
                                        <td class="text-nowrap"><?php if ($user->role == "admin") echo 'مدیر'; elseif ($user->role == 'user') echo 'کاربر'; elseif ($user->role == 'writer') echo 'نویسنده'; ?></td>
                                        <td class="text-nowrap d-flex gap-2">
                                            <a href="user.php?action=<?= $user->id ?>">
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
                                            <a href="admin-panel.php?page=user&delete=<?= $user->id ?>">
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
                <!--users-->
            <?php elseif (isset($_GET['page'])) :
                if ($_GET['page'] == "user") :?>
                    <main>
                        <?php
                        $users = new user();
                        $users = $users->select_users();
                        ?>
                        <!-- title -->
                        <div class="pt-4 px-3">
                            <h2>کاربران</h2>
                        </div>
                        <!-- start table -->
                        <div class="container-fluid">
                            <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100 px-2">
                                <div class="p-2 w-100">
                                    <div class="d-flex justify-content-between align-items-center  w-100">
                                        <a href="user.php?action=add" class="btn btn-primary">اضافه کردن کاربر جدید</a>
                                        <div>
                                            <span class="">مجموعه کاربران: </span>
                                            <span class="fw-bold"><?= count($users); ?></span>
                                        </div>
                                    </div>
                                    <!--<span class="fw-bold fs-5 w-100">وضعیت</span>-->
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
                                        <!--<th class="text-nowrap">درصد یادگیری</th>-->
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
                                            <td class="text-nowrap"><?php if ($user->role == "admin") echo 'مدیر'; elseif ($user->role == 'user') echo 'کاربر'; elseif ($user->role == 'writer') echo 'نویسنده'; ?></td>
                                            <td class="text-nowrap d-flex gap-2">
                                                <a href="user.php?action=<?= $user->id ?>">
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
                                                <a href="admin-panel.php?page=user&delete=<?= $user->id ?>">
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
                    <!--posts-->
                <?php elseif ($_GET['page'] == "post") : ?>
                    <main>
                        <?php
                        $posts = new post();
                        $posts = $posts->select_posts();
                        ?>
                        <!-- title -->
                        <div class="pt-4 px-3">
                            <h2>پست ها</h2>
                        </div>
                        <!-- start table -->
                        <div class="container-fluid">
                            <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100 px-2">
                                <div class="p-2 w-100">
                                    <div class="d-flex justify-content-between align-items-center  w-100">
                                        <a href="post.php?action=add" class="btn btn-primary">اضافه کردن پست جدید</a>
                                        <div>
                                            <span class="">مجموع پست ها: </span>
                                            <span class="fw-bold"><?= count($posts); ?></span>
                                        </div>
                                    </div>
                                    <!--<span class="fw-bold fs-5 w-100">وضعیت</span>-->
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
                                        <!--<th class="text-nowrap">درصد یادگیری</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $counter = 0;
                                    foreach ($posts as $post) :
                                        $counter++; ?>
                                        <tr>
                                            <!--counter-->
                                            <td class="fw-bold"><?= $counter; ?></td>
                                            <!--title-->
                                            <td class="text-nowrap"><?= $post->title; ?></td>
                                            <td class="text-nowrap"><?php echo (new category())->select_category('id = ' . $post->category_id)->name; ?></td>
                                            <td class="text-nowrap"><?php echo (new user())->select_user('id = ' . $post->user_id)->username; ?></td>
                                            <td class="text-nowrap"><?= mb_substr($post->des, 0, 30); ?>...</td>
                                            <td class="text-nowrap"><?= $post->create_date; ?></td>
                                            <td class="text-nowrap d-flex gap-2">
                                                <a href="post.php?action=<?= $post->id ?>">
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
                                                <a href="admin-panel.php?page=post&delete=<?= $post->id ?>">
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
                    <!--categories-->
                <?php elseif ($_GET['page'] == "category") : ?>
                    <main>
                        <?php
                        $categories = new category();
                        $categories = $categories->select_categories();
                        ?>
                        <!-- title -->
                        <div class="pt-4 px-3">
                            <h2>دسته بندی ها</h2>
                        </div>
                        <!-- start table -->
                        <div class="container-fluid">
                            <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100 px-2">
                                <div class="p-2 w-100">
                                    <div class="d-flex justify-content-between align-items-center  w-100">
                                        <a href="#" class="btn btn-primary">اضافه کردن دسته جدید</a>
                                        <div>
                                            <span class="">مجموعه دسته ها: </span>
                                            <span class="fw-bold"><?= count($categories); ?></span>
                                        </div>
                                    </div>
                                    <!--<span class="fw-bold fs-5 w-100">وضعیت</span>-->
                                </div>
                                <table class="table table-borderless border-top border-secondary-subtle">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>تعداد پست ها</th>
                                        <!--<th class="text-nowrap">درصد یادگیری</th>-->
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
                                            <td class="text-nowrap "><?= count((new post())->select_posts('category_id = ' . $category->id)) ?></td>
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
                                                <a href="admin-panel.php?page=category&delete=<?= $category->id ?>">
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
                    <!--comments-->
                <?php elseif ($_GET['page'] == "comment") : ?>
                    <main>
                        <?php
                        $comments = new comment();
                        $comments = $comments->select_comments();
                        ?>
                        <!-- title -->
                        <div class="pt-4 px-3">
                            <h2>کامنت ها</h2>
                        </div>
                        <!-- start table -->
                        <div class="container-fluid">
                            <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100 px-2">

                                <div class="p-2 w-100">
                                    <div class="d-flex justify-content-between align-items-center  w-100">
                                        <!--<a href="#" class="btn btn-primary">اضافه کردن کامنت ج</a>-->
                                        <div>
                                            <span class="">مجموعه کامنت ها: </span>
                                            <span class="fw-bold"><?= count($comments); ?></span>
                                        </div>
                                    </div>
                                    <!--<span class="fw-bold fs-5 w-100">وضعیت</span>-->
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
                                        <!--<th class="text-nowrap">درصد یادگیری</th>-->
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
                                            <td class="text-nowrap"><?= (new user)->select_user('id = ' . $comment->user_id)->username ?></td>
                                            <!--content-->
                                            <td class="text-nowrap"><?= (new user)->select_user('id = ' . $comment->user_id)->username ?></td>
                                            <!-- post  -->
                                            <td class="text-nowrap "><?= mb_substr($comment->content, 0, 20) ?>...</td>
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
                                                <a href="admin-panel.php?page=comment&delete=<?= $comment->id ?>">
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
                <?php endif;endif; ?>
        </div>
    </div>
</div>

<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>