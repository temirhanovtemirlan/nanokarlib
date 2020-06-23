<?php

namespace common\services;

use common\components\ActiveRecord;
use common\components\Service;
use common\enums\LiteratureEnum;
use common\models\Download;
use common\models\Literature;
use common\models\literature\Book;
use common\models\literature\Magazine;
use common\models\literature\Newspaper;
use common\models\View;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class LiteratureService extends Service
{
    /**
     * @param $canonical_title
     * @return Book
     * @throws NotFoundHttpException
     */
    public function findBook($canonical_title)
    {
        $book = $this->findByCanonicalTitle($canonical_title)
            ->with(['image', 'source', 'views', 'downloads'])
            ->one();

        if (!$book) {
            throw new NotFoundHttpException(\Yii::t('app', 'Страница не найдена'));
        }

        return $book;
    }

    public function findNewspaper($canonical_title)
    {

    }

    public function findMagazine($canonical_title)
    {

    }

    /**
     * @param $canonical_title
     * @return \yii\db\ActiveQuery
     */
    private function findByCanonicalTitle($canonical_title)
    {
        return Literature::find()
            ->where(['published' => true])
            ->andWhere(['canonical_title' => $canonical_title]);
    }

    public function getBooksProvider()
    {
        $query = Book::find()
            ->where(['published' => true])
            ->andWhere(['type' => LiteratureEnum::TYPE_BOOK])
            ->with(['views', 'downloads'])
            ->limit(10)
            ->orderBy('ts DESC');

        return $this->getLiteratureProvider($query);
    }

    public function getNewspapersProvider()
    {
        $query = Newspaper::find()
            ->where(['published' => true])
            ->andWhere(['type' => LiteratureEnum::TYPE_NEWSPAPER])
            ->with(['views', 'downloads'])
            ->limit(10)
            ->orderBy('ts DESC');

        return $this->getLiteratureProvider($query);
    }

    public function getMagazinesProvider()
    {
        $query = Magazine::find()
            ->where(['published' => true])
            ->andWhere(['type' => LiteratureEnum::TYPE_MAGAZINE])
            ->with(['views', 'downloads'])
            ->limit(10)
            ->orderBy('ts DESC');

        return $this->getLiteratureProvider($query);
    }

    private function getLiteratureProvider($query)
    {
        return new ActiveDataProvider([
            'query' => $query
        ]);
    }

    /**
     * Добавление просмотра в счётчик
     * @param $id
     */
    public function addView($id)
    {
        if (\Yii::$app->user->isGuest) {
            $this->guestView($id);
        } else {
            $this->userView($id);
        }
    }

    /**
     * Добавление загрузки в счётчик
     * @param $id
     */
    public function addDownload($id)
    {
        if (\Yii::$app->user->isGuest) {
            $this->guestDownload($id);
        } else {
            $this->userDownload($id);
        }
    }

    private function guestView($id)
    {
        $view = View::find()
            ->where(['literature_id' => $id])
            ->andWhere(['user_id' => 0])
            ->andWhere(['session_id' => \Yii::$app->session->id])
            ->one();

        if ($view) {
            $expired = $this->isExpired($view);
        }

        if (!$view || (isset($expired) && $expired)) {
            $this->createView(0, $id);
        }
    }

    private function userView($id)
    {
        $view = View::find()
            ->where(['literature_id' => $id])
            ->andWhere(['user_id' => \Yii::$app->user->id])
            ->one();

        if ($view) {
            $expired = $this->isExpired($view);
        }

        if (!$view || (isset($expired) && $expired)) {
            $this->createView(\Yii::$app->user->id, $id);
        }
    }

    /**
     * Проверка, если просмотру больше месяца
     * @param ActiveRecord $model
     * @return bool
     */
    private function isExpired($model)
    {
        return (time() - strtotime($model->ts) > 30 * 24 * 60 * 60);
    }

    private function createView($user_id, $literature_id)
    {
        $view = new View();
        $view->user_id = $user_id;
        $view->literature_id = $literature_id;
        $view->session_id = \Yii::$app->session->id;
        if (!$view->save()) {
            var_dump($view->getErrors());die();
        }
    }

    private function createDownload($user_id, $literature_id)
    {
        $download = new Download();
        $download->user_id = $user_id;
        $download->literature_id = $literature_id;
        $download->session_id = \Yii::$app->session->id;
        if (!$download->save()) {
            var_dump($download->getErrors());die();
        }
    }

    private function guestDownload($id)
    {
        $download = Download::find()
            ->where(['literature_id' => $id])
            ->andWhere(['user_id' => 0])
            ->andWhere(['session_id' => \Yii::$app->session->id])
            ->one();

        if ($download) {
            $expired = $this->isExpired($download);
        }

        if (!$download || (isset($expired) && $expired)) {
            $this->createView(0, $id);
        }
    }

    private function userDownload($id)
    {
        $download = Download::find()
            ->where(['literature_id' => $id])
            ->andWhere(['user_id' => \Yii::$app->user->id])
            ->one();

        if ($download) {
            $expired = $this->isExpired($download);
        }

        if (!$download || (isset($expired) && $expired)) {
            $this->createView(\Yii::$app->user->id, $id);
        }
    }

    public function getProviderBySearch($search)
    {
        $query = Literature::find()
            ->where(['published' => true])
            ->andFilterWhere(['ilike', 'title', $search])
            ->orFilterWhere(['ilike', 'description', $search])
            ->with(['image', 'source', 'views', 'downloads']);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20
            ]
        ]);
    }
}