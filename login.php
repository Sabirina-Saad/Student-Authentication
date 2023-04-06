<?php

session_start();

if (isset($_POST['submit'])) {

    require 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_stmt_init($conn);
$stmt->execute( array($username) );
$rows = $stmt->fetchAll();
if (count($rows) > 0) {
  $password_hash = hash('sha256', $password . $rows[0]['password']); //Encrypt the password
  $stmt = $pdo->prepare("SELECT password=? AS password_matches 
                         FROM user WHERE username = ?");
  $stmt->execute( array($password_hash, $username) );
  $rows = $stmt->fetchAll();
   if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['password']);
                if ($passCheck == false) {
                    header("Location: ../index.php?error=wrongpass");
                    exit();
                } elseif ($passCheck == true) {
                    session_start();
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionUser'] = $row['username'];
                    header("Location: ../index.php?success=loggedin");
                    exit();
                }
  if ($rows[0]['password_matches'] > 0) {
    // username and password are correct
    header("Location: ../index.php?error=wrong username and password");
                    exit();
  } else {
    // password was wrong
    header("Location: ../index.php?error=wrongpass");
                    exit();
  }
} else {
  // username was not found
  header("Location: ../index.php?error=user not found");
                    exit();
}
}
}

?>