<section class="book-renewal section_pd">
    <header class="section-head ds-flex-align">
        <h3 class="title"><?= Yii::t('app', 'Продление сроков чтения книг') ?></h3>
    </header>
    <div class="container">
        <form class="renewal-form" action="/site/send-renewal-application" method="post">
            <div class="form-content">
                <?php if (Yii::$app->user->isGuest): ?>
                    <p><a href="<?= \yii\helpers\Url::to(['/site/auth']) ?>"><?= Yii::t('app', 'Авторизуйтесь, чтобы отправить заявку') ?></a></p>
                <?php endif; ?>
                <div class="form-data">
                    <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
                    <div class="input-wrap">
                        <label class="required"><?= Yii::t('app', 'ФИО') ?></label>
                        <input <?= Yii::$app->user->isGuest ? 'disabled' : '' ?> class="input form-input" type="text" name="RenewalApplication[full_name]">
                    </div>
                    <div class="input-wrap">
                        <label class="required"><?= Yii::t('app', 'Номер карточки') ?></label>
                        <input <?= Yii::$app->user->isGuest ? 'disabled' : '' ?> class="input form-input" type="text" name="RenewalApplication[card_number]">
                    </div>
                    <div class="input-wrap">
                        <label class="required"><?= Yii::t('app', 'Название книги') ?></label>
                        <input <?= Yii::$app->user->isGuest ? 'disabled' : '' ?> class="input form-input" type="text" name="RenewalApplication[book_name]">
                    </div>
                    <div class="input-wrap">
                        <label class="required"><?= Yii::t('app', 'Электронная почта') ?></label>
                        <input <?= Yii::$app->user->isGuest ? 'disabled' : '' ?> class="input form-input" type="email" name="RenewalApplication[email]">
                    </div>
                </div>
                <div class="form-btn justify-content-end">
                    <button <?= Yii::$app->user->isGuest ? 'disabled' : '' ?> class="btn submit" type="submit">
                        <?= Yii::t('app', 'Отправить')?>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
