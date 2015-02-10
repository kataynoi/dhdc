<?php
$this->params['breadcrumbs'][] = ['label' => 'รวมรายงานของ kukks', 'url' => ['kukks/index']];
$this->params['breadcrumbs'][] = 'ร้อยละผู้ป่วยโรคเรื้อรังได้รับการเยี่ยมบ้าน';
?>

<div class='well'>
    <form method="POST">
        วันเริ่ม:
        <?=
        yii\jui\DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
        ]);
        ?>
        วันสิ้นสุด:
        <?=
        yii\jui\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
        ]);
        ?>
        <button class='btn btn-danger'>ประมวลผล</button>
    </form>
</div>
<a href="#" id="btn_sql">ชุดคำสั่ง</a>
<div id="sql" style="display: none"><?= $sql ?></div>
<?php
if (isset($dataProvider))
//echo yii\grid\GridView::widget([
    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'responsive' => TRUE,
        'hover' => true,
        'panel' => [
            'before' => '',
            'type' => \kartik\grid\GridView::TYPE_SUCCESS,
            'after' => ''
        ],
    ]);
?>
<?php
$script = <<< JS
$('#btn_sql').on('click', function(e) {
    
   $('#sql').toggle();
});
JS;
$this->registerJs($script);
?>



