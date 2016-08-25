<?php

namespace app\modules\meals\controllers\user;

use Yii;
use app\modules\meals\models\Ingredients;
use app\modules\meals\models\Recipes;
// use app\modules\meals\models\RecipesSearch;

class FindController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            # code...
        }
        $ingredients = new Ingredients();
        $ingredients_array = $ingredients->selectAll();

        $recipes = new Recipes();

        return $this->render('index', [
            'ingredients' => $ingredients_array,
            'recipes' => $recipes
            ]);
    }

}
