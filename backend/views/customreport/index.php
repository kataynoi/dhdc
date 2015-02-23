<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Custom Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-report-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Custom Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'rpt_topic',
            'rpt_file',
            'rpt_group',
            'note1',
            // 'note2',
            // 'note3',
            // 'note4',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
