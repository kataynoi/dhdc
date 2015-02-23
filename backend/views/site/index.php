
<?php
/* @var $this yii\web\View */

//$js_url = Yii::getAlias('@web');
//$this->registerJsFile($js_url."/js/bootbox.min.js");

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
        <h1>ระบบ District HDC BACK-END</h1>
        <div class="alert alert-danger">
            <div id="version_current">
                <?php
                $ver = file_get_contents(Yii::getAlias('@version/version.txt'));
                $ver = explode(',', $ver);
                ?>
                frontend:<?= $ver[0]; ?>,backend:<?= $ver[1]; ?>,databases:<?= $ver[2]; ?>
            </div>
            <font color="blue"><div id="version_new"></div></font>
            <div>
                <button class="btn btn-danger" id="btn_chk_ver">
                    <i class="glyphicon glyphicon-check"></i> Version
                </button>
                <a class="btn btn-primary" href="ftp://utehn.plkhealth.go.th/" target="_blank">
                    <i class="glyphicon glyphicon-arrow-up"></i> download
                </a>
            </div>

        </div>
    </div>
    <center> 
        <div id="res" style="display: none">
            <img src="images/busy.gif">
        </div>
    </center>
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
                
                <a class="btn btn-info btn-xlarge" id="btn_count_all" href="#"> 
                    <i class="glyphicon glyphicon-circle-arrow-up"></i> นับจำนวนแฟ้ม
                </a>
            </div>
           
            <div class="col-sm-4">

                <button class="btn btn-danger btn-xlarge" id="btn_process_report"> 
                    <i class="glyphicon glyphicon-refresh"></i> ประมวลผลรายงาน
                </button>


            </div>
        </div>
        <br>
        <div class="row">
            
             <div class="col-sm-4">
                 <?php 
                 $route = Yii::$app->urlManager->createUrl('user/index'); 
                 ?>
                <a class="btn btn-primary btn-xlarge" href="<?=$route?>"> 
                    <i class="glyphicon glyphicon-user"></i> จัดการผู้ใช้   
                </a>

            </div>

           

            <div class="col-sm-4">
                <?php 
                 $route = Yii::$app->urlManager->createUrl('execute/index'); 
                 ?>
                <a class="btn btn-warning btn-xlarge" href="<?=$route?>"> 
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
                <?php
                $onoff = \frontend\models\SysOnoffSql::findOne(1);
                $route_on = Yii::$app->urlManager->createUrl('onoff/onsql');
                $route_off = Yii::$app->urlManager->createUrl('onoff/offsql');
                if ($onoff->status === 'on'):
                    ?>
                    <a class="btn btn-danger btn-xlarge" href="<?= $route_off ?>">
                        <i class="glyphicon glyphicon-remove-sign"></i> ปิดใช้งาน SQL
                    </a>
                <?php else: ?>
                    <a class="btn btn-primary btn-xlarge" href="<?= $route_on ?>">
                        <i class="glyphicon glyphicon-refresh"></i> เปิดใช้งาน SQL
                    </a>
                <?php endif; ?>
            </div>
            
               <div class="col-sm-4">
                 <?php 
                 $route = Yii::$app->urlManager->createUrl('customreport/index'); 
                 ?>
                <a class="btn btn-primary btn-xlarge" href="<?=$route?>"> 
                    <i class="glyphicon glyphicon-list-alt"></i> Custom Report  
                </a>

            </div>

        </div>


    </div>
  

</div>


<?php
$route_chk_update = Yii::$app->urlManager->createUrl('update/checkver');
$route_process_report = Yii::$app->urlManager->createUrl('execute/processreport');
$route_file_count = Yii::$app->urlManager->createUrl('execute/filecount');



$script1 = <<< JS
       
  $('#btn_chk_ver').on('click', function () {
    $.ajax({
       url: "$route_chk_update",       
       success: function(data) {        
            $('#version_new').html(data);
       }
    });
 });
        
 $('#btn_process_report').on('click', function () {
          $('#res').toggle();   
    $.ajax({
       url: "$route_process_report",       
       success: function(data) {
           $('#res').toggle();               
            alert(data+' สำเร็จ'); 
       }
    });
 });
        

        
$('#btn_count_all').on('click', function(e) {                
    
    $('#res').toggle();          
    $.ajax({
       url: "$route_file_count",       
       success: function(data) {
            $('#res').toggle();               
            alert(data+' สำเร็จ');            
       }
    });
});
JS;

$this->registerJs($script1);

?>
