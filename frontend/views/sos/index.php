<?php
/* @var $this yii\web\View */
?>
<h3>หมวดรายงาน-ประชากร</h3>

<p>
    <?php
    echo \yii\helpers\Html::a('1) ปิรามิดประชากร(จำนวนประชากรแยกกลุ่มอายุ)', ['sos/pyramid']);
    
    ?>
</p>

<p>
    <?php
    echo \yii\helpers\Html::a('2) จำนวนประชากรแยกตามประเภทการอยู่อาศัย', ['personcheck/checktype']);
    
    ?>
</p>

<p>
    <?php
    echo \yii\helpers\Html::a('3) ตรวจสอบ 13 หลัก', ['personcheck/checkcid']);
    
    ?>
</p>

<div class="footerrow" style="padding-top: 60px">
    <div class="alert alert-success">
        หมายเหตุ : ระบบรายงานอยู่ระหว่างพัฒนาอย่างต่อเนื่อง
    </div>
</div>
