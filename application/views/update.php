
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>salon</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
 
<!-- <!DOCTYPE html>
<html lang="en"> -->

<body>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6"> <br />
      <h4 align="center"><?php echo $title?></h4>
      <hr/>
      <form  name="addproduct" action="<?php echo base_url('dataservice/update/' .$con->id_service) ?>" method="post" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="hidden" id="email_shopowner" name="email_shopowner">
            <p> ชื่อบริการ</p>
            <input type="text"  name="servicename" id="servicename" class="form-control" required placeholder="ชื่อบริการ" value="<?php echo $con->servicename?>" >
          </div>
        </div>
        <?php echo $con->servicename?>
        <div class="form-group">
          <div class="col-sm-12">
            <p> ระยะเวลาการทำ (นาที) </p>
            <input name="time" id="time"  class="form-control" type="int"   required placeholder="ระยะเวลาการทำ" value="<?php echo $con->time?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3">
            <p> ราคา (บาท) </p>
            <input type="int"  name="priceservice" id="priceservice"  class="form-control" required placeholder="ราคา" value="<?php echo $con->priceservice?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
          <button href="<?php echo base_url('dataservice/index')?>" type="submit" class="btn btn-primary" name="btnadd"> อัพเดต </button>
            <input type="hidden"  name="method" > 
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>