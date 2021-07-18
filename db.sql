CREATE TABLE `db_productentry`.`products` ( 
    `pId` INT NOT NULL AUTO_INCREMENT , 
    `pName` VARCHAR(100) NOT NULL , 
    `pDesc` VARCHAR(250) NULL , 
    `pUnitPrice` DECIMAL NOT NULL , 
    `pCategory` VARCHAR(50) NOT NULL , 
    PRIMARY KEY (`pId`)
) ENGINE = InnoDB;