<!DOCTYPE html>
<html>

<head>
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <style>
                            body {
                                          font-family: Arial, Helvetica, sans-serif;
                            }

                            * {
                                          box-sizing: border-box;
                            }

                            input[type=text],
                            select,
                            textarea {
                                          width: 100%;
                                          padding: 12px;
                                          border: 1px solid #ccc;
                                          border-radius: 4px;
                                          box-sizing: border-box;
                                          margin-top: 6px;
                                          margin-bottom: 16px;
                                          resize: vertical;
                            }

                            input[type=submit] {
                                          background-color: #4CAF50;
                                          color: white;
                                          padding: 12px 20px;
                                          border: none;
                                          border-radius: 4px;
                                          cursor: pointer;
                            }

                            input[type=submit]:hover {
                                          background-color: #45a049;
                            }

                            .container {
                                          border-radius: 5px;
                                          background-color: #f2f2f2;
                                          padding: 20px;
                            }
              </style>
</head>

<body>

              
              <h3 >จองบริการทำผม</h3>

              <div class="container">
                            <form action="<?php echo base_url('reserve/create_booking') ?>" method="post" class="contact100-form validate-form" style="width:100%;">
                            <!-- <form action="reserve/create_booking"> -->
                            <input type="hidden" id="userid" name="userid" value="">

                                          <label for="country">ร้านบริการ</label>
                                          <select name="shop" id="shop"  class="form-control required">
                                                        <option selected="" disabled="">เลือกร้านบริการ</option>
                                                        <?php foreach ($read_shop as $value) { ?>
                                                                      <option value='<?php echo $value->email_shopowner ?>'><?php echo $value->name_shop ?></option>
                                                        <?php } ?>
                                          </select>

                                          <label for="country" >จองบริการ</label>
                                          <select name="service" id="service"  class="form-control required">
                                                        <option selected="" disabled="">เลือกบริการ</option>
                                          </select>

                                          <label for="country">ราคาบริการ</label>
                                          <select name="price" id="price" class="form-control required">
                                                        <option selected="" disabled="">ราคา</option>
                                          </select>

                                          <label for="country">จองช่างทำผม</label>
                                          <select name="hair" id="hair" class="form-control required">
                                                        <option >เลือกช่าง</option>
                                                        <?php foreach ($date as $value) { ?>
                                                                      <option value='<?php echo $value->id_date ?>'><?php echo $value->date_date ?></option>
                                                        <?php } ?>
                                          </select>
            
                                        <label for="country">จองวัน</label>
                                        <br>
                                        <input name="date" id="date" type="date" class="form-control required">
                                        </input>
                                        <br><br>
                                            
                                          <label for="country" type="time">จองเวลา</label>
                                          <select name="time" id="time" class="form-control required">
                                                        <option selected="" disabled="">เลือกเวลา</option>
                                          </select>

                                          <input type="submit" value="Submit">
                            </form>
              </div>

</body>
<script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js" data-cf-settings="3d44b465189b22b734a3929d-|49" defer=""></script>
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
    <script src="liff-starter.js"></script>
    <script>
        window.onload = function (e) {
            liff.init(function (data) {
                initializeApp(data);
            });
        };

        function initializeApp(data) {
            document.getElementById('userid').value = data.context.userId;
        }
    </script>
<script>
    $(document).ready(function() {
        
        $('#shop').change(function() {
            var email_shopowner = $(this).val();
            $.ajax({
                url: "<?php echo site_url('reserve/service'); ?>",
                method: "POST",
                data: {
                    email_shopowner: email_shopowner
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option  selected="" disabled="">บริการ</option>'
                    p = '<option  selected="" disabled="">ราคา</option>'
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_service + '>' + data[i].servicename + '</option>';
                    }
                    $('#service').html(html);
                    $('#price').html(p);
                }
            });
            $.ajax({
                url: "<?php echo site_url('reserve/time'); ?>",
                method: "POST",
                data: {
                    email_shopowner: email_shopowner
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option selected="" disabled="">เวลา</option>'
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].time + '>' + data[i].time + '</option>';
                    }
                    $('#time').html(html);
                }
            });
        });

        $('#service').change(function() {
            var id_service = $(this).val();
            $.ajax({
                url: "<?php echo site_url('reserve/price'); ?>",
                method: "POST",
                data: {
                    id_service: id_service
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_service + '>' + data[i].priceservice + ' บาท</option>';
                    }
                    $('#price').html(html);
                }
            });
            $.ajax({
                url: "<?php echo site_url('reserve/hairdresser'); ?>",
                method: "POST",
                data: {
                    id_service: id_service
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].name_employee + '>' + data[i].name_employee + '</option>';
                    }
                    $('#hair').html(html);
                }
            });
            return false;
        });
    });
</script>
</html>