<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2019/1/16
 * Time: 18:59
 */

use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;

$this->title = '主页';

?>

<div class="row tile_count">
    <?php foreach ($cards as $key => $card) : ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-<?= $card['icon'] ?>"></i> <?= $card['title'] ?></span>
        <?php if ( isset($card['trend']) ) : ?>
            <?php if($card['trend']=='up'||$card['trend']===true) : ?>
                <div class="count green"><?= ArrayHelper::getValue($card,'value') ?></div>
                <span class="count_bottom">
                    <i class="green">
                        <i class="fa fa-sort-asc"></i>
            <?php else : ?>
                <div class="count red"><?= ArrayHelper::getValue($card,'value') ?></div>
                <span class="count_bottom">
                    <i class="red">
                        <i class="fa fa-sort-desc"></i>
            <?php endif; ?>
        <?php else : ?>
            <div class="count"><?= ArrayHelper::getValue($card,'value') ?></div>
            <span class="count_bottom">
        <?php endif; ?>
                <?= ArrayHelper::getValue($card,'trendValue') ?>
                </i>
            <?= ArrayHelper::getValue($card,'trendText') ?>
        </span>
    </div>
    <?php endforeach; ?>
</div>


<div class="row">
    <div class="dashboard_graph">
    <div class="col-md-12 x_title">
        <h3><?= ArrayHelper::getValue($graph,'title') ?> <small><?= ArrayHelper::getValue($graph,'subTitle') ?></small></h3>
    </div>
    <div class="col-sm-9">
        <div class="chart_plots" style="width: 100%;height: 300px;" data-data='[["01-11",20],["01-12",298],["01-13",40],["01-14",300],["01-15",120],["01-16",303],["01-17",306]]'></div>
    </div>
    <div class="col-sm-3 bg-white">
            <div class="x_title">
                <h2>关键指标</h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-6">
                <?php foreach($keyFactors as $key => $factor) : ?>
                <div>
                    <p><?= ArrayHelper::getValue($factor,'title') ?></p>
                    <div class="">
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=  ArrayHelper::getValue($factor,'value')?>"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>




