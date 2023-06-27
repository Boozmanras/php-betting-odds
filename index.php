<?php 

include("includes/header.php");
include('includes/config.php');
include('includes/funct.php');
?>
<?php
if(isset($_POST['modal'])){
$phone = validateInput($db, $_POST['number']);
$amount = $_POST['amount'];
$type = $_POST['type'];


//echo $responce;


}
?>
<style>

.button-container {
display: flex;
justify-content: center;
}

.styled-button {
padding: 10px 20px;
font-size: 16px;
background-color: #4CAF50;
color: #fff;
border: none;
border-radius: 5px;
cursor: pointer;
width: 150px;
}

.styled-button:hover {
background-color: #45a049;
}

.styled-button:focus {
outline: none;
}

.styled-button:active {
background-color: #3e8e41;
}

</style>
<!-- banner begin -->
<div class="banner" id="header">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-9 col-lg-10 col-md-9">
<div class="banner-content">
<h4 class="subtitle">Get probable winning tips from ksh 100</h4>
<h1> Platform for sports prediction </h1>
<p>VIP has always been the best category of tips we have here,we ensure that the predictions are 100% sure.</br> We also make sure that our subscribers earn bonuses weekly.</p>
<a href="#" class="banner-btn">
Find Your Tips
</a>
</div>
</div>
<div class="col-xl-3 col-lg-3 d-xl-flex d-lg-flex d-block align-items-end">
<div class="part-img">
<img src="assets/images/banner-img.png" alt='banner image'>
</div>
</div>
</div>
</div>
</div>
<!-- banner end -->

<!-- how it works begin -->
<div class="how-it-works">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-8 col-lg-9 col-md-10">
<div class="section-title">
<h4 class="sub-title">
How It works
</h4>
<h2>Get Started with Easiest Steps</h2>
<p>Get probable winning tips us<br>
See how it works!</p>
</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-xl-4 col-lg-4 col-sm-9 col-md-6">
<div class="single-process">
<div class="part-img">
<img src="assets/images/process-1.png" alt>
</div>
<div class="part-text">
<h3 class="title"><span class="number"> 01.</span> Find tip you like</h3>
<p>Explore thousands of verified tips on our site.</p>
</div>
</div>
</div>
<div class="col-xl-4 col-lg-4 col-sm-9 col-md-6">
<div class="single-process">
<div class="part-img">
<img src="assets/images/process-2.png" alt>
</div>
<div class="part-text">
<h3 class="title"><span class="number"> 02.</span> Get your tips the website</h3>
<p>Select your tip, pay for it then it will be automatically be unlocked just for you.</p>
</div>
</div>
</div>
<div class="col-xl-4 col-lg-4 col-sm-9 col-md-6">
<div class="single-process">
<div class="part-img">
<img src="assets/images/process-3.png" alt>
</div>
<div class="part-text">
<h3 class="title"><span class="number"> 03.</span> Place a bet & win</h3>
<p>When you receive a tip, open your favourite betting plartform and place the bet.</p>
</div>
</div>
</div>          
</div>
</div>
</div>
<!-- how it works end -->

<!-- about begin -->
<div class="about">
<img src="assets/images/banner-shape.png" alt class="banner-shape">
<img src="assets/images/banner-shape.png" alt class="banner-shape">
<div class="container">
<div class="row justify-content-xl-between justify-content-lg-between justify-content-md-center">
<div class="col-xl-6 col-lg-7 col-md-9">
<div class="part-text">
<h4 class="subtitle">Know About Us</h4>
<h2>Get profit from our Tipster </h2>
<p>We believe that Betipter is the most extensive betting platform available for all kind of sports bettors, who are really wanting to bet on online betting site. We’ve built tools that help provide responsibility to your betting decisions.</p><p>We've highlighted your personal strengths and weaknesses, as well as providing knowledgeable tipsters that would compliment your existing betting portfolio.</p>
<a href="#0" class="learn-more-btn">Learn More</a>
</div>
</div>
<div class="col-xl-5 col-lg-5">
<div class="part-img">
<img src="assets/images/about.png" alt>
</div>
</div>
</div>
</div>
</div>
<!-- about end -->

