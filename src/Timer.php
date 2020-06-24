<?php

namespace Live\Collection;

/**
 * Timer
 * 
 * @package Live\Collection
 */
class Timer
{
    public function Date(int $day=0, int $month=0, int $year=0, int $hour=0, int $minute=0, int $second=0)
    {
        $tempo= date("Y-m-d H:i:s");
        return date("U",strtotime($tempo."+$day day +$month month + $year year +$hour hour +$minute minute +1$second second"))."</div>";

    }
}
