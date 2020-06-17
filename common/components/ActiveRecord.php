<?php

namespace common\components;

class ActiveRecord extends \yii\db\ActiveRecord
{
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @return array
     */
    public function arrayAttributes()
    {
        return [];
    }

    public function afterFind()
    {
        foreach ($this->arrayAttributes() as $attribute) {
            $value = $this->getAttribute($attribute);
            $this->setAttribute($attribute, json_decode($value, true));
        }
        parent::afterFind();
    }

    public function beforeSave($insert)
    {
        $values = $this->attributes;
        foreach ($values as $attribute => $value) {
            if (is_string($value)) {
                $this->setAttribute($attribute, strip_tags($value,
                    '<a><ol><li><ul><b><em><u><sub><sup><span><table><hr><br>'));
            }
        }
        foreach ($this->arrayAttributes() as $attribute) {
            $value = $this->getAttribute($attribute);
            foreach ($value as &$item) {
                $item = strip_tags($item);
            }
            $this->setAttribute($attribute, json_encode(array_values($value)));
        }
        return parent::beforeSave($insert);
    }
}