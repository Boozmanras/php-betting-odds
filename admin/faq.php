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
        $affectedRows = deleteData($db, 'faq', 'id = ' . $delId);

        // Output the number of affected rows
        echo "<script>alert('Row deleted succesfuly');</script>";

        // Close the database connection
       // $db->close();
    
} } 


if(isset($_POST['submit'])){
    $quiz = validateInput($db, $_POST['quiz']);
    $ans = validateInput($db, $_POST['answer']);
    $type = validateInput($db, $_POST['type']);

    $data = array(
        'quiz' => $quiz,
        'ans' => $ans,
        'type' => $type
    );
    $TableName = 'faq';
    insertData($db, $TableName, $data);



}

?>
<div class="content">
                <div class="container">
<div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">FAQS</div>
                                <div class="card-body">
                                    <h5 class="card-title">Manage frequently asked questions</h5>
                                    <form accept-charset="utf-8" action="faq.php" method="POST">
                                        <div class="mb-3">
                                            <label for="" class="form-label">question</label>
                                            <input type="text" name="quiz" placeholder="Write question" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Answer</label>
                                            <textarea name="answer" class="form-control" required></textarea>

                                        </div>
                                        <div class="mb-3 col-md-4">
                                                <label for="" class="form-label">Category</label>
                                                <select name="type" class="form-select" required>
                                                    <option value="" selected>Choose...</option>
                                                    <option value="general">General question</option>
                                                    <option value="how">How to play</option>
                                                    <option value="results">Results and winnings</option>
                                                    <option value="others">Others</option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select a State.</div>
                                            </div>
                                        <div class="mb-3">
                                            <input type="submit" name="submit" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                        // Call the function to extract data with limit and order by
                        $tableName = 'faq';
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
                                                    <th scope="col">Quiz</th>
                                                    <th scope="col">Ans</th>
                                                    <th scope="col">Category</th>
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
                                                    <td><?php echo $row['quiz'] ?></td>
                                                    <td><?php echo $row['ans'] ?></td>
                                                    <td><?php if(($row['type'])== 'general'){ echo 'General question'; } 
                                                    elseif(($row['type'] == 'how')){echo 'How to'; } 
                                                    elseif(($row['type'] == 'results')){echo 'Results and winnings'; }
                                                    elseif(($row['type'] == 'others')){echo 'Others'; }
                                                    else{ echo 'Error!!'; }
                                                
                                                ?></td>
                                                    <td><a onclick="confirmAction()" href='faq.php?del_id=<?php echo $row['id']; ?>'><button><span class="fas fa-trash" style="color:red"> </span></button></a></td> 
                                                    
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