<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $recipes app\modules\meals\models\Recipes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($recipes, 'ingridients_id')
             ->dropDownList($ingredients, [
                'multiple' => 'true']) ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
