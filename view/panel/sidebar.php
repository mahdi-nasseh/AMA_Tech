<?php
global $user;
if (isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 'home';
?>
<div class="col-lg-2 d-none d-lg-block p-0">
    <div class="shadow p-3 d-flex flex-column position-fixed h-100 w-inherit">
        <h1 class="fs-4 mt-2 fw-medium link-body-emphasis text-decoration-none ms-5"><a
                    class="text-decoration-none text-black" href="../index.php">AMA<span
                        class="text-danger fst-italic">T</span>ech</a></h1>
        <hr>
        <!--side var items -->
        <ul class="nav nav-pills d-block mb-auto">
            <!-- home -->
            <li class="nav-item">
                <a href="<?= $user->role ?>-panel.php" class="nav-link d-flex gap-2 align-items-center <?= $page == 'home' ? 'active': 'text-black'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-house-door" viewBox="0 0 16 16">
                        <path
                                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z">
                        </path>
                    </svg>
                    <span>خانه</span>
                </a>
            </li>
            <?php if ($user->role == 'admin'): ?>
            <!-- users -->
            <li class="nav-item">
                <a href="./<?= $user->role ?>-panel.php?page=user" class="nav-link d-flex gap-2 align-items-center <?= $page == 'user' ? 'active': 'text-black'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                    </svg>
                    <span>کاربران</span>
                </a>
            </li>
            <?php endif; ?>

            <!-- posts-->
            <li class="nav-item">
                <a href="<?= $user->role ?>-panel.php?page=post" class="nav-link d-flex gap-2 align-items-center <?= $page == 'post' ? 'active': 'text-black'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-newspaper" viewBox="0 0 16 16">
                        <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z"/>
                        <path d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z"/>
                    </svg>
                    <span>پست‌ها</span>
                </a>
            </li>
            <?php if ($user->role == 'admin'): ?>
            <!-- category-->
            <li class="nav-item">
                <a href="<?= $user->role ?>-panel.php?page=category" class="nav-link d-flex gap-2 align-items-center <?= $page == 'category' ? 'active': 'text-black'; ?>">
                    <svg fill="none" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                        <g stroke="#292d32" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                           stroke-width="1.5">
                            <path d="m19 2h-2c-2 0-3 1-3 3v2c0 2 1 3 3 3h2c2 0 3-1 3-3v-2"/>
                            <path d="m5 22h2c2 0 3-1 3-3v-2c0-2-1-3-3-3h-2c-2 0-3 1-3 3v2"/>
                            <path d="m6 10c2.20914 0 4-1.79086 4-4s-1.79086-4-4-4-4 1.79086-4 4 1.79086 4 4 4z"/>
                            <path d="m18 22c2.2091 0 4-1.7909 4-4s-1.7909-4-4-4-4 1.7909-4 4 1.7909 4 4 4z"/>
                        </g>
                    </svg>
                    <span>دسته بندی ها</span>
                </a>
            </li>
            <?php endif; ?>
            <!-- comments -->
            <li class="nav-item">
                <a href="<?= $user->role ?>-panel.php?page=comment" class="nav-link d-flex gap-2 align-items-center <?= $page == 'comment' ? 'active': 'text-black'; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-chat-dots" viewBox="0 0 16 16">
                        <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                        <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"/>
                    </svg>
                    <span>کامنت‌ها</span>
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a class="btn btn btn-danger mx-2 float-end d-inline" href="<?= $user->role ?>-panel.php?logout=true">خروج</a>
            <a class="btn btn btn-primary mx-2 float-end d-inline" href="user.php?action=<?= $_SESSION['user_id'] ?>">تغییر پروفایل</a>
        </div>
    </div>
</div>
