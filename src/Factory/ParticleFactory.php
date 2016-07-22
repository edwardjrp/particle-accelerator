<?php
/**
 * Created by Edward Rodriguez
 * Date: 7/2/16
 * Time: 12:04 AM
 * 
 */

namespace CrowdTwist\ParticleAccelerator\Factory;

use CrowdTwist\ParticleAccelerator\Particle;

class ParticleFactory
{
	public static function make($speed, $initLocation, $direction)
	{
		return new Particle($speed, $initLocation, $direction);
	}

}

