<?php
/* @var $this yii\web\View 
use yii\helpers\Html;*/
?>
<h3>หมวดรายงานทันตกรรม </h3>
<div class="alert alert-warning">
    <?php
    $model = frontend\models\SysEventLog::find()->orderBy('id DESC')->one();
    $last_process = date_format(date_create($model->end_at), 'Y-m-d H:i:s');
    ?>
    ประมวลผล <?= $last_process ?>
</div>

<p>
    <?php
    echo \yii\helpers\Html::a('1) ร้อยละหญิงตั้งครรภ์ได้รับการตรวจสุขภาพช่องปาก', ['dental/report1']);
    ?>
</p>


<div class="footerrow" style="padding-top: 60px">
    <div class="alert alert-success">
        หมายเหตุ : ระบบรายงานอยู่ระหว่างพัฒนาอย่างต่อเนื่อง
    </div>
</div>
