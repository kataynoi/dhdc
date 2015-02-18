<?php
$this->params['breadcrumbs'][] = ['label' => 'แพทย์แผนไทย', 'url' => ['knott/index']];
$this->params['breadcrumbs'][] = 'รายงานอัตราส่วนการให้รหัสวินิจฉัยแพทย์แผนไทย';
?>

<a href="#" id="btn_sql">ชุดคำสั่ง</a>
<div id="sql" style="display: none"><?= $sql ?></div>


<?php
$arr = [
    '2014' => '2014',
    '2015' => '2015'
];
$a = \yii\helpers\Html::dropDownList('year',$select_year, $arr);
$before = "
    <form method='POST'>
    $a
        <button>ตกลง</button>
</form>
";


if (isset($dataProvider))
//echo yii\grid\GridView::widget([
    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'responsive' => TRUE,
        'hover' => true,
        'panel' => [
            'before' => $before,
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



