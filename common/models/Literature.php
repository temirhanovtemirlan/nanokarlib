<?php

namespace common\models;

use common\components\ActiveRecord;
use common\enums\AttachmentsEnum;
use common\enums\LiteratureEnum;

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
            [['type', 'published', 'readable', 'downloadable'], 'integer'],
            [['image', 'title', 'canonical_title', 'author', 'description_ru', 'description_kk', 'source', 'publish_date'], 'string'],
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
        ];
    }

    public function getImage()
    {
        return $this->hasOne(Attachment::class, ['relative_id' => 'id'])
            ->onCondition([
                'relative_type' => AttachmentsEnum::RELATION_LITERATURE,
                'type' => AttachmentsEnum::TYPE_IMAGE,
                'published' => true]
            );
    }

    public function getSource()
    {
        return $this->hasOne(Attachment::class, ['relative_id' => 'id'])
            ->onCondition(['relative_type' => AttachmentsEnum::RELATION_LITERATURE,
                'type' => AttachmentsEnum::TYPE_PDF,
                    'published' => true]
            );
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
}