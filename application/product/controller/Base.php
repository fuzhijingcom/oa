<?php
namespace app\product\controller;
use think\Controller;
use think\Db;

class Base extends Controller
{

    /*
     * 析构流函数
    */

    public function  __construct() {
        parent::__construct();

        $company = input('company');
        if($company){
            session('company',$company);
        }else{
            $company = session('company');
        }
        if(!$company){
            $this->error("公司参数错误");
            exit;
        }


        //去获取用户信息
        $user_id = session('user_id');
        if(!$user_id){
            //不存在

            if(input('?get.login_token')){
                $login_token = input('get.login_token');
                //curl去拿数据
                $res = httpRequest("http://c3w.cc/entry/api/getdata?login_token=".$login_token);
                if($res == "timeout" || $res == "invalid"){
                    $this->get_token();
                    exit;
                }
                $res = json_decode($res);
                $user_id = $res['user_id'];
                $openid = $res['openid'];

                $user_openid = Db::table('toa_user_openid')->where(array('id'=>$user_id,'openid'=>$openid))->find();
                //保存
                if(!$user_openid){
                    $data = array('id'=>$user_id,'openid'=>$openid);
                    Db::name('toa_user_openid')->insert($data);
                }

                $toa_user = Db::table('toa_user')->where(array('id'=>$user_id))->find();
                //保存
                if(!$toa_user){
                    $toa_user_data = array('id'=>$user_id,'username'=>'用户'.$user_id);
                    Db::name('toa_user')->insert($toa_user_data);
                }

                //拿到数据了，保存在session里
                session('user_id',$user_id);
               
            }else{
                $this->get_token();
            }

        }
       

    }

    public function get_token(){
        $url  = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url = urlencode($url);
        $url = 'http://c3w.cc/entry/api?ReturnUrl='.$url;
        header("Location:".$url);
        exit;
    }
    
}
