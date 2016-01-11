<?php

	include('inc/db_connect.php');

	// Select statement .. get a random match from cbb.
	// Check to see if they have voted on it.
	// if they have, get a different one (go back to step 1).
	// if they have not, use it.

	// Once they click on the vote button,
	// 


	$result = DB::query("SELECT * FROM cbb");

		print_r($_SESSION);
		// exit;

	// do{
		$matchup = rand(1,sizeof($result));

	// }while($_SESSION[$matchup]);

		
	$result = DB::query("SELECT * FROM cbb WHERE mid ='". $matchup . "'");
	// }
	



	// for($x = 0; $x < sizeof($result);$x++){

		$team1 = $result[0]['team1'];
		$team2 = $result[0]['team2'];
		$team1_image = $result[0]['image1'];
		$team2_image = $result[0]['image2'];


		
	// $rand = rand ( 0, count($rows)-1 );
	// $rand2 = $rand;
	
	// while($rand == $rand2){
	// 	$rand2 = rand ( 0, count($rows)-1 );
	// }
	
	// $_SESSION[$matchup] = true;


	


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
		<div class="row" style="text-align:center">
			<h4 class="col-xs-5 col-xs-offset-1">Away Team</h4>
			<h4 class="col-xs-5">Home Team</h4>
		</div>
		<div class="row">
			<img class="col-xs-5 col-xs-offset-1 team_image" style="vertical-position:center" src=<?php print $team1_image ?>>
			<img class="col-xs-5 team_image" style="vertical-position:center" src=<?php print $team2_image ?>>
		</div>
		<div class="row" style="text-align:center">
			<div class="col-xs-3 col-xs-offset-2" id="away-wrapper">
				<button class="col-xs-12 btn btn-success vote-button" team="<?php print $team1; ?>" opp="<?php print $team2 ?>" matchup="<?php print $matchup; ?>" style="text-align:center"><?php print $team1; ?></button>
			</div>
			<div class="col-xs-2" style="padding:6px 12px;">OR</div>
			<div class="col-xs-3" id="home-wrapper">
				<button class="btn btn-success col-xs-12 vote-button" team="<?php print $team2; ?>" opp="<?php print $team1 ?>" matchup="<?php print $matchup; ?>"><?php print $team2; ?></button>
			</div>
		</div>
		<div class="row matchup">
			
		</div>
	</div>

	<script>

	$('.vote-button').click(function(){
		var vote = $(this).attr('team');
		var matchup = $(this).attr('matchup');
		var opp = $(this).attr('opp');
		$.ajax({
			url: 'process_vote.php',
			type: 'post',
			data: {
				team: vote,
				opp: opp,
				mid: matchup
			},
			success: function(result){
				console.log(result);
				var newVote = vote;
				var matchup = Number(result.mid);
				// obj = JSON.parse(result);
				document.write(result);

				// JavaScript to allow the user to see the results, as well as go on to the next matchup.
				if(result){
					$('#away-wrapper').text('Winner is '+vote);
					$('#home-wrapper').text('Loser is '+opp);
					var html = "<button class='btn btn-warning col-xs-4 col-xs-offset-4 next'>Next Matchup</button>";
					$('.matchup').append(html);
					$('.next').click(function(){
						location.reload();
					})
				}
			}
		})

	})
	


	

	</script>
</body>
</html>










