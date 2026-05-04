<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = trim($_POST["recipient"] ?? "");
  $account = trim($_POST["account"] ?? "");
  $amount = trim($_POST["amount"] ?? "");
  $note = trim($_POST["note"] ?? "");

  if ($name === "" || $account === "" || $amount === "") {
    $message = "Please fill all required fields.";
  } elseif (!is_numeric($amount) || $amount <= 0) {
    $message = "Please enter a valid amount.";
  } else {
    $stmt = $conn->prepare("INSERT INTO transfers (recipient_name, account_number, amount, note, transfer_date) VALUES (?, ?, ?, ?, CURDATE())");
    $stmt->bind_param("ssds", $name, $account, $amount, $note);

    if ($stmt->execute()) {
      $message = "Transfer added successfully!";
    } else {
      $message = "Error: " . $conn->error;
    }
    $stmt->close();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Transfer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow rounded-4">
      <div class="card-header bg-danger text-white fw-bold">Add New Transfer</div>
      <div class="card-body">
        <form method="post">
          <div class="mb-3"><label class="form-label">Recipient Name</label><input type="text" name="recipient" class="form-control"></div>
          <div class="mb-3"><label class="form-label">Account Number</label><input type="text" name="account" class="form-control"></div>
          <div class="mb-3"><label class="form-label">Amount</label><input type="number" name="amount" class="form-control" step="0.01"></div>
          <div class="mb-3"><label class="form-label">Note</label><input type="text" name="note" class="form-control"></div>
          <button type="submit" class="btn btn-danger">Add Transfer</button>
        </form>
        <?php if ($message): ?><div class="alert alert-info mt-3"><?php echo htmlspecialchars($message); ?></div><?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
