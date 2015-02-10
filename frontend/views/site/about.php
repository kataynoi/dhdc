<?php

use yii\helpers\Html;
use backend\models\Sysconfigmain;

/* @var $this yii\web\View */
$this->title = 'เกียวกับ';
$this->params['breadcrumbs'][] = $this->title;
$sys = Sysconfigmain::find()->one();
?>
<div class="site-about">
    <h1>ผู้ดูแลระบบ</h1>
    <p>- <?= $sys->note1 ?></p>
</div>
<hr>
<div class="site-about">
    <h3>ทีมพัฒนาโปรแกรม และรายงาน</h3>

    <p>- <?=  Html::a('คุณอุเทน จาดยางโทน', 'https://fb.com/tehnn',['target'=>'_blank'])?> (สสจ.พิษณุโลก)</p>
    <p>- <?=  Html::a('คุณศรศักดิ์ สีหะวงษ์', 'https://fb.com/sosplk',['target'=>'_blank'])?> (สสจ.พิษณุโลก)</p>
    <p>- <?=  Html::a('คุณสุจินต์ สุกกล้า', 'https://fb.com/jub.wifi',['target'=>'_blank'])?> (รพท.ศรีสังวรณ์ สุโขทัย)</p>
    <p>- <?=  Html::a('คุณสุพัฒนา ปิงเมือง', 'https://fb.com/kukks205',['target'=>'_blank'])?> (รพสต.ผักตบ อ.หนองหาน จ.อุดรธานี)</p>
    <p>- <?=  Html::a('คุณสันติ จีนะสอน', 'https://fb.com/gcantei',['target'=>'_blank'])?> (สสอ.เมือง จ.เพชรบูรณ์)</p>
    <p>- <?=  Html::a('คุณนครินทร์ เกตุวีระพงศ์', 'https://fb.com/nakharin.knott',['target'=>'_blank'])?> (รพ.วัดโบสถ์ จ.พิษณุโลก)</p>
    <p>- <?=  Html::a('คุณวัชรพงษ์ วัชรินทร์', 'https://fb.com/profile.php?id=100001212955625',['target'=>'_blank'])?> (สสจ.แพร่)</p>
</div>
<div>
    <?=  Html::a('กลุ่ม Facebook DHDC','https://www.facebook.com/groups/1533692120236074/',['target'=>'_blank']) ?>
</div>

<div class="site-about">
    <?php
    $ver = file_get_contents(Yii::getAlias('@version/version.txt'));
    $ver = explode(',', $ver);
    ?>
    <h3>frontend version: <?= $ver[0] ?></h3>
</div>
