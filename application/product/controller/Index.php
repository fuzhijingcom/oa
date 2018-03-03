<?php
namespace app\product\controller;
// use app\home\logic\UsersLogic;
// use app\mobile\logic\Jssdk;
// use app\work\logic\YuangongLogic;
use think\Controller;
use think\Page;
use think\Db;
use think\Session;

class Index extends Controller {

    /*
     * 析构流函数
    */

    public function  __construct() {
        parent::__construct();

        $company = input('company');
        if($company){
            Session::set('company',$company);
        }else{
            $company = Session::get('company');
        }

        if(!$company){
            $this->error("公司参数错误");
            exit;
        }
      

    }
   
    public function index(){
        $company = Session::get('company');
    

        return $this->fetch();
    }
   
    public function product_list(){

        // if(IS_POST){
        //     $post  = I('post.');
            
        //     M('product')->save($post);
        //     $this->success('增加成功');
        // }

        $list = Db::table('oa_product')->select();
        $this->assign("list",$list);

        return $this->fetch();
    }
    
   
}