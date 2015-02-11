<?php
$this->params['breadcrumbs'][] = ['label' => 'ประชากร', 'url' => ['sos/index']];
$this->params['breadcrumbs'][] = 'ปิรามิดประชากร';
?>
<pre>
<?php
//print_r($rawData);
echo (int)($rawData[0]['male'])*(-1);

?>
</pre>



<?php
use miloschuman\highcharts\Highcharts;

$male = [$rawData[0]['male']*(-1), $rawData[1]['male']*(-1), $rawData[2]['male']*(-1)
        ,$rawData[3]['male']*(-1),$rawData[4]['male']*(-1),$rawData[5]['male']*(-1)
        ,$rawData[6]['male']*(-1),
    $rawData[7]['male']*(-1), $rawData[8]['male']*(-1), -36801, -312, -272, -2281, -2268,
    -200, -168, -84, -384, -9069, -287, -38];
$js_male = implode(',', $male);

$female = [1656, 1787, 198, 21, 2403, 236, 230, 251,
    336, 3493, 305, 27, 230, 242, 25, 1785,
    1447, 100, 33, 1306, 21];

$js_female = implode(',', $female);


//คำนวณค่า max , min 
    $max_female = max($female);
    $max_male = abs(min($male));
    $max = $max_female > $max_male ? $max_female : $max_male;

$categories = ['0-4', '5-9', '10-14', '15-19',
    '20-24', '25-29', '30-34', '35-39', '40-44',
    '45-49', '50-54', '55-59', '60-64', '65-69',
    '70-74', '75-79', '80-84', '85-89', '90-94',
    '95-99', '100 + '];
$js_categories = implode("','", $categories);

$this->registerJs("
        var categories = ['$js_categories'];    
        $('#ch1').highcharts({
            chart: {
                type: 'bar',
                plotBackgroundImage:'./images/bg_pop.png',
                height:460
            },
            credits:{'enabled':false},
            title: {
                text: 'ปิรามิดประชากร ปี '+2558
            },
            subtitle: {
                text: 'person 43 แฟ้ม'
            },
            xAxis: [{
                categories: categories,
                reversed: false,
                labels: {
                    step: 1
                }
            }, { 
                opposite: true,
                reversed: false,
                categories: categories,
                linkedTo: 0,
                labels: {
                    step: 1
                }
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    formatter: function () {
                        return (Math.abs(this.value));
                    }
                },
                min: -$max-10,
                max: $max-10
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + ', อายุ ' + this.point.category + '</b><br/>' +
                        'ประชากร: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
                }
            },
            series: [{
                name: 'ชาย',
                data: [$js_male]
            }, {
                name: 'หญิง',
                data: [$js_female]
            }]
        });
    ");
?>

<div style="display: none">
    <?=
    Highcharts::widget([
        'scripts' => [
            'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
            //'modules/exporting', // adds Exporting button/menu to chart
            'themes/grid'        // applies global 'grid' theme to all charts
        ]
    ]);
    ?>
</div>
<div id="ch1"></div>


<?php
if (isset($dataProvider))
    $dev = \yii\helpers\Html::a('คุณสุพัฒนา ปิงเมือง', 'https://fb.com/kukks205', ['target' => '_blank']);


//echo yii\grid\GridView::widget([
echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'responsive' => TRUE,
    'hover' => true,
    'panel' => [
        'before' => '',
        'type' => \kartik\grid\GridView::TYPE_SUCCESS,
        'after' => 'โดย ' . $dev
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



