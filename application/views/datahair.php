<!DOCTYPE html>
<html>
<title>SalonManagement</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<link rel="stylesheet" href="<?php echo base_url('assets/carcareoffice/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('assets/carcareoffice/bower_components/font-awesome/css/font-awesome.min.css') ?>">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url('assets/carcareoffice/bower_components/Ionicons/css/ionicons.min.css') ?>">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('assets/carcareoffice/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('assets/carcareoffice/dist/css/AdminLTE.min.css') ?>">
<!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url('assets/carcareoffice/dist/css/skins/_all-skins.min.css') ?>">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Raleway", sans-serif
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        /* background-color: #f2f2f2 */
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }
</style>

<body class="w3-white">
    

    <!-- Top container -->
    <div class="w3-bar w3-top w3-indigo w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">
            <i class="fa fa-bars"></i> &nbsp;เมนู</button>
        <span class="w3-bar-item w3-left">SalonManagement</span>

    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-light-blue w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="<?php echo base_url('assets/home/img/beauty-salon.png') ?>" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <h3>"ชื่อร้านนั้นๆ"</h3>
                <!-- <span>"ชื่อร้านนั้นๆ"</span> -->
                <!-- <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a> -->
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
            <form action="<?php echo base_url('datahair/create') ?>" method="POST" class="register-form" id="register-form">
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">
                <i class="fa fa-remove fa-fw"></i>&nbsp; ปิดเมนู</a>
            <a href="back" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw"></i>&nbsp; หน้าแรก</a>
            <a href="tb_time" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>&nbsp; ตารางเวลา</a>
            <a href="datahair" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>&nbsp; ข้อมูลช่างทำผม</a>
            <a href="dataservice" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>&nbsp; ข้อมูลบริการ</a>
            <!-- <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>&nbsp; Geo</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>&nbsp; Orders</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>&nbsp; News</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>&nbsp; General</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>&nbsp; History</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>&nbsp; Settings</a><br><br> -->
        </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <div class="w3-row">
                <div class="w3-col" style="width:75%">
                    <p>
                    </p>
                </div>
                <!-- Button trigger modal -->
                <div class="w3-col" style="width:25%" >
                <button type="button" href="<?php echo base_url('datahair/create') ?>" class="btn btn-primary pull-right waves-effect waves-light"  data-toggle="modal" data-target="#modalCart">เพิ่ม</button>
                <!-- Modal: modalCart -->
                <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลช่าง</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Body -->
    
      
      <div class="col-md-12"> <br />
      <form  name="addproduct" action="" method="post" enctype="multipart/form-data"  class="form-horizontal">
      <div class="form-group">
      <div class="col-sm-12">
            <p> ชื่อช่าง</p>
            <input type="text"  name="name_employee" id="name_employee" class="form-control" required placeholder="ชื่อช่าง" >
      </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> ทักษะ </p>
            <!-- <input name="name_skill" id="name_skill"  class="form-control" type="text"   required placeholder="ทักษะ"> -->
            <select class="form-control" name="select" id="select" required>
            <option >เลือกทักษะ</option>
            <?php foreach ($select as $value) {?>
            <option value='<?php echo $value->servicename?>'></option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-7" >
            <button href="<?php echo base_url('datahair/index')?>" type="submit" class="btn btn-primary  " name="btnadd"> เพิ่ม </button>
            <input type="hidden"  name="method" > 
          </div>
        </div>
      </form>
      </div>
      </div>

                </div>
            </div>


        </header>
        <br>
        <div style="overflow-x:auto;">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <!-- <th>ลำดับ</th> -->
                        <th>รายชื่อช่าง</th>
                        <th>ทักษะเฉพาะ</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>


                </thead>

                <?php foreach ($read as $value) { ?>
                    <tbody>
                        <tr>
                            <!-- <td><?php echo $value->id_skill ?></td> -->
                            <td><?php echo $value->name_employee ?></td>
                            <td><?php echo $value->name_skill ?></td>
                            



                            
                            <td><a href="<?php echo base_url('datahair/update/' . $value->id_skill) ?>" >
                            <span>แก้ไข</span>
                            <td><a href="<?php echo base_url('datahair/delete/' . $value->id_skill) ?>" >
                            <span>ลบ</span>
                        </a></td>
                           
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>



        <!-- End page content -->
    </div>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }

        $(function() {

            $('#confirm-delete').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.clickDelete').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('dataservice/delete') ?>" + '/' + $(this).attr('href'),
                    data: '',
                    dataType: "json",
                    success: function(obj) {
                        location.reload();
                    }
                });
            });

            $('#nav-marketing, #nav-profileuser').addClass('active');






        });
    </script>

</body>

</html>