<?php
/**
 * Created by PhpStorm.
 * User: Edward Rodriguez
 * Date: 7/2/16
 * Time: 12:16 PM
 */

namespace CrowdTwist\ParticleAccelerator;

trait ParticleProperties
{
	protected function speedInit()
	{
		return 1;
	}

	protected function speedLimit()
	{
		return 10;
	}

	public function directionRight()
	{
		return Direction::RIGHT;
	}

	public function directionLeft()
	{
		return Direction::LEFT;
	}
}