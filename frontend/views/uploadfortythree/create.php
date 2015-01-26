<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UploadFortythree */

$this->title = Yii::t('app', '{modelClass}', [
    'modelClass' => 'Fortythrees',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fortythrees All'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-fortythree-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
