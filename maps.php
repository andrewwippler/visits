<?php
session_start();
ini_set("display_errors", "1");
ERROR_REPORTING(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
	<title>NSBC Soulwinning Call Generator | Maps</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/style.css" rel="stylesheet" media="screen">
</head>
<body>
  <div id="wrap">
    <div class="container">
      <?php
      $apiKey = '';
      $visits = array();
            // 0 = name
            // 1 = lname
            // 2 = phone
            // 3 = Address1
            // 4 = city
            // 5 = state
            // 6 = zip
            // 7 = Parent's name
            // 8 = Pickup time
            // 9 = Neighborhood
      $myfile = fopen($_FILES['theFile']['tmp_name'], 'r');
      //$myfile = fopen('test.txt', 'r');
      while ($visit = fgetcsv($myfile, 1000, "\t")) {
          if ($visit[0] == "" || $visit[0] == stripos('first', $visit[0])) {
              continue;
          }

          // check to see if it has full address, if not, add it in
          if ($visit[4] != '' && $visit[5] != '' && $visit[6] != '') {
              $curAddress = urlencode("$visit[3] $visit[4], $visit[5] $visit[6]");
              $printAddress = "$visit[3]<br /> $visit[4], $visit[5] $visit[6]";
          } else {
              $curAddress = urlencode($visit[3] . ' Duluth, MN 55811');
              $printAddress = $visit[3] . '<br />Duluth, MN 55811';
          } ?>
      <div class="visit">
      <div id="map" style="width:800px;height:500px;">
        <a src="http://maps.googleapis.com/maps/api/staticmap?center=<?php print $curAddress; ?>&zoom=16&size=800x500&markers=<?php print $curAddress; ?>&sensor=false&key=<?php print $apiKey; ?>"></a></div><br />
      <table>
      <tr>
        <td width="150">Name:</td>
        <td><?php print $visit[0] . ' ' . $visit[1]; ?></td>
      </tr>
      <tr valign="top">
        <td>Address:</td>
        <td><?php echo $printAddress; ?></td>
      </tr>
      <tr>
        <td>Phone:</td>
        <td><?php print $visit[2]; ?></td>
      </tr>
      <tr height="40">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Visited By:</td>
        <td>___________________________________________</td>
      </tr>
      <tr height="40">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Date Visited:</td>
        <td>___________________________________________</td>
      </tr>
      <tr height="40">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="top">
        <td>Comments:</td>
        <td>___________________________________________________________________________________<br /><br />
            ___________________________________________________________________________________<br /><br />
            ___________________________________________________________________________________<br /></td>
      </tr>
      </table>
      </div>
      <div class="page-break"></div>
      <?php
      }
      ?>
    </div>
    <div id="push"></div>
  </div>
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
  $(document).ready(function() {
    myInterval = setInterval(function() {
      map = $("#map a").first();
      if (map.length == 0) {
        clearMyInterval();
      }
      src = map.attr('src');
      map.replaceWith('<img src="'+src+'" />');
    }, 4500);
    function clearMyInterval() {
      clearInterval(myInterval);
    }
  });
  </script>
</body>
</html>
