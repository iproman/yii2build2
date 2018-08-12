<?php
/**
 * Created by PhpStorm.
 * User: iproman
 * Date: 12.08.2018
 * Time: 23:12
 */

namespace common\models;

use common\models\ValueHelpers;
use yii;
use yii\web\Controller;
use yii\helpers\Url;

class PermissionHelpers
{
    /**
     * check if the user is the owner of the record
     *    use Yii::$app->user->identity->id for $userid, 'string' for model name
     *    for example 'profile' will check the profile model to see if the user
     *    owns the record. Provide the model instance, typically as $model->id as
     *    the last parameter. Returns true or false, so you can wrap in if statement
     *
     * @param $model_name
     * @param $model_id
     * @return bool
     * @throws yii\db\Exception
     */
    public static function userMustBeOwner($model_name, $model_id)
    {
        $connection = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "
            SELECT id
            FROM $model_name
            WHERE user_id=:userid AND id=:model_id
        ";
        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);
        $command->bindValue(":model_id", $model_id);
        if ($result = $command->queryOne()) {
            return true;
        } else {
            return false;
        }

    }
}