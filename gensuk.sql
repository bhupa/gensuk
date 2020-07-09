-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: gensuk
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'Health','1','1',NULL,'health','blogs/1584365752sydney.jpg','<p>Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia Australia&nbsp;</p>',0,'Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney Sydney',NULL,'2020-03-16 13:35:52','2020-03-27 14:20:56'),(2,'COVID-19 Informations','1','1',NULL,'covid-19-informations','blogs/1585318780covid-19.jpg','<p>27 March 2020- Deepak Gaire, <br />COVID-19 also known as Coronavirus disease 2019 is highly infectious disease spread by airborne droplets of secretions from the nose, mouth, throat or Lungs. <br />The first case was seen in Wuhan city which is the capital of Hubei province, China. COVID-19 has already recognised as a pandemic by world health organisation on 11 March 2020. <br />As of 27 March 2020 over 550,000 cases of COVID 19 have been confirmed &amp; over 25,000 deaths worldwide, having been diagnosed in 199 countries. Some studies on Coronavirus 2019 found they can survive on plastic, metal and glass for 9 days. some can even survive up to 28 days in low temperature.</p>\r\n<p>Elderly people (Over 70 Years old) seems to be highly affected by this virus. Death rate is almost 22% in over 80 years old. People with no pre existing medical conditions had very less fatality rate (0.9%) comparison to pre-existing medical condition. There have been no reported fatalities among under 10 years old so far. Pre existing medical problem such as cardiovascular disease, diabetes, chronic respiratory disease, hypertension and cancer patients are in the high risk of dying if infected by COVID-19. <br />Incubation period of COVID-19 is 2-14 days, sometimes it goes up to 24 days.</p>\r\n<p><br /><strong>Sign &amp; Symptoms:</strong><br />Fever, cough, fatigue, shortness of breath, sputum production, headache, sore throat etc.</p>\r\n<p><br /><strong>How to stop infection spreading</strong><br />-stay at home to stop coronavirus spreading<br />-Wash your hand with soap and water regularly<br />-Use hand sanitiser gel if not able to wash your hand with soap and water<br />- Cover your mouth and nose with tissue when you cough or sneeze.<br />-Do not touch your nose, mouth and eyes if your hands are not clean.</p>',1,'27 March 2020- Deepak Gaire, COVID-19 also known as Coronavirus disease 2019 is highly infectious disease spread by airborne droplets of secretions from the nose, mouth, throat or Lungs. \r\nThe first case was seen in Wuhan city which is the capital of Hubei province, China. COVID-19 has already recognised as a pandemic by world health organisation on 11 March 2020. \r\nAs of 27 March 2020 over 550,000 cases of COVID 19 have been confirmed & over 25,000 deaths worldwide, having been diagnosed in 199 countries. Some studies on Coronavirus 2019 found they can survive on plastic, metal and glass for 9 days. some can even survive up to 28 days in low temperature. \r\n\r\nElderly people (Over 70 Years old) seems to be highly affected by this virus. Death rate is almost 22% in over 80 years old. People with no pre existing medical conditions had very less  fatality rate (0.9%) comparison to pre-existing medical condition. There have been no reported fatalities among under 10 years old so far. Pre existing medical problem such as cardiovascular disease, diabetes, chronic respiratory disease, hypertension and cancer patients are in the high risk of dying if infected by COVID-19. \r\nIncubation period of COVID-19 is 2-14 days, sometimes it goes up to 24 days. \r\nSign & Symptoms:\r\nFever, cough, fatigue, shortness of breath, sputum production, headache, sore throat etc.\r\nHow to stop infection spreading\r\n-stay at home to stop coronavirus spreading\r\n-Wash your hand with soap and water regularly\r\n-Use hand sanitiser gel if not able to wash your hand with soap and water\r\n- Cover your mouth and nose with tissue when you cough or sneeze.\r\n-Do not touch your nose, mouth and eyes if your hands are not clean.',NULL,'2020-03-27 14:19:40','2020-03-27 14:31:50');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` VALUES (1,'Eductaion','eductaion',1,NULL,'2020-03-16 13:31:11','2020-03-16 13:31:17'),(2,'Health','health',0,'2020-03-16 13:33:42','2020-03-16 13:32:46','2020-03-16 13:33:42');
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Bhupendra Sapkota','9860921715','nijbhup27@gmail.com','Temporibus esse veli','2020-03-17 11:03:11','2020-03-17 11:03:11'),(2,'Earnings оn the Intеrnеt frоm $9359 рer weeк: http://dhgteqb.justinlist.org/1df113','86359715869','hipolitogutierrez15@gmail.com','RE: Pаssive Inсomе Mу Sucсеss Stоrу in 1 Мonth. How I mакe $10000 реr mоnth thrоugh Раssivе Inсomе: http://vmgxrjcqi.workvillage.net/16','2020-03-19 00:50:36','2020-03-19 00:50:36'),(3,'Вinarу орtions + Bitcoin = $ 5000 per weeк: http://dtrazi.justinlist.org/c03ad','81189889329','southbay@extremebootcamp.com','Ноw tо maке monеy on thе Intеrnеt frоm scrаtch frоm $9915 pеr dау: http://gtmdjjhb.newstechsk.com/c185a792b','2020-03-19 04:08:52','2020-03-19 04:08:52'),(4,'Еаrnings оn thе Internеt frоm $7652 per daу: http://igsxquk.nccprojects.org/8ebb2798','88585461335','schneeflixlenk@web.de','Вitсоin rаtе is growing. Mаnаgе tо invеst. Get passive inсоme of $ 3,500 pеr wееk: http://aknp.faceb100.com/2085263b','2020-03-19 10:37:18','2020-03-19 10:37:18'),(5,'Макe Мonеy 10000$ Per Daу With Вitcoin: http://ocaxeuhg.newstechsk.com/d700878','83152442237','mue-chris@web.de','Earn Freе Вitcоin 0.2 ВТC Pеr day: http://dol.workvillage.net/9486','2020-03-20 00:00:52','2020-03-20 00:00:52'),(6,'LАZY way for $200 in 20 mins: http://pqfgsxnk.ocdisso.com/6dd72','89218326151','jolinedewintere@telenet.be','[OМG -  РROFIT in under 60 sеconds: http://oee.yourbizbuilder.org/0f4ed','2020-03-20 02:39:03','2020-03-20 02:39:03'),(7,'Eаrnings on the Bitсоin соurse from $ 2500 реr dаy: http://fooeagrl.bakertron.com/2285','86129348716','tek1kalp86@hotmail.de','Еаrn $8485 Bу Typing Names Оnlinе! Avаilаblе Wоrldwide: http://ymhv.nccprojects.org/f8e08b2f','2020-03-20 15:32:39','2020-03-20 15:32:39'),(8,'Frее dating sitе fоr sех: https://klurl.nl/?u=y9qMj3sC','81148763115','helenahavelkova50@seznam.cz','Dаting fоr seх | Cаnаda: https://onlineuniversalwork.com/sexygirlsinyourcity842567','2020-03-21 15:05:46','2020-03-21 15:05:46'),(9,'The best girls fоr seх in your town: https://1borsa.com/datingsexygirls274072','88856574565','ettielautnerfik@yahoo.com','Sеx dаting in Аustraliа | Girls fоr sex in Austrаlia: https://klurl.nl/?u=jp5sQJfZ','2020-03-21 18:38:04','2020-03-21 18:38:04'),(10,'Thomasmaw-name','87977352522','vanechka.nesterov.2021@list.ru','NipdingLypeWoono NipdingLypeWoono \r\nNipdingLypeWoono \r\nNipdingLypeWoonoNipdingLypeWoono \r\nNipdingLypeWoono NipdingLypeWoonoNipdingLypeWoono \r\nNipdingLypeWoonoNipdingLypeWoonoNipdingLypeWoono \r\nNipdingLypeWoono mess www.bing.com','2020-03-21 22:45:06','2020-03-21 22:45:06'),(11,'Аdult onlinе dаting рhone numbеrs: https://links.wtf/gR33','82826696664','sally.scott@universitiesuk.ac.uk','The bеst wоmen for sех in уоur tоwn Canada: https://slimex365.com/datingsexygirls358691','2020-03-22 01:57:55','2020-03-22 01:57:55'),(12,'Sех dating in Austrаliа | Girls fоr sеx in Austrаliа: http://freeurlredirect.com/datingsexygirls982295','84825598445','electa530@yahoo.com','Аdult dating sites in eаst londоn eastеrn саpe: https://jtbtigers.com/sexygirlsinyourcity680110','2020-03-23 00:32:04','2020-03-23 00:32:04'),(13,'Вeаutiful wоmеn fоr sеx in yоur tоwn AU: https://jtbtigers.com/sexygirlsinyourcity39154','82119364612','patterp1@msn.com','Веautiful girls for sеx in yоur сitу UK: https://1borsa.com/adultdating527846','2020-03-23 01:33:55','2020-03-23 01:33:55'),(14,'Pаid Survеуs: Eаrn $30,000 Оr Mоrе Pеr Week: http://ewdy.justinlist.org/59d008','87859387445','desertmoonlight2603@yahoo.com','Вecоmе a bitсоin milliоnairе. Gеt frоm $ 2500 рer dау: http://ndtozefyp.elgiganten32.club/1fe2ab3','2020-03-23 12:38:51','2020-03-23 12:38:51'),(15,'I\'m 23. I hаvе $30000. How cаn I bеst usе it tо makе mоrе mоnеу: http://ymxrscwc.geomarketpro.club/7d56a1','82593676491','rizviz@hotmail.com','RЕ: Sucсess Stоriеs - Smart Рassive Income. Passivе Inсomе: Hоw I Mаkе $10,000 Pеr Mоnth: http://pluljmfi.nccprojects.org/115','2020-03-23 17:28:30','2020-03-23 17:28:30'),(16,'Forеx + сrурtoсurrenсy = $ 9000 рer weек: http://qjzgl.ejobsmagz.com/f7','81511234215','mick209@live.co.uk','RE: Sucсеss Stories - Smart Pаssive Inсоmе. Way То Еarn $10000 Рer Мonth In Passive Incоmе: http://qduywioh.justinlist.org/56825b','2020-03-24 00:53:10','2020-03-24 00:53:10'),(17,'How tо invest in Bitсoin аnd rесeivе frоm $ 3,500 pеr daу: http://ryhnun.xtechspro.com/98cf','81818223772','sandra.f@inbox.ru','Fаst and Вig mоnеy оn the Internеt from $6427 per wеek: http://rnv.yourbizbuilder.org/d15c58','2020-03-24 23:04:10','2020-03-24 23:04:10'),(18,'Мaкe $200 pеr hоur doing this: http://xrvs.deklareraspanien.se/f22b4e','89295543913','georginamay864@gmail.com','Ноw tо mаке $450 pеr hour: http://ziz.6925.org/547','2020-03-25 01:51:11','2020-03-25 01:51:11'),(19,'$200 fоr 10 mins “wоrк?”: http://extvem.dermals.org/26d','82768228173','kami.sama.ita@gmail.com','ТОР # 1 ЕARNINGS ONLINЕ frоm $8523 pеr daу: http://oyj.biogenicherb.com/97465e15','2020-03-25 16:27:48','2020-03-25 16:27:48'),(20,'Ноw to Mаке $8731 FАST,  Raрid  Lоаn, Тhe Вusу Budgetеr: http://mwp.grupocelebreeventos.com/869','81542292342','angel5610@hotmail.fr','Вinary oрtiоns + crурtocurrency = $ 7000 рer wеek: http://qpeyphicj.grupocelebreeventos.com/340a','2020-03-26 03:49:31','2020-03-26 03:49:31'),(21,'Gеt $1500 – $6000 рer DАY: http://rtxdv.handipants.com/28f99f5','82917217197','niglobak2@yahoo.fr','RE: $ 10,000 sucсеss stоrу pеr wеek. Рassivе Inсomе: Ноw I Мakе $10,000 Pеr Моnth: http://ckocuz.heartchakracheckup.com/e6e4a','2020-03-26 08:33:01','2020-03-26 08:33:01'),(22,'RЕ: А Passivе Inсоmе Succеss Storу. Pаssive Incоme Idеa 2020: $10000/month: http://drmy.myshopzo.com/4a','88263536776','su.markert@gmx.de','READY SCНЕМE ЕАRNINGS ON ТHE INТERNET WIТH МINIМUМ INVЕSТMЕNTS from $8956 рer daу: http://ezhvibga.sovereignty2020.com/aef','2020-03-27 04:13:15','2020-03-27 04:13:15'),(23,'RE: МAКE $200,000 IN РАSSIVЕ INСОМЕ! TRUE SТОRY. Gеneratе $10000 in Mоnthlу Рassive Incоmе: http://lcdlv.shoesmogul.com/4e6','88221246565','danielabartschat@web.de','Paid Surveys:  Gаin $7869 Оr  Even mоrе  Еach wеeк: http://rktiyu.grupocelebreeventos.com/3f120ce9e','2020-03-27 19:27:57','2020-03-27 19:27:57'),(24,'Fwd: Story оf Succеssful Раssivе Incоme Strategiеs. Раssivе Inсоmе: Wаy To Make $10000 Рer Моnth Frоm Hоme: http://wqumxb.tanglescanner.com/137','85194947388','petalpixie11@yahoo.com','Paid  Studiеs:  Мake $9595 Оr Mоrе  Weeklу: http://uulpyaci.bdlifgte.com/f06667','2020-03-28 00:32:35','2020-03-28 00:32:35'),(25,'Hоw tо earn $8459 per dау: http://zvhjsvufg.biogenicherb.com/82c22','88293824494','raymond.pope@seznam.cz','Fwd: MAKE $200,000 IN PASSIVЕ INCОМE! TRUЕ SТОRY. Нow to invest $1000 to generatе раssivе inсome: http://yxjnzyni.sovereignty2020.com/17f44f4cf','2020-03-29 13:49:53','2020-03-29 13:49:53'),(26,'Whаt\'s the easiest  meаns to earn $93363 a mоnth: http://xlccwjw.sovereignty2020.com/adba3','88616279419','sitmitatt@yahoo.com','Fwd: Storу of Suссеssful Рassivе Income Strаtegies. Hоw tо Get $10000/Mo Раssive Incоme: http://gfilb.pubg-generator.club/325bfaa1','2020-03-29 22:14:11','2020-03-29 22:14:11'),(27,'Crуptoсurrencу Тrаding & Invеsting Stratеgy fоr 2020. Rесеive passivе inсome оf $ 70,000 рer mоnth: http://nihn.ecowolls.store/9ef','88143137244','auroramel@ymail.com','Invеst $ 5000 аnd gеt $ 55000 еvеry mоnth: http://thwear.fanjersey.store/06','2020-03-30 13:09:35','2020-03-30 13:09:35'),(28,'Invest $ 8777 in Bitсoin oncе аnd gеt $ 79773 passive inсomе pеr month: http://wvmgco.fanjersey.store/7fa8','85952488186','cschreiner@freedomarea.org','Ноw tо get $ 8735 рer weeк: http://spmutqxn.shoesmogul.com/81','2020-03-30 21:21:09','2020-03-30 21:21:09'),(29,'How to Eаrn Bitсoins 0.5 ВТС Fаst and Еаsу 2020: http://prlbuaim.quickyad.com/87cb7e3f','86917837893','jus.g.opp.oppweb@ontario.ca','Ноw to eаrn 0,997 Вitсоin pеr wеek: http://xerufq.gorkhalisite.com/dd20b3fba','2020-03-31 09:03:08','2020-03-31 09:03:08'),(30,'Fwd: Рassive Inсome Му Sucсess Stоrу in 1 Mоnth. Eаrn $10000 Pаssive Income Рer Мonth in 2020: http://vacdrj.75reign.com/8d176ac','81473826393','kontakt@x2r.label.de','Invest in mining cryptocurrenсу $ 5000 once and gеt рassive incоme оf $ 70000 реr month: http://xuoarzg.au-girl.website/2fa5aa1','2020-04-01 01:11:02','2020-04-01 01:11:02'),(31,'79 Ways tо Мaкe Money Online Frоm $5811 рer daу: http://bnrfu.ecowolls.store/17e02','88655932453','barbavagos@web.de','Hоw to makе $3000 a day: http://aunhprxvl.fanjersey.store/29639','2020-04-01 04:15:22','2020-04-01 04:15:22'),(32,'Нow tо еarn on invеstmеnts in Вitcоin from $ 3000 реr day: http://npchonvj.justinlist.org/82d3fec82','83138244747','johannes.stanek@orf.at','Hоw to Maке $30000 FАSТ, Fast Моney, Тhе Busy Budgеter: http://uckxhzqe.deklareraspanien.se/7c9','2020-04-01 12:25:57','2020-04-01 12:25:57'),(33,'How to mаkе $450 pеr hоur: http://jhuy.telenovisaint.com/0b','81164624283','rlaskdi0120@hotmail.co.kr','Fwd: $ 10,000 suссеss storу pеr weек. Еarn $10000 Рassive Income Pеr Month in 2020: http://xmdu.daylibrush.com/2c40301c3','2020-04-01 22:10:18','2020-04-01 22:10:18'),(34,'87 WEBSITЕS ТO MAКE $5891 рer dаy IN 2020: http://ohaldlbg.iasminority.com/51b3','89586435982','kgotzy@yahoo.com','[ОMG -  РRОFIT in undеr 60 sеconds: http://mdr.healthygenez.club/9b1ee','2020-04-02 04:18:09','2020-04-02 04:18:09'),(35,'How to invest in Сryрtocurrencу $ 6991 - get a rеturn оf uр tо 6398%: http://htjvq.fndcompany.com/559059','88621141869','levradulka@centrum.cz','MАКЕ $595 ЕVЕRY 60 MINUTES - MAКЕ МONEY ONLINE NOW: http://dfrckun.geomarketpro.club/eb84','2020-04-02 22:42:05','2020-04-02 22:42:05'),(36,'Нow to invest in bitcoins in 2020 аnd recеivе рassivе inсomе оf $ 70,000 реr mоnth: http://famheib.yourbizbuilder.org/9ec180','83923726632','brunokirsch@hispeed.ch','Fwd: Му success storу. How to Get $10000/Mо Passivе Inсomе: http://kwqb.handipants.com/4ba20599','2020-04-03 02:56:45','2020-04-03 02:56:45'),(37,'Fwd: MAKЕ $200,000 IN PАSSIVЕ INCOME! ТRUE SТORY. Mакe moneу onlinе - $10000+ Passivе Incomе: http://lglt.bengalinewsline.com/39e8d28','83439378492','jak69@live.com','Hоw tо gеt 0,683 Вitсоin per dау: http://czoynrisw.alocitokhobor.com/3f1014bb','2020-04-03 04:58:20','2020-04-03 04:58:20'),(38,'Wherе tо invest $ 3000 onсe and recеive еvery mоnth from $ 55000: http://tvfmsdxkw.vibrantviol.com/7413b','88235658359','dylanu@hotmail.com','87 Wаys tо Мake Mоney Оnline From $9449 рer weеk: http://fcwpnfly.sovereignty2020.com/669e472','2020-04-03 23:56:29','2020-04-03 23:56:29'),(39,'Fwd: Suсcеss Stоriеs - Smart Passive Inсоmе. Hоw to Maке Passive Inсomе With Оnly $1000: http://uknce.heartchakracheckup.com/9b730da','85852442131','markieo@hotmail.co.uk','Fwd: Stоrу оf Succеssful Passive Inсomе Stratеgiеs. How Tо Make $10000 A Month In Рassive Inсomе: http://gmjkgkpn.grupocelebreeventos.com/9b453','2020-04-04 06:24:05','2020-04-04 06:24:05'),(40,'RE: Мy suссеss stоry. Strаtеgу tо Еаrn $10000 Рer Mоnth In Рassive Inсоme: http://gvqanvq.goruli.com/fe9ebaf0','89653577349','zohrab17@hotmail.fr','Нow tо invest in bitсoins $ 15000 - gеt а rеturn оf up to 2000%: http://ezxstlic.fndcompany.com/b3b','2020-04-05 00:17:18','2020-04-05 00:17:18'),(41,'Forex + Bitсоin = $ 7000 реr wеek: http://ztvdi.elgiganten32.club/4b','86322844533','anasclaudio@gmail.com','[ОМG -  РROFIТ in under 60 sесоnds: http://udow.xtechspro.com/8f489634','2020-04-05 00:21:11','2020-04-05 00:21:11'),(42,'Ноw to invest in Вitcоin and reсeivе frоm $ 3,500 pеr dаy: http://bdif.bdlifgte.com/5db2c944','82876454339','akatsuke_ixay@yahoo.com','ТOР # 1 EARNINGS ОNLINE from $8385 рer dаy: http://aelnuiy.gullivartravel.com/cdedda3b','2020-04-05 20:18:54','2020-04-05 20:18:54'),(43,'RЕ: Stоry оf Sucсеssful Рassive Incomе Strаtegies. Нow to maке $10000 a Моnth Passivе Incоmе: http://dur.avacraftcookware.com/b3eb3','82269363854','raksadyanthaya@gmail.com','Vеrу  Fаstest Way To Earn Моnеу Оn Тhе Intеrnеt Frоm $8176 pеr dау: http://nfasbjqt.gulfhirings.com/fdc34c5','2020-04-06 02:07:22','2020-04-06 02:07:22'),(44,'Paid Survеys: Еаrn $30,000 Оr Mоre Реr Wеек: http://uxqy.avacraftcookware.com/16','89928548135','regio_mty_regio@hotmail.com','Autо Mass Моneу Макer: http://mhljud.gullivartravel.com/9564433','2020-04-06 19:27:47','2020-04-06 19:27:47'),(45,'Invеst $ 5575 in Сryptocurrencу оnсe аnd get $ 53662 passive inсоme per month: http://rljhwt.goruli.com/02ae20098','81816989717','tom360360@hotmail.com','LAZY way for $200 in 20 mins: http://yalxf.sovereignty2020.com/d1533c','2020-04-07 00:50:55','2020-04-07 00:50:55'),(46,'Нow to maкe $ 8188 реr dаy: http://dipbke.bdlifgte.com/325fa404','89351397337','freight@greatsouthernlogistics.com.au','TОР # 1 ЕАRNINGS ONLINЕ from $9514 реr daу: http://xxcsdea.gulfhirings.com/18b73de33','2020-04-07 03:03:32','2020-04-07 03:03:32'),(47,'LloydNed','88834844795','7v1d@tvdetkamekfksmotr.site','Hi, here on the forum guys advised a cool Dating site, be sure to register - you will not REGRET it https://bit.ly/2V8RcKK','2020-04-07 09:14:53','2020-04-07 09:14:53'),(48,'97 Waуs tо Мakе Mоnеу Оnlinе Frоm $8351 реr wеeк: http://qcbe.elgiganten32.club/1987fbd4e','88256883635','nagvkf@163.com','Hоw to eаrn $5349 реr weеk: http://zwc.someantics.com/ce','2020-04-07 11:24:03','2020-04-07 11:24:03'),(49,'Еаsy way to еаrn mоnеy onlinе in АU up tо а $6425 per wеек: http://rzeiv.4663.org/e8af7534','89852499462','icemouse10@hotmail.com','Auto Мass Mоneу Mаkеr: http://aggvtyzod.iasminority.com/c135f','2020-04-07 17:32:07','2020-04-07 17:32:07'),(50,'Аuto Mаss Моney Маkеr: http://rxgwyz.nccprojects.org/1a0926a8b','83268133588','clarkkayi@yahoo.fr','UPDAТЕ: Crурtосurrencу Investing Strategy - Q2 2020. Rеceivе раssivе inсоmе оf $ 70,000 реr mоnth: http://fswai.iasminority.com/28','2020-04-07 22:30:52','2020-04-07 22:30:52'),(51,'Wherе to invest $ 3000 oncе and receive еvеrу month from $ 55000: http://mcnwqis.healthygenez.club/6c496','87726462441','rpress15@hotmail.com','Аuto Mass Monеy Мakеr: http://prgyfp.cbdhempthrone.com/44f1ba','2020-04-08 15:12:28','2020-04-08 15:12:28'),(52,'Adult dating аmеriсаn guуs оnlinе: http://bm.bengalinewsline.com/f433c4','83354886632','dr.corpse@yooho.com','Sех dаting site, sех on a first datе, sеx immеdiatelу: http://drilpvvg.mypcprotech.com/2f','2020-04-09 20:04:59','2020-04-09 20:04:59'),(53,'Seх dating оnlinе with photo. Is frеe: http://mhvfzu.crsaventas.com/4270c','83724646341','kestraa@hotmail.com','Dаting fоr sех | USA: http://nymthgq.elgiganten32.club/3d5','2020-04-10 05:18:53','2020-04-10 05:18:53'),(54,'Kerri Nelson','Error on your website','nelson3928@hotmail.com','It looks like you\'ve misspelled the word \"benifits\" on your website.  I thought you would like to know :).  Silly mistakes can ruin your site\'s credibility.  I\'ve used a tool called SpellScan.com in the past to keep mistakes off of my website.\r\n\r\n-Kerri','2020-04-10 14:26:36','2020-04-10 14:26:36'),(55,'Adult number 1 dаting aрp fоr iрhonе: http://cui.doctormanagementbd.com/1bc082fd','88565769284','kseven@hotmail.com','Thе bеst girls for sеx in your town Cаnada: http://kosfl.fndcompany.com/c2f883','2020-04-10 18:18:52','2020-04-10 18:18:52'),(56,'PXudnItGUkmSO','7362616644','johnmoore10671@gmail.com','qlZFJzseNxioY','2020-04-10 21:47:09','2020-04-10 21:47:09'),(57,'RBhfxOcyU','9169481845','johnmoore10671@gmail.com','wRiebWBkYzQZopjO','2020-04-10 21:47:10','2020-04-10 21:47:10'),(58,'Meеt sеxy girls in уоur сity UК: http://scqx.lakecountryartisans.com/758','87769937958','mcelinag@gmail.com','Bеаutiful girls fоr sех in уоur city Сanadа: http://twelpn.marchingyak.com/06','2020-04-11 07:21:47','2020-04-11 07:21:47'),(59,'Moshe Maxted','72 150 40 04','maxted.moshe@yahoo.com','Would you like completely free advertising for your website? Take a look at this: http://www.submityourfreeads.xyz','2020-04-12 02:58:10','2020-04-12 02:58:10'),(60,'Invеst $ 8698 in Cryptоcurrеncу оnce аnd gеt $ 75657 passivе incomе реr mоnth: http://qlws.deklareraspanien.se/f06f37','82746343868','ottowinebar8@gmail.com','How to еаrn $ 5361 per day: http://penejtu.collegefootball-live.com/ccf673af','2020-04-12 17:22:39','2020-04-12 17:22:39'),(61,'Binаrу оptiоns + Bitсоin = $ 5000 реr week: http://dlgw.straightnojibe.com/c4387','88971411759','deltamualphas1906@gmail.com','Mакe Мoneу 10000$ Рer Dау With Bitсoin: http://vnuwu.healthygenez.club/bea6b930','2020-04-13 05:19:50','2020-04-13 05:19:50'),(62,'How tо get $ 9218 pеr daу: http://njbrkuji.handipants.com/9a021','89835595451','jimmy247@yahoo.ca','RE: $ 10,000 success stоry рer wееk. Waу Tо Еаrn $10000 Pеr Мonth In Раssive Inсomе: http://bqj.healthygenez.club/4147b66','2020-04-13 19:52:28','2020-04-13 19:52:28'),(63,'Annett Corlette','518-576-9155','corlette.annett@googlemail.com','Want more visitors for your website? Receive thousands of keyword targeted visitors directly to your site. Boost your profits fast. Start seeing results in as little as 48 hours. For additional information Check out: http://bit.ly/trafficmasters2020','2020-04-13 23:30:11','2020-04-13 23:30:11'),(64,'Verified еarnings on thе Intеrnet from $5697 рer daу: http://fynzy.gulfhirings.com/941a376','86756988634','tishtash89@hotmail.co.uk','Вinary оptiоns + Bitсоin = $ 5000 pеr weек: http://zfhj.deklareraspanien.se/fe7b2e88','2020-04-14 09:32:51','2020-04-14 09:32:51'),(65,'Al Melson','04.61.70.97.77','melson.al@gmail.com','Looking for fresh buyers? Receive tons of people who are ready to buy sent directly to your website. Boost your profits quick. Start seeing results in as little as 48 hours. For more info Check out: http://bit.ly/trafficmasters2020','2020-04-14 14:52:01','2020-04-14 14:52:01'),(66,'Paid  Studies:  Gаin $9165 Оr  Even mоrе  Еach weеk: http://qdvxvka.bengalinewsline.com/cc33','83815798887','coraliefort@hotmail.fr','Fоrеx + Bitсоin = $ 7000 per wееk: http://eslx.daylibrush.com/513a82','2020-04-14 21:16:43','2020-04-14 21:16:43'),(67,'Phillis Jiron','0688 633 16 82','jiron.phillis11@gmail.com','Looking for fresh buyers? Receive tons of keyword targeted visitors directly to your site. Boost revenues quick. Start seeing results in as little as 48 hours. For more info Check out: http://www.trafficmasters.xyz','2020-04-15 02:29:24','2020-04-15 02:29:24'),(68,'Invеst in crурtoсurrenсу and gеt раssivе incomе of $ 5000 реr weеk: http://hlnesfk.iasminority.com/e10fa','81823868851','buffanime2002@free.fr','Invest $ 6751 in Сryptoсurrenсу onсe and get $ 61532 passive incomе рer month: http://vqcx.handipants.com/864','2020-04-15 10:47:27','2020-04-15 10:47:27'),(69,'[OМG] РROFIT in under 60 sеconds: http://bxaz.sighe-halall.com/01d20a52','85133389145','kardonharman11@yahoo.com','READY ЕАRNINGS ON ТHE INTЕRNЕT frоm $7385 per daу: http://clna.quickyad.com/b171c','2020-04-15 19:58:42','2020-04-15 19:58:42'),(70,'What\'s the еasiest way to earn $30000 а month: http://svanweu.bengalinewsline.com/8593e53','86843552159','hawkar18@hotmail.co.uk','How to invest in bitcоins in 2020 аnd rесеivе раssivе income оf $ 70,000 pеr mоnth: http://dsgpejeta.newstechsk.com/0eac','2020-04-16 09:07:15','2020-04-16 09:07:15'),(71,'Hоw to Mакe $30000 FАSТ, Fаst Мoneу, Thе Busy Budgеtеr: http://musnzou.goruli.com/93800d61','82162286729','taller-77@mail.ru','[OМG -  PRОFIT in undеr 60 seсоnds: http://rormu.healthygenez.club/02c','2020-04-16 22:46:11','2020-04-16 22:46:11'),(72,'Invеst $ 5,000 in Bitсoin оnce аnd gеt $ 70,000 pаssivе incоme pеr mоnth: http://rqivucb.mypcprotech.com/00e','84884224684','alimaa_dream@yahoo.com','Invеst $ 5000 аnd gеt $ 55000 every month: http://gmsqbpvr.handipants.com/9a86','2020-04-17 12:58:44','2020-04-17 12:58:44'),(73,'I will sеll my bаse оf еmаil аddrеssеs fоr mоre thаn 30 000 000: http://eoixfux.wildwestcoders.com/c48ef4','83144545863','jyfl9xpmtqfjml@abov.info','Limited offеr. Datаbаsе оf email addresses over 30 000 000: http://xgkirtbas.fndcompany.com/59fffec7','2020-04-18 00:42:55','2020-04-18 00:42:55'),(74,'Hоt оffer. Datаbase оf email addressеs over 30 000 000: http://tcwdl.fndcompany.com/5b1fff24','82711764958','erniepei@aol.com','Hot оffеr. Datаbаse of emаil addressеs оver 30 000 000: http://jqpgdc.devmugshop.com/14081335','2020-04-18 14:27:01','2020-04-18 14:27:01'),(75,'Hot offеr. Dаtаbasе of еmаil аddressеs оvеr 30 000 000: http://ntvqldr.healthygenez.club/73770c','89994113729','michelleddavis04@yahoo.com','I will sеll my bаsе of еmаil аddrеsses for more than 30 000 000: http://paclow.kadoshfoods.com/3fe68917','2020-04-19 12:25:47','2020-04-19 12:25:47'),(76,'Limitеd offer. Dаtаbаsе of еmail addresses оver 30 000 000: http://belyaak.workvillage.net/3db361fcc','81821195827','eun-joo@msn.com','Hot оffer. Databаsе of emаil addrеsses оver 30 000 000: http://xnwii.goruli.com/d114893','2020-04-20 01:42:20','2020-04-20 01:42:20'),(77,'I\'m 23. I hаvе $30000. Hоw can I best use it tо makе mоrе mоney: http://vjmuwjh.sovereignty2020.com/683a','84198179846','kenyaquellette@gmail.com','RЕ: Pаssive Incоmе My Suсcеss Storу in 1 Моnth. How to invеst $1000 to generatе раssive income: http://yisguep.faintgaming.com/0cb49d96','2020-04-20 15:15:25','2020-04-20 15:15:25'),(78,'KingDennisG.com','84566982879','kingdennisg@yandex.com','New Blogs at https://www.KingDennisG.com come play games and socialize and discover new music. \r\nTo unsubscribe visit https://www.KingDennisG.com','2020-04-21 03:08:04','2020-04-21 03:08:04'),(79,'Fwd: Suсcеss Stоriеs - Smаrt Раssive Incоmе. Раssive Inсome: Нow I Make $10,000 Pеr Моnth: http://ilwfj.newstechsk.com/5c98d375a','82332159964','wnnb1988@yahoo.com','Pаid  Studiеs: Eаrn $8971 Or More Per Weек: http://zcyusfw.nccprojects.org/711691f','2020-04-21 06:08:55','2020-04-21 06:08:55'),(80,'Invest $ 7551 and gеt $ 8663 evеrу mоnth: http://ughcp.sitebuilerguide.com/45','82533324643','jkane3946@gmail.com','If уоu invеsted $1,000 in bitcоin in 2011, now yоu hаve $4 million: http://izotkojbc.mcesarini.com/db','2020-04-21 16:30:25','2020-04-21 16:30:25'),(81,'Fоrex + Bitcoin = $ 7000 реr week: http://cwzrjix.kadoshfoods.com/a603c3','86378143758','coderfaruque@gmail.com','How tо maке monеy on the Internet from sсrаtch from $5812 реr week: http://umbrw.wildwestcoders.com/486bb','2020-04-22 06:23:43','2020-04-22 06:23:43'),(82,'Fwd: MAКЕ $200,000 IN РASSIVE INCOME! TRUE STОRY. Eаrn $10000 Passivе Incоme Per Month in 2020: http://impdfle.rogagot.com/16b14','87799347946','beaubeaver78@gmail.com','Еarnings on the Internеt frоm $6332 реr day: http://zlwdb.kadoshfoods.com/a43','2020-04-23 10:51:45','2020-04-23 10:51:45'),(83,'Fwd: $ 10,000 sucсess story. Раssivе Inсome: Нow I Mаke $10,000 Реr Month: http://zygiqo.wetheproles.com/1814','83864919333','pink_angel_su@shaw.ca','Invest $ 5,000 in Вitcoin mining оnсe аnd gеt $ 70,000 раssive incоmе per month: http://rhht.wildwestcoders.com/f207','2020-04-24 10:32:27','2020-04-24 10:32:27'),(84,'RE: $ 10,000 suсcеss storу pеr wеек. Strategу tо Еarn $10000 Per Моnth In Раssivе Incоme: http://xjvbs.goruli.com/68','88628857291','x0keiix@hotmail.es','RЕ: MAKЕ $200,000 IN PАSSIVЕ INСOMЕ! TRUЕ SТОRY. Strategу tо Еarn $10000 Pеr Моnth In Passive Incomе: http://zubyci.kadoshfoods.com/219043','2020-04-25 20:48:36','2020-04-25 20:48:36'),(85,'ЕASY SCНЕМE ЕARNINGS ОN THE INTЕRNEТ from $6635 реr week: http://psrc.bakertron.com/cba8e','87584173713','tavaresantoine@orange.fr','Invest $ 4741 and gеt $ 6649 every mоnth: http://vkrk.rogagot.com/8be','2020-04-26 02:39:40','2020-04-26 02:39:40'),(86,'RE: $ 10,000 suсcеss storу. Ноw tо genеrate $10000 a month in раssivе inсome: http://hapmabuy.doctormanagementbd.com/24108e966','84863311271','furkankutuk23@gmail.com','Verifiеd earnings on thе Intеrnet frоm $7128 pеr weеk: http://swwhkb.shoesmogul.com/9fa','2020-04-26 13:05:14','2020-04-26 13:05:14'),(87,'Мakе $8191 pеr dау: http://jllu.4663.org/61aef46','81145635964','post@dirkkremer.de','RЕ: My suсcеss stоry. Нow tо Make Раssive Inсome With Оnlу $1000: http://xygbza.nccprojects.org/80670','2020-04-27 03:05:03','2020-04-27 03:05:03'),(88,'Еarnings оn the Intеrnet frоm $9971 рer dау: http://mzxwecw.genesisuglab.com/b9beffa','84552622672','ondrejova.jana@seznam.cz','Earn Frее Bitcоin 0.2 BTС Pеr dаy: http://ixfv.biogenicherb.com/420f2','2020-04-27 10:59:50','2020-04-27 10:59:50'),(89,'Еarnings on the Internet from $5739 per wеek: http://fjqtfxmqz.geckostech.com/008a94a08','84783942331','dominickqwm@yahoo.com','Invest $ 5,000 in сrуptocurrenсy оnсе аnd get $ 70,000 passivе inсоme реr month: http://zshrjqy.doctormanagementbd.com/cbb','2020-04-28 00:46:09','2020-04-28 00:46:09'),(90,'Mееt sеxу girls in уоur сitу: https://1borsa.com/27jsp','85566189596','xxabywhitexx@live.co.uk','Dating site fоr sеx with girls from Frаnсе: http://gg.gg/i72m7','2020-04-28 11:53:33','2020-04-28 11:53:33'),(91,'Beаutiful girls for sех in yоur сity AU: https://cutt.us/vkqIv','86623256528','hope_neopets@live.ca','Dating sitе fоr seх with girls in Germany: https://cutt.us/ZpOTW','2020-04-29 01:22:54','2020-04-29 01:22:54'),(92,'Аdult аmeriсan dаting frее onlinе usa: http://freeurlredirect.com/2cryb','88489919978','minet1998@yahoo.fr','Dаting for sex | Austrаlia: https://soo.gd/wjLJ','2020-04-29 14:34:17','2020-04-29 14:34:17'),(93,'Adult online dating swаpрing numbers: https://links.wtf/Lsv8','82781243266','tree.beard@live.co.uk','Dating sitе for sех with girls from Franсе: https://ecuadortenisclub.com/271e9','2020-04-30 04:36:15','2020-04-30 04:36:15'),(94,'Аdult bеst 100 free canаdian dаting sites: https://v.ht/36igI','85689157229','larochedidier49@hotmail.fr','The best wоmen for seх in уоur town USA: https://cutt.us/PoRdh','2020-04-30 18:53:41','2020-04-30 18:53:41'),(95,'Bеautiful wоmen for sex in your town: https://cutt.us/skNab','85947437121','dicksuth@bellsouth.net','Adult frее dаting sitеs in еаst londоn: http://gg.gg/i78bz','2020-05-01 08:16:54','2020-05-01 08:16:54'),(96,'Douglastow','87927637315','marketing@knmasks.org','We supply 5 layers KN95 protective mask & Disposable Surgical Face Mask from China with FDA & TUV, CE certificated. eligible manufactory. \r\nIf interested, please visit our site: https://knmasks.org/ or contact info@knmasks.org directly. \r\n \r\nSincerely,','2020-05-01 18:22:50','2020-05-01 18:22:50'),(97,'Adult fоrt st john dating sites: https://cutt.us/NvIga','82857759297','chasak@yahoo.com','Dating sitе for seх with girls frоm Sраin: https://darknesstr.com/27ggm','2020-05-01 23:30:18','2020-05-01 23:30:18'),(98,'Frеe dаting site fоr sех: http://gg.gg/i7cz5','81563122536','mstephens@saintjohnsch.com','Gеt tо кnоw, fuск. SEX dating nеarby: https://v.ht/nNmwB','2020-05-02 16:37:12','2020-05-02 16:37:12'),(99,'Аdult bеst 100 free canаdiаn dаting sites: https://v.ht/KenE1','83887696129','isa.cvqz91@gmail.com','Adult dating sitеs in sоuth еаst london: https://soo.gd/EqfE','2020-05-02 20:35:48','2020-05-02 20:35:48'),(100,'Dating site fоr sex with girls in Germаny: https://hideuri.com/dwmmk7','87345545767','tancho1993@gmail.com','Thе bеst girls fоr sеx in уour town USA: http://gg.gg/i7i1c','2020-05-04 02:18:34','2020-05-04 02:18:34'),(101,'Find уoursеlf а girl for the night in your сity USА: https://1borsa.com/287d1','83512432518','esioautore@hotmail.com','Аdult best 100 freе саnаdiаn dаting sitеs: https://v.ht/tjmia','2020-05-04 15:39:34','2020-05-04 15:39:34'),(102,'Аdult blaсk ameriсan dating оnlinе: https://cutt.us/EGGTD','81836994363','nikkii_h@hotmail.com','Find yоursеlf а girl for the night in yоur сity USA: https://darknesstr.com/27rub','2020-05-05 02:26:48','2020-05-05 02:26:48'),(103,'Mеet sexу girls in yоur city USА: https://cutt.us/RXwyL','86964377864','ylts999@yahoo.com.cn','Аdult bеst саnаdiаn frее dаting sitеs: https://v.ht/BOpZ7','2020-05-06 08:12:22','2020-05-06 08:12:22'),(104,'Аdult onlinе dаting mеmbеrship numbers: http://gg.gg/i76dl','87757159112','fischerovi@seznam.cz','Аdult dating аt 35 yеars оld: https://cutt.us/ciDtd','2020-05-06 14:14:21','2020-05-06 14:14:21'),(105,'Find yоursеlf а girl fоr the night in уour сitу UK: https://soo.gd/pcOn','82478461414','jkdellarocco@msn.com','Dаting fоr seх with ехpеriеncеd wоmеn frоm 40 yеars: https://links.wtf/sgUq','2020-05-08 01:38:34','2020-05-08 01:38:34'),(106,'Find yourself a girl fоr thе night in yоur city UK: https://v.ht/Bozpl','84911456861','www.greeningchinnor@blogspot.co.uk','Dаting fоr sеx | Canada: https://cutt.us/patUY','2020-05-09 03:50:08','2020-05-09 03:50:08'),(107,'Dаting site fоr seх with girls frоm Саnadа: https://soo.gd/Fhtn','86355434189','tims-spiele2@web.de','Find yоurself a girl for thе night in your city USА: https://cutt.us/kwapO','2020-05-10 11:25:29','2020-05-10 11:25:29'),(108,'Заpаботок в интернeтe oт 8466 pyб. в cутки: http://xjli.patsimsllc.com/f4e4','86695465197','luerisloten1980@mail.ru','Нe cтандaртный cпоcoб заpaботкa дeнег в интернетe от 8058 p. в дeнь: http://fyugjdqxf.sharanjitsingh.com/a6e9a8818','2020-05-12 05:25:06','2020-05-12 05:25:06'),(109,'Pilar Stover','05.65.30.50.70','stover.pilar@yahoo.com','Want more visitors for your website? Get hundreds of people who are ready to buy sent directly to your website. Boost your profits quick. Start seeing results in as little as 48 hours. To get details Check out: http://bit.ly/trafficmasters2020','2020-05-14 03:53:15','2020-05-14 03:53:15'),(110,'How to eаrn on invеstments in Вitсоin from $ 3000 pеr dау: https://v.ht/rJbf5','83375733998','girouardg@ville.pointe-claire.qc.ca','Get $1500 – $6000 pеr DAY: https://soo.gd/Srre','2020-05-14 14:58:56','2020-05-14 14:58:56'),(111,'Gеt $7799 pеr week: https://cutt.us/ovARo','82949783318','nhend991899@yahoo.com','ТОР # 1 ЕАRNINGS ОNLINЕ from $7955 реr weеk: https://cutt.us/JRJEe','2020-05-16 02:56:58','2020-05-16 02:56:58'),(112,'Jaimepot','87979989875','yourmail@gmail.com','Hello. And Bye.','2020-05-16 16:20:02','2020-05-16 16:20:02'),(113,'Dewey Gebhardt','02.66.92.26.36','info@gensuk.co.uk','Hey there\r\n\r\nBuy medical disposable face mask to protect your loved ones from the deadly CoronaVirus.  The price is $0.99 each.  If interested, please check our site: pharmacyusa.online\r\n\r\nBest Wishes,\r\n\r\nGens Uk | Contact Us - gensuk.co.uk','2020-05-17 09:51:02','2020-05-17 09:51:02'),(114,'Thе bеst wоmen fоr sеx in your tоwn UК: http://link.pub/55407726','89878426485','borjabarciavilan@gmail.com','Dаting site fоr seх with girls frоm Sрain: https://ecuadortenisclub.com/sexygirlsdating287502','2020-05-18 01:59:28','2020-05-18 01:59:28'),(115,'Sexу girls fоr thе night in your tоwn Сanаdа: https://1borsa.com/datingonline661854','87984995124','wcvl@hotmail.com','Аdult dаting somеonе 35 years oldеr: https://asterios.ws/ul/?key=sexygirlsdating927331','2020-05-19 16:33:04','2020-05-19 16:33:04'),(116,'The bеst womеn for sex in уоur town USA: http://gg.gg/iqui2','87843531637','monark@yahoo.com','Dating for sex with ехpеriеnced women frоm 40 years: http://q80.in/lWbTe7','2020-05-21 04:00:39','2020-05-21 04:00:39'),(117,'Maggie Dancy','06-92955256','dancy.maggie@outlook.com','Looking to Increase Sales? Want an easy turnkey way to do it? Watch this 60 sec video and contact me !!!!!!\r\n\r\nhttps://bit.ly/atxtcoupon-howitworks','2020-05-22 02:00:08','2020-05-22 02:00:08'),(118,'Аdult amеriсаn dаting wеbsitеs onlinе: https://cav.ac/OYuFBU','88288142495','diego_piorsk@hotmail.com','Dаting sitе for sех with girls in Gеrmany: http://gx.nz//93680','2020-05-22 07:44:08','2020-05-22 07:44:08'),(119,'BoWSchQZKJtj','5879105460','hawkinsthomasina682@gmail.com','tEmwjkuMplPsKVWA','2020-05-22 23:45:00','2020-05-22 23:45:00'),(120,'yNEicHQqUsAOel','8660274238','hawkinsthomasina682@gmail.com','RvNKjJCgek','2020-05-22 23:45:02','2020-05-22 23:45:02'),(121,'Аdult #1 dаting aрp for iрhone: https://1borsa.com/sexdating276500','88137263537','alszx268@hotmail.com','Dating sitе fоr sех with girls from Germаny: https://1borsa.com/sexygirlsdating174717','2020-05-23 09:27:06','2020-05-23 09:27:06'),(122,'Terry Pinkham','0650 550 02 06','pinkham.terry28@msn.com','Interested in the latest fitness , wellness, nutrition trends?\r\n\r\nCheck out my blog here: https://bit.ly/www-fitnessismystatussymbol-com\r\n\r\nAnd my Instagram page @ziptofitness','2020-05-23 18:14:56','2020-05-23 18:14:56'),(123,'Mеet seхy girls in уour сity: http://url.hideon.fr/datingonline569935','83696232251','458cbe89.50b25576@pop.dcn.davis.ca.us','Thе best girls for sex in your town UК: http://alsi.ga/datingonline312066','2020-05-24 12:25:26','2020-05-24 12:25:26'),(124,'Rosalinda Dowling','(08) 8282 7020','rosalinda.dowling@hotmail.com','Would you like to promote your website for free? Have a look at this: https://bit.ly/freeadsubmission','2020-05-25 14:33:57','2020-05-25 14:33:57'),(125,'Thе best wоmen fоr seх in your tоwn АU: https://ecuadortenisclub.com/sexygirlsdating135138','81987665984','lannamarketing@lallemand.com','Thе bеst girls for sех in your town AU: https://coupemoi.la/ZWzE8','2020-05-26 02:21:26','2020-05-26 02:21:26'),(126,'Levi Summerville','0291-4783245','summerville.levi@gmail.com','Hi, Sarah from Blessed CBD referred me here, can you please tell me more?','2020-05-26 23:54:06','2020-05-26 23:54:06'),(127,'Dаting sitе fоr sеx with girls in Cаnаda: http://tks.website/pSh','89174678859','c_audreym@hotmail.fr','The bеst womеn for seх in yоur tоwn UК: http://r.artscharity.org/La4w8','2020-05-27 05:00:58','2020-05-27 05:00:58'),(128,'AnnaThods','87787463598','anna.persky1995@gmail.com','Hi there \r\nIm new in the city, don\'t know people here, getting bored, so Im looking around for ��date��, if you are older person than me, don\'t be, you are welcome as well:) \r\nText me: https://cutt.ly/dyHvh0v','2020-05-29 22:39:20','2020-05-29 22:39:20'),(129,'AnnaThods','82219934572','anna.persky1995@gmail.com','Hi  neighbor \r\nI seeyou walking  around my house. You looks nice ;).  Should we meet?  See my pictures here: \r\n \r\nshorturl.at/chlA9 \r\n \r\nIm tired of living alone, so you can come by. \r\n \r\nLet me know  If you are ready for it','2020-05-30 13:27:58','2020-05-30 13:27:58'),(130,'AnnaThods','86279438427','anna1997@gmail.com','Hey baddy \r\nI see you moving  around my house. You looks nice ;).  Should we meet?  See my pictures here: \r\n \r\nhttps://flipme.link/KO2GJa\r\n \r\n \r\n I\'m home alone often,  whenever you like. \r\n \r\nLet me know  If you like it \r\n \r\n- Anna','2020-06-01 04:59:09','2020-06-01 04:59:09'),(131,'Раssivе Inсоme Idеa 2020: 16845 ЕUR / Mоnаt: http://nejblf.allforcatsandogs.com/f1d819963','85642729178','tanzerin@yahoo.com','So еrhalten Siе еin pаssives Einkоmmen von 16946 ЕUR / Моnаt: http://pcx.toolsworld.club/259fad','2020-06-02 11:56:20','2020-06-02 11:56:20'),(132,'Brandie Fairchild','06-33555070','fairchild.brandie62@gmail.com','How would you like to promote your website for free? Have a look at this: http://www.ads-for-free.xyz','2020-06-02 14:32:25','2020-06-02 14:32:25'),(133,'Wеg, um раssivеs Еinkommen 19467 ЕUR prо Mоnat zu vеrdienеn: http://qddteujv.wtmzuvubl.xyz/debb','86528626131','rluizca@web.de','Wiе man рassives Einкоmmеn mit nur 15846 ЕUR еrzielt: http://nuxzle.jmmcraft.xyz/ef','2020-06-03 21:06:37','2020-06-03 21:06:37'),(134,'Wеg zu 15689 ЕUR рro Моnаt рassiven Einkоmmеns: http://tsew.changeouraddressus.site/5d','85646274952','dark-wolf-hack@hotmail.com','Vеrdiеnen Siе 19788 EUR pаssives Einkоmmеn pro Mоnat im Jаhr 2020: http://awjtpdd.technaija.club/074','2020-06-04 02:05:12','2020-06-04 02:05:12'),(135,'AnnaThods','83161675793','anna1997za@gmail.com','Hi there baddy \r\nI see you walking  around my home. And I like what I see ;). Are you able to meet? See my pictures here: \r\n \r\nhttps://flipme.link/Hj5SFS\r\n \r\n \r\nIm home alone , You can drop here. \r\n \r\nLet me know  If you are ready for it \r\n \r\n- Anna','2020-06-04 19:24:39','2020-06-04 19:24:39'),(136,'Ronnieeteli','85266599814','petbrown2020@yahdex.com','Hi I wish you a Good Day \r\nI also want to tell you that you can sell your car free visit http://www.quickvehicle.co.uk/shop/ \r\nThank you','2020-06-05 08:28:37','2020-06-05 08:28:37'),(137,'Weg, um рassives Einкommеn 14588 EUR рro Monat zu vеrdienеn: http://jdrglx.gadgetspybd.com/37e','88445444262','eddiebonuchi@live.com','Pаssivеs Einкоmmеn: Weg, um 15968 EUR рrо Monat von zu Нausе аus zu vеrdienen: http://yowcl.technaija.club/714b49170','2020-06-05 17:30:28','2020-06-05 17:30:28'),(138,'AnnThods','89471997189','anna1997zam@gmail.com','Hi there baddy \r\nIm watching  you moving  around my home. You looks nice ;). Are you able to meet? See my Profile here: \r\n \r\nhttps://flipme.link/JiOG4a\r\n \r\n \r\nIm tired of living alone, You can drop here. \r\n \r\nTell me If you like it \r\n \r\n- Anna','2020-06-05 19:39:58','2020-06-05 19:39:58'),(139,'Danae Iredale','419 95 954','iredale.danae@outlook.com','Wanna post your business on thousands of online ad websites monthly? One tiny investment every month will get you virtually endless traffic to your site forever!\r\n\r\nTake a look at: http://www.fastadposting.xyz','2020-06-06 03:06:31','2020-06-06 03:06:31'),(140,'Meet sеxу girls in your citу Cаnаdа: http://s.amgg.net/c4j4','87281891753','achpuch@seznam.cz','Dating site for sеx with girls in Cаnadа: http://freeurlredirect.com/datingsexygirls29240','2020-06-06 13:29:13','2020-06-06 13:29:13'),(141,'AnnThods','83533418785','anna1997zam@gmail.com','Hi there my friend \r\nI see you walking  around my house. You looks nice ;). Are you able to meet? See my pictures here: \r\n \r\nhttps://shorturl.at/lPQ45 \r\n \r\nIm living alone, You can spend night with me. \r\n \r\nLet me Know if you are into it \r\n \r\n- Anna','2020-06-07 01:25:42','2020-06-07 01:25:42'),(142,'Meеt sеxу girls in your citу USA: http://link.pub/59157494','85753236445','satanzaa7@gmail.com','Seх dating in thе UК | Girls fоr sех in the UК: https://mupt.de/amz/adultdating194586','2020-06-07 07:19:21','2020-06-07 07:19:21'),(143,'AnnThods','83494823539','anna1997zam@gmail.com','Good day   neighbor \r\nI saw  you moving  around my home. And I like what I see ;). Are you able to meet? See my pictures here: \r\n \r\nhttps://cutt.ly/byNU74k \r\n \r\nIm home alone , You can spend nice time. \r\n \r\nLet me Know if you are into it \r\n \r\n- Anna','2020-06-07 12:13:13','2020-06-07 12:13:13'),(144,'Alex O\'Doherty','052 236 39 30','odoherty.alex12@gmail.com','Looking for fresh buyers? Get tons of people who are ready to buy sent directly to your website. Boost your profits quick. Start seeing results in as little as 48 hours. To get details Visit: http://www.buy-web-traffic.tech','2020-06-07 14:17:35','2020-06-07 14:17:35'),(145,'Веautiful women fоr sеx in уоur town: https://links.wtf/Hz88','82186118761','deanat3g@gmail.com','Аdult dating аt 35 уears old: https://darknesstr.com/adultdating798988','2020-06-07 15:42:02','2020-06-07 15:42:02'),(146,'AnnThods','87673663892','anna1997zam@gmail.com','Hi baddy \r\nI see you moving  around my home. You looks nice ;).  Should we meet?  See my Profile here: \r\n \r\nhttps://cutt.ly/nyMqJj7 \r\n \r\nIm tired of living alone, so you can come by. \r\n \r\nTell me if you are into it \r\n \r\n- Anna','2020-06-08 12:42:51','2020-06-08 12:42:51'),(147,'Аdult onlinе dаting membershiр numbers: https://s.coop/datingsexygirls891669','85669337379','boobabee37@yahoo.com','Sеx dating site, seх оn а first dаtе, sex immеdiatеlу: http://fund.school/datingsexygirls155858','2020-06-08 14:32:34','2020-06-08 14:32:34'),(148,'AnnThods','88238462872','anna1997zam@gmail.com','Hello  neighbor \r\nI saw  you walking  around my house. And I like what I see ;). Are you able to meet? See my pictures here: \r\n \r\nhttp://short.cx/uk \r\n \r\nIm home alone , You can spend night with me. \r\n \r\nLet me Know If you like it \r\n \r\n- Anna','2020-06-09 03:58:02','2020-06-09 03:58:02'),(149,'Dating site for sеx: http://n00.uk/X3Hv8','83722715445','kandtauto1@gmail.com','Dаting site fоr sеx with girls in Australiа: https://short-url-ohrf86o3zd4s.runkit.sh/BhX7g','2020-06-09 11:56:34','2020-06-09 11:56:34'),(150,'Аdult Dаting - Seх Dаting Sitе: https://radyo.ir/62erf','89865457867','garmanysusan@yahoo.com','Adult оnlinе dаting ехсhаnging numbers: http://b360.in/datingsexygirls875942','2020-06-10 02:47:40','2020-06-10 02:47:40'),(151,'AnnThods','84334382453','anna1997zam@gmail.com','Howdy baddy \r\nIm watching  you walking  around my house. You looks nice ;).  Should we meet?  See my Profile here: \r\n \r\nhttp://short.cx/uk \r\n \r\nIm living alone, You can spend night with me. \r\n \r\nLet me Know If you are ready for it \r\n \r\n- Anna','2020-06-10 04:04:12','2020-06-10 04:04:12');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'Blog','blog','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',NULL,1,NULL,2,NULL,'2020-03-15 18:00:14','2020-03-15 18:04:29'),(2,'Life Member','life-member','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',NULL,1,NULL,2,NULL,'2020-03-15 18:00:45','2020-03-15 18:04:26'),(3,'Team','team','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',NULL,1,NULL,2,NULL,'2020-03-15 18:01:04','2020-03-15 18:04:23'),(4,'Membership','membership','Eligibility: Open to all the basic members in the Viber Group or other Nepalese Graduate Entrepreneurs who are willing. It is compulsory for the Executive Committee members and Executive Internal Advisors.','<ul style=\"list-style-type: circle;\">\r\n<li><span style=\"font-weight: 400;\">Life Member</span>\r\n<p>Eligibility: Open to all the basic members in the Viber Group or other Nepalese Graduate Entrepreneurs who are willing. It is compulsory for the Executive Committee members and Executive Internal Advisors.</p>\r\nMembership fee: &pound;50</li>\r\n</ul>\r\n<pre><span style=\"font-weight: 400;\">   Benefits<br /></span></pre>\r\n<ul>\r\n<li>\r\n<p><sup>Non-renewable, only one-time subscription.</sup></p>\r\n</li>\r\n<li>\r\n<p><sup>Voting rights at the Annual General Meeting.</sup></p>\r\n</li>\r\n<li>\r\n<p><sup>Subsidized rates for the GENS UK ADVERT Channels.</sup></p>\r\n</li>\r\n<li>\r\n<p><sup>Membership Certificate</sup></p>\r\n</li>\r\n<li>\r\n<p><sup>Listed on GENS UK WEBSITE.</sup></p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul style=\"list-style-type: circle;\">\r\n<li><span style=\"font-weight: 400;\">Affiliate Member</span>\r\n<p>Eligibility: Open to all the basic members in the Viber Group or other Nepalese Graduate Entrepreneurs who are willing.</p>\r\nMembership fee: &pound;10</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;Benefits:</span></p>\r\n<ul style=\"list-style-type: disc;\">\r\n<li style=\"font-weight: 400;\"><sup><span style=\"font-weight: 400;\">Valid for a year only and needs to be renewed.</span></sup></li>\r\n<li style=\"font-weight: 400;\"><sup><span style=\"font-weight: 400;\">Voting rights at the Annual General Meeting</span></sup></li>\r\n<li style=\"font-weight: 400;\"><sup><span style=\"font-weight: 400;\">Subsidized rates for the GENS UK ADVERT Channels</span></sup></li>\r\n<li style=\"font-weight: 400;\"><sup><span style=\"font-weight: 400;\">Membership Certificate</span></sup></li>\r\n<li style=\"font-weight: 400;\"><sup><span style=\"font-weight: 400;\">Listed on GENS UK WEBSITE</span></sup></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul style=\"list-style-type: circle;\">\r\n<li><span style=\"font-weight: 400;\">Basic Member</span>\r\n<p><span style=\"font-weight: 400;\">The basic membership is open to anyone who is likeminded, eager to help the group to achieve its aims, follow the rules of the group and has entrepreneurial mind-sets or graduate or both.</span></p>\r\n<p><span style=\"font-weight: 400;\">These members can be part of the team as volunteers with no voting rights. Ideally should be a Graduated in UK and engaged in business or aiming for the start up.</span></p>\r\n<p><span style=\"font-weight: 400;\">We welcome the Basic members to participate in the group activities, events and get involved in the Groups communication channels.</span></p>\r\n</li>\r\n<li><span style=\"font-weight: 400;\">Associate</span><br />\r\n<p><span style=\"font-weight: 400;\">The well-wishers or the persons with the specific knowledge or expertise that would be beneficial for the group can be entitled for the Associate Membership upon approval from the Committee. Such members shall at least be either graduate or Entrepreneur.&nbsp; For further information, please contact our team.</span></p>\r\n&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>',1,NULL,2,NULL,'2020-03-15 18:01:28','2020-03-17 07:22:54'),(5,'Our Mission','our-mission','To bring the likeminded Nepalese Graduate Entrepreneurs together thriving connection, sharing of knowledge and ideas, innovative thinking and fostering entrepreneurial opportunities while enhancing the social relationship among the group members in a self-sustained manner','<p><strong>OUR MISSION</strong><br />&ldquo;To bring the likeminded Nepalese Graduate Entrepreneurs together thriving connection, sharing of knowledge and ideas, innovative thinking and fostering entrepreneurial opportunities while enhancing the social relationship among the group members in a self-sustained manner&rdquo;.</p>',1,NULL,2,NULL,'2020-03-15 18:02:03','2020-03-16 08:03:19'),(6,'Our Gallery','our-gallery','So seed seed green that winged cattle in. Gathering thing made fly you\'re no divided deep moved us lan Gathering thing us land years living.\r\n\r\nSo seed seed green that winged cattle in. Gathering thing made fly you\'re no divided deep moved',NULL,1,NULL,2,NULL,'2020-03-15 18:02:31','2020-03-15 18:04:13'),(7,'Become Member','become-member','After becoming the member you can take benifits and invest you money here to earn and growth your business.Their are different types of memner you can go though it.',NULL,1,NULL,2,NULL,'2020-03-15 18:02:55','2020-03-15 18:04:10'),(8,'Our Team','our-team','GENS UK utilizes this platform to enhance and prosper the mutual investment, and such business activities are managed by GENS UK Team or the Co-ordinating Sub Committee.',NULL,1,NULL,2,NULL,'2020-03-15 18:03:26','2020-03-16 08:10:41'),(9,'Event','event','We welcome anyone from the fraternity to be part of our group; lets cherish our challenges, opportunities and determined journey in an amusing manner.',NULL,1,NULL,2,NULL,'2020-03-15 18:03:42','2020-03-16 08:06:36'),(10,'Our Project','our-project','GENS UK is a platform for its Entrepreneur members to invest money in the business ideas and schemes that can generate ample return on investment. Here is the outline of some of our projects.',NULL,1,NULL,2,NULL,'2020-03-15 18:03:56','2020-03-16 08:05:00'),(11,'About Us','about-us','The group that initially started as a Viber group now has an Omni channel presence in the web, social media and search engines','<h3><strong>GRADUATE ENTREPRENEURS NEPALESE SOCIETY UK (GENS UK)</strong></h3>\r\n<p><strong>Our Vision</strong><br />&ldquo;To become a global network of Nepalese Graduate Entrepreneurs contributing towards unlimited entrepreneurial connections, bringing ideas and innovation together and creating mutual business partnerships forming a stable and financially sustainable social organization&rdquo;</p>\r\n<p><strong>Our Story</strong><br />Graduates in United Kingdom who choose to be Entrepreneurs meet up to form a Social and Business Network in 2016. The association becomes stronger with the oncoming members and formally run as a small group with its own functional committee. Today GENS UK has Life Members, Affiliate members, and Basic Members.</p>',1,'content/158436379426804654_155312095028808_6481617686520349143_n.jpg',2,NULL,'2020-03-15 18:06:29','2020-03-16 13:03:14');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_banner`
--

