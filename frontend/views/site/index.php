<?php

use miloschuman\highcharts\Highcharts;

$this->title = "District HDC";
?>
<div style="display: none">
    <?=
    Highcharts::widget([
        'scripts' => [
            'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
        //'modules/exporting', // adds Exporting button/menu to chart
        //'themes/grid'        // applies global 'grid' theme to all charts
        ]
    ]);
    ?>
</div>
<div class="container">

    <div class="row">
        <div class="col-lg-4" style="text-align: center;">
            <?php
            $this->registerJs('function dial1(value){
                    $("#ch1").highcharts({
                    chart: {
                        type: "gauge",
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        height: 290,                       
                    },
                    credits:{"enabled":false},
                    title: {
                        text: ""
                    },
                    pane: {
                        startAngle: -90,
                        endAngle: 90,
                        background: null,
                    },
                    yAxis: {
                        min: 0,
                        max: 100,
                        minorTickInterval: "auto",
                        minorTickWidth: 1,
                        minorTickLength: 10,
                        minorTickPosition: "inside",
                        minorTickColor: "#666",
                        tickPixelInterval: 30,
                        tickWidth: 2,
                        tickPosition: "inside",
                        tickLength: 15,
                        tickColor: "#666",
                        labels: {
                            step: 2,
                            rotation: "auto"
                        },
                        title: {
                            text: "ร้อยละ "+value
                        },
                        plotBands: [{
                            from: 0,
                            to: 60,
                            color: "#DF5353" // red 
                        }, {
                            from: 60,
                            to: 80,
                            color: "#DDDF0D"// yellow
                        }, {
                            from: 80,
                            to: 100,
                            color: "#55BF3B" // green
                        }]
                    },
                    series: [{
                        name: "ร้อยละ",
                        data: [value],
                        tooltip: {
                            valueSuffix: " "
                        }
                    }]// จบ content
                     });// จบ chart
                    }');
            $a = 60.09;
            $this->registerJs("$('document').ready(function(){ dial1($a) });");
            ?>
            <h4>ร้อยละหญิงตั้งครรภ์ได้รับการฝากครรภ์ครั้งแรกก่อนหรือเท่ากับ 12 สัปดาห์</h4>
            <div id="ch1"></div>
        </div>

        <div class="col-lg-4" style="text-align: center;">
            <?php
            $this->registerJs('function dial2(value){
                    $("#ch2").highcharts({
                            chart: {
                        type: "gauge",
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        height: 290,                       
                    },
                    credits:{"enabled":false},
                    title: {
                        text: ""
                    },
                    pane: {
                        startAngle: -90,
                        endAngle: 90,
                        background: null,
                    },
                    yAxis: {
                        min: 0,
                        max: 100,
                        minorTickInterval: "auto",
                        minorTickWidth: 1,
                        minorTickLength: 10,
                        minorTickPosition: "inside",
                        minorTickColor: "#666",
                        tickPixelInterval: 30,
                        tickWidth: 2,
                        tickPosition: "inside",
                        tickLength: 15,
                        tickColor: "#666",
                        labels: {
                            step: 2,
                            rotation: "auto"
                        },
                        title: {
                            text: "ร้อยละ "+value
                        },
                        plotBands: [{
                            from: 0,
                            to: 60,
                            color: "#DF5353" // red 
                        }, {
                            from: 60,
                            to: 80,
                            color: "#DDDF0D"// yellow
                        }, {
                            from: 80,
                            to: 100,
                            color: "#55BF3B" // green
                        }]
                    },
                    series: [{
                        name: "ร้อยละ",
                        data: [value],
                        tooltip: {
                            valueSuffix: " "
                        }
                    }]// จบ content
                     });
                    }');

            $a = 55.56;
            $this->registerJs("$('document').ready(function(){ dial2($a) });");
            ?>
            <h4>ร้อยละหญิงตั้งครรภ์ที่ได้รับการดูแลก่อนคลอด <br>5 ครั้ง ตามเกณฑ์ (KPI)</h4>
            <div id="ch2"></div>
        </div>

        <div class="col-lg-4" style="text-align: center;">
            <?php
            $this->registerJs('function dial3(value){
                    $("#ch3").highcharts({
                           chart: {
                        type: "gauge",
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        height: 290,                       
                    },
                    credits:{"enabled":false},
                    title: {
                        text: ""
                    },
                    pane: {
                        startAngle: -90,
                        endAngle: 90,
                        background: null,
                    },
                    yAxis: {
                        min: 0,
                        max: 100,
                        minorTickInterval: "auto",
                        minorTickWidth: 1,
                        minorTickLength: 10,
                        minorTickPosition: "inside",
                        minorTickColor: "#666",
                        tickPixelInterval: 30,
                        tickWidth: 2,
                        tickPosition: "inside",
                        tickLength: 15,
                        tickColor: "#666",
                        labels: {
                            step: 2,
                            rotation: "auto"
                        },
                        title: {
                            text: "ร้อยละ "+value
                        },
                        plotBands: [{
                            from: 0,
                            to: 60,
                            color: "#DF5353" // red 
                        }, {
                            from: 60,
                            to: 80,
                            color: "#DDDF0D"// yellow
                        }, {
                            from: 80,
                            to: 100,
                            color: "#55BF3B" // green
                        }]
                    },
                    series: [{
                        name: "ร้อยละ",
                        data: [value],
                        tooltip: {
                            valueSuffix: " "
                        }
                    }]// จบ content
                     });
                    }');

            $a = 90.99;
            $this->registerJs("$('document').ready(function(){ dial3($a) });");
            ?>
            <h4>ร้อยละหญิงตั้งครรภ์ที่ได้รับการดูแลก่อนคลอด <br>4 ครั้ง ตามเกณฑ์ (MDG)</h4>
            <div id="ch3"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4" style="text-align: center;">
            <?php
            $this->registerJs('function dial4(value){
                    $("#ch4").highcharts({
                    chart: {
                        type: "gauge",
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        height: 290,                       
                    },
                    credits:{"enabled":false},
                    title: {
                        text: ""
                    },
                    pane: {
                        startAngle: -90,
                        endAngle: 90,
                        background: null,
                    },
                    yAxis: {
                        min: 0,
                        max: 100,
                        minorTickInterval: "auto",
                        minorTickWidth: 1,
                        minorTickLength: 10,
                        minorTickPosition: "inside",
                        minorTickColor: "#666",
                        tickPixelInterval: 30,
                        tickWidth: 2,
                        tickPosition: "inside",
                        tickLength: 15,
                        tickColor: "#666",
                        labels: {
                            step: 2,
                            rotation: "auto"
                        },
                        title: {
                            text: "ร้อยละ "+value
                        },
                        plotBands: [{
                            from: 0,
                            to: 60,
                            color: "#DF5353" // red 
                        }, {
                            from: 60,
                            to: 80,
                            color: "#DDDF0D"// yellow
                        }, {
                            from: 80,
                            to: 100,
                            color: "#55BF3B" // green
                        }]
                    },
                    series: [{
                        name: "ร้อยละ",
                        data: [value],
                        tooltip: {
                            valueSuffix: " "
                        }
                    }]// จบ content
                     });// จบ chart
                    }');

            $a = 56.02;
            $this->registerJs("$('document').ready(function(){ dial4($a) });");
            ?>
            <h4>ร้อยละของทารกแรกเกิดน้ำหนักน้อยกว่า<br> 2,500 กรัม (KPI)</h4>
            <div id="ch4"></div>
        </div>

        <div class="col-lg-4" style="text-align: center;">
            <?php
            $this->registerJs('function dial5(value){
                    $("#ch5").highcharts({
                            chart: {
                        type: "gauge",
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        height: 290,                       
                    },
                    credits:{"enabled":false},
                    title: {
                        text: ""
                    },
                    pane: {
                        startAngle: -90,
                        endAngle: 90,
                        background: null,
                    },
                    yAxis: {
                        min: 0,
                        max: 100,
                        minorTickInterval: "auto",
                        minorTickWidth: 1,
                        minorTickLength: 10,
                        minorTickPosition: "inside",
                        minorTickColor: "#666",
                        tickPixelInterval: 30,
                        tickWidth: 2,
                        tickPosition: "inside",
                        tickLength: 15,
                        tickColor: "#666",
                        labels: {
                            step: 2,
                            rotation: "auto"
                        },
                        title: {
                            text: "ร้อยละ"+value
                        },
                        plotBands: [{
                            from: 0,
                            to: 60,
                            color: "#DF5353" // red 
                        }, {
                            from: 60,
                            to: 80,
                            color: "#DDDF0D"// yellow
                        }, {
                            from: 80,
                            to: 100,
                            color: "#55BF3B" // green
                        }]
                    },
                    series: [{
                        name: "ร้อยละ",
                        data: [value],
                        tooltip: {
                            valueSuffix: " "
                        }
                    }]// จบ content
                     });
                    }');

            $a = 90.01;
            $this->registerJs("$('document').ready(function(){ dial5($a) });");
            ?>
            <h4>ร้อยละของเด็กแรกเกิดถึง 5 ปี<br>มีพัฒนาการสมวัย (KPI)</h4>
            <div id="ch5"></div>
        </div>

        <div class="col-lg-4" style="text-align: center;">
            <?php
            $this->registerJs('function dial6(value){
                    $("#ch6").highcharts({
                           chart: {
                        type: "gauge",
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        height: 290,                       
                    },
                    credits:{"enabled":false},
                    title: {
                        text: ""
                    },
                    pane: {
                        startAngle: -90,
                        endAngle: 90,
                        background: null,
                    },
                    yAxis: {
                        min: 0,
                        max: 100,
                        minorTickInterval: "auto",
                        minorTickWidth: 1,
                        minorTickLength: 10,
                        minorTickPosition: "inside",
                        minorTickColor: "#666",
                        tickPixelInterval: 30,
                        tickWidth: 2,
                        tickPosition: "inside",
                        tickLength: 15,
                        tickColor: "#666",
                        labels: {
                            step: 2,
                            rotation: "auto"
                        },
                        title: {
                            text: "ร้อยละ"+value
                        },
                        plotBands: [{
                            from: 0,
                            to: 60,
                            color: "#DF5353" // red 
                        }, {
                            from: 60,
                            to: 80,
                            color: "#DDDF0D"// yellow
                        }, {
                            from: 80,
                            to: 100,
                            color: "#55BF3B" // green
                        }]
                    },
                    series: [{
                        name: "ร้อยละ",
                        data: [value],
                        tooltip: {
                            valueSuffix: " "
                        }
                    }]// จบ content
                     });
                    }');

            $a = 80.98;
            $this->registerJs("$('document').ready(function(){ dial6($a) });");
            ?>
            <h4>หญิงหลังคลอดได้รับการดูแลครบ <br>3 ครั้งตามเกณฑ์</h4>
            <div id="ch6"></div>
        </div>
    </div>


</div>

</div>
