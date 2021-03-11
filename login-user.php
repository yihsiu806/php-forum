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
    }
    
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$post_username]);
    $row = $stmt->fetch();
    if (!isset($row['password'])) {
        $msg = "Invalid password or username.";
        header("Location: login.php?msg=".$msg);
        exit();
    }

    if (password_verify($post_password, $row['password'])) {
        header("Location: index.php?");
        echo "sueecess";
        exit();
    } else {
        $msg = "Invalid password or username....";
        header("Location: login.php?msg=".$msg);
        exit();
    }
?>