<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index()
    {

        $goods = D("goods");
        $list = $goods->select();
        $this->assign('list',$list);
        $this -> display();

    }
}