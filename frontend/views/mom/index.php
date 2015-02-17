<?php
/* @var $this yii\web\View */
?>
<h1>หมวดรายงาน-แม่และเด็ก</h1>

<p>
    <?php
    echo \yii\helpers\Html::a('1) หญิงมีครรภ์ได้รับการฝากครรภ์ครบ 5 ครั้งตามเกณฑ์', ['mom/report1']);
    ?>
</p>
<p>
    <?php
    echo \yii\helpers\Html::a('2) หญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรก ก่อน 12 สัปดาห์', ['mom/report2']);
    ?>
</p>
<p>
    <?php
    echo \yii\helpers\Html::a('3) เด็กอายุ 5 ปีได้รับวัคซีน DTP5', ['mom/report3']);
    ?>
</p>
<p>
    <?php
    echo \yii\helpers\Html::a('4) ทารกแรกเกิดน้ำหนักน้อยกว่า 2500 กรัม', ['mom/report4']);
    ?>
</p>


<div class="footerrow" style="padding-top: 60px">
    <div class="alert alert-success">
        หมายเหตุ : ระบบรายงานอยู่ระหว่างพัฒนาอย่างต่อเนื่อง
    </div>
</div>
