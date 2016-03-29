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

	$events=queryDB_array("select * from events");

	// $xml = new SimpleXMLElement('<rss version="2.0"/>');
	// 

	$channel = new SimpleXMLElement("simple.xml",null,true);

	$nowTime = date('Y-m-d H:i:s',time());

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/");
	$itemXml->addChild('priority', "1.0");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/aboutus.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/aboutus_en.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/contactus.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/contactus_en.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/footprints.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/footprints_en.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/index.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/index_en.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/joinus.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/joinus_en.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/news.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/people.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/people_en.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/prize.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/prize_en.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/product.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	$itemXml = $channel->addChild('url');
	$itemXml->addChild('loc', "http://www.futureforum.org.cn/product_en.php");
	$itemXml->addChild('priority', "0.8");
	$itemXml->addChild('lastmod', $nowTime);
	$itemXml->addChild('changefreq', "always");

	foreach ($events as $event) {
		$itemXml = $channel->addChild('url');
		$itemXml->addChild('loc', "http://www.futureforum.org.cn/footprints/{$event['id']}.html");
		$itemXml->addChild('priority', "0.6");
		$itemXml->addChild('lastmod', $nowTime);
		$itemXml->addChild('changefreq', "Weekly");

		$itemXml = $channel->addChild('url');
		$itemXml->addChild('loc', "http://www.futureforum.org.cn/footprints_en/{$event['id']}.html");
		$itemXml->addChild('priority', "0.6");
		$itemXml->addChild('lastmod', $nowTime);
		$itemXml->addChild('changefreq', "Weekly");
	}

	foreach($items as $item) {
	    $itemXml = $channel->addChild('url');
	    $itemXml->addChild('loc', "http://www.futureforum.org.cn/news/{$item['id']}.html");
	    $itemXml->addChild('priority', "0.6");
	    $itemXml->addChild('lastmod', $nowTime);
	    $itemXml->addChild('changefreq', "Weekly");
	}

	Header('Content-type: text/xml');

	$b = '<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?> <!-- Free Sitemap Generator http://www.sitemapx.com -->';

	// echo $b;

	$c = $channel->asXML();

	print($c);

	// 假设你的文件b.php已经创建，并且有权操作
	// 但还是加上权限设定的语句，比较保险
	// 打开b.php文件，这里采用的是a+，也可以用a，a+为可读可写，a为只写，如果b.php不能存在则会创建它
	$file = fopen('sitemap.xml', 'w'); // a模式就是一种追加模式，如果是w模式则会删除之前的内容再添加
	// 获取需要写入的内容
	
	// 写入追加的内容
	fwrite($file, $c);
	// 关闭b.php文件
	fclose($file);
	// 销毁文件资源句柄变量
	unset($file);
?>
