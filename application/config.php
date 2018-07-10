<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    // 应用调试模式
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => false,
    // 应用模式状态
    'app_status'             => '',
    // 是否支持多模块
    'app_multi_module'       => true,
    // 入口自动绑定模块
    'auto_bind_module'       => false,
    // 注册的根命名空间
    'root_namespace'         => [],
    // 扩展函数文件
    'extra_file_list'        => [THINK_PATH . 'helper' . EXT],
    // 默认输出类型
    'default_return_type'    => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'    => 'json',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler'  => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler'      => 'callback',
    // 默认时区
    'default_timezone'       => 'PRC',
    // 是否开启多语言
    'lang_switch_on'         => false,
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'         => '',
    // 默认语言
    'default_lang'           => 'zh-cn',
    // 应用类库后缀
    'class_suffix'           => false,
    // 控制器类后缀
    'controller_suffix'      => false,

    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    // 默认模块名
    'default_module'         => 'index',
    // 禁止访问模块
    'deny_module_list'       => ['common'],
    // 默认控制器名
    'default_controller'     => 'Index',
    // 默认操作名
    'default_action'         => 'index',
    // 默认验证器
    'default_validate'       => '',
    // 默认的空控制器名
    'empty_controller'       => 'Error',
    // 操作方法后缀
    'action_suffix'          => '',
    // 自动搜索控制器
    'controller_auto_search' => false,

    // +----------------------------------------------------------------------
    // | URL设置
    // +----------------------------------------------------------------------

    // PATHINFO变量名 用于兼容模式
    'var_pathinfo'           => 's',
    // 兼容PATH_INFO获取
    'pathinfo_fetch'         => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr'          => '/',
    // URL伪静态后缀
    'url_html_suffix'        => 'html',
    // URL普通方式参数 用于自动生成
    'url_common_param'       => false,
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type'         => 0,
    // 是否开启路由
    'url_route_on'           => true,
    // 路由使用完整匹配
    'route_complete_match'   => false,
    // 路由配置文件（支持配置多个）
    'route_config_file'      => ['route'],
    // 是否强制使用路由
    'url_route_must'         => false,
    // 域名部署
    'url_domain_deploy'      => false,
    // 域名根，如thinkphp.cn
    'url_domain_root'        => '',
    // 是否自动转换URL中的控制器和操作名
    'url_convert'            => true,
    // 默认的访问控制器层
    'url_controller_layer'   => 'controller',
    // 表单请求类型伪装变量
    'var_method'             => '_method',
    // 表单ajax伪装变量
    'var_ajax'               => '_ajax',
    // 表单pjax伪装变量
    'var_pjax'               => '_pjax',
    // 是否开启请求缓存 true自动缓存 支持设置请求缓存规则
    'request_cache'          => false,
    // 请求缓存有效期
    'request_cache_expire'   => null,
    // 全局请求缓存排除规则
    'request_cache_except'   => [],

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 默认模板渲染规则 1 解析为小写+下划线 2 全部转换小写
        'auto_rule'    => 1,
        // 模板路径
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',
    ],

    // 视图输出字符串内容替换
    'view_replace_str'       => [],
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'    => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',

    // +----------------------------------------------------------------------
    // | 异常及错误设置
    // +----------------------------------------------------------------------

    // 异常页面的模板文件
    'exception_tmpl'         => THINK_PATH . 'tpl' . DS . 'think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'          => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'         => false,
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'       => '',

    // +----------------------------------------------------------------------
    // | 日志设置
    // +----------------------------------------------------------------------

    'log'                    => [
        // 日志记录方式，内置 file socket 支持扩展
        'type'  => 'File',
        // 日志保存目录
        'path'  => LOG_PATH,
        // 日志记录级别
        'level' => [],
    ],

    // +----------------------------------------------------------------------
    // | Trace设置 开启 app_trace 后 有效
    // +----------------------------------------------------------------------
    'trace'                  => [
        // 内置Html Console 支持扩展
        'type' => 'Html',
    ],

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------

    'cache'                  => [
        // 驱动方式
        'type'   => 'File',
        // 缓存保存目录
        'path'   => CACHE_PATH,
        // 缓存前缀
        'prefix' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],

    // +----------------------------------------------------------------------
    // | 会话设置
    // +----------------------------------------------------------------------

    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'think',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
    ],

    // +----------------------------------------------------------------------
    // | Cookie设置
    // +----------------------------------------------------------------------
    'cookie'                 => [
        // cookie 名称前缀
        'prefix'    => '',
        // cookie 保存时间
        'expire'    => 0,
        // cookie 保存路径
        'path'      => '/',
        // cookie 有效域名
        'domain'    => '',
        //  cookie 启用安全传输
        'secure'    => false,
        // httponly设置
        'httponly'  => '',
        // 是否使用 setcookie
        'setcookie' => true,
    ],

    //分页配置
    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 15,
    ],
    /*QQ邮件配置*/
    'MAIL_HOST_QQ'  =>  'smtp.qq.com',
    "MAIL_PASSWORD_QQ"  =>  'rblewdyinaowhjaj',
    "MAIL_SEND_NAME_QQ" =>  '1415521548@qq.com',
    "MAIL_NAME_QQ"      =>  'Garden',
    "MAIL_USER_NAME_QQ" =>  '1415521548@qq.com',

    /*163网易邮件配置*/
    'MAIL_HOST_WY'  =>  'smtp.163.com',
    "MAIL_PASSWORD_WY"  =>  '163wangjia',
    "MAIL_SEND_NAME_WY" =>  '18768188384@163.com',
    "MAIL_NAME_WY"      =>  'Garden',
    "MAIL_USER_NAME_WY" =>  '18768188384@163.com',

    /*支付alipay配置*/
    //公钥
    'alipay_public_key'     =>  'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAt4jxhEINpM+6oXJBJSiNRJlnT/WT6msjWShqkDWV7N0ElkIwAciQCuWvJkU+uIBwp34xXx5bEbF8wHt0RDT7Agd5vFGVAsKvUITnfRF1w0LOQCLqvJcx5bqOvA4eYbXDVrGuJbku6U9m+9hcrIRG4XqzMMNQqG9V7lPyY502piv6YqM1Yc1SqdGkJZti753YX+GT+vWVUBXK1B8BlFd62oXSogL3R0V9UZt5n+y3ZhcU084RvJrDIS7rSOkcqTALl1cDafOLigZmkzRk2aMmZmFsmvkU2WF/xNkRoGJ66MkyABz8MTyHSylMKeSFz7jfY3ppqdWJhIS9wpUCvTK40QIDAQAB',
    //私钥
    'alipay_private_key'    =>  'MIIEpQIBAAKCAQEAt4jxhEINpM+6oXJBJSiNRJlnT/WT6msjWShqkDWV7N0ElkIwAciQCuWvJkU+uIBwp34xXx5bEbF8wHt0RDT7Agd5vFGVAsKvUITnfRF1w0LOQCLqvJcx5bqOvA4eYbXDVrGuJbku6U9m+9hcrIRG4XqzMMNQqG9V7lPyY502piv6YqM1Yc1SqdGkJZti753YX+GT+vWVUBXK1B8BlFd62oXSogL3R0V9UZt5n+y3ZhcU084RvJrDIS7rSOkcqTALl1cDafOLigZmkzRk2aMmZmFsmvkU2WF/xNkRoGJ66MkyABz8MTyHSylMKeSFz7jfY3ppqdWJhIS9wpUCvTK40QIDAQABAoIBAQC29rD2DTc2xtMhoRnqZiu2aEtCvelwNtAtUIozKwhD8e1hsafUD1HxWxmpSDyHh5tGjhm/3i4hTFO2Oxwj5sEYO8WTA61N7DEDTwrKdn50YoPkEir6SKu4fatPM6/77kxGf6jA+IQYmExs4js4zEExBLXf9cXRs/PxPASWY6KYMezNgpAo6+QE5tq2Y8oQ3Jx73WPPNiA3f0gdv7r6irbwp7xCKzRMHjH2HId6nJaUkvKzJenHav8drnkIyluHRuzvFRo8yFqr3xH0HbttxNw2B+EE8g5UCE2L/fbOKZbFJVklZmSfX1u4uLPGdK6igz9eiU3XWB5tIO5CdMh3c/UxAoGBAOF9W88NknjIj5Qh+9jSrOc5UYG2RkY3kEwwtBbVRFPIr/HXO5igrICtJjYccUOFuLuFrNa39Y9uYcASVAEHqnmjbCsAkkctCSn2kxNmLZbWwvFkqqErvHHJAXZ87Qp79ZgR4K9EmUHjHNG847Y75iPZjxT+rSLa/eKj8y82r5v9AoGBANBeVQZ2uifjUtOxi/QgWvjiOADCMucEXgO36lMMgt0r3dgyDs3Ub9fwC7Y5TZBLvfbZ9oA1LemSV9d15+38sWmB1ljWVRI9BCRDIqp5jRo/tAU9720NTUbMmaIy7lBXprEGzT3V6EQF3zQHBXwxgeOM3P3ruKNEVkIx+yBqP0ZlAoGAIx2AlKgKbWDeazU3oTZ90qxscwTNwNWaVSMoiH3B3EJelAzurQAonQlZ8AdR5DAI6rsQhYe0aBfKhTzVdCubcsHucGvwW8E5sh1CHj1FUD41sZ35rIvBFv80iR0/VOilAH+YO/M04rvZmxgNZi3B00doLt7SW6E69HaPwoSDqIkCgYEAgvM11jkZZuYLcLU9MnB/G7j33yos2Vi6SPX1krnjKGJgKnXTLfIbVActJRlAMLYZLaDvtMU3FHp/MA6OcteDG76YWf5hOnQUPUHf8Gkxj1SHq1+wL8XTUfJVf0Uo1l8viEOxCvJ65P0XuFfNT67BZaNqYz4YLKtO1o0YuNds6q0CgYEA0cI8Jka/I5xoHOap5nUgoZH9J0yw3W0fxBXt7TGkkTYVSxxabtmJQjVFevGEb2mG1083hiauGk5PqK4Z1xEkjO8w61zV0qzYJVh9EjXfMfrnk17ZlmPf8Nz4mShB5TPX1BfHpWbw1oEViR+WeBxcYo62Y/L5ufyilo082qAGe/Q=',
    //APP_ID
    'alipay_app_id'         =>  '2018070360528264',
    //格式
    'alipay_format'         =>  'json',
    //编码
    'alipay_charset'        =>  'GBK',
    //加密方式
    'alipay_sign_type'      =>  'RSA2',
    //环境网关
    /**
     *  沙箱使用网关:https://openapi.alipaydev.com/gateway.do
     *  正式环境使用网关：https://openapi.alipay.com/gateway.do
     * */
    //沙箱环境网关
    'alipay_getwat_url'     =>  'https://openapi.alipaydev.com/gateway.do',
    //正式使用网关
//    'alipay_getwat_url'     =>  'https://openapi.alipay.com/gateway.do'
];
