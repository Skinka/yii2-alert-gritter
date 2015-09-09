<?php
/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * Create message:
 *
 *     <?php \Yii::$app->getSession()->setFlash('error', 'This is the message'); ?>
 *     <?php \Yii::$app->getSession()->setFlash('success', 'This is the message'); ?>
 *     <?php \Yii::$app->getSession()->setFlash('info', 'This is the message'); ?>
 *
 * Show flashes message:
 *
 *     <?= skinka\widgets\gritter\AlertGritterWidget::widget() ?>
 */

namespace skinka\widgets\gritter;

use Yii;
use \yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Html;

/**
 * Class AlertGritterWidget
 * @package skinka\widgets\gritter
 */
class AlertGritterWidget extends Widget
{

    /**
     * Position message on the screen from the bottom to the left
     */
    const POS_BL = 'bottom-left';

    /**
     * Position message on the screen from the bottom to the right
     */
    const POS_BR = 'bottom-right';

    /**
     * Position message on the screen from the top to the left
     */
    const POS_TL = 'top-left';

    /**
     * Position message on the screen from the top to the right
     */
    const POS_TR = 'top-right';

    /**
     * Options type flashes
     * 'error' => [
     *     'type' => 'gritter-danger',
     *     'icon' => 'fa fa-times',
     *     'title' => 'Error',
     * ]
     *
     * @var array
     */
    public $options = [];

    /**
     * Enabled show icon in message
     *
     * @var bool
     */
    public $enableIcon = true;

    /**
     * Options for Jquery Gritter plugin
     *
     * @var array
     */
    public $gritterOptions = [];

    /**
     * Default options type flashes
     *
     * @var array
     */
    private $_options = [
        'error' => [
            'class' => 'gritter-danger',
            'icon' => 'fa fa-times',
            'title' => 'Error',
        ],
        'danger' => [
            'class' => 'gritter-danger',
            'icon' => 'fa fa-times',
            'title' => 'Danger',
        ],
        'success' => [
            'class' => 'gritter-success',
            'icon' => 'fa fa-check',
            'title' => 'Success',
        ],
        'info' => [
            'class' => 'gritter-info',
            'icon' => 'fa fa-info',
            'title' => 'Info',
        ],
        'warning' => [
            'class' => 'gritter-warning',
            'icon' => 'fa fa-exclamation-triangle',
            'title' => 'Warning',
        ],

    ];

    /**
     * Initialization Widgets
     */
    public function init()
    {
        parent::init();

        $this->options = ArrayHelper::merge($this->_options, $this->options);

        $this->view->registerAssetBundle(GritterAsset::className());
        $session = Yii::$app->getSession();
        $this->showFlashes($session);
    }

    /**
     * Generate flashes message
     *
     * @param \yii\web\Session $session
     */
    protected function showFlashes($session)
    {
        $flashes = $session->getAllFlashes();
        foreach ($flashes as $type => $data) {
            $option = $this->getOption($type);
            if ($option) {
                $data = (array)$data;
                foreach ($data as $i => $message) {
                    $title = $option['title'];
                    $class = $option['class'];
                    if ($this->enableIcon) {
                        $title = Html::tag('i', '', ['class' => $option['icon']]) . $title;
                        $class .= ' gritter-icon';
                    }
                    $this->registerJS($title, $message, $class, '', $this->gritterOptions);
                }
                $session->removeFlash($type);
            }
        }
    }

    /**
     * Get type option
     *
     * @param string $type
     * @return array|bool
     */
    protected function getOption($type)
    {
        return isset($this->options[$type]) ? $this->options[$type] : false;
    }

    /**
     * Init JavaScript plugin
     *
     * @param string $title
     * @param string $text
     * @param string $class_name
     * @param string $image
     * @param array $options
     */
    protected function registerJS($title, $text, $class_name, $image = '', $options = [])
    {
        $this->view->registerJs("gritterAdd('$title', '$text', '$class_name', '$image', " . Json::encode($options) . ");");
    }
}
