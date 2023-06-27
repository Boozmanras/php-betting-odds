<div class="testimonial">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-8 col-sm-10">
        <div class="testimonial-slider owl-carousel owl-theme">
          <?php
          // Call the function to extract data with limit and order by
          $tableName = 'testimonies';
          $columns = '*';
          $condition = "";
          $limit = 5;
          $orderBy = "id DESC";
          $data3 = extractData($conn, $tableName, $columns, $condition, $limit, $orderBy);

          foreach ($data3 as $row4) {
            ?>
            <div class="single-testimonial">
              <div class="part-img">
                <div class="part-pic">
                  <img src="assets/images/user.png" alt>
                </div>
              </div>
              <div class="part-text">
                <i class="icon-for-quot fas fa-quote-left"></i>
                <p><?php echo $row4['testimony']; ?></p>
                <span class="position">
                  <?php echo $row4['region']; ?>
                </span>
                <span class="user-name">
                  <?php echo $row4['name']; ?>
                </span>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
