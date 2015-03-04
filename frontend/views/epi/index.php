<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<?php

$model = frontend\models\SysEventLog::find()->orderBy('id DESC')->one();
$last_process = $model->end_at;

?>

<h3>หมวดรายงาน-ภูมิคุ้มกันโรค (ประมวลผลเมื่อ - <?=$last_process?>)</h3>

<p>
    <?php
    echo Html::a('1) เด็กอายุ 5 ปีได้รับวัคซีน DTP5', ['report1']);
    ?>
</p>


<div class="footerrow" style="padding-top: 60px">
    <div class="alert alert-success">
        หมายเหตุ : ระบบรายงานอยู่ระหว่างพัฒนาอย่างต่อเนื่อง
    </div>
</div>
