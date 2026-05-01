<?php
$recipient = $_POST["recipient"] ?? "";
$account = $_POST["account"] ?? "";
$amount = $_POST["amount"] ?? "";
$note = $_POST["note"] ?? "";

$error = "";

if (empty($recipient) || empty($account) || empty($amount)) {
  $error = "Please fill in all required fields.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Transfer Result</title>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
</head>

<body class="bg-light">

  <div class="container py-5">
    <div class="card shadow rounded-4">
      <div class="card-header bg-danger text-white fw-bold">
        Transfer Result
      </div>

      <div class="card-body">

        <?php if ($error): ?>
          <div class="alert alert-danger">
            <?php echo $error; ?>
          </div>
        <?php else: ?>

          <h5 class="mb-4">Transfer Information</h5>

          <table class="table table-bordered">
            <tr>
              <th>Recipient Name</th>
              <td><?php echo htmlspecialchars($recipient); ?></td>
            </tr>

            <tr>
              <th>Account Number</th>
              <td><?php echo htmlspecialchars($account); ?></td>
            </tr>

            <tr>
              <th>Amount</th>
              <td>$<?php echo htmlspecialchars($amount); ?></td>
            </tr>

            <tr>
              <th>Transfer Note</th>
              <td>
                <?php
                  if (empty($note)) {
                    echo "No note provided.";
                  } else {
                    echo htmlspecialchars($note);
                  }
                ?>
              </td>
            </tr>
          </table>

          <div class="alert alert-success">
            Transfer request submitted successfully.
          </div>

        <?php endif; ?>

        <a href="transfer.html" class="btn btn-secondary mt-3">
          Go Back
        </a>

      </div>
    </div>
  </div>

</body>
</html>
