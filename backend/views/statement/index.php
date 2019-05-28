<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StatementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statement-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'worker_id',
                'value' => function (\common\models\Statement $model) {
                    if ($model->worker) {
                        return Html::a($model->worker->fio, '/workers/view/' . $model->worker_id);
                    }
                    return 'N\A';
                },
                'format' => 'raw',
            ],
            'fio',
            'phone',
            'cityFrom',
            'cityTo',
            [
                'attribute' => 'status',
                'filter' => \common\models\Statement::getStatusNames(),
                'value' => function (\common\models\Statement $model) {
                    return \common\models\Statement::getStatusName($model->status);
                }
            ],
            'created_at',
            //'volume',
            //'weight',
            //'created_by',
            [
                'attribute' => 'updated_by',
                'value' => function ($model) {
                    return $model->updatedBy->email;
                }
            ],
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
