

<html>
<head>
<title>Welcome Staff</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="banner">
<div class="container">

<?php
include_once 'staffheader.php';
include_once 'includes/patcheck.inc.php';
include_once 'includes/vischeck.inc.php';
?>



<div class="banner-text">
<h1><span>Welcome</span></h1>


<form action="includes/checkin.inc.php" method="post">
  <div class="form-row">
  <div class="form-group col-md-6 text-box">
    <input type="text" class="form-control" name="patID" placeholder="Patient ID">
  </div>
  <div class="form-group col-md-6 text-box">
    <input type="text" class="form-control" name="reason" placeholder="Reason for Visit">
  </div>
  <div class="form-group col-md-6">
    <button type="submit" name="submit" class="btn btn-success">Check In</button>
  </div>
</div>
</form>

<?php
include_once 'includes/patientdat.inc.php';
?>


</div>
<div class="clearfix"></div>
</div>
</div>

<?php
include_once 'footer.php';
?>

</body>
</html>
