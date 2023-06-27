<?php include('includes/header.php');
include_once('includes/config.php');
include_once('includes/func.php');

// Initialize empty success messages array
$successMessages = array();

if(isset($_POST['address_a'])){
    $address = $_POST['address'];
    $data = array(
        'address' => $address
    );
    $condition = 'id = 1';
    $tableName = 'system';
    editData($db, $tableName, $data, $condition);
    }

if(isset($_POST['email_a'])){
    $email = $_POST['email'];
    $data = array(
        'email' => $email
    );
    $condition = 'id = 1';
    $tableName = 'system';
    editData($db, $tableName, $data, $condition);
    }

if(isset($_POST['number'])){
    $no = $_POST['no'];
    $data = array(
        'phone' => $no
    );
    $condition = 'id = 1';
    $tableName = 'system';
    editData($db, $tableName, $data, $condition);
    }

if(isset($_POST['facebook'])){
$facebook = $_POST['fb_link'];
$data = array(
    'facebook' => $facebook
);
$condition = 'id = 1';
$tableName = 'system';
editData($db, $tableName, $data, $condition);
}
if(isset($_POST['twitter'])){
    $twitter = $_POST['t_link'];
    $data = array(
        'twitter' => $twitter
    );
    $condition = 'id = 1';
    $tableName = 'system';
    editData($db, $tableName, $data, $condition);
    }

    if(isset($_POST['insta'])){
        $insta = $_POST['insta_link'];
        $data = array(
            'insta' => $insta
        );
        $condition = 'id = 1';
        $tableName = 'system';
        editData($db, $tableName, $data, $condition);
        }
  
if(isset($_POST['about_form'])){
    $why = validateInput($db,$_POST['why']);
    $about_us = $_POST['about_us'];

    $data = array(
        'why' => $why,
        'about_us' => $about_us
       
    );
    $condition = 'id = 1';
    $tableName = 'system';
    editData($db, $tableName, $data, $condition);
        
}


if(isset($_POST['roi_s'])){

$total_p = validateInput($db,$_POST['total_profit']);
$average_h = validateInput($db,$_POST['average_hits']);
$average_r = validateInput($db,$_POST['roi']);
$total_t = validateInput($db,$_POST['tip']);

$data = array(
    'total_profit' => $total_p,
    'average_hits' => $average_h,
    'average_roi' => $average_r,
    'total_tipsters' => $total_t
);
$condition = 'id = 1';
$tableName = 'system';
editData($db, $tableName, $data, $condition);

}




      if(isset($_POST['save'])){ 
$site_title = validateInput($db,$_POST['site_title']);
$meta_description = validateInput($db,$_POST['meta_description']);
$meta_keywords = validateInput($db,$_POST['meta_keywords']);
//$email = validateInput($db, $_POST['email']);
//$phone = validateInput($db, $_POST['phone']);
//$favicon = $_POST[$_FILES['favicon']['name']];
//$site_logo = $_FILES['site_logo']['name'];
$google_analytics_code = !empty(validateInput($db,$_POST['google_analytics_code'])) ? $_POST['google_analytics_code'] : '';

if(empty($google_analytics_code)){
$data = array(
    'site_title' => $site_title,
    'meta_description' => $meta_description,
    'meta_keywords' => $meta_keywords
    
); }
else{
    $data = array(
        'site_title' => $site_title,
        'meta_description' => $meta_description,
        'meta_keywords' => $meta_keywords,
        'google_analytics_code' => $google_analytics_code
    );

}
$condition = 'id = 1';
$tableName = 'system';
editData($db, $tableName, $data, $condition);

}

