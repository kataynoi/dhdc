<?php

use miloschuman\highcharts\Highcharts;

$this->title = "District HDC";
?>
<div style='display: none'>
    <?=
    Highcharts::widget([
        'scripts' => [
            'highcharts-more',
            'themes/grid'
        //'modules/exporting',
        ]
    ]);
    ?>
</div>
<?php
$this->registerJsFile('./js/chart_dial.js');
?>
<div class="container">

    <div class="row">
        <div class="col-lg-4" style="text-align: center;">
            <?php
            $a = 60.09;
            $this->registerJs("
                        var obj_div=$('#ch1');
                        gen_dial(obj_div,$a);
                    ");
            ?>
            <h4>ร้อยละหญิงตั้งครรภ์ได้รับการฝากครรภ์ครั้งแรกก่อนหรือเท่ากับ 12 สัปดาห์</h4>
            <div id="ch1"></div>
        </div>

        <div class="col-lg-4" style="text-align: center;">
            <?php
            $a = 55.56;
            $this->registerJs("
                        var obj_div=$('#ch2');
                        gen_dial(obj_div,$a);
                    ");
            ?>
            <h4>ร้อยละหญิงตั้งครรภ์ที่ได้รับการดูแลก่อนคลอด <br>5 ครั้ง ตามเกณฑ์ (KPI)</h4>
            <div id="ch2"></div>
        </div>

        <div class="col-lg-4" style="text-align: center;">
            <?php
            $a = 90.99;
            $this->registerJs("
                        var obj_div=$('#ch3');
                        gen_dial(obj_div,$a);
                    ");
            ?>
            <h4>ร้อยละหญิงตั้งครรภ์ที่ได้รับการดูแลก่อนคลอด <br>4 ครั้ง ตามเกณฑ์ (MDG)</h4>
            <div id="ch3"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4" style="text-align: center;">
            <?php
            $a = 56.02;
            $this->registerJs("
                        var obj_div=$('#ch4');
                        gen_dial(obj_div,$a);
                    ");
            ?>
            <h4>ร้อยละของทารกแรกเกิดน้ำหนักน้อยกว่า<br> 2,500 กรัม (KPI)</h4>
            <div id="ch4"></div>
        </div>

        <div class="col-lg-4" style="text-align: center;">
            <?php
            $a = 90.01;
            $this->registerJs("
                        var obj_div=$('#ch5');
                        gen_dial(obj_div,$a);
                    ");
            ?>
            <h4>ร้อยละของเด็กแรกเกิดถึง 5 ปี<br>มีพัฒนาการสมวัย (KPI)</h4>
            <div id="ch5"></div>
        </div>

        <div class="col-lg-4" style="text-align: center;">
            <?php
            $a = 80.98;
            $this->registerJs("
                        var obj_div=$('#ch6');
                        gen_dial(obj_div,$a);
                    ");
            ?>
            <h4>หญิงหลังคลอดได้รับการดูแลครบ <br>3 ครั้งตามเกณฑ์</h4>
            <div id="ch6"></div>
        </div>
    </div>


</div>

</div>
