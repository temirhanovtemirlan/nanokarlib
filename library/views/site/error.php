<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">
    <main class="site_content">
        <section class="section_pd">
            <header class="section-head ds-flex-align">
                <h3 class="title"><?= $name ?></h3>
            </header>

            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>
        </section>
    </main>
</div>
