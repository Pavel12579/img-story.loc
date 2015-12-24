<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 24.12.2015
 * Time: 19:47
 */

namespace app\models\entity;
use yii\db\ActiveRecord;

class Img extends  ActiveRecord {
    public static function tableName() {
        return 'image';
    }
}