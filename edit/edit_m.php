<?php

session_start();
/*if (  ! isset($_SESSION['Cname']) ) {
	die("ACCESS DENIED");
}*/
if ( isset($_POST['cancel']) ) {

        if ( $_SESSION['club']=='Sports')
        header('Location: ../sports.php');
        elseif($_SESSION['club']=='Art')
        header('Location: ../art.php');
        elseif($_SESSION['club']=='Music')
        header('Location: ../music.php');
        elseif($_SESSION['club']=='Dance')
        header('Location: ../dance.php');
        elseif($_SESSION['club']=='Literature')
        header('Location: ../literature.php');
        else
        header('Location: ../coding.php');
        return;
}
try
{
    $pdo = new PDO("mysql:host=localhost;dbname=project", "manasa", "2929");
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    die();
}

if (isset($_REQUEST['member_id']))
{

// Check to see if we have some POST data, if we do process it
	if (isset($_POST['Mname']) && isset($_POST['Mdept']) && isset($_POST['Musn']) && isset($_POST['Mphno']))
	{


	    $Mname = htmlentities($_POST['Mname']);
	    $Mdept = htmlentities($_POST['Mdept']);
	    $Musn = htmlentities($_POST['Musn']);
	    $Mphno = htmlentities($_POST['Mphno']);
    	$member_id = htmlentities($_REQUEST['member_id']);

	    $stmt = $pdo->prepare("
	    	UPDATE member
	    	SET NAME = :NAME, DEPARTMENT = :DEPARTMENT, USN = :USN,PHNO= :PHNO
		    WHERE MID = :MID
	    ");

	    $stmt->execute([
	        ':NAME' => $Mname,
	        ':DEPARTMENT' => $Mdept,
	        ':USN' => $Musn,
          ':PHNO' => $Mphno,
          ':MID'=> $member_id,
	    ]);

      if ( $_SESSION['club']=='Sports')
	    header('Location: ../sports.php');
      elseif($_SESSION['club']=='Art')
      header('Location: ../art.php');
      elseif($_SESSION['club']=='Music')
      header('Location: ../music.php');
      elseif($_SESSION['club']=='Dance')
      header('Location: ../dance.php');
      elseif($_SESSION['club']=='Literature')
      header('Location: ../literature.php');
      else
      header('Location: ../coding.php');


		return;
	}

}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Rohith N</title>
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
  </head>
	<body>


    <div id="id05" class="modal1">
      <span onclick="document.getElementById('id05').style.display='block'"
    class="close" title="Close Modal">&times;</span>

      <!-- Modal Content -->
      <form class="modal-content animate" method="POST">


        <div class="container">
          <label for="Mname"><b>Member Name</b></label>
          <input type="text" placeholder="Enter member name" name="Mname" >

          <label for="Mdept"><b>Department</b></label>
          <input type="text" placeholder="Enter Department" name="Mdept" >

          <label for="Musn"><b>USN</b></label>
          <input type="text" placeholder="Enter USN " name="Musn">

          <label for="Mphno"><b>Phone Number</b></label>
          <input type="text" placeholder="Enter Phone Number" name="Mphno">

          <button type="submit">Done</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
          <button type="submit" name="cancel" class="cancelbtn">Cancel</button>
        </div>
      </form>

    </div>
  </body>
  </html>
