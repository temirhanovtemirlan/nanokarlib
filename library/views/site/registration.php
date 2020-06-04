<?php
$this->title = Yii::t('app', 'Регистрация');
?>
<section class="main-header mb-5">
    <main class="site_content mb-5">
        <section class="book-renewal section_pd">
            <header class="section-head ds-flex-align">
                <h3 class="title"><?= Yii::t('app', 'Регистрация') ?></h3>
            </header>
            <div class="container">
                <form class="renewal-form" method="post" action="/site/registration">
                    <div class="form-content">
                        <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
                        <div class="form-data">
                            <div class="input-wrap">
                                <label class="required"><?= Yii::t('app', 'Логин') ?></label>
                                <input class="input form-input" type="text" name="RegistrationForm[username]">
                            </div>
                            <div class="input-wrap">
                                <label class="required"><?= Yii::t('app', 'Электронная почта') ?></label>
                                <input class="input form-input" type="email" name="RegistrationForm[email]">
                            </div>
                            <div class="input-wrap">
                                <label class="required"><?= Yii::t('app', 'Пароль') ?></label>
                                <input class="input form-input" type="password" name="RegistrationForm[password]">
                            </div>
                        </div>
                        <div class="form-btn justify-content-end">
                            <button class="btn submit" type="submit">
                                <?= Yii::t('app', 'Подтвердить')?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</section>
