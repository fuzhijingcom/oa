<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Index extends Base
{

    /*
     * 析构流函数
    */

    public function  __construct() {
        parent::__construct();
      

    }
     

    public function oa()
    {

        $company = session('company');
        echo $company;
    
    }


    public function index()
    {

       
        $company = session('company');

       $com = Db::table('oa_company')->where('id',$company)->find();
    

       $this->assign('com',$com);

        return $this->fetch();
    }
}
