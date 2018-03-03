<?
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pastify_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = (isset($_POST["id"]) ? $_POST["id"] : $_GET["id"]);
$content = (isset($_POST["content"]) ? $_POST["content"] : "");
$days = (isset($_POST["days"]) ? $_POST["days"] : "");
$newUrlText = FALSE;
// Handle submission of new content
if ($content != "") {
  $isNewCreation = TRUE;
  $creation_date = date("Y-m-d H:i:s");

  $sql = "INSERT INTO DOCUMENTS (id, content, creation_date, days_to_persist)
  VALUES ('{$id}', '{$content}', '{$creation_date}', '{$days}')";

  if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$sql = "SELECT id, content, creation_date, days_to_persist FROM DOCUMENTS WHERE id = '{$id}'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $content = $row["content"];
  $creation_date = new DateTime($row["creation_date"]);
  $days = $row["days_to_persist"];
}
$expiringDate = $creation_date->add(new DateInterval("P${days}D"));
$leftDays = $expiringDate->diff(new DateTime())->days;
$url =  "{$_SERVER["REQUEST_SCHEME"]}://{$_SERVER['HTTP_HOST']}{$_SERVER["PHP_SELF"]}";
$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sticky Footer Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sticky-footer.css" rel="stylesheet">
</head>

<body>

  <!-- Begin page content -->
  <main role="main" class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="mt-5">Pastify</h1>
        <p class="lead">Paste whatever you need to the following box and share with your friends.</p>
      </div>
    </div>
    <form action="share.php" method="post">
      <div class="form-group">
        <textarea id="message-box" class="form-control" placeholder="Message" name="content" readonly><? echo $content; ?></textarea>
      </div>
      <div class="form-group">
        <label for="address-input">Address</label>
        <input class="form-control" id="address-input" aria-describedby="addressHelp" placeholder="wednesday-notes" name="id" value="<? echo $id; ?>" readonly>
        <small id="addressHelp" class="form-text text-muted">The address you'll share will look like this: <span id="user-address"></span></small>
      </div>
      <div class="form-group">
        <label for="days-to-persist">Life</label>
        <input class="form-control" id="days-to-persist" aria-describedby="daysHelp" value="<? echo $leftDays; ?>" name="days" readonly>
        <small id="daysHelp" class="form-text text-muted">Remaining uration of life for this page.</small>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button class="btn" id="clean-button">Clean</button>
    </form>
    <div class="row">
      <div class="col-md-12">
        <p class="lead"><? echo "You can share the following link to share this page with your friends: {$escaped_url}?id={$id}"; ?></p>
      </div>
    </div>
  </main>

  <footer class="footer">
    <div class="container">
      <span class="text-muted">@2018 Muvaffak Onus</span>
    </div>
  </footer>
  <script src="js/jquery-3.2.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/app.js"></script>
</body>
</html>
