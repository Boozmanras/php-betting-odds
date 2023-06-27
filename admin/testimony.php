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
$affectedRows = deleteData($db, 'testimonies', 'id = ' . $delId);

// Output the number of affected rows
echo "<script>alert('Row deleted succesfuly');</script>";

// Close the database connection
// $db->close();

} } 

if(isset($_POST['testimon'])){
$username = validateInput($db,$_POST['username']);
$region = validateInput($db,$_POST['region']);
$testimony = validateInput($db,$_POST['testimony']);

$data = array(
'name' => $username,
'region' => $region,
'testimony' => $testimony
);
$TableName = 'testimonies';
insertData($db, $TableName, $data);
}




?>
<script>
function confirmAction() {
var confirmed = confirm("Are you sure you want to delete this item?");

if (confirmed) {
// User confirmed the action
alert("Item deleted successfully!");
// Perform the action here
} else {
// User canceled the action
alert("Action canceled.");
}
}
</script>
<div class="content">
<div class="container">
<div class="page-title">
<h3>Testimonies</h3>
</div>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">Manage testimonies</div>
<div class="card-body">
<h5 class="card-title">Add testimony</h5>
<form accept-charset="utf-8" action="testimony.php" method="POST">
<div class="col-md-6">
<p class="text-muted">Add testimonials</p>
<div class="mb-3">
<label for="" class="form-label">Name</label>
<input class="form-control" name='username' value="<?php if(isset($username)){ echo $username;
} ?>" required/>
</div>
<div class="mb-3">
<label for="" class="form-label">Region</label>
<input class="form-control" name='region' value="<?php if(isset($region)){echo $region; } ?>" required/>
</div>
<div class="mb-3">
<label for="" class="form-label">testimonial</label>
<p>Character Count: <span id="charCount2">0</span>/150</p>
<textarea id="textarea2" name ='testimony' class='form-control' rows="4" cols="50"><?php if(isset($testimony)){echo $testimony; } ?></textarea>

</div>
<div class="mb-3 text-end">
<button class="btn btn-success" name='testimon' type="submit"><i class="fas fa-check"></i> Save</button>
</div>
</div>
</form>
</div>
</div>
</div>
<?php
// Call the function to extract data with limit and order by
$tableName = 'testimonies';
$columns = '*';
$condition = "";
$limit = 10;
$orderBy = "id DESC";
$data = extractData($db, $tableName, $columns, $condition, $limit, $orderBy);

?>
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
<th scope="col">Name</th>
<th scope="col">Region</th>
<th scope="col">Testimony</th>
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
<td><?php echo $row['name'] ?></td>
<td><?php echo $row['region'] ?></td>
<td><?php echo $row['testimony'] ?></td>
<td><a onclick="confirmAction()" href='testimony.php?del_id=<?php echo $row['id']; ?>'><button><span class="fas fa-trash" style="color:red"> </span></button></a></td> 

</tr>
<?php $id++; } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>



<?php include('includes/footer.php'); ?>