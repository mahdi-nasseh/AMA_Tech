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
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>AMA Tech</title>
</head>

<body>

<div class="container-fluid">
    <div class="row">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg border-bottom border-secondary-subtle">
            <div class="container-fluid">
                <span class="navbar-brand text-dark-emphasis">پیش‌خوان</span>
                <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#Offcanvas">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start d-lg-none " id="Offcanvas">
                    <div class=" p-3 d-flex flex-column w-100 overflow-y-auto h-100">
                        <button type="button" class="btn-close " data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        <img src="./assets/img/logotype.svg" alt="">
                        <hr>
                        <ul class="nav nav-pills d-block mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link d-flex gap-2 align-items-center active">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                        <path
                                                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z">
                                        </path>
                                    </svg>
                                    <span class="">خانه</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link text-dark d-flex gap-2 align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-speedometer2 text-dark-emphasis"
                                         viewBox="0 0 16 16">
                                        <path
                                                d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z">
                                        </path>
                                        <path fill-rule="evenodd"
                                              d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3">
                                        </path>
                                    </svg>
                                    <span class="text-dark-emphasis">داشبورد</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link text-dark d-flex gap-2 align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-bag text-dark-emphasis"
                                         viewBox="0 0 16 16">
                                        <path
                                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z">
                                        </path>
                                    </svg>
                                    <span class="text-dark-emphasis">سفارش</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link text-dark d-flex gap-2 align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-book text-dark-emphasis"
                                         viewBox="0 0 16 16">
                                        <path
                                                d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783">
                                        </path>
                                    </svg>
                                    <span class="text-dark-emphasis">دوره‌ها</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link text-dark d-flex gap-2 align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-person text-dark-emphasis"
                                         viewBox="0 0 16 16">
                                        <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z">
                                        </path>
                                    </svg>
                                    <span class="text-dark-emphasis">مشتریان</span>
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                               class="text-decoration-none text-dark-emphasis d-flex align-items-center gap-2 dropdown-toggle">
                                <div class="p-img bg-primary rounded-circle" style="width: 2rem; height: 2rem;">
                                </div>
                                <span class="fw-bold text-dark-emphasis">محمد مهدی ناصح</span>
                            </a>
                            <ul class="dropdown-menu" data-bs-placement="bottom">
                                <li><a href="" class="dropdown-item">پروژه جدید</a></li>
                                <li><a href="" class="dropdown-item">تنظیمات</a></li>
                                <li><a href="" class="dropdown-item">پروفایل</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a href="" class="dropdown-item">خروج</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- finish nav -->

        <main>
            <!-- title (name and welcome) -->
            <div class="py-4 px-3">
                <h2>محمد مهدی ناصح عزیز؛ خوش‌آمدی🙌</h2>
            </div>
            <!-- start cards -->
            <div class="container">
                <div class="row">
                    <!-- cards -->

                    <!-- card 1 -->
                    <div class="col-xxl-4 col-lg-4 col-12 my-2 col-sm-6">
                        <div
                                class="bg-info rounded-3 py-4 px-3 d-flex align-items-center justify-content-between position-relative overflow-hidden">
                            <div class="">
                                <h5 class="text-white fw-bold text-nowrap">پیشرفت کاربر</h5>
                                <span class="text-white fs-3">53%</span>
                            </div>
                            <!-- grow icon -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="117" height="51"
                                     viewBox="0 0 117 51" fill="none">
                                    <g filter="url(#filter0_f_3_639)">
                                        <circle cx="107" cy="20" r="5" fill="#fff"></circle>
                                    </g>
                                    <path
                                            d="M1 49.5L8.5 26.5L17 37L22 19.5L31 37L44.5 3L57.5 26.5L72 19.5L83.5 31L93.5 6.5L101 19.5H108"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"></path>
                                    <defs>
                                        <filter id="filter0_f_3_639" x="97" y="10" width="20" height="20"
                                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                                     result="shape"></feBlend>
                                            <feGaussianBlur stdDeviation="2.5"
                                                            result="effect1_foregroundBlur_3_639"></feGaussianBlur>
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                            <!-- more information text -->
                            <div
                                    class="position-absolute bottom-0 bg-dark bg-opacity-25 end-0 w-100 text-center p-1">
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

                    <!-- card2 -->
                    <div class="col-xxl-4 col-lg-4 col-12 my-2 col-sm-6">
                        <div
                                class="bg-danger rounded-3 py-4 px-3 d-flex align-items-center justify-content-between position-relative overflow-hidden">
                            <div class="">
                                <h5 class="text-white fw-bold text-nowrap">دوره‌ها</h5>
                                <span class="text-white fs-3">10</span>
                            </div>
                            <!-- grow icon -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="117" height="51"
                                     viewBox="0 0 117 51" fill="none">
                                    <g filter="url(#filter0_f_3_639)">
                                        <circle cx="107" cy="20" r="5" fill="#fff"></circle>
                                    </g>
                                    <path
                                            d="M1 49.5L8.5 26.5L17 37L22 19.5L31 37L44.5 3L57.5 26.5L72 19.5L83.5 31L93.5 6.5L101 19.5H108"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"></path>
                                    <defs>
                                        <filter id="filter0_f_3_639" x="97" y="10" width="20" height="20"
                                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                                     result="shape"></feBlend>
                                            <feGaussianBlur stdDeviation="2.5"
                                                            result="effect1_foregroundBlur_3_639"></feGaussianBlur>
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                            <!-- more information text -->
                            <div
                                    class="position-absolute bottom-0 bg-dark bg-opacity-25 end-0 w-100 text-center p-1">
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
                        <div
                                class="bg-primary rounded-3 py-4 px-3 d-flex align-items-center justify-content-between position-relative overflow-hidden">
                            <div class="">
                                <h5 class="text-white fw-bold text-nowrap">مجموع تیکت‌ها</h5>
                                <span class="text-white fs-3">20</span>
                            </div>
                            <!-- grow icon -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="117" height="51"
                                     viewBox="0 0 117 51" fill="none">
                                    <g filter="url(#filter0_f_3_639)">
                                        <circle cx="107" cy="20" r="5" fill="#fff"></circle>
                                    </g>
                                    <path
                                            d="M1 49.5L8.5 26.5L17 37L22 19.5L31 37L44.5 3L57.5 26.5L72 19.5L83.5 31L93.5 6.5L101 19.5H108"
                                            stroke="#fff" stroke-width="2" stroke-linecap="round"></path>
                                    <defs>
                                        <filter id="filter0_f_3_639" x="97" y="10" width="20" height="20"
                                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                                     result="shape"></feBlend>
                                            <feGaussianBlur stdDeviation="2.5"
                                                            result="effect1_foregroundBlur_3_639"></feGaussianBlur>
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                            <!-- more information text -->
                            <div
                                    class="position-absolute bottom-0 bg-dark bg-opacity-25 end-0 w-100 text-center p-1">
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
            <!-- finished cards -->

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
            <!-- finish table -->


        </main>

        <div class="dropdown">
            <button class="btn dropdown-toggle btn-primary dropdown position-fixed bottom-0 end-0 me-3 mb-3"
                    data-bs-toggle="dropdown">
                تغییر تم
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item active" id="light-theme">روشن</li>
                <li class="dropdown-item" id="dark-theme">تاریک</li>
            </ul>
        </div>

    </div>


    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script>
        let btnDarkMode = document.querySelector("#dark-theme");
        let btnlightMode = document.querySelector("#light-theme");
        // let currentTheme = document.documentElement.getAttribute('data-bs-theme');

        btnlightMode.addEventListener('click', function () {
            console.log('clicked on dark theme btn');
            btnDarkMode.classList.remove('active');
            btnlightMode.classList.add('active');
            document.documentElement.setAttribute('data-bs-theme', 'light');
            localStorage.setItem('themeMode', 'light');
        });
        btnDarkMode.addEventListener('click', function () {
            console.log('clicked on light theme btn');
            btnDarkMode.classList.add('active');
            btnlightMode.classList.remove('active');
            document.documentElement.setAttribute('data-bs-theme', 'dark');
            localStorage.setItem('themeMode', 'dark');
        });


        if (localStorage.getItem('themeMode') == 'dark') {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
            btnDarkMode.classList.add('active');
            btnlightMode.classList.remove('active');
        } else {
            document.documentElement.setAttribute('data-bs-theme', 'light');
            btnDarkMode.classList.remove('active');
            btnlightMode.classList.add('active');
        }
    </script>
</body>

</html>