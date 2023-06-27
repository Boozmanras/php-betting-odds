<?php
include('includes/config.php');
include('includes/func.php');
include('includes/header.php');

if(isset($_POST['admin_form'])){
$n_username = validateInput($db, $_POST['n_username']);
$n_email = validateInput($db, $_POST['n_email']);
$n_password = validateInput($db, $_POST['n_password']);

$hashedPassword = hash('sha256', $n_password);


$data = array(
    'admin_name' => $n_username,
    'admin_email' => $n_email,
    'admin_password' => $hashedPassword
);
$TableName = 'dashboard_users';
insertData($db, $TableName, $data);


}

?>
<body>
<div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Add admin</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <form accept-charset="utf-8" action="add_admin.php" method="POST">
                                        <div class="mb-3">
                                           <label for="" class="form-label">Username</label>
                                           <input type="text" name="n_username" placeholder="Usermname" class="form-control" value="<?php if(isset($n_username)){echo $n_username; } ?>" required />

                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="n_email" placeholder="Email Address" value="<?php if(isset($n_email)){echo $n_email; } ?>" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="n_password" placeholder="Password" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name='admin_form' class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
   <?php
   include('includes/footer.php');   ?>