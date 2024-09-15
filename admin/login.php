<?php
require_once 'connection.php';

if (isset($_SESSION['user'])) {
    header("location:admin1.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sub'])) {
    $user = test_input($_POST['user']);
    $pass = test_input($_POST['pass']); 

    $q = $db->prepare("SELECT * FROM admin WHERE user = :user AND pass = :pass");
    $q->execute(['user' => $user, 'pass' => $pass]);

    $res = $q->fetch(PDO::FETCH_OBJ);
    if ($res) {
        $_SESSION['user'] = $user;
        header("Location: admin1.html");
        exit();
    } else {
        echo "<script>alert('Invalid credentials, please try again.')</script>";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
