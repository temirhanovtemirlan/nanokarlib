<?php
/* @var $totalUsers string */
/* @var $librarySpace string */
/* @var $libraryFond string */
/* @var $background string */
?>
<div class="leading">
    <div class="leading-wrap">
        <div class="leading-row row">
            <div class="col-leading"><img alt="#" src="/images/leading/leading_1.png">
                <p class="leading-text">
                    <span>
                        <?= $libraryFond ?>
                    </span>
                    <?= Yii::t('app', 'Фонд библиотеки') ?>
                </p>
            </div>
            <div class="col-leading"><img alt="#" src="/images/leading/leading_2.png">
                <p class="leading-text"><span>+66666</span> READERS</p>
            </div>
            <div class="col-leading"><img alt="#" src="/images/leading/leading_3.png">
                <p class="leading-text"><span>2500</span> м</p>
            </div>
        </div>
        <div class="form-btn justify-content-center"><a class="btn leading-link" href="#">Get started</a></div>
    </div>
</div>