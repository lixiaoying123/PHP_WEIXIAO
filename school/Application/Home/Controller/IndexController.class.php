<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
      public function index()
    {
  
          	//三小时缓存一次商品
       $mem=new \Memcache;
        $mem->connect("127.0.0.1",11211);
        $list=$mem->get('key2');
           if (!$list) {
        	  $goods = D("goods");
              $list = $goods->order('goods_views desc')->limit(15)->select();
              $mem->set('key2',$list,MEMCACHE_COMPRESSED,10800);
              $list=$mem->get('key2');
             $this->assign('list',$list);
       
       }else{
          $this->assign('list',$list);
        }
      
       //三小时缓存一次新闻
        $info=$mem->get('key1');
        if (!$info) {
        		$news = D("news");
            $result = $news->order('news_time desc')->limit(4)->select();
            $mem->set('key1', $result,MEMCACHE_COMPRESSED,10800);
            $info=$mem->get('key1');
            $this->assign('info',$info);
       }else{
          $this->assign('info',$info);
        }
         $this -> display();
   }
}