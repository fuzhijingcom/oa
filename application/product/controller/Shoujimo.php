<?php
namespace app\product\controller;
use think\Controller;
use think\Page;
use think\Db;
use think\Session;
use think\Request;

class Shoujimo extends Controller {

    /*
     * 析构流函数
    */

    public function  __construct() {
        parent::__construct();
      

    }
   
    public function index(){
       
    

        // $pro_num = Db::table('oa_product')->count();
        // $this->assign("pro_num",$pro_num);


        return $this->fetch();
    }
   
    public function product_list(){

        // if (input('?post.name')){

        //     $post  = input('post.');
            
        //     Db::table('oa_product')->insert($post);
        //     $this->success('增加成功');


        // }

       
        // $list = Db::table('oa_product')->select();
        // $this->assign("list",$list);

        // return $this->fetch();
    }
    
   
}