<?php
$username = "";
$password_1 = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['register'])) {
    $username = mysql_real_escape_string($_POST['username']);
    $password_1 = mysql_real_escape_string($_POST['password_1']);
    $password_2 = mysql_real_escape_string($_POST['password_2']);
    $role = mysql_real_escape_string($_POST['role']);
    $date_created = mysql_real_escape_string($_POST['date_created']);

    if (emty($username)) {
        array_push($errors, "Username is required");
    }
    if (emty($password_1)) {
        array_push($errors, "Password is required");
    }
    if (emty($role)) {
        array_push($errors, "Role is required");
    }
    if (emty($date_created)) {
        array_push($errors, "Date is required");
    }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    if (count($errors) == 0) {
        $password = md5($password_1);
        $sql = "INSERT INTO users (username, password, role, date_created) VALUES ('$username', '$password', '$role', '$date_created')";
        mysqli_query($db, $sql);
    }
}
?>