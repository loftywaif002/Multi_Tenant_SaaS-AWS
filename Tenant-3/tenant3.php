<!DOCTYPE html>
<html lang="en">
<?php
if(!session_id())
   {
    session_start();  
   }
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tenant-3</title>


    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    
    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




<style>

.form-group {
  margin-bottom: 0;
  padding: 10px 0;
}
.form-group:first-child {
  border-color: transparent;
}

.form-control {
  -webkit-box-shadow: none;
  box-shadow: none;
  border-width: 2px;
  min-height: 40px;
  height: auto;
}
.form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}

.form-vertical {
  counter-reset: fieldset;
}
.form-vertical fieldset {
  padding-top: 10px;
  margin: 50px 0;
}
.form-vertical fieldset > legend:before {
  content: counter(fieldset);
  counter-increment: fieldset;
  position: absolute;
  left: -25px;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border-radius: 15px;
  text-align: center;
  /*background: #428bca;*/
  color: white;
  font-size: 75%;
  font-weight: bold;
}

label.checkbox {
  margin-bottom: 15px;
  position: relative;
}
label.checkbox .icheckbox_square-blue {
  position: absolute;
  top: 0;
  left: 0;
}
label.checkbox input {
  position: absolute;
  left: 0;
  top: 0;
}
label.checkbox span {
  padding-left: 35px;
  display: block;
}

.radio label {
  padding-left: 0;
}
.radio span {
  vertical-align: middle;
  margin-left: 5px;
}

.btn {
  height: 40px;
  padding: 10px 16px;
  border-radius: 3px;
  min-width: 80px;
}

.btn-group.radio-group .btn {
  height: 50px;
  line-height: 22px;
  padding: 12px 20px;
}
.btn-group.radio-group .btn span {
  line-height: 22px;
  vertical-align: middle;
  margin-left: 5px;
}

/* bootstrap select styles */
.bootstrap-select .btn {
  min-height: 40px;
  border-width: 2px;
  -webkit-box-shadow: none;
  box-shadow: none;
  outline: 0;
}
.bootstrap-select .btn:hover {
  background: white;
}

.bootstrap-select .btn:focus,
.bootstrap-select.btn-group.open .dropdown-toggle {
  border-color: #428bca;
  background: white;
  outline: 0;
}

.bootstrap-select .btn.bootstrap-select.btn-group.open .dropdown-toggle {
  border-color: #428bca;
  color: white;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus {
  background: #428bca;
  color: white;
}

label {
  cursor: pointer;
}

:-ms-input-placeholder {
  color: #ccc;
}

::-moz-placeholder {
  color: #ccc;
}

::-webkit-input-placeholder {
  color: #ccc;
}

</style>


</head>



<?php
function submit()
{
    $scale= $_POST['scale'];
    $points = $_POST['points'];
    $status = $_POST['status'];
    $comments = $_POST['comments'];

$user = 'root';
$pass = 'root';
$db   = 'multi_tenant_saas';
$host = 'localhost';
$port = 8889;
$link = mysqli_init();

$connection = $link->real_connect(
  $host,
  $user,
  $pass,
  $db
);

 if (!$connection) {
  die('Database connection failed.');
  $link->close();
}
else
{
  //echo'<p>Connection was susscessfull</p>';
 
  $query  = "INSERT INTO TENANT_DATA (TENANT_ID, TENANT_TABLE, COLUMN_1, COLUMN_2, COLUMN_3, COLUMN_4)";
  $query .= "VALUES ('1', 'SCALED_GRADE','$scale','$points','$status','$comments')";

  $result = mysqli_query($link, $query);

    if (!$result) {
  die('Error: ' . mysqli_error($link));
    }
    else
    {
      //echo'<p>Data was fetched Successfullly</p>';
      
    }
    //For Testing if fetching the data from database
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    print_r($row);
    }

  $link->close();
}

}


?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Mulitenant Saas App</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li style="display: none;" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong></strong>
                                    <span class="pull-right text-muted">
                                        <em></em>
                                    </span>
                                </div>
                                <div></div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong></strong>
                                    <span class="pull-right text-muted">
                                        <em></em>
                                    </span>
                                </div>
                                <div></div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong></strong>
                                    <span class="pull-right text-muted">
                                        <em></em>
                                    </span>
                                </div>
                                <div></div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li style="display: none;" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li style="display: none;" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw">   
                            </i> Tenant1</a>
                        </li>
                        <li>
                            <a href="tenant2.php"><i class="fa fa-dashboard fa-fw"></i> Tenant2</a>
                        </li>
                        <li>
                            <a href="tenant3.php"><i class="fa fa-dashboard fa-fw"></i> Tenant3</a>
                        </li>
                        <li>
                            <a href="tenant4.php"><i class="fa fa-dashboard fa-fw"></i> Tenant4</a>
                        </li>
                         
