<?php
namespace app\user\controller;
use think\Controller;
use think\Db;

class Login extends Base
{

    /*
     * 析构流函数
    */

    public function  __construct() {
        parent::__construct();
      

    }

    public function index()
    {


        echo "login";
       
    }
}
