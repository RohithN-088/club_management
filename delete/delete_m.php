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
    $member_id = htmlentities($_REQUEST['member_id']);

    if (isset($_POST['delete']))
    {
        $stmt = $pdo->prepare("
            DELETE FROM member
            WHERE MID = :member_id
        ");

        $stmt->execute([
            ':member_id' => $member_id,
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

<div id="id04" class="modal1">
  <span onclick="document.getElementById('id02').style.display='block'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" method="POST">
    <div class="container">
      <h>Are you sure you want to delete this<h>
      <button type="submit" name="delete" value="Delete">Delete</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="submit" name="cancel" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

</body>
</html>
