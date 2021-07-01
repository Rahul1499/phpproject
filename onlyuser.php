
<!doctype html>
<html lang="en">
<?php
  include("database.php");
       session_start();
       $Email = $_SESSION['email'];
       $Name = $_SESSION['username'];
       $pic=$_SESSION['photo'];
       
     //validation for url
    if(!isset ($_SESSION['loggedin']) || $_SESSION['usertype']!="newuser"  ){
     
      header("location:login.php");
      }
    
      else{
        
        echo  '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong> </strong> Hello  to your Login Page.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome</title>
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
          <a class="nav-link active" aria-current="page" href="/rahultask/form.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/rahultask/login.php">logout</a>
        </li>
      </ul>
      <form class="d-grid">
      <a class="nav-link active font-weight-bold text-info display-7" aria-current="page" href="">Hello <img src=  "<?php  echo $pic ?>" class="rounded-circle"  width="50" height="40"/>  <?php echo $Name?></a>
        
      </form>
    </div>
  </div>
</nav>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <table class="table my-4">
  <thead>
  <tr>
        <th>id</th>   
        <th>name</th>
        <th>email</th>
        <th>phone_number</th>
        <th>Profile</th>
        <th>gender</th>
        <th>type</th>
        <th>Action</th>
       
      </tr>
  </thead>
  <tbody>
  <?php

        $sql = "SELECT * From `rahultask` where `email`='$Email'";
        $result = mysqli_query($conn,$sql); 

             while($num = mysqli_fetch_array($result)){
              
              echo "<tr>
                    <td>".$num['id']."</td>
                    <td>".$num['name']."</td>
                    <td>".$num['email']."</td>
                    <td>".$num['phone_number']."</td>
                    <td><img src=".$num['pic']." width=30 height=50></td>
                    <td>".$num['gender']."</td>
                    <td>".$num['usertype']."</td>
                    <td><a class='btn btn-outline-primary mx-3' href='/rahultask/update.php?email=".$num['email']."'>Edit</a></td>
                    </tr>";

                  }
       
    ?>
  </tbody>
 
</table>
  </body>
</html>


   
      