<?php
	include 'inc/db_connect.php';

	if($_POST){
		$winVote = $_POST['team'];
		$matchup = $_POST['mid'];
		$opponent = $_POST['opp'];
		
		$result = DB::query("INSERT INTO votes (mid,team,opp) VALUES ('" . $matchup . "', '" . $winVote . "','" . $opponent . "')");
		$result = DB::query("SELECT * FROM votes WHERE mid = " . $matchup);
		print json_encode($result);
	}
?>