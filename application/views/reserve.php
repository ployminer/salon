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
                            <form action="/action_page.php">
                                          <label for="fname">ชื่อลูกค้า</label>
                                          <input type="text" id="fname" name="firstname">

                                          <label for="country">ร้านบริการ</label>
                                          <select name="shop" id="shop"  class="form-control required">
                                                        <option selected="" disabled="">เลือกร้านบริการ</option>
                                                        <?php foreach ($shop as $value) { ?>
                                                                      <option value='<?php echo $value->email_shopowner ?>'><?php echo $value->name_shop ?></option>
                                                        <?php } ?>
                                          </select>

                                          <label for="country" type="date">จองวัน</label>
                                          <select name="date" id="date" type="date" class="form-control required">
                                                        <option selected="" disabled="">วัน</option>
                                                        <?php foreach ($read as $value) { ?>
                                                                      <option value='<?php echo $value->id_service ?>'><?php echo $value->date ?></option>
                                                        <?php } ?>
                                          </select>

                                          <label for="country" type="date">จองเวลา</label>
                                          <select name="date" id="date" class="form-control required">
                                                        <option selected="" disabled="">เวลา</option>
                                                        <?php foreach ($date as $value) { ?>
                                                                      <option value='<?php echo $value->id_date ?>'><?php echo $value->date_date ?></option>
                                                        <?php } ?>
                                          </select>

                                          <label for="country" type="date">จองบริการ</label>
                                          <select name="date" id="date" class="form-control required">
                                                        <option>บริการ</option>
                                                        <?php foreach ($service as $value) { ?>
                                                                      <option value='<?php echo $value->id_service ?>'><?php echo $value->servicename ?></option>
                                                        <?php } ?>
                                          </select>

                                          <label for="country" type="date">จองช่างทำผม</label>
                                          <select name="date" id="date" class="form-control required">
                                                        <option selected="" disabled="">ช่าง</option>
                                                        <?php foreach ($date as $value) { ?>
                                                                      <option value='<?php echo $value->id_date ?>'><?php echo $value->date_date ?></option>
                                                        <?php } ?>
                                          </select>

                                          <input type="submit" value="Submit">
                            </form>
              </div>

</body>

</html>