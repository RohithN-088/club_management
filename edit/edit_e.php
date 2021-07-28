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

if (isset($_REQUEST['event_id']))
{

// Check to see if we have some POST data, if we do process it
	if (isset($_POST['EName']) && isset($_POST['EPcost']) && isset($_POST['Emode']) && isset($_POST['Edate']) && isset($_POST['Eprize']))
	{


	    $Ename = htmlentities($_POST['EName']);
	    $EPcost = htmlentities($_POST['EPcost']);
	    $Emode = htmlentities($_POST['Emode']);
	    $Edate = htmlentities($_POST['Edate']);
      $Eprize = htmlentities($_POST['Eprize']);

    	$event_id = htmlentities($_REQUEST['event_id']);

	    $stmt = $pdo->prepare("
	    	UPDATE events
	    	SET EVENT_NAME = :EVENT_NAME, PARTICIPATION_COST = :PARTICIPATION_COST, EVENT_MODE = :EVENT_MODE,EVENT_DATE= :EVENT_DATE,
		    EVENT_PRIZES= :EVENT_PRIZES WHERE EID = :EID
	    ");

	    $stmt->execute([
	        ':EVENT_NAME' => $Ename,
	        ':PARTICIPATION_COST' => $EPcost,
	        ':EVENT_DATE' => $Edate,
          ':EVENT_MODE' =>$Emode,
          ':EVENT_PRIZES'=>$Eprize,
          ':EID'=>$event_id,
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
          <label for="Ename"><b>Event Name</b></label>
          <input type="text" placeholder="Enter event name" name="EName">

          <label for="EPcost"><b>Participation_Cost</b></label>
          <input type="text" placeholder="Enter Participation cost" name="EPcost" >

          <label for="Emode"><b>Event Mode</b></label>
          <input type="text" placeholder="Enter Event Mode" name="Emode">

          <label for="Edate"><b>Event Date</b></label>
          <input type="text" placeholder="Enter Event Date" name="Edate" >

          <label for="Eprize"><b>Event prize</b></label>
          <input type="text" placeholder="Enter Event prize" name="Eprize" >

          <button type="submit">Done</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
          <button type="submit" name="cancel" class="cancelbtn">Cancel</button>
        </div>

      </form>
    </div>
  </body>
  </html>
