<?php
/* @var $this yii\web\View */

$this->title ='DHDC Backend';
?>
<div class="site-index">

    <div class="well">
        <h1>ระบบ District HDC BACK-END</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <a class="btn btn-primary" href="<?= Yii::$app->urlManager->createUrl('user/index') ?>"> 
                    จัดการ USER
                </a>
            </div>
            <div class="col-sm-4">
                <button class="btn btn-danger" id="btn_1"> 
                    ประมวลผลรายงาน
                </button>

                <div id="res" style="display: none">
                    <img src="images/busy.gif">
                </div>

            </div>
            <div class="col-sm-4">
                <a class="btn btn-warning" href="<?= Yii::$app->urlManager->createUrl('execute/index') ?>"> 
                    Show Processlist
                </a>
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
                 <a class="btn btn-danger" href="<?=$route_off?>">Close Upload</a>
                <?php else: ?>
                <a class="btn btn-success" href="<?=$route_on?>">Open Upload</a>
                <?php endif; ?>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>


</div>

<?php
$route = Yii::$app->urlManager->createUrl('execute/execute');
$script = <<< JS
$('#btn_1').on('click', function(e) {
                
    if(!confirm('ประมวลผลรายงาน')){
        return false;
    }
    $('#btn_1').hide();
   
    //$("html, body").animate({ scrollTop: $(document).height() }, "slow");
    $('#res').toggle();  
    
        
    $.ajax({
       url: "$route",
       //data: {a:'1'},
       success: function(data) {
            $('#res').toggle();
            $('#btn_1').show();
           
            alert(data+' สำเร็จ');
            //window.location.reload();
       }
    });
});
JS;
$this->registerJs($script);
?>
