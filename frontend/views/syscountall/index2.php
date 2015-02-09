<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SysCountAllSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายแฟ้มรายเดือน';
$this->params['breadcrumbs'][] = ['label' => 'ผลรวมข้อมูลรายแฟ้ม', 'url' => ['syscountall/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-count-all-index">
    <div style="overflow: auto;">
        <?php
        \yii\widgets\Pjax::begin();
        echo \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
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
        \yii\widgets\Pjax::end();
        ?>
    </div>
</div>
