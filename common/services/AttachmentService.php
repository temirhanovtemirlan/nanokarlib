<?php

namespace common\services;

use common\components\Service;
use common\enums\AttachmentsEnum;

class AttachmentService extends Service
{
    /**
     * @param $id
     * @return bool
     * @throws \yii\web\NotFoundHttpException
     */
    public function publishAttachment($id)
    {
        $attachment = $this->findOne($id);
        $attachment->published = 1;

        return $attachment->save();
    }

    public function unpublishAttachment($id)
    {
        $attachment = $this->findOne($id);
        $attachment->published = 0;

        return $attachment->save();
    }

    public function getPublicationAttachments($id)
    {
        return $this->getFilter()->queryWhere(['relative_id' => $id])->queryWhere(['relative_type' => AttachmentsEnum::RELATION_PUBLICATION]);
    }

    public function getAuthBlockBackground()
    {
        $background = $this->find()->where(['relative_type' => AttachmentsEnum::RELATION_AUTH_BLOCK_BACKGROUND])->andWhere(['published' => true])->one();
        if ($background) {
            return $background->source;
        }

        return '';
    }

    public function getSmartSpacesMap()
    {
        $map = $this->find()->where(['relative_type' => AttachmentsEnum::RELATION_SMART_SPACES_MAP])->andWhere(['published' => true])->one();
        if ($map) {
            return $map->source;
        }

        return '/images/plan.png';
    }

    public function getLibraryLogo()
    {
        $logo = $this->find()->where(['relative_type' => AttachmentsEnum::RELATION_LIBRARY_LOGO])->andWhere(['published' => true])->one();
        if ($logo) {
            return $logo->source;
        }

        return '/images/logo.png';
    }
}