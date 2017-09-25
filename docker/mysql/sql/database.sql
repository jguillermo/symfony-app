-- MySQL dump 10.13  Distrib 5.6.37, for Linux (x86_64)
--
-- Host: localhost    Database: dbproject
-- ------------------------------------------------------
-- Server version	5.6.37

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
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `user_id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UNIQ_5D9F75A124A232CF` (`user_name`),
  KEY `misa_employee_idx_user_name` (`user_name`),
  CONSTRAINT `FK_5D9F75A1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES ('23a0fb90-ce4e-426c-8c4e-d5a1c4582ed7',2,'Z8KYwpdpw4jDg3JoZMKUwpfCmMOHYWvClG3CmcKSwp7CmmjCmcKQwppqwplkwplsaXFowprDiXA=','$2y$15$tcW1HekM1s/RAy2jr2I85u7X5jz5qqvy4cFerjeotGBHWmCSc2nzG'),('3622c9a2-e88e-47da-b02c-b73ee6e1de43',2,'aMKbaGvDhcKawppqZMKWasKcw4dha8KZwpvCl8KSw4hnZsKXwpDCmGxrwpjCm27CmWrCmsKawpls','$2y$15$DA5ASHFd1c/OsxrulEZ4Oexdc8B0e6YyS/DHQHS04H0QZbpoTomc.'),('3b4880dd-6462-451e-a38f-2e635a4cb22d',2,'aMOHanHCmsKRwp3CnGRnZsKawpRha8KXaMKbwpLDh2pswprCkGjCmm5ma8KZaMKcwphnwpfCnQ==','$2y$15$BvTwpe4fgl5vCyqCi9gAL.iCE/KyX3QRjBYFMPdYv8d4uJkksDTb6'),('4d06bca6-017e-496b-97d8-dbb6d64dc4ed',1,'wqrDmMKbwqvCj8OCwp3CpcKgwp8=','$2y$15$qFen4HmSUcwZSTDqlKh4W.Vw.QlPxCdlKVSzeXJO21BP8w.oxLfw.'),('4e53eff3-f6f4-4795-8d12-e2aff2433dc5',2,'acOKa2zDh8OHwp9rZMKXaMOKwpZha8KZcGvCksKewptlZsKQwptnwpnCmcKcamhsacKZw4hu','$2y$15$HG9hl3j44XOl/uwiI6fVSe48MyRbFBC0M.Lv7G4ffbHWezxGayh8S'),('59a9a590-4592-48b8-95ff-a4895dc0b796',2,'asKewpdyw4PClnJoZGVnwp3ClGFrwprCmW7CksKfbMKawprCkMKXaXBsa8Kcwpdpwphswp5v','$2y$15$JpXwroR6FugPAhfH6.C4COMT86vcrIaXI.0mC8kH8WSvQXXLriLkW'),('5fd66e97-202b-4d93-ac9e-09f70449f5a9',2,'asOLwppvwpjDhnJvZGNiwpbDhGFrw4ZwacKSw4fCmm3CmcKQZm7CnmpmbGhywpxqw4Zy','$2y$15$KUuOlfc9NXLT2Cp5EzpzQezYOvi1HsZL4lAmgp0EhNPGHqiSoVtH.'),('662fc8bb-f96d-4e1a-a439-4caad1e0b6d6',2,'a8KbaMKfw4XCmcKbwppkwpdrwprDhmFrw4dowpfCksOHa2dtwpBqwpjCmcKUwpppwplpwphrw4lv','$2y$15$95GO52bAkhOTmh6PsHunWuGFgMLEzJtpnFb91DbUPRr3kegyP3gP.'),('69649a2f-d111-4c12-8127-fbdb5a5fe437',2,'a8KebG3Cm8OCa8KeZMKVY8KVwpNha8OFaGjCksKeaGZrwpDCnMKXwpzClWvCmWnCn8KbacKYcA==','$2y$15$Qc2QvP3ilUciQdNm1RR8de5EI5tCFMYt2rbpt37gW9lcUO.LI9wJq'),('6d02c91a-d280-4564-a7ba-9b43c08c746f',2,'a8OJZmvDhcKaasKZZMKVZMKcwpJha8KXbWrCksOHbsKWwpXCkG/Cl2xmwplobMKcbWnCm8Kf','$2y$15$gsYC5Lu8JqJwBXxvrZYnX.EkqdYWQCWirayBJ9BvAxS/jkHpuTJnO'),('6ed1054d-33a2-4720-bd6b-b8bd67643506',2,'a8OKwppqwpLClm3CnGRkZcOFwpRha8KZaWbCksOIwptqwpbCkMKYbcKawpdsb2ptaWrClW8=','$2y$15$ZEZLTstsbxRWzhIg/6vJw.77SFhh0j9Z6L9pQMK3C5vfq0wDx4AE.'),('8c06c72f-d672-47e3-a1ce-9661f0b08c72',2,'bcOIZm/DhcKYa8KeZMKVaMKbwpRha8KZwpxpwpLDh2jCl8KZwpBva25kwpxowpZpbsKYwpxr','$2y$15$YN9Qb7AD2IhUbSdZRg8ds.v9HDH5BhrIoNwPRo7fm8n.W5Nc7rnly'),('92ede930-15a1-4934-9cc9-8c5b28b08c73',2,'bsKXwpvCncOHwppsaGRiZ8OFwpNha8KbamrCksKfwprCl23CkG7CmG3ClWhwwpZpbsKYwpxs','$2y$15$JW6.LQ1hpr1Y86NV6p6/C.zJhTkkLhlb/I9NhIYk9TV8391nvGXTC'),('94c60654-fa6b-4730-97ba-01fbd3d1e6c6',2,'bsKZwplvwpLCl25sZMKXwpPCmsOEYWvCmWpmwpLCn27ClsKVwpBmZsKewpXCmmvCmGrCm2vDiG8=','$2y$15$JlWart1H6EyMGojHkQ5AxefrT03cnWDyr8lSHQwR34k5gt2wkjOOa'),('993fe305-e1d4-4aa2-8bdc-e4bf60f513e5',2,'bsKeacKfw4fClGltZMKWY8OIwpZha8ODwphowpLCnsKZwpjCl8KQwptpwprCmWxowppuZ2jDim4=','$2y$15$CH2RDRy2BTRpkYvAFx2mf.sAwlAShJ57ZPdeKoyPwdL7Gu23t2L9K'),('a4ecfc51-35c7-4dc1-b220-6ab5fa8ed6b7',2,'wpbCmcKbwpzDiMOEbmlkZGfDh8KZYWvDhsKaZ8KSw4hpZmTCkGzClsKaaMKcwplswp7CmmvDh3A=','$2y$15$4ZM45YvZcJEccbVAiji.Xugil/oGS8H5LBoRvkutQOc.7QSaimQh2'),('b6fe2f93-accb-48af-9332-ef463595960a',2,'wpfCm8Kcwp7ClMOHcmtkwpLClcOHw4Rha8KawpjCnMKSwp9qZ2bCkMKbwptsaWltbW5va8KVwpo=','$2y$15$5R74HddUJ1Hny7U849FY0uAekitDawbtpQsyH0NuW//p/LtkezaIa'),('d90c0912-7f04-4502-a068-462ef6ad7995',2,'wpnCnmbCnMKSwppqamRowpjClMKWYWvCl2dowpLDh2dqbMKQamtqwpjCnG7ClcKdbW7Cnm4=','$2y$15$KmiNzxV7IaD85uyIj1xRP.x9c4AfDS1Tk3CU8ylK1OZCr6.iFIBWq'),('f03c9771-0df7-4e70-bbe8-56ed86ad3551',2,'wpvClWnCnMKbwphwaWRhwpbDisKZYWvDh25mwpLDiMKZwplswpBra8KdwpdubsKVwp1pasKaag==','$2y$15$6Qv/aPQhYiqePdDKwWEyfOObrDSyvA7JK/D4GzfpwRbh6UDMnpze.'),('f35c8df3-0a79-49b3-bcfe-5c945c70ae68',2,'wpvCmGvCnMKaw4XCn2tkYcKTwpvCm2FrwpvCmWnCksOIwprCmsKZwpBrwphxZ2vCm2tpwpfCmsKbcQ==','$2y$15$WVUSPUp1XPpH4DRJyerB1O6iNYIS2dpx6OERMOwrwC9sm0Izn9RmC'),('f93b5836-5e1f-47cc-8ffa-50ce1d477a3b',2,'wpvCnmnCm8KXwplsbmRmwpfClcOIYWvCmcKawpnCksKewp3CmsKVwpBrZcKbwphnwpxocG3ClsKYwps=','$2y$15$fYv9EiaAzHtANevaNWR05eENBKbItt6i3XIhM/ihcXPf7BFFdMADK');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20170918233618');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `second_last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('0d602fe8-8910-463d-a956-2e3b5643947e','Antonella','Castellanos','Olivas'),('16dc0d05-27ba-47e2-8cab-6f00e6a001a1','Hidalgo','Avilés','Santana'),('18f13712-8f61-4b67-b17b-8564785fd67a','Isidora','Arce','Carbajal'),('1f353b8d-f17c-4def-a0a2-756b2bd83eb1','Abril','Melissa','Griego'),('21928a93-ca30-49f9-8fce-38d3d8487655','Carlos','Aparicio','Ulloa'),('23a0fb90-ce4e-426c-8c4e-d5a1c4582ed7','Emily','Terrazas','Espinoza'),('2869e5e7-56c8-49fd-b1b7-c14090b666fd','Rebeca','Tórrez','Roldán'),('3622c9a2-e88e-47da-b02c-b73ee6e1de43','Ornela','Quintana','Jaramillo'),('38f81326-2a6a-4383-9053-ce2256a73ee5','Horacio','Vásquez','Melissa'),('3b4880dd-6462-451e-a38f-2e635a4cb22d','Alexa','Sisneros','Zambrano'),('404aeb78-8c0c-4605-8ae2-cc73d0439488','Axel','Ballesteros','Águilar'),('4d06bca6-017e-496b-97d8-dbb6d64dc4ed','José','Guillermo','Inche'),('4e53eff3-f6f4-4795-8d12-e2aff2433dc5','Joshua','de Jesús','Camacho'),('50718151-eb1a-4822-b304-ede1a74d1397','Oliva','Soria','Mercado'),('5968db0b-9746-4fd0-9b34-8b6ba8dbdf37','Delfina','Santacruz','Galarza'),('59a9a590-4592-48b8-95ff-a4895dc0b796','Alex','Velasco','Zamudio'),('5fd66e97-202b-4d93-ac9e-09f70449f5a9','Kevin','Ávila','Sepúlveda'),('662fc8bb-f96d-4e1a-a439-4caad1e0b6d6','Lucas','Santacruz','Rivas'),('69649a2f-d111-4c12-8127-fbdb5a5fe437','Juan Manuel','Tórrez','Robles'),('6a6fa329-3607-4a5f-9230-1bfe70f4ff38','Melissa','Mercado','Ortega'),('6d02c91a-d280-4564-a7ba-9b43c08c746f','Jacobo','Aponte','Ferrer'),('6ed1054d-33a2-4720-bd6b-b8bd67643506','Lucía','Quiroz','Rentería'),('727fa4af-71e7-4243-860a-48672168af80','Antonio','Gamboa','Pantoja'),('730af218-2519-4747-95d1-199da3377a9d','Alejandro','Ferrer','Tovar'),('829f598c-00a9-4332-888c-a5c1d476a308','Fátima ','Razo','Almanza'),('869604a0-a4c1-407c-97df-768f56150fe2','Daniel','Del Río','Niño'),('8c06c72f-d672-47e3-a1ce-9661f0b08c72','Elena ','Ornelas','Carrero'),('92ede930-15a1-4934-9cc9-8c5b28b08c73','Micaela','Meléndez','Ferrer'),('94c60654-fa6b-4730-97ba-01fbd3d1e6c6','Luciana','Domínquez','Barreto'),('993fe305-e1d4-4aa2-8bdc-e4bf60f513e5','Samantha','Puente','Fernández'),('a4ecfc51-35c7-4dc1-b220-6ab5fa8ed6b7','Luana','Ramírez','Torres'),('ad50d237-d25b-479e-98a8-247f1c4f9d82','Eduardo','Ortega','Guevara'),('b6fe2f93-accb-48af-9332-ef463595960a','Renata','Nájera','Esquivel'),('b900cdd1-dcef-4929-83a0-37c66984a791','Sara Sofía','Rubio','Ulibarri'),('c3dce403-f711-4633-8b0a-46dcba350776','María','Galarza','Rojo'),('c5c6de51-afc3-42ff-9192-fa3957b3a520','Hidalgo','Rosario','Mendoza'),('cd0564ec-1c56-4c5b-9c32-9194f96ef928','Gabriel','Bravo','Galindo'),('d5ac3341-c71d-4d03-bc0c-423d44779e53','Josué','Madrigal','Huerta'),('d90c0912-7f04-4502-a068-462ef6ad7995','María José','Chavarría','Fuentes'),('dd198978-c22f-46df-b811-902d5efc518e','Olivia','Del Río','Mendoza'),('f03c9771-0df7-4e70-bbe8-56ed86ad3551','Juana','Sauceda','Rivero'),('f35c8df3-0a79-49b3-bcfe-5c945c70ae68','Andrea','Arias','Ortega'),('f7ac14e1-ab2b-43eb-952a-2b6b3b9fb4c4','Agustín','Pérez','Calderón'),('f93b5836-5e1f-47cc-8ffa-50ce1d477a3b','Antonia','Uribe','Mateo');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-25 16:52:20
