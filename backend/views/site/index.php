
<?php
/* @var $this yii\web\View */
     

$this->registerCss(".btn-xlarge {
        padding: 18px 28px;
        font-size: 22px; //change this to your desired size
        line-height: normal;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
    }");

$this->title = 'DHDC Backend';
?>
<div class="site-index container">

    <div class="well">
        <?php
        $version = \backend\models\SysVersion::find()->one();
        ?>
        <h1>ระบบ District HDC BACK-END</h1>
        <div class="alert alert-danger">
        <p>frontend :  <?= $version->frontend; ?></p>
        <p>backend : <?= $version->backend; ?></p>
        <p>database : <?= $version->database; ?></p>
        <p><a href="" class="btn btn-danger">Check</a></p>
        </div>
    </div>
    <div class="well">
        <div class="row">
            <div class="col-sm-4">
                <?php
                $route = \Yii::$app->urlManager->createUrl('sysconfigmain/index');
                ?>
                <a class="btn btn-success btn-xlarge" id="btn_1" href="<?= $route ?>"> 
                    <i class="glyphicon glyphicon-cog"></i>  ตั้งค่าอำเภอ   
                </a>

            </div>
            <div class="col-sm-4">

                <a class="btn btn-primary btn-xlarge" href="<?= Yii::$app->urlManager->createUrl('user/index') ?>"> 
                    <i class="glyphicon glyphicon-user"></i> จัดการ USER   
                </a>


            </div>
            <div class="col-sm-4">

                <button class="btn btn-danger btn-xlarge" id="btn_process"> 
                    <i class="glyphicon glyphicon-refresh"></i> ประมวลผลรายงาน
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
                    <a class="btn btn-danger btn-xlarge" href="<?= $route_off ?>">
                        <i class="glyphicon glyphicon-folder-open"></i> ปิด Upload
                    </a>
                <?php else: ?>
                    <a class="btn btn-primary btn-xlarge" href="<?= $route_on ?>">
                        <i class="glyphicon glyphicon-folder-open"></i> เปิด Upload
                    </a>
                <?php endif; ?>
            </div>
            <div class="col-sm-4">

                <a class="btn btn-warning btn-xlarge" href="<?= Yii::$app->urlManager->createUrl('execute/index') ?>"> 
                    <i class="glyphicon glyphicon-play"></i> MySQL Load
                </a>


            </div>
            <div class="col-sm-4">
                <?php
                $route = \Yii::$app->urlManager->createUrl('syssettime/index');
                ?>
                <a class="btn btn-success btn-xlarge" id="btn_set_process" href="<?= $route ?>"> 
                    <i class="glyphicon glyphicon-time"></i> ตั้งเวลาประมวลผล
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
