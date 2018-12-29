<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2018/12/28
 * Time: 10:48
 */

use backend\assets\AppAsset;
use yii\bootstrap\Html;


AppAsset::register($this);

?>

<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- 输出head  -->
    <?php $this->head() ?>
</head>
<body class="login">
<?php $this->beginBody() ?>
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <?= $content ?>
</div>
<!--存放js代码-->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>


