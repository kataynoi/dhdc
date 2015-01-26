<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UploadFortythreeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fortythrees All');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-fortythree-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '{modelClass}', [
    'modelClass' => 'Upload Fortythree',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'hospcode',
            'file_name',
            'file_size',
            'upload_date',
            'upload_time',
            // 'note1',
            // 'note2',
            // 'note3',
            // 'note4',
            // 'note5',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
