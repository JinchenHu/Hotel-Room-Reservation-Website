<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reservation</title>
		<meta charset="utf-8">
		<script src="a4q3_checkItems.js"></script>
		<link rel="stylesheet" type="text/css" href="a4q3_style.css">

	</head>
	<body>
        <?php include("a4q3_header.php"); ?>
		<form id="hotel" action="a4q3_search.php" method="post" onsubmit="return check()">
            <div id="login">
                <a href="a4q3_login_page.php"><button type="button">Login</button></a>&nbsp;&nbsp;
                <?php
                    if (isset($_SESSION['userName']) and !empty($_SESSION['userName'])){
                        echo "welcome, " . $_SESSION['userName'];
                    }
                ?>

            </div><br/>
			<fieldset id="fs1" >
				<legend id="leg1">Reservation Information</legend>
				<label>Number of Rooms (max 5 people per room)
					<input type="number" name="numOfRooms" max="5" min="1">
				</label>
				<p>
					<label>Smoker?</label>
						<input type="radio" name="ifSmoking" value="yes">Yes
						<input type="radio" name="ifSmoking" value="no">No
				</p>
				<p>
					<label>Check-in:&nbsp;&nbsp;  
						<input type="date" name="arrDate" >
					</label><br/><br/>
					<label>Check-out:
						<input type="date" name="leavDate">
					</label>
				</p>
			</fieldset><br/>

			<fieldset id="fs2">
				<legend id = "leg2">Room Specifications</legend>
				<ul>
					<li>
						<label>Number of single/double beds:</label><br/>
							<input class="beds" type="checkbox" name="beds[]" value="0/2">0/2
							<input class="beds" type="checkbox" name="beds[]" value="2/0">2/0
							<input class="beds" type="checkbox" name="beds[]" value="1/1">1/1
							<input class="beds" type="checkbox" name="beds[]" value="2/1">2/1
							<input class="beds" type="checkbox" name="beds[]" value="1/2">1/2
					<br/>
					</li>

					<li>
						<label>Do you have prefered locations for the hotel?</label><br/>
							<input class="loc" type="checkbox" name="preLoc[]" value="dt">Downtown
							<input class="loc" type="checkbox" name="preLoc[]" value="east">Montreal East
							<input class="loc" type="checkbox" name="preLoc[]" value="west">Montreal West
							<input class="loc" type="checkbox" name="preLoc[]" value="air">Near to the airport
							<input class="loc" type="checkbox" name="preLoc[]" value="old">Oldport
							<input class="loc" type="checkbox" name="preLoc[]" value="noCare">Don't care
							<br/>
					</li>

					<li>
						<label>Price Range/per night:</label><br/>
						<select name="price">
							<option value="<50">&lt;$50</option>
							<option value="50-100">$50-$100</option>
							<option value="101-150">$101-$150</option>
							<option value="151-200">$151-$200</option>
							<option value=">200">&gt;200$</option>
							<option value="nolimit">No price limit</option>
						</select><br/>
					</li>

					<li>
						<label>Number of Private Parkings</label><br/>
							<input type="radio" name="numOfParking" value="0">0<br/>
							<input type="radio" name="numOfParking" value="1">1<br/>
							<input type="radio" name="numOfParking" value="2">2<br/>
							<input type="radio" name="numOfParking" value="3">3<br/>
							<input type="radio" name="numOfParking" value="4">4<br/>
					</li>

					<li>
						<label>Special Facilities</label><br/>
							<input class= "fac" type="checkbox" name="specFac[]" value="bar">Minibar
							<input class= "fac" type="checkbox" name="specFac[]" value="bal">Balcony
							<input class= "fac" type="checkbox" name="specFac[]" value="pool">Poll
							<input class= "fac" type="checkbox" name="specFac[]" value="water">Water Front
							<input class= "fac" type="checkbox" name="specFac[]" value="garden">Graden Front
					</li>
				</ul>
			</fieldset>
			<br/>
			<label>Let's see what we can find ...</label><br/><br/>
			<label>
				<input type="submit" value="Search" onclick="suggestion()">
			</label>
			<label>
				<input type="reset" value="Start over">
			</label>
		</form><br/>
		<?php include('a4q3_footer.php'); ?>
	</body>
</html>