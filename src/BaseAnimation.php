<?php
/**
 * Created by Edward Rodriguez
 * Date: 7/2/16
 * Time: 3:36 PM
 * 
 */

namespace CrowdTwist\ParticleAccelerator;

use CrowdTwist\ParticleAccelerator\Contracts\AnimationInterface;
use CrowdTwist\ParticleAccelerator\Exceptions\InvalidChamberSizeException;
use CrowdTwist\ParticleAccelerator\Exceptions\InvalidSpeedException;
use CrowdTwist\ParticleAccelerator\Factory\ParticleFactory;

abstract class BaseAnimation implements AnimationInterface
{
	use ParticleProperties;

	/**
	 * @var
	 */
	private $speed;
	/**
	 * @var
	 */
	private $initChamber;

	/**
	 * @var array
	 */
	private $chamberList = [];

	/**
	 * @var array
	 */
	private $chamberAsString = [];


	public function __construct($speed, $initChamber)
	{
		$this->speed = $speed;
		$this->initChamber = $initChamber;
		$this->validateAccelerator();
	}

	private function validateAccelerator()
	{
		if (!$this->validChamber()) {
			throw new InvalidChamberSizeException;
		}

		if (!$this->validSpeed()) {
			throw new InvalidSpeedException;
		}
	}

	/**
	 * @return array
	 */
	public function getChamberAsString()
	{
		return $this->chamberAsString;
	}

	/**
	 * @return array
	 */
	public function getChamberList()
	{
		return $this->chamberList;
	}


	public function validChamber()
	{
		return ((strlen($this->initChamber) >= $this->chamberStart()) && (strlen($this->initChamber) <= $this->chamberEnd()));
	}

	public function validSpeed()
	{
		return (($this->speed >= $this->speedInit()) && ($this->speed <= $this->speedLimit()));
	}

	public function chamberSize()
	{
		return strlen($this->initChamber);
	}

	public function chamberStart()
	{
		return 1;
	}

	public function chamberEnd()
	{
		return 50;
	}

	/**
	 * @return mixed
	 */
	public function getSpeed()
	{
		return $this->speed;
	}

	/**
	 * @return mixed
	 */
	public function getInitChamber()
	{
		return $this->initChamber;
	}

	/**
	 * @param array $chamberParticles
	 *
	 * @return bool
	 */
	public function isChamberEmpty(array $chamberParticles)
	{
		$goneParticle = [];
		foreach($chamberParticles as $p) {
			if (($p->getInitPosition() < 0) && ($p->isGoingLeft())) {
				$goneParticle[] = $p;
			}

			if (($p->getInitPosition() >= $this->chamberSize()) && ($p->isGoingRight())) {
				$goneParticle[] = $p;
			}
		}

		return (count($chamberParticles) == (count($goneParticle)));
	}

	/**
	 * @param array $chamberParticles
	 * @param       $time
	 *
	 * @return array
	 */
	public function moveParticles(array $chamberParticles, $time)
	{
		$movedParticles = [];
		foreach($chamberParticles as $p) {
			$movedParticles[] = $p->move($time);
		}

		return $movedParticles;
	}

	/**
	 * @return array
	 */
	public function buildChamber()
	{
		$chamber = [];
		for ($i = 0;  $i < $this->chamberSize(); $i++ ) {
			$curParticle = $this->getInitChamber()[$i];
			if ($curParticle != '.') {
				$chamber[] = ParticleFactory::make($this->getSpeed(), $i, $curParticle);
			}
		}

		return $chamber;
	}


	/**
	 * @param array $chamberParticles
	 */
	public function addToChamberList(array $chamberParticles)
	{
		$this->chamberList[] = $chamberParticles;
		$this->AddChamberAsString($this->chamberToString($chamberParticles));
	}

	/**
	 * @param array $particles
	 *
	 * @return string
	 */
	private function chamberToString(array $particles)
	{
		$chamberOutput = '';
		for ($i = 0;  $i < $this->chamberSize(); $i++ ) {
			$chamberOutput .= '.';
			foreach($particles as $p) {
				if ($p->getInitPosition() == $i) {
					$chamberOutput[$i] = 'X';
				}
			}
		}

		return $chamberOutput;
	}

	/**
	 * @param $particles
	 */
	private function AddChamberAsString( $particles )
	{
		$this->chamberAsString[] = $particles;
	}

}

