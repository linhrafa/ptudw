-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: thesis_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

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
-- Table structure for table `academic_programs`
--

DROP TABLE IF EXISTS `academic_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_programs` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_study` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Chương trình đào tạo';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_programs`
--

LOCK TABLES `academic_programs` WRITE;
/*!40000 ALTER TABLE `academic_programs` DISABLE KEYS */;
/*!40000 ALTER TABLE `academic_programs` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Khóa học';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_programs`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khóa chính.',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ip_old` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_new` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='admin';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `critical_opinion`
--

DROP TABLE IF EXISTS `critical_opinion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `critical_opinion` (
  `id` int(11) NOT NULL,
  `point` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `record_thesises_id` int(11) NOT NULL,
  `teachers_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_critical_opinion_record_thesises1_idx` (`record_thesises_id`),
  KEY `fk_critical_opinion_teachers1_idx` (`teachers_id`),
  CONSTRAINT `fk_critical_opinion_record_thesises1` FOREIGN KEY (`record_thesises_id`) REFERENCES `record_thesises` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_critical_opinion_teachers1` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='quan hệ giữa hồ sơ bảo vệ với teacher. gồm cả giáo viên phản biện, giáo viên hướng dẫn và thành viên hội đồng.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `critical_opinion`
--

LOCK TABLES `critical_opinion` WRITE;
/*!40000 ALTER TABLE `critical_opinion` DISABLE KEYS */;
/*!40000 ALTER TABLE `critical_opinion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_departments_faculties1_idx` (`faculty_id`),
  CONSTRAINT `fk_departments_faculties1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='bộ môn, phòng thí nhiệm';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'321 – E3 – 144 Xuân Thuỷ – Cầu Giấy – Hà Nội','84 4 37549016','http://fit.uet.vnu.edu.vn/se/',NULL,'Bộ môn Công nghệ Phần mềm',1),(2,'305 – E3 – 144 Xuân Thuỷ – Cầu Giấy – Hà Nội','84 4 37547813','http://uet.vnu.edu.vn/httt/',NULL,'Bộ môn Các Hệ thống Thông tin',1),(3,'306 – E3 – 144 Xuân Thuỷ – Cầu Giấy – Hà Nội','84 4 37547812',NULL,NULL,'Bộ môn Khoa học Máy tính',1),(4,'308 – E3 – 144 Xuân Thuỷ – Cầu Giấy – Hà Nội','84 4 37547862',NULL,NULL,'Bộ môn Khoa học và Kỹ thuật tính toán',1),(5,'Phòng 406-nhà E3 trường ĐH Công nghệ, ĐHQG Hà','0437547611',' http://fit.uet.vnu.edu.vn/cne/',NULL,'Bộ môn Mạng và Truyền thông Máy tính',1),(6,NULL,NULL,NULL,NULL,'Phòng thí nghiệm An toàn thông tin',1),(7,'318 – E3 – 144 Xuân Thuỷ – Cầu Giấy – Hà Nội','84 4 37547813','http://vnlp.net/blog/',NULL,'Phòng Thí nghiệm Công nghệ Tri thức',1),(8,'311 – E3 – 144 Xuân Thuỷ – Cầu Giấy – Hà Nội','84 4 37547064',NULL,NULL,'Phòng Thí nghiệm Hệ thống Nhúng',1),(9,'302 – E3 – 144 Xuân Thuỷ – Cầu Giấy – Hà Nội','84 4 37547064',NULL,NULL,'Phòng Thí nghiệm Tương tác Người – Máy',1),(10,NULL,NULL,NULL,NULL,'Bộ môn Hệ thống viễn thông',2),(11,NULL,NULL,NULL,NULL,'Bộ môn Thông tin vô tuyến',2),(12,NULL,NULL,NULL,NULL,'Bộ môn Điện tử và Kỹ thuật máy tính',2),(13,NULL,NULL,NULL,NULL,'Bộ môn Vi cơ điện tử và Vi cơ hệ thống',2),(14,NULL,NULL,NULL,NULL,'Phòng Thí nghiệm Tín hiệu và Hệ thống',2),(15,NULL,NULL,NULL,NULL,'Phòng thực hành Điện tử Viễn thông',2),(16,NULL,'0437450067',NULL,NULL,'Bộ môn Công nghệ quang tử',3),(17,NULL,'0437549332',NULL,NULL,'Bộ môn Vật liệu và linh kiện từ tính nano',3),(18,NULL,'0437549429',NULL,NULL,'Bộ môn Vật liệu và linh kiện bán dẫn nano',3),(19,NULL,'0437549432',NULL,NULL,'Bộ môn Công nghệ nano sinh học',3),(20,NULL,NULL,NULL,NULL,'Phòng Thí nghiệm Công nghệ quang tử',3),(21,NULL,NULL,NULL,NULL,'Phòng Thí nghiệm Vật liệu và linh kiện lai na',3),(22,NULL,NULL,NULL,NULL,'Phòng Thí nghiệm của Bộ môn Vật liệu và linh ',3),(23,NULL,NULL,NULL,NULL,'BỘ MÔN CÔNG NGHỆ BIỂN VÀ MÔI TRƯỜNG',4),(24,NULL,NULL,NULL,NULL,'BỘ MÔN CÔNG NGHỆ CƠ ĐIỆN TỬ',4),(25,NULL,NULL,NULL,NULL,'BỘ MÔN CÔNG NGHỆ HÀNG KHÔNG VŨ TRỤ',4),(26,NULL,NULL,NULL,NULL,'BỘ MÔN THỦY KHÍ CÔNG NGHIỆP VÀ MÔI TRƯỜNG',4),(27,NULL,NULL,NULL,NULL,'PTN VẬT LIỆU VÀ KẾT CẤU TIÊN TIẾN',4);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculties`
--

DROP TABLE IF EXISTS `faculties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculties` (
  `code` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã khoa',
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'mô tả khoa',
  `teacher_dean_id` int(11) DEFAULT '0' COMMENT 'khóa ngoại trỏ đến trưởng khoa',
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khóa chính.',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vnu_email` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '14020084@vnu.edu.vn',
  `ip_old` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_new` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `vnu_email` (`vnu_email`),
  KEY `fk_faculty_teacher1_idx` (`teacher_dean_id`),
  KEY `fk_faculties_users1_idx` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Khoa';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculties`
--

LOCK TABLES `faculties` WRITE;
/*!40000 ALTER TABLE `faculties` DISABLE KEYS */;
INSERT INTO `faculties` VALUES ('1','Công nghệ thông tin',NULL,0,1,'fit','$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','6QguxDPJdBmrxUE1wWSKQaMoUnBuJ1EA6JkgW9lfmCdyDiUR5FQeRtATPk8b','14020084@vnu.edu.vn',NULL,NULL,NULL,NULL),('2','Khoa Điện tử Viễn thông',NULL,0,2,'fet','$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','fet@vnu.edu.vn',NULL,NULL,NULL,NULL),('3','Khoa Vật lý Kỹ thuật & Công nghệ Nanô',NULL,0,3,'fepn','$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','fepn@vnu.edu.vn',NULL,NULL,NULL,NULL),('4','Khoa Cơ học Kỹ thuật & Tự động hóa',NULL,0,4,'fema','$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','fema@vnu.edu.vn',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `faculties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_fails`
--

DROP TABLE IF EXISTS `ip_fails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_fails` (
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_fails` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_fails`
--

LOCK TABLES `ip_fails` WRITE;
/*!40000 ALTER TABLE `ip_fails` DISABLE KEYS */;
/*!40000 ALTER TABLE `ip_fails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record_thesis_has_teacher`
--

DROP TABLE IF EXISTS `record_thesis_has_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record_thesis_has_teacher` (
  `record_thesis_id` int(11) NOT NULL,
  `teacher_reviewer_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_record_thesis_has_teacher_teacher1_idx` (`teacher_reviewer_id`),
  KEY `fk_record_thesis_has_teacher_record_thesis1_idx` (`record_thesis_id`),
  CONSTRAINT `fk_record_thesis_has_teacher_record_thesis1` FOREIGN KEY (`record_thesis_id`) REFERENCES `record_thesises` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_record_thesis_has_teacher_teacher1` FOREIGN KEY (`teacher_reviewer_id`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='quan hệ n n giữa giáo viên phản biện và hồ sơ bảo vệ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record_thesis_has_teacher`
--

LOCK TABLES `record_thesis_has_teacher` WRITE;
/*!40000 ALTER TABLE `record_thesis_has_teacher` DISABLE KEYS */;
/*!40000 ALTER TABLE `record_thesis_has_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record_thesises`
--

DROP TABLE IF EXISTS `record_thesises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record_thesises` (
  `id` int(11) NOT NULL,
  `is_send_record` boolean DEFAULT NULL COMMENT 'gửi hồ sơ bảo vệ chưa',
  `subject_thesis_id` int(11) NOT NULL COMMENT 'đề tài của hồ sơ',
  `thesis_council_id` int(11) NOT NULL COMMENT 'hội đồng của hồ sơ',
  `is_adjust` boolean DEFAULT NULL COMMENT 'có yêu cầu chỉnh sửa',
  PRIMARY KEY (`id`),
  KEY `fk_record_thesis_subject_thesis1_idx` (`subject_thesis_id`),
  KEY `fk_record_thesis_thesis_council1_idx` (`thesis_council_id`),
  CONSTRAINT `fk_record_thesis_subject_thesis1` FOREIGN KEY (`subject_thesis_id`) REFERENCES `subject_thesises` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_record_thesis_thesis_council1` FOREIGN KEY (`thesis_council_id`) REFERENCES `thesis_councils` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Hồ sơ bảo vệ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record_thesises`
--

LOCK TABLES `record_thesises` WRITE;
/*!40000 ALTER TABLE `record_thesises` DISABLE KEYS */;
/*!40000 ALTER TABLE `record_thesises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `research_areas`
--

DROP TABLE IF EXISTS `research_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `research_areas` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `left` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `right` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Lĩnh vực nghiên cứu. sử dụng left và right để truy suất node con và node cha. (link doc http://techtalk.vn/nested-set-model-goc-nhin-khac-cho-mo-hinh-category-da-cap.html)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `research_areas`
--

LOCK TABLES `research_areas` WRITE;
/*!40000 ALTER TABLE `research_areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `research_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `research_areas_has_teachers`
--

DROP TABLE IF EXISTS `research_areas_has_teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `research_areas_has_teachers` (
  `research_areas_id` int(11) NOT NULL,
  `teachers_user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_research_areas_has_teachers_teachers1_idx` (`teachers_user_id`),
  KEY `fk_research_areas_has_teachers_research_areas1_idx` (`research_areas_id`),
  CONSTRAINT `fk_research_areas_has_teachers_research_areas1` FOREIGN KEY (`research_areas_id`) REFERENCES `research_areas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_research_areas_has_teachers_teachers1` FOREIGN KEY (`teachers_user_id`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Quan hệ n m giữa lĩnh vực nghiên cứu và teacher';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `research_areas_has_teachers`
--

LOCK TABLES `research_areas_has_teachers` WRITE;
/*!40000 ALTER TABLE `research_areas_has_teachers` DISABLE KEYS */;
/*!40000 ALTER TABLE `research_areas_has_teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `code` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã sinh viên',
  `can_do_thesis` boolean DEFAULT NULL COMMENT 'có thể bảo vệ',
  `is_done_record` boolean DEFAULT NULL COMMENT 'hoàn tất hồ sơ',
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khóa chính',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vnu_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_old` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_new` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `academic_program_id` int(11) NOT NULL,
  `subject_thesis_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vnu_email` (`vnu_email`),
  KEY `fk_student_user1_idx` (`id`),
  KEY `fk_student_academic_program1_idx` (`academic_program_id`),
  KEY `fk_student_subject_thesis1_idx` (`subject_thesis_id`),
  KEY `fk_student_course1_idx` (`course_id`),
  CONSTRAINT `fk_student_academic_program1` FOREIGN KEY (`academic_program_id`) REFERENCES `academic_programs` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_student_subject_thesis1` FOREIGN KEY (`subject_thesis_id`) REFERENCES `subject_thesises` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_student_course1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_thesis_has_teacher`
--

DROP TABLE IF EXISTS `subject_thesis_has_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_thesis_has_teacher` (
  `subject_thesis_id` int(11) NOT NULL,
  `teacher_supervisor_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_thesis_has_teacher_teacher1_idx` (`teacher_supervisor_id`),
  KEY `fk_subject_thesis_has_teacher_subject_thesis1_idx` (`subject_thesis_id`),
  CONSTRAINT `fk_subject_thesis_has_teacher_subject_thesis1` FOREIGN KEY (`subject_thesis_id`) REFERENCES `subject_thesises` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_subject_thesis_has_teacher_teacher1` FOREIGN KEY (`teacher_supervisor_id`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_thesis_has_teacher`
--

LOCK TABLES `subject_thesis_has_teacher` WRITE;
/*!40000 ALTER TABLE `subject_thesis_has_teacher` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_thesis_has_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_thesises`
--

DROP TABLE IF EXISTS `subject_thesises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_thesises` (
  `id` int(11) NOT NULL COMMENT 'đề tài',
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_accepted` boolean DEFAULT NULL COMMENT 'giáo viên chấp nhận hay k',
  `is_canceld` boolean DEFAULT NULL COMMENT 'sinh viên hủy hay không',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='đề tài';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_thesises`
--

LOCK TABLES `subject_thesises` WRITE;
/*!40000 ALTER TABLE `subject_thesises` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_thesises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `code` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã giảng viên',
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degree` text CHARACTER SET utf8,
  `area_research` text CHARACTER SET utf8,
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khóa chính.',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vnu_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_old` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_new` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `associate_dean_faculty_id` int(11) DEFAULT NULL COMMENT 'phó chủ nhiệm khoa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `vnu_email` (`vnu_email`),
  KEY `fk_teacher_user_idx` (`id`),
  KEY `fk_teacher_department1_idx` (`department_id`),
  KEY `fk_teachers_faculties1_idx` (`associate_dean_faculty_id`),
  CONSTRAINT `fk_teacher_department1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Giáo viên';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES ('1','Trần Văn GV1','Tiến sĩ, Truyền dữ liệu và mạng máy tính, Trường Đại học Công nghệ, ĐHQGHN','- An toàn thông tin: WEB01 - Đánh giá an ninh ứng dụng web, WEB02 - Phát hiện và ngăn chặn tấn công ứng dụng web, WEB03 - Phát hiện và ngăn chặn web độc hại, lừa đảo hoặc/và có nội dung không phù hợp.- Mạng cảm biến không dây: WSN01 - Phát hiện biên, WSN02 - Định vị, WSN03 - Định tuyến dựa trên thông tin vị trí.',1,'$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','14020084@vnu.edu.vn',NULL,NULL,NULL,NULL,1,0),('2','Bùi Ngọc Thăng','TS','Học máy, tin sinh học',2,'$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','thangbn@vnu.edu.vn',NULL,NULL,NULL,NULL,3,0),('3','Bùi Quang Hưng','TS','Hạ tầng dữ liệu không gian, Hệ thống thông tin địa lý, Quản lý dữ liệu lớn, Khai phá dữ liệu',3,'$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','hungbq@vnu.edu.vn',NULL,NULL,NULL,NULL,2,NULL),('4','Dương Lê Minh','TS','Mạng adhoc không dây, SIP - based VoIP, Internet of Things, mạng cảm biến, ứng dụng di động cloud, các hệ thống ảo hóa',4,'$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','minhdl@vnu.edu.vn',NULL,NULL,NULL,NULL,5,1),('5','Hồ Đắc Phương','ThS','Tính toán lưới, xử lý phân tán, các ứng dụng trên thiết bị di động',5,'$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','phuongd@vnu.edu.vn',NULL,NULL,NULL,NULL,5,NULL),('6','Lê Anh Cường','PGS. TS','Xử lý ngôn ngữ tự nhiên, phân tích quan điểm, khai phá văn bản, học máy',6,'$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','cuongla@vnu.edu.vn',NULL,NULL,NULL,NULL,3,NULL),('7','Lê Phê Đô','TS','An toàn thông tin trong giao dịch điện tử, Các phương pháp toán trong công nghệ',7,'$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','dolp@vnu.edu.vn',NULL,NULL,NULL,NULL,4,NULL),('8','Phạm Ngọc Hùng','PGS. TS','Các phương pháp hình thức, Đặc tả và kiểm chứng, Tiến hóa phần mềm, Phân tích chương trình, Kiểm thử tự động',8,'$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','hungpn@vnu.edu.vn',NULL,NULL,NULL,NULL,1,NULL),('9','Trương Ninh Thuận','PGS. TS','Mô hình hóa và kiểm chứng phần mềm, Phân tích chương trình, An ninh phần mềm',9,'$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','thuantn@vnu.edu.vn',NULL,NULL,NULL,NULL,1,1),('10','Phan Xuân Hiếu','PGS. TS','Học máy, Khai phá dữ liệu, Xử lý ngôn ngữ tự nhiên, Thông minh kinh doanh',10,'$2y$10$2UocoWuuhPB5x.5wcUtJseQGoVg/8KyGOda7MEvS2FWpp/LORP7Z.','','hieupx@vnu.edu.vn',NULL,NULL,NULL,NULL,2,1);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thesis_council_has_teacher`
--

DROP TABLE IF EXISTS `thesis_council_has_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thesis_council_has_teacher` (
  `thesis_council_id` int(11) NOT NULL,
  `teacher_council_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_thesis_council_has_teacher_teacher1_idx` (`teacher_council_id`),
  KEY `fk_thesis_council_has_teacher_thesis_council1_idx` (`thesis_council_id`),
  CONSTRAINT `fk_thesis_council_has_teacher_teacher1` FOREIGN KEY (`teacher_council_id`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_thesis_council_has_teacher_thesis_council1` FOREIGN KEY (`thesis_council_id`) REFERENCES `thesis_councils` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='quan hệ n m giữa hội đồng bảo vệ và teacher ( có cả giáo viên phản biện và giáo viên trong cùng lĩnh vực)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thesis_council_has_teacher`
--

LOCK TABLES `thesis_council_has_teacher` WRITE;
/*!40000 ALTER TABLE `thesis_council_has_teacher` DISABLE KEYS */;
/*!40000 ALTER TABLE `thesis_council_has_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thesis_councils`
--

DROP TABLE IF EXISTS `thesis_councils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thesis_councils` (
  `id` int(11) NOT NULL COMMENT 'hội đồng phản biện',
  `room` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_secretary_id` int(11) NOT NULL COMMENT 'thư ký hội đồng',
  PRIMARY KEY (`id`),
  KEY `fk_thesis_council_teacher1_idx` (`teacher_secretary_id`),
  CONSTRAINT `fk_thesis_council_teacher1` FOREIGN KEY (`teacher_secretary_id`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='hội đồng bảo vệ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thesis_councils`
--

LOCK TABLES `thesis_councils` WRITE;
/*!40000 ALTER TABLE `thesis_councils` DISABLE KEYS */;
/*!40000 ALTER TABLE `thesis_councils` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-12 11:54:10
ALTER TABLE `teachers` CHANGE `remember_token` `remember_token` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `research_areas`
  DROP `name`,
  DROP `left`,
  DROP `right`;
ALTER TABLE `research_areas` ADD `parent_id` INT(11) NULL DEFAULT NULL AFTER `id`, ADD `lft` INT(11) NULL DEFAULT NULL AFTER `parent_id`, ADD `rgt` INT(11) NULL DEFAULT NULL AFTER `lft`, ADD `depth` INT(11) NULL DEFAULT NULL AFTER `rgt`, ADD `name` VARCHAR(255) NOT NULL AFTER `depth`, ADD `created_at` TIMESTAMP NULL DEFAULT NULL AFTER `name`, ADD `updated_at` TIMESTAMP NULL DEFAULT NULL AFTER `created_at`;
ALTER TABLE `research_areas_has_teachers` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
CREATE TABLE `thesis_db`.`password_resets` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `token` VARCHAR(255) NOT NULL , `vnu_email` VARCHAR(45) NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`), UNIQUE (`token`), UNIQUE (`vnu_email`)) ENGINE = InnoDB;
ALTER TABLE `password_resets` ADD `updated_at` TIMESTAMP NOT NULL AFTER `created_at`;
ALTER TABLE `password_resets` CHANGE `created_at` `created_at` TIMESTAMP NOT NULL;
ALTER TABLE `admin` ADD `vnu_email` VARCHAR(255) NOT NULL AFTER `updated_at`, ADD UNIQUE (`vnu_email`);

CREATE TABLE `thesis_db`.`active_accounts` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `token` VARCHAR(255) NOT NULL , `vnu_email` VARCHAR(45) NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`), UNIQUE (`token`), UNIQUE (`vnu_email`)) ENGINE = InnoDB;
ALTER TABLE `active_accounts` ADD `updated_at` TIMESTAMP NOT NULL AFTER `created_at`;
ALTER TABLE `active_accounts` CHANGE `created_at` `created_at` TIMESTAMP NOT NULL;