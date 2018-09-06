<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Collapse;
use yii\bootstrap\Alert;
use kartik\social\FacebookPlugin;

$this->title = Yii::$app->params['brandLabel'];
?>
<div class="site-index">
    <div class="jumbotron">
        <?php If (Yii::$app->user->isGuest) {
            echo Html::a(
                'Get Started Today',
                ['site/signup'],
                ['class' => 'btn btn-lg btn-success']);
        }; ?>
        <h1><?= Yii::$app->params['brandLabel'] ?></h1>

        <p class="lead">Use this Yii 2 Template to start Project</p>

        <br>
        <?= Alert::widget([
            'options' => [
                'class' => 'alert-info',
            ],
            'body' => 'Launch your project like a rocket ...',
        ]); ?>
    </div>
</div>
<div class="body-content">
    <div class="row">
        <div class="col-lg-4">
            <h2>Free</h2>
            <p>
                <?php
                if (!Yii::$app->user->isGuest) {
                    echo Yii::$app->user->identity->username . ' is doing cool stuff. ';
                }
                ?>
                Starting with this free, open source Yii 2 template and it will save you
                a lot of time. You can deliver projects to the customer quickly, with
                a lot of boilerplate already taken care of for you, so you can concentrate
                on the complicated stuff.
            </p>
            <p>
                <a href="http://www.yiiframework.com/doc/" class="btn btn-default">
                    Yii Documentation &raquo;
                </a>
            </p>
            <p>FacebookPlugin LIKE</p>
        </div>
        <div class="col-lg-4">
            <h2>Advantage</h2>
            <p>
                Ease of use is a huge advantage. We've simplifiled RBAC and given you Free/Paid
                user type out of the box. The Social plugins are so quick and easy to install,
                you will love it!
            </p>
            <p>
                <a href="http://www.yiiframework.com/forum/" class="btn btn-default">
                    Yii Forum &raquo;
                </a>
            </p>
            <p>
                FacebookPlugin COMMENT
            </p>
        </div>
        <div class="col-lg-4">
            <h2>Code Quick, Code Right!</h2>
            <p>
                Leverage the power of the awesome Yii 2 framework with this enhanced template.
                Based Yii 2's advanced template, you get a full frontend and backend
                implementation that features rich UI for backend management.
            </p>
            <p>
                <a href="http://www.yiiframework.com/extensions/" class="btn btn-default">
                    Yii Extensions &raquo;</a>
            </p>
        </div>
    </div>
</div>