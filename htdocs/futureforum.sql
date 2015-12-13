-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:33060
-- Generation Time: Nov 13, 2015 at 02:17 PM
-- Server version: 5.5.42
-- PHP Version: 5.4.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futureforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name_zh-cn` varchar(20) NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `subtitle_zh-cn` varchar(500) NOT NULL,
  `text_zh-cn` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `code`, `name_zh-cn`, `name_en`, `subtitle_zh-cn`, `text_zh-cn`) VALUES
(1, 'frontier-award', '未来科学大奖1', 'Future Science Award', '非官方、非营利、民间发起的科学大奖，中国的一项创举。', '旨在奖励对未来有影响的华裔科学家和华裔青年、科学家让科学家成为偶像、时代的英雄； 推动中国科学事业的发展，提升中国公民的科学素养。'),
(2, 'annual-conference', '未来年会', 'Annual Conference', '一年一度的全球科学人文创新盛宴', '由创始理事、咨委会员、科学界权威、政 商界领袖及艺术界精英等人群的参与组成。<br>通过论坛、展览及互动体验等多元化途径， 对话大师，碰撞思想，向世界传达“科学”、“环境”、 “哲学”、“生命”等主题，是时尚前瞻科技的新地标，创新科技思想的孵化平台，全球顶尖科学技术人才的汇集地。 '),
(3, 'seminar', '闭门耕研究沙龙', 'Exclusive Seminars', '对话题深度、条分缕析、互动交流、碰撞激发。', '不对外公开，小型而私密，预设的交流和讨论具前瞻性、启发性和思辨性话题。 '),
(4, 'lecture', '理解未来讲座', 'Understanding Future Lectures', '让我们沉浸在好奇心不断被激发和满足的过程中，智识版本实时更新', '邀请有洞察力和前瞻性的创新科学家和创业家，介绍现代科技最新研究成果和趋势，以丰富听众对未来的预测和认知，促进对未来的理解与思考，促进基础科学的普及'),
(5, 'academy', '未来学院', 'Future Academy', '邀请全世界最优秀的科学家、金融家、创业者，实践分享及研究。', '激发创新思维、开拓创新产业、发展创新技术，培训高科技创业人才与高端金融界精英，推动前沿科技跨界研究。'),
(6, 'unicenter', '未来中心 ', 'Uni Center', '最前沿科学技术分享，最广博开明的思想交流对话平台。', '拥有最新鲜的青年群体和最专业的科学大咖，网罗全球最新技术和有洞见之人，还可以进行跨界/跨地域/跨年龄的交流互动，让所有与之发生联系的受众涤荡视野、激荡思想、发见未来。');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `category` int(11) NOT NULL,
  `number` varchar(10) NOT NULL,
  `number_zh-cn` varchar(10) NOT NULL,
  `number_en` varchar(10) NOT NULL,
  `name_zh-cn` varchar(50) NOT NULL,
  `title_zh-cn` varchar(50) NOT NULL,
  `title_en` varchar(50) NOT NULL,
  `speaker_name` varchar(50) NOT NULL,
  `date_string` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `text_zh-cn` text NOT NULL,
  `youkuID` varchar(20) NOT NULL,
  `sequence` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `code`, `category`, `number`, `number_zh-cn`, `number_en`, `name_zh-cn`, `title_zh-cn`, `title_en`, `speaker_name`, `date_string`, `address`, `text_zh-cn`, `youkuID`, `sequence`) VALUES
(2, 'opening-ceremony', 1, '2015', '', '', '未来论坛创立大会', '未来论坛创立大会', 'Opening Ceremony', '', '2015年1月20日', '国贸三期', '未来年会，在创始理事、咨委会员、科学界权威、政商界领袖及艺术界精英等人群的参与下，自创立大会之初，便成为了一年一度的全球科学人文创新的盛宴。<br>未来年会，通过论坛、展览及互动体验等多元化途径，对话大师，碰撞思想，向世界传达“科学”、“环境”、“哲学”、“生命”等主题，是时尚前瞻科技的新地标，创新科技思想的孵化平台，全球顶尖科学技术人才的汇集地。<br>未来年会，秉承生生不息的人文精神，以引领人类文明为己任，与众有识之士一路前行。', '', 35),
(3, 'lecture-01', 2, '01', '第一期', '1st', '理解未来讲座第1期', '让计算机看懂这个世界', 'Let the computers understand the world', '赵勇', '2014年10月22日', '国贸三期B1礼堂', '“如果把计算机比作人，在所有感知力中，视觉是最重要的感觉，这就如同计算机视觉对人工智能的作用。”有了计算机视觉，再加上 计算机对看到的东西进行模式识别，计算机才有了对世界的认识，从而拥有一定程度上的人工智能。主讲者赵勇，格灵深瞳联合创始人及计算机视觉和人工智能专家。他认为，计算机视觉领域最根本的是让计算机“看懂”这个世界，而非过去的“看见”世界。?“看见”世界，就如人们用相机拍照，由人来看照片;而计算机“看懂”世界可涵盖的领域很多，DG则聚焦于安全和商业分析领域。未来二十年，在安全领域，将是视觉分析的天下，拼的是创新技术，而非成本和渠道。', '', 10),
(4, 'lecture-02', 4, '02', '第二期', '2nd', '理解未来讲座第2期xx', '基于大数据的人工智能', 'Artificial intelligence based on big data', '余凯', '2014年11月29日', '国贸三期B1礼堂', '余凯曾在微软，西门子和NEC工作。2011年任斯坦福大学计算机系Adjunct Faculty。曾在PASCAL VOC, ImageNet等竞赛中获国际第一。他领导的团队在2013年和2014年曾经三次获得“百度最高奖”，在语音识别，计算机视觉，互联网广告，网页搜索排序等核心业务获得突破性进展。2014年以来，他领导了百度大脑，百度高度自动驾驶，BaiduEye, 以及DuBike等人工智能项目。<br>今天我们面临这样一个世界：无处不在的智能硬件和无处不在的人工智能。但伟大的技术，不在于让机器变得更加智能和伟大，而是让每一个平凡的人更有智慧、更有创造性。未来世界是人类的还是机器人的？让余凯为我们揭秘这个智能的时代。', 'XMTM2NjU3MjIyNA==', 20),
(5, 'lecture-03', 2, '03', '第三期', '3rd', '理解未来讲座第3期', '新材料解救摩尔定律', 'New materials to save the Moore''s law', '张首晟', '2014年12月18日', '国贸三期B1礼堂', '张首晟教授先后获得过古根海姆基金奖（2007年）、洪堡研究奖（2009年）、欧洲物理奖（2010年）、古登堡研究奖（2010年）、求是杰出科学家奖（2011年）、奥利弗?巴克利凝聚态物理奖（2012年）、狄拉克奖章（2012年）基础物理学奖“物理学前沿奖”（2013）等奖项。2014年获诺贝尔物理学奖提名；同年，荣获富兰克林奖章。<br>回顾整个人类的历史，材料的发现根本改变了人类的文明。过去60年里，信息技术的发展严格遵循摩尔定律，然而，这种显著的趋势已经接近尾声。最近的科学发现，拓扑绝缘体可以导致信息处理模式革命性变化，电子可以朝着规划好的轨道有秩序运动。关于这个发现背后的故事，且听张首晟教授娓娓道来。', '', 30),
(6, 'lecture-04', 2, '04', '第四期', '4th', '理解未来讲座第4期', '王俊给你讲讲关于基因的神奇故事', 'Miracles around genes', '王俊', '2015年1月30日', '耶鲁北京中心', '王俊是英国科学期刊杂志《自然》在2012年年末刊出2012年对科学界影响力最大的年度十大人物，36岁的他是其中之一，也是最年轻的一位。他所领导的中国最大的基因测序机构华大基因也再次成为国际焦点。<br>他用大规模组学数据分析群体进化的中遗传多态性与环境适应性关系，阐明生物大数据在科学研究和应用中已经带来和即将引起的变革。通过系统性的分析各种不同类疾病的发病特点以及遗传因素、突变、肠道菌群在疾病和复杂表型中的作用，催生在健康领域广泛的应用，如对疾病的精准预测和及时预防，更具参与感和个性化的治疗。', '', 40),
(7, 'lecture-05', 2, '05', '第五期', '5th', '理解未来讲座第5期', '黑洞、白洞、虫洞让你脑洞大开', 'Black holes, white holes and worm holes', '张双南', '2015年3月14日', '耶鲁北京中心', '973项目《黑洞以及其它致密天体物理》首席科学家，硬X射线调制望远镜（HXMT）卫星首席助理，多波段伽玛暴卫星（SVOM）副首席，中国空间实验室伽玛暴偏振仪器（POLAR）首席，以及规划中的XTP空间天文台和中国空间站高能宇宙辐射探测设施（HERD）首席，中国空间站空间天文分系统首席科学家——张双南博士，作为理解未来系列讲座第五期主讲人，结合火遍全球的科幻大片《星际穿越》，帮助大家轻松理解神秘的“虫洞”、“黑洞”、“白洞”和“五维空间”的天体物理知识。', '', 50),
(8, 'lecture-06', 2, '06', '第六期', '6th', '理解未来讲座第6期', '量子飞跃：从神话传说到哲学到现代信息技术', 'Quantum leap: from ancient fantasy to modern techn', '潘建伟', '2015年4月25日', '耶鲁北京中心', '潘建伟作为国际上量子信息和量子通信实验研究领域的先驱和开拓者之一，他是该领域有重要国际影响力的科学家。利用量子光学手段，他在量子调控领域取得了一系列有重要意义的研究成果，尤其是他关于量子通信和多光子纠缠操纵的系统性创新工作使得量子信息实验研究成为近年来物理学发展最迅速的方向之一。', '', 60),
(9, 'lecture-07', 2, '07', '第七期', '7th', '理解未来讲座第7期', '颠覆性科研和创新', 'Disruptive research and innovations', '李凯', '2015年5月30日', '耶鲁北京中心', '邀请普林斯顿大学教授、美国国家工程院院士李凯和未来论坛“青年行动小组”代表，与清华学子一起探讨颠覆与创新的逻辑。<br>未来论坛“青年行动小组”的代表们将与李凯教授展开一次精彩的对话。“青年行动小组”是未来论坛搭建的一个面向青年科研工作者以及科技创投人的产、学、研科技生态平台，它聚集了一群40岁以下中国具有影响力的高科技创业者、投资人和科研工作者，他们正在创造或者投资改变未来的企业。', '', 70),
(12, 'seminar-01', 4, '01', '第一期', '1st', '闭门耕第1期', '脑科学与人工智能', 'Brain science and artificial intelligence', '', '2015年4月18日', '百度大厦', '“闭门”意指活动不对外公开，小型而私密，不以宣传和社会影响为目的。“耕”意指耕耘，预设的交流和讨论话题，以前瞻性、启发性和思辨性为主。<br>同时，对话题强调深度探求、条分缕析、互动交流、碰撞激发，拒绝泛泛而谈、蜻蜓点水。', '', 55);

-- --------------------------------------------------------

--
-- Table structure for table `events_category`
--

CREATE TABLE IF NOT EXISTS `events_category` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `value` int(11) NOT NULL,
  `title_zh-cn` varchar(100) NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `note_zh-cn` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events_category`