?>
 <style>
       
       
      
        textarea {
            width: 100%;
            height: 200px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 10px;
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            background-color: #4caf50;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .btn-group {
            margin-top: 10px;
        }

        .btn-group button {
            margin-right: 5px;
        }

        .select-group {
            margin-top: 10px;
        }

        .select-group label {
            margin-right: 5px;
        }

        .select-group select {
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>

<div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Settings</h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="system-tab" data-bs-toggle="tab" href="#system" role="tab" aria-controls="system" aria-selected="false">About us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Roi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="appearance-tab" data-bs-toggle="tab" href="#appearance" role="tab" aria-controls="appearance" aria-selected="false">Contact information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="attributions-tab" data-bs-toggle="tab" href="#attributions" role="tab" aria-controls="attributions" aria-selected="false">Others</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                                    <div class="col-md-6">

                                    <form action="settings.php" method="POST">

                                        <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                                        <?php  
                                        if(!empty($successMessage)){ 
                                            $successMessage = implode("<br>", $successMessages);
                                            ?>

                                        <div class="alert alert-success">
                                        <h5 class="alert-title"><i class="fas fa-check"></i> Success</h5>
                                        <?php echo $successMessage;  ?>
                                        </div>
                                                            <?php                 }  ?>
                                                            <div class="mb-3">
                                            <label for="site-title" class="form-label">Site Title</label>
                                            <input type="text" name="site_title" class="form-control" value="<?php if(isset($site_title)){echo $site_title;} ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="site-description" class="form-label">Site Description</label>
                                            <textarea class="form-control" name="meta_description" required><?php if(isset($meta_description)){echo $meta_description;} ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="site-keywords" class="form-label">meta keywords(separate with commas)</label>
                                            <textarea class="form-control" name="meta_keywords" required><?php if(isset($meta_keywords)){echo $meta_keywords;} ?></textarea>
                                        </div>
                                       

                                       <!-- <div class="mb-3">
                                            <label class="form-label">Site Logo</label>
                                              <input class="form-control" required name="site_logo" type="file" id="site_logo">
                                            <small class="text-muted">The image must have a maximum size of 2MB</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Favicon</label>
                                              <input class="form-control" required name="favicon" type="file" id="favicon">
                                            <small class="text-muted">The image must have a maximum size of 2MB</small>
                                        </div> -->
                                        <div class="mb-3">
                                            <label class="form-label">Google Analytics Code</label>
                                            <textarea class="form-control" name="google_analytics_code" rows="4"></textarea>
                                        </div>
                                        <div class="mb-3 text-end">
                                            <button class="btn btn-success" name='save' type="submit"><i class="fas fa-check"></i> Save</button>
                                        </div>
                                    </form>
 </div>
                                </div>
                                
                                <div class="tab-pane fade" id="system" role="tabpanel" aria-labelledby="system-tab">
                                    <div class="col-md-6">
                                    <form action="settings.php" method="POST">
                                        <p class="text-muted">Why choose us, about us etc.</p>
                                        <div class="mb-3">
                                            <label for="language" class="form-label">Why choose us </label>
                                            <p>Character Count: <span id="charCount1">0</span>/200 characters</p>
                                            <textarea id="textarea1" name='why' class='form-control' rows="4" cols="50" required></textarea>
                                            
                                            
                                        </div>
                                        <div class="md-3">
                                            <label for="" class="form-label">About us</label>
                                            <p>Character Count: <span id="charCount3">0</span>/1000 characters</p>
                                            <textarea id="inputTextarea" name="about_us" required></textarea>
                                        
                                        <button type="button" onclick="toUpperCase()">Convert to Uppercase</button>
                                        <button type="button" onclick="toLowerCase()">Convert to Lowercase</button>
                                        <button type="button" onclick="capitalize()">Capitalize Text</button>
                                        <button type="button" onclick="clearText()">Clear Text</button>

                                        <div class="btn-group">
                                            <button type="button" onclick="toggleBold()">Bold</button>
                                            <button type="button" onclick="toggleUnderline()">Underline</button>
                                        </div>


                                            <div class="select-group">
                                                <label for="fontSizeSelect">Font Size:</label>
                                                <select id="fontSizeSelect" onchange="changeFontSize()">
                                                    <option value="12">12px</option>
                                                    <option value="14">14px</option>
                                                    <option value="16" selected>16px</option>
                                                    <option value="18">18px</option>
                                                    <option value="20">20px</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 text-end">
                                            <button class="btn btn-success" name='about_form' type="submit"><i class="fas fa-check"></i> Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                                <form method="POST" action="settings.php">    
                                <div class="col-md-6">
                                       
                                        <p class="text-muted">Settings for total profits, average hits, Average roi, Total tipsters</p>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Total profit in %</label>
                                            <input type="number" name='total_profit' class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Average hits</label>
                                            <input type="number" name="average_hits" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Average ROI</label>
                                            <input type="number" name="roi" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Total tipsters</label>
                                            <input type="number" name="tip" class="form-control">
                                        </div>
                                        
                                        <div class="mb-3 text-end">
                                            <button class="btn btn-success" name ='roi_s' type="submit"><i class="fas fa-check"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <div class="tab-pane fade" id="appearance" role="tabpanel" aria-labelledby="appearance-tab">
                                
                                 <p class="text-muted">Add Contact information</p>
                                <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Facebook account</div>
                                <div class="card-body">
                                    <h5 class="card-title">Add facebook account/page link</h5>
                                    <form accept-charset="utf-8" action="settings.php" method='POST'>
                                        <div class="row g-2">
                                            <div class="col">
                                                <label for="name" class="form-label sr-only">Link</label>
                                                <input name="fb_link" type="text" value="<?php if(isset($facebook)){ echo $facebook;
                                            } ?>" class="form-control">
                                            </div>
                                           
                                            <div class="col">
                                                <button type="submit" name='facebook' class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                          
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Twitter account</div>
                                <div class="card-body">
                                    <h5 class="card-title">Insert twitter account link</h5>
                                    <form accept-charset="utf-8" action="settings.php" method="POST">
                                        <div class="row g-2">
                                            <div class="col">
                                                <label for="name" class="form-label sr-only">Link</label>
                                                <input name="t_link" type="text" value="<?php if(isset($twitter)){echo $twitter; } ?>" class="form-control">
                                            </div>
                                           
                                            <div class="col">
                                                <button type="submit" name='twitter' class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                          
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Instagram</div>
                                <div class="card-body">
                                    <h5 class="card-title">Instagram link</h5>
                                    <form accept-charset="utf-8" action="settings.php" method="POST">
                                        <div class="row g-2">
                                            <div class="col">
                                                <label for="name" class="form-label sr-only">Link</label>
                                                <input name="insta_link" type="text" value="<?php if(isset($insta)){ echo $insta; } ?>" class="form-control">
                                            </div>
                                           
                                            <div class="col">
                                                <button type="submit" name='insta' class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Phone number</div>
                                <div class="card-body">
                                    <h5 class="card-title">Insert contact number</h5>
                                    <form accept-charset="utf-8" action="settings.php" method="POST">
                                        <div class="row g-2">
                                            <div class="col">
                                                <label for="name" class="form-label sr-only">Link</label>
                                                <input name="no" type="tel" value="<?php if(isset($no)){echo $no; } ?>" class="form-control">
                                            </div>
                                           
                                            <div class="col">
                                                <button type="submit" name='number' class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Email account</div>
                                <div class="card-body">
                                    <h5 class="card-title">Insert Email account</h5>
                                    <form accept-charset="utf-8" action="settings.php" method="POST">
                                        <div class="row g-2">
                                            <div class="col">
                                                <label for="name" class="form-label sr-only">Link</label>
                                                <input name="email" type="email" value="<?php if(isset($email)){echo $email; } ?>" class="form-control">
                                            </div>
                                           
                                            <div class="col">
                                                <button type="submit" name='email_a' class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Physical address</div>
                                <div class="card-body">
                                    <h5 class="card-title">Enter physical address</h5>
                                    <form accept-charset="utf-8" action="settings.php" method="POST">
                                        <div class="row g-2">
                                            <div class="col">
                                                
                                                <input name="address" type="text" value="<?php if(isset($address)){echo $address; } ?>" class="form-control">
                                            </div>
                                           
                                            <div class="col">
                                                <button type="submit" name='address_a' class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                                </div>
                                <div class="tab-pane fade" id="attributions" role="tabpanel" aria-labelledby="attributions-tab">
                                    
                                Confused 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <script>
        function toUpperCase(event) {
            event.preventDefault();
            var textarea = document.getElementById("inputTextarea");
            textarea.value = textarea.value.toUpperCase();
        }

        function toLowerCase(event) {
            event.preventDefault();
            var textarea = document.getElementById("inputTextarea");
            textarea.value = textarea.value.toLowerCase();
        }

        function capitalize() {
            var textarea = document.getElementById("inputTextarea");
            var words = textarea.value.split(" ");
            for (var i = 0; i < words.length; i++) {
                words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
            }
            textarea.value = words.join(" ");
        }

        function clearText() {
            var textarea = document.getElementById("inputTextarea");
            textarea.value = "";
        }

        function toggleBold() {
            var textarea = document.getElementById("inputTextarea");
            textarea.style.fontWeight = textarea.style.fontWeight === "bold" ? "normal" : "bold";
        }

        function toggleUnderline() {
            var textarea = document.getElementById("inputTextarea");
            textarea.style.textDecoration = textarea.style.textDecoration === "underline" ? "none" : "underline";
        }

        function changeFontSize() {
            var textarea = document.getElementById("inputTextarea");
            var fontSizeSelect = document.getElementById("fontSizeSelect");
            textarea.style.fontSize = fontSizeSelect.value + "px";
        }
    </script>


   <?php include('includes/footer.php'); ?>

