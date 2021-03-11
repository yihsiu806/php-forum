<?php @include('connect.php') ?>
<?php @include('session.php') ?>

<?php
    $post_username = $_POST['Username'];
    $post_password = $_POST['Password'];
    
    $post_username = stripslashes($post_username);
    $post_password = stripslashes($post_password);

    $hashed_post_password = password_hash($post_password, PASSWORD_DEFAULT);

    if (empty($post_username)) {
        $msg = "The username field cannot be empty!";
        header("Location: sign-up.php?msg=".$msg);
        exit();
    } elseif (empty($post_password)) {
        $msg = "The password field cannot be empty!";
        header("Location: sign-up.php?msg=".$msg);
        exit();
    } elseif (!ctype_alnum($post_username)) {
        $msg = "Username must only contain letters and numbers.";
        header("Location: sign-up.php?msg=".$msg);
        exit();
    } elseif (strlen($post_username) >= 30 || !preg_match("/^[a-zA-Z-]+$/", $post_username)) {
        $msg = "Username must only contain letters and numbers.";
        header("Location: sign-up.php?msg=".$msg);
        exit();
    }
    
    $sql = "SELECT COUNT(*) FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$post_username]);
    $count = $stmt->fetchColumn();
    if ($count != 0) {
        $msg = "Username already exist.";
        header("Location: sign-up.php?msg=".$msg);
        exit();
    }

    try {
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$post_username, $hashed_post_password]);
        $stmt->fetch();
    } catch (PDOException $e) {
        header("Location: sign-up.php?msg=".$e->getMessage());
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign up - <?php echo $siteName ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form.css">
</head>
<body class="text-center">
    <main>
        <h1><?php echo $siteName ?></h1>
        <h2>Registration success!</h2>
        <a href="login.php">
            <button type="button" class="btn btn-primary mt-5 mb-3">Login</button>
        </a>
    </main>
</body>
</html>