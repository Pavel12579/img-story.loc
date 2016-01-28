<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 24.12.2015
 * Time: 19:43
 */

namespace app\controllers\admin;

use app\models\entity\Category;
use app\models\entity\Img;
use app\models\UploadForm;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

class ImgController extends Controller {
    public function actionImg() {
        $categories = Category::find()->all();
        $uploadModel = new UploadForm();
        return $this->render("save", [
            'categories' => $categories,
            'uploadModel' => $uploadModel
        ]);
    }

    public function actionSave() {
        $post = Yii::$app->request->post();

        $imgs = new Img();
        $imgs->title = $post['title'];
        $imgs->description = $post['description'];
        $imgs->src = $post['src'];
        $imgs->category_id = $post['category_id'];
        $imgs->save();

        $this->redirect('/admin/img/img');
    }

    public function actionImage() {
        $model = new UploadForm();
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
        if ($model->upload()) {
            return $this->redirect('/admin/img/img?imgUrl=' . $model->getImgSrc());
        }
    }
}