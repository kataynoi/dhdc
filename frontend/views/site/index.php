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
            <h4>ประชาชนอายุ 35 ปีขึ้นไปได้รับการคัดกรอง<br>เบาหวาน-ความดันโลหิต</h4>
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
            <h4>ผู้ป่วยเบาหวานได้รับการตรวจ HbA1c <br>และควบคุมน้ำตาลได้ดี</h4>
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
            <h4>ผู้เป็นความดันโลหิตสูงความคุม<br>ความดันโลหิตได้ดี</h4>
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
            <h4>หญิงมีครรภ์ได้รับการฝากครรภ์ครบ <br>5 ครั้งตามเกณฑ์ </h4>
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
            <h4>หญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรก<br>ก่อน 12 สัปดาห์</h4>
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
            <h4><br>เด็กอายุ 5 ปีได้รับวัคซีน DTP5</h4>
            <div id="ch6"></div>
        </div>
    </div>


</div>

</div>
