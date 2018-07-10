<?php
/**
 * Created by PhpStorm.
 * User: wangjia
 * Date: 2018/6/27
 * Time: 19:51
 */

namespace app\admin\model;

use app\common\model\Common as Common;

class Menu extends Common
{
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    public function setIsMenuAttr($value)
    {
        return $value == "on" ? 1 : 0;
    }


}