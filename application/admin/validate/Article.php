<?php
/**
 * Created by PhpStorm.
 * User: wangjia
 * Date: 2018/7/10
 * Time: 11:08
 */

namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'title'             =>   'require',
        'logo'             =>   'require',
        'label'             =>   'require',
        'content'             =>   'require',
    ];

    protected $message = [
        'title'            =>  '标题不能为空',
        'logo'             =>   '图片不能为空',
        'label'             =>   '标签不能为空',
        'content'          =>   '内容不能为空',
    ];

    protected $scene = [
        'add'   => ['title', 'logo','content','label'],
    ];
}