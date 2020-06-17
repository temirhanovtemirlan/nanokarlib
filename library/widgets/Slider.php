<?php

namespace library\widgets;

use common\enums\AttachmentsEnum;
use yii\bootstrap4\Widget;

class Slider extends Widget
{
    public function run()
    {
        return $this->render('slider', [
            'dataProvider' => \Yii::$app->attachmentService->getFilter()->search(['relative_type' => AttachmentsEnum::RELATION_SLIDER, 'published' => true])
        ]);
    }
}