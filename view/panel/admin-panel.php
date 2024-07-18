<?php
require_once "../../auto_load.php";
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
        <?php include 'sidebar.php'; ?>
        <!-- end sidebar -->
        <div class="col-lg-10 p-0">
            <main>
                <!-- title -->
                <div class="py-4 px-3">
                    <h2>محمد مهدی ناصح عزیز؛ خوش‌آمدی🙌</h2>
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
    </div>
</div>

<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>