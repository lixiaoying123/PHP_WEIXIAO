<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index()
    {
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $goods= D('goods');
            $count = $goods->where("status=1")->count();
            $this->assign('count',$count);
            $lost= D('lost');
            $count1 = $lost->where("status=1")->count();
            $this->assign('count1',$count1);
            $admin = D('admin');
            $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('admin_id');
            $this->assign('vo',$vo);
            $this -> display();
        }


    }
}