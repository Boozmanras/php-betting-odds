<?php 
include('includes/config.php');
include('includes/header.php');
include('includes/func.php');


if(isset($_POST['save_history'])){

    $team = validateInput($db,$_POST['team']);
    $date = validateInput($db,$_POST['date']);
    $tip = validateInput($db,$_POST['tip']);
    $results = validateInput($db,$_POST['results']);

    $data = array(
        'teams' => $team,
        'date' => $date,
        'tip' => $tip,
        'results' => $results
    );
    $tableName = 'history';
    insertData($db, $tableName, $data);

}




?>
<div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>History</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Odds history settings</div>
                                <div class="card-body">
                                    <h5 class="card-title">Change odds history settings</h5>
                                    <form accept-charset="utf-8" action="history.php" method="POST">
                                        <div class="mb-3">
                                            <label for="team" class="form-label">Teams</label>
                                            <input type="text" name="team" placeholder="eg team1 vs team2" value="<?php if(isset($team)){echo $team; } ?>" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" name="date" value="<?php if(isset($date)){echo $date; } ?>" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="team" class="form-label">Tip</label>
                                            <input type="text" name="tip" placeholder="tip" value="<?php if(isset($tip)){echo $tip; } ?>" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="team" class="form-label">results</label>
                                            <select name='results' class="form-control" required>
                                                <option value="win">Win</option>
                                                <option value="loss">Loss</option>
                                            </select>
                                            
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name='save_history' class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                        // Call the function to extract data with limit and order by
                        $tableName = 'history';
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
                                                    <th scope="col">Teams</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Tip</th>
                                                    <th scope="col">Results</th>
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
                                                    <td><?php echo $row['teams'] ?></td>
                                                    <td><?php echo $row['date'] ?></td>
                                                    <td><?php echo $row['tip'] ?></td>
                                                    <td><?php echo $row['results'] ?></td>
                                                </tr>
                                                <?php $id++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <?php include('includes/footer.php'); ?>