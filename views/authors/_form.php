<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Author $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php /** @var $list */ ?>
<?php /** @var $selectedBookIds */ ?>
<div class="author-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(
        [
            'maxlength' => true,
            'class' => 'form-control form-control-sm'
        ]
    ) ?>
    <?= $form->field($model, 'email')->textInput(
        [
            'maxlength' => true,
            'class' => 'form-control form-control-sm'
        ]
    ) ?>
    <label>Books</label>
    <?php if (is_null($selectedBookIds)) : ?>
        <select class="form-select" name="books[]" multiple aria-label="multiple select example">
            <?php foreach ($list as $item) : ?>
                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
            <?php endforeach ?>
        </select>
    <?php else : ?>
        <select class="form-select" name="books[]" multiple aria-label="multiple select example">
            <?php foreach ($list as $item) : ?>
                <?php if (in_array($item['id'], $selectedBookIds)) : ?>
                    <option selected value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                <?php else :?>
                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                <?php endif; ?>
            <?php endforeach ?>
        </select>
    <?php endif; ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm mt-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
