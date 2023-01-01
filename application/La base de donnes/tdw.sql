-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 déc. 2022 à 17:08
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(30) DEFAULT NULL,
  `prenom_admin` varchar(30) DEFAULT NULL,
  `email_admin` varchar(30) DEFAULT NULL,
  `age_admin` int(11) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_admin`, `prenom_admin`, `email_admin`, `age_admin`, `date_de_naissance`, `sexe`, `password`, `token`) VALUES
(1, 'chelihi', 'sofiane', 'admin', 21, '2022-12-11', 'm', 'admin', ' ');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(30) DEFAULT NULL,
  `description_categorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `description_categorie`) VALUES
(1, ' plats', 'plats principale '),
(2, 'entrées', 'entrées'),
(3, 'desserts', 'desserts'),
(4, 'boissons', 'boissons');

-- --------------------------------------------------------

--
-- Structure de la table `element_diaporama`
--

CREATE TABLE `element_diaporama` (
  `id_element` int(11) NOT NULL,
  `lien_image` varchar(255) DEFAULT NULL,
  `lien_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `element_site`
--

CREATE TABLE `element_site` (
  `id_element` varchar(30) NOT NULL,
  `couleur` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `id_recette` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`id_recette`, `ordre`, `description`) VALUES
(1, 1, 'Couper le poulet en lanière pour faire des doigts.'),
(1, 2, 'Mettre dans un bol les lanières de poulet, ajouter les épices, le jus de citron et le persil haché.'),
(1, 3, 'Mélanger le tout et laisser mariner 1 heure ou plus.'),
(1, 4, 'Baigner les lanières de poulet dans les œufs battus et entre temps préchauffer l’huile de friture.'),
(1, 5, 'Rouler ensuite les lanières de poulet dans la chapelure puis faire cuire.'),
(1, 6, 'Laisser dorer puis retourner. Une fois que les deux faces de vos nuggets sont bien colorées, égouttez-les en les disposant sur une assiette recouverte de papier absorbant.'),
(1, 7, 'Servir avec un bon riz, des frites ou tout simplement de la mayonnaise et du ketchup.'),
(2, 1, 'Commencer par cuire le riz : cuire le riz dans de l’eau salée et laisser dépasser un peu du quotidien pour avoir des graines pâteuses afin de faciliter la formation des croquettes.'),
(2, 2, 'Entre temps préparer la sauce : chauffer l’huile d’olive et le beurre dans une cocotte ou une marmite et faire bien revenir et dorer les pilons de poulet.'),
(2, 3, 'Ajouter l’oignon haché, le persil et les épices. Continuer de revenir.'),
(2, 4, 'Ajouter ensuite la farine, singer, incorporer les olives vertes, les champignons puis mouiller juste à niveau et laisser cuire.'),
(2, 5, 'Préparer les croquettes : mettre dans un saladier le riz cuit, l’1/2 oignon haché cuit et bien doré, les épices, le fromage, le persil et l’œuf.'),
(2, 6, 'Mélanger bien, puis former des croquettes avec un peu de cheddar dedans. Passer ensuite les croquettes par de la farine, puis l’œuf battu puis la chapelure.'),
(2, 7, 'Mettre au frais 30 minutes ou plus.'),
(2, 8, 'Frire les croquettes dans un bain d’huile chaude et laisser égoutter.'),
(2, 9, 'Servir ensuite les croquettes de riz avec la sauce aux olives et champignons et les pilons de poulet.'),
(3, 1, 'Commencer par préparer la sauce: mettre à revenir dans une cocotte les morceaux de viande avec le smen ou le beurre, ajouter l’oignon haché, l’ail écrasé et les épices. Revenir bien puis mouiller et laisser cuire.'),
(3, 2, 'Entre temps, laver bien le riz de son amidon (3 à 4 fois) puis trempez-le 20 à 30 minutes. Égoutter.'),
(3, 3, 'Couper les aubergines en rondelles assez épaisses (1 cm d’épaisseur), les saler pour qu’elles dégorgent l’eau.'),
(3, 4, 'Rincer et essuyer les aubergines. Faire frire et laisser égoutter.'),
(3, 5, 'Revenir aussi dans une poêle les 2 oignons coupés en lamelles avec un peu d’huile, saler, poivrer et laisser cuire. Mettre de coté.'),
(3, 6, 'Cuire le riz: dans une marmite ou un tajine, disposer un peu d’oignons et quelques rondelles d’aubergines, ajouter une couche de riz, puis une couche d’aubergines et oignons puis après le restant du riz.'),
(3, 7, 'Verser dessus 3 verres de sauce, porter à ébullition, réduire le feu au minimum couvrir et laisser  cuire de 15 à 20 minutes.'),
(4, 1, 'Rincez votre riz plusieurs fois en changeant l’eau a chaque fois jusqu’à ce que l’eau soit clair,  ensuite l’égoutter dans une passoire.'),
(4, 2, 'Mixez tous les légumes dans un mixeur un par un (l’oignon et l’ail, les deux poivrons puis la carotte).'),
(4, 3, 'Sur feu moyen, faites chauffer l’huile et le beurre, ajoutez, l’oignon et l’ail, revenir un peu puis ajoutez les poivrons et la carotte. continuez de revenir.'),
(4, 4, 'Ajoutez les épices, le thym, le laurier et le persil haché et incorporez le riz et faites revenir encore quelques minutes(avoir un riz translucide).'),
(4, 5, 'Ajoutez ensuite l’eau, le cube de bouillon, mélangez et laissez cuire sur feu moyen. Mélangez délicatement de temps à autre.'),
(5, 1, 'Bouillir les olives dans une eau bouillante en changeant l’eau 3 fois. Réserver.'),
(5, 2, 'Préparer la sauce :ajouter les olives, le cumin environ ½ c-à-c, le persil et le filet d’huile d’olive à la sauce tomate et mettre sur feu moyen. Laisser mijoter environ 10 min puis réserver.'),
(5, 3, 'Entre temps, préparer les croquettes : mixer à l’aide d’un mixeur l’oignon et l’ail puis ajouter le blanc de poulet, le persil et continuer de mixer.'),
(5, 4, 'Ajouter au blanc de poulet le riz cuit, les épices, l’œuf et mixer le tout une autre fois. Verser le mélange obtenu dans un saladier et façonner des croquettes.'),
(5, 5, 'Enrober les croquettes de farine et chauffer un peu d’huile dans une poêle.'),
(5, 6, 'Frire des deux côtés les croquettes et laisser égoutter.'),
(5, 7, 'Verser la sauce aux olives dans un plat allant au four, disposer dessus les croquettes, parsemer de mozzarella et de persil.'),
(6, 1, 'Préchauffer le four à 200°C.'),
(6, 2, 'Nettoyer les sardines, enlever les arêtes et mettre de coté.'),
(6, 3, 'Préparer la chermoula : dans un saladier, mettre les poivrons coupés en petits dés, l’ail écrasé, le persil, la coriandre hachée, les épices, le jus de citron et l’huile d’olive.  Mélanger bien le tout.'),
(6, 4, 'Dans un plat huilé allant au four, ranger les filets de sardines en rayon de soleil comme sur les photos (fixer la partie inférieur des filets avec vos doigts).'),
(6, 5, 'Mettre ensuite un peu de chermoula au fond, puis le riz et pour finir tapisser le tout du reste de chermoula.'),
(6, 6, 'Rabattre après la partie supérieur des sardines vers l’intérieur et badigeonner d’huile d’olive.'),
(7, 1, 'Mettre dans une cocotte un peu de beurre et d’huile à chauffé puis revenir dedans les morceau de poulet.'),
(7, 2, 'Ajouter l’oignon en lamelles, l’ail coupé en deux, le laurier, l’estragon et les épices. Revenir bien le tout.'),
(7, 3, 'Mouiller avec de l’eau chaude pas trop et laisser bien cuire le tout.'),
(7, 4, 'Après cuisson, retirer le poulet, le laurier, l’estragon et mixer bien le tout. Ajouter la crème fraîche à la sauce obtenue, mélanger et laisser mijoter 1 à 2 minutes.'),
(7, 5, 'Remettre le poulet dans la sauce et servir avec du riz ou des frites.'),
(8, 1, 'Rincez votre riz plusieurs fois en changeant l’eau a chaque fois jusqu’à ce que l’eau soit clair,  ensuite l’égoutter dans une passoire.'),
(8, 2, 'Sur feu moyen, faites chauffer l’huile et le beurre, ajoutez, l’ail écrasé, la cannelle, le poivre, le laurier et  l’estragon. Faites revenir une minute sans brûler l’ail.'),
(8, 3, 'Incorporez le riz et faites revenir encore quelques (avoir un riz translucide). Ajouter ensuite l’eau, le cube de bouillon, mélanger et laisser cuire sur feu moyen. Mélangez délicatement de temps à autre.'),
(8, 4, 'Entre temps, épluchez et coupez les carottes en fines lamelles à l’aide d’un économe et faites les revenir dans un peu de beurre. Salez et laissez-les cuire (pas trop).'),
(8, 5, 'Après cuisson des lamelles de carottes, coupez-les en petits dés.'),
(8, 6, 'Ajoutez ensuite les dés de carotte et le persil haché au riz presque cuit, mélangez et continuez la cuisson (1 à 2 min max).'),
(8, 7, 'Servir avec un filet d’huile d’olive.'),
(9, 1, 'Mettre dans une cocotte, les morceaux de viande, l’oignon en lamelles ou haché, l’ail écrasé, la moutarde, le beurre, les épices, le persil, les olives et le thym. Revenir bien le tout puis mouiller et laisser cuire.'),
(9, 2, 'Entre temps faire bouillir et cuire le riz dans une eau salée sur feu doux.'),
(9, 3, 'Mixer ensuite le riz après cuisson, ajouter les épices, l’ail écrasé, le persil haché, le fromage râpé et l’œuf. Mélanger bien le tout puis façonner des boulettes.'),
(9, 4, 'Enrober ensuite les boulettes de chapelure  ou de farine et faire frire. Laisser égoutter.'),
(9, 5, 'Servir les boulettes avec la sauce.'),
(10, 1, 'Nettoyer, laver et laisser bien égoutter le poulet.'),
(10, 2, 'Entre temps préparer la marinade : mélanger dans un bol tous les épices, l’ail écrasé et le beurre fondu.'),
(10, 3, 'Badigeonner bien de marinade le poulet à l’intérieur puis ficeler bien au niveau des cuisses et des ailes comme sur la photo.'),
(10, 4, 'Badigeonner ensuite l’extérieur du poulet avec le reste de la marinade et laisser mariner toute une nuit de préférence.'),
(11, 1, 'Revenir bien les morceaux de poulet (avoir une belle dorure) dans une cocotte ou une marmite avec la cuillère de smen (ghee), ajouter les échalotes en rondelles, l’ail écrasé et les épices et continuer de revenir.'),
(11, 2, 'Ajouter ensuite les champignons et le thym. Revenir encore 5 minutes.'),
(11, 3, 'Mouiller (pas trop) et laisser cuire sur feu moyen.'),
(11, 4, 'Servir avec des pâtes blanches ou avec des légumes (tagliatelles de carottes et courgettes pour moi).'),
(12, 1, 'Commencer par préparer la sauce bolognaise: chauffer dans une poêle un peu d’huile  d’olive et faire revenir l’oignon haché.'),
(12, 2, 'Ajouter les carottes râpées, l’ail écrasé et continuer de revenir. Ajouter la viande hachée, saler,poivrer et laisser revenir.'),
(12, 3, 'Incorporer ensuite les tomates hachées, le concentré de tomates, la pincée de sel, le basilic et la coriandre hachée.'),
(12, 4, 'Laisser mijoter quelques minutes puis mouiller et laisser cuire sur feu doux.'),
(12, 5, 'Entre temps préparer la sauce béchamel et faire cuire à mi-cuisson les plaques de lasagnes dans une eau bouillante avec un peu de sel et d’huile d’olive.'),
(12, 6, 'Beurrer un plat allant au  four, et y déposer une couche de béchamel, puis une couche de lasagnes, et une de sauce tomate à la viande parsemée d’emmental râpé.'),
(12, 7, 'Répéter l’opération jusqu’à épuisement des ingrédients en terminant par de la béchamel, et parsemer de fromage râpé.'),
(12, 8, 'Couvrir avec du papier aluminium, enfourner et laisser bien gratiner.'),
(13, 1, 'Commencer par revenir dans une poêle avec un peu d’huile les poivrons coupés en dés, ajouter le blanc de poulet, l’ail écrasé et les épices.'),
(13, 2, 'Revenir très bien puis ajouter le concentré de tomate.Couvrir et laisser cuire bien le tout.'),
(13, 3, 'Entre temps, cuire la trida 5 à 7 minutes dans une eau bouillante et salée avec un peu d’huile d’olive. Égoutter, huiler et laisser de côté.'),
(13, 4, 'Préparer la sauce béchamel : mettre dans une casserole hors feu le lait, la farine, le sel et le poivre. Mélanger bien avec un fouet, ajouter le beurre et mettre sur feu tout en remuant jusqu’à obtention d’une sauce ni épaisse ni liquide.'),
(13, 5, 'Ajouter à la sauce le fromage fondu et une pincée de noix de muscade. Mélanger.'),
(13, 6, 'Verser une louche de sauce béchamel dans un plat à gratin, mettre dessus une couche de trida, puis une couche de blanc de poulet puis après une autre couche de béchamel.'),
(13, 7, 'Recouvrir de trida, de restant du blanc de poulet et de sauce béchamel. Parsemer de persil haché et de cheddar râpé.'),
(14, 1, 'Commencer par cuire les pâtes dans une eau bouillante avec un peu d’huile d’olive et de sel.'),
(14, 2, 'Entre temps, mettre à revenir l’oignon haché dans une poêle avec un peu d’huile, ajouter la viande hachée, l’ail écrasé, les épices et le persil haché. Laisser bien revenir.'),
(14, 3, 'Ajouter ensuite les pâtes et un peu de cheddar râpé, mélanger et laisser mijoter 2 à 3 minutes.'),
(15, 1, 'Commencer par cuire les pâtes dans une eau huilée sans sel (le cube de bouillon et la sauce soja sont salés). Égoutter et laisser de côté.'),
(15, 2, 'Entre temps, préparer la sauce : chauffer un peu d’huile et d’huile d’olive dans un wok et mettre à revenir l’oignon coupé en lamelles, les poivrons et les carottes.'),
(15, 3, 'Ajouter l’ail écrasé, un peu de persil, les épices, le cube de bouillon poulet, le thym et 2 c-à-s de sauce soja. Laisser bien revenir.'),
(15, 4, 'A l’aide d’une spatule en bois, mettre d’un côté les légumes (dans le wok bien sûr) et casser les œufs en remuant pour faire des  œufs brouillés.'),
(15, 5, 'Mélanger ensuite le tout, ajouter les pâtes et une louche d’eau de leur cuisson et les 2 cuillères de sauce soja restantes.'),
(15, 6, 'Mélanger bien le tout, ajouter du persil et de la coriandre et laisser mijoter 2 minutes.Servir chaud.'),
(16, 1, 'Préparer la sauce: mettre dans une cocotte avec un peu de smen les morceaux de viande, l’oignon râpé, l’ail écrasé et laisser revenir.'),
(16, 2, 'Ajouter les épices, un peu de coriandre ciselée, la tomate râpée, le concentré de tomates et continuer de revenir.'),
(16, 3, 'Ajouter les pois-chiche, mouiller et laisser bien cuire le tout.'),
(16, 4, 'Entre temps, préparer le Tlitli: Faire dorer le Tlitli dans une poêle, Huiler légèrement et passer à la vapeur. Une fois cette opération terminée, le mettre dans un grand plat et mouiller avec un grand verre d’eau. Le passer une deuxième fois à la vapeur,'),
(16, 5, 'Après cuisson complète de la viande et des pois chiches, retirer-les et ajouter à la sauce les courgettes coupées en 4. Continuer la cuisson.'),
(16, 6, 'Retirer aussi les courgettes de la sauce après cuisson et cuire le Tlitli dedans avec le reste de la coriandre sur feu très doux.'),
(16, 7, 'Servir ensuite avec la viande, les courgettes, les œufs durs et les pois chiches.'),
(17, 1, 'Laver, laisser égoutter et couper les abats en petits morceaux.'),
(17, 2, 'Dans une poêle avec un peu d’huile et d’huile d’olive, revenir l’échalote coupée en rondelles, l’ail écrasé et la harissa.'),
(17, 3, 'Ajouter à ce mélange les abats en morceaux, les épices, le persil et laisser bien revenir le tout à feu moyen.'),
(17, 4, 'Ajouter le cube de bouillon, mouiller avec un petit verre d’eau et laisser mijoter et cuire bien le tout sur feu doux.'),
(17, 5, 'Entre temps cuire les pâtes dans une eau salée et huilée. Égoutter et arroser d’un filet d’huile d’olive.'),
(17, 6, 'Servir les pâtes avec la sauce aux abats.'),
(18, 1, 'Cuire les pâtes dans une eau bouillante, salée avec un peu d’huile d’olive.'),
(18, 2, 'Entre temps, revenir l’oignon en lamelles avec un peu de beurre et laisser bien caraméliser. Ajouter les pâtes, l’ail écrasé, saler, poivrer et laisser revenir.'),
(18, 3, 'Ajouter ensuite la sauce soja et le basilic et remuer sans cesse pour bien enrober les pâtes de sauce soja. Laisser mijoter 2 minutes puis servir.'),
(19, 1, 'Dans une marmite ou une cocotte, mettre à revenir le blanc de poulet coupé en dés avec un peu d’huile, ajouter l’oignon haché, les échalotes en petits dés, les carottes, les navets et la courgette le tout en petits dés.'),
(19, 2, 'Ajouter ensuite le chou coupé en dés, les tiges des épinards aussi coupées en petits dés (les feuilles on les ajoute à la fin) et les épices. Laisser revenir bien le tout.'),
(19, 3, 'Mouiller avec de l’eau chaude et laisser cuire.'),
(19, 4, 'Entre temps, cuire les pâtes 5 minutes dans une eau bouillante, salée et huilée. Égoutter.'),
(19, 5, 'Après cuisson de la sauce, ajouter les pâtes et les feuilles des épinards. Laisser mijoter quelques minutes.'),
(19, 6, 'Servir chaud avec un filet d’huile d’olive'),
(20, 1, 'Cuire les pâtes dans une eau bouillante avec un peu de sel et d’huile d’olive. Réserver.'),
(20, 2, 'Entre temps, éplucher et couper les légumes en lamelles (courgette, poivrons, aubergine). Mettre les légumes dans une plaque allant au four avec un peu d’huile d’olive et enfourner pour quelques minutes. Réserver.'),
(20, 3, 'Revenir les feuilles d’épinards dans une poêle avec un peu d’huile d’olive, ajouter l’ail, saler et poivrer et laisser revenir.'),
(20, 4, 'Ajouter les pâtes au mélange d’épinards et laisser mijoter quelques minutes. Réserver.'),
(20, 5, 'Préparer la sauce tomate et la sauce béchamel.'),
(20, 6, 'Dans un moule allant au four, verser la sauce tomate, disposer dessus le mélange de pâtes et épinards, les légumes (poivrons, courgette et aubergine) puis verser dessus la sauce béchamel.'),
(20, 7, 'Parsemer de fromage, enfourner et laisser gratiner.'),
(21, 1, 'Commencer par étaler la pâte feuilletée finement, découper des cercles et étaler dessus un peu de sauce tomate.'),
(21, 2, 'Garnir les cercles de pâte d’un peu de thon, champignons, mozzarella et olives noires.'),
(22, 1, 'Commencer par préparer la pâte : mettre dans un saladier le lait, l’huile et le sel. Mélanger bien puis incorporer la farine et la levure chimique. Ramasser la pâte sans pétrir.'),
(22, 2, 'Chemiser les moules à tartelettes de pâte et mettre au frais le temps de préparer la garniture.'),
(22, 3, 'Préparer la garniture: revenir dans une poêle avec un peu d’huile les échalotes, ajouter le blanc de poulet et les courgettes. Continuer de revenir sur feu doux.'),
(22, 4, 'Ajouter ensuite le persil haché et les épices. Laisser cuire.'),
(22, 5, 'Préparer l’appareil à quiche : mélanger dans un bol les œufs, la crème liquide, le persil, saler et poivrer.'),
(22, 6, 'Reprendre les moules à tartelettes, garnir de mélange poulet-courgette, parsemer de cheddar râpé et verser dessus l’appareil à quiche.'),
(22, 7, 'Enfourner et laisser bien gratiner 20 à 25 minutes. Servir tiède.'),
(23, 1, 'Mettre dans un saladier, le lait tiède, l’eau tiède, le sucre, la levure boulangère et les deux verres de semoule fine. Mélanger bien le tout, couvrir et laisser lever 10 minutes.'),
(23, 2, 'Après 10 minutes, incorporer au mélange la farine et le sel. Mélanger à la main jusqu’à obtention d’une pâte un peu collante.'),
(23, 3, 'Pétrir 1 minute max en huilant les mains (avoir une pâte homogène). Laisser reposer la boule de pâte 5 minutes.'),
(23, 4, 'Rouler la boule de pâte dans un peu de semoule fine, étaler finement à la main puis laisser lever.'),
(23, 5, 'Cuire le pain dans un tajine ou une poêle à crêpe préalablement chauffé de chaque coté.'),
(24, 1, 'Préparer la farce : dans une poêle, revenir l’oignon haché avec un peu d’huile, saler et poivrer.'),
(24, 2, 'Ajouter ensuite le poulet émietté et bien revenir.'),
(24, 3, 'Hors feu, ajouter le persil haché et la crème fraîche.  Mélanger et réserver.'),
(24, 4, 'A l’aide d’un pinceau, badigeonner de beurre les feuilles de brick, mettre un peu de farce et un peu de fromage puis rouler et plier.'),
(24, 5, 'Badigeonner encore de beurre puis enfourner.'),
(25, 1, 'Commencer par préparer les boulettes de viande hachée: mettre dans un saladier la viande hachée, les épices, la chapelure, le persil haché, l’ail écrasé et l’oignon finement ciselé. Ajouter le blanc d’œuf, mélanger bien puis former des boulettes.'),
(25, 2, 'Mettre dans une poêle un peu d’huile et du beurre à chauffer et faire revenir dedans les boulettes de viande hachée jusqu’à obtention d’une belle dorure.'),
(25, 3, 'Ajouter l’oignon en lamelles, revenir revenir 2 minutes puis incorporer les tagliatelles de carottes, le persil et l’ail écrasé. Saler, poivrer et laisser cuire.'),
(26, 1, 'Dans une poêle, revenir les échalotes et l’ail écrasé avec un peu du mélange beurre-huile. Ajouter la viande hachée, la pincée de cannelle, Persil haché, saler, poivrer et continuer de revenir.'),
(26, 2, 'Dans la même poêle, casser les œufs et remuer de façon à obtenir une consistance crémeuse. Mélanger bien le tout.'),
(26, 3, 'Sur le fond d’un moule à tarte, disposer 2 feuilles de diouls  beurrées et déposer dessus le mélange viande hachée-œufs et fromage à tartiner.'),
(27, 1, 'Faites cuire les œufs dans une casserole d’eau sur feu moyen. Pour les œufs durs. Une fois cuits, écalez-les, puis coupez-les en 2 dans le sens de la longueur.'),
(27, 2, 'Séparez les blancs des jaunes et mettez-les dans 2 plats différents.'),
(27, 3, 'Mélangez les jaunes avec le thon, l’échalote émincée, l’ail haché, le curry, le sel et le poivre. Mixez soigneusement en y ajoutant progressivement la mayonnaise.'),
(27, 4, 'Remplissez vos blancs d’œufs durs de cette préparation puis saupoudrez de persil et du paprika.'),
(27, 5, 'Servez bien frais.'),
(28, 1, 'Dans une terrine, mettre la semoule fine, la farine complète, la levure, le sucre, l’huile d’olive et le sel. Mélanger bien le tout et ramasser la pâte avec de l’eau tiède (avoir une pâte collante).'),
(28, 2, 'Pétrir en huilant la main si nécessaire jusqu’à obtention d’une pâte lisse, molle et un peu collante. Laisser lever et doubler de volume.'),
(28, 3, 'Dégazer la pâte et former une boule. Préparer un torchon ou une feuille de papier cuisson sur un plateau et saupoudrer d’une poignée de semoule fine-farine complète.'),
(28, 4, 'Saupoudrer la boule de pâte de mélange semoule fine-farine complète, poser la sur le torchon et aplatir sur 2 cm.'),
(29, 1, 'Éplucher, laver et couper les carottes en rondelles.'),
(29, 2, 'Mettre les rondelles de carottes dans une marmite, ajouter 2 c-à-s d’huile d’olive, un peu de sel et mouiller avec l’eau chaude (1 petit verre). Laisser cuire sur feu moyen.'),
(29, 3, 'Après cuisson des carottes, ajouter à la marmite 4 gousses d’ail écrasées, le carvi, le paprika, le piment et 1 c-à-s de vinaigre. Laisser mijoter le tout 5 à 10 minutes.'),
(29, 4, 'Hors feu, ajouter les 2 gousses d’ail écrasées restantes, les 2 c-à-s d’huile d’olive et la c-à-s de vinaigre.'),
(29, 5, 'Parsemer de coriandre fraîche, mélanger bien le tout, laisser tiédir puis déguster.'),
(30, 1, 'Mettre dans un saladier le lait tiède, le sucre, la levure boulangère, la vanille et le zeste de citron.'),
(30, 2, 'Mélanger bien le tout puis ajouter l’œuf, l’huile et le sel. continuer de mélanger.'),
(30, 3, 'Incorporer ensuite la farine progressivement et la levure chimique tout en mélangeant à la main (avoir une pâte un peu collante).'),
(31, 1, 'Commencer par réduire les rondelles congelées d’orange et de citron en purée à l’aide d’un mixeur.'),
(31, 2, 'Ajouter ensuite l’eau à la purée d’orange-citron, mélanger puis filtrer bien le tout.'),
(31, 3, 'Ajouter le sucre, mélanger bien puis mettre au frais.'),
(32, 1, 'Laver les oranges avant d’en retirer le zeste.'),
(32, 2, 'Presser ensuite les oranges à l’aide d’un presse-agrumes.'),
(33, 1, 'Laver et couper 2 oranges et 1 citron en petits morceaux et presser les 2 autres oranges restantes.'),
(33, 2, 'Mettre dans le bol mixeur les agrumes coupés en petits morceaux, ajouter le jus des deux oranges, les 2 pots de yaourt et un peu d’eau. Mixer bien le tout.'),
(33, 3, 'Ajouter ensuite un peu de citronnade, l’eau et mixer encore une autre fois.'),
(33, 4, 'Filtrer, mettre au frais puis servir.'),
(34, 1, 'Laver, éplucher et couper les oranges en rondelles en laissant 2 avec la peau. Mettre de coté.'),
(34, 2, 'Laver et couper les citrons en rondelle et mettre de coté.'),
(34, 3, 'Éplucher, laver et couper les carottes en rondelles aussi et mettre de coté.'),
(34, 4, 'Mettre dans une grande marmite ou une cocotte, les oranges épluchées et coupées, les carottes, les citrons et les 2 oranges non épluchées en rondelles, le sucre et les 2 litres d’eau.'),
(35, 1, 'Mettre dans une cocotte, les oranges et les pommes lavées et coupées en dés, ajouter les carottes épluchées et coupées en rondelles et 1 litre d’eau. Laisser cuire 30 à 35 minutes environ.'),
(35, 2, 'Après cuisson, mixer bien le tout, ajouter 3 à 4 litres d’eau froide, le sucre et l’acide citrique.'),
(35, 3, 'Mélanger bien le tout puis servir.'),
(36, 1, '1ère étape : dans une cocotte ou casserole, mettre les carottes épluchées, lavées et coupées en rondelles, ajouter une orange et un citron coupés en dés avec leurs peau.'),
(36, 2, 'Ajouter aussi le jus du reste d’orange et 1 litre d’eau. Laisser bien cuire le tout.'),
(37, 1, 'Couper les nectarines en petits morceaux, ajouter la citronnade concentrée selon la quantité des nectarines et l’eau froide.'),
(37, 2, 'Mixer ensuite bien le tout.'),
(38, 1, 'Mélanger le jus de citron, sucre, vanille, lait.'),
(38, 2, 'Ajouter l’eau et mélanger encore une fois.'),
(38, 3, 'Mettre au frais….Enjoy'),
(39, 1, 'Couper et congeler l’orange et le citron.'),
(39, 2, 'Mixer l’orange et le citron congelés la veille puis verser dessus 1 litre d’eau bouillante.'),
(40, 1, 'Laver et couper les fraises. Mettre le fruit dans le blender et ajouter la citronnade et l’eau froide.'),
(40, 2, 'Mixer quelques minutes et c’est prêt !'),
(41, 1, 'Mettre dans un saladier les œufs, le sel, le sucre, l’huile, la vanille et le zeste de citron. Mélanger bien le tout à l’aide d’un batteur électrique puis ajouter la farine tamisée ( les 4 verres) et la levure chimique jusqu’à obtention d’une pâte collant'),
(41, 2, 'Réserver 2 c-à-s de ce mélange et verser le reste sur un plat allant au four couvert du papier cuisson. Étaler bien la pâte avec les mains huilées ou avec une spatule.'),
(41, 3, 'Étaler ensuite une couche de confiture sur la pâte (environ 5 c-à-s) et saupoudrer de noix de coco.'),
(41, 4, 'Ajouter aux 2 c-à-s de pâte réservées  de la farine jusqu’à obtention d’une pâte un peu dure.'),
(41, 5, 'Râper ensuite cette pâte sur la couche de confiture puis enfourner à 160°C (le four est préalablement chauffé).'),
(42, 1, 'Verser dans une casserole le jus d’orange, le sucre et la maïzena. Mélanger bien le tout puis mettre sur feu.'),
(42, 2, 'Remuer sans cesse jusqu’à obtention d’une crème épaisse qui se détache des parois de la casserole. Couvrir au contact et laisser refroidir.'),
(42, 3, 'Entre temps préparer la crème chantilly: mettre dans un bol la poudre chantilly et le lait froid. Battre bien le tout jusqu’à obtention d’une crème bien ferme puis réserver.'),
(42, 4, 'Battre la crème à l’orange bien puis incorporer la crème chantilly peu à peu tout en continuant de battre (avoir une belle mousse).'),
(43, 1, 'Mettre dans un saladier le lait tiède, le sucre, la levure boulangère, la vanille et le zeste de citron.'),
(43, 2, 'Mélanger bien le tout puis ajouter l’œuf, l’huile et le sel. continuer de mélanger.'),
(43, 3, 'Incorporer ensuite la farine progressivement et la levure chimique tout en mélangeant à la main (avoir une pâte un peu collante).'),
(44, 1, 'Commencer par préchauffer le four à 160°C.'),
(44, 2, 'Préparer le cake: battre au fouet jusqu’à blanchissement les œufs, le sucre, la pincée de sel et le zeste de citron.'),
(44, 3, 'Ajouter l’huile peu à peu tout en mélangeant puis le pot de crème dessert caramel. Mélanger bien.'),
(44, 4, 'Incorporer ensuite la farine et la levure chimique, mélanger puis verser la préparation dans un moule allant au four.'),
(44, 5, 'Enfourner 10 à 15 minutes environ.'),
(44, 6, 'Entre temps préparer le sirop: mettre dans une casserole le verre d’eau, le sucre et la tranche de citron.'),
(44, 7, 'Porter à ébullition puis compter 7 minutes et retirer du feu.'),
(44, 8, 'Préparer la crème au citron: Mélanger bien dans une casserole les œufs, le sucre, le zeste de citron et le jus de citron.'),
(44, 9, 'Mettre sur feu tout en remuant jusqu’à obtention d’une crème onctueuse. Ajouter le beurre à la crème hors feu, filmer au contact et mettre au frais.'),
(44, 10, 'Après cuisson du cake, laisser tiédir puis verser dessus le sirop. Laisser de coté.'),
(45, 1, 'Mettre dans un saladier les œufs, le sucre, la pincée de sel et le zeste de citron. Battre à l’aide d’un fouet ou un batteur électrique.'),
(45, 2, 'Ajouter l’huile doucement tout en mélangeant puis le lait. Préchauffer le four à 160°C.'),
(45, 3, 'Incorporer le cacao, la farine, la levure chimique et bien mélanger.'),
(45, 4, 'Verser la préparation (environ 2 c-à-s) dans des moules à mini cakes beurrés et farinés, et enfourner pour 20 minutes environ.'),
(46, 1, 'Préparer la pâte :mettre dans un saladier la farine tamisée, le sucre glace, le sel et la levure.'),
(46, 2, 'Mélanger, ajouter les cubes de margarine et travaillez-le du bout des doigts avec la farine jusqu’à ce que la préparation soit sableuse.'),
(46, 3, 'Ajouter ensuite l’œuf entier et malaxer pour obtenir une belle boule de pâte homogène. Laisser reposer au frais 15 minutes.'),
(46, 4, 'A l’aide d’un rouleau à pâtisserie, étaler la pâte sur un plan de travail légèrement fariné.'),
(46, 5, 'Garnir de pâte des petits moules à tartelettes, piquer et mettre au congélateur jusqu’à ce que la pâte soit congelée.'),
(46, 6, 'Entre temps, préchauffer le four à 200°C.'),
(46, 7, 'Cuire après les fonds de tartelettes (cuisson complète). Laisser refroidir.'),
(46, 8, 'Préparer la compote de figues fraîches : nettoyez bien les figues fraîches et coupez-les en petits morceaux. Versez les morceaux de figues dans une casserole. Ajoutez le miel, le zeste et le jus d’orange puis mélangez bien.'),
(46, 9, 'Mettre la casserole sur feu doux et laisser cuire le mélange 10 à 15 minutes en mélangeant régulièrement.'),
(46, 10, 'Laisser tiédir puis mixer le tout à l’aide d’un mixeur plongeant.'),
(46, 11, 'Préparer la crème pâtissière : Dans une casserole, verser le lait, ajouter la vanille et 2 c-à-s de sucre. Porter à ébullition sur feu doux.'),
(46, 12, 'Entre temps, mélanger bien à l’aide d’un fouet l’œuf, les 2 c-à-s de sucre restantes, la maïzena et la pincée de sel.'),
(46, 13, 'Une fois que le mélange est bien homogène, verser la moitié du lait parfumé à la vanille tout juste bouillant sur l’appareil à crème. Mélanger d’abord délicatement puis de façon plus énergique pour bien détendre la crème.'),
(46, 14, 'Lorsque la crème est bien souple, la reverser dans la casserole avec la moitié de lait restante.'),
(46, 15, 'Replacer la casserole sur feu doux. Mélanger sans cesse jusqu’à l’apparition des premiers bouillons, qui coïncide avec l’épaississement de la crème. Cette dernière doit rester souple.'),
(46, 16, 'Hors feu ajouter le beurre et continuer de fouetter pour qu’elle refroidisse plus rapidement.'),
(46, 17, 'Filmer et mettre au frais. Entre temps, faire monter la poudre chantilly et l’eau froide en crème chantilly.'),
(46, 18, 'Incorporer ensuite la crème chantilly à la crème pâtissière et battre le tout à l’aide d’un batteur électrique jusqu’à obtention d’une crème légère.'),
(46, 19, 'Le montage des tartelettes : garnir les fonds de tartelettes bien dorés d’une couche de compote de figues fraîche puis d’une couche de crème pâtissière légère.'),
(47, 1, 'Dans un saladier, mettre les œufs, l’huile, Lben, le vinaigre et battre bien le tout à l’aide d’un batteur électrique.'),
(47, 2, 'Ajouter la farine et le cacao tamisés, le sucre, le sel, la levure et la vanille. Mélanger bien le tout et battre encore 2 minutes.'),
(47, 3, 'Préchauffer le four à 180°C et entre temps préparer les moules à cupcakes avec les caissettes.'),
(47, 4, 'Remplir ensuite les moules à moitié, mettre au centre un peu de chocolat et continuer de remplir jusqu’à 3/4 des moules.'),
(47, 5, 'Enfourner 18 à 20 minutes puis décorer avec du chocolat fondu comme sur la photo.'),
(48, 1, 'Mélanger la levure, la pincée de sucre et l’eau tiède (2 à 3 c-à-s d’eau).'),
(48, 2, 'Dans une terrine, mélanger le lait, les œufs, le sucre, le sel et ajouter la levure.'),
(48, 3, 'Incorporer la farine et ramasser jusqu’à obtention d’une pâte homogène.'),
(48, 4, 'Pétrir la pâte 5 à 10 minutes sur un plan de travail fariné (obtenir une pâte lisse) couvrir et laisser lever (étaler un peu de beurre sur les bords de la terrine).'),
(48, 5, 'Dégazer la pâte et étaler en un rectangle de 40 cm environ.'),
(48, 6, 'Couper le rectangle de pâte en 4 sur un coté et en 8 sur l’autre coté  pour obtenir des petits rectangles.'),
(48, 7, 'Fourrer les rectangles de pâte avec les pépites de chocolat puis rouler.'),
(48, 8, 'Beurrer un plat en verre allant au four et disposer les petits rectangles comme sur la photo.'),
(49, 1, 'Commencer par préparer la couche du biscuit:  mettre dans le bol du mixeur les biscuits concassés, le beurre fondu et mixer bien le tout (finement).'),
(49, 2, 'Verser la préparation dans un moule amovible ou un cercle a entremet afin d’en faire un fond de tarte.'),
(49, 3, 'Préparer la crème caramel: verser dans un saladier le pot de flan caramel, le lait froid et la poudre chantilly. Mélanger et battre le tout à l’aide d’un batteur électrique jusqu’à obtention d’une crème ferme.'),
(49, 4, 'Ajouter à la crème obtenue les pépites de chocolat, mélanger puis verser-la sur le fond de biscuit. Égalisé la surface et mettre au frais.'),
(49, 5, 'Préparer la crème au chocolat: mettre dans un saladier la poudre chantilly, le lait froid et faire monter en crème chantilly.'),
(49, 6, 'Ajouter le chocolat noir fondu et continuer de battre encore 2 minutes.'),
(49, 7, 'Verser ensuite la deuxième couche sur la crème caramel et égaliser la surface. Mettre au frais quelque temps.'),
(49, 8, 'Démouler et décorer avec la sauce caramel et le concassé de dioul doré.'),
(50, 1, 'Commencer par préparer la crème pâtissière au chocolat : dans une casserole, verser le lait, ajouter la vanille et le sucre. Porter le tout à ébullition sur feu doux.'),
(50, 2, 'Dans une autre casserole ou un saladier mettre l’œuf entier, ajouter la maïzena et mélanger bien le tout avec un fouet.'),
(50, 3, 'Verser sur le mélange œuf-maïzena la moitié du lait tout juste bouillant et mélanger délicatement de façon à ne pas former de grumeaux.'),
(50, 4, 'Reverser ensuite dans la casserole avec la moitié de lait restante.'),
(50, 5, 'Replacer la casserole sur feu doux, mélanger sans cesse jusqu’à épaississement.'),
(50, 6, 'Hors feu, ajouter La pâte à tartiner Nutella et le beurre. Mélanger bien avec un fouet jusqu’à obtention d’une crème lisse et brillante.'),
(50, 7, 'Répartir la moitié de la crème pâtissière au chocolat dans les verrines puis une couche de boudoirs imbibés dans du lait et quelques boules de chocolat. Mettre de coté.'),
(50, 8, 'Préparer la crème diplomate : à l’aide d’un batteur électrique monter la poudre chantilly et le lait froid en crème.'),
(50, 9, 'Ajouter à la moitié de la crème pâtissière au chocolat restante la moitié de la crème chantilly et mélanger bien jusqu’à obtention d’une crème homogène.'),
(50, 10, 'Répartir ensuite la crème diplomate obtenue dans les verrines et pour finir le restant de crème chantilly.'),
(50, 11, 'Décorer avec le cacao et les boules de chocolat.'),
(50, 12, 'Mettre au frais puis servir.');

-- --------------------------------------------------------

--
-- Structure de la table `fetes`
--

CREATE TABLE `fetes` (
  `id_fete` int(11) NOT NULL,
  `nom_fete` varchar(30) DEFAULT NULL,
  `description_fete` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fetes`
--

INSERT INTO `fetes` (`id_fete`, `nom_fete`, `description_fete`) VALUES
(1, 'Achoura', 'Achoura'),
(2, 'Mouloud', 'Mouloud'),
(3, 'Aïd el-Fitr', 'Aïd el-Fitr'),
(4, 'Aïd el-Adha', 'Aïd el-Adha'),
(5, 'ramadan', 'ramadan'),
(6, 'mariage', 'mariage'),
(7, 'circoncision', 'circoncision');

-- --------------------------------------------------------

--
-- Structure de la table `info_nutr`
--

CREATE TABLE `info_nutr` (
  `id_info` int(11) NOT NULL,
  `glucide` float DEFAULT NULL,
  `lipide` float DEFAULT NULL,
  `minéraux` float DEFAULT NULL,
  `vitaminA` float DEFAULT NULL,
  `vitaminB` float DEFAULT NULL,
  `vitaminC` float DEFAULT NULL,
  `vitaminD` float DEFAULT NULL,
  `vitaminE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `info_nutr`
--

INSERT INTO `info_nutr` (`id_info`, `glucide`, `lipide`, `minéraux`, `vitaminA`, `vitaminB`, `vitaminC`, `vitaminD`, `vitaminE`) VALUES
(1, 55.71, 6.21, 8.85, 9.7, 36.03, 1.37, 31.01, 39.38),
(2, 8.09, 11.36, 43.12, 24.25, 29.21, 1.1, 43.27, 30.47),
(3, 13.15, 13.97, 6.11, 7.19, 36.52, 25.31, 31.14, 11.69),
(4, 47.46, 37.05, 14.69, 22.56, 42.12, 24.73, 43.45, 54.44),
(5, 16.15, 49.4, 33.79, 4.34, 37.81, 30.79, 21.13, 22.6),
(6, 23.76, 20.09, 34.36, 32.6, 31.98, 28.97, 34.75, 43.34),
(7, 52.87, 7.03, 16.33, 20.85, 14.22, 22.11, 9.78, 39.89),
(8, 51.27, 56.64, 53.15, 19.46, 56.6, 1.13, 36.24, 28.54),
(9, 46.75, 24.23, 18.67, 50.53, 40.14, 14.16, 9.62, 6.59),
(10, 45.74, 43.06, 48.77, 8.3, 38.33, 25.67, 54.5, 43.23),
(11, 31.27, 32.75, 45.61, 32.27, 25.79, 11.95, 4.64, 23.08),
(12, 46.59, 22.49, 45.76, 34, 55.75, 49.1, 17.49, 33.08),
(13, 44.88, 46.75, 55.43, 15.06, 42.38, 11.81, 4.51, 50.43),
(14, 7.25, 53.69, 29.34, 17.98, 45.9, 31.97, 24.67, 38.77),
(15, 47.62, 39.93, 30.23, 51.46, 9.07, 38.1, 42.76, 47.62),
(16, 50.08, 11.11, 42.38, 44.86, 32.74, 40.13, 38.37, 40.07),
(17, 55.92, 12.42, 51.54, 10.97, 43.28, 3.18, 0.62, 3.46),
(18, 26.24, 7.87, 36.81, 26.94, 18.12, 19.28, 17, 14.14),
(19, 28.7, 0.52, 11.33, 45.49, 43.9, 53.43, 38.55, 23.24),
(20, 11.66, 3.67, 51.86, 43.9, 51.56, 27.36, 32.97, 40.41),
(21, 30.01, 2.52, 30.47, 38.58, 27.08, 40.9, 36.58, 54.1),
(22, 2.46, 31.95, 53.54, 16.6, 20.57, 42.23, 1.88, 38.13),
(23, 46.83, 31, 11.46, 20.88, 37.53, 42.46, 49.91, 55.12),
(24, 49.64, 4.93, 8.7, 14.03, 39.56, 25.28, 49.91, 51.37),
(25, 39.15, 55.54, 30.79, 56.58, 24.66, 0.12, 32.34, 14.62),
(26, 48.42, 49.69, 51.97, 11.19, 31.96, 2.32, 32.93, 20.37),
(27, 0.66, 41.63, 19.87, 9.64, 8.18, 54.66, 42.02, 7.2),
(28, 44.26, 42.19, 44.7, 40.9, 36.58, 18.14, 6.9, 18.1),
(29, 24.3, 36.87, 20.59, 44.18, 33.45, 52.15, 52.36, 2.21),
(30, 22.43, 46.74, 56.48, 19.6, 51.48, 1.33, 33.65, 15.38),
(31, 12.88, 9.18, 15.3, 20.67, 35.78, 5.11, 13.2, 2.71),
(32, 50.68, 15.74, 16.91, 9.25, 47.26, 39.57, 32.79, 56.86),
(33, 38.23, 16.09, 29.63, 30.92, 5.24, 55, 48.84, 37.98),
(34, 16.2, 22.21, 6.53, 22.52, 51.68, 10.7, 22.35, 3.33),
(35, 42.81, 56.68, 37.49, 20.57, 13.27, 26.61, 26.06, 49.59),
(36, 49.46, 11.32, 49.52, 1.07, 20.77, 10.91, 53.67, 24.2),
(37, 6.92, 1.04, 36.54, 19.45, 25.96, 7.31, 24.14, 6.3),
(38, 18.62, 41.59, 28.95, 2.45, 37.92, 4.73, 52.31, 16.64),
(39, 39.14, 14.19, 33.17, 33.92, 48.58, 42.59, 32.25, 7.11),
(40, 51.78, 52.8, 25.69, 50.58, 20.99, 45.23, 52.73, 25.93),
(41, 39.08, 47.37, 51.07, 49.1, 54.28, 38.85, 26.72, 28.44),
(42, 33.84, 0.94, 52.58, 49.43, 38.01, 35.22, 32.73, 42.44),
(43, 23.53, 24.83, 38.29, 32, 20.68, 43.16, 14.88, 42.61),
(44, 10.93, 40.1, 8.98, 33.72, 12.54, 35, 42.27, 34.56),
(45, 40.1, 42.35, 19.72, 1.05, 44.92, 55.16, 45.04, 52.04),
(46, 16.79, 18.2, 30, 9.44, 56.69, 32.94, 11.24, 0.5),
(47, 3.39, 40.68, 29.1, 32.62, 7.87, 11.98, 53.5, 44.76),
(48, 48.35, 26.7, 30.11, 27.82, 37.26, 54.95, 46.25, 20.67),
(49, 11.17, 51.77, 51.88, 33.31, 12.6, 45.66, 18.91, 25.31),
(50, 17.11, 29.31, 56.84, 34.87, 16.4, 31.39, 42.99, 15.61),
(51, 54.68, 16.16, 56.57, 30.59, 34.97, 1.58, 2.37, 35.53),
(52, 51.34, 38.83, 51.03, 11.89, 10.61, 29.11, 26.19, 21.07),
(53, 45.07, 53.01, 51.27, 38.93, 43.98, 10.37, 34.74, 56.76),
(54, 29.15, 9.68, 31.24, 49.81, 23.02, 23.71, 8.26, 26.7),
(55, 40.5, 46.82, 32.26, 23.44, 11.51, 25.63, 52.35, 35.03),
(56, 16.62, 9.8, 37, 51.57, 21.97, 39.36, 26.57, 11.19),
(57, 21.17, 26.65, 43.92, 15.43, 25.54, 47.3, 25.55, 19.35),
(58, 34.45, 47.64, 14.38, 40.38, 45.89, 5.6, 53.18, 14.73),
(59, 11.08, 28.21, 35.94, 52.71, 3.08, 42.74, 38.24, 5.98),
(60, 3.22, 42.05, 18.79, 36.37, 51.39, 28.21, 23.89, 38.82),
(61, 47.42, 30.27, 1.81, 27.54, 43.04, 25.92, 27.04, 24.58),
(62, 16.95, 29.07, 50.68, 45.4, 52.74, 6.36, 43.35, 12.29),
(63, 49.04, 25.17, 6.65, 36.78, 16.74, 28.61, 55.44, 14.87),
(64, 24.38, 10.83, 48.61, 35.79, 28.11, 11.32, 43.56, 12.5),
(65, 22.69, 11.5, 43.22, 27.06, 24.95, 23.97, 28.58, 21.28),
(66, 6.65, 37.33, 49.9, 53.01, 33.88, 20.92, 17, 53.04),
(67, 38.35, 19.42, 27.9, 3.02, 29.9, 51.53, 30.73, 45.56),
(68, 32.22, 49.56, 9.11, 48.25, 6.88, 47.21, 26.03, 55.37),
(69, 52.55, 14.71, 8.32, 14.93, 12.94, 21.18, 15.16, 43.8),
(70, 2.61, 24.39, 35.48, 51.47, 18.88, 26.13, 34.63, 49.25),
(71, 22.94, 38.76, 45, 16.08, 31.26, 30.46, 53.82, 50.52),
(72, 0.95, 22.85, 17.21, 33.29, 17.05, 15.86, 20.46, 34.71),
(73, 14.79, 6.21, 47.95, 35.32, 22.56, 26.96, 20.92, 26.36),
(74, 55.32, 5.61, 20.45, 19.11, 54.85, 16.21, 37.54, 38.78),
(75, 28.23, 6.01, 2.8, 32.49, 46.07, 36.36, 40.46, 53.27),
(76, 47.37, 11.04, 30.96, 24.19, 12.75, 3.69, 0.07, 1.02),
(77, 11.73, 4.35, 13.33, 11.39, 44, 49.65, 2.52, 37.35),
(78, 4.07, 41, 44.52, 29.27, 56.04, 31.34, 0.62, 27.41),
(79, 52.57, 5.89, 16.74, 53.87, 27.76, 41.92, 38.9, 11.17),
(80, 22.52, 31.02, 36.71, 36.78, 20.18, 41.86, 0.14, 29.22),
(81, 25.53, 39.71, 17.49, 13.38, 49.07, 10.7, 30.8, 38.35),
(82, 53.58, 43.74, 35.32, 2.66, 1.23, 17.85, 29.15, 4.27),
(83, 17.65, 42.73, 7.65, 27.24, 40.67, 19.99, 7.68, 2.32),
(84, 23.47, 17.57, 25.03, 15.99, 25.36, 9.44, 12.29, 35.47),
(85, 25.27, 36.85, 34.69, 42.32, 20.83, 25.31, 42.92, 48.89),
(86, 7.35, 5.07, 20.66, 47.16, 48.25, 23.23, 38, 30.4),
(87, 41.6, 33.38, 43.97, 48.15, 51.16, 37.36, 20.43, 21.91),
(88, 17.19, 6.55, 25.99, 56.51, 20.51, 54.68, 32.21, 3.37),
(89, 45.47, 8.01, 44.52, 6.56, 7.21, 32.35, 9.49, 46.59),
(90, 55.97, 0.63, 53.75, 38.46, 24.2, 31.55, 12.93, 50.68),
(91, 17.45, 2.46, 0.47, 48.82, 40.01, 27.47, 23.38, 50.57),
(92, 17.56, 51.72, 6.03, 14.66, 26.5, 33.32, 39.89, 37.03),
(93, 24.39, 7.64, 9.72, 54.64, 26.65, 54.68, 41.43, 54.18),
(94, 36.21, 4.46, 10.91, 47.95, 36.49, 30.29, 30.37, 55.28),
(95, 14.88, 13.41, 1.76, 27.62, 19.85, 15.01, 35.27, 32.15),
(96, 31.38, 39.1, 1.35, 29.1, 53.09, 30.16, 9.67, 6.18),
(97, 52.87, 17.94, 14.27, 45.06, 10.77, 13.2, 14.41, 46.48),
(98, 53.48, 11.31, 13.98, 43.81, 15.74, 19.85, 20.22, 34.38),
(99, 14.28, 7.56, 26.97, 50.06, 41.41, 7.81, 28.83, 37.95),
(100, 10.21, 34.65, 25.94, 22.23, 17.88, 50.82, 32.96, 9.88),
(101, 31.08, 51.4, 39.58, 8.25, 24.08, 37.82, 1.88, 12.89),
(102, 28.33, 12.11, 25.68, 44.06, 52.02, 17.43, 19.63, 44.27),
(103, 42.02, 40.43, 25.51, 4.45, 1.6, 5.19, 3.32, 38.04),
(104, 45.46, 22.39, 25.79, 46.16, 48.86, 8.48, 50.43, 51.4),
(105, 19.94, 15.13, 33.23, 23.54, 42.82, 51.88, 24.17, 26.47),
(106, 56.95, 20.29, 35.36, 51.37, 13.16, 36.83, 28.29, 15.69),
(107, 55.43, 7.23, 30.36, 55.58, 26.95, 15.32, 5.44, 0.38),
(108, 1.76, 3.4, 47.3, 37.19, 4.85, 17.44, 52.15, 28.11),
(109, 25.52, 10.28, 52.25, 48.75, 12.25, 19.23, 11.86, 53.48),
(110, 20.19, 40.94, 21.57, 17.2, 37.08, 49.94, 51.27, 50.19),
(111, 5.35, 3.21, 39.44, 0.19, 0.72, 35.12, 7.66, 4.62),
(112, 30.02, 24.62, 18.74, 44.53, 11.91, 39.48, 48.83, 39.44),
(113, 32.01, 47.75, 38.11, 2.48, 8.54, 11.83, 19.89, 56.69),
(114, 53.95, 43.91, 5.65, 43.8, 10.71, 56.48, 4.96, 41.28),
(115, 27.74, 20.68, 20.47, 38.38, 26.97, 18.99, 44.37, 43.47),
(116, 26.6, 11.96, 35.03, 14.01, 52.89, 22.6, 16, 12.4),
(117, 2.96, 0.47, 10.25, 35.93, 32.08, 43.77, 24.31, 18.73),
(118, 55.63, 34.53, 23.71, 56.69, 35.87, 28.11, 26.1, 6.15),
(119, 33.22, 56.4, 35.95, 11.57, 53.27, 33.61, 4.1, 43.02),
(120, 27.23, 5.36, 30.05, 22.81, 26.5, 44.94, 27.35, 54.99),
(121, 21.52, 0.5, 18.46, 40.82, 44.34, 44.01, 26.01, 23.31),
(122, 23.36, 28.23, 50.52, 22.34, 25.73, 29.36, 21.53, 54.58),
(123, 30.15, 4.46, 19.62, 56.55, 23.97, 2.87, 3.37, 19.83),
(124, 7.05, 51.95, 51.82, 43.01, 36.62, 45.34, 50.04, 29.52),
(125, 47.54, 45.29, 26.73, 15.61, 9.22, 18, 38.87, 9.22),
(126, 37.6, 32.39, 6.09, 42.44, 27.52, 45.46, 5.55, 56.56),
(127, 15.98, 41.09, 2.99, 9.69, 7.61, 18.62, 45.95, 0.99);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `id_ingr` int(11) NOT NULL,
  `nom_ingr` varchar(40) DEFAULT NULL,
  `healthy` tinyint(1) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id_ingr`, `nom_ingr`, `healthy`, `calories`) VALUES
(1, 'poulet', 1, 4),
(2, 'ail en poudre', 0, 147),
(3, 'gingembre', 0, 129),
(4, 'poivre noire', 0, 192),
(5, 'curcuma', 1, 246),
(6, 'paprika', 1, 48),
(7, 'jus de citron', 0, 218),
(8, 'Sel', 1, 67),
(9, 'Persil haché', 1, 160),
(10, 'œufs', 1, 227),
(11, 'Chapelure', 1, 166),
(12, 'Huile', 0, 133),
(13, 'oignon haché', 0, 37),
(14, 'Persil', 1, 238),
(15, 'Champignons', 0, 62),
(16, 'huile d’olive', 1, 98),
(17, 'oignons', 0, 170),
(18, 'poivre', 1, 62),
(19, 'cannelle', 1, 116),
(20, 'Smen', 0, 21),
(21, 'riz', 0, 35),
(22, 'eau chaude', 1, 93),
(23, 'beurre', 1, 148),
(24, 'carotte', 0, 5),
(25, 'poivron vert', 0, 80),
(26, 'poivron rouge', 1, 187),
(27, 'Thym', 0, 130),
(28, 'laurier', 0, 35),
(29, 'Épice poulet', 0, 163),
(30, 'Curry', 0, 162),
(31, 'bouillon volailles', 0, 2),
(32, 'Cumin', 1, 71),
(33, 'Piment rouge', 1, 94),
(34, 'Farine', 0, 21),
(35, 'sardines', 1, 3),
(36, 'estragon', 1, 74),
(37, 'crème fraîche', 0, 239),
(38, 'bouillon de poulet', 1, 175),
(39, 'viande', 1, 199),
(40, 'moutarde', 1, 10),
(41, 'Olives vertes', 1, 115),
(42, 'gingembre en poudre', 1, 113),
(43, 'safran', 1, 208),
(44, 'ail', 0, 52),
(45, 'échalotes', 0, 9),
(46, 'd’eau bouillante', 1, 213),
(47, 'pâte lasagnes', 0, 51),
(48, 'Cheddar', 0, 249),
(49, 'Sauce béchamel', 1, 125),
(50, 'trida', 1, 165),
(51, 'poivrons', 1, 117),
(52, 'concentré de tomates', 0, 170),
(53, 'pâtes coudes', 0, 44),
(54, 'viande hachée', 1, 76),
(55, 'Épice chawarma', 1, 81),
(56, 'pâtes torsades),', 1, 103),
(57, 'coriandre', 0, 221),
(58, 'sauce soja', 1, 161),
(59, 'Tlitli', 1, 216),
(60, 'tomate', 1, 112),
(61, 'ras-el-hanout', 1, 163),
(62, 'pois chiches', 0, 122),
(63, 'courgettes', 0, 83),
(64, 'Oeufs durs', 1, 38),
(65, 'Abats de poulet', 1, 150),
(66, 'harissa', 1, 181),
(67, 'eau', 1, 92),
(68, 'pâtes', 1, 30),
(69, 'Basilic séché', 1, 22),
(70, 'navets', 1, 113),
(71, 'chou', 1, 145),
(72, 'épinards', 0, 86),
(73, 'poivre rouge', 1, 156),
(74, 'aubergine', 1, 48),
(75, 'Une sauce tomate', 1, 51),
(76, 'lait', 1, 60),
(77, 'bouillant de volailles', 1, 120),
(78, 'fromage blanc', 1, 141),
(79, 'Fromage râpé', 0, 148),
(80, 'Pâte feuilletée express', 0, 90),
(81, 'Thon', 0, 152),
(82, 'Olives noires', 1, 98),
(83, 'levure chimique', 0, 105),
(84, 'sucre', 0, 181),
(85, 'levure boulangère', 0, 40),
(86, 'semoule fine', 1, 131),
(87, 'dioul', 0, 225),
(88, 'Fromage en portions', 0, 8),
(89, 'blanc d’œuf', 1, 120),
(90, 'Fromage à tartiner', 1, 99),
(91, 'mayonnaise', 0, 13),
(92, 'carvi', 1, 159),
(93, 'piment', 0, 192),
(94, 'vinaigre blanc', 1, 41),
(95, 'Zeste de citron', 1, 68),
(96, 'vanille', 0, 47),
(97, 'margarine', 0, 131),
(98, 'sucre roux', 0, 217),
(99, 'chocolat concassé', 0, 121),
(100, 'orange', 1, 110),
(101, 'yaourt', 1, 174),
(102, 'Citronnade', 0, 214),
(103, 'citron', 1, 84),
(104, 'pommes', 1, 65),
(105, 'acide citrique', 0, 31),
(106, 'Nectarines', 0, 133),
(107, 'eau de fleurs', 0, 153),
(108, 'Fraises', 1, 110),
(109, 'Eau froide', 1, 125),
(110, 'sucre cristallisé', 0, 177),
(111, 'Confiture d’abricot', 1, 227),
(112, 'Noix de coco', 1, 175),
(113, 'jus d’orange', 1, 120),
(114, 'bombées de maïzena', 1, 200),
(115, 'poudre chantilly', 1, 206),
(116, 'Sablés', 0, 22),
(117, 'crème dessert caramel', 0, 110),
(118, 'cacao', 1, 12),
(119, 'sucre glace', 0, 245),
(120, 'bicarbonate de sodium', 0, 138),
(121, 'Lben', 1, 105),
(122, 'vinaigre rouge', 0, 84),
(123, 'chocolat noir', 1, 201),
(124, 'chocolat blanc', 0, 191),
(125, 'levure à pain', 1, 112),
(126, 'biscuit haché', 1, 128),
(127, 'Boudoirs', 1, 78);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient_saison`
--

CREATE TABLE `ingredient_saison` (
  `id_ingr` int(11) NOT NULL,
  `id_saison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingredient_saison`
--

INSERT INTO `ingredient_saison` (`id_ingr`, `id_saison`) VALUES
(1, 2),
(1, 4),
(2, 2),
(3, 2),
(4, 2),
(4, 4),
(5, 2),
(5, 3),
(6, 2),
(6, 3),
(7, 2),
(7, 4),
(8, 1),
(8, 4),
(9, 1),
(9, 4),
(10, 2),
(10, 3),
(11, 2),
(12, 3),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(15, 1),
(15, 3),
(16, 4),
(17, 1),
(17, 4),
(18, 3),
(18, 4),
(19, 4),
(20, 1),
(21, 1),
(21, 3),
(22, 3),
(23, 1),
(23, 2),
(24, 2),
(25, 3),
(26, 1),
(27, 2),
(27, 3),
(28, 2),
(29, 1),
(30, 2),
(30, 3),
(31, 3),
(31, 4),
(32, 2),
(33, 1),
(34, 1),
(34, 2),
(35, 2),
(36, 2),
(37, 3),
(38, 2),
(39, 1),
(40, 3),
(41, 1),
(41, 3),
(42, 1),
(42, 4),
(43, 4),
(44, 3),
(45, 4),
(46, 2),
(46, 4),
(47, 3),
(48, 1),
(49, 2),
(49, 3),
(50, 1),
(50, 3),
(51, 2),
(51, 4),
(52, 3),
(53, 4),
(54, 4),
(55, 3),
(56, 1),
(57, 2),
(57, 3),
(58, 3),
(59, 1),
(59, 3),
(60, 3),
(61, 2),
(62, 2),
(63, 1),
(64, 1),
(65, 2),
(66, 1),
(66, 3),
(67, 1),
(67, 4),
(68, 1),
(69, 3),
(70, 3),
(71, 1),
(71, 4),
(72, 4),
(73, 1),
(73, 3),
(74, 4),
(75, 1),
(76, 2),
(76, 4),
(77, 3),
(77, 4),
(78, 2),
(78, 3),
(79, 3),
(79, 4),
(80, 3),
(81, 3),
(82, 4),
(83, 4),
(84, 3),
(84, 4),
(85, 2),
(86, 1),
(87, 2),
(88, 2),
(89, 2),
(90, 4),
(91, 4),
(92, 3),
(92, 4),
(93, 2),
(94, 3),
(95, 4),
(96, 3),
(97, 3),
(98, 2),
(98, 4),
(99, 1),
(100, 4),
(101, 4),
(102, 2),
(103, 3),
(104, 1),
(105, 1),
(105, 2),
(106, 3),
(107, 1),
(107, 4),
(108, 1),
(108, 2),
(109, 1),
(109, 2),
(110, 2),
(111, 4),
(112, 1),
(112, 4),
(113, 1),
(114, 2),
(114, 3),
(115, 2),
(116, 2),
(117, 1),
(117, 2),
(118, 1),
(118, 2),
(119, 1),
(120, 1),
(121, 1),
(121, 4),
(122, 3),
(122, 4),
(124, 4),
(125, 3),
(126, 3),
(126, 4),
(127, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ingr_info_nutr`
--

CREATE TABLE `ingr_info_nutr` (
  `id_info` int(11) NOT NULL,
  `id_ingr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingr_info_nutr`
--

INSERT INTO `ingr_info_nutr` (`id_info`, `id_ingr`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59),
(60, 60),
(61, 61),
(62, 62),
(63, 63),
(64, 64),
(65, 65),
(66, 66),
(67, 67),
(68, 68),
(69, 69),
(70, 70),
(71, 71),
(72, 72),
(73, 73),
(74, 74),
(75, 75),
(76, 76),
(77, 77),
(78, 78),
(79, 79),
(80, 80),
(81, 81),
(82, 82),
(83, 83),
(84, 84),
(85, 85),
(86, 86),
(87, 87),
(88, 88),
(89, 89),
(90, 90),
(91, 91),
(92, 92),
(93, 93),
(94, 94),
(95, 95),
(96, 96),
(97, 97),
(98, 98),
(99, 99),
(100, 100),
(101, 101),
(102, 102),
(103, 103),
(104, 104),
(105, 105),
(106, 106),
(107, 107),
(108, 108),
(109, 109),
(110, 110),
(111, 111),
(112, 112),
(113, 113),
(114, 114),
(115, 115),
(116, 116),
(117, 117),
(118, 118),
(119, 119),
(120, 120),
(121, 121),
(122, 122),
(123, 123),
(124, 124),
(125, 125),
(126, 126),
(127, 127);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `liens_image` varchar(120) DEFAULT NULL,
  `lien_video` varchar(120) DEFAULT NULL,
  `id_recette` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `noter`
--

CREATE TABLE `noter` (
  `id_recette` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `parametre_site`
--

CREATE TABLE `parametre_site` (
  `id_parametre` varchar(30) NOT NULL,
  `valeur` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `prefere`
--

CREATE TABLE `prefere` (
  `id_recette` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id_recette` int(11) NOT NULL,
  `titre_recette` varchar(120) DEFAULT NULL,
  `lien_image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `temp_prepa` int(11) DEFAULT NULL,
  `temp_repo` int(11) DEFAULT NULL,
  `temp_cuis` int(11) DEFAULT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `lien_video` varchar(255) DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id_recette`, `titre_recette`, `lien_image`, `description`, `temp_prepa`, `temp_repo`, `temp_cuis`, `new`, `lien_video`, `valide`, `categorie`) VALUES
(1, 'Nuggets de poulet', 'http://localhost/Projet_TDW/public/assets/images/r1', 'Nuggets de poulet est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 15, 3, 8, 0, ' ', 1, 1),
(2, 'Croquettes de riz en sauce blanche', 'http://localhost/Projet_TDW/public/assets/images/r2', 'Croquettes de riz en sauce blanche est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 30, 10, 35, 0, ' ', 1, 1),
(3, 'Riz basmati aux aubergines', 'http://localhost/Projet_TDW/public/assets/images/r3', 'Riz basmati aux aubergines est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 35, 5, 45, 0, ' ', 1, 1),
(4, 'Riz pilaf aux légumes', 'http://localhost/Projet_TDW/public/assets/images/r4', 'Riz pilaf aux légumes est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 10, 3, 15, 0, ' ', 1, 1),
(5, 'Croquettes de riz et poulet en sauce rouge', 'http://localhost/Projet_TDW/public/assets/images/r5', 'Croquettes de riz et poulet en sauce rouge est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 30, 8, 40, 0, ' ', 1, 1),
(6, 'Sardines à la chermoula au four', 'http://localhost/Projet_TDW/public/assets/images/r6', 'Sardines à la chermoula au four est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 15, 10, 45, 0, ' ', 1, 1),
(7, 'Curry de poulet', 'http://localhost/Projet_TDW/public/assets/images/r7', 'Curry de poulet est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 15, 9, 25, 0, ' ', 1, 1),
(8, 'Riz pilaf à ma façon', 'http://localhost/Projet_TDW/public/assets/images/r8', 'Riz pilaf à ma façon est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 10, 5, 20, 0, ' ', 1, 1),
(9, 'Tajine de boulettes de riz', 'http://localhost/Projet_TDW/public/assets/images/r9', 'Tajine de boulettes de riz est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 20, 5, 30, 0, ' ', 1, 1),
(10, 'Poulet rôti à ma façon', 'http://localhost/Projet_TDW/public/assets/images/r10', 'Poulet rôti à ma façon est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 15, 2, 40, 0, ' ', 1, 1),
(11, 'Poulet aux champignons et échalotes', 'http://localhost/Projet_TDW/public/assets/images/r11', 'Poulet aux champignons et échalotes est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 30, 0, 25, 0, ' ', 1, 1),
(12, 'Lasagnes à la bolognaise', 'http://localhost/Projet_TDW/public/assets/images/r12', 'Lasagnes à la bolognaise est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 30, 8, 60, 0, ' ', 1, 1),
(13, 'Trida en gratin', 'http://localhost/Projet_TDW/public/assets/images/r13', 'Trida en gratin est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 30, 9, 30, 0, ' ', 1, 1),
(14, 'Gratin de pâtes', 'http://localhost/Projet_TDW/public/assets/images/r14', 'Gratin de pâtes est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 20, 1, 25, 0, ' ', 1, 1),
(15, 'Pâtes torsades à la sauce soja', 'http://localhost/Projet_TDW/public/assets/images/r15', 'Pâtes torsades à la sauce soja est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 15, 5, 25, 0, ' ', 1, 1),
(16, 'Tlitli sauce rouge', 'http://localhost/Projet_TDW/public/assets/images/r16', 'Tlitli sauce rouge est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 40, 6, 60, 0, ' ', 1, 1),
(17, 'Pâtes torsades aux abats de poulet', 'http://localhost/Projet_TDW/public/assets/images/r17', 'Pâtes torsades aux abats de poulet est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 20, 3, 15, 0, ' ', 1, 1),
(18, 'Pâtes à la sauce soja', 'http://localhost/Projet_TDW/public/assets/images/r18', 'Pâtes à la sauce soja est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 10, 4, 15, 0, ' ', 1, 1),
(19, 'Pâtes aux légumes à l’algérienne', 'http://localhost/Projet_TDW/public/assets/images/r19', 'Pâtes aux légumes à l’algérienne est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 20, 4, 35, 0, ' ', 1, 1),
(20, 'Gratin de pâtes et légumes  ', 'http://localhost/Projet_TDW/public/assets/images/r20', 'Gratin de pâtes et légumes   est un plat algerien connu facile a preparer qui contient des ingredient disponible,ce plat peut etre servi en plusieur fetes', 30, 1, 40, 0, ' ', 1, 1),
(21, 'Feuilletés apéritifs', 'http://localhost/Projet_TDW/public/assets/images/r21', 'Feuilletés apéritifs est un entree algerien connu facile a preparer qui contient des ingredient disponible,ce entre peut etre servi avant les differents plats', 20, 2, 20, 0, ' ', 1, 2),
(22, 'Mini-quiches poulet-courgette', 'http://localhost/Projet_TDW/public/assets/images/r22', 'Mini-quiches poulet-courgette est un entree algerien connu facile a preparer qui contient des ingredient disponible,ce entre peut etre servi avant les differents plats', 15, 10, 25, 0, ' ', 1, 2),
(23, 'Matlou3 en 10 min', 'http://localhost/Projet_TDW/public/assets/images/r23', 'Matlou3 en 10 min est un entree algerien connu facile a preparer qui contient des ingredient disponible,ce entre peut etre servi avant les differents plats', 10, 9, 30, 0, ' ', 1, 2),
(24, 'Boureks au four', 'http://localhost/Projet_TDW/public/assets/images/r24', 'Boureks au four est un entree algerien connu facile a preparer qui contient des ingredient disponible,ce entre peut etre servi avant les differents plats', 15, 4, 20, 0, ' ', 1, 2),
(25, 'Oeufs cocotte à la viande hachée', 'http://localhost/Projet_TDW/public/assets/images/r25', 'Oeufs cocotte à la viande hachée est un entree algerien connu facile a preparer qui contient des ingredient disponible,ce entre peut etre servi avant les differents plats', 15, 10, 15, 0, ' ', 1, 2),
(26, 'Pastilla à la viande hachée', 'http://localhost/Projet_TDW/public/assets/images/r26', 'Pastilla à la viande hachée est un entree algerien connu facile a preparer qui contient des ingredient disponible,ce entre peut etre servi avant les differents plats', 15, 10, 15, 0, ' ', 1, 2),
(27, 'Oeufs mimosa au thon', 'http://localhost/Projet_TDW/public/assets/images/r27', 'Oeufs mimosa au thon est un entree algerien connu facile a preparer qui contient des ingredient disponible,ce entre peut etre servi avant les differents plats', 10, 6, 30, 0, ' ', 1, 2),
(28, 'Matlou3 semoule-farine complète', 'http://localhost/Projet_TDW/public/assets/images/r28', 'Matlou3 semoule-farine complète est un entree algerien connu facile a preparer qui contient des ingredient disponible,ce entre peut etre servi avant les differents plats', 10, 5, 25, 0, ' ', 1, 2),
(29, 'Zrodia mchermla', 'http://localhost/Projet_TDW/public/assets/images/r29', 'Zrodia mchermla est un entree algerien connu facile a preparer qui contient des ingredient disponible,ce entre peut etre servi avant les differents plats', 15, 10, 25, 0, ' ', 1, 2),
(30, 'Brioches roulées', 'http://localhost/Projet_TDW/public/assets/images/r30', 'Brioches roulées est un entree algerien connu facile a preparer qui contient des ingredient disponible,ce entre peut etre servi avant les differents plats', 20, 5, 25, 0, ' ', 1, 2),
(31, 'Jus orange-citron', 'http://localhost/Projet_TDW/public/assets/images/r31', 'Jus orange-citron est un boisson facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes', 10, 10, 15, 0, ' ', 1, 4),
(32, 'Concentré d’oranges', 'http://localhost/Projet_TDW/public/assets/images/r32', 'Concentré d’oranges est un boisson facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes', 15, 4, 480, 0, ' ', 1, 4),
(33, 'Jus d’orange', 'http://localhost/Projet_TDW/public/assets/images/r33', 'Jus d’orange est un boisson facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes', 10, 8, 4, 0, ' ', 1, 4),
(34, 'Jus maison 3 en 1 (Oranges, Fraises et Bananes)', 'http://localhost/Projet_TDW/public/assets/images/r34', 'Jus maison 3 en 1 (Oranges, Fraises et Bananes) est un boisson facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes', 10, 10, 45, 0, ' ', 1, 4),
(35, 'Jus de pommes, oranges et carottes', 'http://localhost/Projet_TDW/public/assets/images/r35', 'Jus de pommes, oranges et carottes est un boisson facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes', 15, 9, 35, 0, ' ', 1, 4),
(36, 'Jus maison (oranges et carottes)', 'http://localhost/Projet_TDW/public/assets/images/r36', 'Jus maison (oranges et carottes) est un boisson facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes', 20, 8, 30, 0, ' ', 1, 4),
(37, 'Jus de nectarines maison', 'http://localhost/Projet_TDW/public/assets/images/r37', 'Jus de nectarines maison est un boisson facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes', 5, 5, 5, 0, ' ', 1, 4),
(38, 'Charbat', 'http://localhost/Projet_TDW/public/assets/images/r38', 'Charbat est un boisson facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes', 10, 1, 12, 0, ' ', 1, 4),
(39, 'Jus magique', 'http://localhost/Projet_TDW/public/assets/images/r39', 'Jus magique est un boisson facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes', 20, 3, 14, 0, ' ', 1, 4),
(40, 'Jus de fraises', 'http://localhost/Projet_TDW/public/assets/images/r40', 'Jus de fraises est un boisson facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes', 5, 10, 25, 0, ' ', 1, 4),
(41, 'Gâteau el mabroucha ( Gâteau à la confiture)', 'http://localhost/Projet_TDW/public/assets/images/r41', 'Gâteau el mabroucha ( Gâteau à la confiture) est un desser facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes apres les repas', 16, 2, 40, 0, ' ', 1, 3),
(42, 'Mousse à l’orange', 'http://localhost/Projet_TDW/public/assets/images/r42', 'Mousse à l’orange est un desser facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes apres les repas', 15, 3, 12, 0, ' ', 1, 3),
(43, 'Brioches roulées', 'http://localhost/Projet_TDW/public/assets/images/r43', 'Brioches roulées est un desser facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes apres les repas', 11, 1, 25, 0, ' ', 1, 3),
(44, 'Gâteau au citron', 'http://localhost/Projet_TDW/public/assets/images/r44', 'Gâteau au citron est un desser facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes apres les repas', 10, 7, 15, 0, ' ', 1, 3),
(45, 'Mini-cakes à la crème', 'http://localhost/Projet_TDW/public/assets/images/r45', 'Mini-cakes à la crème est un desser facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes apres les repas', 13, 1, 20, 0, ' ', 1, 3),
(46, 'Tartelettes aux figues fraîches', 'http://localhost/Projet_TDW/public/assets/images/r46', 'Tartelettes aux figues fraîches est un desser facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes apres les repas', 20, 2, 45, 0, ' ', 1, 3),
(47, 'Cupcakes au chocolat', 'http://localhost/Projet_TDW/public/assets/images/r47', 'Cupcakes au chocolat est un desser facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes apres les repas', 15, 2, 20, 0, ' ', 1, 3),
(48, 'Pain fourré au chocolat', 'http://localhost/Projet_TDW/public/assets/images/r48', 'Pain fourré au chocolat est un desser facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes apres les repas', 30, 6, 40, 0, ' ', 1, 3),
(49, 'Entremet glacé au caramel', 'http://localhost/Projet_TDW/public/assets/images/r49', 'Entremet glacé au caramel est un desser facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes apres les repas', 15, 8, 30, 0, ' ', 1, 3),
(50, 'Verrines au chocolat', 'http://localhost/Projet_TDW/public/assets/images/r50', 'Verrines au chocolat est un desser facile a preparer qui contient des ingredient disponible,qui peut etre servi en plusieur fetes apres les repas', 15, 7, 18, 0, ' ', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `recette_fetes`
--

CREATE TABLE `recette_fetes` (
  `id_fete` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recette_fetes`
--

INSERT INTO `recette_fetes` (`id_fete`, `id_recette`) VALUES
(1, 17),
(1, 27),
(1, 44),
(2, 4),
(2, 25),
(3, 10),
(3, 11),
(4, 17),
(5, 1),
(5, 3),
(5, 6),
(5, 19),
(5, 29),
(5, 30),
(6, 34),
(6, 38),
(7, 33),
(7, 49);

-- --------------------------------------------------------

--
-- Structure de la table `recette_ingredient`
--

CREATE TABLE `recette_ingredient` (
  `id_recette` int(11) NOT NULL,
  `id_ingr` int(11) NOT NULL,
  `quantite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recette_ingredient`
--

INSERT INTO `recette_ingredient` (`id_recette`, `id_ingr`, `quantite`) VALUES
(1, 1, '1 poitrine'),
(1, 2, '1 c-à-c'),
(1, 3, '1 c-à-c'),
(1, 4, '1/2 c-à-c'),
(1, 5, '1 c-à-c'),
(1, 6, '1/2 c-à-c'),
(1, 7, '1 c-à-c'),
(1, 8, ' '),
(1, 9, ' '),
(1, 10, '2'),
(1, 11, ' '),
(1, 12, ' '),
(2, 1, '4 morceaux'),
(2, 3, ' '),
(2, 5, ' '),
(2, 8, ' '),
(2, 13, '1'),
(2, 14, ' '),
(2, 15, ' '),
(2, 16, ' '),
(2, 18, ' '),
(2, 23, ' '),
(2, 34, '1 c-à-s'),
(2, 41, ' '),
(3, 5, ' '),
(3, 8, ' '),
(3, 17, '1'),
(3, 18, ' '),
(3, 19, '1/2 bâtonnet'),
(3, 20, ' '),
(3, 39, 'Des morceaux'),
(3, 42, ' '),
(3, 44, '2 gousses'),
(4, 3, ' '),
(4, 8, ' '),
(4, 12, ' '),
(4, 14, ' '),
(4, 18, ' '),
(4, 21, '1 verre'),
(4, 22, '2 verres à 2 verres'),
(4, 23, ' '),
(4, 24, '1'),
(4, 25, '1'),
(4, 26, '1'),
(4, 27, ' '),
(4, 28, '1 feuille'),
(4, 29, ' '),
(4, 30, ' '),
(4, 31, '1 cube'),
(4, 44, '4 gousses'),
(5, 1, '1 blanc'),
(5, 6, ' '),
(5, 8, ' '),
(5, 10, '1'),
(5, 12, ' '),
(5, 14, ' '),
(5, 17, '1'),
(5, 18, ' '),
(5, 21, '1/2 verre'),
(5, 29, ' '),
(5, 32, ' '),
(5, 33, ' '),
(5, 34, ' '),
(5, 44, '4 gousses'),
(6, 21, '1 petit bol'),
(6, 35, '500 g'),
(7, 1, 'Morceaux'),
(7, 3, '1/4 c-à-c'),
(7, 5, '1/4 c-à-c'),
(7, 6, '1/2 c-à-c'),
(7, 8, ' '),
(7, 12, ' '),
(7, 17, '1'),
(7, 18, ' '),
(7, 22, '1 à 2 verres'),
(7, 23, ' '),
(7, 28, '1 feuille'),
(7, 30, '1 c-à-c'),
(7, 36, 'Un peu'),
(7, 37, '3 à 4 c-à-s'),
(7, 44, '4 gousses'),
(8, 8, ' '),
(8, 12, 'Un peu'),
(8, 14, ' '),
(8, 18, ' '),
(8, 19, '1/2 bâtonnet'),
(8, 21, '1 bol'),
(8, 22, '2 bol'),
(8, 23, 'Un peu'),
(8, 24, '2'),
(8, 27, ' '),
(8, 28, 'Une feuille'),
(8, 38, '1 cube'),
(8, 44, '3 gousses'),
(9, 8, ' '),
(9, 9, ' '),
(9, 17, ' '),
(9, 18, ' '),
(9, 19, 'Une pincée'),
(9, 23, '1 c-à-s'),
(9, 27, ' '),
(9, 32, '1 pincée'),
(9, 39, 'Des morceaux'),
(9, 40, '1 c-à-c'),
(9, 41, ' '),
(9, 44, '3 gousses'),
(10, 1, '1'),
(10, 4, '1 c-à-c'),
(10, 5, '1 c-à-c'),
(10, 6, '1 c-à-c'),
(10, 8, '1 c-à-c'),
(10, 12, ' '),
(10, 23, '2 c-à-s'),
(10, 24, ' '),
(10, 27, ' '),
(10, 32, '1 c-à-c'),
(10, 42, '1 c-à-c'),
(10, 43, '1 pincée'),
(10, 44, '1'),
(11, 1, 'Morceaux'),
(11, 3, ' '),
(11, 5, ' '),
(11, 6, '1 c-à-c'),
(11, 8, ' '),
(11, 15, '1 boite'),
(11, 18, ' '),
(11, 20, '1 c-à-s'),
(11, 44, '3 gousses'),
(11, 45, '3'),
(11, 46, '1 verre'),
(11, 55, ' '),
(12, 14, ' '),
(12, 47, '200 à 250 g'),
(12, 48, ' '),
(12, 49, '250 ml'),
(13, 1, '1 blanc'),
(13, 3, ' '),
(13, 5, ' '),
(13, 6, '1 c-à-c'),
(13, 8, ' '),
(13, 18, ' '),
(13, 44, '2 gousses'),
(13, 50, '1 verre'),
(13, 51, '1 blanc'),
(13, 52, '1 c-à-c'),
(14, 5, ' '),
(14, 8, ' '),
(14, 9, ' '),
(14, 17, '1 gros'),
(14, 18, ' '),
(14, 44, '3 à 4 gousses'),
(14, 48, ' '),
(14, 49, ' '),
(14, 53, '1 verre'),
(14, 54, '100 à 150 g'),
(14, 55, ' '),
(15, 3, ' '),
(15, 5, ' '),
(15, 10, '2'),
(15, 12, ' '),
(15, 14, ' '),
(15, 16, ' '),
(15, 17, '1 gros'),
(15, 18, ' '),
(15, 24, '2'),
(15, 25, '1'),
(15, 26, '1'),
(15, 27, ' '),
(15, 29, ' '),
(15, 38, '1 cube'),
(15, 44, '6 gousses'),
(15, 56, '250 g'),
(15, 57, ' '),
(15, 58, '4 c-à-s'),
(16, 1, 'Des morceaux'),
(16, 6, '1 c-à-c'),
(16, 8, ' '),
(16, 13, '1 gros'),
(16, 18, ' '),
(16, 20, ' '),
(16, 39, 'Des morceaux'),
(16, 44, '2 gousses'),
(16, 52, '1 c-à-c'),
(16, 57, '1 petite botte'),
(16, 59, '500 g'),
(16, 60, '1 petite'),
(16, 61, '1 c-à-c'),
(16, 62, '1 verre'),
(16, 63, '2'),
(16, 64, '2 ou 3'),
(17, 6, ' '),
(17, 9, ' '),
(17, 12, ' '),
(17, 16, ' '),
(17, 18, ' '),
(17, 32, ' '),
(17, 38, '1 cube'),
(17, 44, '6 gousses'),
(17, 45, '1'),
(17, 56, ' '),
(17, 65, ' '),
(17, 66, 'Un peu'),
(17, 67, '1 petit verre'),
(18, 8, ' '),
(18, 17, '1'),
(18, 18, ' '),
(18, 23, ' '),
(18, 44, '2 gousses'),
(18, 58, '2 à 3 c-à-s'),
(18, 68, '250 g'),
(18, 69, ' '),
(19, 1, '1 blanc'),
(19, 5, ' '),
(19, 8, ' '),
(19, 16, ' '),
(19, 17, '1 petit'),
(19, 18, ' '),
(19, 24, '3'),
(19, 45, '2'),
(19, 57, 'Un bouquet'),
(19, 61, ' '),
(19, 63, '1'),
(19, 68, '250 g'),
(19, 70, '2'),
(19, 71, 'Un petit'),
(19, 72, 'Un petit bouquet'),
(19, 73, ' '),
(20, 3, ' '),
(20, 16, '4 c-à-s'),
(20, 18, ' '),
(20, 34, '2 c-à-s'),
(20, 44, '2 gousses'),
(20, 51, '2'),
(20, 56, '1 bol'),
(20, 63, '1'),
(20, 72, 'Quelques feuilles'),
(20, 74, '1'),
(20, 75, ' '),
(20, 76, '1/2 litre'),
(20, 77, '1 cube'),
(20, 78, ' '),
(20, 79, ' '),
(21, 15, ' '),
(21, 48, ' '),
(21, 75, ' '),
(21, 80, ' '),
(21, 81, ' '),
(21, 82, ' '),
(22, 8, '1/2 c-à-c'),
(22, 12, '1/2 verre'),
(22, 34, ' '),
(22, 76, '1/2 verre'),
(22, 83, '1 c-à-c'),
(23, 8, ' '),
(23, 34, '2 verres'),
(23, 67, '1 verre'),
(23, 76, '1 verre'),
(23, 84, '1 c-à-s'),
(23, 85, '1 c-à-s'),
(23, 86, '2 verres'),
(24, 1, ' '),
(24, 8, ' '),
(24, 14, ' '),
(24, 17, '1/2'),
(24, 18, ' '),
(24, 23, ' '),
(24, 37, '3 à 4 c-à-s'),
(24, 44, '2 gousses'),
(24, 87, '4 feuilles'),
(24, 88, ' '),
(25, 8, ' '),
(25, 9, ' '),
(25, 11, '1 c-à-s'),
(25, 17, '1/2'),
(25, 18, ' '),
(25, 32, '1 pincée'),
(25, 44, '1 à 2 gousses'),
(25, 54, '100 g'),
(25, 89, '1'),
(26, 8, ' '),
(26, 10, '2'),
(26, 12, ' '),
(26, 14, ' '),
(26, 18, ' '),
(26, 19, '1 pincée'),
(26, 23, 'Un peu'),
(26, 44, '2 gousses'),
(26, 45, '3'),
(26, 48, ' '),
(26, 54, '100 g'),
(26, 87, '4 feuilles'),
(26, 90, ' '),
(27, 6, ' '),
(27, 8, ' '),
(27, 9, '1/4 c-à-c'),
(27, 10, '3'),
(27, 18, ' '),
(27, 30, '1/4 c-à-c'),
(27, 44, '1 gousse'),
(27, 45, '1/2'),
(27, 81, '1 boite'),
(27, 91, '1 à 2 c-à-s'),
(28, 8, ' '),
(28, 16, '1 c-à-s'),
(28, 34, '1/2 mesure'),
(28, 67, ' '),
(28, 84, '1 c-à-c'),
(28, 85, '1 c-à-s'),
(28, 86, '1 mesure'),
(29, 6, '1 c-à-s'),
(29, 8, ' '),
(29, 16, '4 c-à-s'),
(29, 22, '1 petit verre'),
(29, 24, '500 g'),
(29, 44, '6 gousses'),
(29, 57, ' '),
(29, 92, '1 c-à-s'),
(29, 93, '1/2 c-à-c'),
(29, 94, '2 c-à-s'),
(30, 8, '1/2 c-à-c'),
(30, 10, '1'),
(30, 12, '4 c-à-s'),
(30, 23, '50 g'),
(30, 34, '3.5 verres'),
(30, 76, '1 verre'),
(30, 83, '1 c-à-c'),
(30, 84, '3 c-à-s'),
(30, 85, '1 c-à-s'),
(30, 95, ' '),
(30, 96, '1 c-à-c'),
(30, 98, '4 c-à-s'),
(30, 99, ' '),
(31, 67, '1 litre'),
(31, 84, '1 à 2 c-à-s'),
(31, 100, 'Rondelles'),
(31, 103, 'Rondelles'),
(32, 84, '1 kg'),
(32, 100, '2 kg'),
(33, 67, '1.5 litres à 2 litres'),
(33, 100, '4'),
(33, 101, '2 pots'),
(33, 102, ' '),
(33, 103, '1'),
(34, 24, '1 kg'),
(34, 67, '2 litres'),
(34, 84, '1 kg'),
(34, 100, '3 kg'),
(34, 103, '3'),
(35, 24, '500 g'),
(35, 67, ' '),
(35, 84, ' '),
(35, 100, '1 kg'),
(35, 104, '500 g'),
(35, 105, '1 c-à-c'),
(36, 24, '500 g'),
(36, 67, '6 litres'),
(36, 84, '750 g'),
(36, 100, '1 kg'),
(36, 103, '1'),
(37, 102, ' '),
(37, 106, ' '),
(37, 109, ' '),
(38, 7, '2 verres'),
(38, 67, '4 verre'),
(38, 76, '1/2 verre'),
(38, 84, '1 verre'),
(38, 96, '2 c à c'),
(39, 46, '1 litre'),
(39, 84, ' '),
(39, 100, '1'),
(39, 103, '1'),
(39, 107, '1 c-à-s'),
(40, 102, ' '),
(40, 108, ' '),
(40, 109, ' '),
(41, 8, '1 pincée'),
(41, 10, '4'),
(41, 12, '1 verre de 220 ml'),
(41, 34, '4 verres'),
(41, 83, '2 sachets'),
(41, 95, ' '),
(41, 96, '1 c-à-s'),
(41, 110, '1 verre à eau de 220 ml'),
(41, 111, ' '),
(41, 112, ' '),
(42, 76, '50 ml'),
(42, 84, '3 c-à-s'),
(42, 113, '300 ml'),
(42, 114, '2 c-à-s'),
(42, 115, '100 g'),
(42, 116, ' '),
(43, 8, '1/2 c-à-c'),
(43, 10, '1'),
(43, 12, '4 c-à-s'),
(43, 23, '50 g'),
(43, 34, '3.5 verres'),
(43, 76, '1 verre à eau'),
(43, 83, '1 c-à-c'),
(43, 84, '3 c-à-s'),
(43, 85, '1 c-à-s'),
(43, 95, ' '),
(43, 96, '1 c-à-c'),
(43, 98, '4 c-à-s'),
(43, 99, ' '),
(44, 8, '1 pincée'),
(44, 10, '2'),
(44, 12, '1/2 verre'),
(44, 34, '1 verre'),
(44, 83, '1 c-à-c'),
(44, 95, ' '),
(44, 110, '1/2 verre'),
(44, 117, '1 pot'),
(45, 8, '1 pincée'),
(45, 10, '2'),
(45, 12, '1/2 verre'),
(45, 34, '1.5 verre'),
(45, 76, '2/3 verre'),
(45, 83, '1 sachet'),
(45, 84, '1/2 verre à eau'),
(45, 96, ' '),
(45, 118, '1 c-à-s'),
(46, 8, '1 pincée'),
(46, 10, '1'),
(46, 34, '250 g'),
(46, 96, ' '),
(46, 97, '150 g'),
(46, 119, '80 g'),
(46, 120, '1 pincée'),
(47, 8, '1 c-à-thé'),
(47, 10, '2'),
(47, 12, '1.5 verres'),
(47, 34, '2.5 verres'),
(47, 83, '1 sachet'),
(47, 95, ' '),
(47, 110, '1.5 verre'),
(47, 118, '1 c-à-s'),
(47, 121, '1 verre'),
(47, 122, '1 c-à-c'),
(47, 123, '1 tablette'),
(47, 124, 'Boules'),
(48, 8, '1 c-à-c'),
(48, 10, '3'),
(48, 23, ' '),
(48, 34, '4 à 5 verres'),
(48, 67, 'un peu'),
(48, 76, '1 verre à eau'),
(48, 84, '3 c-à-s'),
(48, 123, 'Pépites'),
(48, 125, '1 c-à-s'),
(49, 23, '3 c-à-s'),
(49, 126, '175 g'),
(50, 76, 'Un peu'),
(50, 123, 'Boules'),
(50, 127, ' ');

-- --------------------------------------------------------

--
-- Structure de la table `recette_saison`
--

CREATE TABLE `recette_saison` (
  `id_recette` int(11) NOT NULL,
  `id_saison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recette_saison`
--

INSERT INTO `recette_saison` (`id_recette`, `id_saison`) VALUES
(1, 3),
(1, 4),
(2, 3),
(3, 3),
(4, 2),
(5, 4),
(6, 2),
(7, 1),
(8, 2),
(9, 3),
(10, 4),
(11, 2),
(11, 4),
(12, 1),
(13, 4),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(18, 2),
(19, 1),
(19, 3),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(23, 1),
(23, 2),
(24, 3),
(25, 2),
(25, 4),
(26, 1),
(27, 2),
(28, 2),
(29, 1),
(29, 2),
(30, 3),
(30, 4),
(31, 3),
(32, 3),
(33, 1),
(34, 1),
(34, 4),
(35, 2),
(35, 3),
(36, 4),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(40, 1),
(41, 4),
(42, 2),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 2),
(48, 1),
(49, 1),
(50, 4);

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE `saison` (
  `id_saison` int(11) NOT NULL,
  `nom_saison` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `saison`
--

INSERT INTO `saison` (`id_saison`, `nom_saison`) VALUES
(1, 'hiver'),
(2, 'printemps'),
(3, 'été'),
(4, 'automne');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(30) DEFAULT NULL,
  `prenom_user` varchar(30) DEFAULT NULL,
  `email_user` varchar(30) DEFAULT NULL,
  `age_user` int(11) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email_admin` (`email_admin`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `element_diaporama`
--
ALTER TABLE `element_diaporama`
  ADD PRIMARY KEY (`id_element`);

--
-- Index pour la table `element_site`
--
ALTER TABLE `element_site`
  ADD PRIMARY KEY (`id_element`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`id_recette`,`ordre`);

--
-- Index pour la table `fetes`
--
ALTER TABLE `fetes`
  ADD PRIMARY KEY (`id_fete`);

--
-- Index pour la table `info_nutr`
--
ALTER TABLE `info_nutr`
  ADD PRIMARY KEY (`id_info`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id_ingr`),
  ADD UNIQUE KEY `nom_ingr` (`nom_ingr`);

--
-- Index pour la table `ingredient_saison`
--
ALTER TABLE `ingredient_saison`
  ADD PRIMARY KEY (`id_ingr`,`id_saison`),
  ADD KEY `id_saison` (`id_saison`);

--
-- Index pour la table `ingr_info_nutr`
--
ALTER TABLE `ingr_info_nutr`
  ADD PRIMARY KEY (`id_info`,`id_ingr`),
  ADD KEY `id_ingr` (`id_ingr`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Index pour la table `parametre_site`
--
ALTER TABLE `parametre_site`
  ADD PRIMARY KEY (`id_parametre`);

--
-- Index pour la table `prefere`
--
ALTER TABLE `prefere`
  ADD PRIMARY KEY (`id_recette`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id_recette`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `recette_fetes`
--
ALTER TABLE `recette_fetes`
  ADD PRIMARY KEY (`id_fete`,`id_recette`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Index pour la table `recette_ingredient`
--
ALTER TABLE `recette_ingredient`
  ADD PRIMARY KEY (`id_recette`,`id_ingr`),
  ADD KEY `id_ingr` (`id_ingr`);

--
-- Index pour la table `recette_saison`
--
ALTER TABLE `recette_saison`
  ADD PRIMARY KEY (`id_recette`,`id_saison`),
  ADD KEY `id_saison` (`id_saison`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`id_saison`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `element_diaporama`
--
ALTER TABLE `element_diaporama`
  MODIFY `id_element` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fetes`
--
ALTER TABLE `fetes`
  MODIFY `id_fete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `info_nutr`
--
ALTER TABLE `info_nutr`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id_ingr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id_recette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `saison`
--
ALTER TABLE `saison`
  MODIFY `id_saison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`);

--
-- Contraintes pour la table `ingredient_saison`
--
ALTER TABLE `ingredient_saison`
  ADD CONSTRAINT `ingredient_saison_ibfk_1` FOREIGN KEY (`id_ingr`) REFERENCES `ingredient` (`id_ingr`),
  ADD CONSTRAINT `ingredient_saison_ibfk_2` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`id_saison`);

--
-- Contraintes pour la table `ingr_info_nutr`
--
ALTER TABLE `ingr_info_nutr`
  ADD CONSTRAINT `ingr_info_nutr_ibfk_1` FOREIGN KEY (`id_ingr`) REFERENCES `ingredient` (`id_ingr`),
  ADD CONSTRAINT `ingr_info_nutr_ibfk_2` FOREIGN KEY (`id_info`) REFERENCES `info_nutr` (`id_info`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`);

--
-- Contraintes pour la table `prefere`
--
ALTER TABLE `prefere`
  ADD CONSTRAINT `prefere_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`),
  ADD CONSTRAINT `prefere_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `recette_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `recette_fetes`
--
ALTER TABLE `recette_fetes`
  ADD CONSTRAINT `recette_fetes_ibfk_1` FOREIGN KEY (`id_fete`) REFERENCES `fetes` (`id_fete`),
  ADD CONSTRAINT `recette_fetes_ibfk_2` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`);

--
-- Contraintes pour la table `recette_ingredient`
--
ALTER TABLE `recette_ingredient`
  ADD CONSTRAINT `recette_ingredient_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`),
  ADD CONSTRAINT `recette_ingredient_ibfk_2` FOREIGN KEY (`id_ingr`) REFERENCES `ingredient` (`id_ingr`);

--
-- Contraintes pour la table `recette_saison`
--
ALTER TABLE `recette_saison`
  ADD CONSTRAINT `recette_saison_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id_recette`),
  ADD CONSTRAINT `recette_saison_ibfk_2` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`id_saison`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
