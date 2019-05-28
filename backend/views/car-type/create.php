<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CarTypes */

$this->title = 'Створити тип';
$this->params['breadcrumbs'][] = ['label' => 'Типи машин', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
