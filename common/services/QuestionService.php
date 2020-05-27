<?php

namespace common\services;

use common\components\Service;
use common\models\Question;
use yii\mail\MailerInterface;

class QuestionService extends Service
{
    /**
     * @var MailerInterface
     */
    private $mailService;

    /**
     * @param Question $question
     * @return bool
     */
    public function sendQuestion(Question $question)
    {
        $this->save($question);
        return $this->sendEmailToModerator($question);
    }

    /**
     * @param Question $question
     * @return bool
     */
    public function sendEmailToModerator(Question $question)
    {
        $mail = $this->mailService->compose();
        $mail->setFrom(\Yii::$app->params['no-reply']);
        $mail->setTo(\Yii::$app->params['moderator']);
        $mail->setSubject('На сайте библиотеки задали новый вопрос');
        $mail->setTextBody($question->text);
        $mail->setHtmlBody($question->text);

        return $mail->send();
    }

    public function getPublishedQuestions()
    {
        return $this->getFilter()->queryWhere(['published' => true])->queryWhere(['IS NOT', 'answer', null]);
    }

    public function init()
    {
        parent::init();
        $this->mailService = \Yii::$app->mailer;
    }
}