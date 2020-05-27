<?php

namespace common\services;

use common\components\Service;

class FeedbackService extends Service
{
    /**
     * Опубликовать отзыв на главной странице
     * @param $id
     * @return bool
     * @throws \yii\web\NotFoundHttpException
     */
    public function publishOnMainPage($id)
    {
        $model = $this->findOne($id);
        $model->published = true;
        return $model->save(false);
    }

    /**
     * Снять отзыв с публикации на главной странице
     * @param $id
     * @return bool
     * @throws \yii\web\NotFoundHttpException
     */
    public function unpublishFromMainPage($id)
    {
        $model = $this->findOne($id);
        $model->published = false;
        return $model->save(false);
    }

    /**
     * Отзывы опубликованные на главной странице
     * @return \common\filters\FeedbackFilter|mixed
     */
    public function getPublishedRecords()
    {
        return $this->getFilter()->search(['published' => true]);
    }
}