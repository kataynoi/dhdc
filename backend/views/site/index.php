<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="well">
        <h1>ระบบ District HDC BACK-END</h1>
    </div>
    <div>
        <a class="btn btn-primary" href="<?=Yii::$app->urlManager->createUrl('user/index')?>"> 
         จัดการ USER
         </a>
         <button class="btn btn-danger" id="btn_1"> 
         ประมวลผลรายงาน
         </button>
    </div>

    <div class="body-content">
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
        <div id="res" style="display: none">
            <img src="images/busy.gif">
        </div>
    </div>
</div>
