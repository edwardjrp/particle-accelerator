<?php
/**
 * Created by Edward Rodriguez
 * Date: 7/1/16
 * Time: 11:17 PM
 * 
 */

namespace CrowdTwist\ParticleAccelerator;

class Animation extends BaseAnimation
{

	public function __construct($speed, $initChamber)
	{
		parent::__construct($speed, $initChamber);
	}


	public function animate()
	{
		$chamberParticles = $this->buildChamber();
		$this->addToChamberList($chamberParticles);

		$time = 1;
		while(!$this->isChamberEmpty($chamberParticles)) {
			$movedParticles = $this->moveParticles($chamberParticles, $time);
			$this->addToChamberList($movedParticles);
			$time++;
		}

		return $this->outputChamberAsString();
	}

	public function outputChamberAsString()
	{
		$list = '';
		foreach($this->getChamberAsString() as $c) {
			$list .= $c.PHP_EOL;
		}
		return $list;
	}

}

