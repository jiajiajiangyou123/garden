<?php
/**
 * Created by PhpStorm.
 * User: wangjia
 * Date: 2018/7/10
 * Time: 11:08
 */

namespace app\admin\validate;

use think\Validate;

class Role extends Validate
{
    protected $rule = [
        'rolename'             =>   'require',
        'type'             =>   'require',
        'desc'             =>   'require',
        'status'             =>   'require',
    ];

    protected $message = [
        'rolename'            =>  '角色名称不能为空',
        'type'             =>   '角色类型不能为空',
        'desc'          =>   '角色描述不能为空',
        'status'          =>   '角色状态不能为空',
    ];

    protected $scene = [
        'add'   => ['rolename', 'type','desc','status'],
        'edit'   => ['rolename', 'type','desc','status'],
    ];
}