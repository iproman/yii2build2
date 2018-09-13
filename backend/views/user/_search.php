<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['options' => ['class' => 'col-md-4']]) ?>

    <?= $form->field($model, 'username', ['options' => ['class' => 'col-md-4']]) ?>

    <?= $form->field($model, 'email', ['options' => ['class' => 'col-md-4']]) ?>

    <?= $form->field($model, 'role_id', ['options' => ['class' => 'col-md-4']])
        ->dropDownList(User::getRoleList(),
            ['prompt' => 'Please Choose One']) ?>

    <?= $form->field($model, 'user_type_id', ['options' => ['class' => 'col-md-4']])
        ->dropDownList(User::getUserTypeList(),
            ['prompt' => 'Please Choose One']) ?>

    <?= $form->field($model, 'status_id', ['options' => ['class' => 'col-md-4']])
        ->dropDownList($model->statusList,
            ['prompt' => 'Please Choose One']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
