<?php

use app\components\MenuWidget;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group field-product-category_id has-success">
        <label for="product-category_id" class="control-label">Родителськая категория</label>
        <select name="Product[category_id]" id="product-category_id" class="form-control">
            <?= MenuWidget::widget(['tpl' => 'select_product', 'model' => $model]) ?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!--    --><? //= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php
    //    echo $form->field($model, 'content')->widget(CKEditor::class, [
    //        'editorOptions' => [
    //            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
    //            'inline' => false, //по умолчанию false
    //        ],
    //    ]);

    echo $form->field($model, 'content')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', []),
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hit')->checkbox(['0', '1']) ?>

    <?= $form->field($model, 'new')->checkbox(['0', '1']) ?>

    <?= $form->field($model, 'sale')->checkbox(['0', '1']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
