
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
                        <h2 class="title">About Us</h2>
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                About Us
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="part-img">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
<?php 



// Call the function to select data
$tableName = 'system';
$columns = 'about_us';
$condition = "";
$data = selectData($conn, $tableName, $columns, $condition);


?>
     <!-- about begin -->
     <div class="about">
        <div class="container">
          <div class="row justify-content-xl-around justify-content-lg-between justify-content-md-center">
            <div class="col-xl-6 col-lg-7 col-md-9 d-xl-flex d-lg-flex d-block align-items-center">
              <div class="part-text">
                <h4 class="subtitle">Know About Us</h4>
                <h2>Get profit from our Tipster </h2>
                <?php
                foreach ($data as $row) {
                  
              
              
?>
                <p><?php // echo $row['about_us'];  ?></p>
                <?php } ?>
                
                
               <p> Welcome to KudosBet, the ultimate destination for avid sports enthusiasts and betting enthusiasts alike! At KudosBet, we pride ourselves on being a leading provider of top-quality odds, offering a wide range of betting opportunities to enhance your sports betting experience.</p>
               <p>

Our mission is simple: to deliver accurate, reliable, and comprehensive odds information to help you make informed betting decisions. Whether you're a seasoned bettor or just starting out, we have something for everyone. With a team of experienced analysts and industry experts, we ensure that our odds are meticulously researched and analyzed, providing you with the best possible insights into various sports events.</p>
<p>

What sets us apart is our commitment to transparency and integrity. We offer a unique combination of both free and paid odds, giving you the flexibility to choose the type of service that suits your needs. Our free odds section provides access to a wealth of valuable information, helping you stay up to date with the latest trends and statistics across a wide range of sports. For those seeking a more tailored and exclusive experience, our paid odds section offers premium odds packages designed to give you an edge in your betting endeavors.
</p>
<p>
At KudosBet, we understand that time is of the essence when it comes to sports betting. That's why we strive to provide a user-friendly platform that makes accessing our odds quick and convenient. Our website is designed with simplicity and ease of use in mind, ensuring that you can find the information you need with just a few clicks. Whether you're on your computer, tablet, or smartphone, you can enjoy seamless browsing and access to our comprehensive odds database anytime, anywhere.</p>
<p>
Customer satisfaction is at the core of everything we do. We value your feedback and are constantly working to improve our services to meet your expectations. Our dedicated customer support team is always available to address any queries or concerns you may have, ensuring that your experience with KudosBet is nothing short of exceptional.
</p><p>
Join us today and unlock a world of endless possibilities in sports betting. Whether you're looking to make informed decisions, enhance your strategies, or simply enjoy the thrill of the game, KudosBet is here to provide you with the odds you need to succeed. Bet with confidence and let us be your trusted partner on your betting journey.
                </p>
              </div>
            </div>
            <div class="col-xl-4 col-lg-5">
              <div class="part-img">
                <img src="assets/images/about.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- about end -->
      
      <!-- statics begin -->
     <?php include('statistics.php'); ?>
      <!-- statics end -->

      <!-- leaderboard begin  -->
 <?php include('history.php'); ?>
      <!-- leaderboard end  -->

      <!-- testimonial begin -->
     <?php include('testimony.php'); ?>
      <!-- testimonial end -->


    <!-- footer begin -->
    <?php include('includes/footer.php'); ?>