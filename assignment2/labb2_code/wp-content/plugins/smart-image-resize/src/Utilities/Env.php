<?php

namespace WP_Smart_Image_Resize\Utilities;

use Imagick;

class Env {

    /**
     * Check whether Imagick is available.
     * 
     * @return bool
     */
    public static function imagick_loaded() {
        return extension_loaded('imagick') && class_exists(Imagick::class);
    }

    /**
     * Check whether GD is available
     * 
     * @return bool
     */
    public static function gd_loaded() {
        return extension_loaded('gd') && function_exists('gd_info');
    }

    /**
     * Check whether Imagick extension is available and supports WebP.
     * 
     * @return bool
     */
    public static function imagick_supports_webp() {
        return self::imagick_loaded() && Imagick::queryFormats('WEBP');
    }

    /**
     * Check whether GD extension is available and supports WebP.
     * 
     * @return bool
     */

    public static function gd_supports_webp() {
        return function_exists('imagewebp');
    }

    /**
     * Determine which available image processor to use depending on user settings.
     * 
     * @return string
     */
    public static function active_image_processor($filtered = true) {
        $default = Env::imagick_loaded() ? 'imagick' : 'gd';


        if (!$filtered) {
            return $default;
        }

        $filtered = apply_filters('wp_sir_driver', $default);

        if (in_array(strtolower($filtered), ['imagick', 'gd'], true)) {
            return $filtered;
        }

        return $default;
    }

    /**
     * Get the installed Imagick version.
     * 
     * @return string
     */
    public function getImagickVersion() {
        if (!class_exists('\Imagick')) {
            throw new \RuntimeException('Imagick not installed');
        }

        $version = \Imagick::getVersion();
        preg_match('/ImageMagick ([0-9]+\.[0-9]+\.[0-9]+)/', $version['versionString'], $version);
        return $version[1];
    }

    /**
     * Get the available processor that supports WebP images or false otherwise.
     * 
     * @return string|bool
     */
    public static function get_webp_image_processor() {

        if (static::imagick_loaded() && static::imagick_supports_webp()) {
            return 'imagick';
        }

        if (static::gd_loaded() && static::gd_supports_webp()) {
            return 'gd';
        }

        return false;
    }

    /**
     * Check whether the browser supports WebP images.
     * 
     * @return bool
     */
    public static function browser_supposts_webp() {
        return (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false)
            || isset($_COOKIE['_http_accept:image/webp']);
    }


}
