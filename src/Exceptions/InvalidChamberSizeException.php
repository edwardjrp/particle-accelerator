<?php
/**
 * Created by Edward Rodriguez
 * Date: 7/1/16
 * Time: 11:31 PM
 * 
 */

namespace CrowdTwist\ParticleAccelerator\Exceptions;

class InvalidChamberSizeException extends \Exception
{
	public function __construct($message = 'Invalid Chamber size. Values between 1 and 50')
	{
		parent::__construct($message);
	}
}

