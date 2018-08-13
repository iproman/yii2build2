<?php
/**
 * Created by PhpStorm.
 * User: iproman
 * Date: 14.08.2018
 * Time: 1:20
 */

namespace common\models;

use yii;

class RecordHelpers
{
    /**
     * @param $model_name
     * @return bool
     * @throws yii\db\Exception
     */
    public static function userHas($model_name)
    {
        $connection = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "SELECT id FROM $model_name WHERE user_id=:userid";
        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);
        $result = $command->queryOne();

        if ($result == null) {
            return false;
        } else {
            return $result['id'];
        }
    }
}