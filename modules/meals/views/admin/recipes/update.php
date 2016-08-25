<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\meals\models\Recipes */

$this->title = 'Update Recipes: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ingredients' => $ingredients,
        'ingredients_array' => $ingredients_array
    ]) ?>

</div>
