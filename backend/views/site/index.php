<?php
/* @var $this yii\web\View */

$this->title = 'DHDC Backend';
?>
<div class="site-index">

    <div class="well">
        <h1>ระบบ District HDC BACK-END</h1>
        <p>frontend version:  2015-01-31</p>
        <p>backend version: 2015-01-31</p>
        <p><a href="" class="btn btn-danger">Check</a></p>
    </div>
    <div class="container well">
        <div class="row">
            <div class="col-sm-4">
                <?php
                $route=\Yii::$app->urlManager->createUrl('sysconfigmain/index');
                ?>
                <a class="btn btn-success" id="btn_1" href="<?=$route?>"> 
                    ตั้งค่าอำเภอ
                </a>

            </div>
            <div class="col-sm-4">

                <a class="btn btn-primary" href="<?= Yii::$app->urlManager->createUrl('user/index') ?>"> 
                    จัดการ USER
                </a>


            </div>
            <div class="col-sm-4">

                <button class="btn btn-danger" id="btn_process"> 
                    ประมวลผลรายงาน
                </button>
                <div id="res" style="display: none">
                    <img src="images/busy.gif">
                </div>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <?php
                $onoff = \frontend\models\SysOnoffUpload::findOne(1);
                $route_on = Yii::$app->urlManager->createUrl('onoff/on');
                $route_off = Yii::$app->urlManager->createUrl('onoff/off');
                if ($onoff->status === 'on'):
                    ?>
                    <a class="btn btn-danger" href="<?= $route_off ?>">Close Upload</a>
                <?php else: ?>
                    <a class="btn btn-success" href="<?= $route_on ?>">Open Upload</a>
                <?php endif; ?>
            </div>
            <div class="col-sm-4">

                <a class="btn btn-warning" href="<?= Yii::$app->urlManager->createUrl('execute/index') ?>"> 
                    Show Processlist
                </a>


            </div>
            <div class="col-sm-4">
                <?php
                $route = \Yii::$app->urlManager->createUrl('syssettime/index');
                ?>
                <a class="btn btn-success" id="btn_set_process" href="<?=$route?>"> 
                    ตั้งเวลาประมวลผลรายงาน
                </a>
            </div>
        </div>
    </div>


</div>



<?php
$route = Yii::$app->urlManager->createUrl('execute/execute');
$script = <<< JS
$('#btn_process').on('click', function(e) {
                
    if(!confirm('ประมวลผลรายงาน')){
        return false;
    }
    $('#btn_process').hide();
   
    //$("html, body").animate({ scrollTop: $(document).height() }, "slow");
    $('#res').toggle();  
    
        
    $.ajax({
       url: "$route",
       //data: {a:'1'},
       success: function(data) {
            $('#res').toggle();
            $('#btn_process').show();
           
            alert(data+' สำเร็จ');
            //window.location.reload();
       }
    });
});
JS;
$this->registerJs($script);
?>
