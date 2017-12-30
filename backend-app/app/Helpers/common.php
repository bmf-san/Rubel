<?php
use Carbon\Carbon;
use Rubel\Models\Config;

/**
 * Get the blog info
 *
 * @param  string $info
 * @return string
 */
if (!function_exists('get_the_blog_info')) {
    function get_the_blog_info(String $info)
    {
        $config = Config::where('name', $info)->firstOrFail();

        return $config->value;
    }
}

/**
 * Get the google adsense ad code.
 *
 * @param string $googleAdName
 * @param string $googleDataAdClient
 * @param string $googleDataAdSlot
 * @return string
 */
if (!function_exists('get_the_google_adsense_ad_code')) {
    function get_the_google_adsense_ad_code($googleAdName, $googleDataAdClient, $googleDataAdSlot)
    {
        return <<<EOT
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- {$googleAdName} -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client={$googleDataAdClient}
             data-ad-slot={$googleDataAdSlot}
             data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
EOT;
    }
}

/**
 * Get the google analytics code.
 *
 * @param string $googleAdName
 * @param string $googleDataAdClient
 * @param string $googleDataAdSlot
 * @return string
 */
if (!function_exists('get_the_google_analytics_code')) {
    function get_the_google_analytics_code($trackingId)
    {
        return <<<EOT
        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={$trackingId}"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', '{$trackingId}');
        </script>
EOT;
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
        $carbon_post_date = new Carbon($date);

        return $carbon_post_date->gt(Carbon::now()->subWeek());
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

/**
 * Whether request from mobile
 *
 * @var boolean
 */
if (!function_exists('isMobile')) {
    function isMobile()
    {
        $ua = request()->server('HTTP_USER_AGENT');
        $uaList = ['iPhone','iPad','iPod','Android'];
        foreach ($uaList as $uaSmt) {
            if (strpos($ua, $uaSmt) !== false) {
                return true;
            }
        }
        return false;
    }
}
