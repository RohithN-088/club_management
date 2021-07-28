<?php
session_start();
if(!(isset($_SESSION['login']) && $_SESSION['login']==True))
  die("ACCESS DENIED");
$info=[];
try
{
    $pdo = new PDO("mysql:host=localhost;dbname=project", "manasa", "2929");
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	    $all_info = $pdo->query("SELECT club.CNAME,pass.NAME,pass.PASSWORD from club,pass where club.USERNAME=pass.NAME");

		while ( $row = $all_info->fetch(PDO::FETCH_OBJ) )
		{
		    $info[] = $row;
		}
}

catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    die();
}
unset($_SESSION['failure']);
  if ( isset($_POST['Name']) && isset($_POST['Pass']) )
  {
    if ( strlen($_POST['Name']) < 1 || strlen($_POST['Pass']) < 1 )
    {
        $_SESSION['failure'] = "User name and password are required";
        header("Location: member.php");
        return;
    }
    $pass = htmlentities($_POST['Pass']);
    $name = htmlentities($_POST['Name']);
    //header("Location : pass.php");
    //echo "$pass $name";
    foreach($info as $row)
    {
      if($row->NAME == $name && $row->PASSWORD == $pass)
      {
        header("Location: $row->CNAME.php");
        $_SESSION['Cname']=$row->CNAME;
      }
      else {
        $_SESSION['failure']="Incorrect username or password";
      }
    }
  }



?>




<html>
<head>
  <link rel="stylesheet" type="text/css" href="./stylesheets/style.css">
  <title>Member</title>
</head>
<body>
  <div class="bg1-img">

    <div id="id02" class="modal">
      <span onclick="document.getElementById('id02').style.display='none'"
    class="close" title="Close Modal">&times;</span>

      <!-- Modal Content -->
      <form class="modal-content animate" method="POST">


        <div class="container">
          <label for="name"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="Name" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="Pass" required>


          <div style="color:red">
           <?php if(isset($_SESSION['failure']))
                 {
                   echo $_SESSION['failure'];?>
           <script type='text/javascript'>document.getElementById('id02').style.display='block'</script><?php
           unset($_SESSION['failure']);
         }
           else {?>
             <script>document.getElementById('id02').style.display='none'</script><?php
           }
           ?></div>



          <button type="submit">Login</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onClick="location.href='member.php'" class="cancelbtn">Cancel</button>

        </div>
      </form>
    </div>

  <button class="i1" onclick="document.getElementById('id02').style.display='block'">Sports</button>
  <button  class="i2"onclick="document.getElementById('id02').style.display='block'">Art</button>
<button class="i3"onclick="document.getElementById('id02').style.display='block'">Music</button>
<button class="i4"onclick="document.getElementById('id02').style.display='block'">Dance</button>
<button  class="i5"onclick="document.getElementById('id02').style.display='block'">Literature</button>
<button class="i6"onclick="document.getElementById('id02').style.display='block'">Coding</button>
</div>
</body>
</html>
