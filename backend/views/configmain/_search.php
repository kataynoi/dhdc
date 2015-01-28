<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ConfigmainSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configmain-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'district_code') ?>

    <?= $form->field($model, 'district_name') ?>

    <?= $form->field($model, 'note1') ?>

    <?= $form->field($model, 'note2') ?>

    <?php // echo $form->field($model, 'note3') ?>

    <?php // echo $form->field($model, 'note4') ?>

    <?php // echo $form->field($model, 'note5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
