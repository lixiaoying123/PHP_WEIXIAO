<?php
namespace Admin\Controller;
use Think\Controller;

class GoodsController extends Controller {
    public function goodsquery() {
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $goods = D("Goods"); //实例化GOODS类
            $user = D("user");
            $this->assign('user',$user);
            $admin = D('admin');
            $this->assign('admin',$admin);

            $key = I('sosuo');
            //1. 获得当前记录总条数
            $total = $goods -> count();
            $per = 16;
            //2. 实例化分页类对象
            $page = new \Component\Page($total, $per); //autoload
            //3. 拼装sql语句获得每页信息
            $sql = "select * from 	think_goods order by goods_id desc ".$page->limit;
            $info = $goods -> query($sql);
            //var_dump($info);
            //4. 获得页码列表
            $pagelist = $page -> fpage();
            $this -> assign('info', $info);
            $this -> assign('pagelist', $pagelist);

            if($key){//关键字搜索
                //$userForm=M('Goods');
                $total = $goods->where("goods_name like '%$key%'")->count();
                $per = 10;
                $page = new \Component\Page($total, $per);
                $sql = "select * from 	think_goods where goods_name like '%$key%'".$page->limit;
                $info = $goods -> query($sql);
                $pagelist = $page -> fpage();
                $this -> assign('info', $info);
                $this -> assign('pagelist', $pagelist);
            }
            $this -> display();
        }
    }
  public function goodsadd()
    {
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $goods_time=date('Y-m-d H:i:s');
            $this->assign('goods_time',$goods_time);

            $admin = D('admin');
            $session =  session('admin_name');
            $data = $admin->where("admin_name='%s'",$session)->getField('admin_id');
            $this->assign('data',$data);

            echo $_POST["goods"];
            $goods = new \Home\Model\GoodsModel();
            if(!empty($_POST)){
                if (!$goods->create()) {
                    echo "cuowu";
                    $errorinfo =  $goods->getError();
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
                        $z = $upload -> uploadOne($_FILES['goods_img']);
                        if(!$z){
                            show_bug($upload->getError()); //获得上传附件产生的错误信息
                        }else {
                            //拼装图片的路径名
                            $bigimg = $z['savepath'].$z['savename'];
                            $_POST['goods_img'] = $bigimg;

                            //把已经上传好的图片制作缩略图Image.class.php
                            $image = new \Think\Image();
                            ////open();打开图像资源，通过路径名找到图像
                            $srcimg = $upload->rootPath.$bigimg;
                        }
                    }
                }

                $rst = $goods->add($_POST);
                if ($rst) {
                    $this->success('添加成功',U('/Admin/goods/goodsquery'),0);
                } else {
                    $this->error('$rst');
                }

            }else {
                $this->display();
            }
        }

    }

    public function usergoodsQuery()
    {
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $goods = D("Goods");//实例化GOODS类
            $user = D("User");
            $key = I('sosuo');
            if($key){//关键字搜索
                $userForm=M('Goods');
                $userku=M('User');
                $total = $userku->where("username like '$key'")->count();
                $data = $user->where("username like '$key'")->getField('user_id');//获取该商品的用id
                $per = 10;
                $page = new \Component\Page($total, $per);
                $sql = "select * from 	think_goods where user_id like '$data'".$page->limit;
                $info = $goods -> query($sql);
                $pagelist = $page -> fpage();
                $this -> assign('info', $info);
                $this -> assign('pagelist', $pagelist);
            }
            $this -> display();
        }

    }
    public function delete($goods_id)
    {
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $goods = D('goods');
            $admin = D('admin');
            $admin_id = $goods->where("goods_id=$goods_id")->getField('admin_id');
            $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
            $in = $admin->where("admin_name='%s'",session('admin_name'))->getField('admin_id');
            if($vo==0 && $vo==2 && $admin_id!=$in){
                $this->error('不是相应管理员或者不是自己添加的商品，不能删除商品信息！');
            }else{
                //查询被修改的商品的信息并传递给模板展示
                $result = $goods->delete("$goods_id");
                if ($result !== false) {
                    $this->success('删除成功！',U('admin/goods/goodsquery'),3);
                } else {
                    $this->error('删除失败！');
                }
            }
        }


    }


    public function goodsdetail($goods_id){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $goods = D('goods');
            $list = $goods->where("goods_id=$goods_id")->select();
            $this->assign('goods_id',$goods_id);
            $this->assign('list',$list);
            $this->display();
        }
    }
    public function qxjubao($goods_id){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $goods = D('goods');
            $admin = D('admin');
            $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
            if($vo==0 && $vo==2){
                $this->error('不是相应管理员，不能取消举报！');
            }else{
                $res=$goods->where("goods_id=$goods_id")->setField('status',0);
                if($res == 1){
                    $this->success('取消举报成功！',U('admin/goods/goodsquery'),0);
                }else{
                    $this->error('取消举报失败！',U("admin/goods/goodsdetail/goods_id/$goods_id"),0);
                }
            }
        }


    }
    public function jinyan($goods_id){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $goods = D('goods');
            $admin = D('admin');
            $user = D('user');
            $message = D('message');
            $vo = $admin->where("admin_name='%s'",session('admin_name'))->getField('count');
            if($vo==0 && $vo==2){
                $this->error('不是相应管理员，不能禁言！');
            }else{
                $this->assign('goods_id',$goods_id);
                $user_id = $goods->where("goods_id=$goods_id")->getField('user_id');
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
                    $goods->delete("$goods_id");
                    if($rst==1){
                        //发送系统消息
                        $data['msg_title'] = $_POST['msg_title'];
                        $data['msg_content'] =$_POST['msg_content'];
                        $data['msg_time'] = $user_time;
                        $data['user_name'] = $user_name;
                        $data['admin_name'] = session('admin_name');
                        //var_dump($data);
                        $message->add($data);
                        $this->success('禁言成功！',U('admin/goods/goodsquery'),0);
                    }else{
                        $this->error('禁言失败！',U("admin/goods/goodsdetail/goods_id/$goods_id"),0);
                    }
                }else{
                    $this->display();
                }
            }
        }
    }

    public function goodsjinyan(){
        if(session('admin_name')==null){
            $this->redirect('user/login');
        }else{
            $goods = D("Goods"); //实例化GOODS类
            $user = D("user");
            $this->assign('user',$user);
            $admin = D('admin');
            $this->assign('admin',$admin);

            $key = I('sosuo');
            //1. 获得当前记录总条数
            $total = $goods ->where("status=1")->count();
            $per = 16;
            //2. 实例化分页类对象
            $page = new \Component\Page($total, $per); //autoload
            //3. 拼装sql语句获得每页信息
            $sql = "select * from 	think_goods where status=1 order by goods_id desc ".$page->limit;
            $info = $goods -> query($sql);
            //var_dump($info);
            //4. 获得页码列表
            $pagelist = $page -> fpage();
            $this -> assign('info', $info);
            $this -> assign('pagelist', $pagelist);

            if($key){//关键字搜索
                //$userForm=M('Goods');
                $total = $goods->where("goods_name like '%$key%'")->count();
                $per = 10;
                $page = new \Component\Page($total, $per);
                $sql = "select * from 	think_goods where goods_name like '%$key%'".$page->limit;
                $info = $goods -> query($sql);
                $pagelist = $page -> fpage();
                $this -> assign('info', $info);
                $this -> assign('pagelist', $pagelist);
            }
            $this -> display();
        }
    }

}