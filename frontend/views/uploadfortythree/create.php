<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UploadFortythree */

$this->title = Yii::t('app', '{modelClass}', [
    'modelClass' => 'Upload Fortythree',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Upload Fortythrees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-fortythree-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
