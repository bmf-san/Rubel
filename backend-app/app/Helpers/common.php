<?php

/**
 * Check the date is within a week.
 *
 * @param  string  $date
 * @return boolean
 */
function isDateWithinAWeek($date)
{
    $carbon_post_date = new \Carbon\Carbon($date);

    return $carbon_post_date->gt(\Carbon\Carbon::now()->subWeek());
}
