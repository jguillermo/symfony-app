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
INSERT INTO `employee` VALUES ('23a0fb90-ce4e-426c-8c4e-d5a1c4582ed7',2,'Z8KYwpdpw4jDg3JoZMKUwpfCmMOHYWvClG3CmcKSwp7CmmjCmcKQwppqwplkwplsaXFowprDiXA=','$2y$15$xP2wUeBlbFOJfWN.S8.c/OC4QkK6oZxL431S8No2zwd/IOUZNPdnO'),('3622c9a2-e88e-47da-b02c-b73ee6e1de43',2,'aMKbaGvDhcKawppqZMKWasKcw4dha8KZwpvCl8KSw4hnZsKXwpDCmGxrwpjCm27CmWrCmsKawpls','$2y$15$TL7UjXa4uKqz4atOW5W2BOxlHxpoDJpqMRQOYZ0Lk5RCGiHeuieSC'),('3b4880dd-6462-451e-a38f-2e635a4cb22d',2,'aMOHanHCmsKRwp3CnGRnZsKawpRha8KXaMKbwpLDh2pswprCkGjCmm5ma8KZaMKcwphnwpfCnQ==','$2y$15$6g8zXyVmcQafuupSjMA8oOSIZBR44xocN/gRDtJBk2FV2nEJHmPjW'),('4d06bca6-017e-496b-97d8-dbb6d64dc4ed',1,'wqrDmMKbwqvCj8OCwp3CpcKgwp8=','$2y$15$/jMIidLmIDtWA9ueQQyTCuqt1XMOAlThzcGmrI92w.VOXXzOttuu2'),('4e53eff3-f6f4-4795-8d12-e2aff2433dc5',2,'acOKa2zDh8OHwp9rZMKXaMOKwpZha8KZcGvCksKewptlZsKQwptnwpnCmcKcamhsacKZw4hu','$2y$15$b2Ftp7HGRg5RNumokolP/.Nc1o1/6Py/Vc7sZUso2oYyC/5XRFRBy'),('59a9a590-4592-48b8-95ff-a4895dc0b796',2,'asKewpdyw4PClnJoZGVnwp3ClGFrwprCmW7CksKfbMKawprCkMKXaXBsa8Kcwpdpwphswp5v','$2y$15$XDd859/byhp3I.xiBvpSaerZHKtx1dEL4a8u7j4lZqvBOzyHECPxW'),('5fd66e97-202b-4d93-ac9e-09f70449f5a9',2,'asOLwppvwpjDhnJvZGNiwpbDhGFrw4ZwacKSw4fCmm3CmcKQZm7CnmpmbGhywpxqw4Zy','$2y$15$dIMUE/jCkxhBCYJWpmQiYulxMZhyb7EQYVwc/gafKFLXaKMgpJgta'),('662fc8bb-f96d-4e1a-a439-4caad1e0b6d6',2,'a8KbaMKfw4XCmcKbwppkwpdrwprDhmFrw4dowpfCksOHa2dtwpBqwpjCmcKUwpppwplpwphrw4lv','$2y$15$mMsr1YWnVot6t8T2x6W8XuBMXcnPsWHgVt27uN9wyTp.tFYgzt4Ie'),('69649a2f-d111-4c12-8127-fbdb5a5fe437',2,'a8KebG3Cm8OCa8KeZMKVY8KVwpNha8OFaGjCksKeaGZrwpDCnMKXwpzClWvCmWnCn8KbacKYcA==','$2y$15$bWeCXQ/RFy1hk0foWcGHhOz.gZ/EdUnmDW6Px2gJ8Tf3eOL5OvPCK'),('6d02c91a-d280-4564-a7ba-9b43c08c746f',2,'a8OJZmvDhcKaasKZZMKVZMKcwpJha8KXbWrCksOHbsKWwpXCkG/Cl2xmwplobMKcbWnCm8Kf','$2y$15$6qR74ziUnLuK0iTP6ioAMuN4a97ExLcHF9j0sKWl/NX7FoaOaDGlG'),('6ed1054d-33a2-4720-bd6b-b8bd67643506',2,'a8OKwppqwpLClm3CnGRkZcOFwpRha8KZaWbCksOIwptqwpbCkMKYbcKawpdsb2ptaWrClW8=','$2y$15$ODPg9efrwm1Z/K0lOip3mej83jjxa9BNSNuY0yqzFhs6OHkxfDen.'),('8c06c72f-d672-47e3-a1ce-9661f0b08c72',2,'bcOIZm/DhcKYa8KeZMKVaMKbwpRha8KZwpxpwpLDh2jCl8KZwpBva25kwpxowpZpbsKYwpxr','$2y$15$waLbirqBCJu4LHAJXYMeBeeVTZzEF8fhzu22i0wmqzo1dH9UUoWFG'),('92ede930-15a1-4934-9cc9-8c5b28b08c73',2,'bsKXwpvCncOHwppsaGRiZ8OFwpNha8KbamrCksKfwprCl23CkG7CmG3ClWhwwpZpbsKYwpxs','$2y$15$8E0XrZUknBCwV1EB8CnWN.PYbWQ.hgDMUiCyhk/gHluUfF4t7XpWK'),('94c60654-fa6b-4730-97ba-01fbd3d1e6c6',2,'bsKZwplvwpLCl25sZMKXwpPCmsOEYWvCmWpmwpLCn27ClsKVwpBmZsKewpXCmmvCmGrCm2vDiG8=','$2y$15$EQzKKbKQoHiYRxmhZSZLz.1hZqQ691w4EX19pS/fVHFfrVcQUoCdC'),('993fe305-e1d4-4aa2-8bdc-e4bf60f513e5',2,'bsKeacKfw4fClGltZMKWY8OIwpZha8ODwphowpLCnsKZwpjCl8KQwptpwprCmWxowppuZ2jDim4=','$2y$15$MNfJVwpWYYWR2hOrWWf4g.ZtXlrM/jLEqg/gdo7Xz2pl1N5RtyIOa'),('a4ecfc51-35c7-4dc1-b220-6ab5fa8ed6b7',2,'wpbCmcKbwpzDiMOEbmlkZGfDh8KZYWvDhsKaZ8KSw4hpZmTCkGzClsKaaMKcwplswp7CmmvDh3A=','$2y$15$bSCNz0u0VbO5djrc/gF8becIHLphHV6F5R4Q2Of5bnPzHR617GC9m'),('b6fe2f93-accb-48af-9332-ef463595960a',2,'wpfCm8Kcwp7ClMOHcmtkwpLClcOHw4Rha8KawpjCnMKSwp9qZ2bCkMKbwptsaWltbW5va8KVwpo=','$2y$15$Odo07LrE9YaBVEZOJJ5.Mudtk5S8C5UmVPUGow.0hnrbuei9dR1De'),('d90c0912-7f04-4502-a068-462ef6ad7995',2,'wpnCnmbCnMKSwppqamRowpjClMKWYWvCl2dowpLDh2dqbMKQamtqwpjCnG7ClcKdbW7Cnm4=','$2y$15$PpJa1fjZhK1FRKoqbVZhC.j3jx5W25TRfy7k6IYdJplNp.tU8s5o6'),('f03c9771-0df7-4e70-bbe8-56ed86ad3551',2,'wpvClWnCnMKbwphwaWRhwpbDisKZYWvDh25mwpLDiMKZwplswpBra8KdwpdubsKVwp1pasKaag==','$2y$15$Ubp.tZBake8BnMM3YTUDtOZgOa43gofB0Un/GgeF9tvaRojFMBDPK'),('f35c8df3-0a79-49b3-bcfe-5c945c70ae68',2,'wpvCmGvCnMKaw4XCn2tkYcKTwpvCm2FrwpvCmWnCksOIwprCmsKZwpBrwphxZ2vCm2tpwpfCmsKbcQ==','$2y$15$lzIDQ9cihIA3VBLLmPcZ0u7tIWJGheusHMSIG8LXWqaPxCnDSDWOO'),('f93b5836-5e1f-47cc-8ffa-50ce1d477a3b',2,'wpvCnmnCm8KXwplsbmRmwpfClcOIYWvCmcKawpnCksKewp3CmsKVwpBrZcKbwphnwpxocG3ClsKYwps=','$2y$15$SgTbHGoqbK2EcCKXdmRxFejWq62X7m7ePkRJbuceCubqErO0DeQje');
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
INSERT INTO `user` VALUES ('0d602fe8-8910-463d-a956-2e3b5643947e','Jorge','Piña','Peres'),('16dc0d05-27ba-47e2-8cab-6f00e6a001a1','Josefina','Zúñiga','Canales'),('18f13712-8f61-4b67-b17b-8564785fd67a','Valentín','Fernández','Ferrer'),('21928a93-ca30-49f9-8fce-38d3d8487655','Vicente','Zaragoza','Razo'),('23a0fb90-ce4e-426c-8c4e-d5a1c4582ed7','Salomé','Sisneros','Castillo'),('2869e5e7-56c8-49fd-b1b7-c14090b666fd','Eduardo','Ramírez','Ortiz'),('3622c9a2-e88e-47da-b02c-b73ee6e1de43','Simón','Véliz','Villagómez'),('3b4880dd-6462-451e-a38f-2e635a4cb22d','Fernando','Gaitán','Mesa'),('404aeb78-8c0c-4605-8ae2-cc73d0439488','Miguel Ángel','Ponce','Tijerina'),('4d06bca6-017e-496b-97d8-dbb6d64dc4ed','José','Guillermo','Inche'),('4e53eff3-f6f4-4795-8d12-e2aff2433dc5','Ana Sofía','Navarrete','Soliz'),('50718151-eb1a-4822-b304-ede1a74d1397','Camila','Granado','Briseño'),('5968db0b-9746-4fd0-9b34-8b6ba8dbdf37','Olivia','Almanza','Rosario'),('59a9a590-4592-48b8-95ff-a4895dc0b796','Esteban','Griego','Luján'),('5fd66e97-202b-4d93-ac9e-09f70449f5a9','Matías','Guevara','Carrasquillo'),('662fc8bb-f96d-4e1a-a439-4caad1e0b6d6','Santiago','Anaya','Domínguez'),('69649a2f-d111-4c12-8127-fbdb5a5fe437','Valentín','Valdivia','Ruvalcaba'),('6d02c91a-d280-4564-a7ba-9b43c08c746f','Tomas','Robles','Otero'),('6ed1054d-33a2-4720-bd6b-b8bd67643506','Nicole','De La Torre','Estrada'),('727fa4af-71e7-4243-860a-48672168af80','María Camila','Dávila','Contreras'),('730af218-2519-4747-95d1-199da3377a9d','Pablo','Fajardo','Alemán'),('829f598c-00a9-4332-888c-a5c1d476a308','Cristóbal','Quiroz','Fuentes'),('869604a0-a4c1-407c-97df-768f56150fe2','Mariangel','Vanegas','Núñez'),('8c06c72f-d672-47e3-a1ce-9661f0b08c72','Javier','Almonte','Canales'),('92ede930-15a1-4934-9cc9-8c5b28b08c73','Esteban','Echevarría','Melgar'),('94c60654-fa6b-4730-97ba-01fbd3d1e6c6','Samantha','Razo','Bonilla'),('993fe305-e1d4-4aa2-8bdc-e4bf60f513e5','Facundo','Álvarez','Navarrete'),('a4ecfc51-35c7-4dc1-b220-6ab5fa8ed6b7','Emiliano','Caldera','Valenzuela'),('ad50d237-d25b-479e-98a8-247f1c4f9d82','Francisco','Franco','Serna'),('b6fe2f93-accb-48af-9332-ef463595960a','Maximiliano','Cano','Soliz'),('b900cdd1-dcef-4929-83a0-37c66984a791','Catalina','Rivas','Palomino'),('c3dce403-f711-4633-8b0a-46dcba350776','Damián','Valdez','Tapia'),('c5c6de51-afc3-42ff-9192-fa3957b3a520','Gabriel','Hurtado','Garay'),('cd0564ec-1c56-4c5b-9c32-9194f96ef928','Micaela','Paredes','Villagómez'),('d5ac3341-c71d-4d03-bc0c-423d44779e53','Jerónimo','Méndez','Tamez'),('d90c0912-7f04-4502-a068-462ef6ad7995','Ariadna','Duarte','Robledo'),('dd198978-c22f-46df-b811-902d5efc518e','Julián','Arreola','Villarreal'),('f03c9771-0df7-4e70-bbe8-56ed86ad3551','Carlos','Garay','Carbajal'),('f35c8df3-0a79-49b3-bcfe-5c945c70ae68','Mateo','Angulo','Casárez'),('f7ac14e1-ab2b-43eb-952a-2b6b3b9fb4c4','Elías','Gallegos','Espinal'),('f93b5836-5e1f-47cc-8ffa-50ce1d477a3b','Emmanuel','Escobar','Lira');
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

-- Dump completed on 2017-09-22 22:58:11
