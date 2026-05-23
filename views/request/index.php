<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\widgets\ListView;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мои заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Подать заявку', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Оставить отзыв', ['/review/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'pager' => [
            'class' => LinkPager::class,
        ]
    ]);
    ?>

</div>
