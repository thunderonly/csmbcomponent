DROP TABLE IF EXISTS `#__csmbadherents`;
DROP TABLE IF EXISTS `#__csmbsections`;

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


CREATE TABLE `#__csmbadherents` (
  `id`  INT(11)     NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(25) NOT NULL,
  `prenom` VARCHAR(25) NOT NULL,
  `sexe` VARCHAR(25) NOT NULL,
  `age` INT(2) NOT NULL,
  `adresse` VARCHAR(255) ,
  `ville` VARCHAR(50) ,
  `codepostal` INT(11),
  `telephonefixe` VARCHAR(10),
  `telephoneportable` VARCHAR(10),
  `email` VARCHAR(255) ,
  `responsable1_fonction` VARCHAR(255) ,
  `responsable1_nom` VARCHAR(255) ,
  `responsable1_prenom` VARCHAR(255) ,
  `responsable1_telephonefixe` VARCHAR(10) ,
  `responsable1_telephoneportable` VARCHAR(10) ,
  `responsable1_email` VARCHAR(255) ,
  `responsable2_fonction` VARCHAR(255) ,
  `responsable2_nom` VARCHAR(255) ,
  `responsable2_prenom` VARCHAR(255) ,
  `responsable2_telephonefixe` VARCHAR(10) ,
  `responsable2_telephoneportable` VARCHAR(10) ,
  `responsable2_email` VARCHAR(255) ,
  `enveloppes` BOOLEAN ,
  `photos` BOOLEAN ,
  `identite` BOOLEAN ,
  `reglement` TIMESTAMP ,
  `certificat` TIMESTAMP ,
  `licence` VARCHAR(50) ,
  `datedemandelicence` TIMESTAMP ,
  `datereceptionlicence` TIMESTAMP ,
  `sectionid` INT(11),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`sectionid`) REFERENCES `#__csmbsections`(`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =0
  DEFAULT CHARSET =utf8;

INSERT INTO `#__csmbadherents` (`nom`, `prenom`, `sexe`, `age`, `adresse`, `ville`, `codepostal`, `telephonefixe`, `telephoneportable`, `email`,
                                `responsable1_fonction`, `responsable1_nom`, `responsable1_prenom`, `responsable1_telephonefixe`, `responsable1_telephoneportable`, `responsable1_email`,
                                `sectionid`) VALUES
  ('HENRY', 'Gael', 'Masculin', '31', '51a avenue jean compadieu', 'marseille', '13012', '0491000000', '0675191304', 'email@email.fr',
   'fonction_res1', 'nom_res1', 'prenom_res1', '0123456789', '0123456789', 'email@email.fr', '1'),
  ('HUYNH', 'David', 'Masculin', '18', 'vers aubagne', 'aubagne', '13100', '0491234567', '0612345678', 'email@email.fr',
   'fonction_res1', 'nom_res1', 'prenom_res1', '0123456789', '0123456789', 'email@email.fr', '2');

