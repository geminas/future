<?php 

	ob_start();
	require_once 'general.php';
	ob_end_clean();

	print_r("general.php");

	class SimpleXMLExtended extends SimpleXMLElement {
	public function addCData($cdata_text) {
	    $node = dom_import_simplexml($this); 
	    $no   = $node->ownerDocument; 
	    $node->appendChild($no->createCDATASection($cdata_text)); 
	  } 
	}
	
	$items=queryDB_array("select * from news");

	print_r($items);

	// $xml = new SimpleXMLElement('<rss version="2.0"/>');
	$rss=new SimpleXMLExtended('<rss version="2.0"/>');
	$channel=$rss->addChild('channel');
	$channel->addChild('title', "未来论坛");
	$channel->addChild('description', "未来论坛XML");
	$channel->addChild('link', "http://www.baidu.com");
	$channel->addChild('generator', "http://www.google.com");

	foreach($items as $item) {
	    $itemXml = $channel->addChild('item');
	    $itemXml->addChild('title', "{$item['title']}");
	    $link=$itemXml->addChild('link');
	    $link->addCData('https://bbs.sjtu.edu.cn/bbstcon,board,PartTime,reid,1453027326.html');
	    $itemXml->addChild('author', "{$item['author']}");
	    $itemXml->addChild('pubDate', "{$item['publishTime']}");
	}

	Header('Content-type: text/xml');
	print($rss->asXML());
?>
