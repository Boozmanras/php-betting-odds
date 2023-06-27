<?php

function stk($amount, $phoneNumber, $accountNumber = '') {
$url = 'https://tinypesa.com/api/v1/express/initialize';
$data = array(
'amount' => $amount,
'msisdn' => $phoneNumber,
'account_no' => $accountNumber
);
$headers = array(
'Content-Type: application/x-www-form-urlencoded',
'ApiKey: jPkJoXcLNg6' 
);
$info = http_build_query($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$resp = curl_exec($curl);
// Check for CURL errors
if ($resp === false) {
return "CURL ERROR: " . curl_error($curl);
} else {
$msg_resp = json_decode($resp);
// Check if the request was successful
if ($msg_resp->success == 'true') {
return "✔✔ TinyPesa transaction initialized successfully. With request id " . $msg_resp->request_id;
} else {
// Handle any errors returned by the API
return "ERROR: " . $resp;
}
}
// Close the CURL session
curl_close($curl);
}






function selectData($conn, $tableName, $columns = "*", $condition = "")
{
// Prepare the statement
$sql = "SELECT $columns FROM $tableName";
if (!empty($condition)) {
$sql .= " WHERE $condition";
}
$statement = $conn->prepare($sql);

if (!$statement) {
//die('Error in preparing the statement: ' . $conn->error);
}

// Execute the statement
$executeResult = $statement->execute();

if (!$executeResult) {
//die('Error in executing the statement: ' . $statement->error);
}

// Get the result set
$result = $statement->get_result();

// Fetch the data
$data = array();
while ($row = $result->fetch_assoc()) {
$data[] = $row;
}

// Close the statement and free the result set
$statement->close();
$result->free_result();

return $data;
}



function extractData($connection, $tableName, $columns, $condition , $limit , $orderBy )
{
// Prepare the statement
$sql = "SELECT $columns FROM $tableName";
if (!empty($condition)) {
$sql .= " WHERE $condition";
}
if (!empty($orderBy)) {
$sql .= " ORDER BY $orderBy";
}
if ($limit !== null) {
$sql .= " LIMIT ?";
}
$statement = $connection->prepare($sql);

if (!$statement) {
die('Error in preparing the statement: ' . $connection->error);
}

// Bind limit parameter, if provided
if ($limit !== null) {
$statement->bind_param('i', $limit);
}

// Execute the statement
$executeResult = $statement->execute();

if (!$executeResult) {
die('Error in executing the statement: ' . $statement->error);
}

// Get the result set
$result = $statement->get_result();

// Fetch the data
$data = array();
while ($row = $result->fetch_assoc()) {
$data[] = $row;
}

// Close the statement and free the result set
$statement->close();
$result->free_result();

return $data;
}



function insertData($connection, $tableName, $data) {
$columns = implode(", ", array_keys($data));
$placeholders = implode(", ", array_fill(0, count($data), "?"));
$values = array_values($data);

$sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";
$statement = $connection->prepare($sql);

if (!$statement) {
//die('Error in preparing the statement: ' . $connection->error);
}

// Bind the values to the prepared statement
$types = str_repeat("s", count($values)); // Assuming all values are strings
$statement->bind_param($types, ...$values);

// Execute the statement
$executeResult = $statement->execute();

if (!$executeResult) {
// die('Error in executing the statement: ' . $statement->error);
}

//echo '<script>alert("Submitted");</script>';


// Close the statement
$statement->close();

// Return the ID of the newly inserted row
return $connection->insert_id;
}


function validateInput($db, $input) {
// Remove any unwanted characters
$input = trim($input);
$input = stripslashes($input);
$input = htmlspecialchars($input);

// Escape special characters
$input = mysqli_real_escape_string($db, $input);

return $input;
}


function checkDataExists($conn, $tableName, $columnName, $data) {
// Escape the data to prevent SQL injection
$escapedData = $conn->real_escape_string($data);

// Prepare the SQL query
$query = "SELECT COUNT(*) as count FROM $tableName WHERE $columnName = '$escapedData'";

// Execute the query
$result = $conn->query($query);

if ($result) {
// Fetch the result as an associative array
$row = $result->fetch_assoc();

// Get the count
$count = $row['count'];

// Check if the count is greater than zero
if ($count > 0) {
return true;  // Data exists in the database
} else {
return false;  // Data does not exist in the database
}
} else {
echo "Query error: " . $conn->error;
return false;  // Assume data does not exist if there's a query error
}
}

function formatPhoneNumber($phoneNumber) {
// Remove any non-digit characters
$phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

// Check the starting digits and apply transformations accordingly
if (substr($phoneNumber, 0, 2) === '07' || substr($phoneNumber, 0, 2) === '01') {
// Remove the leading '0' and prepend '254'
$phoneNumber = '254' . substr($phoneNumber, 1);
} elseif (substr($phoneNumber, 0, 4) === '+254' || substr($phoneNumber, 0, 4) === '+251') {
// Remove the leading '+' and prepend '254'
$phoneNumber = '254' . substr($phoneNumber, 1);
}

// Ensure the phone number has a total of 12 digits
if (strlen($phoneNumber) !== 12) {
// Phone number does not have the required length
return false;
}

return $phoneNumber;
}

function updatedata($connection, $tableName, $columnToUpdate, $newValue, $conditionColumn, $conditionValue) {
// Prepare the SQL statement
$statement = $connection->prepare("UPDATE $tableName SET $columnToUpdate = ? WHERE $conditionColumn = ?");

// Bind the parameter values
$statement->bind_param("si", $newValue, $conditionValue);

// Execute the prepared statement
$statement->execute();

// Check for successful execution
$success = ($statement->affected_rows > 0);

// Close the statement
$statement->close();

// Return the success status
return $success;
}



?>