<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\UploadFortythree */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fortythrees All '), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-fortythree-view">
    


    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-upload"></span> Upload'), ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'hospcode',
            'file_name',
            'file_size',
            'upload_date',
            'upload_time',
            'note1'
        ],
    ])
    ?>

    <?php if ($model->note2 !== 'OK' && $model->note2!=='กำลังนำเข้า' ): ?>
        
        <button class="btn btn-danger" id="btn_import">
            <span class="glyphicon glyphicon-play"></span> 
            นำเข้า
        </button>
    
    <?php else: ?>
   
        <div class="alert alert-danger">นำเข้าแล้ว..</div>    
    <?php endif; ?>
        <div id="info" style="display: none">ระหว่างนำเข้าข้อมูล ท่านสามารถปิดหน้าจอนี้ได้</div>

    <?php
    $script = <<< JS
$('#btn_import').on('click', function(e) {
    
    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
    $('#res').toggle();  
    $('#info').toggle(); 
    $('#btn_import').hide();
        
    $.ajax({
       url: 'index.php?r=ajax/import',
       data: {fortythree:"$model->file_name",oldname:"$model->note1",id:"$model->id"},
       success: function(data) {
            $('#res').toggle(); 
            $('#info').toggle(); 
            alert(data+' สำเร็จ');
            window.location.reload();
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
