<?php

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Электронный архив');
?>
<section class="section_pd">
    <?= $this->render('include/_authorization_block') ?>
    <?= \common\widgets\Slider::widget();?>
    <?= $this->render('include/_books') ?>
    <?= $this->render('include/_newspapers') ?>
    <?= $this->render('include/_magazines') ?>
</section>
