<?php
     
    global $wpdb;
    global $nc_tbl;
    global $tables;

    $nc_tbl['form']         =  "{$wpdb->prefix}kortaforms";
    $nc_tbl['formdetails']  =  "{$wpdb->prefix}kortaformdetails";
    $nc_tbl['formresponse'] =  "{$wpdb->prefix}kortaformresponses";
    $nc_tbl['formrecord']   =  "{$wpdb->prefix}kortaformrecords";
    

    $tables[] = ["CREATE TABLE `{$nc_tbl['form']}` 
                (`id` INT NOT NULL AUTO_INCREMENT COMMENT 'Índice' , 
                 `name` VARCHAR(255) NOT NULL COMMENT 'Nombre' , 
                 `notification_mail` VARCHAR(255) NULL COMMENT 'Email de notificación' , 
                 `table_name` VARCHAR(255) NULL COMMENT 'Nombre de la tabla' ,
                 `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
                 `is_deleted` INT(1) NULL DEFAULT '0' , 
                 `notification_receipt` LONGTEXT NULL ,
                 `json` LONGTEXT NULL , 
                 PRIMARY KEY (`id`)) ENGINE = InnoDB;"];

    $tables[] = ["CREATE TABLE `{$nc_tbl['formdetails']}`
                 (`id` INT NOT NULL AUTO_INCREMENT , 
                  `formid` INT NOT NULL ,
                  `type` VARCHAR(255) NOT NULL , 
                  `json` LONGTEXT NULL , 
                  `orden` INT NULL ,
                  `is_deleted` INT(1) NULL DEFAULT '0' ,
                   PRIMARY KEY (`id`)) ENGINE = InnoDB;"];
    
    $tables[] = ["CREATE TABLE `{$nc_tbl['formresponse']}` 
                (`id` INT NOT NULL AUTO_INCREMENT , 
                 `formid` INT NOT NULL , 
                 `recordid` INT NOT NULL , 
                 `response` TEXT NULL , 
                 `json` TEXT NULL , 
                 `resposedate` DATETIME NULL , 
                 `is_deleted` INT(1) NULL DEFAULT '0' ,
                 PRIMARY KEY (`id`)) ENGINE = InnoDB;"];

$tables[] = ["CREATE TABLE `{$nc_tbl['formrecord']}`
            (`id` INT NOT NULL AUTO_INCREMENT , 
             `formid` INT NOT NULL , 
             `recordid` INT NOT NULL , 
             `is_new` INT(1) NULL DEFAULT '1' , 
             `created_at` DATE NULL , 
             `open_at` DATE NULL , 
             `is_deleted` INT NULL , 
             PRIMARY KEY (`id`)) ENGINE = InnoDB;"];



