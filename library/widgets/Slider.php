<?php

namespace library\widgets;

use common\enums\AttachmentsEnum;
use common\services\AttachmentService;
use yii\bootstrap4\Widget;

class Slider extends Widget
{
    /**
     * @var AttachmentService
     */
    private $attachmentService;

    public function run()
    {
        return $this->render('slider', [
            'dataProvider' => $this->attachmentService->getFilter()->search(['relative_type' => AttachmentsEnum::RELATION_SLIDER, 'published' => true])
        ]);
    }

    public function init()
    {
        parent::init();
        $this->attachmentService = \Yii::$app->attachmentService;
    }
}