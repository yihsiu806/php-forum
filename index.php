<?php @include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $siteName ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header class="row bg-secondary py-3">
            <div class="col align-self-center fs-1 fw-bold text-light"><?php echo $siteName ?></div>
            <div class="col-auto align-self-center">
                <a href="sign-up.php">
                    <button type="button" class="btn btn-outline-light">Sign up</button>
                </a>
                <a href="login.php">
                    <button type="button" class="btn btn-light">Login</button>
                </a>
            </div>
        </header>
        <div class="row">
            <main></main>
            <section></section>
        </div>
        <footer class="row"></footer>
    </div>
    <script src="index.js"></script>
</body>
</html>