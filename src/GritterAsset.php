<?php

namespace skinka\widgets\gritter;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class GritterAsset
 * @package skinka\widgets\gritter
 */
class GritterAsset extends AssetBundle
{
    public $sourcePath = '@vendor/skinka/yii2-alert-gritter/src/assets';
    public $css = [
        'css/gritter.min.css',
    ];
    public $js = [
        'js/alert.gritter.js',
    ];
    public $jsOptions = [
        'position' => View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'skinka\widgets\gritter\GritterBowerAsset'
    ];
}
