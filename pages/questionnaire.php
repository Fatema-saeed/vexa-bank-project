<?php
include "db.php";

$fullName = $_POST["fullName"] ?? "";
$email = $_POST["studentEmail"] ?? "";
$age = $_POST["age"] ?? "";
$rating = $_POST["rating"] ?? "";
$services = $_POST["services"] ?? [];
$branch = $_POST["branch"] ?? "";
$feedback = $_POST["feedback"] ?? "";

$error = "";

if (
  empty($fullName) || empty($email) || empty($age) ||
  empty($rating) || empty($services) || empty($branch) || empty($feedback)
) {
  $error = "Please fill in all fields correctly.";
} else {

  $servicesStr = implode(", ", $services);

  $sql = "INSERT INTO questionnaire 
    (full_name, email, age, rating, services, branch, feedback)
    VALUES ('$fullName', '$email', '$age', '$rating', '$servicesStr', '$branch', '$feedback')";

  $conn->query($sql); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Questionnaire Result</title>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
</head>

<body class="bg-light">

  <div class="container py-5">
    <div class="card shadow rounded-4">
      <div class="card-header bg-danger text-white fw-bold">
        Questionnaire Result
      </div>

      <div class="card-body">

        <?php if ($error): ?>

          <div class="alert alert-danger">
            <?php echo htmlspecialchars($error); ?>
          </div>

        <?php else: ?>

          <h5 class="mb-4">Submitted Data</h5>

          <table class="table table-bordered">

            <tr>
              <th>Full Name</th>
              <td><?php echo htmlspecialchars($fullName); ?></td>
            </tr>

            <tr>
              <th>Email</th>
              <td><?php echo htmlspecialchars($email); ?></td>
            </tr>

            <tr>
              <th>Age</th>
              <td><?php echo htmlspecialchars($age); ?></td>
            </tr>

            <tr>
              <th>Rating</th>
              <td><?php echo htmlspecialchars($rating); ?></td>
            </tr>

            <tr>
              <th>Services Used</th>
              <td>
                <?php
                  echo htmlspecialchars(implode(", ", $services));
                ?>
              </td>
            </tr>

            <tr>
              <th>Preferred Branch</th>
              <td><?php echo htmlspecialchars($branch); ?></td>
            </tr>

            <tr>
              <th>Feedback</th>
              <td><?php echo htmlspecialchars($feedback); ?></td>
            </tr>

          </table>

          <div class="alert alert-success">
            Questionnaire submitted successfully!
          </div>

        <?php endif; ?>

        <a href="questionnaire.html" class="btn btn-secondary mt-3">
          Go Back
        </a>

      </div>
    </div>
  </div>

</body>
</html>