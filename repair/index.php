<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแจ้งซ่อม</title>
    <link rel="stylesheet" href="../theme/css/bootstrap-theme.css">
</head>

<body>
    <?php
    require_once('php.php');
    require_once('nav.php');
    $sqlbu="SELECT * FROM building ORDER BY name";
    $sqlde="SELECT * FROM department";
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        // echo $name;
        $department=$_POST['department'];
        $room=$_POST['room'];
        $building=$_POST['building'];
        $detail=$_POST['detail'];
        $tel=$_POST['tel'];
        $status="แจ้ง";
        $date=date('Y/m/d');
    
    
        $sqladd="INSERT INTO `repair_com` (`id`, `name`, `department`, `room`, `building`, `detail`, `tel`, `status`, `dateadd`) 
        VALUES (NULL, '".$name."', '".$department."', '".$room."', '".$building."', '".$detail."', '".$tel."', '".$status."', '".$date."')";
        
        if($result = $mysqli->query($sqladd) or die($mysqli->error)){ 
            echo '<div class="alert alert-success" role="alert">บันทึกข้อมูลสำเร็จ</div>';
            $data="\nชื่อ : ".$name."\nห้อง : ".$room."\nอาคาร : ".$building."\nเบอร์ : ".$tel."\nรายละเอียด : ".$detail."\nlink : http://www.it.science.kmitl.ac.th/IT_Service/repair_service.php" ;
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            date_default_timezone_set("Asia/Bangkok");
    
            $sToken = "hqetKVwQIeBofeRCWQRBnGpOSnxLgUS40hWzVxZflMC";
            $sMessage = "$data";
    
    
            $chOne = curl_init(); 
            curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
            curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
            curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
            curl_setopt( $chOne, CURLOPT_POST, 1); 
            curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
            $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
            curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
            $result = curl_exec( $chOne ); 
    
            //Result error 
            if(curl_error($chOne)) 
            { 
                echo 'error:' . curl_error($chOne); 
            } 
            else { 
                $result_ = json_decode($result, true); 
                // echo "status : ".$result_['status']; echo "message : ". $result_['message'];
            } 
            curl_close( $chOne );   
    
             header('Refresh:0; url=repair_service.php');
        }else{
            echo  '<div class="alert alert-danger" role="alert">บันทึกข้อมูลไม่สำเร็จ</div>';    
        }
      }
?>
    <div class="container font-mali">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">ข้อมูลแจ้งซ่อม</div>
            <div class="card-body test-dark">

                <form name="addrepair" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <label for="name">ชื่อ-สกุล</label>
                                    <input type="text" id="name" class="form-control" placeholder=""
                                        required="required" name="name" autofocus="autofocus">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-7">
                                <label for="">หน่วยงาน</label>
                              
                                <select class="form-select" aria-label="Default select example" name="department">
                                    <option value="">เลือก</option>
                                    <?php 
                                    if($result = $mysqli->query($sqlde) or die($mysqli->error)){
                                        if($result->num_rows){
                                            while($row1 = $result->fetch_assoc()){
                                     ?>
                                    <option value="<?php echo $row1['name']; ?>"><?php echo $row1['name']; ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <div class="form-label-group">
                                    <label for="tel">เบอร์ติดต่อ</label>
                                    <input type="text" id="tel" class="form-control" placeholder=""
                                        required="required" name="tel">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-label-group">
                                    <label for="room">ห้อง</label>
                                    <input type="text" id="room" class="form-control" placeholder=""
                                        required="required" name="room">

                                </div>
                            </div>
                            <div class="col-md-8">
                                <label for="">อาคร</label>
                                <select class="form-select" aria-label="Default select example" name="building">
                                    <option value="">เลือก</option>
                                    <?php 
                                    if($result = $mysqli->query($sqlbu) or die($mysqli->error)){
                                        if($result->num_rows){
                                            while($row2 = $result->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $row2['name']; ?>"><?php echo $row2['name']; ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <div class="form-group">
                                        <label for="comment">รายละเอียด:</label>
                                        <textarea class="form-control" rows="5" id="comment" name="detail"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-block" type="submit" name="submit">บันทึกข้อมูล</button>
                </form>

            </div>

        </div>
    </div>


</body>

</html>