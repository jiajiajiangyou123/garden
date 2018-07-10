<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

if (!function_exists('json_data')) {
    function json_data($data='',$url='',$state=0)
    {
        $result = [];
        $result['info'] = $state == 1 ? '操作成功' : '操作失败';

        if ($data != '') {
            $result['info'] = $data;
        }
        $result['url'] = $url;
        $result['state'] = $state;

        echo json_encode($result);exit;
    }
}

if (!function_exists('api_json')) {
    function api_json($data=[],$msg='',$code=100,$errCode="SystemErr")
    {
        echo json_encode(array(
            "data"      =>  $data,
            "msg"       =>  $msg,
            "code"      =>  $code,
            "errCode"   =>  $errCode
        ));exit;
    }
}

if (!function_exists('menu_tree')) {
    function menu_tree($list, $pid=0)
    {
        $result = array();
        if(is_array($list)){
            foreach($list as $key => $value){
                if ($value['pid'] == $pid) {
                    $pid++;
                    menu_tree($list,$pid);
                }
            }
        }
        return $list;
    }
}

if (!function_exists('md12345')) {
    function md12345($password)
    {
        return md5(md5('jiaboyuan-'.$password).'nauyobaij');
    }
}

if (!function_exists('my_dump_say()')) {
    function my_dump_say($data)
    {
        echo "<pre>";print_r($data);exit;
    }
}


if (!function_exists('page_param')) {
    /*
     *  @Title  page_param
     *  @Description TODO::组织分页参数
     * */
    function page_param(){
        $param = request()->param();
        if (isset($param['_pjax'])){
            unset($param['_pjax']);
        }
        $res['query'] = $param;
        return $res;
    }
}