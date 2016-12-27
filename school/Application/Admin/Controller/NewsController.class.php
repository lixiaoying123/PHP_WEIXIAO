<?php
namespace Admin\Controller;
use Think\Controller;

class NewsController extends Controller {

    public function newsquery(){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $news = D("news"); //实例化news类
            $key = I('sosuo');
            //1. 获得当前记录总条数
            $total = $news -> count();
            $per = 16;
            //2. 实例化分页类对象
            $page = new \Component\Page($total, $per); //autoload
            //3. 拼装sql语句获得每页信息
            $sql = "select * from 	think_news ".$page->limit;
            $info = $news -> query($sql);
            //var_dump($info);
            //4. 获得页码列表
            $pagelist = $page -> fpage();
            $this -> assign('info', $info);
            $this -> assign('pagelist', $pagelist);

            if($key){//关键字搜索
                $total = $news->where("news_title like '%$key%'")->count();
                $per = 16;
                $page = new \Component\Page($total, $per);
                $sql = "select * from 	think_news where news_title like '%$key%'".$page->limit;
                $info = $news -> query($sql);
                $pagelist = $page -> fpage();
                $this -> assign('info', $info);
                $this -> assign('pagelist', $pagelist);
            }
            $this -> display();
        }

    }

    public function delete($news_id){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $news = D('news');
            $admin = D('admin');
            $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
            if($vo==1 || $vo==4){
                //查询被修改的商品的信息并传递给模板展示
                $result = $news->delete("$news_id");
                if ($result !== false) {
                    $this->success('删除成功！');
                } else {
                    $this->error('删除失败！');
                }

            }else{
                $this->error('不是相应管理员，不能删除新闻信息！');
            }
        }

        //$this->display();
    }

    public function newsdetail($news_id){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $news = D('news');
            $info = $news->where("news_id=$news_id")->select();
            $this->assign('info',$info);
            //var_dump($info);
            $this->display();
        }

    }
}