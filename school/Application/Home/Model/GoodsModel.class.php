<?php
namespace Home\Model;
use Think\Model;


class GoodsModel extends Model
{
    protected $patchValidate    =   true;

    //实现表单项目验证
    //通过重写父类属性_validate实现表单验证
    protected $_validate        =   array(
        //验证用户名,require必须填写项目
        array('goods_name','require','用户名必须填写'),
        //array('goods_time','require','时间必须填写'),
        array('goods_qq','number','QQ必须是数字'),
        array('goods_tel','number','电话必须是数字')

    );


}


