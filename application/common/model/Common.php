<?php
/**
 * Created by PhpStorm.
 * User: wangjia
 * Date: 2018/6/26
 * Time: 17:44
 */

namespace app\common\model;

use think\Model;

class  Common extends Model
{
    public $_where = [];
    public $_fields = "*";
    public $_search;
    public $_id;

    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    public function getSearch()
    {
        $this->_search = input('get._search') ? input('get._search') : '';
        return $this;
    }

    public function _getId()
    {
        $this->_id = input('get.id') ? input('get.id') : 0;
        return $this;
    }

}