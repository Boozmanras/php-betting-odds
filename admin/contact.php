<?php
include('includes/header.php');
include('includes/config.php');
include('includes/func.php');

?>
    <style>
               /* Add your custom CSS styles for the admin dashboard */
               body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .message-username {
            font-weight: bold;
        }

        .message-email,
        .message-phone {
            color: #777777;
        }

        .message-subject {
            font-weight: bold;
            color: #555555;
        }

        .message-text {
            margin-top: 5px;
        }
    </style>

    </style>

<body>
    <div class="container">
        
<div class="card">
<div class="card-header">Admin contact messages</div>
<div class="card-body">
    <p class="card-title">Recent Messages</p>
       
        <?php
       // Call the function to extract data with limit and order by
       $tableName = 'messages';
       $columns = '*';
       $condition = "";
       $limit = 20;
       $orderBy = "id DESC";
       $data = extractData($db, $tableName, $columns, $condition, $limit, $orderBy);
?>
       <?php 
            // Process the extracted data
            $id = 1;
        foreach ($data as $row) {
        
        
        ?>
                <div class="message">
                <div class="message-header">
                <div class="message-username"> <?php echo $row['name']; ?> </div>
                <div class="message-email"> <?php echo $row['email']; ?> </div>
                <div class="message-phone"> <?php echo $row['phone']; ?> </div>
                </div>
                <div class="message-subject"> <?php echo $row['subject']; ?> </div>
                <div class="message-text"><?php echo $row['message']; ?></div>
    </div>
    <?php } ?>

</div>
</div>
    </div>
  <?php include('includes/footer.php'); ?>