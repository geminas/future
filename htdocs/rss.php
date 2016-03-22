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
	
	$items=queryDB_array("select * from news where recommendation > 0 and status <> 0 order by recommendation asc, publishTime desc");
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
	print($rss->asXML());
?>
