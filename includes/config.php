<?php
/*$servername = "localhost";
$username = "easyqash_victor";
$password = "Wakhungu^2002";
$dbname = "easyqash_kudosbet"; */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "betting";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Server error!!");
}

//fetch results from db
if (!function_exists('get_odds')) {
    function get_odds($conn, $type, $limit) {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("SELECT id, above_text, no_odds, price, game, prediction, type FROM odds WHERE type = ? ORDER BY id DESC LIMIT ?");
        $stmt->bind_param("si", $type, $limit);
    
        // Set the parameter values and execute the SQL statement
        $stmt->execute();
    
        // Bind the result variables
        $stmt->bind_result($id, $above_text, $no_odds, $price, $game, $prediction, $type);
    
        // Fetch results and store in an array
        $results = array();
        while ($stmt->fetch()) {
            $row = array(
                "id" => $id,
                "above_text" => $above_text,
                "no_odds" => $no_odds,
                "price" => $price,
                "game" => $game,
                "prediction" => $prediction,
                "type" => $type
            );
            $results[] = $row;
        }
    
        return $results;
    }
}
    


?>