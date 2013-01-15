<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drupal Detection App</title>
<meta name="keywords" content="Jonathan Cohen, Drupal, Detection, Isovera">
<meta name="description" content="Jonathan Cohen's Drupal Detection App, made for Isovera">
<style>
#wrapper {text-align:center;}
table {margin-left:35%;}
</style>
</head>
<body>
<div id="wrapper">
<h1>Drupal Detection App</h1>
<p>Please load CSV spreadsheet (spreadsheet MUST be a CSV file) here with the URLs you wish to detect Drupal with.  The spreadsheet should be formatted with the URLs entered all on the same row, like this:</p>

<table border="1">
  <tr>
    <td>http://example1.com</td><td>http://example2.com</td><td>http://example3.com</td>
  </tr>
</table>

<br>

<form enctype="multipart/form-data" name="uploadURLs" action="isdrup.php" method="post">
  <p>Please upload your file here:</p>
  <input type="file" name="uploadedURLs" size="30" >
  <br>
  <br>
  <input type="submit" value="Submit URLs">
</form>
</div>
</body>
</html>