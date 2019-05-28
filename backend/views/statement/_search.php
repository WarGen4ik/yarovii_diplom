<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StatementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="statement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'worker_id') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'cityFrom') ?>

    <?php // echo $form->field($model, 'cityTo') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
