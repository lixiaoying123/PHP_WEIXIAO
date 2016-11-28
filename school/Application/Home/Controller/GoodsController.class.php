<?php
/**
 * Created by PhpStorm.
 * User: dujianbo
 * Date: 2016/11/14
 * Time: 14
 */
 
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    private $keyalready;
    public function goodslist()  {
        header("Content-Type:text/html; charset=utf-8");
        $goods = new \Home\Model\GoodsModel();
        $goods = D("Goods");
        $key = I('sosuo');
        $keyTU = I('timeup');
        $keyTD = I('timedown');
        $keyPU = I('priceup');
        $keyPD = I('pricedown');
        $keyXX = I('1');
        $keyDZ = I('2');
        $keySH = I('3');
        $keyQT = I('4');
        $info = $goods -> select();
        $this -> assign('info', $info);
        //实现分页效果

        //$count = $goods->count();
        //$Page = new \Think\Page($count,8);
        //$show = $Page->show();
        $list = $goods->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);

        if($key){//关键字搜索
            $userForm=M('Goods');
            $list=$userForm->where("goods_name like '%$key%'")->limit($Page->firstRow.','.$Page->listRows)->select();
            $count = $goods->count();
            $this->keyalready = 1;
            $Page = new \Think\Page($count,8);
            //实现分页后
            //foreach($lsit as $key=>$val) {
            //	$Page->parameter.="$key=".urlencode($val)."&";//赋值给Page
            //}


            //$show = $Page->show();
            $this->assign('list',$list);
            $this->assign('page',$show);


        }

        if(!$keyPU==priceup){//价格排序增
            if($this->keyalready == 1){
                var_dump($list);
                $list=$userForm->where("goods_name like '%$key%'")->limit($Page->firstRow.','.$Page->listRows)->order('goods_price desc')->select();

                $count = $goods->count();
                $Page = new \Think\Page($count,8);
                $show = $Page->show();

                $this->assign('list',$list);
                $this->assign('page',$show);

            }else{
                $userForm=M('Goods');
                $list=$userForm->limit($Page->firstRow.','.$Page->listRows)->order('goods_price desc')->select();
                $this -> assign('list', $list);
                $this->assign('page',$show);

                //$count = $goods->count();
                //$Page = new \Think\Page($count,8);
                //$show = $Page->show();

                $this->assign('list',$list);
                $this->assign('page',$show);
            }
        }
        if($keyPD==pricedown){//价格排序减

            $userForm=M('Goods');
            $list=$userForm->limit($Page->firstRow.','.$Page->listRows)->order('goods_price asc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $goods->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }

        if($keyTU==timeup){	//时间排序增
            $userForm=M('Goods');
            $list=$userForm->limit($Page->firstRow.','.$Page->listRows)->order('goods_id asc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $goods->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($keyTD==timedown){	//时间排序减
            $userForm=M('Goods');
            $list=$userForm->limit($Page->firstRow.','.$Page->listRows)->order('goods_id desc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $goods->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($keyXX==study){	//学习类
            $userForm=M('Goods');
            $list=$userForm->where("goods_type = 1")->limit($Page->firstRow.','.$Page->listRows)->order('goods_id desc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $goods->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($keyDZ==dianzi){	//电子类
            $userForm=M('Goods');
            $list=$userForm->where("goods_type =2")->limit($Page->firstRow.','.$Page->listRows)->order('goods_id desc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $goods->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($keySH==life){	//生活类
            $userForm=M('Goods');
            $list=$userForm->where("goods_type =3")->limit($Page->firstRow.','.$Page->listRows)->order('goods_id desc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $goods->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }
        if($keyQT==other){	//其他
            $userForm=M('Goods');
            $list=$userForm->where("goods_type =4")->limit($Page->firstRow.','.$Page->listRows)->order('goods_id desc')->select();
            $this -> assign('list', $list);
            $this->assign('page',$show);

            $count = $goods->count();
            $Page = new \Think\Page($count,8);
            $show = $Page->show();

            $this->assign('list',$list);
            $this->assign('page',$show);
        }


        $radio = I('goods_type');//添加商品类型
        $this -> display();


    }
    public function goodsdetail()
    {	$goods = D("Goods");
        $id=$_GET['id'];
        $info = $goods->where('goods_id='.$id)->select();
        $this -> assign('info', $info);
        //var_dump($info);
        $this -> display();
    }
        
    //添加商品
   public function add(){
       if(session('username')==null){
           $this->error('未登录，不能添加商品！');
       }else {
           $goods_time=date('Y-m-d H:i:s');
           $user = D('user');
           $session =  session('username');
           $data = $user->where("username='%s'",$session)->getField('user_id');
           $this->assign('data',$data);

           $this->assign('goods_time',$goods_time);
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

                   $rst = $goods->add($_POST);
                   if ($rst) {
                       $data = M('Goods');
                       date("Y-m-d H:i:s" ,time());
                       $goods_time=date("Y-m-d H:i:s" ,time());
                       $this->success('添加成功',U("home/goods/goodsdetail?id=$rst"),0);
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
    public function update($goods_id)
    {
        if(session('username')==null){
            $this->error('未登录，不能修改商品！');
        }else {
            //查看商品的user_id
            $user = D('user');
            $session = session('username');
            $data = $user->where("username='%s'", $session)->getField('user_id');
            //查询被修改的商品的信息并传递给模板展示
            $goods = D('goods');
            $vo = $goods->where("goods_id=$goods_id")->getField('user_id');
            if ($vo != $data) {
                $this->error('不是自己的商品，不能修改！');
            } else {

                //两个逻辑：展示表单 、收集表单
                if (!empty($_POST)) {

                    if (!empty($_FILES)) {
                        $config = array(
                            'rootPath' => './public/',  //根目录
                            'savePath' => 'upload/', //保存路径
                        );
                        //附件被上传到路径：根目录/保存目录路径/创建日期目录
                        $upload = new \Think\Upload($config);
                        //uploadOne会返回已经上传的附件信息
                        $z = $upload->uploadOne($_FILES['goods_img']);
                        if (!$z) {
                            show_bug($upload->getError()); //获得上传附件产生的错误信息
                        } else {
                            //拼装图片的路径名
                            $bigimg = $z['savepath'] . $z['savename'];
                            $_POST['goods_img'] = $bigimg;

                            //把已经上传好的图片制作缩略图Image.class.php
                            $image = new \Think\Image();
                            ////open();打开图像资源，通过路径名找到图像
                            $srcimg = $upload->rootPath . $bigimg;

                        }
                    }


                        $goods->create();
                        $rst = $goods->save();
                        if ($rst) {
                            $this->success('修改成功！', U("home/goods/goodsdetail?id=$goods_id"), 0);
                        } else {
                            $this->error('修改失败！');
                        }
                    } else {
                        $info = $goods->find($goods_id);
                        $this->assign('info', $info);
                        $this->display();
                    }
                }
            }

        }
    //删除商品
    public function delete($goods_id)
    {

        if(session('username')==null){
            $this->error('未登录，不能修改商品！');
        }else{
            //查看商品的user_id
            $user = D('user');
            $session =  session('username');
            $data = $user->where("username='%s'",$session)->getField('user_id');
            //查询被修改的商品的信息并传递给模板展示
            $goods = D('goods');
            $vo = $goods->where("goods_id=$goods_id")->getField('user_id');
            if($vo != $data){
                $this->error('不是自己的商品，不能修改！');
            }else{
                $result = $goods->delete("$goods_id");
                if ($result !== false) {
                    $this->success('删除成功！', U('home/goods/goodslist'), 0);
                } else {
                    $this->error('删除失败！',U( 'home/goods/goodsdetail'), 0);
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
            $goods = D('goods');
            $list = $goods->where("user_id=$data")->select();
            $this->assign('list',$list);
            $this->display();
        }
    }

}
