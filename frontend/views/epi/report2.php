<?php

use yii\helpers\Html;
?>
<?php
$this->params['breadcrumbs'][] = ['label' => 'สร้างเสริมภูมิคุ้มกันโรค', 'url' => ['epi/index']];
$this->params['breadcrumbs'][] = 'ผลงานการรณรงค์ฉีดวัคซีน dTc‬';
?>

<a href="#" id="btn_sql">ชุดคำสั่ง</a>
<div id="sql" style="display: none"><?= $sql ?></div>
<?php
if (isset($dataProvider))
    $dev = Html::a('คุณนครินทร์ เกตุวีระพงศ์', 'https://fb.com/nakharin.knott', ['target' => '_blank']);


//echo yii\grid\GridView::widget([
echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'responsive' => TRUE,
    'hover' => true,
    'floatHeader' => true,
    'panel' => [
        'before' => '',
        'type' => \kartik\grid\GridView::TYPE_SUCCESS,
        'after' => 'โดย ' . $dev
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'hospcode',
            'vAlign'=>'middle',
            'hAlign'=>'center',
            'header' => 'รหัส'
        ],
        [
            'attribute' => 'hosname',
            'vAlign'=>'middle',
            'hAlign'=>'left',
            'label' => 'สถานบริการ'
            
        ],
        [
            'attribute' => 'dtc_all',
            'vAlign'=>'middle',
            'hAlign'=>'center',
            'header' => 'ผลงานฉีด dTC<br>ทั้งหมด (คน)'
        ],
        [
            'attribute' => 'dtc_inhos',
            'vAlign'=>'middle',
            'hAlign'=>'center',
            'header' => 'ผลงานฉีด dTC<br>ในสถานบริการ (คน)'
        ],
        [
            'attribute' => 'dtc_other',
            'vAlign'=>'middle',
            'hAlign'=>'center',
            'header' => 'ผลงานฉีด dTC<br>นอกสถานบริการ (คน)'
        ],
        [
            'attribute' => 'dtc_inregion',
            'vAlign'=>'middle',
            'hAlign'=>'center',
            'header' => 'ผลงานฉีด dTC<br>ประชากรในเขต (คน)'
        ],
        [
            'attribute' => 'dtc_outregion',
            'vAlign'=>'middle',
            'hAlign'=>'center',
            'header' => 'ผลงานฉีด dTC<br>ประชากรนอกเขต (คน)'
        ],
    ]
]);
?>

<?php
$script = <<< JS

$(function(){
    $("label[title='Show all data']").hide();
});
        
$('#btn_sql').on('click', function(e) {
    
   $('#sql').toggle();
});
JS;
$this->registerJs($script);
?>