<!-- leaderboard begin  -->
<?php 

$type = 'mult';
$limit = 1;
$odds=get_odds($conn,$type, $limit);

?>

<div class="leaderboard">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-8 col-lg-8 col-md-10">
<div class="section-title">

<h2>Free bet </h2>
<?php
foreach ($odds as $row) {

?>
<p><?php echo $row['above_text']; ?></p>
</br>
<h4>
<?php echo $row['no_odds'].' '.'ODDS'.'</br>'.'@'.' '.' '.$row['price']; ?>
</h4>
<?php } ?>








</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-xl-12 col-lg-12">
<div class="leaderboard-table">
<table class="table">
<thead>
<tr>




<th scope="col">Game</th>
<th scope="col">Prediction</th>

</tr>
</thead>
<tbody>
<tr>


<?php 
$type = 'mult';
$limit = 1;
$odds=get_odds($conn,$type, $limit); 
foreach ($odds as $row) {


?>

<td>
<span class="single-data">
<?php echo $row['game']; ?>
</span>
</td>
<td>
<span class="profit">
<?php echo $row['prediction']; ?>
</span>
</td>


</tr>
</tbody>
<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>

<!-- leaderboard end  -->
<!-- second leaderboasd -->
<?php
$type = 'gold';
$limit = 1;
$gold=get_odds($conn,$type, $limit);

?>
<div class="leaderboard">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-8 col-lg-8 col-md-10">
<div class="section-title">

<h2>Golden tips</h2>
<?php
foreach ($gold as $row1) {
$gold_price = $row1['price'];
?>
<p><?php echo $row1['above_text']; ?></p>
</br>
<h4>
<?php echo $row1['no_odds'].' '.'ODDS'.'</br>'.'@'.' '.'KSH.'.' '.$row1['price']; ?>
</h4>
<form method="POST" action="pay.php">
<input type="hidden" name="type" value="gold">
<input type="hidden" name="amount" value="<?php echo $row1['price']; ?>">
<div class="button-container">
<button type="submit" name="pay_to" class="styled-button">Buy odds</button>
</div>

</form>
<?php } ?>


</div>
</div>
</div>
</div>



<div class="row justify-content-center">
<div class="col-xl-12 col-lg-12">
<div class="leaderboard-table">
<table class="table">
<thead>
<tr>




<th scope="col">Game</th>
<th scope="col">Prediction</th>


</tr>
</thead>
<tbody>
<tr>


<?php 
$type = 'gold';
$limit = 5;
$gold =get_odds($conn,$type, $limit); 
foreach ($gold as $row1) {


?>

<td>
<span class="single-data">
<?php echo $row1['game']; ?>
</span>
</td>
<td>
<span class="profit">
<?php 
if (isset($_COOKIE['amount'])) {
if ($_COOKIE['amount'] == $gold_price) {
echo $row1['prediction'];
}
}

else
{
echo "Buy odds";
}

?>
</span>
</td>


</tr>
</tbody>
<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>
<!--end of gold leaderboad -->
<!-- beggining of premium leaderboard -->

<?php
$type = 'prem';
$limit = 1;
$prem=get_odds($conn,$type, $limit);

?>
<div class="leaderboard">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-8 col-lg-8 col-md-10">
<div class="section-title">

<h2>Premium tips</h2>
<?php
foreach ($prem as $row2) {
$premium_price = $row2['price'];
?>
<p><?php echo $row2['above_text']; ?></p>
</br>
<h4>
<?php echo $row2['no_odds'].' '.'ODDS'.'</br>'.'@'.' '.'KSH.'.' '.$row2['price']; ?>
</h4>
<!-- Trigger element -->
<form method="POST" action="pay.php">
<input type="hidden" name="type" value="premium">
<input type="hidden" name="amount" value="<?php echo $row2['price']; ?>">
<div class="button-container">
<button type="submit" name="pay_to" class="styled-button">Buy odds</button>
</div>

</form>
<?php } ?>

</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-xl-12 col-lg-12">
<div class="leaderboard-table">
<table class="table">
<thead>
<tr>




<th scope="col">Game</th>
<th scope="col">Prediction</th>


</tr>
</thead>
<tbody>
<tr>


<?php 
$type = 'prem';
$limit = 5;
$prem =get_odds($conn,$type, $limit); 
foreach ($prem as $row2) {


?>

<td>
<span class="single-data">
<?php echo $row2['game']; ?>
</span>
</td>
<td>
<span class="profit">
<?php 
if (isset($_COOKIE['amount'])) {
if ($_COOKIE['amount'] == $premium_price) {
echo $row2['prediction'];
}
}

else
{
echo "Buy odds";
}
?>
</span>
</td>


</tr>
</tbody>
<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>



<!-- end of premium leaderboad -->
<!--beginig of basic tips -->
<?php
$type = 'basic';
$limit = 1;
$basic=get_odds($conn,$type, $limit);

?>
<div class="leaderboard">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-8 col-lg-8 col-md-10">
<div class="section-title">

<h2>Basic tips</h2>
<?php
foreach ($basic as $row3) {
$basic_price = $row3['price'];
?>
<p><?php echo $row3['above_text']; ?></p>
</br>
<h4>
<?php echo $row3['no_odds'].' '.'ODDS'.'</br>'.'@'.' '.'KSH.'.' '.$row3['price']; ?>
</h4>
<!-- Trigger element -->
<form method="POST" action="pay.php">
<input type="hidden" name="type" value="basic">
<input type="hidden" name="amount" value="<?php echo $row3['price']; ?>">
<div class="button-container">
<button type="submit" name="pay_to" class="styled-button">Buy odds</button>
</div>

</form>

<?php } ?>

</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-xl-12 col-lg-12">
<div class="leaderboard-table">
<table class="table">
<thead>
<tr>




<th scope="col">Game</th>
<th scope="col">Prediction</th>


</tr>
</thead>
<tbody>
<tr>


<?php 
$type = 'basic';
$limit = 5;
$basic =get_odds($conn,$type, $limit); 
foreach ($basic as $row3) {


?>

<td>
<span class="single-data">
<?php echo $row3['game']; ?>
</span>
</td>
<td>
<span class="profit">
<?php 
if (isset($_COOKIE['amount'])) {
if ($_COOKIE['amount'] == $basic_price) {
echo $row3['prediction'];
}
}

else
{
echo "Buy odds";
}
?>
</span>
</td>


</tr>
</tbody>
<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>

<!-- end of basic tips -->

<!-- begining of extras -->

<?php
$type = 'extras';
$limit = 1;
$extras=get_odds($conn,$type, $limit);

?>
<div class="leaderboard">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-8 col-lg-8 col-md-10">
<div class="section-title">

<h2>Sportpesa jackpot tips</h2>
<?php
foreach ($extras as $row4) {
$extras_price = $row4['price'];
?>
<p><?php echo $row4['above_text']; ?></p>
</br>
<h4>
<?php echo $row4['no_odds'].' '.'ODDS'.'</br>'.'@'.' '.'KSH.'.' '.$row4['price']; ?>
</h4>
<!-- Trigger element -->
<form method="POST" action="pay.php">
<input type="hidden" name="type" value="extra">
<input type="hidden" name="amount" value="<?php echo $row4['price']; ?>">
<div class="button-container">
<button type="submit" name="pay_to" class="styled-button">Buy odds</button>
</div>

</form>
<?php } ?>

</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-xl-12 col-lg-12">
<div class="leaderboard-table">
<table class="table">
<thead>
<tr>




<th scope="col">Game</th>
<th scope="col">Prediction</th>


</tr>
</thead>
<tbody>
<tr>


<?php 
$type = 'extras';
$limit = 5;
$extras =get_odds($conn,$type, $limit); 
foreach ($extras as $row4) {


?>

<td>
<span class="single-data">
<?php echo $row4['game']; ?>
</span>
</td>
<td>
<span class="profit">
<?php 
if (isset($_COOKIE['amount'])) {
if ($_COOKIE['amount'] == $extras_price) {
echo $row4['prediction'];
}
}

else
{
echo "Buy odds";
}
?>
</span>
</td>


</tr>
</tbody>
<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>


<!-- end of extras -->
<!-- begin og betika-->
<?php
$type = 'betika';
$limit = 1;
$betika=get_odds($conn,$type, $limit);

?>
<div class="leaderboard">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-8 col-lg-8 col-md-10">
<div class="section-title">

<h2>Betika jackpot tips</h2>
<?php
foreach ($betika as $row5) {
$betika_price = $row5['price'];
?>
<p><?php echo $row5['above_text']; ?></p>
</br>
<h4>
<?php echo $row5['no_odds'].' '.'ODDS'.'</br>'.'@'.' '.'KSH.'.' '.$row5['price']; ?>
</h4>
<!-- Trigger element -->
<form method="POST" action="pay.php">
<input type="hidden" name="type" value="betika">
<input type="hidden" name="amount" value="<?php echo $row5['price']; ?>">
<div class="button-container">
<button type="submit" name="pay_to" class="styled-button">Buy odds</button>
</div>

</form>
<?php } ?>

</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-xl-12 col-lg-12">
<div class="leaderboard-table">
<table class="table">
<thead>
<tr>




<th scope="col">Game</th>
<th scope="col">Prediction</th>


</tr>
</thead>
<tbody>
<tr>


<?php 
$type = 'betika';
$limit = 5;
$betika =get_odds($conn,$type, $limit); 
foreach ($betika as $row4) {


?>

<td>
<span class="single-data">
<?php echo $row4['game']; ?>
</span>
</td>
<td>
<span class="profit">
<?php 
if (isset($_COOKIE['amount'])) {
if ($_COOKIE['amount'] == $gold_price) {
echo $row4['prediction'];
}
}

else
{
echo "Buy odds";
}
?>
</span>
</td>


</tr>
</tbody>
<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>

<!-- edn of betika -->
<!-- statics begin -->
<?php include('statistics.php'); ?>
<!-- statics end -->

<!-- tips begin -->
<?php include('history.php'); ?>
<!-- tips end -->

<!-- feature begin -->
<div class="feature">
<img src="assets/images/banner-shape.png" alt class="banner-shape">
<img src="assets/images/banner-shape.png" alt class="banner-shape">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-8 col-lg-8 col-md-9">
<div class="section-title">
<h4 class="sub-title">
Why Choose Us
</h4>
<h2>Features that users get</h2>
<?php 

// Call the function to extract data with limit and order by
$tableName = 'system';
$columns = 'why';
$condition = "";
$limit = 1;
$orderBy = "";
$data1 = extractData($conn, $tableName, $columns, $condition, $limit, $orderBy);

foreach ($data1 as $row1) { echo '<p>'.$row1['why'].'</p>'; }
?>

</div>
</div>
</div>
<div class="row justify-content-xl-between justify-content-lg-center">
<div class="col-xl-8 col-lg-10 d-xl-flex d-lg-flex d-block align-items-center">
<div class="part-all-feature">
<div class="row">
<div class="col-xl-4 col-lg-4 col-sm-6 col-md-4">
<div class="single-feature">
<div class="part-icon">
<img src="assets/images/open-mail.png" alt>
</div>
<div class="part-text">
<h4 class="title">Receive by Mail</h4>

</div>
</div>
</div>
<div class="col-xl-4 col-lg-4 col-sm-6 col-md-4">
<div class="single-feature">
<div class="part-icon">
<img src="assets/images/guarantee-certificate.png" alt>
</div>
<div class="part-text">
<h4 class="title">Guaranteed Tips</h4>

</div>
</div>
</div>
<div class="col-xl-4 col-lg-4 col-sm-6 col-md-4">
<div class="single-feature">
<div class="part-icon">
<img src="assets/images/print-proof.png" alt>
</div>
<div class="part-text">
<h4 class="title">100% Proofed Tips</h4>

</div>
</div>
</div>
<div class="col-xl-4 col-lg-4 col-sm-6 col-md-4">
<div class="single-feature">
<div class="part-icon">
<img src="assets/images/verified-account.png" alt>
</div>
<div class="part-text">
<h4 class="title">Verified Odds</h4>

</div>
</div>
</div>
<div class="col-xl-4 col-lg-4 col-sm-6 col-md-4">
<div class="single-feature">
<div class="part-icon">
<img src="assets/images/protected-profile.png" alt>
</div>
<div class="part-text">
<h4 class="title">Buyer Protection</h4>

</div>
</div>
</div>
<div class="col-xl-4 col-lg-4 col-sm-6 col-md-4">
<div class="single-feature">
<div class="part-icon">
<img src="assets/images/wallet.png" alt>
</div>
<div class="part-text">
<h4 class="title">Credits Based System</h4>

</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-3">
<div class="part-img">
<img src="assets/images/feature-img.png" alt>
</div>
</div>
</div>
</div>
</div>
<!-- feature end -->

<!-- testimonial begin -->
<?php include('testimony.php'); ?>
<!-- testimonial end -->



<!-- newsletter begin -->
<div class="newsletter">
<div class="part-img">
<img src="assets/images/newsletter.png" alt>
</div>
<div class="container">
<div class="row justify-content-between">
<div class="col-xl-7 col-lg-7 d-xl-flex d-lg-flex d-block align-items-center">
<div class="newsletter-area">
<div class="part-text">
<h3 class="sub-title">Get Always Update News</h3>
<h2>Kudosbet Newsletter</h2>
</div>
<div class="part-form">
<form>
<input type="email" placeholder="Enter your email address here...@">
<button type="submit">
<img src="assets/images/rocket.png" alt>
</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- newsletter end -->


<!-- Modal -->
<div id="myModal" class="modal">
<div class="modal-content">
<span class="close">&times;</span>
<div class="lipa-na-m-pesa-box">
<h2>M-Pesa Buy Goods</h2>
<p>Till Number:</p>
<div class="till-number">8453672</div>
<div class="instructions">
<p>Enter <b>1000</b> for <b>3 Fixed games</b></p>
<p>Enter <b>600</b> for <b>Golden tips</b></p>
<p>Enter <b>400</b> for <b>Premium tips</b></p>
<p>Enter <b>100</b> for <b>Basic tips</b></p>
<p>Enter <b>300</b> for <b>Jackpot tips</b></p>
<p>Enter your M-Pesa PIN</p>
<p>Confirm the transaction</p>
<p>Click continue</p>
</div>
</div>
<?php /*<h3>Fill in M-Pesa number and activate STK</h3>

<form id="myForm" action="index.php" method="POST">
<label for="name">M-Pesa number</label>
<input type="text" value="<?php if(isset($m_number)){echo $m_number; } ?>" id="name" name="number" required>
<label for="name">Amount</label>
<input type="text" value="<?php if(isset($m_amount)){echo $m_amount; } ?>" id="name" name="amount" required>

</br>
<input type="submit" name="modal" value="Submit">
</form>
<b>OR</b>
<img src="assets/images/mpesa_pay.jpg" alt="mpesa payment description" style="width: 100%; max-height: 300px; object-fit: cover; border-radius: 10px;"> */ ?>

</div>
</div>





<?php include("includes/footer.php"); ?>