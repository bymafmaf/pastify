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
        <textarea id="message-box" class="form-control" placeholder="Message" name="content"></textarea>
      </div>
      <div class="form-group">
        <label for="address-input">Address</label>
        <input class="form-control" id="address-input" aria-describedby="addressHelp" placeholder="wednesday-notes" name="id" required pattern="[a-zA-Z0-9]+">
        <small id="addressHelp" class="form-text text-muted">The address you'll share will look like this: <span id="user-address"></span></small>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button class="btn" id="clean-button">Clean</button>
    </form>
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
