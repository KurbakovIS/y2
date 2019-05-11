<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="container">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <?php echo Yii::$app->session->getFlash('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible " role="alert">
            <?php echo Yii::$app->session->getFlash('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    <?php endif; ?>

    <?php
    if (!empty($session['cart'])): ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименовение</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                    <th><span class="glyphicon glyphicon-remove"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($session['cart'] as $id => $item): ?>
                    <tr>
                        <td><?= Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'],
                                'height' => 50]) ?></td>
                        <td><a href="<?= Url::to(['product/view', 'id' => $id]) ?>"><?= $item['name'] ?></a></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['qty'] * $item['price'] ?></td>
                        <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item"></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5">Итого:</td>
                    <td><?= $session['cart.qty'] ?></td>
                </tr>
                <tr>
                    <td colspan="5">На сумму:</td>
                    <td><?= $session['cart.sum'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($order, 'name') ?>
        <?= $form->field($order, 'email') ?>
        <?= $form->field($order, 'phone') ?>
        <?= $form->field($order, 'address') ?>
        <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end() ?>
    <?php else: ?>
        <h3>Корзина пуста</h3>
    <?php endif; ?>

</div>