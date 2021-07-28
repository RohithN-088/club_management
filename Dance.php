<?php

session_start();
//if (  ! (isset($_SESSION['Cname']) && $_SESSION['Cname']=='Dance'))
	//die("ACCESS DENIED");

if(isset($_POST['logout']))
{
	session_start();
	session_destroy();
	header("Location: home.php");
}
$logged_in = false;
$m_dance = [];
$m_dance1 = [];
$m_dance2 = [];
$_SESSION['club']='Dance';

	try
	{
	    $pdo = new PDO("mysql:host=localhost;dbname=project", "manasa", "2929");
	    // set the PDO error mode to exception
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $all_dance = $pdo->query("SELECT m.MID,m.NAME,m.DEPARTMENT,m.USN,m.PHNO from member as m,club as c where m.CID=c.CID && c.CID=4");
			$all_dance1 = $pdo->query("SELECT e.EID,e.EVENT_NAME,e.PARTICIPATION_COST,e.EVENT_MODE,e.EVENT_DATE,
				e.EVENT_PRIZES from events as e,club as c where e.CID=c.CID && c.CID=4");
			$all_dance2 = $pdo->query("SELECT ex.EXID,e.EVENT_NAME,ex.BUDGET,ex.COLLECTION_COUNT,ex.EXPENSES,ex.PROFIT from expenditure as ex ,
				events as e where e.EXID=ex.EXID and E.CID=4");

				$_SESSION['club']='Dance';
		while ( $row = $all_dance->fetch(PDO::FETCH_OBJ) )
		{
		    $m_dance[] = $row;
		}
		while ( $row1 = $all_dance1->fetch(PDO::FETCH_OBJ) )
		{
				$m_dance1[] = $row1;
		}
		while ( $row2 = $all_dance2->fetch(PDO::FETCH_OBJ) )
		{
				$m_dance2[] = $row2;
		}

	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " . $e->getMessage();
	    die();
	}
	if (isset($_POST['Mid']) && isset($_POST['Mname']) && isset($_POST['Mdept']) && isset($_POST['Mphno']) && isset($_POST['Musn'])
	)
	{

		if ( strlen($_POST['Mid'])  > 3 )
    {
        $_SESSION['failure'] = "Enter valid MID";
        header("Location: dance.php");
        return;
    }
		else if ( strlen($_POST['Musn'])!= 10 )
		{
				$_SESSION['failure'] = "Enter valid USN";
				header("Location: dance.php");
				return;
		}
		else if ( strlen($_POST['Mphno'])!= 10 )
    {
        $_SESSION['failure'] = "Enter valid 10 digit phone number";
        header("Location: dance.php");
        return;
    }




		$Mid = htmlentities($_POST['Mid']);
		$Mname = htmlentities($_POST['Mname']);
		$Mdept = htmlentities($_POST['Mdept']);
		$Musn = htmlentities($_POST['Musn']);
		$Mphno = htmlentities($_POST['Mphno']);
		$Cid = 4;

		$stmt = $pdo->prepare("
				INSERT INTO member (MID, NAME, DEPARTMENT, USN,PHNO,CID)
				VALUES (:Mid, :Mname, :Mdept, :Musn,:Mphno,:Cid)
		");

		$stmt->execute([
				':Mid' => $Mid,
				':Mname' => $Mname,
				':Mdept' => $Mdept,
				':Musn' => $Musn,
				':Mphno'=>$Mphno,
				':Cid'=>$Cid
					]);

		header('Location: dance.php');
	return;
	}


	if (isset($_POST['Eid']) && isset($_POST['Ename']) && isset($_POST['EPcost']) && isset($_POST['Emode']) && isset($_POST['Edate'])
	&& isset($_POST['Eprize'])  && isset($_POST['Lid']) && isset($_POST['Exid']))
	{

		if ( strlen($_POST['Eid'])  > 3 )
    {
        $_SESSION['failure2'] = "Enter valid EID";
        header("Location: dance.php");
        return;
    }

		else if ( strlen($_POST['Edate']) !=10 )
		{
				$_SESSION['failure2'] = "Enter valid date (yyyy-mm-dd)";
				header("Location: dance.php");
				return;
		}



		$Eid = htmlentities($_POST['Eid']);
		$Ename = htmlentities($_POST['Ename']);
		$EPcost = htmlentities($_POST['EPcost']);
		$Emode = htmlentities($_POST['Emode']);
		$Edate = htmlentities($_POST['Edate']);
		$Eprize = htmlentities($_POST['Eprize']);
		$Cid = 4;
		$Lid = htmlentities($_POST['Lid']);
		$Exid = htmlentities($_POST['Exid']);

		$stmt = $pdo->prepare("
				INSERT INTO events(EID, EVENT_NAME, PARTICIPATION_COST, EVENT_MODE,EVENT_DATE,EVENT_PRIZES,CID,LID,EXID)
				VALUES (:Eid, :Ename, :EPcost, :Emode,:Edate,:Eprize,:Cid,:Lid,:Exid)
		");

		$stmt->execute([
				':Eid' => $Eid,
				':Ename' => $Ename,
				':EPcost' => $EPcost,
				':Emode' => $Emode,
				':Edate' => $Edate,
				':Eprize' => $Eprize,
				':Cid' => $Cid,
				':Lid' => $Lid,
				':Exid' => $Exid
		]);

		header('Location: dance.php');
	return;
	}

	if (isset($_POST['Exid']) && isset($_POST['budget']) && isset($_POST['ccount']) && isset($_POST['expenses']))

	{

		if ( strlen($_POST['Exid'])  > 3 )
		{
				$_SESSION['failure3'] = "Enter valid EXID";
				header("Location: dance.php");
				return;
		}
		else if ( strlen($_POST['budget'][0]=='-'|| $_POST['ccount'][0]=='-' ))
		{
				$_SESSION['failure3'] = "Enter positive budget and collection count";
				header("Location: dance.php");
				return;
		}



		$Exid = htmlentities($_POST['Exid']);
		$budget = htmlentities($_POST['budget']);
		$ccount = htmlentities($_POST['ccount']);
		$expenses = htmlentities($_POST['expenses']);
		$profit = $ccount - $expenses ;

		$stmt = $pdo->prepare("
				INSERT INTO Expenditure(EXID, BUDGET, COLLECTION_COUNT, EXPENSES,PROFIT)
				VALUES (:Exid, :budget, :ccount, :expenses,:profit)
		");

		$stmt->execute([
				':Exid' => $Exid,
				':budget' => $budget,
				':ccount' => $ccount,
				':expenses' => $expenses,
				':profit' => $profit,

		]);

		header('Location: dance.php');
	return;
	}

?>





<!DOCTYPE html>
<html>
	<head>
		<title>Dance</title>
	<link rel="stylesheet" type="text/css" href="./stylesheets/style.css">
	</head>
  <body>
  <h3> Welcome TO Dance Database</h3>


	<div id="id08" class="modal">
		<span onclick="document.getElementById('id08').style.display='none'"
	class="close" title="Close Modal">&times;</span>

		<!-- Modal Content -->
		<form class="modal-content animate" method="POST">


			<div class="container">

				<div style="color:red">
				 <?php if(isset($_SESSION['failure']) )
							 {
								 echo $_SESSION['failure'];?>
				 <script type='text/javascript'>document.getElementById('id08').style.display='block'</script><?php
				 unset($_SESSION['failure']);
			 }
				 else {?>
					 <script>document.getElementById('id08').style.display='none'</script><?php
				 }
				 ?></div>


				<label for="Mid"><b>Member ID</b></label>
				<input type="text" placeholder="Enter member id" name="Mid" required>

				<label for="Mname"><b>Member Name</b></label>
				<input type="text" placeholder="Enter member name" name="Mname" required>

				<label for="Mdept"><b>Department</b></label>
				<input type="text" placeholder="Enter Department" name="Mdept" required>

				<label for="Musn"><b>USN</b></label>
				<input type="text" placeholder="Enter USN " name="Musn" required>

				<label for="Mphno"><b>Phone Number</b></label>
				<input type="text" placeholder="Enter Phone Number" name="Mphno" required>


				<button type="submit">Done</button>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="location.href='dance.php'" class="cancelbtn">Cancel</button>

			</div>
		</form>
	</div>



			<div id="id09" class="modal">
				<span onclick="document.getElementById('id09').style.display='none'"
			class="close" title="Close Modal">&times;</span>

				<!-- Modal Content -->
				<form class="modal-content animate" method="POST">


					<div class="container">

						<div style="color:red">
						 <?php if(isset($_SESSION['failure2']) )
									 {
										 echo $_SESSION['failure2'];?>
						 <script type='text/javascript'>document.getElementById('id09').style.display='block'</script><?php
						 unset($_SESSION['failure2']);
					 }
						 else {?>
							 <script>document.getElementById('id09').style.display='none'</script><?php
						 }
						 ?></div>


						<label for="Eid"><b>Event ID</b></label>
						<input type="text" placeholder="Enter event id" name="Eid" required>

						<label for="Ename"><b>Event Name</b></label>
						<input type="text" placeholder="Enter event name" name="Ename" required>

						<label for="EPcost"><b>Participation_Cost</b></label>
						<input type="text" placeholder="Enter Participation cost" name="EPcost" required>

						<label for="Emode"><b>Event Mode</b></label>
						<input type="text" placeholder="Enter Event Mode" name="Emode" required>

						<label for="Edate"><b>Event Date</b></label>
						<input type="text" placeholder="Enter Event Date" name="Edate" required>

						<label for="Eprize"><b>Event prize</b></label>
						<input type="text" placeholder="Enter Event prize" name="Eprize" required>

						<label for="Lid"><b>Locaion ID</b></label>
						<input type="text" placeholder="Enter Location id" name="Lid" required>

						<label for="Exid"><b>Expenditure  ID</b></label>
						<input type="text" placeholder="Enter Expenditure id" name="Exid" required>
							<button type="submit">Done</button>

					</div>

					<div class="container" style="background-color:#f1f1f1">
						<button type="button" onclick="location.href='dance.php'" class="cancelbtn">Cancel</button>

					</div>
				</form>
			</div>



			<div id="id10" class="modal">
		 	 <span onclick="document.getElementById('id10').style.display='none'"
		  class="close" title="Close Modal">&times;</span>

		 	 <!-- Modal Content -->
		 	 <form class="modal-content animate" method="POST">


		 		 <div class="container">

					 <div style="color:red">
						<?php if(isset($_SESSION['failure3']) )
									{
										echo $_SESSION['failure3'];?>
						<script type='text/javascript'>document.getElementById('id10').style.display='block'</script><?php
						unset($_SESSION['failure3']);
					}
						else {?>
							<script>document.getElementById('id10').style.display='none'</script><?php
						}
						?></div>


		 			 <label for="Exid"><b>Expenditure ID</b></label>
		 			 <input type="text" placeholder="Enter expenditure id" name="Exid" required>

		 			 <label for="budget"><b>Budget</b></label>
		 			 <input type="text" placeholder="Enter budget" name="budget" required>

		 			 <label for="ccount"><b>Collection count</b></label>
		 			 <input type="text" placeholder="Enter Collection count" name="ccount" required>

		 			 <label for="expenses"><b>Expenses</b></label>
		 			 <input type="text" placeholder="Enter Expenses" name="expenses" required>
		 				 <button type="submit">Done</button>

		 		 </div>

		 		 <div class="container" style="background-color:#f1f1f1">
		 			 <button type="button" onclick="location.href='dance.php'" class="cancelbtn">Cancel</button>

		 		 </div>
		 	 </form>
		  </div>


  <div>
  <p>
		<h3>Member</h3>
			<button onclick="document.getElementById('id08').style.display='block'">Insert New Member</button>
    <table>
      <thead>
        <tr>
					<th>MID</th>
          <th>Name</th>
          <th>Department</th>
          <th>USN</th>
          <th>Phone</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($m_dance as $m_dan) : ?>
                      <tr>
												<td><?php echo $m_dan->MID; ?></td>
                        <td><?php echo $m_dan->NAME; ?></td>
            <td><?php echo $m_dan->DEPARTMENT; ?></td>
            <td><?php echo $m_dan->USN; ?></td>
            <td><?php echo $m_dan->PHNO; ?></td>
            <td><a href="./edit/edit_m.php?member_id=<?php echo $m_dan->MID; ?>">Edit</a> / <a href="./delete/delete_m.php?member_id=<?php echo $m_dan->MID; ?>">Delete</a>
            </td>
                      </tr>
                  <?php endforeach; ?>
      </tbody>
    </table>
  </p>
  </div>


	<div>
  <p>
		<h3>Event</h3>
			<button onclick="document.getElementById('id09').style.display='block'">Insert New Event</button>
    <table>
      <thead>
        <tr>
					<th>EID</th>
          <th>Event Name</th>
          <th>Participation Cost</th>
          <th>Event Mode</th>
          <th>Event Date</th>
					<th>Event Prize</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($m_dance1 as $m_dan1) :?>
                      <tr>
												<td><?php echo $m_dan1->EID; ?></td>
                        <td><?php echo $m_dan1->EVENT_NAME; ?></td>
            <td><?php echo $m_dan1->PARTICIPATION_COST; ?></td>
            <td><?php echo $m_dan1->EVENT_MODE; ?></td>
            <td><?php echo $m_dan1->EVENT_DATE; ?></td>
						<td><?php echo $m_dan1->EVENT_PRIZES; ?></td>
            <td><a href="./edit/edit_e.php?event_id=<?php echo $m_dan1->EID; ?>">Edit</a> / <a href="./delete/delete_e.php?event_id=<?php echo $m_dan1->EID; ?>">Delete</a>
            </td>
                      </tr>
                  <?php endforeach; ?>
      </tbody>
    </table>
  </p>
  </div>

	<div>
	<p>
		<h3>Expenditure</h3>

		<div>
		<button onclick="document.getElementById('id10').style.display='block'">Insert New Expenditure</button>
	</div>

		<table>
			<thead>
				<tr>
					<th>Event Name</th>
					<th>EXID</th>
					<th>Budget</th>
					<th>Collection Count</th>
					<th>Expenses</th>
					<th>Profit</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($m_dance2 as $m_dan2) :?>
											<tr>
												<td><?php echo $m_dan2->EVENT_NAME; ?></td>
												<td><?php echo $m_dan2->EXID; ?></td>
						<td><?php echo $m_dan2->BUDGET; ?></td>
						<td><?php echo $m_dan2->COLLECTION_COUNT; ?></td>
						<td><?php echo $m_dan2->EXPENSES; ?></td>
						<td><?php echo $m_dan2->PROFIT; ?></td>

											</tr>
									<?php endforeach; ?>
			</tbody>
		</table>
	</p>
	</div>



	<div>
		<form method="POST">
	<button type="submit" name="logout" >LogOut</button>
	</form>
	</div>

  </body>
  </html>
