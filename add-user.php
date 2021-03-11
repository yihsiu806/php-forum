<?php @include('connect.php') ?>
<?php
    $post_username = $_POST['Username'];
    $post_password = $_POST['Password'];
    
    $post_username = stripslashes($post_username);
    $post_password = stripslashes($post_password);

    $hashed_post_password = password_hash($post_password, PASSWORD_DEFAULT);

    if (strlen($post_username) === 0) {
        $msg = "The username field cannot be empty!";
        header("Location: sign-up.php?msg=".$msg);
    } elseif (strlen($post_password) === 0) {
        $msg = "The password field cannot be empty!";
        header("Location: sign-up.php?msg=".$msg);
    } elseif (!ctype_alnum($post_username)) {
        $msg = "Username must only contain letters and numbers.";
        header("Location: sign-up.php?msg=".$msg);
    } else {
        // $sql = "SELECT COUNT(*) FROM users WHERE username=" . $post_username;
        // $count = $conn->exec($sql);
        // echo $count;
    }

    
?>