<!DOCTYPE html>
<html>
<head>
	<title>NSBC Soulwinning Call Generator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/style.css" rel="stylesheet" media="screen">
</head>
<body>
  <div id="wrap">
    <div class="container">
      <div class="page-header">
        <h1>NSBC Soulwinning Call Generator</h1>
      </div>
      <div class="alert alert-info">
        <strong>UPDATED: </strong>All the visits will be displayed on the next page when you click "Create Maps." Just print that page and visits will print one per page. Since the maps take a few seconds to generate make sure to scroll all the way to the bottom to ensure all the maps have generated.
      </div>
      <b>Please select a file</b>
      <form name"fileform" method="post" enctype="multipart/form-data" action="maps.php">
        <p><input type="file" name="theFile" size="20" /></p>
        <input class="btn btn-large btn-primary" type="submit" name="submit" value="Create Maps" />
      </form>
      <p>
      Note: File must be tab-delimited text, without a header row, <br />
      and contain the following fields (in the exact order listed below.)
      </p>
      <ul>
        <li>First Name</li>
        <li>Last Name</li>
        <li>Main/Home Phone</li>
        <li>Address Line 1</li>
        <li>City</li>
				<li>State</li>
				<li>Zip</li>

      </ul>
    </div>
    <div id="push"></div>
  </div>
  <div id="footer">
    <div class="container">
      <p class="muted credit">
        &copy; <?php echo date("Y"); ?> Northstar Baptist Church
      </p>
    </div>
  </div>
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
