<?php include('includes/header.php');
include_once('includes/config.php');
 include('includes/func.php');
 // Ensure that the del_id parameter is present in the URL
 if (isset($_GET['del_id'])) {
     // Get the del_id parameter value and sanitize it
     $delId = filter_var($_GET['del_id'], FILTER_SANITIZE_NUMBER_INT);
 
     // Check if the del_id value is valid
     if ($delId !== false && $delId !== "") {
        
 
         // Call the deleteData function
         $affectedRows = deleteData($db, 'odds', 'id = ' . $delId);
 
         // Output the number of affected rows
         echo "<script>alert('Row deleted succesfuly');</script>";
 
         // Close the database connection
        // $db->close();
     
 } } 

  if(isset($_POST['submit'])){
    $type = $_POST['type'];
      $above_text = validateInput($db, $_POST['text_1']);
      $number_odds = validateInput($db, $_POST['odds_no']);
      $price = validateInput($db, $_POST['price']);
      $game = validateInput($db, $_POST['game_1']);
      $tip_1 = validateInput($db, $_POST['tip_1']);
      $prediction = validateInput($db, $_POST['prediction']);
    if(($type)== 'mult'){
        $price = 'Free';
    }
      $data = array(
        'type' => $type,
        'above_text' => $above_text,
        'no_odds' => $number_odds,
        'price' => $price,
        'game' => $game,
        'tip' => $tip_1,
     'prediction' => $prediction
    );
    $TableName = 'odds';
    insertData($db, $TableName, $data);

  }
  

?>
<div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Todays odds settings</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Betting settings</div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                    <?php if (isset($_SESSION['success'])) { ?>
                                    <div class="alert alert-success">
                     <h5 class="alert-title"><i class="fas fa-check"></i> <?php echo $_SESSION['success']; ?>
                                    </div>
                                    <?php                                
                                // Unset the session variable
                                  unset($_SESSION['success']);
                                         } ?>
       
                                    </h5>
                                    <form action ='today.php' method='POST'>
                                    <div class="mb-3">
                                            <label for="text" class="form-label">above text</label>
                                            <textarea class="form-control" name="text_1" required><?php if(isset($above_text)){echo $above_text; } ?></textarea>
                                           
                                        </div>
                                        <button class="learn-more-btn" id="openModalBtn">Buy odds</button>


  

                                        <div class="mb-3">
                                            <label for="number" class="form-label">Number of odds</label>
                                            <input type="number" name="odds_no" placeholder="number of odds" value="<?php if(isset($number_odds)){echo $number_odds; } ?>" class="form-control" step="0.01" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="number" class="form-label">Price</label>
                                            <input type="number" name="price" placeholder="Price of odds" value='<?php if(isset($price)){echo $price;} ?>' class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="text" class="form-label">Game</label>
                                            <textarea class="form-control" name="game_1" required><?php if(isset($game)){echo $game;} else{ echo 'eg Chelsea vs liverpool';} ?></textarea>
                                           
                                        </div>
                                        <div class="mb-3">
                                            <label for="text" class="form-label">Tip</label>
                                            <textarea class="form-control" name="tip_1" required><?php if(isset($tip_1)){echo $tip_1;} else{ echo 'tip';} ?></textarea>
                                           
                                        </div>
                                        <div class="mb-3">
                                            <label for="text" class="form-label">Prediction</label>
                                            <input type="text" name="prediction" placeholder="fixed win, fixed game,HT/FT" value= '<?php if(isset($prediction)){echo $prediction;} ?>' class="form-control" required>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                                <label for="state" class="form-label">Type</label>
                                                <select name="type" class="form-select" required>
                                                    <option value="" selected>Type</option>
                                                    <option value="mult">Free bet</option>
                                                    <option value="gold">Golden tips</option>
                                                    <option value="prem">Premium tips</option>
                                                    <option value="basic">Basic tips</option>
                                                    <option value="extras">Sportpesa jackpot tips</option>
                                                    <option value="betika">Betika jackpot tips</option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select a type.</div>
                                            </div>

                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary" name= 'submit'>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        
                            <?php
                        // Call the function to extract data with limit and order by
                        $tableName = 'odds';
                        $columns = '*';
                        $condition = "";
                        $limit = '50';
                        $orderBy = "id DESC";
                        $extract = extractData($db, $tableName, $columns, $condition, $limit, $orderBy);

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
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Above text</th>
                                                    <th scope="col">No. odds</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Game</th>
                                                    <th scope="col">Tip</th>
                                                    <th scope="col">Prediction</th>
                                                    <th scope="col">Delete</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                 // Process the extracted data
                                                 $id = 1;
                                                foreach ($extract as $row1) {
                                                
                                                
                                                ?>
                                                
                                                <tr>
                                                    <th scope="row"><?php echo $id; ?></th>
                                                    <td><?php if(($row1['type'])== "extras"){echo 'Sportpesa'; } elseif(($row1['type'])=='mult'){echo 'Multibet';} else{  echo $row1['type']; } ?></td>
                                                    <td><?php echo $row1['above_text'] ?></td>
                                                    <td><?php echo $row1['no_odds'] ?></td>
                                                    <td><?php echo $row1['price'] ?></td>
                                                    <td><?php echo $row1['game'] ?></td>
                                                    <td><?php echo $row1['tip'] ?></td>
                                                    <td><?php echo $row1['prediction'] ?></td>
                                                    <td><a onclick="confirmAction()" href='today.php?del_id=<?php echo $row1['id']; ?>'><button><span class="fas fa-trash" style="color:red"> </span></button></a></td> 
                                                    
                                                </tr>
                                                <?php $id++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
</div>


                        </div>
                        <?php include('includes/footer.php'); ?>