--

INSERT INTO `events_category` (`id`, `code`, `value`, `title_zh-cn`, `title_en`, `note_zh-cn`) VALUES
(1, '*', 0, '未来/足迹', 'Future/Footprints', '<strong>搭建桥梁，创建跨界平台<br>创新理念，激发思维模式<br>理解融合，落实前沿合作</strong>'),
(2, '.lecture', 2, '理解未来讲座', 'Understanding the Future Lectures', '<strong>让我们沉浸在好奇心不断被激发和满足的过程中，智识版本实时更新</strong><br><br>邀请有洞察力和前瞻性的创新科学家和创业家，介绍现代科技最新研究成果和趋势，以丰富听众对未来的预测和认知，促进对未来的理解与思考，促进基础科学的普及。\r\n'),
(3, '.seminar', 4, '闭门耕', 'Exclusive Seminars', '<strong>对话题深度、条分缕析、互动交流、碰撞激发</strong><br><br>不对外公开，小型而私密，预设的交流和讨论具前瞻性、启发性和思辨性话题。'),
(4, '.special', 1, '特别活动', 'Special Events', '');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_slides`
--

CREATE TABLE IF NOT EXISTS `homepage_slides` (
  `id` int(11) NOT NULL,
  `sequence` double NOT NULL,
  `bigtitle_zh-cn` varchar(20) NOT NULL,
  `bigtitle_en` varchar(80) NOT NULL,
  `text_zh-cn` varchar(300) NOT NULL,
  `subtext_zh-cn` varchar(700) NOT NULL,
  `href` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homepage_slides`
--

INSERT INTO `homepage_slides` (`id`, `sequence`, `bigtitle_zh-cn`, `bigtitle_en`, `text_zh-cn`, `subtext_zh-cn`, `href`) VALUES
(1, 1, '未来/回顾', 'Future/Highlights', '精准医学之路的曙光<br>谢晓亮教授主讲第九期理解未来讲座', '精准现代医学之路的一缕曙光，谢晓亮教授主讲第九期理解未来讲座\r\n', 'http://sports.sina.com.cn'),
(2, 2, '未来/年会哈哈哈', 'Annual Conference', '跨界，人类认知新百年<br>共同分享人类认知的最新成果，在交流和碰撞中，开启人类认知新百年。', '1915年，爱因斯坦广义相对论论文发表，人类对于宇宙的认知自此进入新纪元。<br>如果说，以往的跨界还罗列可数，当下学科间的交织和衍射，已经无比频繁和密集。跨界，已经成为人类开拓认知的新路径。', 'http://f1.sina.com.cn'),
(3, 3, '未来/预告', 'Future/Notice', '2015年9月12日 北京耶鲁中心 <br>理解未来讲座第十期 外尔准粒子的发现 主讲：丁洪 （中科院物理所）', '在固体材料中的“宇宙”中，亿万个电子通过相互作用能形成一种决定其母体材料性质的“准粒子”，这些准粒子与基本粒子可能遵循相同的物理规律。<br>近年来拓扑材料的快速发展为在固体材料中观测外尔费米子提供了新的思路和途径。在这个报告中丁洪先生将介绍我们是如何发现外尔准粒子。', ''),
(4, 5, '未来/xx', '', '', '', 'www.baidu.com');

