<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller {
    //1.注册功能
    public function afteradd()
    {
        $admin = new \Admin\Model\AdminModel();
        $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
        if($vo==1){
            if(!empty($_POST)){

                if (!$admin->create()) {
                    echo "cuowu";
                    $this->error($admin->getError());

                }  else {
                    $rst = $admin->add();
                    if ($rst) {
                        $this->success('注册成功',U('admin/user/afterlist'),0);
                    } else {
                        $this->error('$rst');
                    }
                }
            }else {
                $this->display();
            }
        }else{
            $this->error('不是超级管理员，不能添加管理员！',U('/Admin/user/afterlist'),0);
        }

    }

    //2.登录功能
    public function login()
    {
        if (!empty($_POST)) {
            //判断用户名密码
            $admin = new \Admin\Model\AdminModel();
            $rst = $admin->checkNamePwd($_POST['admin_name'], $_POST['admin_pwd']);
            //var_dump($rst);
            if ($rst == true) {
                session('admin_name', $_POST['admin_name']);
                session('admin_pwd', $_POST['admin_pwd']);
                $admin->where("admin_name='%s'", $_POST['admin_name'])->setField('status', 1);
                $this->redirect('index/index');
            } else {
                //echo "用户名或密码错误错误";
                $this->error('用户名或密码错误错误');
            }

        }
        $this -> display();

    }

    //3.退出功能
    public function logout()
    {
        $user = D('admin');
        $user->where("admin_name='%s'",session('admin_name'))->setField('status',0);
        session(null);
        $this->redirect('user/login');
    }

    //4.显示前台用户
    public function frontlist()
    {
        $username = $_GET['username'];
        //var_dump($username);
        if($username==null){
            $user = D('user');
            //1. 获得当前记录总条数
            $total = $user -> count();
            $per = 16;
            //2. 实例化分页类对象
            $page = new \Component\Page($total, $per); //autoload
            //3. 拼装sql语句获得每页信息
            $sql = "select * from 	think_user ".$page->limit;
            $list = $user -> query($sql);
            //4. 获得页码列表
            $pagelist = $page -> fpage();
            $this -> assign('list', $list);
            $this -> assign('pagelist', $pagelist);
            $this->display();
        }else{
            //查询前台用户
            $user = D('user');
            $list = $user->where("username='%s'",$username)->select();
            $this->assign('list',$list);
            $this->display();
        }


    }

    //5.删除前台用户
    public function frontdelete($user_id)
    {
        //查询被修改的商品的信息并传递给模板展示
        $user = D('user');
        $admin = D('admin');
        $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
        if($vo!=1){
            $this->error('不是超级管理员，不能删除用户！',U('/Admin/user/afterlist'),0);
        }else{
            $result = $user->delete("$user_id");
            if ($result !== false) {
                $this->success('删除成功！', U('admin/user/frontlist'), 0);
            } else {
                $this->error('删除失败！',U( 'admin/user/frontlist'), 0);
            }
        }

    }

    //6.显示后台管理员
    public function afterlist()
    {
        $admin_name = $_GET['admin_name'];
        //var_dump($username);
        if($admin_name==null){
            $admin = D('admin');
            //1. 获得当前记录总条数
            $total = $admin -> count();
            $per = 16;
            //2. 实例化分页类对象
            $page = new \Component\Page($total, $per); //autoload
            //3. 拼装sql语句获得每页信息
            $sql = "select * from 	think_admin ".$page->limit;
            $list = $admin -> query($sql);
            //4. 获得页码列表
            $pagelist = $page -> fpage();
            $this -> assign('list', $list);
            $this -> assign('pagelist', $pagelist);
            $this->display();
        }else{
            //查询后台管理员
            $admin = D('admin');
            $list = $admin->where("admin_name='%s'",$admin_name)->select();
            $this->assign('list',$list);
            $this->display();
        }
    }

    //7.删除后台管理员
    public function afterdelete($admin_id)
    {
        //查询被修改的商品的信息并传递给模板展示
        $admin = D('admin');
        $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
        if($vo!=1){
            $this->error('不是超级管理员，不能删除管理员！',U('/Admin/user/afterlist'),0);
        }else{
            $result = $admin->delete("$admin_id");
            if ($result !== false) {
                $this->success('删除成功！', U('admin/user/afterlist'), 0);
            } else {
                $this->error('删除失败！',U( 'admin/user/afterlist'), 0);
            }
        }
    }

    //8.修改后台管理员信息
    public function afterupdate($admin_id)
    {
        //var_dump($admin_id);
        $admin = D('admin');
        $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
        if($vo!=1){
            $this->error('不是超级管理员，不能修改管理员信息！',U('/Admin/user/afterlist'),0);
        }else{

            if (!empty($_POST)) {
                //var_dump(!empty($_POST));
                $admin->create();
                $rst = $admin->save();
                if ($rst) {
                    $this->success('修改成功！', U("admin/user/afterlist?id=$admin_id"), 0);
                } else {
                   // var_dump($rst);
                    $this->error('修改失败！');
                }
            } else {
                $info = $admin->find($admin_id);
                //var_dump($info);
                $this->assign('info', $info);
                $this->display();
            }
        }
    }

    //9.查看管理员信息
    public function afterdetail($admin_id)
    {
        $admin = D('admin');
        $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
        $in = $admin->where("admin_name='%s'",session('admin_name'))->getField('admin_id');
        if($vo!=1 && $admin_id!=$in){
            $this->error('不是超级管理员或者不是自己的账户信息，不能查看！');
        }else{
            $info = $admin->find($admin_id);
            $this->assign('info', $info);
            //2.添加的商品列表
            $goods = D('goods');
            $list = $goods->where("admin_id=$admin_id")->select();
            $count = 0;
            $this->assign('list',$list);
            $this->assign('count',$count);
            //3.添加的物品列表
            $lost = D('lost');
            $list1 = $lost->where("admin_id=$admin_id")->select();
            $count1 = 0;
            $this->assign('list1',$list1);
            $this->assign('count1',$count1);
            $this->display();
        }
    }

    //10.查看用户信息
    public function frontdetail($user_id)
    {
        $user = D('user');
        $admin = D('admin');
        $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
        if($vo!=1){
            $this->error('不是超级管理员，不能查看用户信息！');
        }else{
            //1.用户信息详情
            $info = $user->find($user_id);
            $this->assign('info', $info);
            //2.添加的商品列表
            $goods = D('goods');
            $list = $goods->where("user_id=$user_id")->select();
            $count = 0;
            $this->assign('list',$list);
            $this->assign('count',$count);
            //3.添加的物品列表
            $lost = D('lost');
            $list1 = $lost->where("user_id=$user_id")->select();
            $count1 = 0;
            $this->assign('list1',$list1);
            $this->assign('count1',$count1);
            $this->display();
        }
    }

    //发送系统消息
    public function frontmessage($user_id){
        $user= D('user');
        $username = $user->where("user_id=$user_id")->getField("username");
        $this->assign('username',$username);
        $data = session('admin_name');
        $this->assign('data',$data);
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $message = D('message');
            if(!empty($_POST)){
                if (!$message->create()) {
                    $this->error('发送失败');
                }else{
                    $rst = $message->add($_POST);
                    if ($rst) {
                        $this->success('发送成功',U('/Admin/user/frontlist'),0);
                    } else {
                        $this->error('$rst');
                    }
                }
            }else{
                $this->display();
            }
        }
    }

    //群发系统消息
    public function group(){
        $user= D('user');
        $username = $user->field('username')->select();
        $count = $user->field('username')->count();
        $msg_time = strtotime(date('Y-m-d,H:i:s',time()));
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $message = D('message');
            if(!empty($_POST)){
                for($i=0;$i<$count;$i++) {
                    $data['msg_title'] = $_POST['msg_title'];
                    $data['msg_content'] = $_POST['msg_content'];
                    $data['msg_time'] = $msg_time;
                    $data['user_name'] = $username[$i][username];
                    $data['admin_name'] = session('admin_name');
                    $message->add($data);
                }
                $this->success('发送成功！',U('admin/user/frontlist'));
            }else{
                $this->display();
            }
        }
    }

    //显示被禁言的用户
    public function userjinyan(){
        $username = $_GET['username'];
        //var_dump($username);
        if($username==null){
            $user = D('user');
            //1. 获得当前记录总条数
            $total = $user -> where("count=1")->count();
            $per = 16;
            //2. 实例化分页类对象
            $page = new \Component\Page($total, $per); //autoload
            //3. 拼装sql语句获得每页信息
            $sql = "select * from 	think_user where count=1 ".$page->limit;
            $list = $user -> query($sql);
            //4. 获得页码列表
            $pagelist = $page -> fpage();
            $this -> assign('list', $list);
            $this -> assign('pagelist', $pagelist);
            $this->display();
        }else{
            //查询前台用户
            $user = D('user');
            $list = $user->where("username='%s'",$username)->select();
            $this->assign('list',$list);
            $this->display();
        }
    }

    //解除用户的禁言
    public function jiejin($user_id){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else {
            $admin = D('admin');
            $user = D('user');
            $message = D('message');
            $vo = $admin->where("admin_name='%s'", session('admin_name'))->getField('count');
            if ($vo == 0 && $vo == 2) {
                $this->error('不是相应管理员，不能禁言！');
            } else {
                $user_name = $user->where("user_id=$user_id")->getField('username');
                $rst = $user->where("user_id=$user_id")->setField('count', 0);
                $user_time = date('Y-m-d,H:i:s', time());
                $user_time = strtotime($user_time);
                $rst1 = $user->where("user_id=$user_id")->setField('user_time', null);
                $session = session('admin_name');
                if ($rst == 1 && $rst1 == 1) {
                    //发送系统消息
                    $data['msg_title'] = "解除禁言";
                    $data['msg_content'] = "管理员 $session 已经解除了您的禁言，您可以添加商品和物品了。";
                    $data['msg_time'] = $user_time;
                    $data['user_name'] = $user_name;
                    $data['admin_name'] =  $session;
                    //var_dump($data);
                    $message->add($data);
                    $this->success('解除禁言成功！', U('admin/user/userjinyan'), 0);
                } else {
                    $this->error('解除禁言失败！', U("admin/user/userjinyan/user_id/$user_id"), 0);
                }

            }
        }

    }

}