<?php
/**
 * Created by PhpStorm.
 * User: wangjia
 * Date: 2018/1/4
 * Time: 14:55
 */
namespace app\admin\validate;

use think\Validate;

class Menu extends Validate
{
    protected $rule = [
        'name'             =>   'require',
        'module'             =>   'require',
        'controller'             =>   'require',
        'action'             =>   'require',
        'icon'             =>   'require',
    ];

    protected $message = [
        'id'            =>  'ID错误',
        'name'             =>   '名称不能为空',
        'module'             =>   '模块不能为空',
        'controller'             =>   '控制器不能为空',
        'url'             =>   '路径不能为空',
        'icon'             =>   '图标不能为空',
    ];

    protected $scene = [
        'add'   => ['name', 'module','controller','icon'],
        'edit'   => ['id','name', 'module','controller','icon'],
    ];
}