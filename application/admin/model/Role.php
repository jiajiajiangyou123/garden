<?php
/**
 * Created by PhpStorm.
 * User: wangjia
 * Date: 2018/6/26
 * Time: 19:38
 */

namespace app\admin\model;

use app\common\model\Common;

class Role extends Common
{
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }
}