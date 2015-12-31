<?php
/*
  默认前台控制器
*/
class IndexControl extends Control{
	/*
	默认前台方法
	*/
    public function index(){
    	$wish = M('wish')->select();
      foreach ($wish as $k => $v) {
        $wish[$k]['content'] =$this->change_face($v['content']);
      }
      $this->assign('wish',$wish);
        $this->display();
    }

    /*
    异步发表愿望
    */
    public function ajax_wish(){
    	$nickname = $this->_POST('nickname');
    	$content = $this->_POST('content');

    	$data = array(
              'nickname'  => $nickname,
              'content'   => $content,
              'time'      => time()
    		);
    	$id = M('wish')->add($data);
    	$color = mt_rand(1,3);
    	$time = date('Y-m-d H:i');

      $con = $this->change_face($content);

    	$html = <<< str
    	<dl class='paper a{$color}'>
			<dt>
				<a href="javascript:void(0)" class='close_wish'>关闭</a>
			</dt>
			<dd class='content'>
				<span class='num'>幸运号【{$id}】</span>
				<p class='content'>{$con}</p>
				<span class='username'>许愿人：{$nickname}</span>
				<p class='time'>{$time}</p>
			</dd>
			<dd class='bottom'></dd>
		</dl>
str;
    echo $html;
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