<?php
/* @var $source string */

$this->title = Yii::t('app', 'Чтение литературы');
?>

<section class="main-content">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= $this->title ?></h3>
    </header>
    <div class="container content">
        <div class="sample-container">
            <div class="flip-book-container" src="<?= $source ?>"></div>
        </div>
    </div>
</section>