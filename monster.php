<?php

class Monstre {
	
	public	  $name;
	protected $lvl = 1;
	protected $lvl_stats = 1;
	protected $vie_max = 100;
	protected $atk = 10;
	protected $exp_max = 10;
	protected $exp = 0;
	public    $book = ["Punch", "Headbut"];
	public    $status = "";
	public	  $vie = 100;

	public function __construct($name = "Froud") {
		$this->name = $name;
	}

	public function gainExp($point) {
		$this->exp += $point;
		if ($this->exp >= $this->exp_max)
			$this->lvlUp();
	}

	private function lvlUp() {
		$this->lvl++;
		$this->vie_max += $this->lvl_stats;
		$this->atk += $this->lvl_stats;
		$this->exp_max += 10;
		$this->exp = 0;
	}
	public function checkIfDead() {
		if($this->vie <= 0) {
			$this->status = "dead";
		}
	}

	public function listSpell() {
		return $this->book;
	}	
	
	public function Punch($cible) {
		echo $this->name . " Punch " . $cible->name . " in da face\n";	
		$cible->vie -= $this->atk;
		echo $cible->name . " loose ". $this->atk . " pv\n";
		echo $cible->name . " pv are now " . $cible->vie . "\n";
	}

	public function Headbut($cible) {
		echo $this->name . " headbut " . $cible->name . " in da face\n";	
		$cible->vie -= 2 * $this->atk;
		$this->vie -= $cible->atk;
		echo "You loose " . $cible->atk . " pv\n";
		echo $cible->name . " loose ". 2 * $this->atk . "pv\n";
		echo $cible->name . " pv are now " . $cible->vie . "\n";
	}
}

class Vald extends Monstre {
	
	protected $atk = 0;
	public $book = ["Punch", "Headbut", "Poisson", "Bonjour"];	
	public function Poisson() {
		$this->vie = 1;
		$this->vie_max = 1;
		echo "You are now a Fish, your total life is now 1\n";
	}
	
	public function Bonjour($cible) {
		$cible->status = "bonjour";
		echo $this->name . " say \"Bonjour\" \n";
	}
}

class Theo extends Monstre {
	
	public $book = ["Punch", "Headbut", "Lactonapalm"];
	public function Lactonapalm($cible) {
		$cible->vie += $this->atk;
		if ($cible->status == "lactile" || $cible->status == "lactospreaded") {
			$cible->status = "lactospreaded";
			echo $this->name . " use Lactonapalm, you are now lactospreaded\n";
		} elseif ($cible->status == "lacted") {
			$cible->status = "lactile";	
			echo $this->name . " use Lactonapalm, you are now lactile\n";
		} else {
			$cible->status = "lacted";
			echo $this->name . " use Lactonapalm, you are now lacted\n";
		}
	}
}

class Marion extends Monstre {
 
 	public $book = ["Punch", "Headbut", "Coin", "Oxymore"];
	public function Coin($cible) {
		$cible->vie = $this->vie/2;
		echo "COIN COIN ! The Marion use is own life to deal damage !\n";
		echo $cible->name . " pv are now " . $cible->vie . "\n";
	}

	public function Oxymore($cible) {
		$rand = rand(0, 3);
		$st = ["dead", "", "lactospreaded", "bonjour"];
		$cible->status = $st[$rand];
		echo $this->name . " the Marion dont even know what he is actually doing !" . $cible->name . " is now " . $st[$rand] . "\n";

	}
}

