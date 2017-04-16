<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/4/4
 * Time: 下午12:55
 */
echo "12345678";
$a="";
var_dump(empty($a));

$amount = 500000;
$personNumber = 600;
$min = 10;
$max = 1000;
$restMax = $max - $min;
$restAmount = $amount- $personNumber*$min;
$firstArrangeRedPackageArray = [];

for($i=0; $i<$personNumber; $i++){
    $rand = mt_rand(0, $restMax);
    $restAmount = $restAmount - $rand;
    if($restAmount<=0){
        $firstArrangeRedPackageArray[] = 0;
    } else {
        $firstArrangeRedPackageArray[] = $rand;
    }
}
if($restAmount>0)
{
    rearrangeRestAmount($firstArrangeRedPackageArray, $restAmount, $max);
}
//var_export($firstArrangeRedPackageArray);
shuffle($firstArrangeRedPackageArray);
function rearrangeRestAmount(&$redPackageArray, $restAmount, $max = 1000)
{
    sort($redPackageArray);
    //从最小的金额开始到最大的金额，依次给用户填充到max=1000
    foreach ($redPackageArray as $k=>&$redPackage)
    {
        if($restAmount >= $max - $redPackage)
        {
            $restAmount = $restAmount - ($max - $redPackage);
            $redPackage = $max;
        } else {
            $redPackage = $redPackage + $restAmount;
        }
    }
}