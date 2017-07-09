/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : demo

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-07-09 19:30:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admintion`
-- ----------------------------
DROP TABLE IF EXISTS `admintion`;
CREATE TABLE `admintion` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admintion
-- ----------------------------
INSERT INTO `admintion` VALUES ('1', '管理员', '123');

-- ----------------------------
-- Table structure for `cart`
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int(20) NOT NULL AUTO_INCREMENT,
  `img` varchar(32) DEFAULT NULL,
  `coffname` varchar(32) DEFAULT NULL,
  `shuliang` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `coff_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=218 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES ('209', 'img/natie.jpg', '拿铁咖啡', '4', '50', '5', '10');
INSERT INTO `cart` VALUES ('212', 'img/weiyena.jpg', '维也纳咖啡', '1', '38', '10', '10');
INSERT INTO `cart` VALUES ('216', 'img/moka.jpg', '摩卡咖啡', '3', '30', '8', '8');
INSERT INTO `cart` VALUES ('217', 'img/natie.jpg', '拿铁咖啡', '1', '50', '5', '8');
INSERT INTO `cart` VALUES ('215', 'img/weiyena.jpg', '维也纳咖啡', '1', '38', '10', '8');

-- ----------------------------
-- Table structure for `coffee`
-- ----------------------------
DROP TABLE IF EXISTS `coffee`;
CREATE TABLE `coffee` (
  `coff_id` int(20) NOT NULL AUTO_INCREMENT,
  `coffname` varchar(30) DEFAULT NULL,
  `produce` varchar(150) NOT NULL,
  `price` int(20) NOT NULL,
  `img` varchar(50) NOT NULL,
  `active` varchar(50) DEFAULT NULL,
  `gongxiao` varchar(150) DEFAULT NULL,
  `shiyong` varchar(150) DEFAULT NULL,
  `method` varchar(150) DEFAULT NULL,
  `englishname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`coff_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coffee
-- ----------------------------
INSERT INTO `coffee` VALUES ('1', '浓缩咖啡', '\"\"\"\"属于意式咖啡，就是我们平常用咖啡直接冲出来的那种，味道浓郁，入口微苦，咽后留香。适合上班族。\"\"\"\"', '30', 'img/nongsuo.jpg', '最后一天淘抢购，618大促错过再等一整年', '咖啡对皮肤有益处。咖啡可以促进代谢机能，活络消化器官，对便秘有很大功效。使用咖啡粉洗澡是一种温热疗法，有减肥的作用。咖啡有解酒的功能。酒后喝咖啡，将使由酒精转变而来的乙醛快速氧化，分解成水和二氧化碳而排出体外', '意大利人起床第一件事就是煮上一杯咖啡，不分男女几乎从早喝到晚', '完美的浓缩咖啡不需添加任何附加物，而可直接饮用。加入牛奶时，还能保持轮廓清晰，不易消失。饮用后，令人愉悦的香味，能在口腔内保持几分钟。这里我们讨论影响浓缩咖啡口味的几个因素，并说明如何最大限度发挥浓缩咖啡的潜质。如果忽视任何一个因素，浓缩咖啡就不可能尽善尽美。', 'Espresso');
INSERT INTO `coffee` VALUES ('2', '马琪雅朵', '\"马琪雅朵咖啡在意大利浓缩咖啡中不加鲜奶油、牛奶，只加上两大勺绵密细软的奶泡就是一杯马琪雅朵。不像康宝朵因为上面有一朵淡淡的奶泡，喝的时候不要用咖啡勺搅拌，就算要加糖也最好是均匀地撒在奶泡的表面一层，找一个角度直接喝，让咖啡进了口里还能保持层次感。\"', '100', 'img/maqi.jpg', '最后一天淘抢购，618大促错过再等一整年', '促进代谢机能，解酒，消除疲劳，防止放射线伤害，抗氧化，开胃促食', '最受年轻人欢迎', '将咖啡粉经过9个大气压与摄氏90度的高温蒸气，在20秒的短时间内急速萃取30毫升的浓烈咖啡液体，上面带着浓浓的咖啡油用打泡机将雀巢纯牛奶打出高高的奶泡将咖啡液体倒入咖啡杯，加入奶泡，一杯正宗的玛琪雅朵就完成了。简单却味道好极了', 'Macchiato');
INSERT INTO `coffee` VALUES ('4', '白咖啡', '\"\"\"\"\"\"\"\"\"是马来西亚的特产，白咖啡的颜色并不是白色，但是比普通咖啡更清淡柔和\"\"\"\"\"\"\"\"', '120', 'img/baikafei.jpg', '最后一天淘抢购，618大促错过再等一整年', '白咖啡含有游离脂肪酸、咖啡因、丹宁酸等营养成分，烟碱内含维他命B，而且烘焙过的咖啡豆比生咖啡豆含量更多。\r\n白咖啡能促进代谢的机能，活络消化器官，改善皮肤粗糙。此外，使用咖啡粉洗澡是一种温热疗法，使全身发热流汗而达到减肥的效果。\r\n白咖啡会使肝或肾活络起来，将酒精转变而来的乙醛快速氧化，分解成水和二', '适宜于喜欢喝咖啡的任何人士。\r\n尤其适于以下人群：\r\n疾病者；肝功能不良者。肥胖人士。', '白咖啡在马来西亚市场上多数为40克的，也有少数为 20克 和 30克， 一般来讲，40克的白咖啡，水量为\r\n白咖啡杯\r\n白咖啡杯\r\n180-200毫升，30克水量为150毫升，20克水量为100毫升。冲泡水温应当保持在85~90摄氏度间，冲泡后即可饮用。同时也可加冰、热饮或冰镇。白咖啡冰冻或冷却后口', 'white coffee');
INSERT INTO `coffee` VALUES ('5', '拿铁咖啡', '\"浓缩咖啡与牛奶的经典混合。咖啡在底层，牛奶在咖啡上面，最上面是一层奶泡。也可以放一些焦糖就成了焦糖拿\"', '50', 'img/natie.jpg', '最后一天淘抢购，618大促错过再等一整年', '拿铁咖啡中的咖啡因能刺激神经，刺激胃液的分泌，促进肠胃激素和蠕动激素，提高人的食欲。拿铁咖啡含有的咖啡因能提高人体多余水份的排出，促进代谢，改善腹胀水肿，达到减肥健身的效果。', '拿铁咖啡适合早上饮用，可以消除疲劳，提高神醒脑，激发一天的活力。', '需要一小杯Espresso和一杯牛奶(150～200毫升)，拿铁咖啡中牛奶多而咖啡少，这与Cappuccino有很大不同。拿铁咖啡做法极其简单，就是在刚刚做好的意大利浓缩咖啡中倒入接近沸腾的牛奶。事实上，加入多少牛奶没有一定之规，可依个人口味自由调配。', 'CafeLatte');
INSERT INTO `coffee` VALUES ('6', '康宝蓝', '\"意大利咖啡品种之一，与玛琪雅朵齐名，由浓缩咖啡喝鲜奶油混合而成，咖啡在下面，鲜奶油在咖啡上面。\"', '40', 'img/kangbaolan.jpg', '最后一天淘抢购，618大促错过再等一整年', '提神醒脑、强筋利骨、开胃主食、消脂消积、利窍除湿、活血化瘀、熄风止痉、喜悦颜色、肺定喘', '一般人群均可饮', '在意大利Espresso特浓咖啡中加入适量的鲜奶油，即轻松地完成一杯康宝蓝。嫩白的鲜奶油轻轻漂浮在深沉的咖啡上，宛若一朵出淤泥而不染的白莲花，令人不忍一口喝下。\r\n另外，在意大利Espresso特浓咖啡中，若不加鲜奶油、牛奶，只加上两大勺绵密细软的奶泡就是一杯马琪雅朵，不象康宝蓝，要想享受马琪雅朵的', 'Espreesso Con Panna');
INSERT INTO `coffee` VALUES ('7', '卡布奇诺', '以等量的浓缩咖啡和蒸汽泡沫牛奶混合的意大利咖啡。咖啡的颜色就像卡布奇诺教会的修士在深褐色的外衣上覆上', '37', 'img/kabuqinuo.jpg', '最后一天淘抢购，618大促错过再等一整年', ' 在意大利特浓咖啡的基础上，加一层厚厚的起沫的牛奶，就成了卡布奇诺。特浓咖啡的质量在牛奶和泡沫下会看不太出来，但它仍然是决定卡布奇诺口味的重要因素。\r\n  把经过部分脱脂的牛奶倒入一只壶中，然后用起沫器让牛奶起沫、冲气，并且让牛奶不经过燃烧就可以象掼奶油一样均匀。\r\n  盛卡布奇诺的咖啡杯应该是温热', '清晨起床后喝一杯为的是醒脑；白天工作时轻呷一口可提神，此时咖啡可稍浓；而餐后或晚间饮咖啡以略轻淡为宜', '咖啡机取出滤网，不加咖啡粉，只加水，打开开关，通过开水的循环给机器预热\r\n  2、放入滤网和咖啡粉，水槽加水，打开开关，流出少量咖啡后关掉开关，让咖啡粉蒸一下，20秒后再打开开关煮好咖啡\r\n  3、牛奶煮到微沸，倒一杯咖啡添加的牛奶量，用打沫器打到原来体积的约1.5倍，打好后杯子轻震几下，震出大气泡', 'Cappuccino');
INSERT INTO `coffee` VALUES ('8', '摩卡咖啡', '是一种最古老的咖啡，是由意大利浓缩咖啡、巧克力酱、鲜奶油和牛奶混合而成，摩卡得名于有名的摩卡港。其独', '30', 'img/moka.jpg', '最后一天淘抢购，618大促错过再等一整年', '微甜带柔和的果酸，甘性特佳有其特有的圆熟味其独特之甘，酸，苦味极为优雅。摩卡咖啡作为世界上一种最古老的咖啡，渊源久远的摩卡咖啡早已成了咖啡的代名词，它那独特的巧克力余韵令人回味再三。摩卡热咖啡的酸、香、醇，融入温热鲜奶与巧克力糖浆的甜美', '很适合女性及害怕重咖啡因的人喝。', '淡奶油打发之前需放入冰箱冷藏，咖啡杯中挤入适量巧克力酱\r\n  2、咖啡加热水调匀后加入到咖啡杯中，用搅拌棒搅拌均匀\r\n  3、淡奶油加入总量的20%白糖打发\r\n  4、裱花带装上菊花花嘴，装入打法的淡奶油，按照螺旋的方向挤花在咖啡上，筛上可可粉即可', 'CafeMocha');
INSERT INTO `coffee` VALUES ('9', '焦糖玛琪朵', '焦糖玛奇朵（英文：Caramel Macchiato）是在香浓热牛奶上加入浓缩咖啡、香草，再淋上纯正焦糖而制成的饮品，融合三种不同口味。Macchiato意大利文，意思是“烙印”和“印染”，中文音译“玛奇朵”。“Caramel”意思是焦糖。焦糖玛琪朵，寓意“甜蜜的印记”。', '35', 'img/jiaotang.jpg', '最后一天淘抢购，618大促错过再等一整年', '1.和胃调中，健脾利湿，宽肠通便，胃火牙痛、脾虚纳少；\r\n2.高血压、高血脂，关节疼痛；\r\n3.降糖降脂，减肥，美容，抗衰老，神疲乏力；\r\n4.解毒消炎，活血消肿，益气强身，皮肤湿疹；', '一般人群均可饮用焦糖玛奇朵', '1.espresso一份倒入杯底，加半盎司糖浆搅匀。\r\n2.打得绵密的热奶泡以汤匙捞数匙铺满杯子。\r\n3.焦糖装入挤瓶内,在奶泡上画花样。', 'Caramel Macchiato');
INSERT INTO `coffee` VALUES ('10', '维也纳咖啡', '维也纳咖啡（Viennese coffee）乃奥地利最著名的咖啡，是一个名叫爱因·舒伯纳的马车夫发明的，也许是由于这个原因，今天，人们偶尔也会称维也纳咖啡为“单头马车”。以浓浓的鲜奶油和巧克力的甜美风味迷倒全球人士。雪白的鲜奶油上，洒落五色缤纷七彩米，扮相非常漂亮；隔着甜甜的巧克力糖浆、冰凉的鲜奶油', '38', 'img/weiyena.jpg', '最后一天淘抢购，618大促错过再等一整年', '维也纳咖啡（Viennese coffee）乃奥地利最著名的咖啡，是一个名叫爱因·舒伯纳的马车夫发明的，也许是由于这个原因，今天，人们偶尔也会称维也纳咖啡为“单头马车”。以浓浓的鲜奶油和巧克力的甜美风味迷倒全球人士。雪白的鲜奶油上，洒落五色缤纷七彩米，扮相非常漂亮；隔着甜甜的巧克力糖浆、冰凉的鲜奶油', '慵懒的周末或是闲适的午后最好的伴侣', '1、将冲调好的咖啡倒于杯中，约8分满；\r\n2、在咖啡上面以旋转方式加入鲜奶油；\r\n3、淋上适量巧克力糖浆；\r\n4、最后洒上七彩米，附糖包上桌。 巧克力糖浆与七彩米勿多加否则会太甜。', 'Vienna Coffee');
INSERT INTO `coffee` VALUES ('11', '原味', '\"味道纯真。\"', '30', 'img/yuanwei.jpg', '最后一天淘抢购，618大促错过再等一整年', '咖啡可降低帕金森氏症的发生率。 腹泻时喝咖啡，咖啡的利尿作用，会促使体内水分的排出而加重腹泻。 咖啡会刺激胆囊收缩，有胆结石倾向的人严禁喝咖啡。 咖啡喝太多，孕妇容易导致自然流产。 咖啡里的咖啡因，可以抑制哮喘。当哮喘发作，紧急时可以给患者喝两杯浓咖啡，因咖啡有支气管药物的功效。常喝咖啡者较少气喘。', '一般人群均可', '准备一罐蜂蜜，蜂蜜是一种单糖，易于人体吸收。可以在原味咖啡上加点蜂蜜。味道甜美。准备一罐葡萄糖，葡萄糖是直接补充能量的物质。同样可以在原味咖啡上添加葡糖糖。增加甜味的同时，快速补充体力。咖啡伴侣，更具自己的喜欢添加自己的使用量，保持味道', 'black coffee');

-- ----------------------------
-- Table structure for `dingdan`
-- ----------------------------
DROP TABLE IF EXISTS `dingdan`;
CREATE TABLE `dingdan` (
  `dingdan_id` int(20) NOT NULL,
  `dingdan_name` varchar(30) NOT NULL,
  `dingdan_img` varchar(30) NOT NULL,
  `dingdan_shuliang` int(30) NOT NULL,
  `dingdan_price` int(30) NOT NULL,
  `zhuangtai` varchar(50) DEFAULT NULL,
  `user_id` int(20) NOT NULL,
  `pingjia` varchar(70) NOT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `dizhi_id` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dingdan
-- ----------------------------
INSERT INTO `dingdan` VALUES ('8', '摩卡咖啡', 'img/moka.jpg', '7', '30', '交易完成', '8', '价格挺便宜的', '37', '25');
INSERT INTO `dingdan` VALUES ('4', '白咖啡', 'img/baikafei.jpg', '12', '120', '交易完成', '8', '不太喜欢喝', '36', null);
INSERT INTO `dingdan` VALUES ('9', '焦糖玛琪朵', 'img/jiaotang.jpg', '1', '35', '交易完成', '10', '好香的咖啡，果然没失望，价格实惠又好喝，给店家一个赞。', '13', null);
INSERT INTO `dingdan` VALUES ('5', '拿铁咖啡', 'img/natie.jpg', '1', '35', '交易完成', '1', '看到图片上的样子，就让人有想买的冲动。哈哈', '3', null);
INSERT INTO `dingdan` VALUES ('4', '白咖啡', 'img/baikafei.jpg', '2', '120', '交易完成', '1', '', '38', '25');
INSERT INTO `dingdan` VALUES ('6', '康宝蓝', 'img/kangbaolan.jpg', '1', '40', '交易完成', '1', '很喜欢这个味道，下次还要继续买。', '5', null);
INSERT INTO `dingdan` VALUES ('1', '浓缩咖啡', 'img/nongsuo.jpg', '1', '15', '交易完成', '10', '非常棒的咖啡，家人和朋友都很喜欢，口感也不错。', '15', null);
INSERT INTO `dingdan` VALUES ('7', '卡布奇诺', 'img/kabuqinuo.jpg', '5', '37', '交易完成', '8', '谢谢卖家送的小礼物，非常喜欢。', '34', null);
INSERT INTO `dingdan` VALUES ('10', '维也纳咖啡', 'img/weiyena.jpg', '1', '38', '交易完成', '14', '看起来挺好的，特别支持，希望越来越好', '16', null);
INSERT INTO `dingdan` VALUES ('1', '浓缩咖啡', 'img/nongsuo.jpg', '1', '15', '交易完成', '14', '觉得挺适合自己的口味', '17', null);
INSERT INTO `dingdan` VALUES ('4', '白咖啡', 'img/baikafei.jpg', '3', '100', '交易完成', '10', '味道不错，送的杯子颜色也很喜欢。', '18', null);
INSERT INTO `dingdan` VALUES ('5', '拿铁咖啡', 'img/natie.jpg', '3', '50', '交易完成', '8', '很喜欢，还会再买的', '35', null);
INSERT INTO `dingdan` VALUES ('5', '拿铁咖啡', 'img/natie.jpg', '1', '50', '交易完成', '2', '跟图片上的很大的差别。不是多么喜欢。', '39', '24');
INSERT INTO `dingdan` VALUES ('9', '焦糖玛琪朵', 'img/jiaotang.jpg', '1', '35', '交易完成', '2', '快递刚回来，包装还不错', '40', '24');
INSERT INTO `dingdan` VALUES ('1', '浓缩咖啡', 'img/nongsuo.jpg', '1', '15', '交易完成', '3', '味道很纯正\r\n', '41', '27');
INSERT INTO `dingdan` VALUES ('7', '卡布奇诺', 'img/kabuqinuo.jpg', '1', '37', '交易完成', '3', '同学们都说味道很不错', '42', '27');
INSERT INTO `dingdan` VALUES ('11', '原味', 'img/yuanwei.jpg', '1', '30', '交易完成', '3', '买了好几次，都很不错', '43', '27');
INSERT INTO `dingdan` VALUES ('10', '维也纳咖啡', 'img/weiyena.jpg', '1', '38', '交易完成', '3', '味道一般', '44', '27');
INSERT INTO `dingdan` VALUES ('8', '摩卡咖啡', 'img/moka.jpg', '1', '30', '交易完成', '3', '快递太慢了，差评', '45', '27');
INSERT INTO `dingdan` VALUES ('7', '卡布奇诺', 'img/kabuqinuo.jpg', '1', '37', '交易完成', '14', '一般般，还凑合，毕竟价格不是很高。', '47', '27');
INSERT INTO `dingdan` VALUES ('11', '原味', 'img/yuanwei.jpg', '1', '30', '交易完成', '14', '感觉味道很正，很喜欢', '48', '24');
INSERT INTO `dingdan` VALUES ('2', '马琪雅朵', 'img/maqi.jpg', '1', '100', '交易完成', '7', '做不出来图片上的那种感觉', '49', '24');
INSERT INTO `dingdan` VALUES ('6', '康宝蓝', 'img/kangbaolan.jpg', '1', '40', '交易完成', '7', '感觉味道不错，包装还可以', '50', '24');
INSERT INTO `dingdan` VALUES ('7', '卡布奇诺', 'img/kabuqinuo.jpg', '1', '37', '交易完成', '7', '卖家服务很好，还送了小礼物，下次还会再来。', '51', '24');
INSERT INTO `dingdan` VALUES ('1', '浓缩咖啡', 'img/nongsuo.jpg', '1', '15', '交易完成', '7', '味道个人不是很喜欢，', '52', '24');
INSERT INTO `dingdan` VALUES ('5', '拿铁咖啡', 'img/natie.jpg', '1', '50', '交易完成', '7', '一如既往的喜欢', '53', '24');
INSERT INTO `dingdan` VALUES ('2', '马琪雅朵', 'img/maqi.jpg', '1', '100', '交易完成', '12', '口感很棒，还送了杯子和杯垫还有勺子，简直贴心！价格好那么实惠。', '54', '25');
INSERT INTO `dingdan` VALUES ('8', '摩卡咖啡', 'img/moka.jpg', '1', '30', '交易完成', '12', '收到很惊喜，包装很精致，还送了很多赠品。', '55', '25');
INSERT INTO `dingdan` VALUES ('10', '维也纳咖啡', 'img/weiyena.jpg', '1', '38', '交易完成', '12', '快递速的很快，味道真的不错', '56', '25');
INSERT INTO `dingdan` VALUES ('11', '原味', 'img/yuanwei.jpg', '1', '30', '交易完成', '12', '没想到分量这么足，还蛮好喝的。', '57', '25');
INSERT INTO `dingdan` VALUES ('6', '康宝蓝', 'img/kangbaolan.jpg', '1', '40', '交易完成', '12', '口感很好，香味浓，包装很精致，送人也拿的出手。', '58', '25');
INSERT INTO `dingdan` VALUES ('7', '卡布奇诺', 'img/kabuqinuo.jpg', '1', '37', '交易完成', '12', '超级大一盒，太便宜了。', '59', '25');
INSERT INTO `dingdan` VALUES ('11', '原味', 'img/yuanwei.jpg', '1', '30', '交易完成', '10', '店家很靠谱，赞赞赞！！！', '60', '24');
INSERT INTO `dingdan` VALUES ('6', '康宝蓝', 'img/kangbaolan.jpg', '1', '40', '交易完成', '10', '真的不错，老板服务态度超好，送了很多赠品', '61', '24');
INSERT INTO `dingdan` VALUES ('7', '卡布奇诺', 'img/kabuqinuo.jpg', '1', '37', '交易完成', '10', '内容远比我想象的好', '62', '24');
INSERT INTO `dingdan` VALUES ('2', '马琪雅朵', 'img/maqi.jpg', '1', '100', '交易完成', '10', '宝贝收到了，咖啡和超市买的一模一样，是正品。', '63', '24');
INSERT INTO `dingdan` VALUES ('1', '浓缩咖啡', 'img/nongsuo.jpg', '1', '15', '交易完成', '13', '咖啡的香味很浓郁，性价比还是不错滴。', '64', '27');
INSERT INTO `dingdan` VALUES ('6', '康宝蓝', 'img/kangbaolan.jpg', '1', '40', '交易完成', '13', '非常棒，跟我之前买的味道一样，但是价格便宜一半', '65', '27');
INSERT INTO `dingdan` VALUES ('8', '摩卡咖啡', 'img/moka.jpg', '1', '30', '交易完成', '13', '咖啡非常好喝，很满意的一次购物。', '66', '27');
INSERT INTO `dingdan` VALUES ('5', '拿铁咖啡', 'img/natie.jpg', '1', '50', '交易完成', '13', '特别适合两包一起泡，味道还能浓一些', '67', '27');
INSERT INTO `dingdan` VALUES ('10', '维也纳咖啡', 'img/weiyena.jpg', '1', '38', '交易完成', '13', '味道醇香，是我喜欢的味道，香味很浓郁。', '68', '27');
INSERT INTO `dingdan` VALUES ('7', '卡布奇诺', 'img/kabuqinuo.jpg', '1', '37', '交易完成', '13', '收到货后满满的惊喜', '69', '27');
INSERT INTO `dingdan` VALUES ('5', '拿铁咖啡', 'img/natie.jpg', '1', '50', '交易完成', '10', '', '71', '25');
INSERT INTO `dingdan` VALUES ('10', '维也纳咖啡', 'img/weiyena.jpg', '2', '38', '交易完成', '8', '', '93', '24');

-- ----------------------------
-- Table structure for `dizhi`
-- ----------------------------
DROP TABLE IF EXISTS `dizhi`;
CREATE TABLE `dizhi` (
  `dizhi_id` int(30) NOT NULL AUTO_INCREMENT,
  `dizhi_user` varchar(30) NOT NULL,
  `dizhi` varchar(80) NOT NULL,
  `telephone` varchar(40) NOT NULL,
  PRIMARY KEY (`dizhi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dizhi
-- ----------------------------
INSERT INTO `dizhi` VALUES ('24', '段娜', '陕西省西安市蓝田县', '17809212760');
INSERT INTO `dizhi` VALUES ('25', '王曦', '陕西省渭南市', '17809212788');
INSERT INTO `dizhi` VALUES ('28', '王肖肖', '陕西省咸阳市', '17809212777');
INSERT INTO `dizhi` VALUES ('27', '韩菲', '陕西蒲城', '17809212791');

-- ----------------------------
-- Table structure for `hot_coffee`
-- ----------------------------
DROP TABLE IF EXISTS `hot_coffee`;
CREATE TABLE `hot_coffee` (
  `coff_id` int(32) NOT NULL AUTO_INCREMENT,
  `coffname` varchar(32) DEFAULT NULL,
  `produce` varchar(32) NOT NULL,
  `price` int(32) DEFAULT NULL,
  `active` varchar(50) DEFAULT NULL,
  `img` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`coff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hot_coffee
-- ----------------------------

-- ----------------------------
-- Table structure for `image`
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `image_id` int(20) NOT NULL,
  `imagename` varchar(20) DEFAULT NULL,
  `image` varchar(20) NOT NULL,
  `code` int(20) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES ('1', '白咖啡', 'img/baikafei1.jpg', '4');
INSERT INTO `image` VALUES ('2', '白咖啡', 'img/baikafei2.jpg', '4');
INSERT INTO `image` VALUES ('3', '白咖啡', 'img/baikafei3.jpg', '4');
INSERT INTO `image` VALUES ('4', '白咖啡', 'img/baikafei4.jpg', '4');
INSERT INTO `image` VALUES ('5', '焦糖玛琪朵', 'img/jiaotang1.jpg', '9');
INSERT INTO `image` VALUES ('6', '焦糖玛琪朵', 'img/jiaotang2.jpg', '9');
INSERT INTO `image` VALUES ('7', '焦糖玛琪朵', 'img/jiaotang3.jpg', '9');
INSERT INTO `image` VALUES ('8', '焦糖玛琪朵', 'img/jiaotang4.jpg', '9');
INSERT INTO `image` VALUES ('9', '浓缩咖啡', 'img/nongsuo1.jpg', '1');
INSERT INTO `image` VALUES ('10', '浓缩咖啡', 'img/nongsuo2.jpg', '1');
INSERT INTO `image` VALUES ('11', '浓缩咖啡', 'img/nongsuo3.jpg', '1');
INSERT INTO `image` VALUES ('12', '浓缩咖啡', 'img/nongsuo4.jpg', '1');
INSERT INTO `image` VALUES ('13', '美式咖啡', 'img/heishi1.jpg', '3');
INSERT INTO `image` VALUES ('14', '美式咖啡', 'img/heishi2.jpg', '3');
INSERT INTO `image` VALUES ('15', '美式咖啡', 'img/heishi3.jpg', '3');
INSERT INTO `image` VALUES ('16', '美式咖啡', 'img/heishi4.jpg', '3');
INSERT INTO `image` VALUES ('17', '拿铁咖啡', 'img/natie1.jpg', '5');
INSERT INTO `image` VALUES ('18', '拿铁咖啡', 'img/natie2.jpg', '5');
INSERT INTO `image` VALUES ('19', '拿铁咖啡', 'img/natie3.jpg', '5');
INSERT INTO `image` VALUES ('20', '拿铁咖啡', 'img/natie4.jpg', '5');
INSERT INTO `image` VALUES ('21', '康宝蓝', 'img/kangbaolan1.jpg', '6');
INSERT INTO `image` VALUES ('22', '康宝蓝', 'img/kangbaolan2.jpg', '6');
INSERT INTO `image` VALUES ('23', '康宝蓝', 'img/kangbaolan3.jpg', '6');
INSERT INTO `image` VALUES ('24', '康宝蓝', 'img/kangbaolan4.jpg', '6');
INSERT INTO `image` VALUES ('25', '卡布奇诺', 'img/kabuqinuo1.jpg', '7');
INSERT INTO `image` VALUES ('26', '卡布奇诺', 'img/kabuqinuo2.jpg', '7');
INSERT INTO `image` VALUES ('27', '卡布奇诺', 'img/kabuqinuo3.jpg', '7');
INSERT INTO `image` VALUES ('28', '卡布奇诺', 'img/kabuqinuo4.jpg', '7');
INSERT INTO `image` VALUES ('29', '马琪雅朵', 'img/maqi1.jpg', '2');
INSERT INTO `image` VALUES ('30', '马琪雅朵', 'img/maqi2.jpg', '2');
INSERT INTO `image` VALUES ('31', '马琪雅朵', 'img/maqi3.jpg', '2');
INSERT INTO `image` VALUES ('32', '马琪雅朵', 'img/maqi4.jpg', '2');
INSERT INTO `image` VALUES ('33', '摩卡咖啡', 'img/moka1.jpg', '8');
INSERT INTO `image` VALUES ('34', '摩卡咖啡', 'img/moka2.jpg', '8');
INSERT INTO `image` VALUES ('35', '摩卡咖啡', 'img/moka3.jpg', '8');
INSERT INTO `image` VALUES ('36', '摩卡咖啡', 'img/moka4.jpg', '8');
INSERT INTO `image` VALUES ('37', '维也纳咖啡', 'img/weiyena1.jpg', '10');
INSERT INTO `image` VALUES ('38', '维也纳咖啡', 'img/weiyena2.jpg', '10');
INSERT INTO `image` VALUES ('39', '维也纳咖啡', 'img/weiyena3.jpg', '10');
INSERT INTO `image` VALUES ('40', '维也纳咖啡', 'img/weiyena4.jpg', '10');
INSERT INTO `image` VALUES ('41', '原味', 'img/yuanwei1.jpg', '11');
INSERT INTO `image` VALUES ('42', '原味', 'img/yuanwei2.jpg', '11');
INSERT INTO `image` VALUES ('43', '原味', 'img/yuanwei3.jpg', '11');
INSERT INTO `image` VALUES ('44', '原味', 'img/yuanwei4.jpg', '11');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '小僵尸', '123', 'uploads/201706/20170630201126.jpg');
INSERT INTO `user` VALUES ('2', '韩菲', '456', 'uploads/201706/20170630201620.jpg');
INSERT INTO `user` VALUES ('3', '小伙伴', '12', 'uploads/201706/20170630201951.jpg');
INSERT INTO `user` VALUES ('7', '段毅娜', '123', 'uploads/201707/20170701112930.jpg');
INSERT INTO `user` VALUES ('8', '王曦', '123', 'uploads/201706/20170630165859.jpg');
INSERT INTO `user` VALUES ('12', '段毅', '123', 'uploads/201707/20170701113546.png');
INSERT INTO `user` VALUES ('10', '段娜', '123', 'uploads/201706/20170626194439.jpg');
INSERT INTO `user` VALUES ('13', '星期日', '123', 'uploads/201707/20170701115413.jpg');
INSERT INTO `user` VALUES ('14', '小红帽', '123', 'uploads/201706/20170626180948.jpg');

-- ----------------------------
-- View structure for `viewcsi`
-- ----------------------------
DROP VIEW IF EXISTS `viewcsi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcsi` AS select `s`.`SSN` AS `SSN`,`s`.`Name` AS `Scientistname`,`p`.`Code` AS `Code`,`p`.`Name` AS `Projectname`,`p`.`Hours` AS `Hours` from ((`scientists` `s` join `projects` `p`) join `assignedto` `a`) where ((`s`.`SSN` = `a`.`Scientist`) and (`p`.`Code` = `a`.`Project`)) ;
