<?php
include "db.php";

$results = [];
$searchName = trim($_GET["name"] ?? "");

if (isset($_GET["search"])) {
  $likeName = "%" . $searchName . "%";
  $stmt = $conn->prepare("SELECT id, recipient_name, account_number, amount, note, transfer_date FROM transfers WHERE recipient_name LIKE ?");
  $stmt->bind_param("s", $likeName);
  $stmt->execute();
  $query = $stmt->get_result();

  while ($row = $query->fetch_assoc()) {
    $results[] = $row;
  }
  $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Transfers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow rounded-4">
      <div class="card-header bg-dark text-white fw-bold">Search Transfers</div>
      <div class="card-body">
        <form method="get" class="row g-3 mb-4">
          <div class="col-md-9">
            <input type="text" name="name" class="form-control" placeholder="Enter recipient name" value="<?php echo htmlspecialchars($searchName); ?>">
          </div>
          <div class="col-md-3 d-grid">
            <button type="submit" name="search" class="btn btn-danger">Search</button>
          </div>
        </form>

        <?php if (isset($_GET["search"])): ?>
          <?php if (!empty($results)): ?>
            <table class="table table-bordered table-hover">
              <tr><th>ID</th><th>Name</th><th>Account</th><th>Amount</th><th>Note</th><th>Date</th></tr>
              <?php foreach ($results as $row): ?>
                <tr>
                  <td><?php echo htmlspecialchars($row["id"]); ?></td>
                  <td><?php echo htmlspecialchars($row["recipient_name"]); ?></td>
                  <td><?php echo htmlspecialchars($row["account_number"]); ?></td>
                  <td><?php echo htmlspecialchars($row["amount"]); ?></td>
                  <td><?php echo htmlspecialchars($row["note"]); ?></td>
                  <td><?php echo htmlspecialchars($row["transfer_date"]); ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          <?php else: ?>
            <div class="alert alert-warning">No matching transfers found.</div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
