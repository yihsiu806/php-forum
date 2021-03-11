<?php @include('connect.php') ?>
<?php @include('session.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign up - <?php echo $siteName ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form.css">
</head>
<body class="text-center">
    <?php 
        if (isset($_GET['msg'])) {
            echo '<div class="mb-5 alert alert-danger" role="alert">' . $_GET['msg'] . "</div>";
        }
    ?>
    <main>
        <h1><?php echo $siteName ?></h1>
        <h2>Sign up</h2>
        <form class="mt-5" method="post" action="add-user.php">
            <input type="text" class="form-control mb-3" name="Username" placeholder="Username">
            <input type="password" class="form-control mb-4" name="Password" placeholder="Password">
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </main>
</body>
</html>