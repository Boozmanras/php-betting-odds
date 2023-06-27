<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
include('includes/config.php');
include('includes/func.php');
if(isset($_POST['login'])){

$a_email = validateInput($db,$_POST['email']);
$a_password = validateInput($db, $_POST['password']);


    // Prepare the SQL statement to avoid SQL injection
    $query = "SELECT * FROM dashboard_users WHERE admin_email = ? AND admin_password = ?";
    $stmt = mysqli_prepare($db, $query);
    
    // Bind the email and password values to the prepared statement
    mysqli_stmt_bind_param($stmt, "ss", $a_email, $a_password);
    
    // Execute the prepared statement
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if the query was successful
    if (mysqli_num_rows($result) === 1) {
        // Email and password are correct
        // Set session variables
        $_SESSION['a_email'] = $a_email;
        $_SESSION['a_password'] = $a_password;

        // Redirect the user to index.php
        header('Location: index.php');
        exit; // Important to terminate the script after redirection
    } else {
        $_SESSION['error'] = "Invalid email or password.";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($db);
}



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kudosbet | login</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="assets/img/logo.png" alt="kudosbet logo">
                    </div>
                    <h6 class="mb-4 text-muted">Admin Login</h6>

                   
                    <?php if(isset($_SESSION['error'])){ ?>
                    <div class="alert alert-danger">
                                        <h5 class="alert-title"><i class="fas fa-exclamation-triangle"></i> ERROR</h5>
                                        <?php echo $_SESSION['error']; 
                                        unset($_SESSION['error']);
                                        ?>
                                    </div> <?php } ?>
                    <form action="login.php" method="POST">
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email adress</label>
                            <input type="email" class="form-control" name='email' value="<?php if(isset($a_email)){ echo $a_email; } ?>" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name='password' required>
                        </div>
                       
                        <button name='login' class="btn btn-primary shadow-2 mb-4">Login</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>