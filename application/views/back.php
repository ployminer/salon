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
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> &nbsp;เมนู</button>
        <span class="w3-bar-item w3-left">SalonManagement</span>

    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-light-blue w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="<?php echo base_url('assets/home/img/beauty-salon.png')?>" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
            <?php foreach ($read as $value) {?>
                <h3><?php echo $value->name_shop?></h3>
                <?php } ?>
                <!-- <span>ยินดีต้อนรับ</span><br>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a> -->
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">
                <i class="fa fa-remove fa-fw"></i>&nbsp; ปิดเมนู</a>
            <a href="back" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw"></i>&nbsp; หน้าแรก</a>
            <a href="dataservice" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>&nbsp; ข้อมูลบริการ</a>
            <a href="datahair" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>&nbsp; ข้อมูลช่างทำผม</a>
            <a href="tb_time" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>&nbsp; ตารางเวลา</a>
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
        <!-- <header class="w3-container" style="padding-top:22px">
            <div class="w3-row">
            <div class="w3-col" style="width:75%">
                    <p>
                        <h4><b><i class="fa fa-dashboard"></i></b></h4>
                    </p>
                </div>
                <div class="w3-col" style="width:25%">
                    <p><a href="<?php echo base_url('clinicoffice/blog/create') ?>" class="btn btn-default pull-right">
                            <span class="fa fa-plus">เพิ่ม</span>
                        </a></p>
                </div>
            </div>


        </header> -->

        <div class="w3-container w3-center w3-animate-top">
            <h1>ยินดีต้อนรับ</h1>
            <p>The w3-animate-top class slides in an element from the top.</p>
        </div>
    </div>




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
    </script>

</body>

</html>