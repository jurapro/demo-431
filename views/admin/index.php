<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>


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
