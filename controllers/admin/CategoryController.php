<?php
namespace app\controllers\admin;

use app\models\entity\Category;
use yii\web\Controller;
use Yii;

class CategoryController extends Controller {

    public function actionNew() {
//        $categories = Category::find()->all();
        $categories = Category::findAll(["parent_id" => null]);
        return $this->render("create", [
            'categories' => $categories
        ]);
    }

    public function actionCreate() {
        $post = Yii::$app->request->post();

        $category = new Category();
        $category->name = $post['name'];
        $category->parent_id = $post['parent_id'];
        $category->save();

        $this->redirect('/admin/category/new');
    }

}