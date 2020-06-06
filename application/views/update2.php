
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
      <h4 align="center">แก้ไขข้อมูล</h4>
      <hr/>
      <form  name="addproduct" action="<?php echo base_url('datahair/update/' .$con->id_skill) ?>" method="post" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <p> ชื่อช่าง</p>
            <input type="text"  name="name_employee" id="name_employee" class="form-control" required placeholder="ชื่อบริการ" value="<?php echo $con->name_employee?>" >
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> ทักษะ </p>
<<<<<<< Updated upstream
            <!-- <input name="name_skill" id="name_skill"  class="form-control" type="int"   required placeholder="ทักษะ" value="<?php echo $con->name_skill?>"> -->
            <select class="form-control" name="select" id="select" required>
            <option >เลือกทักษะ</option>
            <?php foreach ($select as $value) {?>
            <option value='<?php echo $value->email_shopowner?>'><?php echo $value->servicename?></option>
=======
            <select class="form-control" name="select" id="select" required>
            <option >เลือกทักษะ</option>
            <?php foreach ($update_select as $value) {?>
            <option value='<?php echo $value->servicename?>'><?php echo $value->servicename?></option>
>>>>>>> Stashed changes
            <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
          <button href="<?php echo base_url('datahair/index')?>" type="submit" class="btn btn-primary" name="btnadd"> อัพเดต </button>
            <input type="hidden"  name="method" > 
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>