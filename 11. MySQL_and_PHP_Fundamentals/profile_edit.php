<?php
require_once "app.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$query = <<<SQL
SELECT id, username, email, birthday
FROM users
WHERE username = ?
SQL;
$stmt = $db->prepare($query);
$stmt->execute(
  [
    $_POST['username'],
  ]
);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $userService = new UserService($db);
    $userService->edit(
      $data['id'],
      $data,
      $_POST['email'],
      $_POST['username'],
      new DateTime($_POST['birthDate']),
      $_POST['password'],
      $_POST['passwordConfirm']
    );
    header("Location: users.php");
    exit;
}

include "frontend/profile_edit_frontend.php";