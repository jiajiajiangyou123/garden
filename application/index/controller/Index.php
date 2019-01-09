<?php
namespace app\index\controller;

use app\admin\model\Banner;
use app\admin\model\Label;
use think\Controller;

class Index extends Controller
{
    /**
     * @Title   index
     * @Description todo::首页展示
     * @Time    2018年8月14日10:56:49
     */
    public function index()
    {
        $banner = new Banner();
        $images = $banner->select();
        $count = db('article')->count();
        $labels = new Label();
        $label = $labels->select();

        $this->assign('images',$images);
        $this->assign('label',$label);
        $this->assign('count',$count);
        return $this->fetch();
    }

    //单个文章页
    public function article()
    {
        $id = input('get.id');

        if (!$id) {
            return $this->redirect('/');
        }

        //页面数据渲染
        $banner = new Banner();
        $images = $banner->select();
        $labels = new Label();
        $label = $labels->select();
        $article = db('article')->where('id',$id)->find();
        $articles = db('article')->order('id desc')->limit(5)->select();

        $this->assign('article',$article);
        $this->assign('articles',$articles);
        $this->assign('images',$images);
        $this->assign('label',$label);
        return $this->fetch();
    }

    /*没有方法命中时默认执行空操作*/
    public function _empty($name)
    {
        var_dump(request()->header());
        db()->insertGetId();
        if (request()->isCli()) echo "当前为 cli";
// 是否为 cgi
        if (request()->isCgi()) echo "当前为 cgi";
        var_dump(request()->isMobile());
        return var_dump(input('?get.id'));
        return $name;
    }

    /**
     * @Title   article list
     * @Description todo::文章列表
     * @Time    2018年9月4日18:30:49
     * */
    public function articles()
    {
        $page = input('get.page');
        $article = db('article')
            ->field('id,title,label,logo,content,visit_num,comment_num,create_time')
            ->page($page,5)->select();

        foreach ($article as &$val) {
            $val['content'] = mb_substr($val['content'],0,300);
            $val['create_time'] = date('Y-m-d',$val['create_time']);
        }

        return json_data($article,'',1);
    }

}
