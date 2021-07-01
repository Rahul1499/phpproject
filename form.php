<?php
include("database.php");
if(isset($_POST['submit'])){
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $phone_number = $_POST['number'];
    $password = $_POST['pass'];
    $Gender = $_POST['gender'];
    $usertype = $_POST['usertype'];
    
//Email validation...
    $existSql = "SELECT * From `rahultask` WHERE email = '$Email'";
    $result = mysqli_query($conn, $existSql);
    $num_rows = mysqli_num_rows($result);
    
    if($num_rows  > 0){
        echo '<div class="alert alert-Danger">
        <Danger>Sorry!</Danger> This allready Exixt.
        </div>';
    }else{
      //Password hashing ...
      $hash=hash('sha256',$password);
        $sql = "INSERT INTO `rahultask` ( `Name`, `Email`, `phone_number`, `Password`, `Gender`, `Usertype`) VALUES ( '$Name', '$Email', '$phone_number', '$hash', '$Gender', '$usertype')"; 
             $result=mysqli_query($conn,$sql);

        if($result){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Succes</strong>Your  Account has been Created Now You can Login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                    }
        else{
        echo"error".mysqli_error($conn);

            }
          }
} 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registration Form</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Mobilestyx Form</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/rahultask/login.php">log in</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
 
<div class="container my-3 ">
  <h2>Mobilestyx Form</h2>
  <form action="/rahultask/form.php" method='post'>
    <div class="form-group my-2  col-md-6 ">
      <label for="name">Name:</label>
      <input type="name" class="form-control"  id="name" placeholder=" Please Enter Your name" name="name" Required >
    </div>
    <div class="form-group  my-2  col-md-6">
      <label for="email">Email:</label>
      <input type="email" class="form-control"   id="email" placeholder="Please Enter Your Email" name="email" Required>
    </div>
    <div class="form-group  my-2  col-md-6">
      <label for="number">phone_number:</label>
      <input type="number" class="form-control" id="number" placeholder="Please Enter Your Number" name="number" Required>
    </div>
    <div class="form-group  my-2  col-md-6">
      <label for="pass">Password:</label>
      <input type="password" class="form-control" id="pass" placeholder="Please Enter Your password" name="pass" Required>
    </div>
    <div class="form-group  my-2  col-md-6">
      <label for="gender">Gender:</label>
      <div class="form-check  col-md-6">
    <input class="form-check-input" type="radio"  value="male" name="gender" id="inlineRadio1">
    <label class="form-check-label" for="inlineRadio1" Required>
        Male
    </label>
    </div>
<div class="form-check  col-md-6">
  <input class="form-check-input" type="radio" value="female" name="gender" id="inlineRadio2">
  <label class="form-check-label" for="inlineRadio2" Required>
    Female
  </label>
  </div>
  <div class="conationer my-2">
  <select class="form-select" type="usertype" name="usertype" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="newuser">New User  </option>
  <option value="admin">Admin</option>
  
</select>
  </div>
     </div>
    <div class="form-group form-check ">
       </div>
    <button type="submit" class="btn btn-primary" name="submit" >SignUp</button>
  </form>
</div>
     <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


  </body>
</html> 
