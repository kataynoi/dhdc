<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>

        <?php $this->beginBody() ?>
        <div class="wrap">

            <?php
            NavBar::begin([
                'brandLabel' => '<span class="glyphicon glyphicon-th-large"></span>',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-custom navbar-fixed-top',
                ],
            ]);

            if (Yii::$app->user->isGuest) {
                $submenuItems[] = ['label' => 'สมัครผู้ใช้', 'url' => ['/site/signup']];
                $submenuItems[] = ['label' => 'เข้าระบบ', 'url' => ['/site/login']];
            } else {

                //$submenuItems[] = ['label' => 'ตั้งค่า', 'url' => ['/user/index']];

                $submenuItems[] = [
                    'label' => 'ออกจากระบบ',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }

            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> ประชากร', 'url' => ['#']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> โรคติดต่อ', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> โรคไม่ติดต่อ', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> แม่และเด็ก', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> ภูมิคุ้มกันโรค', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> แพทย์แผนไทยและแพทย์ทางเลือก', 'url' => ['knott/index']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> สุขภาพจิต', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> หมอประจำครอบครัว', 'url' => ['kukks/index']];
            if (!Yii::$app->user->isGuest) {
                $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-refresh"></span> คำสั่ง sql', 'url' => ['runquery/index']];
            }
            $username = '';
            if (!Yii::$app->user->isGuest) {
                $username = '(' . Html::encode(Yii::$app->user->identity->username) . ')';
            }

            $report_mnu_check_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> PERSON TYPE', 'url' => ['personcheck/checktype']];
            $report_mnu_check_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> PERSON CID', 'url' => ['#']];
            $report_mnu_check_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> PERSON ต่างด้าว', 'url' => ['#']];

            $menuItems = [
                ['label' => '<span class="glyphicon glyphicon-floppy-open"></span> นำเข้าข้อมูล', 'url' => ['/uploadfortythree/index']],
                ['label' =>
                    '<span class="glyphicon glyphicon-folder-open"></span> ปริมาณข้อมูล',
                    'url' => ['syscountall/index']
                ],
                ['label' =>
                    '<span class="glyphicon glyphicon-list-alt"></span> รายงานข้อมูลผลงาน',
                    'items' => $report_mnu_itms
                ],
                ['label' =>
                    '<span class="glyphicon glyphicon-check"></span> ตรวจสอบข้อมูล',
                    'items' => $report_mnu_check_itms
                ],
                ['label' => '<span class="glyphicon glyphicon-user"></span> ผู้ใช้งาน ' . $username,
                    'items' => $submenuItems
                ],
                ['label' => 'เกี่ยวกับ', 'url' => ['site/about']],
            ];


            $config_main = backend\models\Sysconfigmain::find()->one();

            $center = isset($config_main->district_name) ? $config_main->district_name : 'Not set';
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'encodeLabels' => false,
                'items' => [['label' => 'DHDC : ศูนย์ข้อมูล43แฟ้ม อ.' . Html::encode($center)]],
            ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => $menuItems,
            ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
            ]);

            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">
                    <?= Html::encode($center) ?> ,

                    <?php
                    $ver = file_get_contents(Yii::getAlias('@version/version.txt'));
                    $ver = explode(',', $ver);
                    ?>
                    เวอร์ชั่น: <?= $ver[0] ?>

                </p>

                <p class="pull-right"><?= Html::a('DHDC TEAM', ['site/about']) ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
