<?php include('config.php');

$stmt = $conn->prepare("SELECT site_title, meta_description, meta_keywords, favicon, site_logo, email, phone FROM system ORDER BY id DESC LIMIT 1");


// Execute the query
$stmt->execute();

// Bind the result variables
$stmt->bind_result($site_title, $meta_description, $meta_keywords, $favicon, $site_logo, $email, $phone);

// Fetch the result
if ($stmt->fetch()) {
    // Output the data
  
} 

// Close the statement and connection
//$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
<title><?php echo $site_title; ?></title>
<meta name="description" content="<?php echo $meta_description; ?>">
<meta name="keywords" content="<?php echo $meta_keywords; ?>">
<link rel="canonical" href="$url = "<?php echo'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]'; ?>">
<meta name="robots" content="index, follow">
<meta property="og:title" content=""><meta property="og:description" content="<?php echo $meta_description;?>">
<meta property="og:image" content="">

      <!-- favicon -->
      <link rel="shortcut icon" href="favicon1.ico" type="image/x-icon">
      <!-- bootstrap -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <!-- fontawesome icon  -->
      <link rel="stylesheet" href="assets/css/fontawesome.min.css">
      <!-- animate.css -->
      <link rel="stylesheet" href="assets/css/animate.css">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="assets/css/owl.carousel.css">
      <!-- stylesheet -->
      <link rel="stylesheet" href="assets/css/style.css">
      <!-- responsive -->
      <link rel="stylesheet" href="assets/css/responsive.css">
      <link rel="stylesheet" href="assets/css/modal.css">
  </head>
  <body data-spy="scroll" data-target="#navbar" data-offset="0">

      <!-- preloader begin -->
      <div class="preloader">
          <img src="assets/images/preloader.gif" alt>
      </div>
      <!-- preloader end -->

      <!-- header begin -->
      <div class="header">
        <div class="header-top">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-xl-5 col-lg-5 col-md-7">
                <div class="support-info">
                  <ul>
                    <li>
                      <span class="icon">
                        <i class="far fa-envelope"></i>
                      </span>
                      <span class="text">
                        <?php echo $email; ?>
                      </span>
                    </li>
                    <li>
                      <span class="icon">
                        <i class="fas fa-phone"></i>
                      </span>
                      <span class="text">
                        <?php echo $phone; ?>
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 d-xl-block d-lg-block d-none">
                <div class="logo">
                    <a href="index.php">
                        <img src="#" alt='logo'>
                    </a>
                </div>
              </div>
              <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="date">
                  <ul>
                    <li>
                      <span class="icon">
                        <i class="fas fa-calendar-alt"></i>
                      </span>
                      <span class="text">
                        <span id="date"></span>
                        <span id="month"></span>
                        <span id="year"></span>
                      </span>
                    </li>
                    <li>
                      <span class="icon">
                        <i class="fas fa-clock"></i>
                      </span>
                      <span class="text">
                        <span id="hours"></span>:<span id="minutes"></span>:<span id="seconds"></span>
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-bottom">
          <div class="container">
            <div class="row d-xl-none d-lg-none d-flex">
              <div class="col-8">
                <a href="index.php" class="mobile-logo">
                  <img src="#" alt>
                  Kudosbet
                </a>
              </div>
              <div class="col-4 d-flex align-items-center justify-content-end">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-bars fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z" class=""/></svg>
                </button>
              </div>
            </div>
              <div class="row justify-content-center">
                  <div class="col-xl-12 col-lg-12">
                      <div class="mainmenu">
                          <nav class="navbar navbar-expand-lg">
                            
                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="scalaction">
                                  <div class="row">
                                    <div class="col-xl-5 col-lg-5">
                                      <ul class="navbar-nav">
                                        <li class="nav-item active">
                                          <a class="nav-link" href="index.php">Home </a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" href="about.php">About us</a>
                                        </li>
                                       
                                      </ul>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 d-xl-block d-lg-block d-none">
                                      <div class="space"></div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5">
                                      <ul class="navbar-nav">
                                       
                                      <li class="nav-item">
                                          <a class="nav-link" href="faq.php">FAQ</a>
                                        </li>
                    
                                        <li class="nav-item">
                                          <a class="nav-link" href="contact.php">Contact</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </nav>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <!-- header end -->
