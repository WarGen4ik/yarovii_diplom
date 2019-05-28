<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Statement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="statement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'worker_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Workers::find()->all(), 'id', 'fio')) ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\Statement::getStatusNames()) ?>

    <?= $form->field($model, 'cityFrom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cityTo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
