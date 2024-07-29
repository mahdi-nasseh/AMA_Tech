<?php
require_once "../../auto_load.php";
$user = new user();
if (isset($_GET['logout'])){
    unset($_SESSION['user_id']);
    header('location=./../index.php');
}
if (isset($_SESSION['user_id'])) {
    $user = $user->select_user("id =" . $_SESSION['user_id']);
    if ($user->role != "user")
        header('location: ./index.php');
} else
    header('location: ./index.php');

$mass = false;
if (isset($_GET['delete'])){
    $table = $_GET['page'];
    $id = (int) $_GET['delete'];
    if ($table == 'comment')
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

<div class="container-fluid" >
    <div class="row px-2">
        <div class="p-0 m-0">
            <?php if ($mass) : ?>
            <?php if ($mass == false): ?>
                <div class="alert alert-danger mt-3 mx-3">عملیات حذف انجام نشد.</div>
            <?php else : ?>
                <div class="alert alert-success mt-3 mx-3">عملیات حذف با موفقیت انجام شد.</div>
            <?php endif ?>
            <?php endif ?>
            <!-- title -->
            <div class="pt-4 px-3">
                <h2 class="d-inline"><?= $user->name; ?> خوش آمدید</h2>
                <a class="btn btn btn-danger mx-2 float-end d-inline" href="<?= $user->role ?>-panel.php?logout=true">خروج</a>
                <a class="btn btn btn-primary mx-2 float-end d-inline" href="user.php?action=<?= $_SESSION['user_id'] ?>">تغییر پروفایل</a>

            </div>
            <!--home-->
                <main>
                    <?php
                    $like_posts = new post();
                    $like_posts = $like_posts->select_user_likes($_SESSION['user_id']);
                    ?>
                    <!-- title -->
                    <div class="pt-4 px-3">
                        <h2>پست هایی که لایک کردید</h2>
                    </div>
                    <!-- start table -->
                    <div class="container-fluid">
                        <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100 px-2">
                            <div class="p-2 w-100">
                                <div class="d-flex justify-content-between align-items-center  w-100">
                                    <div>
                                        <span class="">مجموع پست ها: </span>
                                        <span class="fw-bold"><?= count($like_posts); ?></span>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-borderless border-top border-secondary-subtle">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>تصویر</th>
                                    <th>عنوان</th>
                                    <th>دسته بندی</th>
                                    <th>توضیحات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $counter = 0;
                                $posts = [];
                                foreach ($like_posts as $index => $like_post) {
                                    $new_posts[] = (new post())->select_posts("id = {$like_post->post_id}");
                                    $posts = array_merge($posts, $new_posts[$index]);
                                }
                                foreach ($posts as $post) :
                                    $counter++;?>
                                    <tr>
                                        <!--counter-->
                                        <td class="fw-bold"><?= $counter; ?></td>
                                        <!--title-->
                                        <td class="text-nowrap"><img width="65" src="../upload/<?= $post->thumbnail; ?>" alt="img"></td>
                                        <td class="text-nowrap"><a class="text-black text-decoration-none" target="_blank" href="./../single.php?id=<?= $post->id; ?>"><?= $post->title; ?></a></td>
                                        <td class="text-nowrap"><?php echo (new category())->select_category('id = ' . $post->category_id)->name; ?></td>
                                        <td class="text-nowrap"><?= mb_substr($post->des, 0, 30); ?>...</td>
                                    </tr>
                                <?php endforeach;?>

                                </tbody>
                            </table>
                        </section>
                    </div>
                    <!-- end table -->
                </main>
                <main>
                    <?php
                        $comments = (new comment())->select_comments('user_id=' . $_SESSION['user_id']);
                    ?>
                    <!-- title -->
                    <div class="pt-4 px-3">
                        <h2>کامنت های شما</h2>
                    </div>
                    <!-- start table -->
                    <div class="container-fluid">
                        <section class="border border-secondary-subtle rounded-3 mt-4 table-responsive w-100 px-2">

                            <div class="p-2 w-100">
                                <div class="d-flex justify-content-between align-items-center  w-100">
                                    <div>
                                        <span class="">مجموعه کامنت ها: </span>
                                        <span class="fw-bold"><?= count($comments); ?></span>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-borderless border-top border-secondary-subtle">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>پست</th>
                                    <th>محتوا</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ثبت</th>
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
                                        <!-- post -->
                                        <td class="text-nowrap"><a class="text-black text-decoration-none" target="_blank" href="./../single.php?id=<?= $comment->post_id ?>"><?= (new post)->select_post('id = ' . $comment->post_id)->title ?></a></td>
                                        <!-- content -->
                                        <td class="text-nowrap"><?= mb_substr($comment->content, 0, 50) ?>...</td>
                                        <!--status-->
                                        <td class="text-nowrap"><?php if ($comment->status): ?>
                                                <p class="btn" style="width: 110px">تایید نشده</p>
                                            <?php else: ?>
                                                <p class="btn" style="width: 110px">تایید شده</p>
                                            <?php endif; ?>
                                        </td>
                                        <!--date-->
                                        <td class="text-nowrap"><?= $comment->create_date ?></td>
                                        <td class="text-nowrap d-flex gap-2">
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
        </div>
    </div>
</div>

<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>