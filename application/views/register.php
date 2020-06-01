<!DOCTYPE html>
<html lang="en">

<head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta http-equiv="X-UA-Compatible" content="ie=edge">
              <title>ลงทะเบียนลูกค้า</title>

              <link rel="stylesheet" href="<?php echo base_url('assets/bgregis/fonts/material-icon/css/material-design-iconic-font.min.css') ?>">

              <link rel="stylesheet" href="<?php echo base_url('assets/bgregis/css/style.css') ?>">
</head>

<body>
              <div class="main">

                            <section class="signup">
                                          <div class="container">
                                                        <div class="signup-content">
                                                                      <div class="signup-form">
                                                                                    <h2 class="form-title">ลงทะเบียนลูกค้า</h2>
                                                                                   
                                                                                    <form action="<?php echo base_url('register/create')?>" method="POST" class="register-form" id="register-form"> 
                                                                                      
                                                                                                 <div class="form-group">
                                                                                                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                                                                                                <input type="text" name="name_cus" id="name_cus" placeholder="ชื่อผู้ใช้" />
                                                                                                  </div>
                                    
                                                                                                  <div class="form-group">
                                                                                                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                                                                                                <input type="email" name="email" id="email" placeholder="อีเมล" />
                                                                                                  </div>

                                                                                                  <div class="form-group">
                                                                                                                <label for="tel"><i class="zmdi zmdi-phone"></i></label>
                                                                                                                <input type="tel" name="phone" id="phone" placeholder="เบอร์โทรศัพท์" />
                                                                                                  </div>
                                                                                                  <div class="form-group">
                                                                                                                <label for="re-pass"><i class="zmdi zmdi-book"></i></label>
                                                                                                                <input type="password" name="pass" id="pass" placeholder="รหัสผ่าน" />
                                                                                                  </div>
                                                                                                                                                                                                    
                                                                                                  <div class="form-group form-button">
                                                                                                                <input type="submit" name="signup" id="signup" class="form-submit" value="ยืนยัน" />
                                                                                                  </div>
                                                                                                  <input type="hidden" id="user_id" name="user_id" value=""> 
                                                                                    </form>
                                                                      </div>
                                                                      <div class="signup-image">
                                                                                    <figure><img src="<?php echo base_url('assets/bgregis/images/signup-image.jpg" alt="sing up image') ?>"></figure>
                                                                                    
                                                                      </div>
                                                        </div>
                                          </div>
                            </section>

                           
              <script src="vendor/jquery/jquery.min.js" type="2461647d3517a285fc713fb7-text/javascript"></script>
              <script src="js/main.js" type="2461647d3517a285fc713fb7-text/javascript"></script>

              <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="2461647d3517a285fc713fb7-text/javascript"></script>
              <script type="2461647d3517a285fc713fb7-text/javascript">
                            window.dataLayer = window.dataLayer || [];

                            function gtag() {
                                          dataLayer.push(arguments);
                            }
                            gtag('js', new Date());

                            gtag('config', 'UA-23581568-13');
              </script>
              <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="2461647d3517a285fc713fb7-|49" defer=""></script>
              <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
            <script src="liff-starter.js"></script>
              <script>
        window.onload = function (e) {
            liff.init(function (data) {
                initializeApp(data);
            });
        };

        function initializeApp(data) {
            document.getElementById('user_id').value = data.context.userId;
        }
    </script>

            </body>


</html>