-- Student Table

CREATE TABLE `student' (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `age` SMALLINT NULL,
  `grade` SMALLINT NULL,
  `teacher_id` INT NULL,
  `subject_id` VARCHAR(100) NOT NULL,
  `created_by` INT NOT NULL,
  `status_id` SMALLINT NOT NULL DEFAULT 1 ;
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`));

--   Changes added an id as part of the tables data primary key to make each and inserted row unique and auto incremented
--   Added table controls( created_by,created_at,deleted_at,updated_at and status_id)
--   status_id will tell us te status of the record assuming will have a status lookup table, in this case i made a default to be 1 = "ACTIVE", so 2 will be "INACTIVE, 3 = SUSPENDED and etc
--   name i made it a varchar or 100 characters
--   subjects changed to subjects_id, i will instead store a json object/ array to represent the link between subjects Table and Students so my column filed will look something like "[1,3,6]"
--   assuming that we have a subjects table that looks like so [1 = "Maths",2 = "English'"] etc
--   grade, age changed it to smallint 2 bytes will be enough for us to store those values
--
--   Teacher Table

  CREATE TABLE `teacher` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `subjects_id` VARCHAR(100) NOT NULL,
  `headOfGrade` TINYINT NOT NULL DEFAULT 0,
  `salary` DECIMAL(16,2) NULL,
  `created_by` INT NOT NULL,
  `status_id` SMALLINT NOT NULL DEFAULT 1 ;
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`));

-- Changes = headOfGrade datatype changes to tinyint we just need a boolean yes/no which can be represented as 1/0
-- salary changed to decimal, currency always has a decimal point, so discrepancies might occur when we store a decimal value to an int data type, for eg number been rounded off won't show true reflexion
--
--   Subjects Table

  CREATE TABLE `subject` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `created_by` INT NOT NULL,
  `status_id` SMALLINT NOT NULL DEFAULT 1 ;
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`));