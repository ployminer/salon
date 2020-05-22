
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Make your reservation</title>

<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/colorlib-booking-12/css/bootstrap.min.css')?>">

<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/colorlib-booking-12/css/style.css')?>">


<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body>
<div id="booking" class="section">
<div class="section-center">
<div class="container">
<div class="row">
<div class="booking-form">
<div class="booking-bg"></div>
<form>
<div class="form-header">
<h2>จองบริการทำผม</h2>
</div>
<div class="form-group">
<span class="form-label">ชื่อลูกค้า</span>
<input class="form-control" type="text" placeholder="">
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<span class="form-label">วันที่</span>
<input class="form-control" type="date" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<span class="form-label">เวลา</span>
<input class="form-control" type="time" required>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<span class="form-label" >บริการ</span>
<select class="form-control">
<option  value="" selected hidden></option>
<option>สระผม</option>
<option>ตัดผม</option>
<option>ไดร์ผม</option>
<option>ทำสีผม</option>
<option>อบไอน้ำ</option>
</select>
<span class="select-arrow"></span>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<span class="form-label">ช่างทำผม</span>
<select class="form-control">
<option value="" selected hidden></option>
<option>1</option>
<option>2</option>
</select>
<span class="select-arrow"></span>
</div>
</div>
</div>

<div class="form-group">
<span class="form-label">โทรศัพท์</span>
<input class="form-control" type="tel" placeholder="">
</div>
<div class="form-btn">
<button class="submit-btn">ยืนยันการจอง</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="95745481af24249b34f31f57-text/javascript"></script>
<script type="95745481af24249b34f31f57-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="95745481af24249b34f31f57-|49" defer=""></script></body>
</html>