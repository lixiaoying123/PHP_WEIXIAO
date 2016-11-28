<?php
namespace Home\Model;
use Think\Model;


class UserModel extends Model
{
    protected $patchValidate    =   true;

    //实现表单项目验证
    //通过重写父类属性_validate实现表单验证
    protected $_validate        =   array(

        //验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        //验证用户名,require必须填写项目
        array('username','require','用户名必须填写'),
        array('userpassword','require','密码必须填写'),
        //可以为同一个项目设置多个验证
        array('userpassword2','require','确认密码必须填写'),
        //与密码的值得是一致的
        array('password2','password','与密码的信息必须一致',0,'confirm'),
        //学院不能为空
        array('userclass','require','学院必须填写'),
        //验证码不能为空
        array('yanzhengma','require','验证码必须填写'),
        //邮箱验证
        array('useremail','require','验证码必须填写'),
        // 在新增的时候验证name字段是否唯一
        array('username', '', '该用户名已被注册！', 0, 'unique', 1),
        // 新增的时候email字段是否唯一
        array('useremail', '', '该邮箱已被占用', 0, 'unique', 1),
        // 内置正则验证邮箱格式
        array('useremail', 'email', '邮箱格式不正确'),

    );
    //验证用户密码
    function checkNamePwd($name,$pwd){
        $info = $this->getByusername($name);

        if (!empty($info)){
            if ($info['userpassword']!=$pwd){
                return false;
            } else{
                return true;
            }

        } else{
            return false;
        }
    }


}


