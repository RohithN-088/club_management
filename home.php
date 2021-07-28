
<?php // Do not put any HTML above this line

session_start();


$salt = 'XyZzy12*_';
$stored_hash= '1a52e17fa899cf40fb04cfc42e6352f1'; // Pw is php123
$_SESSION['login'] = false;

// Check to see if we have some POST data, if we do process it
if (  isset($_POST['pass']) )
{
    if ( strlen($_POST['pass']) < 1 )
    {
        $_SESSION['failure'] = " password is required";
        header("Location: home.php");
        return;
    }

    $pass = htmlentities($_POST['pass']);
    $check = hash('md5', $salt.$pass);

    if ($check != $stored_hash)
    {
        error_log("Login fail ".$pass." $check");
        $_SESSION['failure'] = "Incorrect password";
       header("Location: home.php");
        return;
    }
    else{
    $_SESSION['login'] = True;
    header("Location: member.php");
    return;
  }
}
?>



<html>
<head>
  <link rel="stylesheet" type="text/css" href="./stylesheets/style.css">
  <title>HOME</title>
</head>
<body>

<div class="bg-img">

  <div class="k">
    <div class="log">
    <img src="./images/logo.jpg" width="200px";heigth="200px";>
  </div>
  <h3>
   CLUB DATABASE MANAGEMENT SYSTEM
  </h3>
 </div>

  <!-- Button to open the modal login form -->
  <div class="i">
  <button onclick="document.getElementById('id01').style.display='block'">Login</button>
</div>

<div class="j">
<a href="participant.php"><button > Participant </button></a>
</div>


  <!-- The Modal -->
  <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'"
  class="close" title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <form class="modal-content animate" method="POST">
      <div class="imgcontainer">
        <img src="./images/img_avatar2.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pass" required>


       <div style="color:red">
        <?php if(isset($_SESSION['failure']))
              {
                echo $_SESSION['failure'];?>
        <script type='text/javascript'>document.getElementById('id01').style.display='block'</script><?php
        unset($_SESSION['failure']);
      }
        else {?>
          <script>document.getElementById('id01').style.display='none'</script><?php
        }
        ?></div>



        <button type="submit">Login</button>
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="location.href='home.php'" class="cancelbtn">Cancel</button>

      </div>
    </form>
  </div>


</div>


    <script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  }
  </script>
</body>
</html>
