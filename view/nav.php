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
            <a class="me-3 py-2 link-body-emphasis text-decoration-none <?= isset($_GET['cat_id']) && $category->id == $_GET['cat_id'] ? 'fw-bold' : '' ?>" href="index.php?<?= isset($search) ? "search=$search&" : '' ?>cat_id=<?= $category->id ?>"><?= $category->name ?></a>
        <?php endforeach; ?>
    </div>
    <form method="get" action="index.php" class="btn-search mt-1 d-flex justify-content-center align-items-center">
        <label for="search" style="cursor: pointer">
            <button type="submit" class="btn">
                <img width="25" src="assets/icons/search.svg" class="mx-2" alt="search">
            </button>
        </label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($search ?? '', ENT_QUOTES) ?>" name="search" id="search" placeholder="جست و جو">
        <?php if (isset($_GET['ca
        t_id'])): ?>
            <input type="hidden" name="cat_id" class="form-control" value="<?= htmlspecialchars($_GET['cat_id'], ENT_QUOTES) ?>">
        <?php endif; ?>
    </form>
    <div class="mt-1">
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="auth.php" class="badge text-bg-secondary mx-3 text-decoration-none py-2 pb-3 px-3" style="font-size: 16px">ورود</a>
        <?php else: ?>
            <a href="panel/index.php"><img class="mx-4 link-body-emphasis" src="assets/icons/profile.png" alt="person-circle" width="35"></a>
        <?php endif; ?>
    </div>
</nav>