-- --------------------------------------------------------

--
-- Table structure for table `miscs`
--

CREATE TABLE IF NOT EXISTS `miscs` (
  `id` varchar(40) NOT NULL,
  `caption` varchar(80) NOT NULL,
  `zh-cn` varchar(800) NOT NULL,
  `en` varchar(800) NOT NULL,
  `groupcode` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `sequence` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `miscs`
--

INSERT INTO `miscs` (`id`, `caption`, `zh-cn`, `en`, `groupcode`, `type`, `sequence`) VALUES
('description', 'description', '', '', 'global', 'input-text', 30),
('footprint-bigtitle', '大标题', '未来/足迹', 'Future/Footprints', 'footprint', 'input-text', 0),
('footprint-text', '标题附言', '这是一次科学与高新技术产业的完美握手。未来论坛不仅关注科学的未来，更为科学与产业的连接铺平了道路。在未来论坛，我们可以找到中国经济继续保持健康快速发展的钥匙。<br>在这里，我们能够看到科学之美和科学即将产生的力量。', '', 'footprint', 'textarea', 10),
('homepage-action-note', '行动-附言', '处其实，不居其华。未来论坛默默耕耘、精心奉献；<br>每月举办的理解未来系列讲座，邀请了蜚声中外的科学家，如张首晟，潘建伟，张双南，谢晓亮，丁洪。<br>每季度举办闭门耕研讨沙龙，深度探求、条分缕析、互动交流、思维碰撞<br>一年一度的未来年会, 是全球科学人文创新的盛宴。', '', 'homepage', 'textarea', 12),
('homepage-action-title', '行动-标题', '未来/行动', 'Future/Action', 'homepage', 'input-text', 11),
('homepage-footprint-button', '足迹-按钮', '了解更多', 'MORE', 'homepage', 'input-text', 23),
('homepage-footprint-note', '足迹-附言', '这是一次科学与高新技术产业的完美握手。未来论坛不仅关注科学的未来，更为科学与产业的连接铺平了道路。在未来论坛，我们可以找到中国经济继续保持健康快速发展的钥匙。<br>在这里，我们能够看到科学之美和科学即将产生的力量。', '', 'homepage', 'textarea', 22),
('homepage-footprint-title', '足迹-标题', '未来/足迹', 'Future/Footprints', 'homepage', 'input-text', 21),
('homepage-people-button', '人物-按钮', '了解更多', 'MORE', 'homepage', 'input-text', 3),
('homepage-people-note', '人物-附言', '一群40岁以下中国最具影响力的互联网先行者，投资界成功者、科学界前沿者，同时是具有前沿思考的青年创业者、创新思维模式的科学家。透过此交流平台，鼓励并支持新生代青年的创业发想及理念。', '', 'homepage', 'textarea', 2),
('homepage-people-title', '人物-标题', '未来/人物', 'Future/Characters', 'homepage', 'input-text', 1),
('keywords', 'keywords', '未来 论坛 科技', '', 'global', 'input-text', 20),
('people-bigtitle', '大标题', '未来/人物', 'Future/People', 'people', 'input-text', 10),
('people-text', '标题附言', '未来论坛聚集了时下中国最具影响力的互联网先行者，投资家和科学界前沿者，其中既有李彦宏、杨元庆，徐小平、丁健、沈南鹏、张磊等工商界翘楚，也有施一公、饶毅、张首晟等蜚声中外的顶尖科学家。', '', 'people', 'textarea', 20),
('title', 'title', '未来论坛官方网站', '', 'global', 'input-text', 10);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `publishTime` datetime NOT NULL,
  `editorValue` text NOT NULL,
  `abstract` text NOT NULL,
  `recommendation` int(11) NOT NULL DEFAULT '0',
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `code`, `title`, `publishTime`, `editorValue`, `abstract`, `recommendation`, `author`) VALUES
(4, '20151113yuzhou', '宇宙的另一张脸', '2015-11-13 08:49:52', '<h2 style="margin: 8px 0px 0px; padding: 0px; font-weight: bold; font-size: 16px; line-height: 28px; max-width: 100%; color: rgb(75, 172, 198); min-height: 32px; border-bottom: 1.5px solid rgb(75, 172, 198); border-color: rgb(75, 172, 198); text-align: justify;"><span style="font-size: 18px;"><strong class="135brush" data-brushtype="text" style="border-color: rgb(75, 172, 198); color: inherit;">物质与反物质的区别在哪里呢？</strong></span></h2><p><section style="display: block; width: 0px; height: 0px; clear: both; box-sizing: border-box; padding: 0px; margin: 0px;"></section></p><p style="white-space: normal;"><span style="font-size: 18px;"><strong>最新研究表明，有时二者毫无分别。</strong></span></p><p style="white-space: normal;"><br/></p><p style="white-space: normal; line-height: 1.5em;">负责美国布鲁克海文国家实验室相对论重离子对撞机（RHIC）的科学家们发现，反物质质子（即反质子）通过强核力彼此接近时的相互作用与质子之间的相互作用完全一样。<span style="color: rgb(12, 12, 12); font-size: 16px;"><br/></span></p><p><section class="135editor" style="   box-sizing: border-box; border: 0px none; padding: 0px; " data-id="85660"><section class="layout" style="border:0;margin:2em auto 0; padding: 0.5em 0;white-space: normal;border: none;border-top: 1px solid #ccc;display: block; font-size: 1em; font-family: inherit; font-style: normal;font-weight: inherit; text-decoration: inherit; color: rgb(166, 166, 166);border-bottom: 1px solid #ccc;"><section class="135brush" data-style="white-space: normal; text-align: left;font-size: 14px;line-height: 1.5em; color: rgb(12, 12, 12);" style="padding: 16px 16px 10px; color: rgb(32, 32, 32); line-height: 1.4; font-family: inherit; font-size: 1em; box-sizing: border-box; margin: 0px;"><p><span style="font-size: 16px; color: rgb(0, 0, 0);">与物质相对，反物质的亚原子粒子（质子与电子）携带的电荷与物质正好相反。在普通的物质中，质子带正电，电子带负电。在反物质中，反质子带负电，反电子（即正电子）带正电。当反物质与物质相接触，它们彼此湮灭，产生以伽马辐射为形式的能量。</span></p></section></section><section style="display: block; width: 0; height: 0; clear: both;"><br/></section></section></p><p style="white-space: normal;"><br/></p><p style="line-height: 1.5em;">绝大多数宇宙起源理论都认为，135亿年前的大爆炸中创造出的物质与反物质在数量上应当是相等的。若事实如此，那么我们所处的世界便不复存在了，整个宇宙会充斥着辐射，因为物质与反物质都湮灭了。然而，科学家们声称，出于某种未知原因，大爆炸后残存的物质比反物质多了一点点，所以在最初的湮灭后，剩下的物质构成了我们现在所处的宇宙中的万物。</p><p><br/></p><p style="line-height: 1.5em;">“这是个未解之谜，”布鲁克海文国家实验室研究员唐爱洪说道，“如果反质子通过不同的方式相互作用，这就是个需要考虑的因素了。”</p><p style="line-height: 1.5em;"><br/></p><p style="white-space: normal; text-align: center;"><span style="font-size: 14px;"><img src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOnGgBUJczBjhARIPeX8lDzo8fjEXhzNOUmlU1oicN0QnLpMriaAGeMYNHw6jcyfWlHwxGW8k5hHgzWA/640?wx_fmt=jpeg&wxfrom=5&wx_lazy=1" style="width: auto ! important; visibility: visible ! important; height: auto ! important;" data-w="" data-ratio="0.6500994035785288" data-s="300,640" data-type="jpeg" data-src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOnGgBUJczBjhARIPeX8lDzo8fjEXhzNOUmlU1oicN0QnLpMriaAGeMYNHw6jcyfWlHwxGW8k5hHgzWA/0?wx_fmt=jpeg"/><br/></span><span style="font-size: 14px; color: rgb(75, 172, 198);">2.5英里长的RHIC管道</span></p><p><br/></p><p style="white-space: normal; line-height: 1.5em;">为了研究这些相互作用，物理学家们用RHIC这样的粒子加速器制造反物质来寻找反物质与物质的运动差异。如果物质和反物质的以不同的方式相互作用，就可以用来解释为什么宇宙中物质占了大多数。</p><p style="white-space: normal; line-height: 1.5em;"><span style="font-size: 14px; color: rgb(75, 172, 198);"><br/></span></p><p style="white-space: normal; line-height: 1.5em;">根据CP守恒定律，反物质看起来应该与物质是一样的。一块反铁或者一团反氢气应该与铁和氢气具有相同的表现。CP破坏则意味着事情并非如此。然而RHIC实验表明至少对质子来说，不存在任何CP破坏。唐爱洪说，这证明物质在宇宙中的主导位置并不是由反质子的相互作用特质造成的。</p><p style="white-space: normal;"><br/></p><p style="white-space: normal; line-height: 1.5em;">其他找到CP破坏证据的实验都是在一些奇特粒子中找到的，例如K介子和B介子。但是仅凭它们自身还不足以解释宇宙中物质比反物质多的原因。</p><p style="white-space: normal;"><br/></p><p style="white-space: normal; line-height: 1.5em;">为了测量反质子的相互作用，科学家们用近光速使金原子核相互撞击。当撞击发生时，产生了大量亚原子粒子，其中就有反质子。<br/></p><p style="white-space: normal; line-height: 1.5em;"><br/></p><p style="text-align: center; line-height: 1.5em;"><img src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOnGgBUJczBjhARIPeX8lDzoxQ9usKctD7J0BxPJ8GCa4KvwUZr8B25ibhOhjGLw0icicbFtDTApcKJvQ/640?wx_fmt=jpeg&wxfrom=5&wx_lazy=1" style="width: auto ! important; visibility: visible ! important; height: auto ! important;" data-w="" data-ratio="0.6679920477137177" data-s="300,640" data-type="jpeg" data-src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOnGgBUJczBjhARIPeX8lDzoxQ9usKctD7J0BxPJ8GCa4KvwUZr8B25ibhOhjGLw0icicbFtDTApcKJvQ/0?wx_fmt=jpeg"/></p><p style="white-space: normal; line-height: 1.5em;"><br/></p><p style="white-space: normal; line-height: 1.5em;">普通的质子因为带有相同电荷会互相排斥。但是一旦它们离得足够近时，相较强核力，排斥力就不那么重要了。强核力使反质子结合在一起，就像使普通质子结合一样。这与人们的预期相吻合。</p><p style="white-space: normal;"><br/></p><p style="white-space: normal; line-height: 1.5em;">“我们已经造出了反氦-2，”唐爱洪说。普通的氦，即氦-4，由两个质子和两个中子构成，而氦-2只是两个质子，没有中子。反氦-2和氦-2都是不稳定的，会快速衰变。但是反氦-2持续的足够长，使得研究者们得以看到反质子是如何相互作用的。实验证明，反质子之间的相互作用与质子之间的相互作用是相同的。</p><p style="white-space: normal; line-height: 1.5em;"><br/></p><p style="white-space: normal; text-align: center; line-height: 1.5em;"><span style="color: rgb(49, 133, 155); font-size: 14px;"><img src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOnGgBUJczBjhARIPeX8lDzoylKtIQdJHAKHVU1nxEPv3wW5DTeMPsBXwEibfT10K867FuBWdCicPS1w/640?wx_fmt=jpeg&wxfrom=5&wx_lazy=1" style="width: auto ! important; visibility: visible ! important; height: auto ! important;" data-w="500" data-ratio="0.732" data-s="300,640" data-type="jpeg" data-src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOnGgBUJczBjhARIPeX8lDzoylKtIQdJHAKHVU1nxEPv3wW5DTeMPsBXwEibfT10K867FuBWdCicPS1w/0?wx_fmt=jpeg"/><br/><span style="font-size: 14px; color: rgb(75, 172, 198);">反质子间相互作用示意图</span></span><span style=";font-family:宋体;font-size:16px"></span></p><p style="white-space: normal;"><br/></p><p style="white-space: normal; line-height: 1.5em;">因为反质子会在接触到普通物质时湮灭，在瞬息之间，它们往往会撞上产生出反质子的容器壁，变成伽马辐射。</p><p style="white-space: normal;"><br/></p><p style="white-space: normal; line-height: 1.5em;">这一实验证明了CP守恒的延续——包含时间在内的CPT守恒。CPT守恒认为，如果把电荷替换为其相反的值，将粒子变为其镜像，时间反演，物理定律还是一样——换言之，将出现一个和我们的宇宙一样的“<span style="color: rgb(75, 172, 198);">镜像宇宙</span>”。</p><p style="white-space: normal; line-height: 1.5em;"><br/></p><p style="white-space: normal;"><br/></p><p style="white-space: normal; line-height: 1.5em;"><br/></p><p style="white-space: normal; line-height: 1.5em;">在有些例子中，这一守恒会遭到破坏，但是唐爱洪指出，反物质——或者至少人们研究的反物质粒子——不在其中。“我们的实验证明了物理学家们的假设，”唐爱洪说道，“我们从另一角度验证了CPT守恒。”</p><p><br/></p>', '负责美国布鲁克海文国家实验室相对论重离子对撞机（RHIC）的科学家们发现，反物质质子（即反质子）通过强核力彼此接近时的相互作用与质子之间的相互作用完全一样。\r\n', 100, '文章来源：LiveScience；文章作者：Jesse Em'),
(5, '20151111buybuybuy', '买买买：冲动消费背后的心理学 ', '2015-11-13 10:09:50', '<section class="135brush" data-style="line-height:24px;color:rgb(89, 89, 89); font-size:14px" style="max-width: 100%; box-sizing: border-box; padding: 20px 6px 18px 50px; color: rgb(0, 0, 0); font-size: 14px; box-shadow: 0px 0px 5px rgb(117, 117, 117); margin: 0px;"><p style="line-height: 24px; box-sizing: border-box; padding: 0px; margin: 0px; text-align: justify; color: inherit; white-space: normal;"><span style="box-sizing:border-box; color:rgb(89, 89, 89); font-size:14px; margin:0px; padding:0px">双十一，古称光棍节，今称剁手节。</span></p><p style="line-height: 24px; box-sizing: border-box; padding: 0px; margin: 0px; text-align: justify; color: inherit; white-space: normal;"><span style="box-sizing:border-box; color:rgb(89, 89, 89); font-size:14px; margin:0px; padding:0px"><br/></span></p><p style="line-height: 24px; box-sizing: border-box; padding: 0px; margin: 0px; text-align: justify; color: inherit; white-space: normal;"><span style="box-sizing:border-box; color:rgb(89, 89, 89); font-size:14px; margin:0px; padding:0px">如果你还有健在的手指，请滑动屏幕，往下继续阅读。</span></p></section><p><section style="display: block; width: 0px; height: 0px; clear: both; box-sizing: border-box; padding: 0px; margin: 0px;"></section></p><p style="white-space: normal;"><br/>金门大学消费者心理研究专家基特·耶罗教授认为，每个人都会有冲动消费的时候。一旦消费欲上来就很难抑制住花钱的冲动。一种解决办法是尽量避免陷入那些可能让自己失控的情况，还有一种办法就是在购物前吃块巧克力——大脑是通过消耗葡萄糖来释放自控力的。<br/><br/>我们与耶罗就冲动消费背后的心理学和如何抵御花钱的诱惑进行了一次访谈。<br/></p><p style="white-space: normal;"><br/></p><p><section data-custom="rgb(194, 201, 42)" data-color="rgb(194, 201, 42)" class="135editor" style="   box-sizing: border-box; border: 0px none; padding: 0px; " data-id="14"><blockquote style="border-width: 1px 1px 1px 5px; border-style: solid; border-color: rgb(238, 238, 238) rgb(238, 238, 238) rgb(238, 238, 238) rgb(194, 201, 42); border-radius: 3px; padding: 10px; margin: 10px 0px;"><h4 class="135brush" style="color: rgb(194, 201, 42); font-weight: bold; font-size: 18px; margin: 5px 0px; border-color: rgb(194, 201, 42);">华尔街日报：</h4><section class="135brush" data-style="color:inherit;font-size:14px;" style="color: inherit;font-size:14px"><p><span style="color: rgb(127, 127, 127);">您如何看待网购对冲动消费者的影响？</span></p></section></blockquote><section style="display: block; width: 0; height: 0; clear: both;"><br/><p><br/></p><p><br/></p></section></section><br/><section data-custom="rgb(194, 201, 42)" data-color="rgb(194, 201, 42)" class="135editor" style="   box-sizing: border-box; border: 0px none; padding: 0px; " data-id="85327"><section style="display: block; width: 0; height: 0; clear: both;"><br/></section></section></p><p style="white-space: normal;">网购对冲动消费的影响不仅仅表现在购物方式的改变上。我们对科技的应用也改变了我们的心理。<br/><br/>我们的思考方式发生了变化，人与人之间的交流也变得不一样。而这些变化几乎无一例外地增加了消费快感。<br/></p><p style="text-align: center; white-space: normal;"><img src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOmc3amw6OH41ib8V2taIp4Sap2F2yPM018ZlB9MCLCB5lTznAKp550m50Z3Hr79vy2DDXmMub69sPg/640?wx_fmt=png&wxfrom=5&wx_lazy=1" style="width: auto ! important; visibility: visible ! important; height: auto ! important;" data-w="" data-ratio="0.562624254473161" data-s="300,640" data-type="png" data-src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOmc3amw6OH41ib8V2taIp4Sap2F2yPM018ZlB9MCLCB5lTznAKp550m50Z3Hr79vy2DDXmMub69sPg/0?wx_fmt=png"/></p><p style="white-space: normal;">我认为网络购物不仅没有减少冲动消费，相反，出于对新事物的渴望，网购变得更加具有诱惑力，购买这一过程变得更加简单化了。<br/><br/>不过归根结底，是经济衰退酿成了这一切。由于经济不景气，人们在买东西上变得比从前谨慎得多。现在的人们在消费问题上已经习惯于更精打细算了。</p><p style="white-space: normal;"><br/></p><p><section data-custom="rgb(194, 201, 42)" data-color="rgb(194, 201, 42)" class="135editor" style="   box-sizing: border-box; border: 0px none; padding: 0px; " data-id="14"><blockquote style="border-width: 1px 1px 1px 5px; border-style: solid; border-color: rgb(238, 238, 238) rgb(238, 238, 238) rgb(238, 238, 238) rgb(194, 201, 42); border-radius: 3px; padding: 10px; margin: 10px 0px;"><h4 class="135brush" style="color: rgb(194, 201, 42); font-weight: bold; font-size: 18px; margin: 5px 0px; border-color: rgb(194, 201, 42);">华尔街日报：</h4><section class="135brush" data-style="color:inherit;font-size:14px;" style="color: inherit;font-size:14px"><p><span style="color: rgb(127, 127, 127);">在心理学层面上，冲动消费的原因是什么？</span></p></section></blockquote><section style="display: block; width: 0; height: 0; clear: both;"><br/></section></section></p><p style="white-space: normal;"><br/></p><p><section data-custom="rgb(194, 201, 42)" data-color="rgb(194, 201, 42)" class="135editor" style="   box-sizing: border-box; border: 0px none; padding: 0px; margin: 0px; " data-id="85327"><section style="display: block; width: 0px; height: 0px; clear: both; box-sizing: border-box; padding: 0px; margin: 0px;"><br/></section></section></p><p style="white-space: normal;">人之所以冲动消费无外乎出于这两种原因：令人激动的产品或令人激动的价格。10年前，人们往往会面对一件很棒的产品心痒难耐，今天的消费者却更多是被大减价冲昏了头脑。<br/></p><p style="white-space: normal;"><br/></p><p style="text-align: center; white-space: normal;"><img src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOmc3amw6OH41ib8V2taIp4SaMV3wejGCshS43RdFUIw3ial2yUR7bNibKjNApbWzlibtDGP08ibkqibaUdg/640?wx_fmt=png&wxfrom=5&wx_lazy=1" style="width: auto ! important; visibility: visible ! important; height: auto ! important;" data-w="" data-ratio="0.5924453280318092" data-s="300,640" data-type="png" data-src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOmc3amw6OH41ib8V2taIp4SaMV3wejGCshS43RdFUIw3ial2yUR7bNibKjNApbWzlibtDGP08ibkqibaUdg/0?wx_fmt=png"/></p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><br/></p><p style="white-space: normal;"><strong>究其原因，据我观察最常见的有以下这些：</strong><br/>——家庭或工作压力过大。<br/>——消费心态不成熟，容易对各种打折和特价信息动心。<br/>——怒气。冲动购物经常由无处发泄、亟需派遣的愤怒引爆。</p><p style="white-space: normal;"><br/></p><p><section data-custom="rgb(194, 201, 42)" data-color="rgb(194, 201, 42)" class="135editor" style="   box-sizing: border-box; border: 0px none; padding: 0px; " data-id="14"><blockquote style="border-width: 1px 1px 1px 5px; border-style: solid; border-color: rgb(238, 238, 238) rgb(238, 238, 238) rgb(238, 238, 238) rgb(194, 201, 42); border-radius: 3px; padding: 10px; margin: 10px 0px;"><h4 class="135brush" style="color: rgb(194, 201, 42); font-weight: bold; font-size: 18px; margin: 5px 0px; border-color: rgb(194, 201, 42);">华尔街日报：</h4><section class="135brush" data-style="color:inherit;font-size:14px;" style="color: inherit;font-size:14px"><p><span style="color: rgb(127, 127, 127);">避免冲动消费有什么小窍门吗？</span></p></section></blockquote><section style="display: block; width: 0; height: 0; clear: both;"><br/></section></section></p><p style="white-space: normal;"><br/>付款之前先等20分钟。这段时间差不多足够让我们的头脑冷静下来。<br/><br/>接下来，冲动消费者应该想想买下这样东西的代价是什么——比如还不上的信用卡账单、一次度假旅行或一辆车。或者你也可以计算一下要多少小时的工作才能挣回这笔钱。<br/></p><p style="text-align: center; white-space: normal;"><img src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOmc3amw6OH41ib8V2taIp4SacRKGdyIdGsm16zr7nLXNpGBWnfRZRUMR6U06lQGYoFPMfhlVdh5Mbg/640?wx_fmt=png&wxfrom=5&wx_lazy=1" style="width: auto ! important; visibility: visible ! important; height: auto ! important;" data-w="" data-ratio="0.6640159045725647" data-s="300,640" data-type="png" data-src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOmc3amw6OH41ib8V2taIp4SacRKGdyIdGsm16zr7nLXNpGBWnfRZRUMR6U06lQGYoFPMfhlVdh5Mbg/0?wx_fmt=png"/></p><p>最后，我想提醒大家不要在饥渴和疲倦的时候购物，因为这时我们的头脑是混乱的。同时，尽量少用app甚至少用信用卡付款，因为这些东西将钱和购买行为割裂开来。亲眼看到钱从手里花出去能够冷却我们的消费冲动。</p><p><br/></p>', '金门大学消费者心理研究专家基特·耶罗教授认为，每个人都会有冲动消费的时候。一旦消费欲上来就很难抑制住花钱的冲动。一种解决办法是尽量避免陷入那些可能让自己失控的情况，还有一种办法就是在购物前吃块巧克力——大脑是通过消耗葡萄糖来释放自控力的。\r\n\r\n我们与耶罗就冲动消费背后的心理学和如何抵御花钱的诱惑进行了一次访谈。', 50, '文章来源：The Wall Street Journal；文'),
(6, 'jiangzuo_quantum', '|未来 • LIVE| 理解未来讲座视频——量子飞跃', '2015-11-13 10:13:16', '<p style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; clear: both; min-height: 1em; white-space: normal; color: rgb(62, 62, 62); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 1.75em; background-color: rgb(255, 255, 255);"><span style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; font-size: 16px;">理解未来讲座荣幸地请来了中国科学院院士、中国科学技术大学教授潘建伟，为我们描绘了一幅关于量子的美妙图景。</span></p><p style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; clear: both; min-height: 1em; white-space: normal; color: rgb(62, 62, 62); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 1.75em; background-color: rgb(255, 255, 255);"><span style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; font-size: 16px;"><br style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;"/></span></p><p style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; clear: both; min-height: 1em; white-space: normal; color: rgb(62, 62, 62); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 1.75em; background-color: rgb(255, 255, 255);"><span style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; font-size: 16px;"><img data-w="" data-ratio="0.6679920477137177" data-s="300,640" data-type="jpeg" data-src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOmc3amw6OH41ib8V2taIp4Sah6ibrgQI52BytWujiayLajdoFYAz4GYGkb9AdN7ic3D93vo8jPKo0qmCQ/0?wx_fmt=jpeg" src="http://mmbiz.qpic.cn/mmbiz/C0y0kxS5cOmc3amw6OH41ib8V2taIp4Sah6ibrgQI52BytWujiayLajdoFYAz4GYGkb9AdN7ic3D93vo8jPKo0qmCQ/640?wx_fmt=jpeg&tp=webp&wxfrom=5&wx_lazy=1" style="margin: 0px; padding: 0px; height: auto !important; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; width: auto !important; visibility: visible !important;"/></span></p><p style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; clear: both; min-height: 1em; white-space: normal; color: rgb(62, 62, 62); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 1.75em; background-color: rgb(255, 255, 255);"><span style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; font-size: 16px;"><br style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important;"/></span></p><p style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; clear: both; min-height: 1em; white-space: normal; color: rgb(62, 62, 62); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 1.75em; background-color: rgb(255, 255, 255);"><span style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; font-size: 16px;"></span><span style="margin: 0px; padding: 0px; max-width: 100%; box-sizing: border-box !important; word-wrap: break-word !important; color: rgb(12, 12, 12); font-size: 16px;">未来，量子将怎样彻底改变人类的生活方式？计算机未来会变成什么样子？让我们走进量子的世界，一起飞吧！</span></p><p><br/></p>', '量子，是物质构成的基本单元，是能量的基本携带者；\r\n量子的发现，颠覆了人类对微观世界的认知；\r\n量子研究，突破了信息与物质科学技术的经典极限；\r\n量子应用，实现了计算机能力的飞跃与无条件的信息安全；\r\n量子，对于我们的日常生活来说，这么近，又那么远。', 200, '');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `category` int(11) NOT NULL,
  `name_zh-cn` varchar(10) NOT NULL,
  `name_en` varchar(30) NOT NULL,
  `desc1_zh-cn` varchar(100) NOT NULL,
  `desc2_zh-cn` varchar(100) NOT NULL,
  `note_zh-cn` varchar(500) NOT NULL,
  `quote_zh-cn` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `code`, `category`, `name_zh-cn`, `name_en`, `desc1_zh-cn`, `desc2_zh-cn`, `note_zh-cn`, `quote_zh-cn`) VALUES