<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!ADD MORE LINKS HERE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->                                                  
                         </ul>
                    </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                       <!-- Carousel Starts-->
                        
                       <!-- Carousel Ends-->
 <!--Form Starts -->
  <div class="row">

   

  <!-- MODAL STARTS-->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="myModalLabel">Generated Diagram For Tenant-3</h4>
      </div>
      <div class="modal-body">
           <?php
    $dir  = "./images"; // your folder name ex: image
    $imgs = glob($dir ."/output.png"); // get your image files with .jpg 
   
    foreach ($imgs AS $i) {
      echo "<img width='100%' src='$i'>"; // 
    }
     ?>    
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>    
      </div>
    </div>
  </div>
</div>
<!-- Modal ENDS-->

    <div class="col-xs-12 col-sm-10 col-md-7 col-lg-6">
 
       <legend>Upload Zip File For Testing</legend>
          <?php if($message) echo "<p>$message</p>"; ?>
  <form enctype="multipart/form-data" class="form-vertical" role="form" method="post" 
         action="">
          <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name="zip_file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Acceptable file Format is .zip</small>

  </div>

   <button type="submit" name="submit" class="btn btn-primary">Upload</button>
    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#basicModal">Show Image</a>
      <!-- PROGRESS BAR-->
   <!-- Progress bar holder -->
<div id="progress" style="width:500px;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>
<!-- PROGRESS BAR-->
  </form>
      <form class="form-vertical" role="form" method="post" action="tenant3Graded.php">
        
        <fieldset>
         <legend>Submit Grade For Tenant-2 (Vinayak Nigam)</legend>
         <div class="form-group">
            <label for="input-text" class="control-label">Scale</label>
            <input name="scale" type="text" class="form-control" id="input-text" placeholder="Scale">
          </div>
           <div class="form-group">
            <label for="input-text" class="control-label">Points</label>
            <input name="points" type="text" class="form-control" id="input-text" placeholder="Points">
          </div>
          <div class="form-group">
            <label for="job" class="control-label">Complete/Not_Complete</label>     
            <div class="radio">
              <label>
                <input type="radio" name="status" value="Complete" />
                <span>Complete</span>
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="status" value="Not Complete" />
                <span>Not Complete</span>
              </label>
            </div>
          </div>
      <div class="form-group">
    <label for="exampleTextarea">Comments</label>
    <textarea name="comments" class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>
 <button type="submit" name="submit_grade" class="btn btn-primary">Submit Grade</button>
      </form>
      <?php
           $submit_grade = $_POST['submit_grade'];
           //if($_SERVER['REQUEST_METHOD']=='POST')
          if(isset($submit_grade))
           {
               //submit();
           } 
        ?>
    </div>
  </div>
 <!-- Form Ends-->
               
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">

                                          
<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!ADD MORE LINKS HERE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->                   

                        <!-- /.panel-body -->
                    </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

   
    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>
<?php 

if($_FILES["zip_file"]["name"]) {
    $filename = $_FILES["zip_file"]["name"];
    $source = $_FILES["zip_file"]["tmp_name"];
    $type = $_FILES["zip_file"]["type"];

    $name = explode(".", $filename);
    $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
    foreach($accepted_types as $mime_type) {
        if($mime_type == $type) {
            $okay = true;
            break;
        } 
    }

    $continue = strtolower($name[1]) == 'zip' ? true : false;
    if(!$continue) {
        $message = "The file you are trying to upload is not a .zip file. Please try again.";
    }

  /* PHP current path */
  $path = dirname(__FILE__).'/';  // absolute path to the directory where zipper.php is in
  $filenoext = basename ($filename, '.zip');  // absolute path to the directory where zipper.php is in (lowercase)
  $filenoext = basename ($filenoext, '.ZIP');  // absolute path to the directory where zipper.php is in (when uppercase)
  
  $targetdir = $path . "uml-parser-test-vinayak"; // target directory
  $targetzip = $path . $filename; // target zip file

  /* create directory if not exists', otherwise overwrite */
  /* target directory is same as filename without extension */

  if (is_dir($targetdir))  rmdir_recursive ( $targetdir); 
  


  mkdir($targetdir, 0777);


  /* here it is really happening */
if(move_uploaded_file($source, $targetzip)) {
    $zip = new ZipArchive();
    $x = $zip->open($targetzip);  // open the zip file to extract
  if ($x === true) {
    $zip->extractTo($targetdir); // place in the directory with same name  
    $zip->close();
    unlink($targetzip);
  }
//Progress bar starts
$script = 'java -jar vinayakparser.jar ./uml-parser-test-vinayak ./images';
shell_exec($script);
      // Total processes
$total = 10;
// Loop through process
for($i=1; $i<=$total; $i++){
    // Calculate the percentation
    $percent = intval($i/$total * 100)."%";
    
    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="Generating Image";
    </script>';
    

// This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64);
    

// Send output to browser immediately
    flush();
    

// Sleep one second so we can see the delay
    sleep(1);
}
//Hide the progress Bar
echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div ;display:none;\">&nbsp;</div>";
    ;
    </script>';


//Progress bar ends

        
        
        //Refresh the page
        echo '<script language="javascript">window.location.reload();</script>';
        $message = "Test file has been Succefully Uploaded";

    } else {    
        $message = "There was a problem with the upload. Please try again.";
    }
}


?>

</html>
