<?php
/**
 * Created by PhpStorm.
 * User: lc
 * Date: 2016/11/3
 * Time: 8:53
 */

namespace Home\Controller;
use Home\Model\UserModel;
use Think\Controller;
use Think\Model;
use Think\Verify;
use Think\Image;
class UserController extends Controller
{
    //登录功能

    public function login()
    {

        if (!empty($_POST)) {
            $verify = new \Think\Verify();
            if (!$verify->check($_POST['yanzhengma'])) {
                echo "验证码错误";
            } else {
                //判断用户名密码
                $user = new \Home\Model\UserModel();
                $rst = $user->checkNamePwd($_POST['username'],$_POST['password']);
                if ($rst == true){

                    session('username',$_POST['username']);
                    session('password',$_POST['password']);

                    $this->redirect('index/index');
                } else {
                    echo "用户名或密码错误错误";
                }

            }
        }

        $this->display();
    }


    //注册功能
    public function register()
    {
        $user = new \Home\Model\UserModel();
        if(!empty($_POST)){

            if (!$user->create()) {
                echo "cuowu";
                $errorinfo =  $this->error($user->getError());


            }  else {
                $rst = $user->add();
                if ($rst) {
                    $this->success('注册成功','/school',0);
                } else {
                    $this->error('$rst');
                }
            }
        }else {
            $this->display();
        }
    }
    // 地址错误
    function _empty(){
        echo " <img src='../../../public/home/images/404.jpg'  height='100%' width='100%'>";
    }
    //生成验证码
    function VerifyImg(){
        $config = array(

            'fontSize'=>14,
            'imageH'=>30,
            'imagew'=>150,
            'fontttf'=>'5.ttf',
            'length'=>4,
        );
        $verify = new \Think\Verify($config);
        $verify->entry();
    }
    //登出
    function logout(){
        session(null);
        $this->redirect('Index/index');
    }
    //个人中心
    function self(){

        $user = new \Home\Model\UserModel();
        $map['username'] = $_SESSION['username'];
        $data = $user->where($map)->select();
        $this->assign('data',$data);
        $this->display();
    }

}
