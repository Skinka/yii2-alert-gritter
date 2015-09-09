# yii2-gritter

Alert
```
<?php use skinka\widgets\gritter\AlertGritterWidget; ?>
<?php Yii::$app->session->addFlash('success', 'text');?>
<?= AlertGritterWidget::widget() ?>
```

Notify
```
<?php use skinka\widgets\gritter\GritterAsset; ?>
<?php $this->->registerAssetBundle(GritterAsset::className())
<?php $this->registerJs("gritterAdd('Title', 'Text', '', '', true);"); ?>
```

Params on Alert
```php
    $gritterTypes = [ // css style
        'error' => 'gritter-danger',
        'danger' => 'gritter-danger',
        'success' => 'gritter-success',
        'info' => 'gritter-info',
        'warning' => 'gritter-warning'
    ];

    $gritterIcons = [ // pretty icons
        'error' => 'fa fa-times',
        'danger' => 'fa fa-times',
        'success' => 'fa fa-check',
        'info' => 'fa fa-info',
        'warning' => 'fa fa-exclamation-triangle'
    ];

    $title = [ //title notification
        'error' => 'Error',
        'danger' => 'Danger',
        'success' => 'Success',
        'info' => 'Info',
        'warning' => 'Warning',
    ];


    $enableIcon = true; // enable  pretty icon
    $gritterOptions = [ //plugins options
    
        // (bool | optional) if you want it to fade out on its own or just sit there
        'sticky' =>  true,
        
        // (int | optional) the time you want it to be alive for before fading out
        'time' => '',
        
         // possibilities: POS_BL, POS_BR, POS_TL, POS_TR
        'position' => AlertGritterWidget::POS_BL,
        
        // how fast notifications fade in (string or int)
        'fade_in_speed' => 100, 
        
        // how fast the notices fade out
        'fade_out_speed' => 100, 
        
        // (function | optional) function called before it opens
        'before_open' => new JsExpression('function(){}'),
        
        // (function | optional) function called after it opens
        'after_open' => new JsExpression('function(e){}'),
        
        // (function | optional) function called before it closes
        'before_close' => new JsExpression('function(e, manual_close){}'),
        
        // (function | optional) function called after it closes
        'after_close' => new JsExpression('function(e, manual_close){}'),
    ];
```