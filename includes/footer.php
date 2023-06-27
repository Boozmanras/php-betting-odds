<!-- footer begin -->
<div class="footer">
        <a href="index.html" class="site-logo">
          <img src="assets/images/logo.png" alt>
        </a>
        <?php


// Call the function to select data
$tableName = 'system';
$columns = 'email, phone, facebook, twitter, insta, why';
$condition = "id = 1";
$data = selectData($conn, $tableName, $columns, $condition);


foreach ($data as $row) {
  $email = $row['email'];
  $phone = $row['phone'];
  $facebook = $row['facebook'];
  $twitter = $row['twitter'];
  $insta = $row['insta'];
  $why = $row['why'];
 
}
?>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-5 col-md-10">
                    <div class="about-widget">
                        <a class="site-title" href="index.php">
                            Kudosbet
                        </a>
                        <p><?php echo $why; ?></p>
                        <div class="social">
                            <ul>
                                <li>
                                    <a href="<?php echo $facebook; ?>" class="social-icon">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="<?php echo $twitter; ?>" class="social-icon">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="<?php echo $insta; ?>" class="social-icon">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="support">
                            <ul>
                                <li>
                                    <span class="icon">
                                        <img src="assets/fonts/email.svg" alt>
                                    </span>
                                    <span class="text">
                                        <span class="title">Mail Us</span>
                                        <span class="descr"><?php echo $email; ?></span>
                                    </span>
                                </li>
                                <li>
                                    <span class="icon">
                                        <img src="assets/fonts/phone-call.svg" alt>
                                    </span>
                                    <span class="text">
                                        <span class="title">Get In Touch</span>
                                        <span class="descr"><?php echo $phone; ?></span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4">
                    <div class="useful-links">
                        <h3>Useful links</h3>
                        <ul>
                        <li>
                                <a href="about.php">about us</a>
                            </li>
                            <li>
                                <a href="index.php">service</a>
                            </li>
                            <li>
                                <a href="terms-and-condition.php">Terms and conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4">
                    <div class="useful-links">
                        <h3>Connect Us</h3>
                        <ul>
                           
                               
                           
                            <li>
                                <a href="contact.php">contact us</a>
                            </li>
                            <li>
                                <a href="<?php echo $facebook; ?>">Facebook</a>
                            </li>

                           
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4">
                    <div class="useful-links">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- footer end -->

      <!-- copyright footer begin -->
      <div class="copyright-footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-md-6 col-lg-6 d-lg-flex d-lg-flex d-block align-items-center">
                    <p class="copyright-text">
                        <a href="#">Kudosbet</a> © <?php echo date('Y'); ?>. Privacy & Policy
                    </p>
                </div>
                <div class="text-right col-md-6 col-xl-4 col-lg-6 d-xl-flex d-lg-flex d-block align-items-center">
                    
                </div>
            </div>
        </div>
      </div>
      <!-- copyright footer end -->
   <!-- JavaScript -->
<script>
// Get all trigger elements
var modalTriggers = document.querySelectorAll(".open-modal-btn");

// Get the modal element
var modal = document.getElementById("myModal");

// Get the close button
var closeButton = modal.querySelector(".close");

// Function to open the modal
function openModal() {
  modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
  modal.style.display = "none";
}

// Attach event listeners to each trigger element
modalTriggers.forEach(function(trigger) {
  trigger.addEventListener("click", openModal);
});

// Event listener for the close button
closeButton.addEventListener("click", closeModal);

// Event listener for outside clicks to close the modal
window.addEventListener("click", function(event) {
  if (event.target === modal) {
    closeModal();
  }
});


</script>







      <!-- jquery -->
      <script src="assets/js/jquery.js"></script>
      <!-- propper js -->
      <script src="assets/js/popper.min.js"></script>
      <!-- bootstrap -->
      <script src="assets/js/bootstrap.min.js"></script>
      <!-- owl carousel -->
      <script src="assets/js/owl.carousel.min.js"></script>
      <!-- clock js -->
      <script src="assets/js/clock.min.js"></script>
      <!-- main -->
      <script src="assets/js/main.js"></script>
  </body>
</html>