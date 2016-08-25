<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\meals\models\Recipes */

$this->title = 'Create Recipes';
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ingredients' => $ingredients,
        'ingredients_array' => $ingredients_array
    ]) ?>

</div>
