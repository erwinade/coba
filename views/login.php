<?php
    session_start();
    include '../config/db.php';
    $_SESSION["erroruser"] = FALSE;
    $_SESSION["errorpass"] = FALSE;
    $_SESSION["username"] = "";

    if(isset( $_SESSION["userlogin"])){
        header('Location: /views/index.php');
    }

    if(isset($_POST['submit'])){
        $db_conn = new db();

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $user = $db_conn->query('SELECT * FROM user where username = "'.$username.'"');

        if($user->numRows() < 1)
        {
            $_SESSION["erroruser"] = TRUE;
        }else{
            $userPass = $db_conn->query('SELECT * FROM user where username = "'.$username.'" and passwrd = "'.$password.'"');

            if($userPass->numRows() < 1)
            {
                $_SESSION['username'] = $username;
                $_SESSION["errorpass"] = TRUE;
            }else{
                $_SESSION["userlogin"] = $username;
                header('Location: /views/index.php');
            }

        }
        


        
    }

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../img/soendev.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" value="<?php echo $_SESSION['username']; ?>" required>
      <?php if($_SESSION["erroruser"]){ ?> <label for="" class="text-danger">username tidak di temukan   </label><?php }  ?>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <?php if($_SESSION["errorpass"]){ ?> <label for="" class="text-danger">password salah   </label> <br><br> <?php }  ?>
      <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
    </form>
  </div>
</div>