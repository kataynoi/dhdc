<?php
/* @var $this yii\web\View */
?>
<h3>หมวดรายงาน-หมอประจำครอบครัว</h3>

<p>
    <?php
    echo \yii\helpers\Html::a('1) ร้อยละผู้ป่วยโรคเรื้อรังได้รับการเยี่ยมบ้าน', ['kukks/report1']);
    ?>
</p>

<p>
    <?php
    echo \yii\helpers\Html::a('2) สัดส่วนบุคลากรสาธารณสุขต่อประชากร', ['kukks/report2']);
    ?>
</p>

<p>
    <?php
    echo \yii\helpers\Html::a('3) จำนวน อสม.ต่อหลังคาเรือน', ['kukks/report3']);
    ?>
</p>

<p>
    <?php
    echo \yii\helpers\Html::a('4) ผู้สูงอายุที่ได้รับการเยี่ยมบ้าน', ['kukks/report4']);
    ?>
</p>

<div class="footerrow" style="padding-top: 60px">
    <div class="alert alert-success">
        หมายเหตุ : ระบบรายงานอยู่ระหว่างพัฒนาอย่างต่อเนื่อง
    </div>
</div>
