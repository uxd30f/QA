<?php
/**
 * Created by PhpStorm.
 * User: wlw
 * Date: 2017/10/9
 * Time: 21:19
 */

namespace Home\Model;


use Think\Model\RelationModel;

class UserinfoModel extends RelationModel
{
    protected $_link = [

        'archives' => [
            'mapping_type' => self::HAS_ONE,
            'class_name' => 'archives',
            'foreign_key' => 'userId',
        ]

    ];
}