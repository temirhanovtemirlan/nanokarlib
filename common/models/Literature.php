<?php

namespace common\models;

use common\components\ActiveRecord;
use common\enums\AttachmentsEnum;
use common\enums\LiteratureEnum;
use common\models\literature\Book;
use common\models\literature\Magazine;
use common\models\literature\Newspaper;
use yii\helpers\Url;

/**
 * Class Literature
 * @package common\models
 * @property int $id
 * @property int $type
 * @property string $title
 * @property string $canonical_title
 * @property string $author
 * @property string $description_ru
 * @property string $description_kk
 * @property string $rating
 * @property int $recommended
 * @property int $latest
 * @property string $publish_date
 * @property bool $published
 * @property bool $readable
 * @property bool $downloadable
 * @property string $ts
 */
class Literature extends ActiveRecord
{
    public static function tableName()
    {
        return 'literature';
    }

    public function rules()
    {
        return [
            [['type', 'published', 'readable', 'downloadable', 'recommended', 'latest'], 'integer'],
            [['title', 'canonical_title', 'author', 'description_ru', 'description_kk', 'publish_date', 'rating'], 'string'],
            ['canonical_title', 'unique']
        ];
    }

    public function attributeLabels()
    {
        return [
            'type' => \Yii::t('app', 'Тип'),
            'published' => \Yii::t('app', 'Опубликовано'),
            'readable' => \Yii::t('app', 'Доступно к чтению'),
            'downloadable' => \Yii::t('app', 'Доступно к скачиванию'),
            'title' => \Yii::t('app', 'Название'),
            'canonical_title' => \Yii::t('app', 'Каноническое название'),
            'author' => \Yii::t('app', 'Автор'),
            'description_ru' => \Yii::t('app', 'Описание на русском'),
            'description_kk' => \Yii::t('app', 'Описание на казахском'),
            'publish_date' => \Yii::t('app', 'Дата публикации'),
            'rating' => \Yii::t('app', 'Рейтинг'),
            'recommended' => \Yii::t('app', 'Рекомендуемый'),
            'latest' => \Yii::t('app', 'Новинка')
        ];
    }

    public function getImage()
    {
        return $this->hasOne(Attachment::class, ['relative_id' => 'id'])
            ->onCondition([
                'relative_type' => AttachmentsEnum::RELATION_LITERATURE,
                'type' => AttachmentsEnum::TYPE_IMAGE,
                'published' => true
            ]);
    }

    public function getSource()
    {
        return $this->hasOne(Attachment::class, ['relative_id' => 'id'])
            ->onCondition([
                'relative_type' => AttachmentsEnum::RELATION_LITERATURE,
                'type' => AttachmentsEnum::TYPE_PDF,
                'published' => true
            ]);
    }

    public function getLink()
    {
        switch ($this->type) {
            case LiteratureEnum::TYPE_BOOK:
                return Url::to(['/books/view', 'canonical_title' => $this->canonical_title]);
            case LiteratureEnum::TYPE_NEWSPAPER:
                return Url::to(['/newspapers/view', 'canonical_title' => $this->canonical_title]);
            case LiteratureEnum::TYPE_MAGAZINE:
                return Url::to(['/magazines/view', 'canonical_title' => $this->canonical_title]);
        }
    }

    public function getRecordTemplate()
    {
        switch ($this->type) {
            case LiteratureEnum::TYPE_BOOK:
                return '@common/views/literature/_book';
            case LiteratureEnum::TYPE_NEWSPAPER:
                return '@common/views/literature/_newspaper';
            case LiteratureEnum::TYPE_MAGAZINE:
                return '@common/views/literature/_magazine';
            default:
                return '@common/views/literature/_default';
        }
    }

    public static function instantiate($row)
    {
        $models = [
            LiteratureEnum::TYPE_BOOK => Book::class,
            LiteratureEnum::TYPE_NEWSPAPER => Newspaper::class,
            LiteratureEnum::TYPE_MAGAZINE => Magazine::class
        ];

        return new $models[$row['type']]();
    }

    public function getViews()
    {
        return $this->hasMany(View::class, ['literature_id' => 'id']);
    }

    public function getDownloads()
    {
        return $this->hasMany(Download::class, ['literature_id' => 'id']);
    }
}