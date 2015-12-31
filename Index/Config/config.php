<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
$arr = array(
	
);
return array_merge(include "./Conf/dbconfig.php",$arr);
?>