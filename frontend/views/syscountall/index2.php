<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SysCountAllSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายแฟ้มรายเดือน';
$this->params['breadcrumbs'][]= ['label' => 'ผลรวมข้อมูลรายแฟ้ม','url' => ['syscountall/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="sys-count-all-index">
    <div style="overflow: auto;">
    <?=
    kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'condensed' => true,
        'pjax' => true,
        'pjaxSettings' => [
            //'neverTimeout' => true,
            'options' => [
                'enablePushState' => false,
            ],
        ],
        'responsive' => TRUE,
        
        'panel' => [
            'before' => '',
            
        ],
        'floatHeader' => true,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'hospcode',
            [
                'attribute' => 'month',
                
            ],
            'person',
            'death',
            'service',
            'accident',
            'diagnosis_opd',
            'procedure_opd',
            'ncdscreen',
            'chronicfu',
            'labfu',
            'chronic',
            
            'fp',
            'epi',
            'nutrition',
            'prenatal',
            'anc',
            'labor',
            'postnatal',
            'newborn',
            'newborncare',
            'dental',
            'admission',
            'diagnosis_ipd',
            'procedure_ipd',
        ],
    ]);
    ?>
    </div>
</div>
