<?php
$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$message = $_POST["message"] ?? "";

$error = "";
if (empty($name) || empty($email) || empty($message)) {
  $error = "Please fill in all fields.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
</head>

<body class="bg-light">

  <div class="container py-5">
    <div class="card shadow rounded-4">
      <div class="card-header bg-dark text-white fw-bold">
        Contact Form Result
      </div>

      <div class="card-body">

        <?php if ($error): ?>
          <div class="alert alert-danger">
            <?php echo $error; ?>
          </div>
        <?php else: ?>

          <h5 class="mb-4">Submitted Information</h5>

          <table class="table table-bordered">
            <tr>
              <th>Name</th>
              <td><?php echo htmlspecialchars($name); ?></td>
            </tr>

            <tr>
              <th>Email</th>
              <td><?php echo htmlspecialchars($email); ?></td>
            </tr>

            <tr>
              <th>Message</th>
              <td><?php echo htmlspecialchars($message); ?></td>
            </tr>
          </table>

        <?php endif; ?>

        <a href="contact.html" class="btn btn-secondary mt-3">
          Go Back
        </a>

      </div>
    </div>
  </div>

</body>
</html>