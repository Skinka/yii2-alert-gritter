# yii2-gritter

Alert
```
<?php Yii::$app->session->addFlash('success', 'text');?>
<?= AlertGritterWidget::widget() ?>
```

Notify
```
<?php $this->registerJs("gritterAdd('Title', 'Text', '', '', true);"); ?>
```