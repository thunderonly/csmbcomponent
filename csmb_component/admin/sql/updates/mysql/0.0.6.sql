DROP TABLE IF EXISTS `#__csmbadherents`;
DROP TABLE IF EXISTS `#__csmbsections`;

CREATE TABLE `#__csmbadherents` (
  `id`  INT(11)     NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(25) NOT NULL,
  `prenom` VARCHAR(25) NOT NULL,
  `age` INT(2) NOT NULL,
  `adresse` VARCHAR(255) ,
  `ville` VARCHAR(50) ,
  `codepostal` INT(11),
  `telephonefixe` INT(10),
  `telephoneportable` INT(10),
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =0
  DEFAULT CHARSET =utf8;

INSERT INTO `#__csmbadherents` (`nom`, `prenom`, `age`, `adresse`, `ville`, `codepostal`, `telephonefixe`, `telephoneportable`) VALUES
  ('HENRY', 'Gael', '31', '51a avenue jean compadieu', 'marseille', '13012', '0491000000', '0675191304'),
  ('HUYNH', 'David', '18', 'vers aubagne', 'aubagne', '13100', '0491234567', '0612345678');



CREATE TABLE `#__csmbsections` (
  `id`  INT(11)     NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =0
  DEFAULT CHARSET =utf8;

INSERT INTO `#__csmbsections` (`libelle`) VALUES
  ('VoCoTruyen'),
  ('Judo');