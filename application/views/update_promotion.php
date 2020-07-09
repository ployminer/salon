
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
      <form  name="addproduct" action="<?php echo base_url('promotion/update_promotion/' .$con->id_promotion) ?>" method="post" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="hidden" id="email_shopowner" name="email_shopowner">
            <p> โปรโมชัน </p>
            <input type="text"  name="promotion" id="promotion" class="form-control" required placeholder="โปรโมชัน" value="<?php echo $con->promotion?>" >
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
          <button href="<?php echo base_url('promotion/index')?>" type="submit" class="btn btn-primary" name="btnadd"> อัพเดต </button>
            <input type="hidden"  name="method" > 
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>