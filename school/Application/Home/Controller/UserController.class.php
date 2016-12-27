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
            if (!$verify->check(I('post.yanzhengma'))) {
                $this->error("验证码错误") ;
            } else {
                //判断用户名密码
                $user = new \Home\Model\UserModel();
                $rst = $user->checkNamePwd(I('post.username'),I('post.userpassword'));

                    if ($rst == true){
                        session('username',I('post.username'));
                        session('password',I('post.userpassword'));
                        $user->where("username='%s'",I('post.username'))->setField('status',1);
                        $this->redirect('index/index');
                    } else {
                        echo  $this->error("用户名或密码错误错误");
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
                $this->error("有错误");

            }  else {
                $rst = $user->add();
                if ($rst) {
                    session('username',I('post.username'));
                    session('password',I('post.userpassword'));
                    $this->success('注册成功',U('home/index/index'),3);
                } else {
                    $this->error('$rst');
                }
            }
        }else {
            $this->display();
        }
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
    public function logout(){
        $user = D('user');
        $user->where("username='%s'",session('username'))->setField('status',0);
        session(null);
        $this->redirect('Index/index');
    }
    //登录的个人中心
    public function self(){

        $user = new \Home\Model\UserModel();
        $map['username'] = $_SESSION['username'];
        $vo = $user->where($map)->select();
        $this->assign('vo',$vo);
        $user_time = $vo[0][user_time];
        //var_dump($user_time);
        $time = date('Y-m-d,H:i:s', time());
        $time = strtotime($time);
        $lstimes = 48-(intval(($time - (int)$user_time) / 3600));
        $this->assign('lstimes',$lstimes);
        $this->display();
    }

    //完整的个人中心
    public function myself($user_id){
        $user = D('user');
        $info = $user->where("user_id=$user_id")->select();
        //var_dump($info);
        $this->assign('info',$info);
        $this->display();

    }

  //注册时判断用户名的状态
    function cheakname(){
        //判断用户名是否重复
        $user = D ( 'user' );
        $username = (I('post.username'));
        $vo = $user->where("username='%s'",$username)->find();
        if($username == null){
            echo 2;
        }else{
            if ($vo==null) {
                echo 1;
            }else{
                echo 0;
            }
        }

    }
    //注册时判断邮箱是否已经注册
    function cheakemail(){
        $user = D ( 'user' );
        $useremail = (I('post.useremail'));
        $vo = $user->where("useremail='%s'",$useremail)->find();
        if($useremail == null){
            echo 2;
        }else{
            if ($vo==null) {
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    //消息列表
    public function message(){
        $message = D('message');
        $list = $message->where("user_name='%s'",session('username'))->order('status asc,msg_time desc')->select();
        //var_dump($list);
        $this->assign('list',$list);
        $this->display();
    }
    //消息详情
    public function msgdetail($msg_id){
        $message= D('message');
        $message->where("msg_id=$msg_id")->setField('status',1);
        $info = $message->where("msg_id=$msg_id")->select();
        $this->assign('info',$info);
        $this->display();
    }
    //删除消息
    public function msgdelete($msg_id){
        $message = D('message');
        $rst=$message->delete("$msg_id");
        if(rst!==false){
            $this->redirect("home/user/message");
        }
    }

}
