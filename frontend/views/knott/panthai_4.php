<?php
$this->params['breadcrumbs'][]=['label' => 'รวมรายงานของ knott', 'url' => ['knott/index']];
$this->params['breadcrumbs'][] ='รายงานอัตราส่วนการให้รหัสวินิจฉัยแพทย์แผนไทย';
?>
<div class="alert alert-danger">
    รายงานอัตราส่วนการให้รหัสวินิจฉัยแพทย์แผนไทย
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


