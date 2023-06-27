<?php 

session_start();
include("includes/header.php");
include('includes/config.php');
include('includes/funct.php');
?>
<style>
.modal-content {
background-color: #e6f4ea;
border: 1px solid #b3e3c4;
padding: 20px;
border-radius: 5px;
}

.success-message {
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.close {
float: right;
font-size: 24px;
font-weight: bold;
cursor: pointer;
color: #666;
}

.lipa-na-m-pesa-box {
margin-top: 20px;
}

.till-number {
font-size: 20px;
font-weight: bold;
margin-bottom: 10px;
}

.instructions {
margin-top: 10px;
}

.instructions p {
margin: 5px 0;
}

.instructions b {
font-weight: bold;
}
.beautiful-form {
max-width: 400px;
margin: 0 auto;
padding: 20px;
background-color: #f7f7f7;
border-radius: 5px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.beautiful-form h2 {
text-align: center;
margin-bottom: 20px;
}

.form-group {
margin-bottom: 20px;
}

.form-group label {
display: block;
font-weight: bold;
}

.form-group input {
width: 100%;
padding: 10px;
font-size: 16px;
border-radius: 5px;
border: 1px solid #ccc;
}

.form-group button {
padding: 10px 20px;
font-size: 16px;
background-color: #4CAF50;
color: #fff;
border: none;
border-radius: 5px;
cursor: pointer;
width: 100%;
}

.form-group button:hover {
background-color: #45a049;
}

.form-group button:focus {
outline: none;
}

.form-group button:active {
background-color: #3e8e41;
}

.confirm-payment-button {
text-align: center;
margin-top: 10px;
}

.confirm-payment-button button {
padding: 6px 12px;
font-size: 14px;
background-color: #337ab7;
color: #fff;
border: none;
border-radius: 5px;
cursor: pointer;
}

.confirm-payment-button button:hover {
background-color: #286090;
}

.confirm-payment-button button:focus {
outline: none;
}

.confirm-payment-button button:active {
background-color: #204d74;
}



</style>
<?php
if(isset($_POST['confirm']))
{



$tableName = 'tinypesa'; 
$phoneColumnName = 'PhoneNumber';
$amountColumnName = 'amount'; 
if(isset($_COOKIE['phone_number'])){
$phone    = $_COOKIE['phone_number'];
$amount = $_COOKIE['amount'];
$phoneExists = checkDataExists($conn, $tableName, $phoneColumnName, $phone);
$amountExists = checkDataExists($conn, $tableName, $amountColumnName, $amount);

if ($phoneExists && $amountExists) {
$tableName = "tinypesa";
$columnName = "status";
$data = null;

// Call the checkDataExists function
$dataExists = checkDataExists($conn, $tableName, $columnName, $data);

if ($dataExists) {

$tableName = "tinypesa";
$columnToUpdate = "status";
$newValue = 102;
$conditionColumn = "status";
$conditionValue = null;
$updateSuccess = updatedata($conn, $tableName, $columnToUpdate, $newValue, $conditionColumn, $conditionValue);
if ($updateSuccess) {
setcookie('bet', $amount, time() + (24 * 60 * 60), '/');
echo "<script> alert('confirmed you can now access your bets');</script>";
} else {
echo "<script> alert('error updating'); </script>";
}

} else {
echo "<script> alert('access token expired'); </script>";
}



} else {
echo "<script> alert('ERROR!! no payment data found, if paid please consult the admin'); </script>";

}

}
else
{
echo "<script> alert('Pay first'); </script>";
}

}


if(isset($_POST['pay_to']))
{
$amount = $_POST['amount'];
$type = $_POST['type'];
$_SESSION['Amount'] = $amount;

}
if(isset($_POST['stk']))
{
$number = validateInput($conn, $_POST['phone']);
$amount = $_SESSION['Amount'];

$formattedPhoneNumber = formatPhoneNumber($number);

if ($formattedPhoneNumber) {

if (strpos($result, 'Success') !== false) {
setcookie('phone_number', $number, time() + (24 * 60 * 60), '/');
setcookie('amount', $amount, time() + (24 * 60 * 60), '/');
echo "<script> alert('success, please click confirm payment');</script>";
} else {
echo "<script>alert('$result');</script>";
}



} else {
echo "<script> alert('Invalid Phone Number'); </script>";
}

}
?>
</br>

<div class="modal-content success-message">
<span class="close">&times;</span>
<div class="lipa-na-m-pesa-box">
<h2>M-Pesa Buy Goods</h2>
<p>Till Number:</p>
<div class="till-number">8453672</div>
<div class="instructions">
<p><?php echo $type.' '; ?> odds</p>
<p>Enter number</p>
<p>Click pay</p>
<p>Enter password in stk</p>
<p>After payment click confirm payment</p>
</div>
</div>
</div>


<form class="beautiful-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h2>Payment Form</h2>
<div class="form-group">
<label for="phone">Phone Number:</label>
<input type="text" id="phone" name="phone" value="<?php if(isset($number)){ echo $number; } ?>" placeholder="Enter phone number" required>
</div>
<div class="form-group">
<label for="amount">Amount:</label>
<input type="number" id="amount" name="amount" value="<?php echo $_SESSION['Amount']; ?>" required disabled>
</div>
<div class="form-group">
<button name="stk" type="submit">Submit</button>
</div>
<div class="confirm-payment-button">
<button name="confirm" type="submit">Confirm Payment</button>
</div>
</form>

</br>
<script>
// Get the close button element
const closeButton = document.querySelector('.close');

// Add click event listener to close button
closeButton.addEventListener('click', function() {
// Hide the modal content
const modalContent = document.querySelector('.modal-content');
modalContent.style.display = 'none';
});

</script>

<?php
include('includes/footer.php');
?>