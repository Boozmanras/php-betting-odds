<?php 
include('includes/header.php');
include('includes/config.php');
include('includes/funct.php');
?>
    <!-- breadcrumb begin -->
    <div class="breadcrumb-betipsta">
        <img class="shape" src="assets/images/statics-bg-2.png" alt="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="part-text">
                        <h2 class="title">Question & Answer</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                Question & Answer
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="part-img">
                        <img src="#" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- faq begin -->
    <div class="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-9">
                  <div class="section-title">
                    <h4 class="sub-title">
                        frequently asked questions
                    </h4>
                    <h2>Ask things what you need</h2>
                   
                  </div>
                </div>
              </div>
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="faq-sidebar">
                        <div class="search-widget">
                            <form>
                                <input type="text" disabled placeholder="Search here">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">General Questions</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">How to play</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Results and winnings</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Others</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8">
                    <div class="faq-content">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                           <?php // Call the function to select data
                                $tableName = 'faq';
                                $columns = 'quiz , ans';
                                $condition = "type = 'general'";
                                $data = selectData($conn, $tableName, $columns, $condition);


                                foreach ($data as $row) {
                             
                                
                                ?>
                            <div class="single-faq">
                                    <h4><?php echo $row['quiz']; ?></h4>
                                    <p><?php echo $row['ans']; ?></p>
                                </div>
                                <?php }
                                ?>

                                
                            </div>

                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            
                            <?php // Call the function to select data
                                $tableName = 'faq';
                                $columns = 'quiz , ans';
                                $condition = "type = 'how'";
                                $data = selectData($conn, $tableName, $columns, $condition);


                                foreach ($data as $row) {
                             
                                
                                ?>
                            <div class="single-faq">
                                    <h4><?php echo $row['quiz']; ?></h4>
                                    <p><?php echo $row['ans']; ?></p>
                                </div>
                                <?php } ?>
                               
                            </div>
                            
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <?php // Call the function to select data
                                $tableName = 'faq';
                                $columns = 'quiz , ans';
                                $condition = "type = 'results'";
                                $data = selectData($conn, $tableName, $columns, $condition);


                                foreach ($data as $row) {
                             
                                
                                ?>
                            
                              <div class="single-faq">
                                    <h4><?php echo $row['quiz']; ?></h4>
                                    <p><?php echo $row['ans']; ?></p>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                
                            <?php // Call the function to select data
                                $tableName = 'faq';
                                $columns = 'quiz , ans';
                                $condition = "type = 'others'";
                                $data = selectData($conn, $tableName, $columns, $condition);


                                foreach ($data as $row) {
                             
                                
                                ?>
                            
                              <div class="single-faq">
                                    <h4><?php echo $row['quiz']; ?></h4>
                                    <p><?php echo $row['ans']; ?></p>
                                </div>
                                <?php } ?>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq end -->

    <?php include('includes/footer.php'); ?>