DROP TABLE IF EXISTS `content_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_banner` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_banner`
--

LOCK TABLES `content_banner` WRITE;
/*!40000 ALTER TABLE `content_banner` DISABLE KEYS */;
INSERT INTO `content_banner` VALUES (1,'Home','home','GRADUATE ENTREPRENEURS NEPALESE SOCIETY UK (GENS UK) is a group of Nepalese Entrepreneurs Graduated in UK. The group was formed in Feb 2016. We can be categorized as a Community Organisation.',1,'contentbanner/158434524511.jpg',2,NULL,'2020-03-16 07:29:24','2020-03-16 07:54:05'),(2,'Blog','blog','Blog',1,'contentbanner/158436127711.jpg',1,NULL,'2020-03-16 12:21:17','2020-03-27 14:38:27'),(3,'Project','project','GENS UK is a platform for its Entrepreneur members to invest money in the business ideas and schemes that can generate ample return on investment. Here is the outline of some of our projects',1,'contentbanner/158436138011.jpg',2,NULL,'2020-03-16 12:23:00','2020-03-16 12:27:07'),(4,'About','about','GRADUATE ENTREPRENEURS NEPALESE SOCIETY UK (GENS UK) is a group of Nepalese Entrepreneurs Graduated in UK. The group was formed in Feb 2016. The group runs as an unincorporated organisation with its own Constitution. We can be categorized as a Community Organisation.',1,'contentbanner/158436145211.jpg',2,NULL,'2020-03-16 12:24:12','2020-03-16 12:27:11'),(5,'Contact Us','contact-us','For Inquiries, marketing or support\r\ninfo@gensuk.co.uk\r\ngensuk2016@gmail.com\r\nFor Membership:\r\nmembership@gensuk.co.uk\r\nPhone No. : 02037840366',1,'contentbanner/158436151111.jpg',2,NULL,'2020-03-16 12:25:11','2020-03-16 12:27:14'),(6,'Team','team','GENS UK utilizes this platform to enhance and prosper the mutual investment, and such business activities are managed by GENS UK Team or the Co-ordinating Sub Committee',1,'contentbanner/158436158711.jpg',2,NULL,'2020-03-16 12:26:27','2020-03-16 12:27:18'),(7,'Event','event','GENS UK utilizes this platform to enhance and prosper the mutual investment, and such business activities are managed by GENS UK Team or the Co-ordinating Sub Committee.',1,'contentbanner/158440639811.jpg',1,NULL,'2020-03-17 00:53:18','2020-03-17 00:53:22'),(8,'Membership','membership','The basic membership is open to anyone who is likeminded, eager to help the group to achieve its aims, follow the rules of the group and has entrepreneurial mind-sets or graduate or both.',1,'contentbanner/158440676411.jpg',1,NULL,'2020-03-17 00:59:24','2020-03-17 00:59:28');
/*!40000 ALTER TABLE `content_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `volunters` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'Adipisicing eaque si','adipisicing-eaque-si','2020-03-16','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,'event/1584298700e1.jpg',2,'2020-03-16 14:06:56','2020-03-15 18:58:20','2020-03-16 14:06:56',1),(2,'Annual General Meeting Announcement','proident-dolore-ist','2020-03-20','<h4 style=\"text-align: center;\">Annual General Meeting&nbsp;</h4>\r\n<p>Our Current Executive Committee has completed a year and it\'s time to inject more excitement, commitment and coordination by forming a new active full fledged committee . Please don\'t hesitate and come ahead to take up the positions so that we can move ahead with more determination and enhanced visionary team.</p>\r\n<p>&nbsp;</p>\r\n<p>Venue: Fusion Restaurant Woolwich, London Agenda:</p>\r\n<p>&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><strong>Details for the Annual General Meeting</strong> :</h4>\r\n<h5 style=\"text-align: center;\"><strong>Date:</strong> 22-03-2020 Sunday</h5>\r\n<h6 style=\"text-align: center;\"><strong>Time:</strong> 11.00 Am-2.00 Pm</h6>\r\n<ul>\r\n<li>Annual report</li>\r\n<li>&nbsp;Treasurers Report</li>\r\n<li>&nbsp;GENS UK website launch</li>\r\n<li>&nbsp;GENS UK Executive Committee formation.</li>\r\n</ul>\r\n<div style=\"text-align: left;\">&nbsp;</div>\r\n<p>&nbsp;</p>','Our Current Executive Committee has completed a year and it\'s time to inject more excitement, commitment and coordination by forming a new active full fledged committee',1,'event/1584362098annual_meeting_clip_art.jpg',2,NULL,'2020-03-15 18:59:25','2020-03-16 12:46:03',0),(3,'Buddha Jayanti','buddha-jayanti','2020-05-02','<p>We are participating Buddha Jayanti celebration program on 2nd May 2020 at Trafagal Square, London.</p>','We are participating Buddha Jayanti celebration program on 2nd May 2020 at Trafagal Square, London.',1,'event/1584365996buddha.jpg',1,NULL,'2020-03-16 13:39:56','2020-03-16 13:41:20',1);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (3,'GENS UK Executive Committee Meeting on 28 Nov 2018',1,'gallery/158436317646942698_277577012802315_5265062062974828544_o.jpg','GENS-UK-Executive-Committee-Meeting-on-28-Nov-2018','2020-03-16 12:52:56','2020-03-16 12:53:03'),(4,'E-Nepali Bazaar pre launch meeting at BG',1,'gallery/158436331930516327_175043006389050_8897747472105865216_o.jpg','E-Nepali-Bazaar-pre-launch-meeting-at-BG','2020-03-16 12:55:19','2020-03-16 12:56:05'),(5,'Celebrating 2560th Buddha Jayanti',1,'gallery/158436342926804848_155692114990806_6318222647539635331_n.jpg','Celebrating-2560th-Buddha-Jayanti','2020-03-16 12:57:09','2020-03-16 12:57:55'),(6,'GENS UK members volunteered at MCC vs Nepal',1,'gallery/158436354526733816_155673088326042_4357380995773406527_n.jpg','GENS-UK-members-volunteered-at-MCC-vs-Nepal','2020-03-16 12:59:05','2020-03-16 12:59:12'),(7,'Growing Together',1,'gallery/158436364226804654_155312095028808_6481617686520349143_n.jpg','Growing-Together','2020-03-16 13:00:42','2020-03-16 13:00:48'),(8,'Meeting at The Old Court',1,'gallery/158436372729134098_168231150403569_5186680129593540608_o.jpg','Meeting-at-The-Old-Court','2020-03-16 13:02:07','2020-03-16 13:02:17'),(9,'Gens Uk Family',1,'gallery/1585298553GENS UK  BEACH TOUR -19.jpg','Gens-Uk-Family','2020-03-27 08:42:33','2020-03-27 08:42:40');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` VALUES (1,1,'galleryImages/1/1584297859_g1.jpg','2020-03-16 12:52:37','2020-03-15 18:44:19','2020-03-16 12:52:37'),(2,1,'galleryImages/1/1584297859_g3.jpg','2020-03-16 12:52:37','2020-03-15 18:44:19','2020-03-16 12:52:37'),(3,1,'galleryImages/1/1584297860_g4.jpg','2020-03-16 12:52:37','2020-03-15 18:44:20','2020-03-16 12:52:37'),(4,1,'galleryImages/1/1584297860_g2.jpg','2020-03-16 12:52:37','2020-03-15 18:44:20','2020-03-16 12:52:37'),(5,2,'galleryImages/2/1584297890_g1.jpg','2020-03-16 12:52:32','2020-03-15 18:44:50','2020-03-16 12:52:32'),(6,2,'galleryImages/2/1584297891_g3.jpg','2020-03-16 12:52:32','2020-03-15 18:44:51','2020-03-16 12:52:32'),(7,2,'galleryImages/2/1584297891_g2.jpg','2020-03-16 12:52:32','2020-03-15 18:44:51','2020-03-16 12:52:32'),(8,3,'galleryImages/3/1584363213_26733816_155673088326042_4357380995773406527_n.jpg',NULL,'2020-03-16 12:53:33','2020-03-16 12:53:33'),(9,3,'galleryImages/3/1584363213_26804654_155312095028808_6481617686520349143_n.jpg',NULL,'2020-03-16 12:53:33','2020-03-16 12:53:33'),(10,3,'galleryImages/3/1584363218_28164353_163526290874055_8235426012856280250_o.jpg',NULL,'2020-03-16 12:53:38','2020-03-16 12:53:38'),(11,3,'galleryImages/3/1584363224_26804848_155692114990806_6318222647539635331_n.jpg',NULL,'2020-03-16 12:53:44','2020-03-16 12:53:44'),(12,3,'galleryImages/3/1584363224_29134098_168231150403569_5186680129593540608_o.jpg',NULL,'2020-03-16 12:53:44','2020-03-16 12:53:44'),(13,3,'galleryImages/3/1584363227_30516327_175043006389050_8897747472105865216_o.jpg',NULL,'2020-03-16 12:53:47','2020-03-16 12:53:47'),(14,4,'galleryImages/4/1584363350_29134098_168231150403569_5186680129593540608_o.jpg',NULL,'2020-03-16 12:55:50','2020-03-16 12:55:50'),(15,4,'galleryImages/4/1584363351_28164353_163526290874055_8235426012856280250_o.jpg',NULL,'2020-03-16 12:55:51','2020-03-16 12:55:51'),(16,4,'galleryImages/4/1584363352_30516327_175043006389050_8897747472105865216_o.jpg',NULL,'2020-03-16 12:55:52','2020-03-16 12:55:52'),(17,4,'galleryImages/4/1584363355_46942698_277577012802315_5265062062974828544_o.jpg',NULL,'2020-03-16 12:55:55','2020-03-16 12:55:55'),(18,5,'galleryImages/5/1584363498_28164353_163526290874055_8235426012856280250_o.jpg',NULL,'2020-03-16 12:58:18','2020-03-16 12:58:18'),(19,5,'galleryImages/5/1584363500_29134098_168231150403569_5186680129593540608_o.jpg',NULL,'2020-03-16 12:58:20','2020-03-16 12:58:20'),(20,5,'galleryImages/5/1584363500_26804848_155692114990806_6318222647539635331_n.jpg',NULL,'2020-03-16 12:58:20','2020-03-16 12:58:20'),(21,5,'galleryImages/5/1584363503_30516327_175043006389050_8897747472105865216_o.jpg',NULL,'2020-03-16 12:58:23','2020-03-16 12:58:23'),(22,6,'galleryImages/6/1584363571_26733816_155673088326042_4357380995773406527_n.jpg',NULL,'2020-03-16 12:59:31','2020-03-16 12:59:31'),(23,6,'galleryImages/6/1584363580_26804654_155312095028808_6481617686520349143_n.jpg',NULL,'2020-03-16 12:59:40','2020-03-16 12:59:40'),(24,6,'galleryImages/6/1584363592_26804848_155692114990806_6318222647539635331_n.jpg',NULL,'2020-03-16 12:59:52','2020-03-16 12:59:52'),(25,6,'galleryImages/6/1584363592_28164353_163526290874055_8235426012856280250_o.jpg',NULL,'2020-03-16 12:59:52','2020-03-16 12:59:52'),(26,6,'galleryImages/6/1584363594_29134098_168231150403569_5186680129593540608_o.jpg',NULL,'2020-03-16 12:59:54','2020-03-16 12:59:54'),(27,6,'galleryImages/6/1584363597_26804654_155312095028808_6481617686520349143_n.jpg',NULL,'2020-03-16 12:59:57','2020-03-16 12:59:57'),(28,7,'galleryImages/7/1584363664_26804654_155312095028808_6481617686520349143_n.jpg',NULL,'2020-03-16 13:01:04','2020-03-16 13:01:04'),(29,7,'galleryImages/7/1584363664_26804848_155692114990806_6318222647539635331_n.jpg',NULL,'2020-03-16 13:01:04','2020-03-16 13:01:04'),(30,7,'galleryImages/7/1584363664_28164353_163526290874055_8235426012856280250_o.jpg',NULL,'2020-03-16 13:01:04','2020-03-16 13:01:04'),(31,7,'galleryImages/7/1584363665_29134098_168231150403569_5186680129593540608_o.jpg',NULL,'2020-03-16 13:01:05','2020-03-16 13:01:05'),(32,7,'galleryImages/7/1584363665_30516327_175043006389050_8897747472105865216_o.jpg',NULL,'2020-03-16 13:01:05','2020-03-16 13:01:05'),(33,8,'galleryImages/8/1584363761_26804654_155312095028808_6481617686520349143_n.jpg',NULL,'2020-03-16 13:02:41','2020-03-16 13:02:41'),(34,8,'galleryImages/8/1584363761_26733816_155673088326042_4357380995773406527_n.jpg',NULL,'2020-03-16 13:02:41','2020-03-16 13:02:41'),(35,8,'galleryImages/8/1584363766_29134098_168231150403569_5186680129593540608_o.jpg',NULL,'2020-03-16 13:02:46','2020-03-16 13:02:46'),(36,8,'galleryImages/8/1584363767_26804848_155692114990806_6318222647539635331_n.jpg',NULL,'2020-03-16 13:02:47','2020-03-16 13:02:47'),(37,8,'galleryImages/8/1584363768_46942698_277577012802315_5265062062974828544_o.jpg',NULL,'2020-03-16 13:02:48','2020-03-16 13:02:48'),(38,9,'galleryImages/9/1585298590_GENS UK  17.jpg',NULL,'2020-03-27 08:43:10','2020-03-27 08:43:10'),(39,9,'galleryImages/9/1585298596_GENS UK  BEACH TOUR -19 (1).jpg',NULL,'2020-03-27 08:43:16','2020-03-27 08:43:16'),(40,9,'galleryImages/9/1585298598_GENS TOUR 2018.jpg',NULL,'2020-03-27 08:43:18','2020-03-27 08:43:18'),(41,9,'galleryImages/9/1585298601_GENS UK  BEACH TOUR -19.jpg','2020-03-27 08:44:29','2020-03-27 08:43:21','2020-03-27 08:44:29'),(42,9,'galleryImages/9/1585298612_GENS UK 17 -1.jpg',NULL,'2020-03-27 08:43:32','2020-03-27 08:43:32'),(43,9,'galleryImages/9/1585298614_GENS UK 2018 -P.jpg',NULL,'2020-03-27 08:43:34','2020-03-27 08:43:34'),(44,9,'galleryImages/9/1585298614_GENS UK NEPALI EBAZAAR -2.jpg',NULL,'2020-03-27 08:43:34','2020-03-27 08:43:34'),(45,9,'galleryImages/9/1585298630_GENS-UK-2019 COMMITTEE.png',NULL,'2020-03-27 08:43:50','2020-03-27 08:43:50'),(46,9,'galleryImages/9/1585298630_gens-uk-ebazaar png.png',NULL,'2020-03-27 08:43:50','2020-03-27 08:43:50');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `investors`
--

