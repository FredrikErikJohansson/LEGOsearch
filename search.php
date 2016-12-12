<?php

	$db = mysqli_connect("mysql.itn.liu.se", "lego", "", "lego");
	
	if(isset($_POST['submit']))
	{
		$searchkey = $_POST['searchbox'];
		$sql = "SELECT * FROM sets WHERE SetID LIKE CONCAT('%', '$searchkey', '%') OR Setname LIKE CONCAT('%', '$searchkey', '%')";
		$result = mysqli_query($db, $sql);
	}
	
	if(isset($_GET['setID']))
	{
		$setID = $_GET['setID'];
		$sql = "SELECT * FROM sets, parts, inventory WHERE sets.SetID = '$setID' AND inventory.SetID = sets.SetID AND parts.PartID = inventory.ItemID";
		$result = mysqli_query($db, $sql);
		while($row = $result->fetch_array())
		{
			echo $row['Partname'] . '<br />';
		}
		
	}
	
?>

<!doctype html>

<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Lego</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
	</head>
	<body>
		<div class="bigmenu">
			<div class="menu">
				<img src="Legologo123.svg" alt="Legologo">
				<a class="aheader">ABOUT</a>
				<a class="aheader">HELP</a>
			</div>
		</div>
			<div class="picture">
			</div>
			<div class="container">
				<div class="containerdata">
					<div class="search"> 
						<h1>Search for lego sets</h1>
						<form action="search.php" method="post">
							<input type="text" name="searchbox" class="searchbox" placeholder="e.g. 1234 or 'brandbil'"/>
							<input type="submit" name="submit" class="submit" value="SEARCH"/>
						</form>
					</div>
					<table class="settable">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Year</th>
						</tr>
						<?php 
							while($row = $result->fetch_assoc())
							{
						?>
							<a href="?setID=<?php echo $row['SetID'];?>">
								<tr>
									<td>142-1</td>
									<td><?php echo $row['Setname'];?></td>
									<td>1962</td>
								</tr>
							</a>
						<?php } ?>
					</table>
					<div class="instructions">
						<h2>Instructions</h2>
						<p>If not specified (default), the shadow is assumed
						 to be a drop shadow (as if the box were raised above 
						 the content). The presence of the inset keyword changes
						  the shadow to one inside the frame (as if the content was
						   depressed inside the box). Inset shadows are drawn inside
							the border (even transparent ones), above the background, 
							but below content.<br/><br/>If not specified (default), the shadow is assumed
						 to be a drop shadow (as if the box were raised above 
						 the content). The presence of the inset keyword changes
						  the shadow to one inside the frame (as if the content was
						   depressed inside the box).</p>
					</div>
					<div class="stats">
						<h2>Top 5</h2>
						<table>
							<tr> 
								<th>#</th>
								<th>Name</th>
								<th>Pieces</th>
								<th>Created</th>
							</tr>
							<tr>
								<td>1</td>
								<td>Firetruck</td>
								<td>30 000</td>
								<td>2014</td>
							
							</tr>
							<tr>
								<td>2</td>
								<td>Watertruck</td>
								<td>25 000</td>
								<td>2017</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Windtruck</td>
								<td>21 000</td>
								<td>1967</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Smoketruck</td>
								<td>15 000</td>
								<td>1994</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Gastruck</td>
								<td>13 370</td>
								<td>1942</td>
							</tr>
						</table>
					</div>
					<div class="clearfix"></div>
					<div class="about">
						<h2>About</h2>
						<p>If not specified (default), the shadow is assumed
						 to be a drop shadow (as if the box were raised above 
						 the content). The presence of the inset keyword changes
						  the shadow to one inside the frame (as if the content was
						   depressed inside the box). Inset shadows are drawn inside
							the border (even transparent ones), above the background, 
							but below content.
						</p>
						<div class="persons">
							<img src="Teambilder/Adam.png" alt="Adam"/>
							<h2>Adam</h2>
						</div>
						<div class="persons">
							<img src="Teambilder/Fredrik.png" alt="Fredrik"/>
							<h2>Fredrik</h2>							
						</div>
						<div class="persons">
							<img src="Teambilder/Johan.png" alt="Johan"/>
							<h2>Johan</h2>
						</div>
						<div class="persons">
							<img src="Teambilder/Pontus.png" alt="Pontus"/>
							<h2>Pontus<h2>
						</div>
						<div class="persons">
							<img src="Teambilder/Sebbe.png" alt="Sebbe"/>
							<h2>Sebastian<h2>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="footerleft">
					&copy; Crazy8
				</div>
				<div class="footercenter">
					<a class="afooter">References</a>
					<a class="afooter">Terms and conditions</a> 
				</div>
				<div class="footerright">
					Email: crazy8@lego.com
				</div>
	</body>
</html>