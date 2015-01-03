DROP TABLE IF EXISTS `#__csmbcomponent`;

CREATE TABLE `#__csmbcomponent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__csmbcomponent` (`nom`, `prenom`) VALUES
  ('HENRY', 'Gael'),
  ('HUYNH', 'David');