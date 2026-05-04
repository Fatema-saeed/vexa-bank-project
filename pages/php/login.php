<?php
include "db.php";

$email = trim($_POST["email"] ?? "");
$password = trim($_POST["password"] ?? "");
$error = "";
$user = null;

if ($email === "" || $password === "") {
  $error = "Please enter both email and password.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error = "Invalid email format.";
} else {
  $stmt = $conn->prepare("SELECT username, email, role FROM users WHERE email = ? AND password = ?");
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if (!$user) {
    $error = "Invalid email or password.";
  }
  $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Result</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow rounded-4">
      <div class="card-header bg-danger text-white fw-bold">Login Result</div>
      <div class="card-body">
        <?php if ($error): ?>
          <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php else: ?>
          <div class="alert alert-success">Login successful.</div>
          <table class="table table-bordered">
            <tr><th>Username</th><td><?php echo htmlspecialchars($user["username"]); ?></td></tr>
            <tr><th>Email</th><td><?php echo htmlspecialchars($user["email"]); ?></td></tr>
            <tr><th>Role</th><td><?php echo htmlspecialchars($user["role"]); ?></td></tr>
            <tr><th>Password</th><td>Hidden for security</td></tr>
          </table>
        <?php endif; ?>
        <a href="login.html" class="btn btn-secondary mt-3">Go Back</a>
      </div>
    </div>
  </div>
</body>
</html>