(4, 'chenxun', 1, '陈恂', 'Eric CHEN', '科技创业者和投资人', '', '现任美国硅谷华人科技创业非盈利组织华源科技（HYSTA）的董事长，也在多家美国和中国上市或私有的科技公司担任董事。', '未来其实是孕育在人的今天的行为、人的今天的智慧当中。'),
(5, 'dengfeng', 1, '邓锋', 'Feng DENG', '北极光创始人兼董事总经理', '', '拥有多项计算机结构和IC设计方面的美国专利。他在风险投资、计算机、通讯和数据网络产业有超过20年的技术和管理经验。', '我觉得科技对人最大的影响就是把我们的人生延长'),
(6, 'dinghong', 4, '丁洪', 'Hong DING', '物理学家', '中国科学院物理所研究员', '北京凝聚态国家实验室首席科学家', '随着经济实力的提升，未来10年将会是中国科技发展的‘黄金10年’。'),
(7, 'dingjian', 1, '丁健', 'James DING', '金沙江创投的董事总经理', '', '1993年创立美国亚信公司，并领导亚信成为第一家在美国纳斯达克上市的中国科技公司。目前兼任百度公司独立董事，华谊兄弟独立董事。', '未来的几十年内，人工智能将超越人脑'),
(8, 'fangfang', 1, '方方', 'Fang FANG', '水木投资集团创始人兼董事长', '', '曾任摩根大通亚洲区投资银行副主席和中国投资银行首席执行官，及北京控股有限公司副总裁等职务。', '互联网会给我们打来巨大的机会和挑战。'),
(9, 'fenglun', 1, '冯仑', 'Lun FENG', '万通集团主席', '万通投资控股股份有限公司董事长', '曾担任中城联盟轮值主席、中国不动产商会副会长、中国房地产研究会副会长等职务。企业界称他为“商界思想家”，地产界称他为 “学者型”开发商', '互联网能够让陌生人开始交往，人和人之间开口说话容易了。'),
(10, 'gaoxiqing', 2, '高西庆', 'Xiqing GAO', '清华大学教授', '前中投副董事长总经理', '美国杜克大学校董，清华大学法学院、对外经济贸易大学法学院兼职教授、博士生导师，美国杜克大学客座教授曾任中国投资有限责任公司副董事长兼总经理。', '互联网忽然一夜之间影响到了每一个家里。'),
(11, 'hechuan', 4, '何川', 'Chuan HE', '美国芝加哥大学化学系教授', '美国霍华德·休斯医学研究所研究员', '北京大学化学与分子工程学院长江讲座教授', ''),
(12, 'kangdian', 2, '康典', 'Dian KANG', '新华人寿保险有限公司董事长', '新华人寿保险有限公司执行董事', '新华人寿保险股份有限公司董事长、执行董事。曾任深圳发展银行股份有限公司监事会主席、时瑞投资管理有限公司董事长等职位。', '这是个变革与创新的时代。'),
(13, 'liaoxiaoqi', 2, '廖晓淇', 'Xiaoqi LIAO', '国贸董事长', '原中国商务部副部长', '中国国际贸易中心有限公司董事长、中国十一届全国政协委员。曾任商务部副部长、中央纪委和对外经济贸易部处长。', '互联网的发展趋势是不可逆转的'),
(14, 'libolin', 1, '李柏霖', 'Bolin LI', '通邮集团董事长', '', '金融信息技术创新联盟副理事长，常春藤中国论坛副理事长，互联网金融千人会副秘书长。信息安全、数据管理、移动通讯与支付、互联网与供应链金融等领域的专家', '有很多方面的突破是以往难以想象的，今天都变成了现实'),
(15, 'lidonghai', 4, '李东海', 'Dung-hai LEE', '物理学家', '伯克利大学物理系教授', '物理学家,?Berkeley大学物理系教授。目前任职于IBM T.J.沃森研究中心。', ''),
(16, 'lijiange', 2, '李剑阁', 'Jiange LI', '孙冶方经济科学基金会理事长', '', '孙冶方经济科学基金会理事长、中央汇金投资有限责任公司副董事长。曾任中国国际金融有限公司董事长、国务院发展研究中心副主任等职位。', '历史的转折点它叫做奇点，离我们已经不远了。'),
(17, 'liyanhong', 1, '李彦宏', 'Robin LI', '百度公司创始人', '百度公司董事长兼首席执行官', '全面负责百度公司的战略规划和运营管理。2013年，当选第十二届全国政协委员，兼任第十一届中华全国工商业联合会副主席等职务。', '创新不是某一家公司的事情，而是很多公司、很多优秀人才相互激发、相互鼓励、相互促进、甚至相互竞争的过程，这样才会导致创新不断发生。'),
(18, 'raoyi', 6, '饶毅', 'Yi RAO', '神经科学博士', '北京大学生命科学学院前院长', '北京大学终身讲席教授、北京大学校务委员会副主任，兼北京生命科学研究所资深研究员。曾任北大生命科学学院院长。', '要改善我国的科学，不仅需要改革体制，而且需要改进文化。'),
(19, 'shanshiguang', 8, '山世光', 'Shiguang SHAN', '博士', '研究员(教授)', '中科院计算所智能信息处理重点实验室?常务副主任', '真正的国际一流就像百米赛场一样，需要不断打破已有的世界纪录（the state of the art），创造属于我们的新纪录。'),
(20, 'shennanpeng', 1, '沈南鹏', 'Neil SHEN', '红杉资本全球执行合伙人', '', '红杉资本全球执行合伙人，携程旅行网和如家连锁酒店的创始人。福布斯2012-2015年度全球最佳投资人榜单中排名最高的华人投资者。', '互联网的发展不仅仅早已改变今天的生活方式，而且还再改变未来的生活方式'),
(21, 'shiyigong', 6, '施一公', 'Yigong SHI', '中国科学院院士', '清华大学生命科学学院院长', '清华大学副校长、美国科学院、美国艺术与科学院外籍院士，结构生物学家，长江讲座教授，国家杰出青年基金获得者。主要从事细胞凋亡及膜蛋白两个领域的研究', '中国真的需要一场文化的革命，真正意义上的文化创新与传承。'),
(22, 'tiangang', 4, '田刚', 'Gang TIAN', '普林斯顿大学数学系教授', '中国科学院院士', '数学家.?Princeton?教授,中国科学院院士.', ''),
(23, 'wanghuai', 8, '王淮', 'Harry WANG', '线性资本创始合伙人', '', '浙江大学计算机系学士，斯坦福大学管理科学和工程专业硕士', 'Making something great yourself is different from being part of something great.'),
(24, 'wangjun', 8, '王俊', 'Jun WANG', '华大基因CEO', '华大基因研究院院长', '教授，博士生导师，国家杰出青年基金获得者，973首席科学家，前深圳华大基因CEO?兼研究院院长。', '能够确确实实平衡去控制自己的力量，最终达到人和世界有效共存，是人类将面临的一个问题。'),
(25, 'wangxiaodong', 4, '王晓东', 'Xiaodong WANG', '美国国家科学院院士', '', '北京生命科学研究所资深研究员', '科学史上的每一次重大发现，都极大地拓宽了人类视野，改变了人类对自然界及人类自身的认识，不仅极大推动了科学自身的发展和技术的巨大进步，也对文学、艺术、哲学等产生了深远的影响。'),
(26, 'wuhong', 1, '武红', 'Cathy WU', '新盟国际公关公司创始合伙人', '新盟国际公关顾问公司总裁', '中国国际公关协会公司委员会理事，中国女性俱乐部副理事长，中国国际另类投资协会秘书长', '未来论坛是一个承载人类科技梦想，用科技改变世界的公益平台。'),
(27, 'wuying', 1, '吴鹰', 'Ying WU', '中泽嘉盟投资基金董事长', 'UT斯达康创始人', '2000年3月3日，UT斯达康公司在美国上市，吴鹰本人名列美国《商业周刊》评选的50位亚洲之星之一。 2006年11月创立私募股权投资机构中泽嘉盟投资有限公司', '我们是希望未来论坛对于未来的研究进行探索。 '),
(28, 'xiazhihong', 4, '夏志宏', 'Jeff XIA', '数学家', '美国西北大学终身教授', '北京大学数学科学学院长江学者讲座教授与博士生导师', ''),
(29, 'xiexiaoliang', 4, '谢晓亮', 'Sunney XIE', '美国国家科学院院士', '', '哈佛大学Mallinckrodt 讲席教授北京大学生物动态光学成像中心主任', '科学研究是我的嗜好，不断创新是我的追求，造福人类是我的愿望。'),
(30, 'xuxiaoping', 1, '徐小平', 'Bob XU', '真格基金创始人', '新东方联合创始人', '2006年，随着新东方成功上市，徐小平创立真格基金，开始为中国青年创业者提供早期资金支持，先后投资世纪佳缘、兰亭集势、聚美优品等；', '未来是需要呼唤的，未来是需要拥抱的，未来论坛把一群想拥抱未来的人，聚集在一起，'),
(31, 'yangyuanqing', 1, '杨元庆', 'Yuanqing YANG', '联想集团董事长兼CEO', '', '成功领导联想收购IBM的PC事业部，并购IBM x86服务器以及摩托罗拉移动业务。2004年和2012年“CCTV中国经济年度人物”，2013年《巴伦周刊》全球30位最佳CEO之一', '我特别喜欢跟油脂与创新，乐于创新的企业同道们，在交流中互相启发交流思想，碰撞火花'),
(32, 'yixiqun', 2, '衣锡群', 'Xiqun YI', '中国股权投资基金协会常务副会长', '', '中国股权投资基金协会常务副会长.?曾任北京市政协委员、京泰实业有限公司董事长、北京控股有限公司董事长等职位。', '就是所有的人都感到，他们周围的一切都在发生变化'),
(33, 'yufeng', 1, '虞锋', 'David YU', '云锋基金发起人、基金主席', '', '与阿里巴巴董事局主席马云联合发起，中国唯一由成功创业者、企业家和行业领袖共同创立的私募云锋基金。同时担任华谊兄弟董事，上海广电电气董事', '加入未来论坛吧，让我们一起思考未来，漫步未来，洞见未来'),
(34, 'yukai', 8, '余凯', 'Kai YU', 'Horizon Robotics创始人', '', '前百度研究院副院长，高级技术总监，深度学习研究院IDL创始人', ''),
(35, 'zhanglei', 1, '张磊', 'Lei ZHANG', '高瓴资本集团的创始人', '高瓴资本董事长兼首席执行官', '作为一家专注于长期结构性价值投资的投资公司，高瓴资本目前已发展成为亚洲地区资产管理规模最大、业绩最优秀的投资基金之一', '让机器能够像人一样，能够更加智能的模糊思维，能够让人的幸福感更加提高。 '),
(36, 'zhangshoucheng', 2, '张首晟', 'Shoucheng ZHANG', '斯坦福大学物理系讲座教授', '', '清华大学高等研究院千人计划访问教授，美国艺术与科学学院院士', '我们今天正是要看到整个人类的未来，整个未来给我们带来的方向是什么。我们需要寻根，需要跨界的交流。'),
(37, 'zhangxike', 1, '张曦轲', 'Richard ZHANG', '安佰深全球合伙人', '安佰深大中华地区总裁', '曾任麦肯锡公司全球资深董事，上海分公司董事长，当年曾是麦肯锡全球合伙人评选委员会中唯一的华人委员，曾负责美国芝加哥分公司的合伙人评选工作，现任中兴通讯的独立董事', '我们这个未来论坛成立得恰当其时'),
(38, 'zhangxingsheng', 1, '张醒生', 'Xingsheng ZHANG', '大自然保护协会亚太区首席代表', '道同资本创始合伙人', '老牛基金会理事长。曾任爱立信（中国）有限公司执行副总裁兼首席市场执行官；2003年加盟亚信，出任首席执行官（CEO）兼总裁', '互联网时代，使得空间不再是障碍。互联网正在创造一个人类崭新的未来。'),
(39, 'zhaoyong', 8, '赵勇', 'Yong ZHAO', '格灵深瞳联合创始人', '', '计算机视觉和人工智能专家', '我们用人工智能一步一步改变世界'),
(40, 'zhuyunlai', 2, '朱云来', 'Levin ZHU', '金融专业人士', '', '金融专业人士.曾任瑞士信贷第一波士顿高级副总裁、中国国际金融有限公司董事长。', '经济发展最重要的是需要靠科技来驱动，社会的进步一定要有科技实质性的成长');

