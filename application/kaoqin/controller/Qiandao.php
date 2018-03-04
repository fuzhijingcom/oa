<?php
namespace app\kaoqin\controller;
use think\Controller;
use think\Db;

class Qiandao extends Base
{

    /*
     * 析构流函数
    */

    public function  __construct() {
        parent::__construct();
      

    }

    public function index()
    {

        $user_id = session('user_id');

        dump($user_id);
       
        return $this->fetch();
    }
}
