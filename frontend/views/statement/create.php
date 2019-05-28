<?php
/**
 * @var $model \frontend\models\StatementForm
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html; ?>

<div class="container" style="margin-bottom: 150px">

    <h1>Створення заявки</h1>

    <?php $form = ActiveForm::begin(['id' => 'statement-form']); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'fio') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->input('tel') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'cityFrom') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'cityTo') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'weight')->input('number', ['step' => 0.01]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'volume')->input('number', ['step' => 0.01]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Створити заявку', ['class' => 'btn btn-primary', 'name' => 'statement-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
