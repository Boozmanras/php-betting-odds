<?php



function countRows($connection, $tableName) {
    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) FROM $tableName";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die('Error in executing the statement: ' . mysqli_error($connection));
    }

    // Fetch the count value
    $row = mysqli_fetch_array($result);
    $count = $row[0];

    // Free the result set
    mysqli_free_result($result);

    return $count;
}




function deleteData($conn, $tableName, $condition)
{
    // Prepare the DELETE statement
    $sql = "DELETE FROM $tableName WHERE $condition";
    $statement = $conn->prepare($sql);

    if (!$statement) {
       // die('Error in preparing the statement: ' . $conn->error);
    }

    // Execute the statement
    $executeResult = $statement->execute();

    if (!$executeResult) {
        //die('Error in executing the statement: ' . $statement->error);
    }

    // Check the number of affected rows
    $affectedRows = $statement->affected_rows;

    // Close the statement
   // $statement->close();

    // Return the number of affected rows
    return $affectedRows;
}

function extractData($connection, $tableName, $columns = "*", $condition = "", $limit = null, $orderBy = "")
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
       // die('Error in executing the statement: ' . $statement->error);
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


  function validateInput($db, $input) {
    // Remove any unwanted characters
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
  
    // Escape special characters
    $input = mysqli_real_escape_string($db, $input);
  
    return $input;
  }
  
  function validateImage($file) {
    // Get the file extension
    $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
  
    // Set allowed file extensions
    $allowedExt = array('jpg', 'jpeg', 'png', 'gif');
  
    // Check if the file extension is allowed
    if(!in_array($fileExt, $allowedExt)) {
      return "Invalid file type. Please upload a JPG, JPEG, PNG, or GIF file.";
    } else {
      // Check if the file size is less than or equal to 2MB
      if($file['size'] > 2 * 1024 * 1024) {
        return "File size too large. Please upload a file less than or equal to 2MB.";
      } else {
        // File is valid
        return true;
      }
    }
  }


  function insertData($conn, $tableName, $data)
  {
     
// Prepare the statement
$placeholders = array_fill(0, count($data), '?');
$columns = implode(', ', array_keys($data));
$values = implode(', ', $placeholders);
$sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
$statement = $conn->prepare($sql);

if (!$statement) {
    die('Error in preparing the statement: ' . $conn->error);
}

// Bind parameters
$types = str_repeat('s', count($data)); // Assuming all values are strings
$bindParams = array();
$bindParams[] = &$types;
foreach ($data as $key => $value) {
    $bindParams[] = &$data[$key];
}
$bindResult = call_user_func_array([$statement, 'bind_param'], $bindParams);

if (!$bindResult) {
   // die('Error in binding parameters: ' . $statement->error);
}

// Execute the statement
$executeResult = $statement->execute();
echo "<script>alert('saved succesfully');</script>";

if (!$executeResult) {

    echo "<script>alert('error');</script>";
   // $successMessages[] = "all data saved succesfully";
   // die('Error in executing the statement: ' . $statement->error);
}

      // Close the statement
     // $statement->close();
  }

  function editData($conn, $tableName, $data, $condition)
  {
      // Prepare the statement
      $setClause = implode('=?, ', array_keys($data)) . '=?';
      $sql = "UPDATE $tableName SET $setClause WHERE $condition";
      $statement = $conn->prepare($sql);
  
      if (!$statement) {
          die('Error in preparing the statement: ' . $conn->error);
      }
  
      // Bind parameters
      $types = str_repeat('s', count($data)); // Assuming all values are strings
      $bindParams = array();
      $bindParams[] = &$types;
      foreach ($data as $key => $value) {
          $bindParams[] = &$data[$key];
      }
      $bindResult = call_user_func_array([$statement, 'bind_param'], $bindParams);
  
      if (!$bindResult) {
          die('Error in binding parameters: ' . $statement->error);
      }
  
      // Execute the statement
      $executeResult = $statement->execute();
      echo "<script>alert('Updated succesfully');</script>";
      $successMessages[] = "all data updated succesfully";
  
      if (!$executeResult) {
          //die('Error in executing the statement: ' . $statement->error);
      }
  
      // Close the statement
      //$statement->close();
  }





?>