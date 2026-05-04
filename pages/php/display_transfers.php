<?php
class Transfer {
  private $name;
  private $account;
  private $amount;

  public function __construct($name, $account, $amount) {
    $this->setName($name);
    $this->setAccount($account);
    $this->setAmount($amount);
  }

  public function setName($name) { $this->name = $name; }
  public function getName() { return $this->name; }

  public function setAccount($account) { $this->account = $account; }
  public function getAccount() { return $this->account; }

  public function setAmount($amount) { $this->amount = $amount; }
  public function getAmount() { return $this->amount; }
}

$transfers = [
  new Transfer("Ali Hassan", "112233", 150.00),
  new Transfer("Sara Ahmed", "223344", 200.50),
  new Transfer("Omar Said", "334455", 75.25),
  new Transfer("Nora Salem", "445566", 300.00),
  new Transfer("Fatema Ali", "556677", 120.00)
];

function displayTransferTable($transfers) {
  echo '<table class="table table-bordered table-hover">';
  echo '<tr><th>Recipient Name</th><th>Account Number</th><th>Amount</th></tr>';

  foreach ($transfers as $transfer) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($transfer->getName()) . '</td>';
    echo '<td>' . htmlspecialchars($transfer->getAccount()) . '</td>';
    echo '<td>$' . htmlspecialchars(number_format($transfer->getAmount(), 2)) . '</td>';
    echo '</tr>';
  }

  echo '</table>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Transfers Using PHP Class</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow rounded-4">
      <div class="card-header bg-dark text-white fw-bold">Transfers Using PHP Class</div>
      <div class="card-body">
        <p>This page demonstrates a PHP class, an array of objects, and a function that displays data in an XHTML table.</p>
        <?php displayTransferTable($transfers); ?>
      </div>
    </div>
  </div>
</body>
</html>
