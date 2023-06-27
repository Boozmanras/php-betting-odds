<!-- statics begin -->
<?php






// Call the function to select data
$tableName = 'system';
$columns = 'total_profit, average_hits, average_roi, total_tipsters';
$condition = "";
$data = selectData($conn, $tableName, $columns, $condition);


foreach ($data as $row) {
  $total_p = $row['total_profit'];
  $average_h = $row['average_hits'];
  $average_roi = $row['average_roi'];
  $total_tipsters = $row['total_tipsters'];
 
}
?>
      <div class="statics">
        <img src="assets/images/statics-bg.png" alt class="shape">
        <div class="container">
              <div class="part-statics">
                <div class="row">
                  <div class="col-xl-3 col-lg-3 col-sm-6 col-md-3">
                    <div class="single-static">
                      <div class="part-img">
                        <img src="assets/images/icon-1.png" alt>
                      </div>
                      <div class="part-text">
                        <span class="number"><?php echo $total_p; ?></span>
                        <h4 class="title">Total Profit</h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-sm-6 col-md-3">
                    <div class="single-static">
                      <div class="part-img">
                        <img src="assets/images/icon-2.png" alt>
                      </div>
                      <div class="part-text">
                        <span class="number"><?php echo $average_h; ?></span>
                        <h4 class="title">Avr. Hit Rate</h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-sm-6 col-md-3">
                    <div class="single-static">
                      <div class="part-img">
                        <img src="assets/images/icon-3.png" alt>
                      </div>
                      <div class="part-text">
                        <span class="number"><?php echo $average_roi; ?></span>
                        <h4 class="title">Avarage Roi</h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-sm-6 col-md-3">
                    <div class="single-static">
                      <div class="part-img">
                        <img src="assets/images/icon-4.png" alt>
                      </div>
                      <div class="part-text">
                        <span class="number"><?php echo $total_tipsters; ?></span>
                        <h4 class="title">Total Tipsters</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
      <!-- statics end -->