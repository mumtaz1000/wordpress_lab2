<?php

namespace WP_Smart_Image_Resize\Image_Filters;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;
use Exception;
use WP_Smart_Image_Resize\Utilities\Env;

class CreateWebP_Filter implements FilterInterface {

    /**
     * The output image full path.
     *
     * @var string $path
     */
    protected $path;

    public function __construct($path) {
        $this->path = $path;
    }

    public function applyFilter(Image $image) {

        if (!wp_sir_get_settings()['enable_webp']) {
            return $image;
        }

        try {
            @unlink($this->path);
            $webp_image = clone $image;
            $webp_image->save($this->path);
            $webp_image->destroy();
        } catch (Exception $e) {
        }

        return $image;
    }
}
