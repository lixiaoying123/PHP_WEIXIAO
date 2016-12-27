<?php
namespace Admin\Controller;
use Think\Controller;

class LostController extends Controller {
    public function lostquery() {
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $user = D("user");
            $this->assign('user',$user);
            $admin = D('admin');
            $this->assign('admin',$admin);
            $lost= D("Lost");
            $key = I('sosuo');
            //1. 获得当前记录总条数
            $total = $lost-> count();
            $per = 16;
            //2. 实例化分页类对象
            $page = new \Component\Page($total, $per); //autoload
            //3. 拼装sql语句获得每页信息
            $sql = "select * from 	think_lost ".$page->limit;
            $info = $lost -> query($sql);
            //4. 获得页码列表
            $pagelist = $page -> fpage();
            $this -> assign('info', $info);
            $this -> assign('pagelist', $pagelist);

            if($key){//关键字搜索
                $userForm=M('Lost');
                $total = $userForm->where("lost_name like '%$key%'")->count();
                $per = 16;
                $page = new \Component\Page($total, $per);
                $sql = "select * from think_lost where lost_name like '%$key%'".$page->limit;
                $info = $lost -> query($sql);
                $pagelist = $page -> fpage();
                $this -> assign('info', $info);
                $this -> assign('pagelist', $pagelist);
            }
            $this -> display();
        }
    }
  public function lostadd()
    {
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $lost_time=date('Y-m-d H:i:s');
            $this->assign('goods_time',$lost_time);

            $admin = D('admin');
            $session =  session('admin_name');
            $data = $admin->where("admin_name='%s'",$session)->getField('admin_id');
            $this->assign('data',$data);

            echo $_POST["lost"];
            $lost = new \Home\Model\LostModel();
            if(!empty($_POST)){
                if (!$lost->create()) {
                    echo "cuowu";
                    $errorinfo =  $lost->getError();
                    var_dump($errorinfo);

                }else{
                    if(!empty($_FILES)){
                        $config = array(
                            'rootPath'      =>     './public/',  //根目录
                            'savePath'      =>     'upload/', //保存路径
                        );
                        //附件被上传到路径：根目录/保存目录路径/创建日期目录
                        $upload = new \Think\Upload($config);
                        //uploadOne会返回已经上传的附件信息
                        $z = $upload -> uploadOne($_FILES['lost_img']);
                        if(!$z){
                            show_bug($upload->getError()); //获得上传附件产生的错误信息
                        }else {
                            //拼装图片的路径名
                            $bigimg = $z['savepath'].$z['savename'];
                            $_POST['lost_img'] = $bigimg;

                            //把已经上传好的图片制作缩略图Image.class.php
                            $image = new \Think\Image();
                            ////open();打开图像资源，通过路径名找到图像
                            $srcimg = $upload->rootPath.$bigimg;
                        }
                    }
                }

                $rst = $lost->add($_POST);
                if ($rst) {
                    $data = M('Goods');
                    date("Y-m-d H:i:s" ,time());
                    $lost_time=date("Y-m-d H:i:s" ,time());
                    $this->success('添加成功',U('/Admin/lost/lostquery'),0);
                } else {
                    $this->error('$rst');
                }

            }else {
                $this->display();
            }
        }

    }

    public function userlostQuery()
    {
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $lost = D("Lost");//实例化LOST类
            $user = D("User");
            $key = I('sosuo');
            if($key){//关键字搜索
                $userForm=M('Lost');
                $userku=M('User');
                $total = $userku->where("username like '$key'")->count();
                $data = $user->where("username like '$key'")->getField('user_id');//获取该商品的用id
                $per = 10;
                $page = new \Component\Page($total, $per);
                $sql = "select * from 	think_lost where user_id like '$data'".$page->limit;
                $info = $lost -> query($sql);
                $pagelist = $page -> fpage();
                $this -> assign('info', $info);
                $this -> assign('pagelist', $pagelist);
            }
            $this -> display();
        }

    }
    public function delete($lost_id)
    {
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $lost = D('lost');
            $admin = D('admin');
            $admin_id = $lost->where("lost_id=$lost_id")->getField('admin_id');
            $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
            $in = $admin->where("admin_name='%s'",session('admin_name'))->getField('admin_id');
            if($vo==0 && $vo==3 && $admin_id!=$in){
                $this->error('不是超级管理员或者不是自己添加的商品，不能删除商品信息！');
            }else{
                //查询被修改的商品的信息并传递给模板展示

                $result = $lost->delete("$lost_id");
                if ($result !== false) {
                    $this->success('删除成功！');
                } else {
                    $this->error('删除失败！');
                }
            }
        }

        
    }
    public function lostdetail($lost_id){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $lost = D('lost');
            $list = $lost->where("lost_id=$lost_id")->select();
            $this->assign('goods_id',$lost_id);
            $this->assign('list',$list);
            $this->display();
        }

    }

    public function qxjubao($lost_id){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $lost = D('lost');
            $admin = D('admin');
            $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
            if($vo==0 && $vo==2){
                $this->error('不是相应管理员，不能取消举报！');
            }else{
                $res=$lost->where("lost_id=$lost_id")->setField('status',0);
                if($res == 1){
                    $this->success('取消举报成功！',U('admin/lost/lostquery'),0);
                }else{
                    $this->error('取消举报失败！',U("admin/lost/lostdetail/lost_id/$lost_id"),0);
                }
            }
        }


    }
    public function jinyan($lost_id)
    {
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $lost = D('lost');
            $admin = D('admin');
            $user = D('user');
            $message = D('message');
            $vo = $admin->where("admin_name='%s'", session('admin_name'))->getField('count');
            if ($vo == 0 && $vo == 2) {
                $this->error('不是相应管理员，不能禁言！');
            } else {
                $this->assign('lost_id',$lost_id);
                $user_id = $lost->where("lost_id=$lost_id")->getField('user_id');
                $user_name = $user->where("user_id=$user_id")->getField('username');
                $this->assign('user_name',$user_name);
                if(!empty($_POST)){
                    $user->where("user_id=$user_id")->setField('count',1);
                    $user_time = date('Y-m-d,H:i:s',time());
                    $user_time = strtotime($user_time);
                    $rst = $user->where("user_id=$user_id")->setField('user_time',$user_time);
                    $user_day = $_POST['user_day'];
                    $user->where("user_id=$user_id")->setField('user_day',$user_day);
                    //删除相应商品
                    $lost->delete("$lost_id");
                    if($rst==1){
                        //发送系统消息
                        $data['msg_title'] = $_POST['msg_title'];
                        $data['msg_content'] =$_POST['msg_content'];
                        $data['msg_time'] = $user_time;
                        $data['user_name'] = $user_name;
                        $data['admin_name'] = session('admin_name');
                        //var_dump($data);
                        $message->add($data);
                        $this->success('禁言成功！',U('admin/lost/lostquery'),0);
                    }else{
                        $this->error('禁言失败！',U("admin/lost/lostdetail/lost_id/$lost_id"),0);
                    }
                }else{
                    $this->display();
                }
            }
        }
    }

    public function lostjinyan(){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $user = D("user");
            $this->assign('user',$user);
            $admin = D('admin');
            $this->assign('admin',$admin);
            $lost= D("Lost");
            $key = I('sosuo');
            //1. 获得当前记录总条数
            $total = $lost-> where("status=1")->count();
            $per = 16;
            //2. 实例化分页类对象
            $page = new \Component\Page($total, $per); //autoload
            //3. 拼装sql语句获得每页信息
            $sql = "select * from 	think_lost where status=1 order by lost_id desc ".$page->limit;
            $info = $lost -> query($sql);
            //4. 获得页码列表
            $pagelist = $page -> fpage();
            $this -> assign('info', $info);
            $this -> assign('pagelist', $pagelist);

            if($key){//关键字搜索
                $userForm=M('Lost');
                $total = $userForm->where("lost_name like '%$key%'")->count();
                $per = 16;
                $page = new \Component\Page($total, $per);
                $sql = "select * from think_lost where lost_name like '%$key%'".$page->limit;
                $info = $lost -> query($sql);
                $pagelist = $page -> fpage();
                $this -> assign('info', $info);
                $this -> assign('pagelist', $pagelist);
            }
            $this -> display();
        }
    }


}