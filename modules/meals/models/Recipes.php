<?php

namespace app\modules\meals\models;

use Yii;

/**
 * This is the model class for table "recipes".
 *
 * @property string $ingridients_id
 * @property string $name
 * @property string $id
 */
class Recipes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recipes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ingridients_id', 'name'], 'required'],
            // [['ingridients_id'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ingridients_id' => 'Ingridients ID',
            'name' => 'Name',
            'id' => 'ID',
        ];
    }

    public function setData($data)
    {
        $this->name = $data['Recipes']['name'];
        $this->ingridients_id = implode(',', $data['Recipes']['ingridients_id']);
        if ($this->save()) {
            return true;
        } else {
            return false;
        }
    }
}
