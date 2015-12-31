<?php
/*
 登录控制器
*/
class LoginControl extends Control{

	/*
	登录页显示
	*/
	public function index(){
     
      $this->display();
	}
  /*
    验证码显示
  */
    /*
    public function code(){
      
      $code = new code();
      $code->show();
    }
    */
    /*
      登录
    */
      public function login(){
        //p($_POST);
        $username = $this->_POST('username');
        $passwd = $this->_POST('passwd','md5');

        $user = M('admin')->where(array('username'=>$username))->find();
        
        if(!$user || $passwd != $user['passwd']) $this->error('用户名或密码不正确');
        
        $_SESSION['username'] = $username;
        $_SESSION['aid'] = $user['aid'];  

        $this->success('登录成功，正在为您跳转...','Index/index');
      }

      /*
         退出
      */
         public function out(){
           session_unset();
           session_destroy();
           $this->success('退出成功！');

 }
}
?>