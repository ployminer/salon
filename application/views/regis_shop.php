<!DOCTYPE html>
<html lang="en">

<head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta http-equiv="X-UA-Compatible" content="ie=edge">
              <title>ลงทะเบียนร้าน</title>

              <link rel="stylesheet" href="<?php echo base_url('assets/bgregis/fonts/material-icon/css/material-design-iconic-font.min.css') ?>">

              <link rel="stylesheet" href="<?php echo base_url('assets/bgregis/css/style.css') ?>">
</head>

<body>
              <div class="main">

                            <section class="signup">
                                          <div class="container">
                                                        <div class="signup-content">
                                                                      <div class="signup-form">
                                                                                    <h2 class="form-title">ลงทะเบียนร้านค้า</h2>

                                                                                    <form action="<?php echo base_url('regis_shop/create')?>" method="POST" class="register-form" id="register-form"> 
                                                                                                  <div class="form-group">
                                                                                                                <label for="name"><i class="zmdi zmdi-store"></i></label>
                                                                                                                <input type="text" name="name_shop" id="name_shop" required placeholder="ชื่อร้าน" />
                                                                                                  </div>
                                                                                                  <div class="form-group">
                                                                                                                <label for="name"><i class="zmdi zmdi-home"></i></label>
                                                                                                                <input type="text" name="add_shop" id="add_shop" required placeholder="ที่อยู่ร้าน" />
                                                                                                  </div>
                                                                                                  <div class="form-group">
                                                                                                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                                                                                                <input type="text" name="name_shopowner" id="name_shopowner"required placeholder="ชื่อเจ้าของร้าน" />
                                                                                                  </div>
                                                                                                  <div class="form-group">
                                                                                                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                                                                                                <input type="email" name="email_shopowner" id="email_shopowner" required placeholder="อีเมล" />
                                                                                                  </div>
                                                                                                  <div class="form-group">
                                                                                                                <label for="tel"><i class="zmdi zmdi-phone"></i></label>
                                                                                                                <input type="tel" name="phone_shopowner" id="phone_shopowner"required placeholder="เบอร์โทรศัพท์" />
                                                                                                  </div>
                                                                                                  <div class="form-group">
                                                                                                                <label for="re-pass"><i class="zmdi zmdi-book"></i></label>
                                                                                                                <input type="tel" name="bookbank" id="bookbank"required placeholder="เลขที่บัญชี" />
                                                                                                  </div>
                                                                                                  <div class="form-group">
                                                                                                                <label for="re-pass"><i class="zmdi zmdi-book"></i></label>
                                                                                                                <input type="password" name="pass" id="pass"required placeholder="รหัสผ่าน" />
                                                                                                  </div>                                                                        
                                                                                                  <div class="form-group form-button">
                                                                                                                <input type="submit" name="signup" id="signup" class="form-submit" value="ยืนยัน" />
                                                                                                  </div>

                                                                                                  <!-- <div class="form-group form-button">
                                                                                                                <input type="file" >
                                                                                                  </div> -->
                                                                                    
                                                                                                 
                                                                                                  <input type="hidden" id="user_id" name="user_id" value=""> 
                                                                                                  
                                                                                    </form>
                                                                                    
                                                                      </div>
                                                                      <div class="signup-image">
                                                                                    <figure><img src="<?php echo base_url('assets/bgregis/images/signin-image.jpg" alt="sing up image') ?>"></figure>
                                                                                   
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
              
</body>

</html>