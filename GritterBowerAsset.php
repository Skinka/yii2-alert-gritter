<?php

namespace skinka\widgets\gritter;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class GritterBowerAsset
 * @package skinka\widgets\gritter
 */
class GritterBowerAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery.gritter';
    public $css = [
        'css/jquery.gritter.css',
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
