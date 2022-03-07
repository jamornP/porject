<?php
require_once('h.php');
?>


<body>
<?php
  require_once('php.php');
  require_once('nav.php');
  
  $sqlcal="SELECT count(id) As 'All',
  (SELECT count(type) FROM `repair_com` WHERE type='hardware') As 'hardware',
  (SELECT count(type) FROM `repair_com` WHERE type='software') As 'software',
  (SELECT count(type) FROM `repair_com` WHERE type='network') As 'network', 
  (SELECT count(type) FROM `repair_com` WHERE type='Web&Dev') As 'web', 
  (SELECT count(status) FROM `repair_com` WHERE status='Finish') As 'finish',
  (SELECT count(type) FROM `repair_com` WHERE type='network' AND status='Finish' ) As 'fnet',
  (SELECT count(type) FROM `repair_com` WHERE type='software' AND status='Finish' ) As 'fsof',
  (SELECT count(type) FROM `repair_com` WHERE type='Web&Dev' AND status='Finish' ) As 'fweb', 
  (SELECT count(type) FROM `repair_com` WHERE type='hardware' AND status='Finish' ) As 'fhard'
  FROM `repair_com`";
  if($result1 = $mysqli->query($sqlcal) or die($mysqli->error)){
    if($result1->num_rows){
      while($row1 = $result1->fetch_assoc()){

      
      $all=$row1['All'];
      $hardware=$row1['hardware'];
      $software=$row1['software'];
      $network=$row1['network'];
      $web=$row1['web'];
      $finish=$row1['finish'];
      $fnet=$row1['fnet'];
      $fsof=$row1['fsof'];
      $fweb=$row1['fweb'];
      $fhard=$row1['fhard'];
      $gfi=$all-$finish;
      $gnet=$network-$fnet;
      $gsof=$software-$fsof;
      $gweb=$web-$fweb;
      $ghard=$hardware-$fhard;
      }
    }
  }
  // $numrow=$mysql->num_rows($result);
//   $sqlupdate="SELECT * FROM repairdata ORDER BY dateupdate DESC Limit 1";

?>
<div class="">
    
    <!-- หัว -->
    <div class="">
    <p></p>
    <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold bg-primary text-uppercase mb-1 text-center text-white"><h5>Web&Dev : <?php echo $web ; ?></h5></div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">100</div> -->
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">finish_ : <?php echo $fweb ; ?></div>
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Open_ : <?php echo $gweb ; ?></div>                     
                    </div>
                    <!-- <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold bg-success text-uppercase mb-1 text-center text-white"><h5>Hardware : <?php echo $hardware ; ?></h5></div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">50</div> -->
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Finish : <?php echo $fhard ; ?></div>  
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Open_ : <?php echo $ghard ; ?></div> 
                    </div>
                    <!-- <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold bg-info text-uppercase mb-1 text-center text-white"><h5>Software : <?php echo $software ; ?></h5></div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <!-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">20</div> -->
                          <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Finish : <?php echo $fsof ; ?></div>  
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Open_ : <?php echo $gsof ; ?></div> 
                        </div>
                        <!-- <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <!-- <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold bg-warning text-uppercase mb-1 text-center text-white"><h5>Network : <?php echo $network ; ?></h5></div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800 text-center text-white">10</div> -->
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Finish : <?php echo $fnet ; ?></div>  
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Open_ : <?php echo $gnet ; ?></div> 
                    </div>
                    <!-- <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
              <a href="addrepair.php" class="btn btn-lg btn-danger col-md-12" role="button">แจ้งซ่อม</a>
            </div>
          </div>
          <p></p>

    <!-- ตารางงาน -->
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ข้อมูลการแจ้งซ่อม
            
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ที่</th>
                    <th>วันที่</th>
                    <th>รายละเอียดที่แจ้งซ่อม</th>
                    <th>ชื่อ</th>
                    <!-- <th>หน่วยงาน</th> -->
                    <th>ห้อง</th>
                    <th>อาคาร</th>
                    <th>เบอร์ติดต่อ</th>
                    <th>สถานะ</th>
                    <th>ผู้รับผิดชอบ</th>
                    <!-- <th>ดำเนินการ</th> -->
                  </tr>
                </thead>
                <tbody>
                <?php
                  $sqlread="SELECT * FROM repair_com  ORDER BY dateadd DESC ";
                  $i=1;                  
                   if($result = $mysqli->query($sqlread) or die($mysqli->error)){
                    if($result->num_rows){
                      // echo $result->num_rows;
                        while($row = $result->fetch_assoc()){
                          
                          ?>
                          <tr>
                            <td class="text-data"><?php echo $i; ?></td>
                            <td class="text-data"><?php echo datethai($row['dateadd']); ?></td>
                            <td class="text-data"><?php echo $row['detail']; ?></td>
                            <td class="text-data"><?php echo $row['name']; ?></td>
                            <td class="text-data"><?php echo $row['room']; ?></td>
                            <!-- <td class="text-data"><?php //echo $row['department']; ?></td> -->
                            <td class="text-data"><?php echo $row['building']; ?></td>
                            <td class="text-data"><?php echo $row['tel']; ?></td>
                            <td class="text-data text-danger "><?php echo $row['status'];?></td>
                            <td class="text-data"><?php echo $row['userjob']; ?></td>
                            
                          </tr>
                          <?php
                          $i=$i+1;
                        }
                    }
                   }
                ?>                  
                </tbody>
              </table>
            </div>
          </div>
</div>





<?php
require_once('f.php');
?>
</body>

</html>