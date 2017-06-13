<?php

/**
 * Get a blog info
 *
 * @param  string $info
 * @return string
 */
if (!function_exists('get_blog_info')) {
    function get_blog_info(String $info)
    {
        $config = App\Models\Config::where('name', $info)->firstOrFail();

        return $config->value;
    }
}

/**
 * Check the date is within a week.
 *
 * @param  string  $date
 * @return boolean
 */
if (!function_exists('is_date_within_a_week')) {
    function is_date_within_a_week(String $date)
    {
        $carbon_post_date = new \Carbon\Carbon($date);

        return $carbon_post_date->gt(\Carbon\Carbon::now()->subWeek());
    }
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
if (!function_exists('mb_str_limit')) {
    function mb_str_limit(String $value, Int $limit, String $end)
    {
        if (mb_strlen($value, 'UTF-8') <= $limit) {
            return $value;
        }
        return rtrim(mb_substr($value, 0, $limit, 'UTF-8')).$end;
    }
}

/**
 * ucfirst() function for multibyte character encodings
 *
 * @param  string $string
 * @param  string $encoding
 *
 * @return string
 */
if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst($string, $encoding)
    {
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);

        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}
