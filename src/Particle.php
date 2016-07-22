<?php
/**
 * Created by Edward Rodriguez
 * Date: 7/1/16
 * Time: 10:46 PM
 * 
 */

namespace CrowdTwist\ParticleAccelerator;

use CrowdTwist\ParticleAccelerator\Exceptions\InvalidDirectionException;
use CrowdTwist\ParticleAccelerator\Exceptions\InvalidSpeedException;

class Particle
{
	use ParticleProperties;

	private $speed = 0;
	private $initPosition;
	private $direction;
	private $startPosition;

	public function __construct($speed, $initLocation, $direction)
	{
		$this->speed = (int)$speed;
		$this->initPosition = $initLocation;
		$this->startPosition = $initLocation;
		$this->direction = $direction;
		$this->checkParticle();
	}

	public function move($time)
	{
		if ($this->direction == $this->directionRight()) {
			$this->initPosition = $this->moveRight($time);
			return $this;
		}
		$this->initPosition = $this->moveLeft($time);
		return $this;
	}

	private function moveRight($time)
	{
		return ($time * $this->speed) + $this->getStartPosition();
	}

	private function moveLeft($time)
	{
		return $this->getStartPosition() - ($time * $this->speed);
	}

	private function checkParticle()
	{
		if (!$this->validSpeed()) {
			throw new InvalidSpeedException;
		}

		if (!$this->validDirection()) {
			throw new InvalidDirectionException;
		}
	}

	public function validSpeed()
	{
		return (($this->speed >= $this->speedInit()) && ($this->speed <= $this->speedLimit()));
	}

	public function validDirection()
	{
		if ($this->getDirection() == $this->directionLeft()) {
			return true;
		}

		if ($this->getDirection() == $this->directionRight()) {
			return true;
		}

		return false;
	}

	/**
	 * @return int
	 */
	public function getSpeed()
	{
		return $this->speed;
	}

	/**
	 * @return mixed
	 */
	public function getInitPosition()
	{
		return $this->initPosition;
	}

	/**
	 * @return mixed
	 */
	public function getDirection()
	{
		return $this->direction;
	}

	/**
	 * @return mixed
	 */
	public function getStartPosition()
	{
		return $this->startPosition;
	}

	public function isGoingRight()
	{
		return ($this->getDirection() == $this->directionRight());
	}

	public function isGoingLeft()
	{
		return ($this->getDirection() == $this->directionLeft());
	}
}

