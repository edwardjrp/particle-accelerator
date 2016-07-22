<?php
/**
 * Created by Edward Rodriguez
 * Date: 7/1/16
 * Time: 11:18 PM
 * 
 */

namespace CrowdTwist\ParticleAccelerator\Contracts;

interface AnimationInterface 
{
	public function animate();

	public function validChamber();

	public function validSpeed();

	public function chamberSize();

	public function chamberStart();

	public function chamberEnd();
}

