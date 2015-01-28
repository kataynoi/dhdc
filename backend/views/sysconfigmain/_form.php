<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sysconfigmain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sysconfigmain-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'provcode')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'distcode')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'district_code')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'district_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'note1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'note2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'note3')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'note4')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'note5')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
