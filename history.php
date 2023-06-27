<div class="tips">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-9">
              <div class="section-title">
                <h4>
                  History
                </h4>
                <h2></h2>
                <p>Get probable winning tips from professional betting tipsters across  all sports<br>
                  and offers from leading bookmakers! See how it works!</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="tips-table">
                <table class="table">
                <?php 
                    
                    // Call the function to extract data with limit and order by
                    $tableName = 'history';
                    $columns = '*';
                    $condition = "";
                    $limit = 10;
                    $orderBy = "id DESC";
                    $data = extractData($conn, $tableName, $columns, $condition, $limit, $orderBy);

                  
                    ?>
                  <thead>
                    
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Teams</th>
                      <th scope="col">Date</th>
                      <th scope="col">Tip</th>
                      <th scope="col">results</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
          // Process the extracted data
          $id = 1;
        foreach ($data as $row) {
        
        
        ?>
                    <tr>
           
                        <td scope="row"><?php echo $id; ?></td>
                                                                          
                     
                      <td>
                        <span class="single-data event">
                        <?php echo $row['teams'] ?>
                        </span>
                      </td>
                      <td>
                        <span class="suchi">
                          <!--<span class="date">06 Oct 20</span>-->
                          <span class="time"><?php echo $row['date'] ?></span>
                        </span>
                      </td>
                      <td>
                        <span class="single-data green">
                        <?php echo $row['tip'] ?>
                        </span>
                      </td>
                        
                      <td>
                        <span class="single-data green">
                        <?php echo $row['results'] ?>
                        </span>
                      </td>
                     
                      <?php $id++; } ?>
                    </tr>
                   
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>