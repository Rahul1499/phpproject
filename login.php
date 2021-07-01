<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <?php
    include("database.php");
      if($_SERVER['REQUEST_METHOD']=="POST"){
          $password = $_POST['pass'];
          $Email = $_POST['email'];
          $usertype = $_POST['usertype'];

              $password=hash('sha256',$password);
              $sql="SELECT * From `rahultask` WHERE `email`='$Email' and `password`='$password' and `usertype`='$usertype'";
                //echo "$sql" ;die();
              $result=mysqli_query($conn,$sql);
              $row = mysqli_fetch_array($result);
             // print_r($row);die();
             
                $count = mysqli_num_rows($result);  
                if($count==1){
                    if($usertype == 'newuser'){
                        session_start();
                        $_SESSION['loggedin']=true;
                        $_SESSION['usertype']=$usertype;
                        $_SESSION['email'] = $Email;
                        $_SESSION['username'] = $row['name'];
                        $_SESSION['photo']=$row['pic'];
                        $_SESSION['id'] = $row['id'];
                      
                        header("location:onlyuser.php");
                      }
                        else if($usertype == 'admin'){
                          session_start();
                          $_SESSION['loggedin']=true;
                          $_SESSION['usertype']=$usertype;
                          $_SESSION['email']=$Email;
                          $_SESSION['username'] = $row['name'];
                          $_SESSION['id'] = $row['id'];
                          $_SESSION['photo']=$row['pic'];
                          header("location:admin.php");
                             }         
                              else{
                                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <strong>Error!</strong> invalid credentiales.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                                   }
  
                                } 
                                  else{
                                      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Data Not Found.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                                }
                            }



?>
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
          <a class="nav-link active" aria-current="page" href="/rahultask/form.php">Singup</a>
        </li>
        
      </ul>
      <form class="d-flex" method="post" action="">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

  <div class="container my-3">
  <h2>Mobilestyx login Form</h2>
  <form action="/rahultask/login.php" method="POST">
   
    <div class="form-group col-md-6">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
    </div>
    <div class="form-group col-md-6">
      <label for="Password">Password:</label>
      <input type="Password" class="form-control" id="pass" placeholder="Enter your Password" name="pass">
    </div>
    <div class="conationer my-2 col-md-6">
    <label for="type">select type:</label>
  <select class="form-select" type="usertype" name="usertype" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="newuser">User  </option>
  <option value="admin">Admin</option>
  
</select>
  </div>
   
    
  <div class="container my-3">
  <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>
  </div>

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