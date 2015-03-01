<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SysUploadPersonTargetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Person';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-upload-person-target-index">

   
    <h3>รายการไฟล์ PERSON.TXT</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            
            'file_name',
            'note1',
            //'file_size',
            'note2',
            'note3',
            'upload_date',
            'upload_time',
            // 'note4',
            // 'note5',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
