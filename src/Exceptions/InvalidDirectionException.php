<?php
/**
 * Created by Edward Rodriguez
 * Date: 7/1/16
 * Time: 11:01 PM
 * 
 */

namespace CrowdTwist\ParticleAccelerator\Exceptions;

class InvalidDirectionException extends \Exception
{
	public function __construct($message = 'Invalid direction for particle. Should be L or R')
	{
		parent::__construct($message);
	}
}

