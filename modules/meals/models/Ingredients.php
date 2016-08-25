<?php

namespace app\modules\meals\models;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ingredients".
 *
 * @property string $ID
 * @property string $ingredient_name
 *
 * @property Recipes[] $recipes
 */
class Ingredients extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ingredient_name'], 'string', 'max' => 255],
            [['ingredient_name'], 'unique'],
            [['ingredient_name'], 'trim'],
            ['hide', 'in', 'range' => [0, 1]]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ingredient_name' => 'Ingredient Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipes::className(), ['ingridient_id' => 'ID']);
    }

    public function selectAll()
    {
        $result = SELF::find()->asArray()->all();
        return $result = ArrayHelper::map($result, 'ID', 'ingredient_name');
    }
}
