<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['action' => 'image', 'options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($uploadModel, 'imageFile')->fileInput() ?>

<button id="imgUploadBtn">Upload</button>

<?php ActiveForm::end() ?>
<div class="row">
    <div class="col-xs-6 col-md-3">
        <a href="#" class="thumbnail">
            <img src="<?=Yii::$app->request->get('imgUrl')?>">
        </a>
    </div>
</div>
<form action="save" method="post">

    <div class="form-group">
        <label for="postCode" class="col-sm-2 control-label">
            Название:
        </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="title">
        </div>
    </div>

    <div class="form-group">
        <label for="postCode" class="col-sm-2 control-label">
            Описание:
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description">
        </div>
    </div>

    <!--<div class="form-group">
        <label for="postCode" class="col-sm-2 control-label">
            Ссылка на картинку:
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="src">
        </div>
    </div>-->
    <input type="hidden" class="form-control" name="src" value="<?=Yii::$app->request->get('imgUrl')?>">


    <label for="postCode" class="col-sm-2 control-label">
        Выбрать категорию:
    </label>
    <select name="category_id">
        <option>-- нету --</option>
        <? foreach($categories as $category) { ?>
            <option value="<?=$category->id?>">
                <?=$category->name?>
            </option>
        <? } ?>
    </select>
    <br><br>
    <input type="submit" value="Cохранить картинку">
</form>