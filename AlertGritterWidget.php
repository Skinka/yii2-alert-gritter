<?php

namespace skinka\widgets\gritter;

use Yii;
use \yii\bootstrap\Widget;
use yii\helpers\Json;
use yii\helpers\Html;

/**
 * Class AlertGritterWidget
 * @package skinka\widgets\gritter
 */
class AlertGritterWidget extends Widget
{

    public $gritterTypes = [
        'error' => 'gritter-danger',
        'danger' => 'gritter-danger',
        'success' => 'gritter-success',
        'info' => 'gritter-info',
        'warning' => 'gritter-warning'
    ];

    public $gritterIcons = [
        'error' => 'fa fa-times',
        'danger' => 'fa fa-times',
        'success' => 'fa fa-check',
        'info' => 'fa fa-info',
        'warning' => 'fa fa-exclamation-triangle'
    ];

    public $title = [
        'error' => 'Error',
        'danger' => 'Danger',
        'success' => 'Success',
        'info' => 'Info',
        'warning' => 'Warning',
    ];

    public $text = '';
    public $enableIcon = true;
    public $gritterOptions = [];

    public function init()
    {
        parent::init();

        $this->view->registerAssetBundle(GritterAsset::className());
        $session = Yii::$app->getSession();
        $flashes = $session->getAllFlashes();

        foreach ($flashes as $type => $data) {
            if (isset($this->gritterTypes[$type])) {
                $data = (array)$data;
                foreach ($data as $i => $message) {
                    $title = $this->title[$type];
                    if ($this->enableIcon) {
                        $title = Html::tag('i', '', ['class' => $this->gritterIcons[$type]]) . $title;
                    }
                    $this->registerJS($title, $message, $this->gritterTypes[$type] . ' gritter-icon', '', false, $this->gritterOptions);
                }
                $session->removeFlash($type);
            }
        }
    }

    public function registerJS($title, $text, $class_name, $image = '', $sticky = false, $options = [])
    {
        $this->view->registerJs("gritterAdd('$title', '$text', '$class_name', '$image', " . ($sticky ? 'true' : 'false') . ", " . Json::encode($options) . ");");
    }
}
