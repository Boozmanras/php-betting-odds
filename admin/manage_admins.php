<?php
include('includes/header.php');
include('includes/config.php');
include('includes/func.php');

// Ensure that the del_id parameter is present in the URL
if (isset($_GET['del_id'])) {
    // Get the del_id parameter value and sanitize it
    $delId = filter_var($_GET['del_id'], FILTER_SANITIZE_NUMBER_INT);

    // Check if the del_id value is valid
    if ($delId !== false && $delId !== "") {
       

        // Call the deleteData function
        $affectedRows = deleteData($db, 'dashboard_users', 'id = ' . $delId);

        // Output the number of affected rows
        echo "<script>alert('admin deleted succesfuly');</script>";

        // Close the database connection
       // $db->close();
    
} } 

// Call the function to extract data with limit and order by
$tableName = 'dashboard_users';
$columns = '*';
$condition = "";
$limit = 30;
$orderBy = "id DESC";
$data = extractData($db, $tableName, $columns, $condition, $limit, $orderBy);


?>





<div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">Admin management</div>
                                <div class="card-body">
                                    <p class="card-title">Recent dashboard users</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Delete</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                 // Process the extracted data
                                                 $id = 1;
                                                foreach ($data as $row) {
                                                
                                                
                                                ?>
                                                
                                                <tr>
                                                    <th scope="row"><?php echo $id; ?></th>
                                                    <td><?php echo $row['admin_name'] ?></td>
                                                    <td><?php echo $row['admin_email'] ?></td>
                                                    <td><a onclick="confirmAction()" href='manage_admins.php?del_id=<?php echo $row['id']; ?>'><button><span class="fas fa-trash" style="color:red"> </span></button></a></td> 
                                                    
                                                </tr>
                                                <?php $id++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>











<?php include('includes/footer.php'); ?>