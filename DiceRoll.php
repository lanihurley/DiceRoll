<!-- Chapter 2 practice exercise Date: 12/8/2021 Author: Lani Hurley
	simple webpage that displays dice game. 
	Uses image file: "backDice.jpg"
	filename: DiceRoll.php
-->
<!DOCTYPE html>
<html style = "background: #001333">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dice Roll</title>
</head>
<body>
	<!-- Background image file -->
	<img src="backDice.jpg" style = "width: 100%; height: auto;"/>

	<div style="text-align: center ;position: absolute;top: 50px; left: 200px; font-size: 22px; color: white">
		<h1 style = "color: #d1ad4b; text-shadow: whitesmoke 1px -2px 1px;">Let's Roll Some Dice!</h1>
		<!-- Start of php command block -->
		<?php 
			$FaceNamesSingular = array("one", "two", "three", "four", "five", "six");
			$FaceNamesPlural = array("ones", "twos", "threes", "fours", "fives", "sixes");

			// definition of the chechForDoubles() function
			function CheckForDoubles($Die1, $Die2) 
			{
				global $FaceNamesSingular;	
				global $FaceNamesPlural;
				$ReturnValue = false;
					//defining if() statement
				if ($Die1 == $Die2) //TRUE - Doubles - Both dice have the same roll
				{
					echo "The roll was Double! ", $FaceNamesPlural[$Die1 - 1], ".<br/>";//subtract 1 to compensate for the index starting at 0, so echo will display the correct roll response
					$ReturnValue = true;
				} // end of if() statement
				else // if not a double - FALSE
				{
					echo "The roll was a ", $FaceNamesSingular[$Die1 -1], " and a ", $FaceNamesSingular[$Die2 - 1], ".<br/>";
					$ReturnValue = false;
				}

				return $ReturnValue;

			} // end of CheckForDoubles() function

			// definition of the DisplayScoreText() function
			function DisplayScoreText($Score) 
			{
				switch($Score) {
					case 2:
						echo "You rolled snake eyes!";
						break;
					case 3:
						echo "You rolled a loose deuce!";
						break;
					case 5:
						echo "You rolled a fever five!<br/>";
						break;
					case 7:
						echo "You rolled a natural!<br/>";
						break;
					case 9:
						echo "You rolled a nina!<br/>";
						break;
					case 11:
						echo "You rolled a yo!<br/>";
						break;
					case 12:
						echo "You rolled a boxcars!<br/>";
						break;
				}
			} // end of DisplayScoreText() function

			$Dice = array();// the two new variables for Dice array go into index 0, and 1
			$DoublesCount = 0;
			$RollNumber = 1;

			while($RollNumber <= 5) 
			{
				$Dice[0] = rand(1, 6);
				$Dice[1] = rand(1, 6);
				$Score = $Dice[0] + $Dice[1];
				echo "<p>"; 
				echo "The total score for roll $RollNumber was $Score.<br/>";
				$Doubles = CheckForDoubles($Dice[0], $Dice[1]);
				DisplayScoreText($Score);
				echo "</p>";
				// Check the double variable so we can increase $DoublesCount
				if($Doubles)
				{
					++$DoublesCount;
				}
				++$RollNumber;
			}// end of the while loop

			// write the summary of how many doubles the game rolled at the end 
			echo "<p>Doubles occured on $DoublesCount of the five rolls.</p>";
		?>
	</div>
</body>
</html>