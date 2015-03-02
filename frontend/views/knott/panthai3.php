<?php
use yii\helpers\Html;
$this->params['breadcrumbs'][] = ['label' => 'แพทย์แผนไทย', 'url' => ['knott/index']];
$this->params['breadcrumbs'][] = 'มูลค่าการจ่ายยาแผนไทยผู้ป่วยนอก';
?>

<div class='well'>
    <form method="POST">
        ปีงบประมาณ:
        <div class='row'>

            <div class='col-sm-3'>
               
                <?php
                 $list_year =  [
                    '2014' => '2557',
                    '2015' => '2558',
                    '2016' => '2559',
                    '2017' => '2560'];
                 
                echo Html::dropDownList('selyear', $selyear, $list_year,[
                    'class' => 'form-control'
                ]);
                ?>
            </div>
            <div class='col-sm-3'>

                <button class='btn btn-danger'>ประมวลผล</button>
            </div>
        </div>
    </form>
</div>
<a href="#" id="btn_sql">ชุดคำสั่ง</a>
<div id="sql" style="display: none"><?=$sql ?></div>

    <?php
    if (isset($dataProvider)) {
        $dev = Html::a('คุณนครินทร์ เกตุวีระพงศ์', 'https://fb.com/nakharin.knott', ['target' => '_blank']);


        $y = $selyear + 543;
        $y = substr($y, 2, 2);
        $py = $y - 1;

        echo yii\grid\GridView::widget([
        //echo \kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            /*'responsive' => TRUE,
            'hover' => true,
             'floatHeader' => true,
              'panel' => [
              'before' => '',
              'type' => \kartik\grid\GridView::TYPE_SUCCESS,
              'after' => 'โดย ' . $dev
              ], */ 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'hoscode',
                'header' => 'รหัสสถานบริการ'
            ],
            [
                'attribute' => 'hosname',
                'header' => 'สถานบริการ'
            ],
            [
                'attribute' => 'm10_price_drug',
                'header' => 'ยาแผนปัจจุบัน ต.ค.(บาท)'
            ],
            [
                'attribute' => 'm10_panth_drug',
                'header' => 'ยาแผนไทย ต.ค.(บาท)'
            ],
            [
                'attribute' => 'm11_price_drug',
                'header' => 'ยาแผนปัจจุบัน พ.ย.(บาท)'
            ],
            [
                'attribute' => 'm11_panth_drug',
                'header' => 'ยาแผนไทย พ.ย.(บาท)'
            ],
            [
                'attribute' => 'm12_price_drug',
                'header' => 'ยาแผนปัจจุบัน ธ.ค.(บาท)'
            ],
            [
                'attribute' => 'm12_panth_drug',
                'header' => 'ยาแผนไทย ธ.ค.(บาท)'
            ],
            [
                'attribute' => 'm01_price_drug',
                'header' => 'ยาแผนปัจจุบัน ม.ค.(บาท)'
            ],
            [
                'attribute' => 'm01_panth_drug',
                'header' => 'ยาแผนไทย ม.ค.(บาท)'
            ],
            [
                'attribute' => 'm02_price_drug',
                'header' => 'ยาแผนปัจจุบัน ก.พ.(บาท)'
            ],
            [
                'attribute' => 'm02_panth_drug',
                'header' => 'ยาแผนไทย ก.พ.(บาท)'
            ],
            [
                'attribute' => 'm03_price_drug',
                'header' => 'ยาแผนปัจจุบัน มี.ค.(บาท)'
            ],
            [
                'attribute' => 'm03_panth_drug',
                'header' => 'ยาแผนไทย มี.ค.(บาท)'
            ],
            [
                'attribute' => 'm04_price_drug',
                'header' => 'ยาแผนปัจจุบัน เม.ย.(บาท)'
            ],
            [
                'attribute' => 'm04_panth_drug',
                'header' => 'ยาแผนไทย เม.ย.(บาท)'
            ],
            [
                'attribute' => 'm05_price_drug',
                'header' => 'ยาแผนปัจจุบัน พ.ค.(บาท)'
            ],
            [
                'attribute' => 'm05_panth_drug',
                'header' => 'ยาแผนไทย พ.ค.(บาท)'
            ],
            [
                'attribute' => 'm06_price_drug',
                'header' => 'ยาแผนปัจจุบัน มิ.ย.(บาท)'
            ],
            [
                'attribute' => 'm06_panth_drug',
                'header' => 'ยาแผนไทย มิ.ย.(บาท)'
            ],
            [
                'attribute' => 'm07_price_drug',
                'header' => 'ยาแผนปัจจุบัน ก.ค.(บาท)'
            ],
            [
                'attribute' => 'm07_panth_drug',
                'header' => 'ยาแผนไทย ก.ค.(บาท)'
            ],
            [
                'attribute' => 'm08_price_drug',
                'header' => 'ยาแผนปัจจุบัน ส.ค.(บาท)'
            ],
            [
                'attribute' => 'm08_panth_drug',
                'header' => 'ยาแผนไทย ส.ค.(บาท)'
            ],
            [
                'attribute' => 'm09_price_drug',
                'header' => 'ยาแผนปัจจุบัน ก.ย.(บาท)'
            ],
            [
                'attribute' => 'm09_panth_drug',
                'header' => 'ยาแผนไทย ก.ย.(บาท)'
            ],
            ],
            
        ]);
    }
    ?>

<?php
$script = <<< JS
$('#btn_sql').on('click', function(e) {
    
   $('#sql').toggle();
});
JS;
$this->registerJs($script);
?>