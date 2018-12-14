<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" type="text/css" href="assets/font-awesome-4.7.0/css/font-awesome.css">
 
<!-- Font Awesome  -->
 <!-- <script src="https://use.fontawesome.com/44d5efae23.js"></script> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">LiteCMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(Current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Trending</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Recommended</a>
        </li>
      </ul>

      <?php 
      session_start();
      if(isset($_SESSION['id'])){?>
      <!-- <a href="action.php?action=logout"><button class="btn btn-outline-success my-2 my-sm-0"  ><?//php echo $_SESSION['username']." ";?>Logout</button></a> -->
      <span style="width:10px;"></span>
     <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chatapp"> -->
 <i  class="fa fa-envelope-o fa-2x clickableIcon"  data-toggle="modal" data-target="#chatapp" aria-hidden="true"></i>
</button>

<!-- Modal -->


   <span style="width:20px;"></span>
      <div class="btn-group">
        <button class="btn btn-outline-success my-2 my-sm-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         
       <?php echo $_SESSION['username'];?>
       </button>

        <span style="width:30px;"></span>
       <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="profile.php">Profile</a>
        <a class="dropdown-item" href="setting.php">Setting</a>
        <a class="dropdown-item" href="action.php?action=logout">Logout</a>
      </div>
    </div>
  </div>


<div class="modal fade" id="chatapp"  tabindex="-1" role="dialog" aria-labelledby="Chat" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Chat">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <?php }else{?>
  <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" id="login_signup" data-target="#myModal">Login/Signup</button>
  <?php }?>
</div>
</nav>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Login-signup">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
       <div class="alert alert-warning" role="alert" id="userWarnings">
       </div>
       <div class="alert alert-success" role="alert" id="userSuccess">
       </div>
       <form>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" placeholder="john.doe">
        </div>
        <div class="form-group d-none signup-form" >
          <label for="Email">Email</label>
          <input type="text" class="form-control" id="email" placeholder="john.doe@example.com">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password">
        </div>
        <div class="form-group d-none signup-form">
          <label for="cpassword">Confirm Password</label>
          <input type="password" class="form-control" id="cpassword">
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <input type="hidden" name="loginorsignup" id="loginorsignup" value="1">
      <button type="button" id="signup" class="btn btn-success btn-sm">SignUp</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" id="login" class="btn btn-primary">Login</button>
    </div>
  </div>
</div>
</div>
<script type="text/javascript" src="js/loginSignup.js"></script>
<br>
<br>
