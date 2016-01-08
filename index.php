<?php

	include('inc/db_connect.php');

	// Select statement .. get a random match from cbb.
	// Check to see if they have voted on it.
	// if they have, get a different one (go back to step 1).
	// if they have not, use it.

	// Once they click on the vote button,
	// 

	$query = "SELECT * FROM cbb";
	$result = mysql_query($query);

	while($row = mysql_fetch_assoc($result)){
		$team1[$row['mid']] = $row['team1'];
		$team2[$row['mid']] = $row['team2'];
		$team1_image[$row['mid']] = $row['image1'];
		$team2_image[$row['mid']] = $row['image2'];
	}

	$matchup = rand(1,10);
	
	// print '<pre>';
	// print_r($team1[1]);
	// print ' ';
	// print_r($team2[1]);
	// exit;

?>
	




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PHP Poll</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background-color:black">


	<div class="container" style="background-color:white; padding:0px 50px 50px; border-radius:20px; opacity:0.9">
		<div class="row">
			<h1 class="col-xs-6 col-xs-offset-3" style="text-align:center">College Basketball Poll</h1>
			<h3 class="col-xs-6 col-xs-offset-3" style="text-align:center">Who do you think will win?</h1>
		</div>
		<div class="row">
			<img class="col-xs-5 team_image" style="" src="<?php print $team1_image[$matchup] ?>">
			<img class="col-xs-5 col-xs-offset-2 team_image" style="" src="<?php print $team2_image[$matchup] ?>">
		</div>
		<div class="row" style="text-align:center">
			<button class="btn btn-success col-xs-3 col-xs-offset-1 vote-button" vote="<?php print $team1[$matchup]; ?>" opp="<?php print $team2[$matchup]; ?>" style="text-align:center"><?php print $team1[$matchup]; ?></button>
			<button class="btn btn-success col-xs-3 col-xs-offset-4 vote-button" vote="<?php print $team2[$matchup]; ?>" opp="<?php print $team1[$matchup]; ?>"><?php print $team2[$matchup]; ?></button>
		</div>
		<div class="row">
			<button class="btn btn-warning col-xs-2 col-xs-offset-5 next">Next Matchup</button>
		</div>
	</div>

	<script>

	$('.vote-button').click(function(){
		var vote = $(this).attr('vote');
		var opp = $(this).attr('opp');

		console.log(vote,opp)
	})



	$('.next').click(function(){
		location.reload();
	})

	</script>
</body>
</html>










