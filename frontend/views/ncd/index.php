<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<h3>หมวดรายงาน-โรคไม่ติดต่อ</h3>

<p>
    <?php
    echo Html::a('1) Color chart ผู้ป่วยความดันโลหิต-HT(ทราบผลคอเลสเตอรอล)(ปรับ 20150217)', ['ncd/report1']);
    ?>
</p>
<p>
    <?php
    echo Html::a('2) Color chart ผู้ป่วยความดันโลหิต-HT(ไม่ทราบผลคอเลสเตอรอล)(ปรับ 20150217)', ['ncd/report2']);
    ?>
</p>
<p>
    <?php
    echo Html::a('3) Color chart ผู้ป่วยเบาหวาน-DM(ทราบผลคอเลสเตอรอล)(ปรับ 20150217)', ['ncd/report3']);
    ?>
</p>
<p>
    <?php
    echo Html::a('4) Color chart ผู้ป่วยเบาหวาน-DM(ไม่ทราบผลคอเลสเตอรอล)(ปรับ 20150217)', ['ncd/report4']);
    ?>
</p>
<p>
    <?php
    echo Html::a('5) ผู้ป่วยเบาหวานได้รับการตรวจ HbA1c และควบคุมน้ำตาลได้ดี (ปรับ 20150217)', ['ncd/report5']);
    ?>
</p>
<p>
    <?php
    echo Html::a('6) ผู้ป่วยความดันโลหิตสูงควบคุมความดันโลหิตได้ดี (ปรับ 20150217)', ['ncd/report6']);
    ?>
</p>

<div class="footerrow" style="padding-top: 60px">
    <div class="alert alert-success">
        หมายเหตุ : ระบบรายงานอยู่ระหว่างพัฒนาอย่างต่อเนื่อง
    </div>
</div>
