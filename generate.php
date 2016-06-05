<?php

function generateEnemy() {
	$rand = rand(0, 2);
	$class = ["Theo", "Marion", "Vald"];
	$opp = $class[$rand];
	$opponent = new $opp("Vilain");
	return($opponent);
}

function chooseClass() {
	$class = false;
	if (($flux = fopen('php://stdin', 'r')) !== FALSE) {
		while($class == false){
			echo "The first step for you is to choose you class !\n[1] for Theo\n[2] for Marion\n[3] for Vald\n";				
			$choice = fgets($flux);
			switch ($choice) {
				case 1 :
					echo "You choose the Theo \n";
					$class = "Theo";
					break;
				case 2 :
					echo "You choose the Marion \n";
					$class = "Marion";
					break;
				case 3 :
					echo "You choose the Vald \n";
					$class = "Vald";
					break;
				default :
					$class = false;
					break;
			}	
		}
		echo "Now you have to choose your name !\n";
		if (($name = fgets($flux)) !== FALSE){
			return($player = new $class($name));
		}
	}
}


