<?php

namespace app\modules\meals\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\meals\models\Recipes;
use app\modules\meals\models\Ingredients;

/**
 * RecipesSearch represents the model behind the search form about `app\modules\meals\models\Recipes`.
 */
class RecipesSearch extends Recipes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ingridients_id', 'name'], 'safe'],
            [['id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $hidden_ingredients = Ingredients::find()
            ->select(['id'])
            ->asArray()
            ->where(['hide' => 1])
            ->all();
        $query = Recipes::find();
        foreach ($hidden_ingredients as $hidden_ingredient) {
            $query->andWhere(['not like', 'ingridients_id', $hidden_ingredient['id']]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'ingridients_id', $this->ingridients_id])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
