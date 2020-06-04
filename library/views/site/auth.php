<?php

$this->title = Yii::t('app', 'Авторизация');
?>
<section class="main-header mb-5">
    <main class="site_content mb-5">
        <section class="book-renewal section_pd">
            <header class="section-head ds-flex-align">
                <h3 class="title"><?= Yii::t('app', 'Авторизация') ?></h3>
            </header>
            <div class="container">
                <form class="renewal-form" method="post" action="/site/auth">
                    <div class="form-content">
                        <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
                        <div class="form-data">
                            <div class="input-wrap">
                                <label class="required"><?= Yii::t('app', 'Логин') ?></label>
                                <input class="input form-input" type="text" name="LoginForm[username]">
                            </div>
                            <div class="input-wrap">
                                <label class="required"><?= Yii::t('app', 'Пароль') ?></label>
                                <input class="input form-input" type="password" name="LoginForm[password]">
                            </div>
                        </div>
                        <div class="form-btn justify-content-end">
                            <button class="btn submit" type="submit">
                                <?= Yii::t('app', 'Войти')?>
                            </button>
                            <a class="btn submit" href="<?= \yii\helpers\Url::to(['/site/registration']) ?>">
                                <?= Yii::t('app', 'Регистрация') ?>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</section>
