<?php
include_once 'config.php';

    $Email = isset($_POST['useremail'])? $_POST['useremail']:NULL;
    $Password = md5(isset($_POST['userpassword'])? $_POST['userpassword']:NULL);

    $sql = "SELECT id, email, name, phone FROM  `table_user`  WHERE email = ? AND password = ?";
    $q = $conn->prepare($sql);
    $q->execute(array($Email, $Password));
    $find = $q->rowCount();
    if ($find == 1) {
        $result = $q->fetch();
        //echo $result ["First_name"];
        $_SESSION['user_email'] = $result["email"];
        $_SESSION['name'] = $result["name"];

        $_SESSION['id'] = $result["id"];
        $_SESSION['phone']=$result["phone"];
        //echo "yes";
        header('location: admin.php');
    } else {
        $_SESSION['msg']="Invalid Email Or Password!";
        header('location: login.php');
    }
?>