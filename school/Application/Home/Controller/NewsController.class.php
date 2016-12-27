<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {
    public function newslist()
    {
        $news = D('news');
        //1. 获得当前记录总条数
        $total = $news -> count();
        $per = 6;
        //2. 实例化分页类对象
        $page = new \Component\Page($total, $per); //autoload
        //3. 拼装sql语句获得每页信息
        $sql = "select * from 	think_news ORDER BY news_time DESC ".$page->limit;
        $list = $news -> query($sql);
        //var_dump($list);
        //4. 获得页码列表
        $pagelist = $page -> fpage();
        $this -> assign('list', $list);
        $this -> assign('pagelist', $pagelist);
        $this->display();
    }
    public function newsdetail($news_id)
    {
        $news = D('news');
        $news->where("news_id=$news_id")->setInc('news_views',1);
        $info1 = $news -> getField('news_views');
        $this -> assign('info1',$info1);
        $info = $news->where("news_id=$news_id")->select();
        $this->assign('info',$info);
        $list = $news->order('news_id DESC')->limit(3)->select();
        $this->assign('list',$list);
        $this->display();
    }
}