<?php

require "monster.php";
require "check.php";
require "generate.php";

echo "\033c";
echo "Hi and welcome to Battle in Midwut !\n"; 
$player = chooseClass();
while($player->status != "dead") {
	$opponent = generateEnemy();
	start_fight($player, $opponent);
}

function iaPlay ($player, $ia) {

	$nb = count($ia->book);
	$rand = rand(0, $nb-1);
	$action = decoup_params($ia->book[$rand]);
	$ia->$action($player);
}
function start_fight ($player, $opponent) {
	$cmd = false; 
	if (($flux = fopen('php://stdin', 'r')) !== FALSE) {
		while(($line = fgets($flux)) !== "exit"){
			while ($cmd == false){
				echo "Your turn, type your action\n";
				$line = fgets($flux);
				$cmd = checkAction($action = decoup_params($line), $player);
			}
			$player->$action($opponent);
			if (checkStatus($opponent) == -1){
				return -1;
			}
			iaPlay($player, $opponent);
			if (checkStatus($player) == -1){
				return -1;
			}
		}
	}
}


