<?php

echo nbMonths(2000, 8000, 1000, 1.5);


function nbMonths($startPriceOld, $startPriceNew, $savingPerMonth, $percentLossByMonth) {
    // your code
    $savingTotal = 0;
    $months = 0;

    while (($savingTotal + $startPriceOld) <= $startPriceNew) {
			$months++;
      $savingTotal += $savingPerMonth;
      if ($months % 2 == 0 ) {
         $percentLossByMonth += 0.5;
      }
        $startPriceOld *= ((100 - $percentLossByMonth) / 100);
        $startPriceNew *= ((100 - $percentLossByMonth) / 100);


    }

    //return  array($months, round(($savingTotal + $startPriceOld) - $startPriceNew));
    echo $startPriceNew.'<br />'.$startPriceOld.'<br />'.$percentLossByMonth.'<br />'.$months.'<br />';
		echo round(($savingTotal + $startPriceOld) - $startPriceNew);
}
 ?>
