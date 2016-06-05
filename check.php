<?php

function decoup_params($line)
{
	$i = 0;
	$tab = (preg_split('/[\s]/', $line)); 
	while (isset($tab[$i]) == NULL)
	{
		$tab[$i] = trim($tab[$i]);
		$i++;
	}
	return ($tab[0]);
}

function checkStatus ($player) {

	switch($player->status){
		case "dead":
			echo $player->name . " is dead :c \n";
			return (-1);
		case "lacted":
			$player->vie -= 5;
			break;
		case "lactile":
			$player->vie -= 20;
			break;
		case "lactospreaded":
			$player->vie -= 40;
			break;
		case "bonjour":
			echo "You didn't say \"Bonjour\" !!!!!\nYou gonna die next turn :c\n";
			$player->status = "dead";
			break;
		default :
			break;
	}
}

function checkAction($action, $player) {
	
	foreach($player->book as $skill) {
		if ($action == $skill) {
				return true;
		}
	}
	return false;
}


