<?php

/**
 * Get a blog info
 *
 * @param  string $info
 * @return string
 */
function getBlogInfo(String $info)
{
    $config = App\Models\Config::where('name', $info)->firstOrFail();

    return $config->value;
}

/**
 * Check the date is within a week.
 *
 * @param  string  $date
 * @return boolean
 */
function isDateWithinAWeek(String $date)
{
    $carbon_post_date = new \Carbon\Carbon($date);

    return $carbon_post_date->gt(\Carbon\Carbon::now()->subWeek());
}

/**
 * Get the length of string
 *
 * @param  string  $value
 * @param  int $limit
 * @param  string  $end
 *
 * @return string
 */
function mb_str_limit(String $value, Int $limit, String $end)
{
    if (mb_strlen($value, 'UTF-8') <= $limit) {
        return $value;
    }
    return rtrim(mb_substr($value, 0, $limit, 'UTF-8')).$end;
}
