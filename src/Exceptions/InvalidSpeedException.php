<?php
/**
 * Created by Edward Rodriguez
 * Date: 7/1/16
 * Time: 11:01 PM
 * 
 */

namespace CrowdTwist\ParticleAccelerator\Exceptions;

class InvalidSpeedException extends \Exception
{
	public function __construct($message = 'Invalid speed for particle')
	{
		parent::__construct($message);
	}
}

