<?php

use app\models\Request;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user.email',
            'status.name',
            'paymentMethod.name',
            'course.name',
            'started_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{update}',
                'visibleButtons' => [
                    'update' => function ($model, $key, $index) {
                        return $model->status->code === 'new' || $model->status->code === 'in_progress';
                    },
                ],
                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
                    return Url::toRoute(['/request/update', 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
