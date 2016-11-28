<?php

namespace Home\Controller;
use Think\Controller;
class LostController extends Controller {
    private $keyalready;
    public function lostlist()  {
        header("Content-Type:text/html; charset=utf-8");
        $lost = new \Home\Model\LostModel();
        $lost = D("Lost");
        $key = I('sosuo');
        $keyTU = I('timeup');
        $keyTD = I('timedown');
        $keyXX = I('1');
        $keyDZ = I('2');
        $keySH = I('3');
        $keyQT = I('4');
        $info = $lost -> select();
        $this -> assign('info', $info);
        //实现分页效果

        //$count = $goods->count();
        //$Page = new \Think\Page($count,8);
        //$show = $Page->show();
        $list = $lost->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);

        if($key){//关键字搜索
            $userForm=M('Lost');
            $list=$userForm->where("lost_name like '%$key%'")->limit($Page->firstRow.','.$Page->listRows)->select();
            $count = $lost->count();
            $this->keyalready = 1;
            $Page = new \Think\Page($count,8);
            //实现分页后


            //$show = $Page->show();
            $this->assign('list',$list);
            $this->assign('page',$show);


        }

        if($keyTU==timeup){	//时间排序增
            $userForm=M('Lost');
            $list=$userForm->limit($Page->firstRow.','.$Page->listRows)->order('lost_id asc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $lost->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($keyTD==timedown){	//时间排序减
            $userForm=M('Lost');
            $list=$userForm->limit($Page->firstRow.','.$Page->listRows)->order('lost_id desc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $lost->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($keyXX==study){	//学习类
            $userForm=M('Lost');
            $list=$userForm->where("lost_type = 1")->limit($Page->firstRow.','.$Page->listRows)->order('lost_id desc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $lost->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($keyDZ==dianzi){	//电子类
            $userForm=M('Lost');
            $list=$userForm->where("lost_type =2")->limit($Page->firstRow.','.$Page->listRows)->order('lost_id desc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $lost->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($keySH==life){	//生活类
            $userForm=M('Lost');
            $list=$userForm->where("lost_type =3")->limit($Page->firstRow.','.$Page->listRows)->order('lost_id desc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $lost->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($keyQT==other){	//其他
            $userForm=M('Lost');
            $list=$userForm->where("lost_type =4")->limit($Page->firstRow.','.$Page->listRows)->order('lost_id desc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $lost->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }


        $radio = I('lost_type');//添加商品类型
        $this -> display();


    }
    public function lostdetail()
    {	$lost = D("Lost");
        $id=$_GET['id'];
        $info = $lost->where('lost_id='.$id)->select();
        $this -> assign('info', $info);
        //var_dump($info);
        $this -> display();
    }

    //添加商品
    public function add(){
        if(session('username')==null){
            $this->error('未登录，不能添加物品！');
        }else {
            $lost_time=date('Y-m-d H:i:s');

            $user = D('user');
            $session =  session('username');
            $data = $user->where("username='%s'",$session)->getField('user_id');
            $this->assign('data',$data);

            $this->assign('lost_time',$lost_time);
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

                    $rst = $lost->add($_POST);
                    if ($rst) {
                        $data = M('Lost');
                        date("Y-m-d H:i:s" ,time());
                        $lost_time=date("Y-m-d H:i:s" ,time());
                        $this->success('添加成功',U("home/lost/lostdetail?id=$rst"),0);
                    } else {
                        $this->error('$rst');
                    }
                }
            }else {
                $this->display();
            }
        }



    }

//修改商品内容
    public function update($lost_id)
    {
        if(session('username')==null){
            $this->error('未登录，不能修改物品！');
        }else{
            $user = D('user');
            $session =  session('username');
            $data = $user->where("username='%s'",$session)->getField('user_id');
            //查询被修改的商品的信息并传递给模板展示
            $lost = D('lost');
            $vo = $lost->where("lost_id=$lost_id")->getField('user_id');
            if($vo != $data){
                $this->error('不是自己的物品，不能修改！');
            }else{
                //两个逻辑：展示表单 、收集表单
                if(!empty($_POST)){


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


                    $lost->create();
                    $rst = $lost->save();
                    if($rst){
                        $this->success('修改成功！',U("home/lost/lostdetail?id=$lost_id"),0);
                    }else{
                        $this->error('修改失败！');
                    }
                }else{
                    $info =$lost->find($lost_id);
                    $this->assign('info',$info);
                    $this->display();
                }
            }
        }

    }
    //删除商品
    public function delete($lost_id)
    {

        if(session('username')==null){
            $this->error('未登录，不能修改物品！');
        }else{
            $user = D('user');
            $session =  session('username');
            $data = $user->where("username='%s'",$session)->getField('user_id');
            //查询被修改的商品的信息并传递给模板展示
            $lost = D('lost');
            $vo = $lost->where("lost_id=$lost_id")->getField('user_id');
            if($vo != $data){
                $this->error('不是自己的物品，不能修改！');
            }else{
                $result = $lost->delete("$lost_id");
                if ($result !== false) {
                    $this->success('删除成功！', U('home/lost/lostlist'), 0);
                } else {
                    $this->error('删除失败！', U('home/lost/lostdetail'), 0);
                }
            }
        }
    }

    //查看自己的商品
    public function self(){
        if(session('username')==null){
            $this->error('未登录，不能查看自己的商品！');
        }else {
            //查看登录用户的user_id
            $user = D('user');
            $session = session('username');
            $data = $user->where("username='%s'", $session)->getField('user_id');
            //获取用户是user_id添加的商品
            $lost = D('lost');
            $list = $lost->where("user_id=$data")->select();
            $this->assign('list',$list);
            $this->display();
        }
    }

}