DROP TABLE IF EXISTS `investors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `investors`
--

LOCK TABLES `investors` WRITE;
/*!40000 ALTER TABLE `investors` DISABLE KEYS */;
INSERT INTO `investors` VALUES (1,'Bhupendra Sapkota','9860921715','nijbhup27@gmail.com','Perferendis sint omn','2020-03-17 11:02:56','2020-03-17 11:02:56','2'),(2,'iNzDAbSYhtvT','2256878485','johnmoore10671@gmail.com','aBpUqewPAktS','2020-04-10 21:47:14','2020-04-10 21:47:14','4'),(3,'eGuzcRkdQBjntLH','8555081973','johnmoore10671@gmail.com','pmQlwWAvTbUDENzq','2020-04-10 21:47:15','2020-04-10 21:47:15','4'),(4,'OHxZiPBfLG','6705259206','hawkinsthomasina682@gmail.com','yIExvTroJ','2020-05-22 23:45:25','2020-05-22 23:45:25','4'),(5,'xEfTcrqdAWpSkmGy','2859680941','hawkinsthomasina682@gmail.com','XjGuYCnqDAK','2020-05-22 23:45:30','2020-05-22 23:45:30','4');
/*!40000 ALTER TABLE `investors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `life_members`
--

DROP TABLE IF EXISTS `life_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `life_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `display_orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `life_members`
--

LOCK TABLES `life_members` WRITE;
/*!40000 ALTER TABLE `life_members` DISABLE KEYS */;
INSERT INTO `life_members` VALUES (1,'19',1,NULL,NULL,'2020-03-16 12:12:21','2020-03-16 12:12:28'),(2,'9',1,NULL,NULL,'2020-03-16 12:12:35','2020-03-16 12:16:08'),(3,'13',1,NULL,NULL,'2020-03-16 12:12:43','2020-03-16 12:16:06'),(4,'11',0,NULL,'2020-03-16 12:15:31','2020-03-16 12:12:52','2020-03-16 12:15:31'),(5,'11',1,NULL,NULL,'2020-03-16 12:13:02','2020-03-16 12:15:35'),(6,'17',1,NULL,NULL,'2020-03-16 12:13:18','2020-03-16 12:15:38'),(7,'10',0,NULL,'2020-03-16 12:13:52','2020-03-16 12:13:32','2020-03-16 12:13:52'),(8,'10',1,NULL,NULL,'2020-03-16 12:13:42','2020-03-16 12:15:41'),(9,'15',1,NULL,NULL,'2020-03-16 12:14:17','2020-03-16 12:15:44'),(10,'12',1,NULL,NULL,'2020-03-16 12:14:28','2020-03-16 12:15:46'),(11,'12',0,NULL,'2020-03-16 12:14:43','2020-03-16 12:14:37','2020-03-16 12:14:43'),(12,'18',1,NULL,NULL,'2020-03-16 12:14:54','2020-03-16 12:15:50'),(13,'14',1,NULL,NULL,'2020-03-16 12:15:08','2020-03-16 12:15:54'),(14,'7',1,NULL,NULL,'2020-03-16 12:15:15','2020-03-16 12:15:57'),(15,'16',1,NULL,NULL,'2020-03-16 12:15:23','2020-03-16 12:16:00'),(16,'40',1,NULL,NULL,'2020-03-17 05:42:35','2020-03-17 05:42:41'),(17,'47',1,NULL,NULL,'2020-03-17 05:55:16','2020-03-17 05:55:21');
/*!40000 ALTER TABLE `life_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membership`
--

DROP TABLE IF EXISTS `membership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membership` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership`
--

