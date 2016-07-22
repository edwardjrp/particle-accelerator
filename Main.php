<?php
/**
 * Created by Edward Rodriguez
 * Date: 7/2/16
 * Time: 12:18 AM
 * 
 */

require_once __DIR__.'/vendor/autoload.php';

use CrowdTwist\ParticleAccelerator\Animation;

//$animation = new Animation(2, '..R....');
//$animation = new Animation(3, 'RR..LRL');
//$animation = new Animation(2, 'LRLR.LRLR');
//$animation = new Animation(10, 'RLRLRLRLRL');
//$animation = new Animation(10, 'RLRLRLRLRL');
//$animation = new Animation(1, '...');
$animation = new Animation(1, 'LRRL.LR.LRR.R.LRRL.');
$result = $animation->animate();
echo $result;