<?php
namespace app\components;

use app\models\Solutions;


class StringTools
{
    public static function getSolutionName($id) {

        $name_query = Solutions::find()->where(['id' => $id])->one();

        $name = $name_query->name;

        return $name;
    }
}