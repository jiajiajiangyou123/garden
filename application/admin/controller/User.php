<?php
/**
 * Created by PhpStorm.
 * User: wangjia
 * Date: 2018/6/26
 * Time: 19:58
 */

namespace app\admin\controller;

use app\admin\model\Admin as Admins;
use app\admin\controller\Admin as Admin;

class User extends Admin
{
    private $_model;
    public function _initialize()
    {
        $this->_model = new Admins();
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    public function index()
    {
        $roles = $this->_model->select();
        if ($roles) {
            $roles = collection($roles)->toArray();
        }

        $this->assign('role',$roles);
        return $this->fetch();
    }

    public function create()
    {
        $data = input('post.');
        $res = $this->_model->validate('Role.create')->allFlow(true)->isUpdate(false)->save($data);
        if (!$res) {
            return json_data();
        }
        return json_data('添加成功');
    }

    public function edit()
    {
        $data = input('post.');
        if (!isset($data['id']) || !$data['id']) {
            return json_data();
        }
        $this->_model->_where['id'] = $data['id'];
        $res = $this->_model->validate('Role.create')->where($this->_model->_where)
            ->allFlow(true)->isUpdate(false)
            ->save($data);
        if ($res !== false) {
            return json_data('','',1);
        }
        return json_data();
    }

    public function delete()
    {
        $this->_model->_getId();
        $this->_model->_where['id'] = $this->_model->_id;
        $res = $this->_model->where($this->_model->_where)->delete();
        if ($res) {
            return json_data('','',1);
        }

        return json_data();
    }

    protected function setCreateTimeAttr()
    {
        return time();
    }
}