-- --------------------------------------------------------

--
-- Table structure for table `people_category`
--

CREATE TABLE IF NOT EXISTS `people_category` (
  `id` int(11) NOT NULL,
  `code` varchar(40) NOT NULL,
  `value` int(11) NOT NULL,
  `title_zh-cn` varchar(40) NOT NULL,
  `title_en` varchar(40) NOT NULL,
  `note_zh-cn` varchar(400) NOT NULL,
  `note_en` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people_category`
--

INSERT INTO `people_category` (`id`, `code`, `value`, `title_zh-cn`, `title_en`, `note_zh-cn`, `note_en`) VALUES
(1, '.founder', 1, '创始理事', 'Founding Council', '具有良好社会声誉、有理想、有思想并具有影响力的商界、科学界和教育界卓越人士。', ''),
(2, '.advisor', 2, '咨询委员会', 'Consultative Committee', '对未来论坛有共识，于所在领域有一定成就，有理想、情怀、思想和追求，并在未来论坛工作做出过积极贡献的人士以及其他各界知名人士。', ''),
(3, '.scientist', 4, '科学家顾问委员会', 'Scientific Committee', '蜚声中外的世界级科学家。', ''),
(4, '.entrepreneur', 8, '青年行动小组', 'Youth Action Group', '一群40岁以下中国最具影响力的互联网先行者，投资界成功者、科学界前沿者，同时是具有前沿思考的青年创业者、创新思维模式的科学家。透过此交流平台，鼓励并支持新生代青年的创业发想及理念。', ''),
(5, '*', 0, '未来/人物', 'Future/People', '未来论坛聚集了时下中国最具影响力的互联网先行者，投资家和科学界前沿者，其中既有李彦宏、杨元庆，徐小平、丁健、沈南鹏、张磊等工商界翘楚，也有施一公、饶毅、张首晟等蜚声中外的顶尖科学家。', '');

-- --------------------------------------------------------

--
-- Table structure for table `tester`
--

CREATE TABLE IF NOT EXISTS `tester` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tester`
--

INSERT INTO `tester` (`id`, `title`, `content`) VALUES
(1, '标题1', '内容1'),
(2, '标题2', '内容2'),
(3, '标题3', '内容3'),
(4, '标题a', '内容a'),
(5, '标题b', '内容b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_category`
--
ALTER TABLE `events_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `homepage_slides`
--
ALTER TABLE `homepage_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscs`
--
ALTER TABLE `miscs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `people_category`
--
ALTER TABLE `people_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tester`
--
ALTER TABLE `tester`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `events_category`
--
ALTER TABLE `events_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `homepage_slides`
--
ALTER TABLE `homepage_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `people_category`
--
ALTER TABLE `people_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tester`
--
ALTER TABLE `tester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
