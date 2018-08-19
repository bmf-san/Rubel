<?php
/**
 * Get the view path
 *
 * @param  string $path
 * @return string
 */
if (!function_exists('get_the_view_path')) {
    function get_the_view_path(String $path)
    {
        return config('rubel.theme.view') . '::' . $path;
    }
}
