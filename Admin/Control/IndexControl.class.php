<?php
/*
   后台默认控制器
*/
class IndexControl extends Control{

	/*
      构造函数
	*/
      public function __construct(){
      	if(!isset($_SESSION['aid']) || !isset($_SESSION['username']))
      		go('Login/index');
      }
	/*
	  	后台默认方法
	*/
    public function index(){
        $this->display();
    }
   /*
    后台默认显示欢迎界面
   */
    public function copy(){
    	$this->display();
    }

    /*
      查看愿望
    */
      public function check(){
        $db=M('wish');

        $page = new page($db->count(),5,4,2);
        $this->assign('page',$page->show());

        $wish = $db->select($page->limit());

        foreach ($wish as $k => $v) {
          $wish[$k]['content'] = $this->change_face($v['content']);
        }
        $this->assign('wish',$wish);
        $this->display();
      }

      /*
       删除愿望
      */
       public function del(){
        $wid = $this->_GET('wid','intval');
        M('wish')->where(array('wid'=>$wid))->delete();
        $this->success('删除成功！');

       }

       /*
          修改后台用户密码
       */

          public function passwd(){
            if(IS_POST){
              $passwdF = $this->_POST('passwdF');
              $passwdS = $this->_POST('passwdS');

              if(strlen($passwdF) < 6) $this->error('密码不得少于6位');
              if($passwdF != $passwdS) $this->error('两次密码不相同');

              $aid = session('aid');

              M('admin')->where(array('aid'=>$aid))->save(array('passwd'=>md5($passwdF)));

              $this->success('密码修改成功！');
            }

            $this->display();
          }


      /*
       替换表情
      */
    public function change_face($content){
      $preg = '/\[(\w*?)\]/';
      $con = preg_replace($preg, '<img src="' . __PUBLIC__ . '/images/phiz/\1.gif"/>', $content);
      return $con;

    }


       
}
?>