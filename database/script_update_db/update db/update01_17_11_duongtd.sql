/*INSERT INTO `thesis_db`.`academic_programs` (`id`, `name`) VALUES ('1', 'K59CLC');*/
ALTER TABLE `thesis_db`.`students` 
CHANGE COLUMN `remember_token` `remember_token` VARCHAR(255) CHARACTER SET 'utf8' NULL DEFAULT NULL,
ADD COLUMN `name` VARCHAR(255) NOT NULL AFTER `subject_thesis_id`;

/*ALTER TABLE `thesis_db`.`students` 
DROP FOREIGN KEY `fk_student_subject_thesis1`;*/

ALTER TABLE `thesis_db`.`students` 
CHANGE COLUMN `subject_thesis_id` `subject_thesis_id` INT(11) NULL ;
/*ALTER TABLE `thesis_db`.`students` 
ADD CONSTRAINT `fk_student_subject_thesis1`
  FOREIGN KEY (`subject_thesis_id`)
  REFERENCES `thesis_db`.`subject_thesises` (`id`)
  ON UPDATE CASCADE;*/