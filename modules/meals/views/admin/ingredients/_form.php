<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\meals\models\Ingredients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ingredients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ingredient_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'hide')->dropdownList([0 => "Видимый", 1 => 'Скрыт']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
