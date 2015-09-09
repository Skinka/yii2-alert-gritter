#yii2-alert-gritter
jQuery plugin a small notifications

#Install
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skinka/yii2-alert-gritter
```

or add

```
"skinka/yii2-alert-gritter": ">=1.0"
```

to the require section of your `composer.json` file.

#Used
##Widget
Alert widget renders a message from session flash. All flash messages are displayed
in the sequence they were assigned using setFlash. You can set message as following:

Create message:
```php
\Yii::$app->getSession()->setFlash('error', 'This is the message');
\Yii::$app->getSession()->setFlash('success', 'This is the message');
\Yii::$app->getSession()->setFlash('info', 'This is the message');
```
Show message:
```php
<?= skinka\widgets\gritter\AlertGritterWidget::widget() ?>
```
Widget options:

The alert types configuration for the flash messages.
This array is setup as $key => $value, where:
- $key is the name of the session flash variable
- $value is the bootstrap alert type (i.e. error, danger, success, info, warning)
```php
'gritterTypes' => [
    'error' => 'gritter-danger',
    'danger' => 'gritter-danger',
    'success' => 'gritter-success',
    'info' => 'gritter-info',
    'warning' => 'gritter-warning'
];
```

Enabled icons for alert message
```php
'enableIcon' => true;
```

The alert icons for the flash messages.
This array is setup as $key => $value, where:
- $key is the name of the session flash variable
- $value is the css classes alert type (i.e. error, danger, success, info, warning)
```php
'gritterIcons' => [
    'error' => 'fa fa-times',
    'danger' => 'fa fa-times',
    'success' => 'fa fa-check',
    'info' => 'fa fa-info',
    'warning' => 'fa fa-exclamation-triangle'
];
```

The alert title for the flash messages.
This array is setup as $key => $value, where:
- $key is the name of the session flash variable
- $value is the text title alert type (i.e. error, danger, success, info, warning)
```php
'title' => [
    'error' => 'Error',
    'danger' => 'Danger',
    'success' => 'Success',
    'info' => 'Info',
    'warning' => 'Warning',
];
```

Options for Jquery Gritter plugin
```php
'gritterOptions' => [
    // (bool | optional) if you want it to fade out on its own or just sit there
    'sticky' =>  true,
    
    // (int | optional) the time you want it to be alive for before fading out
    'time' => '',
    
     // possibilities: POS_BL, POS_BR, POS_TL, POS_TR
    'position' => skinka\widgets\gritter\AlertGritterWidget::POS_BL,
    
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

##JavaScript notify

Show message:
```php
<?php $this->registerAssetBundle(skinka\widgets\gritter\GritterAsset::className())
<?php $this->registerJs("gritterAdd('Title', 'Text', '', '', true);"); ?>
```

Params of function:
```js
gritterAdd(title, text, class_name, image, sticky, options);
```
where

- title = title notify text;
- text = message notify text;
- class_name = block notify css class;
- image = url image in block notify;
- sticky = boolean, sticky clock;
- options = {

    *(int | optional) the time you want it to be alive for before fading out*
    
    time: '',
    
    *possibilities: bottom-left, bottom-right, top-left, top-right*
    
    position: 'bottom-left',
    
    *how fast notifications fade in (string or int)*
    
    fade_in_speed: 100, 
    
    *how fast the notices fade out*
    
    fade_out_speed: 100, 
    
    *(function | optional) function called before it opens*
    
    before_open: function(){},
    
    *(function | optional) function called after it opens*
    
    after_open: function(e){},
    
    *(function | optional) function called before it closes*
    
    before_close: function(e, manual_close){},
    
    *(function | optional) function called after it closes*
    
    after_close: function(e, manual_close){},
    
}
