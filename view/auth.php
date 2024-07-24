<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="description"
          content=" Today in this blog you will learn how to create a responsive Login & Registration Form in HTML CSS & JavaScript. The blog will cover everything from the basics of creating a Login & Registration in HTML, to styling it with CSS and adding with JavaScript."/>
    <meta
            name="keywords"
            content="
 Animated Login & Registration Form,Form Design,HTML and CSS,HTML CSS JavaScript,login & registration form,login & signup form,Login Form Design,registration form,Signup Form,HTML,CSS,JavaScript,
"
    />

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>AMA Tech | Login</title>
    <link rel="stylesheet" href="assets/css/auth.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<?php if (isset($_GET['err'])): $err = $_GET['err'] == 'notFindUser' ? 'نام کاربری یا رمز عبور اشتباه است' : 'لطفا مقدار فیلد ها را درست وارد کنید!';?>
    <div class="alert alert-danger position-absolute" style="width: 443px; top: 10px;right: 10px;"><?= $err ?></div>
<?php endif; ?>
<section class="wrapper active">
    <div class="form signup">
        <header>ثبت نام</header>
        <form action="../control/action.php" method="post">
            <input type="text" placeholder="نام" required name="name"/>
            <input type="text" placeholder="نام کاربری" required name="username"/>
            <input type="hidden" value="<?= NULL ?>" placeholder="موبایل" required name="tel"/>
            <input type="email" placeholder="ایمیل" required name="email">
            <input type="password" placeholder="رمز عبور" required name="password"/>
            <input type="submit" value="ثبت نام" name="signup"/>
        </form>
    </div>

    <div class="form login">
        <header>ورود</header>
        <form action="../control/action.php" method="post">
            <input type="text" placeholder="نام کاربری یا ایمیل یا موبایل" name="key" required/>
            <input type="password" placeholder="رمز عبور" required name="password"/>
            <a href="#">رمز عبور خود را فراموش کردید؟</a>
            <input type="submit" value="ورود" name="signin"/>
        </form>
    </div>

    <script>
        const wrapper = document.querySelector(".wrapper"),
            signupHeader = document.querySelector(".signup header"),
            loginHeader = document.querySelector(".login header");

        loginHeader.addEventListener("click", () => {
            wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
            wrapper.classList.remove("active");
        });
    </script>
</section>
</body>
</html>
