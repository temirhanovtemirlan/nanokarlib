<?php

namespace common\services;

use common\components\Service;
use common\models\RenewalApplication;
use yii\mail\MailerInterface;

class RenewalApplicationService extends Service
{
    /**
     * @var MailerInterface
     */
    private $mailerService;

    /**
     * @param RenewalApplication $model
     * @return bool
     */
    public function sendRenewalApplication(RenewalApplication $model)
    {
        if ($model->validate()) {
            return $model->save();
        }

        return false;
    }

    /**
     * @param RenewalApplication $model
     * @return bool
     */
    private function sendEmailToModerator(RenewalApplication $model)
    {
        $mail = $this->mailerService->compose();
        $mail->setFrom(\Yii::$app->params['adminEmail']);
        $mail->setTo(\Yii::$app->params['moderator']);
        $text = "Новая заявка на продление сроков чтения книг. \n
        От: $model->full_name \n
        Номер билета: $model->card_number \n
        Название книги: $model->book_name \n
        Email: $model->email \n
        ";
        $mail->setTextBody($text);
        $mail->setHtmlBody($text);
        return $mail->send();
    }

    public function init()
    {
        parent::init();
        $this->mailerService = \Yii::$app->mailer;
    }
}