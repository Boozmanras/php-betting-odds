<?php 
include('includes/header.php');
Include('includes/config.php');
include('includes/funct.php');

if(isset($_POST['submit'])){
   // echo '<script>alert("clicked");</script>';
   
$us_name = validateInput($conn, $_POST['username']);
$us_num = validateInput($conn, $_POST['number']);
$us_email = validateInput($conn, $_POST['email']);
$us_subject = validateInput($conn, $_POST['subject']);
$us_message = validateInput($conn, $_POST['message']);
/*echo $us_name;
echo $us_num;
echo $us_email;
echo $us_subject;
echo $us_message;
*/
$data = array(
    "name" => $us_name,
    "phone" => $us_num,
    "email" => $us_email,
    "subject" => $us_subject,
    "message" => $us_message
);

$tableName = "messages";

$insertedId = insertData($conn, $tableName, $data);

if ($insertedId) {
    echo '<script>alert("Submitted");</script>';
   
} else {
    echo '<script>alert("Error submitting");</script>';
}


}





?>

    <!-- breadcrumb begin -->
    <div class="breadcrumb-betipsta">
        <img class="shape" src="assets/images/statics-bg.png" alt="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="part-text">
                        <h2 class="title">Contact us</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                Contact us
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

    <!-- contact begin -->
    <div class="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-10">
                  <div class="section-title">
                    <h4 class="sub-title">
                      Contact With Us
                    </h4>
                    <h2>Get in touch with Authority</h2>
                    <p>Get probable winning tips from professional betting tips See how it works!</p>
                  </div>
                </div>
              </div>
            <div class="row no-gutters">
                <div class="col-xl-8 col-lg-8 col-md-7">
                    <div class="contact-form">
                        <form method="POST" action="contact.php">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" name="username" id="fullName" value="<?php if(isset($us_name)){echo $us_name; } ?>" placeholder="Eg: John Doe" required>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <label for="phoneNo">Phone No</label>
                                    <input type="tel" value="<?php if(isset($us_num)){ echo $us_num; } ?>" name="number" id="phoneNo" placeholder="+254 xxx xxx xxx" required>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <label for="emailAdd">Email</label>
                                    <input type="email" name="email" value='<?php if(isset($us_email)){echo $us_email; } ?>' id="emailAdd" placeholder="Eg: yourmail@do.main" required>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <label for="mailSubject">Subject</label>
                                    <input type="text" value="<?php if(isset($us_subject)){ echo $us_subject; } ?>" name="subject" id="mailSubject" placeholder="Eg: Service" required>
                                </div>
                            </div>
                            <label for="yourMessage">Message</label>
                            <textarea id="yourMessage" name="message" placeholder="Eg: Hello Admin!" required><?php if(isset($us_message)){echo $us_message; } ?></textarea>
                            <button class="submit-btn" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="contact-information">
                        <div class="about-site">
                            <img src="assets/img/logo.png" alt="" class="logo">
                            <p>Kudosbet offers you all the best online betting from every corner of the planet with thousands of online bets.</p>
                        </div>
                        <?php // Call the function to select data
                                $tableName = 'system';
                                $columns = 'email, phone, facebook ,twitter ,insta ,address';
                                $condition = "";
                                $data = selectData($conn, $tableName, $columns, $condition);


                                foreach ($data as $row) {
                             
                                    $s_email = $row['email'];
                                    $s_phone = $row['phone'];
                                    $facebook = $row['facebook'];
                                    $twitter = $row['twitter'];
                                    $insta = $row['insta'];
                                    $address = $row['address'];
                                
                                } ?>
                        <ul class="info-list">
                            <li>
                                <span class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <span class="text">
                                    <?php echo $address; ?>
                                </span>
                            </li>
                            
                            <li>
                                <span class="icon">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <span class="text">
                                    <?php echo $s_phone; ?>
                                </span>
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="far fa-envelope"></i>
                                </span>
                                <span class="text">
                                    <?php echo $s_email ?>
                                </span>
                            </li>
                            <li>
                                <span class="icon">
                                    <i class="fas fa-globe"></i>
                                </span>
                                <span class="text">
                                    <?php echo $_SERVER['HTTP_HOST']; ?>
                                </span>
                            </li>
                        </ul>
                        <ul class="social-link">
                            <li>
                                <a href="<?php echo $facebook; ?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $twitter; ?>">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $insta; ?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                           <!-- <li>
                                <a href="#">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- contact end -->

    <!-- footer begin -->
    <?php include('includes/footer.php'); ?>