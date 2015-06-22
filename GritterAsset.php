<?php

namespace skinka\gritter;

class GritterAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/skinka/gritter';
    public $css = [
        'css/gritter.css',
    ];
    public $js = [
        'js/jquery.gritter.min.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
