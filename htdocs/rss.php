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
	    // $itemXml->addChild('title', "{$item['title']}");
	    // $itemXml->addChild('link', "http://www.futureforum.org.cn/news/{$item['id']}.html");
	    // $itemXml->addChild('author', "{$item['author']}");
	    // $itemXml->addChild('pubDate', "{$item['publishTime']}");
	    $itemXml->addChild('loc', "http://www.futureforum.org.cn/news/{$item['id']}.html");
	    $itemXml->addChild('priority', "0.6");
	    $itemXml->addChild('lastmod', "{$item['publishTime']}");
	    $itemXml->addChild('changefreq', "Weekly");
	}

	Header('Content-type: text/xml');
	print($rss->asXML());
?>
