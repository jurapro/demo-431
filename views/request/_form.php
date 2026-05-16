<?php

use app\models\Course;
use app\models\PaymentMethod;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var app\models\Request $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $courses = Course::find()
        ->select(['name'])
        ->indexBy('id')
        ->column();

    $paymentMethods = PaymentMethod::find()
        ->select(['name'])
        ->indexBy('id')
        ->column();
    ?>

    <?= $form->field($model, 'course_id')->dropdownList($courses, ['prompt'=>'Выберите курс']); ?>

    <?= $form->field($model, 'started_at')->input('date') ?>

    <?= $form->field($model, 'payment_method_id')->dropdownList($paymentMethods, ['prompt'=>'Выберите предпочтительный способ оплаты']); ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
