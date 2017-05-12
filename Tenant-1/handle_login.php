<?php


$email= $_POST['email'];
$password = $_POST['password'];
//if($email=="grader@sjsu.edu" && $password=="password")
//{
   // $URI = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   // $segments = explode("/",$URI);
   // $num = 1;
   // $size = sizeof($segments)-$num;
   // $new_path= 'index.php';
   // $segments[$size]=$new_path;
    
  //  foreach ($segments as $piece) {
   //   $new_url = implode('/', $segments);
   //  }
     //header("Location:".$new_url);
     //die();
//}
//else
//{
  //  $URI = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  //  $segments = explode("/",$URI);
  //  $num = 1;
  //  $size = sizeof($segments)-$num;
  //  $new_path= 'index.html';
  //  $segments[$size]=$new_path;
    
   // foreach ($segments as $piece) {
   //   $old_url = implode('/', $segments);
  //   }
     //header("Location:".$old_url);
    // die();
//}

$user = 'root';
$pass = 'password123';
$db   = 'Multi_Tenant_SaaS';
$host = 'multi-tenant-saas.c10vz13ys4mz.us-west-2.rds.amazonaws.com';
$port = 3306;
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
 
  $query  = "SELECT id FROM GRADER_LOGIN WHERE email='$email' AND password='$password'";
  

  $result = mysqli_query($link, $query);
  $rowcount=mysqli_num_rows($result);
  if($rowcount==1)
  {
 
   header("Location: ./index.php");
   die();
  }
  else
  {
     header("Location: ./index.html");
     die();
  }

  
    

  $link->close();
}



?>