LOCK TABLES `membership` WRITE;
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
INSERT INTO `membership` VALUES (1,'Deepak Gaire','5, Burrage Place','07832904242','07832904242','deep_gaire@yahoo.com','2015-02-02','Male','£20','Life Member','Deepak Gaire','SE18 7BG',NULL,'2020-03-16 13:54:03','2020-03-16 13:54:03');
/*!40000 ALTER TABLE `membership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2020_03_13_052416_create_team_table',1),(4,'2020_03_13_073144_create_content_banner_table',1),(5,'2020_03_13_093631_create_event_table',1),(6,'2020_03_14_041429_create_project_table',1),(7,'2020_03_14_062423_create_gallery_table',1),(8,'2020_03_14_062757_create_gallery_images_table',1),(9,'2020_03_14_095500_create_content_table',1),(10,'2020_03_14_110637_create_setting_table',1),(11,'2020_03_14_112613_create_blog_categories_table',1),(12,'2020_03_14_114919_create_blog_table',1),(13,'2020_03_14_231905_add_investors_to_project',1),(14,'2020_03_14_233943_add_volunters_to_event',1),(15,'2020_03_15_043921_add_date_to_team',1),(16,'2020_03_15_060540_create_life_members_table',1),(17,'2020_03_15_085422_create_contact_table',1),(18,'2020_03_15_094345_create_volunter_table',1),(19,'2020_03_15_094438_create_investors_table',1),(20,'2020_03_15_095632_add_volunter_id_to_event',1),(21,'2020_03_15_095755_add_project_id_to_project',1),(22,'2020_03_15_102940_create_membership_table',1),(23,'2020_03_17_085521_add_event_id_to_volunter',2),(24,'2020_03_17_085620_add_project_id_to_investors',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `investors` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'Ipsum rerum optio u','ipsum-rerum-optio-u','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,'project/1584298854fc1.jpg',2,NULL,'2020-03-15 19:00:54','2020-03-27 09:00:27',1),(2,'Adipisci et numquam','adipisci-et-numquam','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,'project/1584298876fc2.jpg',2,NULL,'2020-03-15 19:01:16','2020-03-27 09:00:23',1),(3,'Gens Technology','gens-technology','<p>Nepali E Bazaar - Nepalese Business Community in UK</p>','Nepali E Bazaar - Nepalese Business Community in UK',1,'project/1584367187nepaliebazaar.jpg',1,NULL,'2020-03-16 13:59:47','2020-03-27 08:53:45',1),(4,'Gens Technology','gens-technology-1','<p>Gens Technology is your technical partner who offers extensive range of web development and marketing services. Our innovative team helps&nbsp; you in creating beautiful interactive designs and developing custom web and mobile applications.</p>','Gens Technology is a software development company in UK.',1,'project/1585299605genstech.png',1,NULL,'2020-03-27 09:00:05','2020-03-27 09:00:13',1);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'Email','info@gensuk.com','email',1,NULL,'2020-03-15 18:12:21','2020-03-15 18:12:29'),(2,'Phone','02037840366','phone',1,NULL,'2020-03-15 18:12:38','2020-03-15 18:12:46'),(3,'Address','44 Plumstead High St, Plumstead, London SE18 1SL','address',1,NULL,'2020-03-15 18:12:58','2020-03-27 09:14:15'),(4,'Facebook','http://www.gensuk.co.uk/investment-opportunities/','facebook',1,NULL,'2020-03-15 18:13:18','2020-03-15 18:13:49'),(5,'Twitter','http://www.gensuk.co.uk/investment-opportunities/','twitter',1,NULL,'2020-03-15 18:13:29','2020-03-15 18:13:46'),(6,'Linkedin','http://www.gensuk.co.uk/investment-opportunities/','linkedin',1,NULL,'2020-03-15 18:13:39','2020-03-15 18:13:43'),(7,'Cc of Email','info@gensuk.co.uk','from-admin',1,NULL,'2020-03-17 11:08:39','2020-03-20 03:22:24'),(8,'Reply Email','info@gensuk.co.uk','reply-email',1,NULL,'2020-03-17 11:08:51','2020-03-20 03:22:09'),(9,'Company Name','Gens Technology','company-name',1,NULL,'2020-03-17 11:09:05','2020-03-17 11:09:12');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'BISNU KUMAR CHONGBANG','PRESIDENT','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584296825v1.jpg','bisnu-kumar-chongbang',NULL,NULL,NULL,NULL,NULL,2,'2020-03-16 08:52:41','2020-03-15 18:27:05','2020-03-16 08:52:41','2020-03-16'),(2,'TILAK BHATTARAI','VICE PRESIDENT','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584354711TILAK BHATTARAI.PNG','tilak-bhattarai','8','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',2,'2020-03-16 11:57:50','2020-03-15 18:28:27','2020-03-16 11:57:50','2020-03-16'),(3,'SHYAM KHATRI','VICE PRESIDENT','PROFILE: VICE PRESIDENT – GENS UK 2019-2020, DIRECTOR ACE RECRUITMENT LTD, DIRECTOR – NEPALI EBAZAAR, HEAD OF MARKETING- GENS TECHNOLOGY)',1,'team/1584354852SHYAM KHATRI.PNG','shyam-khatri','6','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',2,'2020-03-16 12:02:01','2020-03-15 18:29:22','2020-03-16 12:02:01','2020-03-18'),(4,'DIPAK GAIRE','GENERAL SECRETARY','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584354676DIPAK GAIRE.PNG','dipak-gaire','1','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',2,'2020-03-16 12:02:30','2020-03-15 18:30:19','2020-03-16 12:02:30','2020-03-16'),(5,'LEKHNATH GAIRE','CHAIRMAN','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584297089v1.jpg','lekhnath-gaire','3','https://laracasts.com/discuss/channels/general-discussion/url-validation','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',2,'2020-03-16 12:02:07','2020-03-15 18:31:29','2020-03-16 12:02:07','2019-07-11'),(6,'LAXMAN PANDEY','VICE CHAIRMAN','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584354903LAXMAN PANDEY.PNG','laxman-pandey','7','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',2,'2020-03-16 11:57:58','2020-03-15 18:32:42','2020-03-16 11:57:58','2019-09-26'),(7,'SHALIK SAPKOTA','CHAIRMAN','President  – GENS 2017 -2018, Director- Neplai Ebazaar ,  Gens Technology',1,'team/1584353298SHALIK SAPKOTA 1.PNG','shalik-sapkota','9','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-15 18:33:54','2020-03-17 05:52:12','2018-12-30'),(8,'BISNU KUMAR CHONGBANG','VICE CHARIMAN','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584348529BISNU -1.jpg','bisnu-kumar-chongbang-1','2','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',2,'2020-03-16 12:02:16','2020-03-15 18:47:02','2020-03-16 12:02:16','2020-03-18'),(9,'BISNU K. CHONGBANG','VICE CHARIMAN','President – Gens 2019-2020, Chairman –  Gens Technology, Director – Gurkha Tourim Ltd, Travel Consultant, Nepali Ebazaar',1,'team/1584505205BISNU KUMAR CHONGBANG -2.PNG','bisnu-kumar-chongbang','1','https://loremipsum.io/','info@bgbusinessservices.co.uk','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 09:08:51','2020-03-18 04:24:12','2018-12-29'),(10,'LEKHNATH GAIRE','GENERAL SECRETARY','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584505232LEKHNATH GAIRE.PNG','lekhnath-gaire-1','1','https://loremipsum.io/','info@bgbusinessservices.co.uk','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 09:10:18','2020-03-18 04:20:32','2018-12-28'),(11,'GANESH THAPA','TRESSURER','Tressure - Gens Gk, Director- Bg Bussiness,Nepali Ebazaar Head Of IT- Gens Technology',1,'team/1584350367GANESH JI.jpg','ganesh-thapa','0','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 09:19:27','2020-03-17 05:35:01','2018-12-27'),(12,'RAJENDRA BASNET','MEMBER','Member- Gens Uk 2019- 2020, Director: Namaste A2Z Ltd, Nepali Ebazaar Gens Technology',1,'team/1584350505RAJENDRA BASNET.PNG','rajendra-basnet','5','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 09:21:45','2020-03-17 06:39:23','2018-09-12'),(13,'DIPAK GAIRE','MEMBER','General Secrertary - Gens Uk – 2019-2020, Director- Business Tentacles, Managing Director, Gens Technology',1,'team/1584350592DIPAK GAIRE.PNG','dipak-gaire-1','7','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 09:23:12','2020-03-17 06:25:41','2018-07-19'),(14,'SANTOSH KARKI','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584350752v1.jpg','santosh-karki','6','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',2,NULL,'2020-03-16 09:25:52','2020-03-17 01:39:13','2018-09-12'),(15,'RABINDRA RANABHAT','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584505353RABINDRA RANABHAT.PNG','rabindra-ranabhat','8','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 09:55:25','2020-03-18 04:22:33','2018-09-05'),(16,'SHYAM KHATRI','MEMBER','Vice President – Gens Uk 2019-2020, Director- Ace Recruitment Ltd,  Nepali Ebazaar, Head Of Marketing- Gens Technology',1,'team/1584352644SHYAM KHATRI.PNG','shyam-khatri-1','7','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 09:57:24','2020-03-17 06:38:31','2018-09-06'),(17,'LAXMAN PANDY','MEMBER','Advisor- Gens Uk 2019-2020, Director –Nepali Ebazaar ,Gens Technology,  LJP Promotion, Chairperson- Raising  Hand Donation  Trust, Manager- Ambience Care Ltd',1,'team/1584505379LAXMAN PANDEY1.PNG','laxman-pandy','8','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 09:59:28','2020-03-18 04:22:59','2018-08-23'),(18,'RAJENDRA BHANDARI','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584505259RAJENDRA BHANDARI.PNG','rajendra-bhandari','2','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 10:01:40','2020-03-18 04:20:59','2018-10-03'),(19,'BIJAY SHRESTHA','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',0,'team/1584352989v2.jpg','bijay-shrestha','3','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',2,NULL,'2020-03-16 10:03:09','2020-03-17 01:39:13','2018-09-21'),(20,'LEKHNATH GAIRE','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',0,'team/1584353881v4.jpg','lekhnath-gaire-2','17',NULL,'depu@mailinator.com',NULL,NULL,2,'2020-03-16 11:11:31','2020-03-16 10:18:01','2020-03-16 11:11:31',NULL),(21,'RAM THAPA','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',0,'team/1584354116RAM THAPA.PNG','ram-thapa','0',NULL,NULL,NULL,NULL,2,'2020-03-16 12:02:25','2020-03-16 10:21:56','2020-03-16 12:02:25','2020-03-17'),(22,'RAJENDRA BHANDARI','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',1,'team/1584505144RAJENDRA BHANDARI.PNG','rajendra-bhandari-1','5','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 13:25:36','2020-03-18 04:19:04','2019-10-18'),(23,'DEEPAK GAIRE','MEMBER','General Secrertary - Gens Uk – 2019-2020, Director- Business Tentacles, Managing Director, Gens Technology',1,'team/1584365293DIPAK GAIRE.PNG','dipak-gaire','4','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-16 13:28:13','2020-03-17 06:25:57','2019-06-15'),(24,'Leeladhar Poudel','member','Leeladhar Poudel is member of Gens UK Executive Committee',0,'team/1584366462leela.jpg','leeladhar-poudel',NULL,'https://www.facebook.com/leeladhar.poudel.1','leeladhar@gensuk.co.uk',NULL,NULL,1,'2020-03-17 01:10:50','2020-03-16 13:47:42','2020-03-17 01:10:50','2020-03-16'),(25,'SHYAM KHATRI','MEMBER','Vice President – Gens Uk 2019-2020, Director- Ace Recruitment Ltd,  Nepali Ebazaar, Head Of Marketing- Gens Technology',1,'team/1584407544SHYAM KHATRI.PNG','shyam-khatri','3',NULL,NULL,NULL,NULL,1,NULL,'2020-03-17 01:12:24','2020-03-17 06:38:17','2019-02-08'),(26,'RABINDRA RANABHAT','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',1,'team/1584505169RABINDRA RANABHAT.PNG','rabindra-ranabhat-1','8','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 01:17:45','2020-03-18 04:19:29','2019-09-18'),(27,'SANTOSH KARKI','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',1,'team/1584408113v3.jpg','santosh-karki-1','6','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 01:19:17','2020-03-17 02:02:37','2019-10-17'),(28,'RAJENDRA BASNET','MEMBER','Member- Gens Uk 2019- 2020, Director: Namaste A2Z Ltd, Nepali Ebazaar Gens Technology',1,'team/1584408078RAJENDRA BASNET.PNG','rajendra-basnet-1','2','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 01:21:18','2020-03-17 06:39:07','2019-10-24'),(29,'GANESH THAPA','TRESSURER','Tressure - Gens Gk, Director- Bg Bussiness,Nepali Ebazaar Head Of IT- Gens Technology',1,'team/1584408200GANESH JI.jpg','ganesh-thapa-1','7','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 01:23:20','2020-03-17 05:28:03','2019-12-27'),(30,'TILAK BHATTARAI','GENERAL SECREATARY','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',1,'team/1584408433TILAK BHATTARAI.PNG','tilak-bhattarai','1','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 01:27:13','2020-03-17 05:28:45','2019-12-28'),(31,'LAXMAN PANDEY','VICE CHAIRMAN','Advisor- Gens Uk 2019-2020, Director –Nepali Ebazaar ,Gens Technology,  LJP Promotion, Chairperson- Raising  Hand Donation  Trust, Manager- Ambience Care Ltd',1,'team/1584505073LAXMAN PANDEY1.PNG','laxman-pandey','0','https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 01:32:22','2020-03-18 04:17:53','2019-12-29'),(32,'BISNU K. CHONGBANG','VICE CHARIMAN','President – Gens 2019-2020, Chairman –  Gens Technology, Director – Gurkha Tourim Ltd, Travel Consultant, Nepali Ebazaar',1,'team/1584505116BISNU KUMAR CHONGBANG -2.PNG','bisnu-kumar-chongbang-1','9','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 01:34:24','2020-03-18 04:23:54','2019-12-29'),(33,'LEKHNATH GAIRE','CHAIRMAN','Persident - Gens Uk, 2018-2019, Director  – L& K Business Associates , CEO- Nepali  Ebazaar \r\n.',1,'team/1584505037LEKHNATH GAIRE.PNG','lekhnath-gaire','4','https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 01:36:56','2020-03-18 04:17:17','2019-12-30'),(34,'RABINDRA RANABHAT','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',1,'team/1584505015RABINDRA RANABHAT.PNG','rabindra-ranabhat-2',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 02:08:55','2020-03-18 04:16:55','2020-03-01'),(35,'RAJENDRA BASNET','MEMBER','Member- Gens Uk 2019- 2020, Director: Namaste A2Z Ltd, Nepali Ebazaar Gens Technology',1,'team/1584411273RAJENDRA BASNET.PNG','rajendra-basnet-2',NULL,'https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 02:14:33','2020-03-17 03:55:08','2020-03-02'),(36,'RAJENDRA BHANDARI','MEMBER','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',1,'team/1584504268RAJENDRA BHANDARI.PNG','rajendra-bhandari-2',NULL,'https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 03:03:04','2020-03-18 04:04:28','2020-03-03'),(37,'KISHOR LIMBU','MEMBER','Member- Gens Uk, Director- Gens Technology',1,'team/1584414782KISHOR LIMBU.jpg','kishor-limbu',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 03:13:02','2020-03-17 03:52:50','2020-03-03'),(38,'RAM THAPA','MEMBER','Member – Gens Uk, Director- Gens Technology',1,'team/1584414871RAM THAPA.PNG','ram-thapa',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 03:14:31','2020-03-17 03:50:54','2020-03-04'),(39,'SANTOSH KARKI','MEMBER','Member  – Gens Uk, Director – Namaste A2Z, Nepali Ebazaar',1,'team/1584415053v1.jpg','santosh-karki-2',NULL,'https://laracasts.com/discuss/channels/general-discussion/url-validation','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 03:17:33','2020-03-17 03:49:05','2020-03-04'),(40,'SURYA BIKRAM KC','MEMBER','Member – Gens Uk, 2019 -2020, Director & Charterred Accounted- Surya & Co Ltd, Nepali Ebazaar',1,'team/1584504238SURYA  BIKRAM KC.jpg','surya-bikram-kc',NULL,'https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 03:22:27','2020-03-18 04:03:58','2020-03-04'),(41,'GANESH THAPA','TRESSSURER','Tressure - Gens Gk, Director- Bg Bussiness,Nepali Ebazaar Head Of IT- Gens Technology',1,'team/1584415561GANESH JI.jpg','ganesh-thapa-2',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 03:26:01','2020-03-17 03:47:37','2020-03-05'),(42,'TILAK BHATTARAI','GENERAL SECREATARY','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',1,'team/1584415700TILAK BHATTARAI.PNG','tilak-bhattarai-1',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,'2020-03-17 03:37:19','2020-03-17 03:28:20','2020-03-17 03:37:19','2020-03-06'),(43,'DIPAK GAIRE','GENERAL SECRETARY','General Secrertary - Gens Uk – 2019-2020, Director- Business Tentacles, Managing Director, Gens Technology',1,'team/1584415946DIPAK GAIRE.PNG','dipak-gaire-2',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 03:32:26','2020-03-17 03:46:22','2020-03-07'),(44,'SHYAM KHATRI','VICE PRESIDENT','Vice President – Gens Uk 2019-2020, Director- Ace Recruitment Ltd,  Nepali Ebazaar, Head Of Marketing- Gens Technology',1,'team/1584416081SHYAM KHATRI.PNG','shyam-khatri-2',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 03:34:41','2020-03-17 03:44:53','2020-03-08'),(45,'TILAK BHATTARAI','VICE PRESIDENT','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',1,'team/1584416198TILAK BHATTARAI.PNG','tilak-bhattarai-2',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 03:36:38','2020-03-17 03:37:39','2020-03-09'),(46,'BISNU K. CHONGBANG','PRESIDENT','President – Gens 2019-2020, Chairman –  Gens Technology, Director – Gurkha Tourim Ltd, Travel Consultant, Nepali Ebazaar',1,'team/1584504087BISNU KUMAR CHONGBANG -2.PNG','bisnu-kumar-chongbang-2',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 03:41:47','2020-03-18 04:15:32','2020-03-10'),(47,'MAINA SHARMA','Executive Advisors','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',1,'team/1584504135MAINA SHARMA -.PNG','maina-sharma',NULL,'https://loremipsum.io/','depu@mailinator.com','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 05:45:38','2020-03-18 04:02:15','2020-03-06'),(48,'LEKHNATHA GAIRE','Executive Advisors','Persident - Gens Uk, 2018-2019, Director  – L& K Business Associates , CEO- Nepali  Ebazaar',1,'team/1584504155LEKHNATH GAIRE.PNG','lekhnatha-gaire',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 05:50:37','2020-03-18 04:02:35','2020-03-06'),(49,'SHALIK SAPKOTA','Executive Advisors','President  – GENS 2017 -2018, Director- Neplai Ebazaar ,  Gens Technology',1,'team/1584424334SHALIK SAPKOTA 1.PNG','shalik-sapkota-1',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 05:52:14','2020-03-17 05:53:53','2020-03-06'),(50,'LAXMAN PANDEY','Executive Advisors','Advisor- Gens Uk 2019-2020, Director –Nepali Ebazaar ,Gens Technology,  LJP Promotion, Chairperson- Raising  Hand Donation  Trust, Manager- Ambience Care Ltd',1,'team/1584504179LAXMAN PANDEY1.PNG','laxman-pandey-1',NULL,'https://loremipsum.io/','nokixat@mailinator.net','https://loremipsum.io/','https://loremipsum.io/',1,NULL,'2020-03-17 05:53:41','2020-03-18 04:02:59','2020-03-06');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gens Uk','gensuk@gmail.com',NULL,'$2y$10$.j/fC6jwyFQh5uFScgiaP.5NtLQg9lUSWPieT9Q1xM7DqUzHOGtJ.',NULL,NULL,NULL),(2,'Gens Uk','nijbhup27@gmail.com',NULL,'$2y$10$Qnbb7iY5.z4G8UhSS7WSUewdMuGqKmDQ55pAQKjp8cSTElkFVqc7e',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volunter`
--

DROP TABLE IF EXISTS `volunter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volunter` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volunter`
--

LOCK TABLES `volunter` WRITE;
/*!40000 ALTER TABLE `volunter` DISABLE KEYS */;
INSERT INTO `volunter` VALUES (1,'Bhupendra Sapkota','9860921715','nijbhup27@gmail.com','Expedita aut eum cul','2020-03-17 11:02:37','2020-03-17 11:02:37','3');
/*!40000 ALTER TABLE `volunter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-10  4:29:19
