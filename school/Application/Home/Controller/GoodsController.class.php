<?php
/**
 * Created by PhpStorm.
 * User: dujianbo
 * Date: 2016/11/14
 * Time: 14:00
 */
 
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller
{

    public function goodslist()
    {
        header("Content-Type:text/html; charset=utf-8");
        $user = D('user');
        if (session('username') == null) {
            $userid = -1;
        } else {
            $userid = $user->where("username='%s'", session('username'))->getField('user_id');
        }
        $this->assign('userid', $userid);
        //$goods = new \Home\Model\GoodsModel();
        $goods = D("Goods"); //实例化GOODS类
        $key = I('sosuo');
        $keyXX = I('study');
        $keyDZ = I('dianzi');
        $keySH = I('life');
        $keyQT = I('other');
        $keyTU = I('timeup');
        $keyTD = I('timedown');
        $keyPU = I('priceup');
        $keyPD = I('pricedown');

        //1. 获得当前记录总条数
        $total = $goods->count();
        $per = 16;
        //2. 实例化分页类对象
        $page = new \Component\Page($total, $per); //autoload
        //3. 拼装sql语句获得每页信息
        $sql = "select * from 	think_goods " . $page->limit;

        if ($key) {//关键字搜索
            $userForm = M('Goods');
            $user = M('User');
            $sql1 = "select * from 	think_goods,think_user where (think_goods.goods_name like '%$key%' or think_user.username like '$key') and think_goods.user_id=think_user.user_id " . $page->limit;
            $total = $goods->execute($sql1);
            $per = 16;
            $page = new \Component\Page($total, $per);
            // select * from a,b where a.uid=b.uid and (a.name like '%关键字%' and(or) b.name like '%关键字%')
            $sql = "select * from 	think_goods,think_user where (think_goods.goods_name like '%$key%' or think_user.username like '$key') and think_goods.user_id=think_user.user_id " . $page->limit;

        }

        if ($keyTU == timeup) {    //时间排序增
            $userForm = M('Goods');
            $total = $userForm->count();
            $per = 16;
            $page = new \Component\Page($total, $per);
            $sql = "select * from 	think_goods order by goods_id desc " . $page->limit;

        }
        if ($keyTD == timedown) {    //时间减
            $userForm = M('Goods');
            $total = $userForm->count();
            $per = 16;
            $page = new \Component\Page($total, $per);
            $sql = "select * from 	think_goods order by goods_id asc " . $page->limit;

        }
        if ($keyPU == priceup) {    //价格增
            $userForm = M('Goods');
            $total = $userForm->count();
            $per = 16;
            $page = new \Component\Page($total, $per);
            $sql = "select * from 	think_goods order by goods_price asc " . $page->limit;

        }
        if ($keyPD == pricedown) {    //价格减
            $userForm = M('Goods');
            $total = $userForm->count();
            $per = 16;
            $page = new \Component\Page($total, $per);
            $sql = "select * from 	think_goods order by goods_price desc " . $page->limit;

        }

        if ($keyXX == 'study') {    //学习类
            $userForm = M('Goods');
            //$list=$userForm->where("goods_type like 'study'")->limit($Page->firstRow.','.$Page->listRows)->order('goods_id  $this->errordesc')->select();
            $total = $userForm->where("goods_type like 'study'")->count();
            //var_dump($total);
            $per = 16;
            $page = new \Component\Page($total, $per);
            $sql = "select * from 	think_goods where goods_type like 'study' " . $page->limit;

        }
        if ($keyDZ == 'dianzi') {    //电子类
            $userForm = M('Goods');
            $total = $userForm->where("goods_type like 'dianzi'")->count();
            $per = 16;
            $page = new \Component\Page($total, $per);
            $sql = "select * from 	think_goods where goods_type like 'dianzi' " . $page->limit;

        }
        if ($keySH == 'life') {    //生活类
            $userForm = M('Goods');
            $total = $userForm->where("goods_type like 'life'")->count();
            $per = 16;
            $page = new \Component\Page($total, $per);
            $sql = "select * from 	think_goods where goods_type like 'life' " . $page->limit;

        }
        if ($keyQT == 'other') {    //其他类
            $userForm = M('Goods');
            $total = $userForm->where("goods_type like 'other'")->count();
            $per = 16;
            $page = new \Component\Page($total, $per);
            $sql = "select * from 	think_goods where goods_type like 'other' " . $page->limit;

        }
        $info = $goods->query($sql);
        $pagelist = $page->fpage();

        $this->assign('info', $info);
        $this->assign('pagelist', $pagelist);
        $this->display();


    }

    public function goodsdetail()
    {
        $goods = D("Goods");
        $id = I('get.id');
        $info = $goods->where('goods_id=' . $id)->select();
        $this->assign('info', $info);
        $goods->where('goods_id=' . $id)->setInc('goods_views',1);
        $info1 = $goods -> getField('goods_views');
        $this -> assign('info1',$info1);

        //获取goods里面的user_id
        $user_id = $info[0]['user_id'];
        //var_dump($id);
        //查看商品的user_name
        $user = D('user');
        $user_name = $user->where("user_id='%s'", $user_id)->getField('username');
        $this->assign('user_name', $user_name);
        //var_dump($data);
        //var_dump($info);
        $this->display();
    }

     //添加商品
    public function add()
    {
         if (session('username') == null) {
            $this->error('未登录，不能添加商品！');
        } else {
            $user = D('user');
            $session = session('username');
            $count = $user->where("username='%s'",$session)->getField('count');
            if($count==1) {
                $user_time = $user->where("username='%s'", $session)->getField('user_time');
                $user_day = $user->where("username='%s'", $session)->getField('user_day');
                $time = date('Y-m-d,H:i:s', time());
                $time = strtotime($time);
                $lstimes = intval(($time - (int)$user_time) / 3600);
                if ($lstimes < $user_day) {
                    $this->error('禁言中，不能添加商品！', U('home/goods/goodslist'), 3);
                } 
            }else {

                    $user->where("username='%s'",$session)->setField('count',0);
                    $user->where("username='%s'",$session)->setField('user_time',null);
                    $user->where("username='%s'",$session)->setField('user_day',null);
                    $vo = $user->where("username='%s'", $session)->getField('user_id');
                    $this->assign('vo', $vo);
                    $goods = new \Home\Model\GoodsModel();
                    if (!empty(I('post.'))) {
                        if (!$goods->create()) {
                            $this->error("商品添加失败，请重新添加");
                        } else {
                            //敏感词！！！！
                            $filter_word = include "SensitiveThesaurus.php";
                            if (isset($_POST['sub'])) {
                                $str = $_POST['goods_detail'];

                                for ($i = 0; $i < count($filter_word); $i++) {
                                    if (preg_match("/" . trim($filter_word[$i]) . "/i", $str)) {
                                        $_POST['goods_detail'] = preg_replace("/" . trim($filter_word[$i]) . '/i', '***', $str);
                                    }
                                }
                            }
                            if (!empty($_FILES)) {
                                $config = array(
                                    'rootPath' => './public/',  //根目录
                                    'savePath' => 'upload/', //保存路径
                                );
                                //附件被上传到路径：根目录/保存目录路径/创建日期目录
                                $upload = new \Think\Upload($config);
                                $upload->maxSize = 3145728;// 设置附件上传大小
                                $upload->exts = array('jpg', 'png', 'jpeg', '');
                                //uploadOne会返回已经上传的附件信息
                                $z = $upload->uploadOne($_FILES['goods_img']);
                                $z1 = $upload->uploadOne($_FILES['goods_img1']);
                                if (!$z && !$z1) {
                                    //show_bug($upload->getError()); //获得上传附件产生的错误信息
                                    $this->error('文件格式错误，请重新添加');
                                    //break;
                                } else {
                                    //拼装图片的路径名
                                    $bigimg = $z['savepath'] . $z['savename'];
                                    $bigimg1 = $z1['savepath'] . $z1['savename'];
                                    $_POST['goods_img'] = $bigimg;
                                    $_POST['goods_img1'] = $bigimg1;
                                }
                            }

                            $rst = $goods->add($_POST);
                            if ($rst) {
                                $this->success('添加成功', U("home/goods/goodsdetail?id=$rst"), 0);
                            } else {
                                $this->error('$rst');
                            }
                        }
                    } else {
                        $this->display();
                    }
                }
            

        }

    }

//修改商品内容
    public function update($goods_id)
    {
        if (session('username') == null) {
            $this->error('未登录，不能修改商品！');
        } else {
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
                    //敏感词！！！！
                     $filter_word = include "SensitiveThesaurus.php";
                     if (isset($_POST['sub'])) {
                     $str = I('post.goods_detail');
                     for ($i = 0; $i < count($filter_word); $i++) {
                       if (preg_match("/" . trim($filter_word[$i]) . "/i", $str)) {
                      $_POST['goods_detail'] = preg_replace("/" . trim($filter_word[$i]) . '/i', '***', $str);
                                    }
                                }
                            }

                    if (!empty($_FILES)) {
                        if(strlen($_FILES[goods_img][name])!=0||strlen($_FILES[goods_img1][name])!=0){
                            $config = array(
                                'rootPath' => './public/',  //根目录
                                'savePath' => 'upload/', //保存路径
                            );
                            //附件被上传到路径：根目录/保存目录路径/创建日期目录
                            $upload = new \Think\Upload($config);
                            $upload->maxSize = 3145728;// 设置附件上传大小
                            $upload->exts = array('jpg', 'png', 'jpeg', '');
                            //uploadOne会返回已经上传的附件信息
                            $z = $upload->uploadOne($_FILES['goods_img']);
                            $z1 = $upload->uploadOne($_FILES['goods_img1']);
                            if (!$z && !$z1) {
                                //show_bug($upload->getError()); //获得上传附件产生的错误信息
                                $this->error('文件格式错误，请重新添加');
                                //break;
                            } else {
                                //拼装图片的路径名
                                $bigimg = $z['savepath'] . $z['savename'];
                                $bigimg1 = $z1['savepath'] . $z1['savename'];
                                $_POST['goods_img'] = $bigimg;
                                $_POST['goods_img1'] = $bigimg1;
                            }
                        }
                    }


                    $goods->create();
                    $rst = $goods->save($_POST);
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
                    $this->error('删除失败！',U( "home/goods/goodsdetail/goods_id/$goods_id"), 0);
                }
            }
        }
    }

    //查看自己的商品
    public function self($user_id){
        if($user_id==-1){
            $this->error('未登录，不能查看自己的商品！');
        }else {
            //查看登录用户的user_id
            $user = D('user');
            $user_name = $user->where("user_id='%s'", $user_id)->getField('username');
            $this->assign('user_name',$user_name);
            //获取用户是user_id添加的商品
            $goods = D('goods');
            //1. 获得当前记录总条数
            $total = $goods ->where("user_id=$user_id")-> count();
            $per = 16;
            //2. 实例化分页类对象
            $page = new \Component\Page($total, $per); //autoload
            //3. 拼装sql语句获得每页信息
            $sql = "select * from 	think_goods where user_id like '$user_id'".$page->limit;
            $list = $goods -> query($sql);
            //4. 获得页码列表
            $pagelist = $page -> fpage();
            $this -> assign('pagelist', $pagelist);
            $this->assign('list',$list);
            $this->display();
        }
    }
    //举报商品
    public function jubao($goods_id){
        if(session('username')==null){
            $this->error('未登录，不能举报商品！');
        }else{
            $goods = D('goods');
            $res=$goods->where("goods_id=$goods_id")->setField('status',1);
            if($res == 1){
                $this->success('举报成功！',U('home/goods/goodslist'),0);
            }else{
                $this->error('举报失败！',U("home/goods/goodsdetail?id=$goods_id"),0);
            }
        }
    }

}