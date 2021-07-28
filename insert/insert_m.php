<!DOCTYPE html>
<html>
	<head>
		<title>Sports</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
  <body>

<div id="id06" class="modal">
  <span onclick="document.getElementById('id06').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" method="POST">


    <div class="container">
      <label for="name"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="Name" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="Pass" required>

      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id06').style.display='none'" class="cancelbtn">Cancel</button>

    </div>
  </form>
</div>

</body>
</html>
