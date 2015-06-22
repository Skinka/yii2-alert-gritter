<?php

namespace skinka\gritter;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class GritterAsset
 * @package skinka\gritter
 */
class GritterAsset extends AssetBundle
{
    public $sourcePath = '@vendor/skinka/gritter';
    public $css = [
        'css/gritter.css',
    ];
    public $js = [
        'js/jquery.gritter.min.js',
    ];
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
