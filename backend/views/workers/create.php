<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Workers */

$this->title = 'Додати водія';
$this->params['breadcrumbs'][] = ['label' => 'Водії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
