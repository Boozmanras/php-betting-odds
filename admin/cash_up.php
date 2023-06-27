<?php
include('includes/config.php');
include('includes/header.php');
include('includes/func.php');

// Ensure that the del_id parameter is present in the URL
if (isset($_GET['del_id'])) {
// Get the del_id parameter value and sanitize it
$delId = filter_var($_GET['del_id'], FILTER_SANITIZE_NUMBER_INT);

// Check if the del_id value is valid
if ($delId !== false && $delId !== "") {


// Call the deleteData function
$affectedRows = deleteData($db, 'tinypesa', 'id = ' . $delId);

// Output the number of affected rows
echo "<script>alert('Row deleted succesfuly');</script>";

// Close the database connection
// $db->close();

} } 
// Call the function to extract data with limit and order by
$tableName = 'tinypesa';
$columns = '*';
$condition = "";
$limit = 20;
$orderBy = "id DESC";
$data = extractData($db, $tableName, $columns, $condition, $limit, $orderBy);

?>
<div class="container">
<div class="col-md-12 col-lg-12">
<div class="card">
<div class="card-header">History overview</div>
<div class="card-body">
<p class="card-title">Recent updates</p>
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Phone number</th>
<th scope="col">Amount</th>
<th scope="col">Mpesa receipt</th>
<th scope="col">Status</th>
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
<td><?php echo $row['PhoneNumber'] ?></td>
<td><?php echo $row['amount'] ?></td>
<td><?php echo $row['MpesaReceiptNumber'] ?></td>
<td><?php if($row['status'] != null){ echo 'Token used'; } else {echo "unused token"; } ?></td>
<td><a onclick="confirmAction()" href='cash_up.php?del_id=<?php echo $row['id']; ?>'><button><span class="fas fa-trash" style="color:red"> </span></button></a></td> 

</tr>
<?php $id++; } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<?php
include('includes/footer.php');
?>