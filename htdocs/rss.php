<?php 

	ob_start();
	require_once 'general.php';
	ob_end_clean();

	class SimpleXMLExtended extends SimpleXMLElement {
	public function addCData($cdata_text) {
	    $node = dom_import_simplexml($this); 
	    $no   = $node->ownerDocument; 
	    $node->appendChild($no->createCDATASection($cdata_text)); 
	  } 
	}
	
	$items=queryDB_array("
	    select id,code,author,abstract,title, DATE_FORMAT(publishTime,'%Y-%m-%d %H:%i:%s') as publishTime from news
	    where status <> 0
	    order by status desc, publishTime desc;
	");
	// $xml = new SimpleXMLElement('<rss version="2.0"/>');
	$rss=new SimpleXMLExtended('<rss version="2.0"/>');
	$channel=$rss->addChild('channel');
	$channel->addChild('title', "未来论坛");
	$channel->addChild('description', "未来论坛RSS");
	$channel->addChild('link', "http://www.futureforum.org.cn/");

	foreach($items as $item) {
	    $itemXml = $channel->addChild('item');
	    $itemXml->addChild('title', "{$item['title']}");
	    $itemXml->addChild('link', "http://www.futureforum.org.cn/news/{$item['id']}.html");
	    $itemXml->addChild('author', "{$item['author']}");
	    $itemXml->addChild('pubDate', "{$item['publishTime']}");
	}

	Header('Content-type: text/xml');
	$c = $channel->asXML();
	print($c);

	// 假设你的文件b.php已经创建，并且有权操作
	// 但还是加上权限设定的语句，比较保险
	// 打开b.php文件，这里采用的是a+，也可以用a，a+为可读可写，a为只写，如果b.php不能存在则会创建它
	$file = fopen('rss.xml', 'w'); // a模式就是一种追加模式，如果是w模式则会删除之前的内容再添加
	// 获取需要写入的内容
	
	// 写入追加的内容
	fwrite($file, $c);
	// 关闭b.php文件
	fclose($file);
	// 销毁文件资源句柄变量
	unset($file);
?>
