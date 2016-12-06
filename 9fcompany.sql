/*
Navicat MySQL Data Transfer

Source Server         :   ����
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : 9fcompany

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2014-07-11 14:46:04
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `9f_ad`
-- ----------------------------
DROP TABLE IF EXISTS `9f_ad`;
CREATE TABLE `9f_ad` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `cid` smallint(5) unsigned NOT NULL,
  `title` varchar(255) default NULL,
  `picurl` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `orderid` smallint(5) NOT NULL default '0',
  `checkinfo` tinyint(1) NOT NULL default '0',
  `posttime` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_ad
-- ----------------------------
INSERT INTO `9f_ad` VALUES ('1', '1', '经营理念', 'uploads/image/20140611/1402490364.jpg', '', '1', '0', '1402488473');
INSERT INTO `9f_ad` VALUES ('2', '1', '服务承诺', 'uploads/image/20140611/1402490364.jpg', '', '2', '0', '1402488508');

-- ----------------------------
-- Table structure for `9f_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `9f_ad_type`;
CREATE TABLE `9f_ad_type` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `title` varchar(60) default NULL,
  `width` smallint(5) NOT NULL,
  `height` smallint(5) NOT NULL,
  `description` varchar(255) NOT NULL,
  `orderid` smallint(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_ad_type
-- ----------------------------
INSERT INTO `9f_ad_type` VALUES ('1', '首页幻灯片', '960', '320', '', '0');

-- ----------------------------
-- Table structure for `9f_admin`
-- ----------------------------
DROP TABLE IF EXISTS `9f_admin`;
CREATE TABLE `9f_admin` (
  `userid` mediumint(8) unsigned NOT NULL auto_increment,
  `username` varchar(32) NOT NULL,
  `password` char(40) NOT NULL,
  `roleid` smallint(5) default NULL,
  `lastloginip` varchar(16) NOT NULL,
  `lastlogintime` int(10) unsigned NOT NULL,
  `loginnum` int(10) unsigned NOT NULL,
  `realname` varchar(50) default NULL,
  `email` varchar(32) NOT NULL,
  `posttime` int(10) unsigned NOT NULL,
  `checkinfo` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_admin
-- ----------------------------
INSERT INTO `9f_admin` VALUES ('1', 'admin', 'c016b6b47f41128a4c7f22f10fa106429c817eb2', '0', '127.0.0.1', '1405058475', '207', '测试员', 'admin@admin.com', '0', '0');
INSERT INTO `9f_admin` VALUES ('2', 'dos999', '3591a2969ffb0e352c7762ff52d6477559067b85', null, '127.0.0.1', '1403343276', '0', '九方互联', 'master@dos999.com', '1403343276', '0');

-- ----------------------------
-- Table structure for `9f_admin_text`
-- ----------------------------
DROP TABLE IF EXISTS `9f_admin_text`;
CREATE TABLE `9f_admin_text` (
  `id` tinyint(1) NOT NULL auto_increment,
  `content` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_admin_text
-- ----------------------------
INSERT INTO `9f_admin_text` VALUES ('1', '');

-- ----------------------------
-- Table structure for `9f_category`
-- ----------------------------
DROP TABLE IF EXISTS `9f_category`;
CREATE TABLE `9f_category` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `pid` smallint(5) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `modelid` smallint(5) unsigned NOT NULL,
  `classname` varchar(30) NOT NULL,
  `dirname` varchar(255) default NULL,
  `flag` varchar(500) NOT NULL,
  `picurl` varchar(100) default NULL,
  `url` varchar(255) default NULL,
  `navshow` tinyint(1) unsigned NOT NULL default '0',
  `checkinfo` tinyint(1) unsigned NOT NULL default '0',
  `seotitle` varchar(255) default NULL,
  `keywords` varchar(255) default NULL,
  `description` mediumtext,
  `list_template` varchar(30) default NULL,
  `show_template` varchar(30) default NULL,
  `ctitle` varchar(255) default NULL,
  `cpicurl` varchar(60) default NULL,
  `content` mediumtext,
  `htmlurl` varchar(255) default NULL,
  `orderid` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_category
-- ----------------------------
INSERT INTO `9f_category` VALUES ('1', '0', '0,1,', '0', 'About us', '', '', '', 'index.php?m=content&a=lists&cid=6', '0', '0', '', '', '', 'Content_page_en.html', '', null, null, null, null, '1');
INSERT INTO `9f_category` VALUES ('2', '0', '0,2,', '1', 'News center', '', '', '', '', '0', '0', '', '', '', 'Content_list_news_en.html', 'Content_show_en.html', null, null, null, null, '2');
INSERT INTO `9f_category` VALUES ('3', '0', '0,3,', '1', 'Products', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '3');
INSERT INTO `9f_category` VALUES ('4', '0', '0,4,', '1', 'Customer', '', '', '', '', '0', '0', '', '', '', 'Content_list_honor_en.html', 'Content_show_en.html', null, null, null, null, '4');
INSERT INTO `9f_category` VALUES ('5', '0', '0,5,', '1', 'Download', '', '', '', '', '0', '0', '', '', '', 'Content_list_down_en.html', 'Content_show_en.html', null, null, null, null, '5');
INSERT INTO `9f_category` VALUES ('6', '1', '0,1,6,', '0', 'Company profile', '', '', '', '', '0', '0', '', '', '', 'Content_page_en.html', '', '', '', '<p>FUDING Energy Co., Ltd. was founded in 2010, is to use lithium-ion battery technology, innovative high-tech enterprise integrating R &amp;amp; D, production, trade, services in one, the company is located in the Pearl River Delta economic circle core developed traffic. The land area of about 10000 square meters, office building, dormitory, dining hall, stadium and other facilities Goods are available in all varieties. And the company is equipped with an independent marketing center, the introduction of the world&#39;s most advanced automated and semi automated production equipment, sophisticated testing instruments etc.. The annual output of up to about 20000000. More than 1000 employees, and set up a branch in Guangxi, Dongguan, Jiangxi, Shandong, at the same time should the market demand at home and abroad, to continue the expansion plan. The company has a high-quality international R &amp;amp; D team and overseas have a strong after sale service team, composed of senior experts, senior engineer, Dr. battery, analysts and others, of which R &amp;amp; D personnel more than 100 people, senior engineer 20, engineer 30 people.</p><p>In the domestic Fuding energy has a 200 degree anti explosion technology security is excellent, the electric core product performance in the domestic leading position, reached the international advanced level. Widely used in digital series (such as MP3/4, mobile phone, digital photo frame, Bluetooth, PDA, MID, POSS Headset machine, solar energy lamp, military products, etc.), high rate series (aeromodelling toys, electric tools, etc.), notebook series, 18650 series (notebook computer, electric tool, electric vehicles, battery type) (such as electric bicycle, motorcycle, automobile, UPS, such as the smart grid)</p><p>FUDING energy has a unique polymer battery sealing technology, successfully resolved the problem of lithium ion polymer battery drum gas, air blowing rate from the very few reduced to hundreds of thousands of, as the industry first, the polymer electric core of non-performing rate of the global minimum. Secondly, promote Fuding energy in the battery market is the most successful. FUDING energy occupy the market power battery of 20-30% in Europe, to become the biggest supplier, its product and passed the ISO9001:2000 version international quality system certification, CE certification, UL certification and ISO14001 environmental management system certification. The use of inspection products stand the customer.</p><p>FUDING energy technology as the first, to adapt to changes in the market, an increase of 12000 square meters of the extension of the plant, and add 18650, aluminum shell battery of the world&#39;s most advanced automatic production line. Also plans to expand the factory at home and abroad, and signed the agreement, and Yichun city construction investment 1000000000, annual sales of lithium ion battery project more than 1000000000, the planning of cylindrical battery output of 50000 cigarettes / day, battery 150000 / day. In order to achieve three years to become the domestic battery industry before the top three, five years to become a global development goals of the first 6 battery industry.</p><p>FUDING energy is a leading technology to guide the market, after ten years of development, compared with the similar domestic companies, FDEG power battery lead of three to four years, digital battery brought about two years, high rate battery has reached the industry standard in japan. FDEG also because of outstanding achievements, won the affirmation of the local government.</p><p>FUDING Energy Limited company adhering to the &quot;market-oriented, customer centered&quot; to promote the concept of innovation, to provide advanced products and thoughtful services to partners, and win-win cooperation partners, work together to Chinese new energy industry development.</p><p><br/></p>', null, '6');
INSERT INTO `9f_category` VALUES ('7', '1', '0,1,7,', '0', 'Culture', '', '', '', '', '0', '0', '', '', '', 'Content_page_en.html', '', '', '', '<p>The company&#39;s vision</p><p>The wleath-battery battery development to become a world famous brand and famous power solutions for service providers and related battery manufacturers.</p><p>Century</p><p>FUDING Group invested a huge sum of money to the establishment of the group of independent brand leadership in twenty-first Century, it is the natural result of group&#39;s previous battery production in the field strength outstanding, but also the group look long-term active pursuit. Group&#39;s goal is not from the existing market share profit, also is not in order to change the present China high-end battery market imported brands were imbalance, group expect to achieve in the future for a long time, Fuding can carry China battery industry banner, and strive to make the flag in the world inner flying high.</p><p>We are responsible for every piece of battery</p><p>&quot;We are responsible for&quot; on each cell is the result of a work. This result is the process control of each link to achieve, it is reflected in the process control strictly and carefully. Specifically, we are only responsible for every operation, responsible for every process, we can ultimately be responsible for every piece of battery.</p><p>Not only that, we also put the links from each spot welding production, each sub volume, extends to every market research for us, every product development until every time after sale service, are all embodied we are responsible for every piece of battery spirit.</p><p>Responsibility is a kind of attitude, is also a kind of spirit.</p><p>Open and fair pragmatic and efficient</p><p>Open, which requires the system of the company, present situation, target as open as possible, and to make the enterprise each person can understand all the business goal significance. The open would be supervised, but also can perform and improvement.</p><p>Justice, authority of every employee in the company system to exercise must follow the occupation moral, human morality, and the rules of the company. In the final analysis, is a how to exercise and control problems.</p><p>Pragmatic style of work, refers to seek truth from facts, stand on solid ground, pursuing the actual effect. Company to steady operation, to achieve long-term sustainable development.</p><p>High efficiency, is to accelerate the people, money, material, information operations. To cope with the market changes and customer needs to be fast, fast to improve the correction of errors and poor.</p><p>Learning, innovation to improve the value of life at work</p><p>The only constant is change. The information in this extreme expansion, knowledge update change rapidly age, any past experience and achievement are very small and not worth mentioning, only continuous learning, continuous innovation in order to keep pace with the times and the changing demands of the market. The main source of learning, innovation and methods consciously and personal progress. As a battery enterprises, we are late, we have a lot of respect is backward, but our heart, hard to learn, and constantly practice, continuous innovation, we will continue to overcome and surpass ourselves, our life value can be promoted constantly at work. We hope to Kyushu battery into a learning, innovative business, never fear new, Knowledge has no limit., every employee promotion, to realize their life value in work.</p><p>The market potential is infinite.</p><p>Management guru Dulake once pointed out, the existence of the enterprise mission is to continue to create customer, satisfy the customer. Along with the science and technology change rapidly, consumers not only can fully enjoy the new technology brings convenience and fun, but also create a huge potential market. As long as we continue to provide quality products and services to customers, and strive to meet the growing market demand, the market will continue to expand. In accomplishing our mission will also receive good returns.</p><p>Personal development is infinite.</p><p>One is the development of personal ability is infinite. Scientific research has proved that: the use of a person&#39;s life and mental not have 5% -- even Einstein is so; two is a personal occupation career development potential is infinite, the company will continue to provide development opportunities for staff, and staff&#39;s common development, realize the enterprise value and employee value.</p><p>God helps those who help themselves</p><p>Survival of the fittest in natural selection, survival of the fittest &quot;Darwinism, reveals a world of an immutable truth. To live is to competition, to survive in the competition, you have to work harder than others. Diligence is the traditional virtue of our Chinese, but also many of the world&#39;s successful experience. We firmly believe that, as long as our steadfast diligent, will get more lucrative returns.</p><p>Unremitting self-improvement social commitment</p><p>&quot;Unremitting self-improvement&quot; refers to the pursuit of the ideal keep on carving, is a tenacious spirit; &quot;social commitment&quot; refers only to have profound morality, can really take on the responsibility of the rise and fall of the country. This is a kind of values. Reference to the US in the development of the enterprise, it reveals the deep as long as we strengthen our confidence, keep on carving, the national battery industry development as its mission, theory de make can, improve the virtue and refine the achevements, will certainly be able to solidify the foundation DESAY battery business 100 years.</p><p>The establishment of a career, the complementary advantages of the team responsible for</p><p>As a public corporation, I hope every one of us in this team to Fuding battery business responsible, responsible for our shareholders, not responsible for someone. As long as the development of what was good for our cause, we should strive to do; found in adverse circumstances for the developing of our business, to</p><p><br/></p>', null, '7');
INSERT INTO `9f_category` VALUES ('8', '1', '0,1,8,', '0', 'General manager', '', '', '', '', '0', '0', '', '', '', 'Content_page_en.html', '', null, null, null, null, '8');
INSERT INTO `9f_category` VALUES ('9', '1', '0,1,9,', '0', 'Brand interpretation', '', '', '', '', '0', '0', '', '', '', 'Content_page_en.html', '', null, null, null, null, '9');
INSERT INTO `9f_category` VALUES ('10', '1', '0,1,10,', '0', 'Contact us', '', '', '', '', '0', '0', '', '', '', 'Content_page_en.html', '', '', '', '<p>Factory address: road of Songshan of Jiangsu province Xuzhou Copper Mt. City Economic Development Zone No. 220 Hua Ju Industrial Park</p><p>Shenzhen office: Guangdong Shenzhen Longhua new sea street peak community billion business building 11 layer</p><p>Tel: 0755-29580912</p><p>Fax: 0755-29580631</p><p><br/></p>', null, '10');
INSERT INTO `9f_category` VALUES ('11', '0', '0,11,', '0', '关于我们', '', '', '', '<{:U(\'Content/lists\',array(\'cid\'=>16))}>', '0', '0', '', '', '', 'Content_page_cn.html', '', null, null, null, null, '11');
INSERT INTO `9f_category` VALUES ('12', '0', '0,12,', '1', '新闻中心', '', '', '', '', '0', '0', '', '', '', 'Content_list_news_cn.html', 'Content_show_cn.html', null, null, null, null, '12');
INSERT INTO `9f_category` VALUES ('13', '0', '0,13,', '1', '产品中心', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '13');
INSERT INTO `9f_category` VALUES ('14', '0', '0,14,', '1', '荣誉客户', '', '', '', '', '0', '0', '', '', '', 'Content_list_honor_cn.html', 'Content_show_cn.html', null, null, null, null, '14');
INSERT INTO `9f_category` VALUES ('15', '0', '0,15,', '1', '下载中心', '', '', '', '', '0', '0', '', '', '', 'Content_list_down_cn.html', 'Content_show_cn.html', null, null, null, null, '15');
INSERT INTO `9f_category` VALUES ('16', '11', '0,11,16,', '0', '公司简介', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', '', '', '', '<p style=\"text-indent: 2em; text-align: left;\">富鼎能源有限公司成立于 2010 年， 是以锂离子电池为主，集研发、生产、贸易、服务于一体的技术创新型高新技术企业，公司座落于交通发达的珠江三角洲经济圈核心。 用地面积约10,000 平方米, 办公大楼、员工宿舍、饭堂、球场等设施一应俱全。且公司配有独立的营销中心，厂内引进全球最先进的自动化和半自动化生产设备、精密的检测仪器等。每年产量达 2000 多万颗。员工 1000余人，并在广西、东莞、江西、山东设立分厂，同时应市场要求在国外及国内继续扩产计划。公司拥有一支高素质的国际化研发队伍以及国外有一支强大的售后服务队伍，由资深的电池博士、专家、高级工程师、分析师等人组成，其中研发人员 100 余名，高级工程师 20 余名，工程师30余名等。</p><p style=\"text-indent: 2em; text-align: left;\">在国内富鼎能源拥有200度防爆燃技术安全性极好，各项电芯产品性能指标位居国内领先地位，达到国际先进水平。广泛应用于数码系列（如MP3/4、手机、数码相相框、蓝牙耳机、PDA、MID、POSS机、太阳能灯、军工产品等）、高倍率系列（航模玩具、电动工具等）、笔记本系列、18650系列(笔记本电脑、电动工具、电动车）、动力电池类（如电动自行车、摩托车、汽车、UPS、智能电网等）</p><p style=\"text-indent: 2em; text-align: left;\">富鼎能源拥有独特的聚合物电池封口工艺，成功地解决锂离子聚合物电池鼓气问题的，鼓气率由万分之几降低到几十万分之几，为行业优先，聚合物电芯不良率达全球最低。其次，富鼎能源在动力电池市场化方面的推进最为成功。富鼎能源占据欧洲20-30%的动力电池市场，成为最大供应商，旗下产品并顺利通过了ISO9001：2000版国际质量体系认证、CE认证、UL认证以及ISO14001环境管理体系认证。产品经得起客户的使用检验。&nbsp;</p><p style=\"text-indent: 2em; text-align: left;\">&nbsp; 富鼎能源 以技术为先，适应市场变化，对现有厂区增加 1.2 万平方米的扩建，并新增 18650、铝壳电池的全球最先进的自动生产线。同时计划在国内外扩建分厂，并与宜春市签署协议，投资10亿，建设年销售值超过10亿的锂离子电池项目，规划圆柱电池日产能5万支/天，动力电池15万支/天。以实现三年成为国内电池行业前三甲，五年之内成为全球电池行业前 6 名的发展目标。&nbsp;</p><p style=\"text-indent: 2em; text-align: left;\">富鼎能源就是这样以技术领先引导市场，经过十年发展，与国内同类公司相比，FDEG动力电池领先三到四年，数码电池领先约两年，高倍率系列电池则已经达到日本同业水平。FDEG也因为突出的技术成就，获得了当地政府的肯定。</p><p style=\"text-indent: 2em; text-align: left;\">富鼎能源有限公司秉承“以市场为导向,客户为本”推动创新的理念，向合作伙伴提供领先的产品和周到的服务，与合作伙伴共赢，共同致力于中国新能源产业发展。</p>', null, '16');
INSERT INTO `9f_category` VALUES ('17', '11', '0,11,17,', '0', '企业文化', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', '', '', '', '<p>&nbsp;</p><p>公司的远景目标</p><p>将wleath-battery 电池发展成为全球知名品牌和著名的电源解决方案服务商及相关电池产品制造商。</p><p>&nbsp;</p><p>世纪行</p><p>　　富鼎集团投入巨资意欲确立集团自主品牌在21世纪的领导地位，这是集团以往在电池生产领域实力出众的自然结果，同时也是集团放眼长远的主动追求。集团的目标不是从现有市场分一份利润，也不仅仅是为了改变目前中国高档电池市场进口品牌比例失衡的问题，集团期望实现的是在未来相当长的时间里，富鼎都能扛起中国电池工业的一面大旗，并且力求能让这面大旗在全球范围内高高飘扬。</p><p>&nbsp;</p><p>我们对每一块电池负责</p><p>　　“我们对每一块电池负责”是一种工作的结果。这种结果是我们通过对每一道环节的过程控制来达到的，它直接体现在我们对过程控制的严格和认真上。具体来说，我们只有对每一次操作负责，对每一道工序负责，我们才能够最终做到对每一块电池负责。</p><p>　　不仅如此，我们还把这种环节从生产的每一次点焊，每一次分容，延伸到我们的每一次市场调研，每一次产品开发直至每一次售后服务上，都集中体现我们对每一块电池负责的精神。</p><p>负责任是一种态度，更是一种精神。</p><p>&nbsp;</p><p>公开 公正 务实 高效</p><p>　　公开，即要求公司各项制度、现状、目标尽可能公开，并务求使企业每一个人均能理解企业目标意义之全部。只有公开的才是可以监督的，也是可以执行和改善的。</p><p>&nbsp; &nbsp; 公正，公司每个员工在行使公司制度所赋予职权时都要遵守职业的道德，人的道德，以及公司的规章制度等。说到底，是一个如何行使和支配权力的问题。</p><p>务实，是指工作作风要实事求是，脚踏实地、追求实际效果。公司要稳键经营、实现可持续地长远发展。</p><p>&nbsp; &nbsp; 高效，就是要加快人、财、物、信息的运作。应对市场变化与顾客需求要快捷，对错误的改正和不良的改善要迅速。</p><p>&nbsp;</p><p>学习、创新 在工作中提升人生价值</p><p>&nbsp; &nbsp; 世界上唯一不变的就是变化。在这个信息极度膨胀、知识更新日新月异的年代，任何过去的经验和成绩都是多么渺小而微不足道，只有不断学习、不断创新才能跟上时代的步伐和市场变化的需求。自觉的学习、创新意识和方法也是个人进步的主要源泉。作为一个电池企业，我们是后来者，我们有很多方面是落后的，但我们用心、勤奋去学，并不断实践、不断创新，我们就可能不断战胜并超越自己，我们的人生价值就能够在工作中不断得到提升。我们希望把九州电池办成一个学习、创新型的企业，永不惧新，学无止境，每一位员工在工作中提升、实现其人生价值。</p><p>&nbsp;</p><p>市场的潜力是无穷的</p><p>　　管理大师杜拉克曾经指出，企业存在的使命就是不断创造顾客，不断地满足顾客。随着科技的日新月异，不但消费者充分享受到了新技术所带来的便利和乐趣，同时也创造出了潜力巨大的市场。只要我们不断地为客户提供优质的产品和服务，不断努力地去满足市场日益增长的需求，我们的市场就会不断地扩大。我们在完成企业使命的同时也会获得良好的回报。</p><p>&nbsp;</p><p>个人的发展是无穷的</p><p>　　一是个人能力的发展是无穷的。科学的研究已经证明：一个人一生所耗用的脑力不及其拥有的5%——连爱因斯坦也是如此；二是个人职业生涯发展的潜力也是无穷的，公司会不断地为员工提供发展机会，与员工共同发展，实现企业价值和员工价值。</p><p>&nbsp;</p><p>天道酬勤</p><p>　　物竞天择，适者生存”，达尔文主义揭示了世界一个恒古不变的真理。要生存就要竞争，要在竞争中生存，就必须比别人更努力。勤奋是我们中国人的传统美德，也是世界上许多成功人士的经验。我们坚信，只要我们踏实勤勉，一定会获得更丰厚的回报。</p><p>&nbsp;</p><p>自强不息，厚德载物</p><p>　　“自强不息”指的是对理想锲而不舍有追求，是一种顽强拼搏的精神；“厚德载物”是指只有具备深厚的道德修养，才能真正承担起国家兴亡的重任。这是一种价值观。引用到我们企业发展中来，它深刻地揭示了只要我们坚定信心，锲而不舍，以民族电池产业发展为己任，论德使能，进德修业，就一定能够夯实德赛电池百年企业的根基。</p><p>&nbsp;</p><p>建立一支对事业负责、优势互补的团队</p><p>　　作为一个公众公司，我希望我们这个团队里的每一个人都要对富鼎电池的事业负责，对我们的股东负责，而不是对某一个人负责。只要是对我们的事业发展有利的事，我们都要努力去做；发现有对我们事业发展不利的情况，要勇于提出意见和建议。只有胸怀广阔、目标远大，我们的事业才会不断向前发展和进步。</p><p>一个专业型、合作型的团队，要想实现共同的目标，团队中的每一个人首先要不断学习，成为某一方面专家和强手。再进一步，团队成员间要实现优势互补，形成合力，推动我们的事业不断向前发展。</p><p>&nbsp;</p><p>人都有不懂的地方，但要学得快一点</p><p>　　每一个人自身都会有缺点和不足，我们一生的成长就是要不断地学习，发挥所长，补己之短，这样我们才会不断地进步。</p><p>　　在我们的成长与发展过程中，只有做到在各方面都比别人快一点，我们才能够抢占先机，赶超对手，在任何竞争中都立于不败之地。</p><p>&nbsp;</p><p>让客户满意 让员工满意 让股东满意</p><p>　　公司的发展目标首先是要让客户满意——公司的所有工作都是为此而展开。因为让客户满意是我们公司生存和发展的前提。我们的客户不仅仅包括公司的销售和服务对象，还应该包括与公司关系密切的各类供应商与合作伙伴。只有做到了让客户满意，我们的工作才有了目标，企业才有了生存的价值和意义，企业的生存环境才能够得到有力的保障。</p><p>　　企业的凝聚力来自企业的不断发展。一方面，只有企业的不断发展，才能不断为员工提供成长的机会和事业发展的舞台。另一方面，企业在不断发展过程中，也要努力为员工提供物质和事业上回报，让他们在公司劳有所得，劳有所获。</p><p>　　作为一个公众公司，我们的重要目标之一就是要让股东满意，为股东创造价值。我们相信，只要做到了让客户满意，让员工满意，那么我们的公司就一定能够取得很好的业绩，我们的股东也会因此而获益和满意——这是一个必然的结果。但如果反之，忽略了让客户满意，让员工满意，其他就会是无木之本、无源之水，注定是不会长久的。</p><p><br/></p>', null, '17');
INSERT INTO `9f_category` VALUES ('18', '11', '0,11,18,', '0', '总经理致辞', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', '', null, null, null, null, '18');
INSERT INTO `9f_category` VALUES ('19', '11', '0,11,19,', '0', '品牌诠释', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', '', null, null, null, null, '19');
INSERT INTO `9f_category` VALUES ('20', '11', '0,11,20,', '0', '联系我们', '', '', '', '', '0', '0', '', '', '', 'Content_page_cn.html', '', '', '', '<p>工厂地址：江苏省徐州市铜山经济开发区嵩山路220号华聚工业园&nbsp;</p><p>深圳办事处：广东深圳龙华新区大浪街道高峰社区亿康商务大厦11层</p><p>电话：0755-29580912&nbsp;</p><p>传真:0755-29580631</p><p><br/></p>', null, '20');
INSERT INTO `9f_category` VALUES ('21', '2', '0,2,21,', '1', 'Company news', '', '', '', '', '0', '0', '', '', '', 'Content_list_news_en.html', 'Content_show_en.html', null, null, null, null, '21');
INSERT INTO `9f_category` VALUES ('22', '2', '0,2,22,', '1', 'Industry news', '', '', '', '', '0', '0', '', '', '', 'Content_list_news_en.html', 'Content_show_en.html', null, null, null, null, '22');
INSERT INTO `9f_category` VALUES ('23', '3', '0,3,23,', '1', 'Mobile power series', '', '', 'uploads/image/20140626/1403753948.jpg', '', '0', '0', '', '', 'The large capacity & portable', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '23');
INSERT INTO `9f_category` VALUES ('24', '3', '0,3,24,', '1', 'Battery series', '', '', 'uploads/image/20140627/1403851990.jpg', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '24');
INSERT INTO `9f_category` VALUES ('25', '3', '0,3,25,', '1', 'Bluetooth speaker', '', '', 'uploads/image/20140627/1403857026.jpg', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '25');
INSERT INTO `9f_category` VALUES ('26', '3', '0,3,26,', '1', 'Mobile phone shell', '', '', 'uploads/image/20140627/1403853640.jpg', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '26');
INSERT INTO `9f_category` VALUES ('27', '23', '0,3,23,27,', '1', 'Polymer battery series', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '27');
INSERT INTO `9f_category` VALUES ('28', '23', '0,3,23,28,', '1', 'The 18650 battery series', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '28');
INSERT INTO `9f_category` VALUES ('29', '24', '0,3,24,29,', '1', '18650 lithium battery', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '29');
INSERT INTO `9f_category` VALUES ('30', '24', '0,3,24,30,', '1', 'Polymer battery', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '30');
INSERT INTO `9f_category` VALUES ('31', '24', '0,3,24,31,', '1', 'Battery series', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '31');
INSERT INTO `9f_category` VALUES ('32', '25', '0,3,25,32,', '1', 'Speaker series', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '32');
INSERT INTO `9f_category` VALUES ('33', '26', '0,3,26,33,', '1', 'Samsung mobile phone series', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '33');
INSERT INTO `9f_category` VALUES ('34', '26', '0,3,26,34,', '1', 'Apple mobile phone series', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '34');
INSERT INTO `9f_category` VALUES ('35', '26', '0,3,26,35,', '1', 'Millet mobile phone series', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_en.html', 'Content_show_en.html', null, null, null, null, '35');
INSERT INTO `9f_category` VALUES ('36', '12', '0,12,36,', '1', '公司新闻', '', '', '', '', '0', '0', '', '', '', 'Content_list_news_cn.html', 'Content_show_cn.html', null, null, null, null, '36');
INSERT INTO `9f_category` VALUES ('37', '12', '0,12,37,', '1', '行业新闻', '', '', '', '', '0', '0', '', '', '', 'Content_list_news_cn.html', 'Content_show_cn.html', null, null, null, null, '37');
INSERT INTO `9f_category` VALUES ('38', '13', '0,13,38,', '1', '移动电源系列', '', '', 'uploads/image/20140626/1403753948.jpg', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '38');
INSERT INTO `9f_category` VALUES ('39', '13', '0,13,39,', '1', '电池系列', '', '', 'uploads/image/20140627/1403851990.jpg', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '39');
INSERT INTO `9f_category` VALUES ('40', '13', '0,13,40,', '1', '蓝牙音箱系列', '', '', 'uploads/image/20140627/1403857026.jpg', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '40');
INSERT INTO `9f_category` VALUES ('41', '13', '0,13,41,', '1', '手机壳系列', '', '', 'uploads/image/20140627/1403853640.jpg', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '41');
INSERT INTO `9f_category` VALUES ('42', '38', '0,13,38,42,', '1', '聚合物电池系列', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '42');
INSERT INTO `9f_category` VALUES ('43', '38', '0,13,38,43,', '1', '18650电池系列', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '43');
INSERT INTO `9f_category` VALUES ('44', '39', '0,13,39,44,', '1', '18650锂电池', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '44');
INSERT INTO `9f_category` VALUES ('45', '39', '0,13,39,45,', '1', '聚合物电池', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '45');
INSERT INTO `9f_category` VALUES ('46', '39', '0,13,39,46,', '1', '电池组系列', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '46');
INSERT INTO `9f_category` VALUES ('47', '40', '0,13,40,47,', '1', '音箱系列', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '47');
INSERT INTO `9f_category` VALUES ('48', '41', '0,13,41,48,', '1', '三星手机系列', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '48');
INSERT INTO `9f_category` VALUES ('49', '41', '0,13,41,49,', '1', '苹果手机系列', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '49');
INSERT INTO `9f_category` VALUES ('50', '41', '0,13,41,50,', '1', '小米手机系列', '', '', '', '', '0', '0', '', '', '', 'Content_list_product_cn.html', 'Content_show_cn.html', null, null, null, null, '50');

-- ----------------------------
-- Table structure for `9f_content`
-- ----------------------------
DROP TABLE IF EXISTS `9f_content`;
CREATE TABLE `9f_content` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `pid` smallint(5) NOT NULL,
  `path` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `style` char(24) default NULL,
  `flag` varchar(60) default NULL,
  `source` varchar(255) default NULL,
  `picurl` varchar(255) default NULL,
  `picarr` text,
  `url` varchar(255) default NULL,
  `tag` varchar(255) NOT NULL,
  `keywords` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `username` varchar(20) NOT NULL,
  `hits` int(10) unsigned NOT NULL default '1',
  `content` mediumtext NOT NULL,
  `content_arr` text,
  `relation_id` varchar(255) NOT NULL,
  `htmlurl` varchar(255) default NULL,
  `orderid` int(10) default '1',
  `checkinfo` tinyint(1) unsigned NOT NULL default '0',
  `posttime` int(10) unsigned NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_content
-- ----------------------------
INSERT INTO `9f_content` VALUES ('1', '21', '0,2,21,', 'Rich Dingxin energy let China brand in India', ';', null, '', 'uploads/image/20140625/1403692509.jpg', '', '', '', '', '', 'admin', '5', '<p style=\"text-align: left; text-indent: 2em;\">According to the India Department of telecommunication management Trai recently released data show, as of 2011 January, India mobile phone users reached a total of 771000000, becoming the world&#39;s second largest mobile market. Over the past year, the average monthly new 19000000 mobile phone users in India. India is one of the fastest growing global mobile phone market, the huge market potential is attracting more and more Chinese investors and mobile phone manufacturers eyes. But the India Telecommunications Administration announced the ban without IMEI (International Mobile Equipment Identity) mobile phone, and Chinese exported to many no IMEI copycat mobile phone India encounter waterloo.</p><p style=\"text-align: left; text-indent: 2em;\">India mobile phone market into the era of brand new competition, no longer welcome no quality assurance, disordered vicious competition copycat mobile phone. This is a standard, is the trend. India mobile phone and its industrial chain requires specification and quality. The pursuit of quality and brand enterprises is positive, is the opportunity. With the help of the strength of the brand, is the only way the real overseas beach Chinese enterprises. China manufacturing need to show the world its positive image, brand strength.</p><p style=\"text-align: left; text-indent: 2em;\">In this case, the Southern China lithium industry alliance, India mobile phone Association (ICA) host, Kyushu Shenzhen Energy Technology Co., Ltd., &quot;MY MOBILE&quot; hosted &quot;the first China lithium battery technology forum&quot; held in New Delhi in March 25th, as a bridge China mobile phone enterprises set up the international market of India, to select excellent Chinese brand, promote world new energy and green industry to contribute to the exchange and cooperation between China and India, lithium battery.</p><p style=\"text-align: left; text-indent: 2em;\">This exhibition is the effective integration of the domestic and foreign resource, keenly sought to domestic and foreign manufacturers, buyers benefit demand and service point blank, provides a good B2B platform for domestic and foreign trade joint entity. Department of energy to assist in arranging China enterprises went to India to inspect, investment and trade environment of the India market first hand information, understanding of the local business and investment environment, market demand, and seek cooperation with India enterprises to expand business opportunities, China trade potential and opportunities for China enterprise are introduced.</p><p style=\"text-align: left; text-indent: 2em;\">During the forum often colorful, India telecom operators, Airtel, Indoasia, Intex, Nexian, Reliance, Spice, Tata, 125 India famous mobile phone channels and brands to participate in this forum. Motorola, Samsung, Nokia, TCL international mobile phone giant full debut.</p><p style=\"text-align: left; text-indent: 2em;\">During the forum, the Chinese mobile phone industry association and the India mobile phone Association (ICA) jointly elected &quot;Chinese high-quality mobile phone and 3C of product of high-end brand ten strong enterprises&quot; days long, Huayu, 7up, Chinese Hua Lu, Wen Tai, on communication, to &quot;quality&quot; and &quot;value&quot;, win the attention and recognition from the world.</p><p style=\"text-align: left; text-indent: 2em;\">&quot;In Chinese high-quality mobile phone and 3C of product of high-end brand ten strong, not only the enterprise&#39;s comprehensive strength has been affirmed, also shows that the China lithium industry and mobile phone industry, is a green recovery leading industry rise, reshaping the industry international status and image.&quot; The judges, the experts comments.</p><p style=\"text-align: left; text-indent: 2em;\">According to the enterprise the relevant responsible person revealed, business docking show the forum site affiliated to promotion of enterprise is really awesome, beyond imagination significantly good results, a single continuous. According to estimates, turnover and intention of more than 100 million yuan. They said, &quot;we hope such exhibitions are often held it necessary, to meet the India manufacturers, but also meet the needs of enterprises of our China, thanks to organize the insight of the host of the conference.&quot;</p><p style=\"text-align: left; text-indent: 2em;\">&quot;The first China India lithium forum&quot; held smoothly, let &quot;Chinese brand&quot; win in India! This event to win more opportunities for global development and the promotion of the mobile phone industry China; let the world better understand China lithium industry; frame connecting bridge between domestic and foreign industry; promote exchanges and cooperation between China and India industry; and write a new chapter for the development of Chinese and India friendship.</p><p style=\"text-align: left; text-indent: 2em;\">The China India friendship, benefit both sides, but also Asia and the entire world. Cooperate hand in hand, create a better future. Twenty-first Century is the century of Asia, but also China and India do century. &quot;The dragon and the elephant&quot; the right time.</p><p><br style=\"text-align: left; text-indent: 2em;\"/></p>', 'null', '', null, '0', '0', '1403687759', '1403687759');
INSERT INTO `9f_content` VALUES ('2', '21', '0,2,21,', 'Su Rong was removed from the post of vice chairman of the CPPCC National Committee', ';', null, '', '', '', '', 'su rong,CPPCC', '', '', 'admin', '5', '<p style=\"text-align: left; text-indent: 2em;\">In new network on 25 June, according to Xinhua news agency, &quot;Xinhua viewpoint&quot; official micro-blog news, National Political Consultative Conference of twelve session of the Standing Committee of the sixth meeting after the vote, passed on from Su Rong, vice chairman of the twelfth session of CPPCC positions, cancel its qualification of members of the CPPCC National Committee&#39;s decision.</p><p style=\"text-align: left; text-indent: 2em;\">In June 14, 2014, the Central Commission for Discipline Inspection of the Ministry website news, vice chairman of the Chinese people&#39;s Political Consultative Conference China Twelfth National Committee Su Rong alleged serious violation of discipline, accept investigation.</p><p style=\"text-align: left; text-indent: 2em;\">Su Rong resume:</p><p style=\"text-align: left; text-indent: 2em;\">Male, Han nationality, born in October 1948, Jilin Taonan person, in 1974 to work in January, 1970 January to join the Communist Party of Chinese, School of economics and management, Jilin University, Department of international economics world economics graduate, postgraduate degree, a master&#39;s degree in economics.</p><p><br style=\"text-align: left; text-indent: 2em;\"/></p>', 'null', '1', null, '0', '0', '1403688219', '1403696355');
INSERT INTO `9f_content` VALUES ('3', '27', '0,3,23,27,', 'Xi Jinping: hopes Malaysia find MH370 whereabouts as soon as possible', ';', 'h', '', 'uploads/image/20140625/1403702410.jpg', '', '', '', '', '', 'admin', '3', '<p>In new network Beijing on 24 June, (reporter Zhang Shuo) China President Xi Jinping 24 in the Great Hall of the people in Malaysia Pandikar met with speaker of the house of commons.</p><p>Xi Jinping, China government attaches great importance to developing friendly relations with Malaysia, will promote the bilateral relationship as an important direction of diplomacy. The two sides should to celebrate 40 years of diplomatic ties as an opportunity, make the top design, the mutually beneficial cooperation in various fields to promote good planning, the comprehensive strategic partnership to achieve rapid development.</p><p>Xi Jinping pointed out, Chinese attaches great importance to friendly relations with neighboring countries. To this end, I propose, Cheng Hui, dear, let foreign philosophy, advocated jointly, comprehensive, sustainable cooperation, Asian security concept, put forward to build closer Chinese ASEAN Community of destiny, the Silk Road Economic Belt, in twenty-first Century, the Silk Road on the sea and a series of cooperation initiative. This fully shows that, Chinese willing to neighboring countries live together in peace together, common development. Next year, Malaysia will hold the rotating chairman of ASEAN, China will actively support, is willing to work with the countries concerned, including Malaysia together, promote the China ASEAN relations for greater development.</p><p>Xi Jinping said, in March this year, Malaysia Airlines MH370 aircraft lost, this is a very unfortunate incident. Hopes Malaysia continue to coordinate relevant countries, establish and perfect the normal search and rehabilitation programs, and try to find the plane went down as soon as possible.</p><p><br/></p>', 'null', '', null, '0', '0', '1403694351', '1403751426');
INSERT INTO `9f_content` VALUES ('4', '5', '0,5,', 'Graphic: Li Keqiang Europe causes which \"big\"', ';', null, '', '', '', '', '', '', '', 'admin', '3', '', '{\"down\":\"uploads\\/soft\\/20140625\\/1403706963.zip\"}', '', null, '0', '0', '1403698827', '1403698833');
INSERT INTO `9f_content` VALUES ('5', '22', '0,2,22,', 'Japan 1-4 out of the bottom Columbia was rated as Spanish forget rhythm', ';', null, '', 'uploads/image/20140625/1403703579.jpg', '', '', '', '', '', 'admin', '5', '<p>Time of Beijing of sina sports dispatch on June 25th 4 when, the World Cup group C match at the end of round for the expansion at the Cu A Ba Pantana M stadium, the Japanese team 1-4 defeated Columbia team. The former striker Zhang Enhua and Xu Yang made a comment on the game, Zhang Enhua said Japan now play like Spain, Barcelona, Alberto Zaccheroni let the Japanese team lost their expertise, the Asian football to go15.</p><p>Before analysis, Zhang Enhua points out, &quot;the Japanese team as a whole has certain advantages, the key is the key, the door finally strike capability is not strong. Then is the ability of a no good players. He is now similar to Spain, Barcelona, in order to control the ball and the ball, forgot to change the rhythm of.&quot;</p><p>Claude Lado in the first half penalty to break the deadlock, Okazaki Shinji header equaliser buzzer. Xu Yang commented: &quot;this wild too unfortunate, opening soon send out of the penalty, even if the body is no advantage, there is no need to foul, as he ran. The Japanese team is always strong road of words, your body can&#39;t play. If he has a high center, the Greek Samaras came over here, right.&quot; Zhang Enhua said: &quot;today the Japanese team depart from one&#39;s normal behavior, but their attitude is urgent, mistakes more. Don&#39;t play in the middle, hit the middle mistakes more to Columbia more opportunity to fight back.&quot;</p><p>The second half Columbia into tragedy, even into the three ball and the final 4-1 victory over japan. Liu Jiayuan said the game of the Japanese team will be very painful. Zhang Enhua commented: &quot;Alberto Zaccheroni let the team lost their expertise, retired in play this is a taboo. The Asian teams whether physical or personal technology, want to catch up with the world football has a long way to go. And Columbia is a tactical literacy team,</p><p><br/></p>', 'null', '', null, '0', '0', '1403699840', '1403699840');
INSERT INTO `9f_content` VALUES ('6', '22', '0,2,22,', 'Chen Guangbiao in the streets of New York to the tramp money people reject', ';', null, '', 'uploads/image/20140625/1403707493.jpg', '', '', '', '', '', 'admin', '5', '<p>In June 25th, local time America New York, Chen Guangbiao donated 100 yuan notes to the tramp and busking on the streets of New York, some people refused he handed over the money. Has always been a high-profile charity China millionaire Chen Guangbiao in China mainland, Taiwan and Japan, many times for the victims and the poor to distribute cash and causes heat to discuss, who this week announced in June 25th in New York Manhattan rich areas of the world invited tramp had lunch and each paid $300 in cash, again a stone arouses thousand layer the waves caused by people at home and Chinese, European and American mainstream media attention and hot debate.</p><p>Chen Guangbiao earlier in the China official micro-blog latest message said, &quot;American poor people also really many, there are about 2000 people signed up every day, the 25 day to over a million people to such&quot;.</p><p>The original 25 in Central Park, please 1000 homeless dinner, paid $300, now because the problem to maintain the order of site security may be only 300 people to the scene, the cancellation of 700 people on the lawn. &quot;Police and fire of genius notice on the lawn, not before, taking into account security issues, so the 700 people on the lawn was cancelled.&quot; But Chen Guangbiao said, he would put the balance to rescue station issued.</p><p><br/></p>', 'null', '', null, '0', '0', '1403699960', '1403699960');
INSERT INTO `9f_content` VALUES ('7', '4', '0,4,', 'Qisheng', ';', null, '', 'uploads/image/20140626/1403746159.jpg', '', '', '', '', '', 'admin', '3', '<p style=\"text-indent: 2em; text-align: left;\">Dongguan Qisheng Electronics Industrial Co Ltd was founded in 1992, is located in the new industrial district of Dongguan City Machong town. Is a collection research and development, production and sales of DVD, power amplifier, audio, home theater and other audio and video electronic products, refrigerator, washing machine and other white goods, drinking machine, induction cooker, electric cooker, electric fans and other small household electrical appliances and accessories of modern high-tech private enterprises. Ltd Industrial Park, the existing staff of more than 1100 people, covers an area of 300 acres, with various professional and technical personnel and automatic production equipment, home theater production base is one of the largest Chinese.</p><p style=\"text-indent: 2em; text-align: left;\">The company attaches great importance to product quality management and customer service service integrity of the construction work, pay attention to enterprise intangible assets accumulation, the strategy of brand development, out of a typical road Chinese private enterprises own funds, self production, self created brand, to the world. QiSheng electronics from set up to now, we have successfully applied for the patent nearly 100 pieces of typical example, and for the healthy development of the industry play. The company invested heavily in the introduction of advanced production equipment at the same time, pay more attention to the improvement of management efficiency, the company passed the &quot;ISO9001 international quality management system certification&quot;, &quot;all products through the national compulsory 3C certification&quot;, is the provincial enterprise technology center of Guangdong Province, high-tech enterprise in Guangdong province.</p><p style=\"text-indent: 2em; text-align: left;\">The company has a sound marketing network, set up more than 4000 kinds of sales outlets have nationwide, and Gome, Suning, Carrefour, WAL-MART, RT mart, the large chain stores have established a mature and stable relations of cooperation. With excellent product quality, perfect marketing network and &quot;180 days long.&quot; after sale service and so on a number of innovation, QiSheng has won the &quot;Guangdong Province famous brand products&quot;, &quot;Guangdong Province famous trademark&quot;, &quot;national inspection free products&quot;, &quot;Chinese brand-name products&quot;, &quot;A Well-Known Trademark in China&quot; and other honors, is China electronic sound industry association the first authorized the use of &quot;A&quot; logo of the enterprise.</p><p style=\"text-indent: 2em; text-align: left;\">The 2005 annual Chinese quality 500 strong selection results, QiSheng ranked thirty-fifth in the home appliance industry, is the first home theater Mianjian enterprises. In 2006, the Guangdong Provincial Department of science and Technology awarded the &quot;high-tech enterprise certificate&quot;, in 2007, was Chinese Commercial Federation, China Enterprise Culture Promotion Association, the evaluation committee of the national commodity after sale service jointly assessed as &quot;top ten&quot; enterprises nationwide customer service service industry; in 2008 January, China brand research Institute released the &quot;third annual Chinese most value brand 500 strong&quot; list, the QiSheng brand in the home appliance industry, become Chinese 23, Guangdong Province, one of the 61 selected brand, brand value of 708000000 yuan. In 2009, was evaluated as the provincial enterprise technology center of Guangdong province.</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p>', 'null', '', null, '0', '0', '1403746138', '1403746138');
INSERT INTO `9f_content` VALUES ('8', '14', '0,14,', '奇声', ';', null, '', 'uploads/image/20140626/1403746159.jpg', '', '', '', '', '', 'admin', '3', '<p style=\"text-indent: 2em; text-align: left;\">东莞市奇声电子实业有限公司成立于1992年，位于东莞市麻涌镇新基工业区。是一家集研发、生产与销售DVD、功放、音响、家庭影院等影音电子产品，冰箱、洗衣机等白色家电产品，饮水机、电磁炉、电饭煲、电风扇等小家电产品及相关零配件的现代化高新技术民营企业。公司工业园现有员工1100余人，占地300亩，拥有各类专业技术人才和全自动产生设备，是目前中国最大的家庭影院生产基地之一。</p><p style=\"text-indent: 2em; text-align: left;\">公司高度重视产品品质管理及售后服务的诚信建设工作，重视企业无形资产的积累，实施品牌发展战略，走出了一条中国民营企业自有资金、自行生产、自创名牌、走向世界的典型道路。奇声电子自成立到现在，现成功申请的专利近百件，为行业的健康发展起到典型与榜样作用。公司在斥巨资引进先进生产设备的同时，更注重管理效能的提高，公司通过了“ISO9001国际质量管理体系认证”，产品全部通过“国家强制性3C认证”，是广东省省级企业技术中心，广东省高新技术企业。</p><p style=\"text-indent: 2em; text-align: left;\">公司拥有健全的市场网络，在全国范围内已经建立起4000家以上的各类销售网点，与国美、苏宁、家乐福、沃尔玛、大润发等全国大型连锁卖场均建立了成熟而稳定的合作关系。凭借过硬的产品质量、健全的市场网络和“180天超长包换”售后服务等多项创新，奇声先后荣获“广东省名牌产品”、“广东省著名商标”、“国家免检产品”、“中国名牌产品”、“中国驰名商标”等荣誉，是中国电子音响工业协会第一批授权使用“A”标志的企业。</p><p style=\"text-indent: 2em; text-align: left;\">2005年度中国质量500强评选结果，奇声电子在家电类行业中排名第35位，是首批获得家庭影院免检的企业。2006年，获广东省科学技术厅颁发的“高新技术企业认定证书”，2007年，被中国商业联合会、中国企业文化促进会、全国商品售后服务评价委员会联合评定为“全国售后服务行业十佳”企业；2008年1月，中国品牌研究院公布的《第三届中国最有价值商标500强》排行榜中，奇声品牌入选其中，成为中国家电行业23家，广东省61家入选品牌之一，品牌价值达7.08亿元。2009年，被评定为广东省省级企业技术中心。</p>', 'null', '', null, '0', '0', '1403746198', '1403746198');
INSERT INTO `9f_content` VALUES ('9', '14', '0,14,', '比德文', ';', null, '', 'uploads/image/20140626/1403746461.jpg', '', '', '', '', '', 'admin', '3', '<p style=\"text-indent: 2em; text-align: left;\">比德文控股集团股份有限公司（以下简称&quot;比德文控股集团&quot;或&quot;集团&quot;）</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">全球领先的新能源交通工具的集成提供商和整合服务商集团采用母子公司结构，横跨电动汽车、电动自行车、电动三轮车三大产业。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">集团前身山东比德文动力科技有限公司由现任董事长李国欣先生创建于2001年，创立伊始进入电动车行业。2002年起使用&quot;比德文&quot;品牌，2006年，邀请刘德华作为比德文品牌代言人。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">2010年底，经权威机构评估，&quot;比德文&quot;品牌价值已超51亿。除集团总部外，集团还在天津、无锡、台州、潍坊等地建有生产基地，并拥有覆盖全国各地的营销网络。</p><p style=\"text-indent: 2em; text-align: left;\">集团致力于把新能源的革新力量真正应用到社会，为人类提供更先进、更高效环保的新出行方式，助力政府低碳生活的倡导与施行，以科技推进中国新能源的国际化进程。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">展望未来，集团将通过持续稳健发展，秉持&quot;产业报国&quot;和&quot;贡献民族工业，创造驰名品牌&quot;的理想，成为一家值得信赖并受人尊重和赞誉，具有世界范围影响力的国际化集团公司。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p>', 'null', '', null, '0', '0', '1403746441', '1403746441');
INSERT INTO `9f_content` VALUES ('10', '4', '0,4,', 'BYVIN', ';', null, '', 'uploads/image/20140626/1403746461.jpg', '', '', '', '', '', 'admin', '3', '<p style=\"text-align: left; text-indent: 2em;\">Bidewen holding group Limited by Share Ltd (hereinafter referred to as &quot;bidewen holding group&quot; or the &quot;group&quot;)</p><p style=\"text-align: left; text-indent: 2em;\">New energy vehicles leading global provider of integrated and integration services group adopt parent subsidiary structure, across the electric car, electric bicycle, electric tricycle industry three.</p><p style=\"text-align: left; text-indent: 2em;\">Group predecessor Shandong bidewen Power Technology Co., Ltd. founded by the incumbent chairman Mr. Li Guoxin in 2001, the beginning of creation into the electric car industry. 2002 onwards &quot;bidewen&quot; brand, in 2006, Andy Lau invited as bidewen brand spokesmen.</p><p style=\"text-align: left; text-indent: 2em;\">By the end of 2010, assessed by the authority, &quot;ultra 5100000000 bidewen&quot; brand value. In addition to the headquarters of the group, group in Tianjin, Wuxi, Taizhou, Weifang and other places have built production bases, and has covered the marketing network all over the country.</p><p style=\"text-align: left; text-indent: 2em;\">The group is committed to the innovative power new energy really applied to the community, to provide more advanced, more efficient and environment-friendly new travel mode for human, and shall assist the government low carbon life advocate, promote the process of internationalization China new energy to the science and technology.</p><p style=\"text-align: left; text-indent: 2em;\">Looking to the future, the group will through sustained and stable development, uphold the principle of &quot;industry serve the country&quot; and &quot;the contribution of national industry, create famous brand&quot;, become a trustworthy and respected and praised, with worldwide influence of the international group of companies.</p><p><br style=\"text-align: left; text-indent: 2em;\"/></p>', 'null', '', null, '0', '0', '1403746493', '1403746493');
INSERT INTO `9f_content` VALUES ('11', '14', '0,14,', '爱玛', ';', null, '', 'uploads/image/20140626/1403749483.jpg', '', '', '', '', '', 'admin', '11', '<p style=\"text-indent: 2em; text-align: left;\">爱玛科技：爱的律动与合一。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">积极践行博爱的人文科技信念，在爱的律动与合一中追求、成长。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">尊重科学、相信智慧，珍视自然、关爱家园。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">爱玛科技，以关心人的自身发展和人与自然的关系为企业自身行为准则，重视科技与人文、生活与自然的理性思考，我们渴望与社会、与自然的完美融和。用企业经营实际行动来阐释科技与人文之间的统一，努力推进低碳环保活动，成为社会所期待的合格企业公民。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">爱玛科技，自1999年创始以来，始终致力于运动自行车、节能电动车、环保电动三轮车等，智能化低碳出行交通工具的研究开发与专业制造。</p><p style=\"text-indent: 2em; text-align: left;\">爱玛科技，立足天津，分别在江苏、广东、浙江等地积极推进本地化生产，通过科学的全国性战略布局满足市场实际需求。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">天津制造基地，坐落于美丽的静海现代生态工业园区，占地约40万平方米，建筑面积约26万平方米，建设投资约6亿元人民币。集研发中心、生产制造、仓储物流于一体，融焊接、注塑、喷涂、装配等精密加工一条龙，年产能规划500万辆；</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">无锡制造基地（江苏爱玛车业科技有限公司），位于太湖之滨的锡山经济开发区机械装备产业园，主要生产爱玛品牌旗下豪华款系列电动车，拥有10条现代化同步成车装配生产线及成车输送</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">东莞制造基地（广东爱玛车业科技有限公司），租赁占地约5万平方米，规划投资约2亿元人民币，年产能规划60万辆。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">台州制造基地（浙江爱玛车业科技有限公司），位于民营经济活跃的台州市黄岩区新前工业区，浙江爱玛针对消费者的需求，先后成功推出“力动”系列、“龙威”系列、“力风”系列等多款舒适与性能完美结合的产品，租赁占地面积约1.6万平方米，年产能规划30万辆。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">爱玛科技，积极倡导节能减排、低碳出行，切实注重绿色、清洁新能源在个人交通方面的实际应用，引领了全新的时尚出行生活方式。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">我们珍视美好自然，更加关爱绿色家园。</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p>', 'null', '', null, '0', '0', '1403746650', '1403746650');
INSERT INTO `9f_content` VALUES ('12', '14', '0,14,', '久量', ';', null, '', 'uploads/image/20140626/1403751753.jpg', '', '', '', '', '', 'admin', '142', '<p style=\"text-indent: 2em; text-align: left;\">广东久量光电科技有限公司，前身为广州市松乐电子科技有限公司，2002年创立于广州，生产基地座落于广州高新技术产业开发区内，厂区总建筑面积达10万多平方米。历经十年的跨越式发展，已成为专注于LED光电科技的应用，集设计研发、制造和销售于一体的高新技术企业。“技术研发”和“品牌运营”是久量两大核心竞争力，久量现拥有近500多项产品专利；秉承对卓越品质的追求及创新，成为国内外同行业领导品牌。</p><p style=\"text-indent: 2em; text-align: left;\">久量现拥有：LED台灯系列、LED手电筒系列、LED探照灯系列、LED应急灯光源系列、LED头灯系列、电蚊拍系列、电池充电器系列等七大系列产品，凭借“时尚、简约、环保”的设计理念和严密完善的质量管理体系，产品以其质量好、外观美、创新快、服务优而畅销国内外市场，持续领跑行业。</p><p style=\"text-indent: 2em; text-align: left;\">久量是一个年轻个性化的品牌，富有时尚感、亲和力，倡导的是一种先锋时尚文化。为迎合品牌战略规划，久量2010年特邀湖南卫视著名主持人谢娜出任品牌形象代言人，与湖南卫视携手达成品牌战略合作伙伴，铸造行业的知名品牌。将久量点亮锋尚生活的品牌理念传递给万千民众。 &nbsp;&nbsp;<br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">&nbsp;“技术领先、质量领先、营销网络领先、品牌影响力领先”是企业核心经营理念，也是久量光电飞速发展的源泉。在“以卓越品质创名牌”的战略思路指导下，公司先后获得了 “ISO9001：2008国际质量管理认证 ”、 “ISO10012计量检测体系认证” 、“ISO14000环境管理体系认证 ”、“ISO18000国际性安全及卫生管理体系认证 ”、“标准化良好行为企业(AAAA) 认证”、“广州高新技术产业区优秀创新企业”、“中国工商业联合会会员单位”、“广东电子商会理事单位”、“广州名牌战略企业”、“广州市白云区百优民营企业”、“高新技术企业”、“广东名牌”、“广州市著名商标”、“广东省用户满意产品“、“广州市白云区进出口商会常务副会长单位“、“广东省现代产业500强“等荣誉称号。<br style=\"text-indent: 2em; text-align: left;\"/></p><p style=\"text-indent: 2em; text-align: left;\">&nbsp;如今，久量光电作为一家专业化LED光电科技应用生产企业，致力于为客户提供优质的人性化产品。传承“务实进取、追求卓越”的企业精神，以“求真、务实、创新、合作”为企业价值观，充满生机与活力的久量正朝着“LED移动应用照明国际品牌”的目标努力奋进。 &nbsp; &nbsp;&nbsp;<br style=\"text-indent: 2em; text-align: left;\"/></p><p><br style=\"text-indent: 2em; text-align: left;\"/></p>', 'null', '', null, '0', '0', '1403746742', '1403746742');
INSERT INTO `9f_content` VALUES ('13', '4', '0,4,', 'aimatech', ';', null, '', 'uploads/image/20140626/1403749483.jpg', '', '', '', '', '', 'admin', '3', '<p style=\"text-indent: 2em; text-align: left;\">Emma: love rhythm and unity.</p><p style=\"text-indent: 2em; text-align: left;\">Actively practice the fraternity of Humanities and science and technology, in pursuit of belief, growth rhythm of love and oneness.</p><p style=\"text-indent: 2em; text-align: left;\">To respect science, believe that wisdom, cherish nature, home care.</p><p style=\"text-indent: 2em; text-align: left;\">Emma science and technology, the relationship between its development and person and natural concern for their own code of conduct, pay attention to rational thinking of science and humanities, life and nature, we desire and social, and natural perfect harmony. With the business of the actual action to explain the unity between science and humanities, efforts to promote the low carbon environmental protection activities, become a social expectation of corporate citizen.</p><p style=\"text-indent: 2em; text-align: left;\">Emma technology, since its inception in 1999, has always been committed to energy saving, environmental protection, sports bicycle electric vehicle electric tricycle, professional research and development and manufacture of intelligent low carbon travel.</p><p style=\"text-indent: 2em; text-align: left;\">Emma technology, based in Jiangsu, Tianjin, Guangdong, Zhejiang, actively promote the localization of production, meet the demands of reality through the science of national strategic layout.</p><p style=\"text-indent: 2em; text-align: left;\">Tianjin manufacturing base, located in the beautiful Jinghai modern ecological industrial park, covers an area of about 400000 square meters, construction area of about 260000 square meters, construction investment of about 600000000 yuan. Set R &amp;amp; D, manufacturing, warehousing logistics integration, fusion welding, injection molding, spraying, assembly precision processing one-stop, capacity planning 5000000;</p><p style=\"text-indent: 2em; text-align: left;\">Wuxi manufacturing base (Jiangsu Emma Vehicle Technology Co. Ltd), is located in Taihu Xishan Economic Development Zone machinery equipment Industrial Park, mainly the production of Emma brand luxury series of electric vehicles, has 10 modern synchronous into a car assembly line and into a car transport</p><p style=\"text-indent: 2em; text-align: left;\">Dongguan manufacturing base (Guangdong Emma Vehicle Technology Co. Ltd.), lease covers an area of about 50000 square meters, planning investment of about 200000000 yuan, annual production capacity planning 600000.</p><p style=\"text-indent: 2em; text-align: left;\">Taizhou manufacturing base (Zhejiang Emma Vehicle Technology Co. Ltd), is located in the active private economy in Huangyan District of Taizhou City, the new industrial zone, Zhejiang Emma in response to consumer demand, has successfully launched a &quot;dynamic&quot; series, &quot;hard&quot; series, &quot;wind&quot; series and a variety of comfort and performance of the perfect combination of products, leasing covers an area of about 16000 square meters, annual production capacity planning 300000.</p><p style=\"text-indent: 2em; text-align: left;\">Emma technology, actively promote the energy-saving emission reduction, low carbon travel, pay attention to practical application of green, clean new energy in personal transportation, leading the fashion life style new travel.</p><p style=\"text-indent: 2em; text-align: left;\">We cherish the beauty of nature, and more love green homes.</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p>', 'null', '', null, '0', '0', '1403746813', '1403746813');
INSERT INTO `9f_content` VALUES ('14', '4', '0,4,', 'DP', ';', null, '', 'uploads/image/20140626/1403751753.jpg', '', '', '', '', '', 'admin', '3', '<p style=\"text-indent: 2em; text-align: left;\">Guangdong long Photoelectric Technology Co. Ltd., formerly known as Guangzhou SONGLE Electronic Technology Co., Ltd., founded in 2002 in Guangzhou, the production base is located in Guangzhou hi tech Industrial Development Zone, plant a total construction area of 10 square meters. After ten years development by leaps and bounds, the application has become focus on the LED photoelectric technology, high-tech enterprise integrating design R &amp;amp; D, manufacturing and sales of. &quot;Technology&quot; and &quot;brand&quot; is the long volume two core competitiveness, many now has nearly 500 a number of patented products; adhering to the pursuit of excellence and innovation, become the same domestic industry leading brands.</p><p style=\"text-indent: 2em; text-align: left;\">We have long volume: LED lamp series, LED series, LED series, flashlight, searchlight LED emergency lamp series, LED lamp series, electric mosquito swatter series, battery charger series seven series products, by virtue of &quot;design concept, simple fashion, environmental protection&quot; and the strict and perfect quality management system, products with good quality, beautiful appearance, faster innovation, service excellent and best-selling domestic and foreign markets, continued to lead the industry.</p><p style=\"text-indent: 2em; text-align: left;\">Long is a young individual brand, full of fashionable feeling, affinity, advocate is a pioneer of fashion culture. In order to cater to the brand strategy planning, long was invited in 2010 Hunan TV host Sheenah as a brand spokesman, and Hunan satellite TV to reach the brand strategic partnership, casting industry well-known brands. Transfer the amount of light front is long life brand concept to thousands of people.</p><p style=\"text-indent: 2em; text-align: left;\">&quot;Technology leadership, quality leadership, marketing network, brand influence leading leading enterprise&quot; is the core business philosophy, it is also the source for the rapid development of photoelectric. In &quot;strategic thinking with excellent quality and creating famous brand&quot; under the guidance of the company, has won the &quot;ISO9001:2008 international quality management certification&quot;, &quot;ISO10012 measuring system certification&quot;, &quot;ISO14000 environmental management system certification&quot;, &quot;ISO18000 international health and safety management system certification&quot;, &quot;good behavior standardized enterprise (AAAA) certification&quot;, &quot;Guangzhou high tech Industrial Zone of outstanding innovative enterprises&quot;, &quot;Chinese Federation of industry and Commerce member unit&quot;, &quot;Guangdong Electronic Chamber of Commerce member unit&quot;, &quot;Guangzhou famous brand strategy of enterprises&quot;, &quot;Guangzhou Baiyun District 100 private enterprises&quot;, &quot;high-tech enterprises&quot;, &quot;Guangdong famous brand&quot;, &quot;Guangzhou famous the trademark&quot;, &quot;Guangdong Province user satisfaction with products&quot;, &quot;Guangzhou Baiyun District Chamber of Commerce for import and export executive vice president of the unit&quot;, &quot;Guangdong Province modern industry 500 strong&quot; and other honorary titles.</p><p style=\"text-indent: 2em; text-align: left;\">Today, long photoelectric as a professional LED optoelectronic technology application of production enterprises, committed to providing customers with personalized product quality. Inheriting the &quot;pragmatic spirit, the pursuit of excellence&quot; spirit of enterprise, to the &quot;truth-seeking, pragmatic, innovation, cooperation&quot; as the corporate values, long is full of vigor and vitality of the forward &quot;LED mobile application lighting international brand&quot; target ahead.</p><p><br style=\"text-indent: 2em; text-align: left;\"/></p>', 'null', '', null, '0', '0', '1403747372', '1403747372');
INSERT INTO `9f_content` VALUES ('15', '27', '0,3,23,27,', 'The State Council inspection team checks the Guangdong People\'s livelihood implementation of policies and measures', ';', 'h', '', 'uploads/image/20140626/1403754687.jpg', '', '', '', '', '', 'admin', '3', '<p>From June 25th to July 5th, the State Council sent 8 inspection teams to part of the province (area, city), the State Council departments and units, to steady growth promoting reform and adjusting the structure and improving people&#39;s livelihood implement policies and measures to carry out a comprehensive inspection. On June 25th ~26, the auditor general Liu Jiayi as the work of the Department of housing and Urban Construction Group Vice Minister Qi Ji, deputy head of the State Council inspection team to inspect and guide the eighth Guangdong Province to implement the State Council policy measures, and to Guangzhou, Shenzhen, Zhaoqing City, on-the-spot investigation. On the morning of 25, the provincial government held a work report, commissioned by governor Zhu Xiaodan, Provincial Standing Committee, executive vice governor Xu Shaohua on behalf of the provincial Party committee, the provincial government to the inspection team reported in our province to implement the steady growth promoting reform and adjusting the structure and improving people&#39;s livelihood work, vice governor Xu Ruisheng presided over the meeting, vice governor Lin Shaochun attended the meeting. Guangzhou city mayor Chen Jianhua report on the work of Guangzhou city.</p>', 'null', '', null, '0', '0', '1403748690', '1403751431');
INSERT INTO `9f_content` VALUES ('16', '27', '0,3,23,27,', 'Audit: excessive welfare and cadre part-time national departments', ';', 'h', '', 'uploads/image/20140626/1403757024.jpg', '', '', '', '', '', 'admin', '3', '<p>This year the Audit Commission published the audit, inspection results of the 38 central departments annual budget implementation and other government revenues and expenditures, and last year the figure is 58 more. But the scope of the audit was reduced, but the audit depth is deeper, the central departments subordinate units audit strength significantly strengthened, thereby eliminating some of the blind area.</p><p>At the same time, the three branches out this year, also relates to the social hot issues over welfare and cadre part-time etc..</p><p><br/></p>', 'null', '', null, '0', '0', '1403748732', '1403751434');
INSERT INTO `9f_content` VALUES ('17', '28', '0,3,23,28,', 'The Ministry of public security, drug control director: showbiz was the hardest hit caught is one of the few', ';', 'h', '', 'uploads/image/20140626/1403749321.jpg', '', '', '', '', '', 'admin', '3', '<p>Drugs, gun battles, Infernal Affairs, these movies all is the selling point, engaged in drug control work more than 30 years of Liu Yuejin just a few words with the past, cracked can really move the Ministry of public security, drug, or &quot;10-5 Mekong Massacre&quot;, that the waxy Kang was arrested after the news, he has a little dance with joy, thought to drink two cups, &quot;hard has a result, some unspeakable&quot;. But the &quot;anti drug&quot; impossible so far, Liu Juchang introduced, the country registered drug users has reached 2580000 people, young people under 35 years accounted for 75%. The drug control work has a long way to go, &quot;the National Narcotics Control Commission composed of 38 ministries, if rely on public security, can not solve the drug problem in all.&quot;</p>', 'null', '', null, '0', '0', '1403748775', '1403751440');
INSERT INTO `9f_content` VALUES ('18', '36', '0,12,36,', '西安规定晚10点至早7点禁跳广场舞', ';', null, '', 'uploads/image/20140626/1403777792.jpg', '', '', '', '', '', 'admin', '3', '<p>据中国之声《新闻纵横》报道，24日，西安市法制办发布《西安市环境噪声污染防治条例(草案)》(征求意见稿)。对于市民关注的广场舞扰民，《意见稿》规定，在噪声敏感建筑物集中区域及其附近的公共场所进行宣传庆典、文化娱乐、体育健身等活动产生噪声的，要采取有效措施，减少噪声。晚10点到次日7点，居住区不得进行广场舞等产生噪声的活动。公共场所管理者应当对噪声扰民行为进行劝阻，劝阻无效的，应及时报告有关管理部门。《意见稿》规定，如果在夜间，商业经营活动或营业性文化娱乐活动产生噪声严重扰民，单位将面临1万元、个人将面临1千元的处罚。</p><p><br/></p><p>　　纵横点评：</p><p><br/></p><p>　　减少广场舞扰民，出台法规是进步，但更多的还是要靠咱们百姓自觉，多考虑考虑别人感受。</p><p><br/></p>', 'null', '', null, '0', '0', '1403771983', '1403771983');
INSERT INTO `9f_content` VALUES ('19', '36', '0,12,36,', '粗心老人候车丢掉5岁孙女 车站乘务人员发现送回', ';', null, '', '', '', '', '', '', '', 'admin', '3', '<p>“小妹妹，你怎么一直在哭？家人呢……”6月25日，一名身穿白色连衣裙的5岁小女孩在广州市汽车客运站一楼候车处与首次到广州的爷爷奶奶走失。幸好，这一情况被细心的守护员龙丽霞和梁玉娥及时发现，经车站工作人员一番努力寻找，最终安全将小女孩送回亲人身边。</p><p><br/></p><p>　　25日中午12时许，一名小女孩独自在广州市汽车客运站一楼的103检票口来回地小声哭喊：“你们在哪里，呜呜……”&#39;</p><p><br/></p><p>　　原来，这名小女孩和自己的爷爷奶奶及三个姐姐从安徽省阜阳县乘坐火车前往广州，经过十多个小时的车程才到达广州市汽车客运站，但还要转车前往花都狮岭和小孩的爸爸妈妈团聚。在广州市汽车客运站购买完车票后，小女孩的爷爷奶奶只顾着提携大包小包的行李，一不小心没有拉着这名年仅5岁的小孙女就检票上车了。</p><p><br/></p><p>　　获悉这一情况后，车站守护员龙丽霞和梁玉娥给行驶在高速路上的乘务人员发回小女孩的图片信息，经孔庆伟辨认，这正是自己的小孙女，这时他心里的一块大石头才放下。一个小时过后，孔庆伟从花都坐车返回广州市汽车客运站，当他在休息</p><p><br/></p>', 'null', '', null, '0', '0', '1403772007', '1403772007');
INSERT INTO `9f_content` VALUES ('20', '36', '0,12,36,', '宁夏境内一运输车侧翻盐酸泄漏 道路与植被损坏严重', ';', null, '', 'uploads/image/20140626/1403773345.jpg', '', '', '', '', '', 'admin', '3', '<p>&nbsp;车辆侧翻盐酸泄漏</p><p><br/></p><p>昨日凌晨2点多，宁C·B8932重型罐式货车由内蒙古乌海市开往陕西省吴起县。车上拉载着14.12吨浓度为31%的盐酸。</p><p><br/></p><p>途经银川203省道滨河新区大环境绿化工程建设指挥部入口约20米处时，因下雨路滑，内蒙古籍司机杨某处置不当，车辆与道路右侧的护栏发生碰刮后向左侧翻，约一半的盐酸液体泄漏，流淌至路边的土地和林地中。</p><p><br/></p><p>此起交通事故并无人员伤亡。</p><p><br/></p><p>2 道路植被损坏严重</p><p><br/></p><p>事故发生后，银川市110指挥中心、银川市安监局以及交警、消防、环保、园林等部门立即赶赴现场。</p><p><br/></p><p>封闭道路的同时，环保执法人员用棉被将罐口阀门封堵，交警部门调来2辆大吨位吊车，将事故车辆吊起。此后，车辆被拖运至附近安全空地。</p><p><br/></p><p>在罐车安置地，记者看到车头已经严重变形，左侧损毁较为严重。此外，事故周边</p><p><br/></p>', 'null', '', null, '0', '0', '1403772019', '1403772029');
INSERT INTO `9f_content` VALUES ('21', '37', '0,12,37,', '开封市十四届人大常委会第二次会议召开', ';', null, '', 'uploads/image/20140626/1403780219.jpg', '', '', '', '', '', 'admin', '10', '<p>6月25日，市十四届人大常委会第二次会议召开。市人大常委会主任阎红心主持第一次全体会议，副主任宗家邦、曹法英、于吉良、张志超、高继海、王文娟、高宏勋出席会议。副市长张松文、市中级人民法院院长谷昌豪、市人民检察院检察长杨中立、市政府秘书长贺全营等列席会议。</p><p><br/></p><p>　　第一次全体会议听取了市政府关于我市黄河防汛工作情况的汇报，听取了市政府关于我市民族宗教工作情况的汇报，听取了市中级人民法院关于加强基层建设促进公正司法工作情况的汇报，听取了市人民检察院关于加强基层建设促进公正执法工作情况的汇报，听取了人事提请报告。当日，会议进行了分组审议。</p><p><br/></p><p>　　又讯6月25日上午，市十四届人大常委会第二次会议第一次全体会议结束后，市人大常委会开展集体学习，聆听省社科院教授张新斌的辅导讲座。市人大常委会主任阎红心，副主任宗家邦、曹法英、于吉良、张志超、高继海、王文娟、高宏勋参加学习。</p><p><br/></p><p>　　辅导讲座中，张新斌围绕客家文化的起源、特征，</p><p><br/></p>', 'null', '', null, '0', '0', '1403772055', '1403772055');
INSERT INTO `9f_content` VALUES ('22', '42', '0,13,38,42,', '市行政权力清单已全部公开发布', ';', 'h', '', 'uploads/image/20140626/1403782280.jpg', '', '', '', '', '', 'admin', '3', '<p>羊城晚报讯 记者张林、通讯员穗纪宣报道：昨日，广州市委常委、市纪委书记王晓玲到市政务中心开展规范行政权力公开运行工作专题调研。据了解，截至今年4月，广州市已经完成了全部市本级行政权力清单共4972项内容的公开发布。其中，行政审批权386项、行政处罚权3138项、行政强制权123项、行政检查权310项、行政征收权76项、行政给付权49项、行政裁决权9项、其他行政权力881项。</p><p><br/></p>', 'null', '', null, '0', '0', '1403772789', '1403772796');
INSERT INTO `9f_content` VALUES ('23', '42', '0,13,38,42,', '宝山枪击案主犯之子今受审 被控故意杀人罪', ';', 'h', '', 'uploads/image/20140626/1403778609.jpg', '', '', '', '', '', 'admin', '3', '<p>【新民网·独家报道】6月26日上午9时30分，上海二中院公开开庭审理了被告人何鹤峰故意杀人案。本案系被告人范杰明故意杀人、抢劫、抢劫枪支、非法买卖枪支、弹药、非法持有枪支、弹药案（6·22特大杀人抢劫案）的关联案件。</p><p><br/></p><p>涉案人范杰明为报复被害人张云峰等人，伙同被告人何鹤峰（系范杰明之子）于2013年6月22日15时许，翻越围墙进入在本市宝山区月罗路581号上海广裕精细化工有限公司。范杰明指使何鹤峰躲藏在该公司五金仓库内，并诱使张云峰进入该仓库后，范杰明用事先准备的硫酸喷射张云峰的头、面部，继而与何鹤峰先后使用铁管共同猛击张的头、面部，致被害人张云峰颅脑损伤而死亡。嗣后，被告人何鹤峰与范杰明共同清理现场血迹、遮盖张云峰的尸体后，先后逃离现场，公诉机关认为被告人何鹤峰的行为已构成故意杀人罪。</p><p><br/></p><p>庭审中，被告人何鹤峰对被指控犯罪事实供认不讳，并辩解其虽然实施了犯罪，但只是按范杰明的要求去教训一伙人，并没有想要杀死张云峰。</p><p><br/></p>', 'null', '', null, '0', '0', '1403772840', '1403772906');
INSERT INTO `9f_content` VALUES ('24', '44', '0,13,39,44,', '从五大热词看中国经济之变', ';', 'h', '', 'uploads/image/20140626/1403779429.jpg', '', '', '', '', '', 'admin', '3', '<p>新华网北京６月２５日电（记者江国成、王希）稳增长、新型城镇化、简政放权、定向降准、打破“玻璃门”……热词迭出，折射出今年以来我国全面深化改革的一系列重要举措。中央政府从当前我国经济发展的阶段性特征出发，适应新常态，统筹稳增长、促改革、调结构、惠民生、防风险，经济发展和经济体制改革取得新突破，出现了诸多新亮点。</p><p>&nbsp; &nbsp; 稳增长　创造良好发展环境</p><p>&nbsp; &nbsp; 国家统计局发布的今年前５个月数据显示，我国经济增速、物价和就业等主要指标处于合理区间。国务院发展研究中心宏观经济部研究员张立群认为，从５月份数据来看，我国经济运行总体平稳，出现企稳向好的积极迹象。</p><p>&nbsp; &nbsp; 今年以来，国内外形势异常复杂，宏观经济面临着较大的下行压力，风险和挑战不容忽视。</p><p>&nbsp; &nbsp; “中国经济正在进行艰难的转型升级，期间要确保增速不滑出底线。要采取必</p><p><br/></p>', 'null', '', null, '0', '0', '1403772869', '1403772910');
INSERT INTO `9f_content` VALUES ('25', '49', '0,13,41,49,', '北京12只防爆犬投入到地铁安检中 ', ';', 'h', '', 'uploads/image/20140626/1403781958.jpg', '', '', '', '', '', 'admin', '3', '<p>记者从公交总队获悉，首都反恐又添“新成员”：12只接受“轨道交通警犬搜索特定气味训练”的防爆犬投入到地铁安检中。</p><p><br/></p><p>　　昨天下午，在公交总队警犬工作大队基地内，警犬们正在接受各项训练。现场模拟了地铁环境，10余名助驯员扮成乘客陆续“进站”，隔着护栏，一只毛皮油亮的比利时犬在一名驯导员的牵引下，注视着眼前经过的乘客。突然，这条犬狂吠起来，并试图钻过护栏冲向一名男乘客。驯导员立即将该乘客拦下，并在其行李中发现一条沾有少量汽油的毛巾。</p><p><br/></p><p>　　警犬大队大队长陈宝云告诉记者：“在流动的人群中，警犬可迅速找到携带违禁汽油进入地铁的嫌疑人。”所谓搜油，就是警犬对汽油等挥发性气味强、有燃烧危害的液体快速嗅查，这种由警犬快速筛查的工作方式，可有效加快进站安检速度。</p><p><br/></p>', 'null', '', null, '0', '0', '1403772887', '1403772899');
INSERT INTO `9f_content` VALUES ('26', '15', '0,15,', '在公交总队警犬工作大队基地内', ';', null, '', '', '', '', '', '', '', 'admin', '3', '', '{\"down\":\"uploads\\/soft\\/20140626\\/1403773734.zip\"}', '', null, '0', '0', '1403773585', '1403773585');

-- ----------------------------
-- Table structure for `9f_copyfrom`
-- ----------------------------
DROP TABLE IF EXISTS `9f_copyfrom`;
CREATE TABLE `9f_copyfrom` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `sitename` varchar(30) NOT NULL,
  `siteurl` varchar(100) default NULL,
  `orderid` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_copyfrom
-- ----------------------------
INSERT INTO `9f_copyfrom` VALUES ('2', '本站', 'www.baidu.com', '0');
INSERT INTO `9f_copyfrom` VALUES ('8', '', null, '0');

-- ----------------------------
-- Table structure for `9f_ip`
-- ----------------------------
DROP TABLE IF EXISTS `9f_ip`;
CREATE TABLE `9f_ip` (
  `id` tinyint(2) NOT NULL auto_increment,
  `content` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_ip
-- ----------------------------
INSERT INTO `9f_ip` VALUES ('2', '');

-- ----------------------------
-- Table structure for `9f_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `9f_jobs`;
CREATE TABLE `9f_jobs` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(60) NOT NULL,
  `num` smallint(5) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `wage` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_arr` text NOT NULL,
  `checkinfo` tinyint(1) NOT NULL default '0',
  `posttime` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `9f_kefu`
-- ----------------------------
DROP TABLE IF EXISTS `9f_kefu`;
CREATE TABLE `9f_kefu` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(30) NOT NULL,
  `account` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `color` char(7) NOT NULL,
  `style` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  `orderid` smallint(5) NOT NULL,
  `checkinfo` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_kefu
-- ----------------------------

-- ----------------------------
-- Table structure for `9f_link`
-- ----------------------------
DROP TABLE IF EXISTS `9f_link`;
CREATE TABLE `9f_link` (
  `id` smallint(5) NOT NULL auto_increment,
  `cid` smallint(5) NOT NULL default '0',
  `title` varchar(60) NOT NULL,
  `url` varchar(252) default NULL,
  `picurl` varchar(255) default NULL,
  `orderid` smallint(5) NOT NULL default '0',
  `checkinfo` tinyint(1) NOT NULL default '0',
  `posttime` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_link
-- ----------------------------

-- ----------------------------
-- Table structure for `9f_link_type`
-- ----------------------------
DROP TABLE IF EXISTS `9f_link_type`;
CREATE TABLE `9f_link_type` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `title` varchar(60) default NULL,
  `orderid` smallint(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_link_type
-- ----------------------------
INSERT INTO `9f_link_type` VALUES ('1', '默认分类', '0');

-- ----------------------------
-- Table structure for `9f_member`
-- ----------------------------
DROP TABLE IF EXISTS `9f_member`;
CREATE TABLE `9f_member` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `group_id` smallint(5) NOT NULL default '0',
  `username` varchar(60) NOT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `tel` varchar(60) NOT NULL,
  `phone` char(11) NOT NULL,
  `realname` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `qq` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `regtime` int(10) NOT NULL,
  `regip` char(16) NOT NULL,
  `logintime` int(10) NOT NULL,
  `loginip` char(16) NOT NULL,
  `isauth` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_member
-- ----------------------------
INSERT INTO `9f_member` VALUES ('1', '1', 'demo', '22dbd0ba016fdfb7f2688c27518469694e357e47', '123@123.com', '123123', '121123123qq', '测试', '13123123', '', '', '1402372382', '127.0.0.1', '1402471697', '127.0.0.1', '1');
INSERT INTO `9f_member` VALUES ('2', '1', 'asdfasdf', '22dbd0ba016fdfb7f2688c27518469694e357e47', '', '', '', '', '', '', '', '1402456168', '127.0.0.1', '1402456215', '127.0.0.1', '1');
INSERT INTO `9f_member` VALUES ('3', '1', 'qwerqwer', '22dbd0ba016fdfb7f2688c27518469694e357e47', '123@123.com', '123123', '123123', '123123', '123', '', '', '1402456233', '127.0.0.1', '1402456422', '127.0.0.1', '1');
INSERT INTO `9f_member` VALUES ('4', '1', 'dfgdfgh', '22dbd0ba016fdfb7f2688c27518469694e357e47', '123@123.com', '123', '123', '', '', '123213', '213213', '1402490163', '127.0.0.1', '0', '', '1');
INSERT INTO `9f_member` VALUES ('5', '1', 'qwerqwera', '22dbd0ba016fdfb7f2688c27518469694e357e47', '123@123213.comaf', '1231asdf', '', '', '', '2341234', '112', '1402490638', '127.0.0.1', '0', '', '1');
INSERT INTO `9f_member` VALUES ('6', '1', 'demo123', '62b153d4012571371b54bab522f2f4983e324abf', '', '', '', '', '', '', '', '1403317803', '127.0.0.1', '1403334947', '127.0.0.1', '1');

-- ----------------------------
-- Table structure for `9f_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `9f_member_group`;
CREATE TABLE `9f_member_group` (
  `id` smallint(5) NOT NULL auto_increment,
  `title` varchar(60) NOT NULL,
  `point` smallint(6) NOT NULL,
  `orderid` smallint(5) NOT NULL,
  `checkinfo` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_member_group
-- ----------------------------
INSERT INTO `9f_member_group` VALUES ('1', '普通会员', '0', '0', '0');

-- ----------------------------
-- Table structure for `9f_message`
-- ----------------------------
DROP TABLE IF EXISTS `9f_message`;
CREATE TABLE `9f_message` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `username` varchar(60) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `content` text,
  `content_arr` text NOT NULL,
  `re_content` text NOT NULL,
  `re_posttime` int(10) NOT NULL,
  `isshow` tinyint(4) NOT NULL default '0',
  `checkinfo` tinyint(1) NOT NULL default '0',
  `posttime` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_message
-- ----------------------------
INSERT INTO `9f_message` VALUES ('3', null, '姜子牙', '075533533502', '1583145788@qq.coma', '内容内容内容内容内容<h2>内容内容内容内容内容</h2>', '', '', '0', '0', '0', '1399622067');
INSERT INTO `9f_message` VALUES ('4', null, '123', '123123', '123', '123123', '', '', '0', '0', '0', '1402475505');

-- ----------------------------
-- Table structure for `9f_mjobs`
-- ----------------------------
DROP TABLE IF EXISTS `9f_mjobs`;
CREATE TABLE `9f_mjobs` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `pid` smallint(5) NOT NULL,
  `username` varchar(60) NOT NULL,
  `sex` char(1) NOT NULL,
  `contact` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `posttime` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_mjobs
-- ----------------------------

-- ----------------------------
-- Table structure for `9f_webconfig`
-- ----------------------------
DROP TABLE IF EXISTS `9f_webconfig`;
CREATE TABLE `9f_webconfig` (
  `id` smallint(5) NOT NULL auto_increment,
  `varname` varchar(50) NOT NULL,
  `varinfo` varchar(80) NOT NULL,
  `vargroup` tinyint(2) NOT NULL,
  `vartype` char(10) NOT NULL,
  `varvalue` text NOT NULL,
  `orderid` smallint(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of 9f_webconfig
-- ----------------------------
INSERT INTO `9f_webconfig` VALUES ('2', 'webname', '网站名称', '1', 'string', '富鼎能源有限公司', '0');
INSERT INTO `9f_webconfig` VALUES ('3', 'weburl', '网站地址', '1', 'string', 'localhost', '0');
INSERT INTO `9f_webconfig` VALUES ('4', 'webpath', '网站目录', '1', 'string', '', '0');
INSERT INTO `9f_webconfig` VALUES ('5', 'keyword', '关键字设置', '1', 'string', '富鼎能源有限公司', '0');
INSERT INTO `9f_webconfig` VALUES ('6', 'description', '网站描述', '1', 'bstring', '富鼎能源有限公司', '0');
INSERT INTO `9f_webconfig` VALUES ('7', 'copyright', '版权信息', '1', 'bstring', '', '0');
INSERT INTO `9f_webconfig` VALUES ('8', 'webswitch', '启用站点', '1', 'bool', 'Y', '0');
INSERT INTO `9f_webconfig` VALUES ('9', 'switchshow', '关闭说明', '1', 'bstring', '升级中', '0');
INSERT INTO `9f_webconfig` VALUES ('14', 'upload_img_type', '上传图片类型', '2', 'string', 'gif|png|jpg|bmp', '0');
INSERT INTO `9f_webconfig` VALUES ('15', 'upload_soft_type', '上传软件类型', '2', 'string', 'zip|gz|rar|iso|doc|docx|xls|xlsx|ppt|wps|txt', '0');
INSERT INTO `9f_webconfig` VALUES ('16', 'upload_media_type', '上传媒体类型', '2', 'string', 'swf|flv|mpg|mp3|rm|rmvb|wmv|wma|wav', '0');
INSERT INTO `9f_webconfig` VALUES ('17', 'max_file_size', '上传文件大小', '2', 'string', '2097152', '0');
INSERT INTO `9f_webconfig` VALUES ('18', 'imgresize', '自动缩略图方式 <br/> (是\"裁切\",否\"填充\")', '2', 'bool', 'Y', '0');
INSERT INTO `9f_webconfig` VALUES ('19', 'pagenum', '每页显示记录数', '3', 'number', '10', '0');
INSERT INTO `9f_webconfig` VALUES ('20', 'mb_open', '开启会员功能', '4', 'bool', 'Y', '0');
INSERT INTO `9f_webconfig` VALUES ('21', 'mb_disable', '禁用的用户名', '4', 'string', 'admin,admin888', '0');
INSERT INTO `9f_webconfig` VALUES ('22', 'mb_allowreg', '允许新会员注册', '4', 'bool', 'Y', '0');
INSERT INTO `9f_webconfig` VALUES ('24', 'feedbackcheck', '评论及留言(是/否)需审核', '5', 'bool', 'Y', '0');
INSERT INTO `9f_webconfig` VALUES ('25', 'replacestr', '替换词语（词语会被替换成***）', '5', 'string', '', '0');
INSERT INTO `9f_webconfig` VALUES ('26', 'feedback_time', '两次评论至少间隔时间(秒钟)', '5', 'number', '', '0');
INSERT INTO `9f_webconfig` VALUES ('35', 'count_code', '统计代码', '1', 'bstring', '', '0');
INSERT INTO `9f_webconfig` VALUES ('36', 'runmode', '运行模式', '1', 'number', '1', '13');
INSERT INTO `9f_webconfig` VALUES ('37', 'beianhao', '备案号', '1', 'string', '', '0');
INSERT INTO `9f_webconfig` VALUES ('47', 'mobile', '手机号码', '6', 'string', '15814083660', '0');
INSERT INTO `9f_webconfig` VALUES ('46', 'tel', '联系电话', '6', 'string', '86-0755-29580912', '0');
INSERT INTO `9f_webconfig` VALUES ('42', 'no_category_id', '不可删除的栏目ID', '3', 'string', '', '0');
INSERT INTO `9f_webconfig` VALUES ('43', 'webname_en', '网站名称(英文版)', '1', 'string', 'Shenzhen Fuding New Energy Co., Ltd.', '0');
INSERT INTO `9f_webconfig` VALUES ('44', 'keyword_en', '关键字设置(英文版)', '1', 'string', 'Shenzhen Fuding New Energy Co., Ltd.', '0');
INSERT INTO `9f_webconfig` VALUES ('45', 'description_en', '网站描述(英文版)', '1', 'bstring', 'Shenzhen Fuding New Energy Co., Ltd.', '0');
INSERT INTO `9f_webconfig` VALUES ('48', 'fax', '联系传真', '6', 'string', '86-0755-29580631', '0');
INSERT INTO `9f_webconfig` VALUES ('49', 'facaddress', '工厂地址', '6', 'string', '江苏省徐州市铜山经济开发区嵩山路220号华聚工业园', '0');
INSERT INTO `9f_webconfig` VALUES ('50', 'comaddress', '公司地址', '6', 'string', '广东深圳龙华新区大浪街道高峰社区亿康商务大厦11层', '0');
INSERT INTO `9f_webconfig` VALUES ('51', 'facaddress_en', '工厂地址(英文版)', '6', 'string', 'Xuzhou city, jiangsu province tongshan economic development zone industrial park of songshan road 220 huaju', '0');
INSERT INTO `9f_webconfig` VALUES ('52', 'comaddress_en', '公司地址(英文版)', '6', 'string', '1988, Yikang Business Building, Gaofeng Community, Dalang Street, Longhua New Dist., Shenzhen, Guangdong, China (Mainland)', '0');
