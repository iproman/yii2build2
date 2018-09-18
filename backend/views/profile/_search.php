<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Profile;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'first_name', ['options' => ['class' => 'col-md-4']]) ?>

    <?= $form->field($model, 'last_name', ['options' => ['class' => 'col-md-4']]) ?>

    <?= $form->field($model, 'birthdate', ['options' => ['class' => 'col-md-4']]) ?>

    <?php echo $form->field($model, 'gender_id', ['options' => ['class' => 'col-md-4']])
        ->dropDownList(Profile::getGenderList(), ['prompt' => 'Please Choose One']) ?>
    <div class="clear" style="clear: both"></div>
    <div class="col-md-4">
        <div class="form-group clear">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
