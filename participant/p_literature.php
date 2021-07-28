<?php

session_start();

/*if (  ! (isset($_SESSION['Cname']) && $_SESSION['Cname']=='Sports')) {
	die("ACCESS DENIED");
}*/
if(isset($_POST['logout']))
{
	session_start();
	session_destroy();
	header("Location: home.php");
}
$m_literature1 = [];
$m_literature2= [];
try
{
    $pdo = new PDO("mysql:host=localhost;dbname=project", "manasa", "2929");
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $all_literature1 = $pdo->query("SELECT * FROM events,location where events.CID=6 and events.LID=location.LID");
				$all_literature2= $pdo->query("SELECT NAME,DEPARTMENT,PHNO  FROM member WHERE CID=6");
    while ( $row = $all_literature1->fetch(PDO::FETCH_OBJ) )
		{
		    $m_literature1[] = $row;
		}

		while ( $row = $all_literature2->fetch(PDO::FETCH_OBJ) )
		{
				$m_literature2[] = $row;
		}
}

catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>






<html>
<head>
  <link rel="stylesheet" type="text/css" href="../stylesheets/stylep.css">
	<title>Literature</title>
</head>
<body>
<div class="pl_img">
</div>

<div class="header">
<h2>LITERATURE CLUB<h2>
</div>

<div class="list">
  <h2>Events List</h2>
</div>

<div class ="tab">
<p>
	<table>
		<thead>
			<tr>
				<th>Event Name</th>
				<th>Participation Cost</th>
				<th>Event Mode</th>
				<th>Event Date</th>
				<th>Event Prize</th>
				<th>Department</th>
				<th>Floor</th>
				<th>Room</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($m_literature1 as $m_lit1) :?>
										<tr>

					<td><?php echo $m_lit1->EVENT_NAME; ?></td>
					<td><?php echo $m_lit1->PARTICIPATION_COST; ?></td>
					<td><?php echo $m_lit1->EVENT_MODE; ?></td>
					<td><?php echo $m_lit1->EVENT_DATE; ?></td>
					<td><?php echo $m_lit1->EVENT_PRIZES; ?></td>
					<td><?php echo $m_lit1->DEPARTMENT; ?></td>
					<td><?php echo $m_lit1->FLOOR; ?></td>
					<td><?php echo $m_lit1->ROOM; ?></td>
					</td>
										</tr>
								<?php endforeach; ?>
		</tbody>
	</table>
</p>
</div>


<div class="list2">
  <h2>Members List</h2>
</div>

<div class ="tab2">
<p>
	<table>
		<thead>
			<tr>
				<th>Member Name</th>
				<th>Department</th>
				<th>Phone</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($m_literature2 as $m_lit2) :?>
										<tr>

					<td><?php echo $m_lit2->NAME; ?></td>
					<td><?php echo $m_lit2->DEPARTMENT; ?></td>
					<td><?php echo $m_lit2->PHNO; ?></td>
					</td>
										</tr>
								<?php endforeach; ?>
		</tbody>
	</table>
</p>
</div>

<button class="i6"onclick="document.getElementById('id02').style.display='block'">Join</button>
<div class="bg1-img">

	<div id="id02" class="modal">
		<span onclick="document.getElementById('id02').style.display='none'"
	class="close" title="Close Modal">&times;</span>

		<!-- Modal Content -->
		<form class="modal-content animate">
			<div class ='b'>
				<img src="../images/l_b.jpeg"
			</div>
			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Back</button>

			</div>
		</form>
	</div>


</body>
</html>
