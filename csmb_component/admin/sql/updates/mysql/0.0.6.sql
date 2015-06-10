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

CREATE TABLE `#__csmbmails` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sujet` VARCHAR(255),
  `destinataire` VARCHAR(255),
  `message` VARCHAR(255),
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =0
  DEFAULT CHARSET =utf8;


CREATE TABLE `#__csmbadherents` (
  `id`  INT(11)     NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(25) NOT NULL,
  `prenom` VARCHAR(25) NOT NULL,
  `sexe` VARCHAR(25) NOT NULL,
  `date_naissance` VARCHAR(11) NOT NULL,
  `ville_naissance` VARCHAR(255),
  `adresse` VARCHAR(255) ,
  `ville` VARCHAR(50) ,
  `codepostal` INT(11),
  `telephonefixe` VARCHAR(10),
  `telephoneportable` VARCHAR(10),
  `email` VARCHAR(255) ,
  `pere_nom` VARCHAR(255) ,
  `pere_prenom` VARCHAR(255) ,
  `pere_telephoneportable` VARCHAR(10) ,
  `mere_nom` VARCHAR(255) ,
  `mere_prenom` VARCHAR(255) ,
  `mere_telephoneportable` VARCHAR(10) ,
  `responsable1_nom` VARCHAR(255) ,
  `responsable1_prenom` VARCHAR(255) ,
  `responsable1_telephone` VARCHAR(10) ,
  `responsable2_nom` VARCHAR(255) ,
  `responsable2_prenom` VARCHAR(255) ,
  `responsable2_telephone` VARCHAR(10) ,
  `enveloppes` BOOLEAN ,
  `photos` BOOLEAN ,
  `identite` BOOLEAN ,
  `reglement` TIMESTAMP ,
  `certificat` TIMESTAMP ,
  `licence` VARCHAR(50) ,
  `datedemandelicence` TIMESTAMP ,
  `datereceptionlicence` TIMESTAMP ,
  `etat` VARCHAR(50) ,
  `sectionid` INT(11),
  `saison` INT(11),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`sectionid`) REFERENCES `#__csmbsections`(`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =0
  DEFAULT CHARSET =utf8;

INSERT INTO `#__csmbadherents` (`nom`, `prenom`, `sexe`, `date_naissance`, `ville_naissance`, `adresse`, `ville`, `codepostal`, `telephonefixe`, `telephoneportable`, `email`,
                                `pere_nom`, `pere_prenom`, `pere_telephoneportable`, `mere_nom`, `mere_prenom`, `mere_telephoneportable`,
                                `responsable1_nom`, `responsable1_prenom`, `responsable1_telephone`,
                                `responsable2_nom`, `responsable2_prenom`, `responsable2_telephone`,
                                `etat`, `sectionid`, `saison`) VALUES
  ('HENRY', 'Gael', 'Masculin', '06/06/1983', 'marseille', '51a avenue jean compadieu', 'marseille', '13012', '0491000000', '0675191304', 'email@email.fr',
   'HENRY', 'Jean-Marie', '0675191313', 'SANNA', 'Thérèse', '0667283816', 'NomResp1', 'PrenomResp1', '0667283816', 'NomResp2', 'PrenomResp2', '0667283816', 'Renouveler', '1', '2014'),
  ('HUYNH', 'David', 'Masculin', '13/01/1996', 'Aubagne', 'vers aubagne', 'aubagne', '13100', '0491234567', '0612345678', 'email@email.fr',
   'HENRY', 'Jean-Marie', '0675191313', 'SANNA', 'Thérèse', '0667283816', 'NomResp1', 'PrenomResp1', '0667283816', 'NomResp2', 'PrenomResp2', '0667283816', 'En cours', '2', '2014');

