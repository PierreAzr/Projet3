-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: mysql-forterocheblog.alwaysdata.net
-- Generation Time: Dec 07, 2017 at 01:20 PM
-- Server version: 10.1.23-MariaDB
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forterocheblog_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DateArt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `number`, `title`, `content`, `DateArt`) VALUES
(1, 1, '<em><strong>Comment Candide fut &eacute;lev&eacute; dans un beau ch&acirc;teau, et comment il fut chass&eacute; d&rsquo;icelui<br /></strong></em>', '<p>Il y avait en Westphalie, dans le ch&acirc;teau de M. le baron de Thunder-ten-tronckh, un jeune gar&ccedil;on &agrave; qui la nature avait donn&eacute; les moeurs les plus douces. Sa physionomie annon&ccedil;ait son &acirc;me. Il avait le jugement assez droit, avec l''esprit le plus simple&nbsp;; c''est, je crois, pour cette raison qu''on le nommait Candide. Les anciens domestiques de la maison soup&ccedil;onnaient qu''il &eacute;tait fils de la soeur de monsieur le baron et d''un bon et honn&ecirc;te gentilhomme du voisinage, que cette demoiselle ne voulut jamais &eacute;pouser parce qu''il n''avait pu prouver que soixante et onze quartiers, et que le reste de son arbre g&eacute;n&eacute;alogique avait &eacute;t&eacute; perdu par l''injure du temps.<br /> <br /> Monsieur le baron &eacute;tait un des plus puissants seigneurs de la Westphalie, car son ch&acirc;teau avait une porte et des fen&ecirc;tres. Sa grande salle m&ecirc;me &eacute;tait orn&eacute;e d''une tapisserie. Tous les chiens de ses basses-cours composaient une meute dans le besoin&nbsp;; ses palefreniers &eacute;taient ses piqueurs&nbsp;; le vicaire du village &eacute;tait son grand aum&ocirc;nier. Ils l''appelaient tous monseigneur, et ils riaient quand il faisait des contes.<br /> <br /> Madame la baronne, qui pesait environ trois cent cinquante livres, s''attirait par l&agrave; une tr&egrave;s grande consid&eacute;ration, et faisait les honneurs de la maison avec une dignit&eacute; qui la rendait encore plus respectable. Sa fille Cun&eacute;gonde, &acirc;g&eacute;e de dix-sept ans, &eacute;tait haute en couleur, fra&icirc;che, grasse, app&eacute;tissante. Le fils du baron paraissait en tout digne de son p&egrave;re. Le pr&eacute;cepteur Pangloss &eacute;tait l''oracle de la maison, et le petit Candide &eacute;coutait ses le&ccedil;ons avec toute la bonne foi de son &acirc;ge et de son caract&egrave;re.<br /> <br /> Pangloss enseignait la m&eacute;taphysico-th&eacute;ologo-cosmolonigologie. Il prouvait admirablement qu''il n''y a point d''effet sans cause, et que, dans ce meilleur des mondes possibles, le ch&acirc;teau de monseigneur le baron &eacute;tait le plus beau des ch&acirc;teaux et madame la meilleure des baronnes possibles.<br /> <br /> &laquo;&nbsp;Il est d&eacute;montr&eacute;, disait-il, que les choses ne peuvent &ecirc;tre autrement&nbsp;: car, tout &eacute;tant fait pour une fin, tout est n&eacute;cessairement pour la meilleure fin. Remarquez bien que les nez ont &eacute;t&eacute; faits pour porter des lunettes, aussi avons-nous des lunettes. Les jambes sont visiblement institu&eacute;es pour &ecirc;tre chauss&eacute;es, et nous avons des chausses. Les pierres ont &eacute;t&eacute; form&eacute;es pour &ecirc;tre taill&eacute;es, et pour en faire des ch&acirc;teaux, aussi monseigneur a un tr&egrave;s beau ch&acirc;teau&nbsp;; le plus grand baron de la province doit &ecirc;tre le mieux log&eacute;&nbsp;; et, les cochons &eacute;tant faits pour &ecirc;tre mang&eacute;s, nous mangeons du porc toute l''ann&eacute;e&nbsp;: par cons&eacute;quent, ceux qui ont avanc&eacute; que tout est bien ont dit une sottise&nbsp;; il fallait dire que tout est au mieux.&nbsp;&raquo;<br /> <br /> Candide &eacute;coutait attentivement, et croyait innocemment&nbsp;; car il trouvait Mlle Cun&eacute;gonde extr&ecirc;mement belle, quoiqu''il ne pr&icirc;t jamais la hardiesse de le lui dire. Il concluait qu''apr&egrave;s le bonheur d''&ecirc;tre n&eacute; baron de Thunder-ten-tronckh, le second degr&eacute; de bonheur &eacute;tait d''&ecirc;tre Mlle Cun&eacute;gonde&nbsp;; le troisi&egrave;me, de la voir tous les jours&nbsp;; et le quatri&egrave;me, d''entendre ma&icirc;tre Pangloss, le plus grand philosophe de la province, et par cons&eacute;quent de toute la terre.<br /> <br /> Un jour, Cun&eacute;gonde, en se promenant aupr&egrave;s du ch&acirc;teau, dans le petit bois qu''on appelait parc, vit entre des broussailles le docteur Pangloss qui donnait une le&ccedil;on de physique exp&eacute;rimentale &agrave; la femme de chambre de sa m&egrave;re, petite brune tr&egrave;s jolie et tr&egrave;s docile. Comme Mlle Cun&eacute;gonde avait beaucoup de dispositions pour les sciences, elle observa, sans souffler, les exp&eacute;riences r&eacute;it&eacute;r&eacute;es dont elle fut t&eacute;moin&nbsp;; elle vit clairement la raison suffisante du docteur, les effets et les causes, et s''en retourna tout agit&eacute;e, toute pensive, toute remplie du d&eacute;sir d''&ecirc;tre savante, songeant qu''elle pourrait bien &ecirc;tre la raison suffisante du jeune Candide, qui pouvait aussi &ecirc;tre la sienne.<br /> <br /> Elle rencontra Candide en revenant au ch&acirc;teau, et rougit&nbsp;; Candide rougit aussi&nbsp;; elle lui dit bonjour d''une voix entrecoup&eacute;e, et Candide lui parla sans savoir ce qu''il disait. Le lendemain apr&egrave;s le d&icirc;ner, comme on sortait de table, Cun&eacute;gonde et Candide se trouv&egrave;rent derri&egrave;re un paravent&nbsp;; Cun&eacute;gonde laissa tomber son mouchoir, Candide le ramassa, elle lui prit innocemment la main, le jeune homme baisa innocemment la main de la jeune demoiselle avec une vivacit&eacute;, une sensibilit&eacute;, une gr&acirc;ce toute particuli&egrave;re&nbsp;; leurs bouches se rencontr&egrave;rent, leurs yeux s''enflamm&egrave;rent, leurs genoux trembl&egrave;rent, leurs mains s''&eacute;gar&egrave;rent. M. le baron de Thunder-ten-tronckh passa aupr&egrave;s du paravent, et voyant cette cause et cet effet, chassa Candide du ch&acirc;teau &agrave; grands coups de pied dans le derri&egrave;re&nbsp;; Cun&eacute;gonde s''&eacute;vanouit&nbsp;; elle fut soufflet&eacute;e par madame la baronne d&egrave;s qu''elle fut revenue &agrave; elle-m&ecirc;me&nbsp;; et tout fut constern&eacute; dans le plus beau et le plus agr&eacute;able des ch&acirc;teaux possibles.</p>\r\n<p><br /> </p>', '2017-09-06 10:28:31'),
(2, 2, '<em><strong>Ce que devint Candide parmi les Bulgares</strong></em>', '<p>Candide, chass&eacute; du paradis terrestre, marcha longtemps sans savoir o&ugrave;, pleurant, levant les yeux au ciel, les tournant souvent vers le plus beau des ch&acirc;teaux qui renfermait la plus belle des baronnettes ; il se coucha sans souper au milieu des champs entre deux sillons ; la neige tombait &agrave; gros flocons. Candide, tout transi, se tra&icirc;na le lendemain vers la ville voisine, qui s&rsquo;appelle Valdberghoff-trarbk-dikdorff, n&rsquo;ayant point d&rsquo;argent, mourant de faim et de lassitude. Il s&rsquo;arr&ecirc;ta tristement &agrave; la porte d&rsquo;un cabaret. Deux hommes habill&eacute;s de bleu le remarqu&egrave;rent : &laquo; Camarade, dit l&rsquo;un, voil&agrave; un jeune homme tr&egrave;s bien fait, et qui a la taille requise. &raquo; Ils s&rsquo;avanc&egrave;rent vers Candide et le pri&egrave;rent &agrave; d&icirc;ner tr&egrave;s civilement. &laquo; Messieurs, leur dit Candide avec une modestie charmante, vous me faites beaucoup d&rsquo;honneur, mais je n&rsquo;ai pas de quoi payer mon &eacute;cot. - Ah ! monsieur, lui dit un des bleus, les personnes de votre figure et de votre m&eacute;rite ne payent jamais rien : n&rsquo;avez-vous pas cinq pieds cinq pouces de haut ? - Oui, messieurs, c&rsquo;est ma taille, dit-il en faisant la r&eacute;v&eacute;rence. - Ah ! monsieur, mettez-vous &agrave; table ; non seulement nous vous d&eacute;frayerons, mais nous ne souffrirons jamais qu&rsquo;un homme comme vous manque d&rsquo;argent ; les hommes ne sont faits que pour se secourir les uns les autres. - Vous avez raison, dit Candide : c&rsquo;est ce que M. Pangloss m&rsquo;a toujours dit, et je vois bien que tout est au mieux. &raquo; On le prie d&rsquo;accepter quelques &eacute;cus, il les prend et veut faire son billet ; on n&rsquo;en veut point, on se met &agrave; table : &laquo; N&rsquo;aimez-vous pas tendrement ?... - Oh ! oui, r&eacute;pondit-il, j&rsquo;aime tendrement Mlle Cun&eacute;gonde. - Non, dit l&rsquo;un de ces messieurs, nous vous demandons si vous n&rsquo;aimez pas tendrement le roi des Bulgares. - Point du tout, dit-il, car je ne l&rsquo;ai jamais vu. - Comment ! c&rsquo;est le plus charmant des rois, et il faut boire &agrave; sa sant&eacute;. - Oh ! tr&egrave;s volontiers, messieurs &raquo; ; et il boit. &laquo; C&rsquo;en est assez, lui dit-on, vous voil&agrave; l&rsquo;appui, le soutien, le d&eacute;fenseur, le h&eacute;ros des Bulgares ; votre fortune est faite, et votre gloire est assur&eacute;e. &raquo; On lui met sur-le-champ les fers aux pieds, et on le m&egrave;ne au r&eacute;giment. On le fait tourner &agrave; droite, &agrave; gauche, hausser la baguette, remettre la baguette, coucher en joue, tirer, doubler le pas, et on lui donne trente coups de b&acirc;ton ; le lendemain il fait l&rsquo;exercice un peu moins mal, et il ne re&ccedil;oit que vingt coups ; le surlendemain on ne lui en donne que dix, et il est regard&eacute; par ses camarades comme un prodige. <br /> <br /> Candide, tout stup&eacute;fait, ne d&eacute;m&ecirc;lait pas encore trop bien comment il &eacute;tait un h&eacute;ros. Il s&rsquo;avisa un beau jour de printemps de s&rsquo;aller promener, marchant tout droit devant lui, croyant que c&rsquo;&eacute;tait un privil&egrave;ge de l&rsquo;esp&egrave;ce humaine, comme de l&rsquo;esp&egrave;ce animale, de se servir de ses jambes &agrave; son plaisir. Il n&rsquo;eut pas fait deux lieues que voil&agrave; quatre autres h&eacute;ros de six pieds qui l&rsquo;atteignent, qui le lient, qui le m&egrave;nent dans un cachot. On lui demanda juridiquement ce qu&rsquo;il aimait le mieux d&rsquo;&ecirc;tre fustig&eacute; trente-six fois par tout le r&eacute;giment, ou de recevoir &agrave; la fois douze balles de plomb dans la cervelle. Il eut beau dire que les volont&eacute;s sont libres ; et qu&rsquo;il ne voulait ni l&rsquo;un ni l&rsquo;autre, il fallut faire un choix ; il se d&eacute;termina, en vertu du don de Dieu qu&rsquo;on nomme libert&eacute;, &agrave; passer trente-six fois par les baguettes ; il essuya deux promenades. Le r&eacute;giment &eacute;tait compos&eacute; de deux mille hommes ; cela lui composa quatre mille coups de baguette, qui, depuis la nuque du cou jusqu&rsquo;au cul, lui d&eacute;couvrirent les muscles et les nerfs. Comme on allait proc&eacute;der &agrave; la troisi&egrave;me course, Candide, n&rsquo;en pouvant plus, demanda en gr&acirc;ce qu&rsquo;on voul&ucirc;t bien avoir la bont&eacute; de lui casser la t&ecirc;te ; il obtint cette faveur ; on lui bande les yeux, on le fait mettre &agrave; genoux. Le roi des Bulgares passe dans ce moment, s&rsquo;informe du crime du patient ; et comme ce roi avait un grand g&eacute;nie, il comprit, par tout ce qu&rsquo;il apprit de Candide, que c&rsquo;&eacute;tait un jeune m&eacute;taphysicien, fort ignorant des choses de ce monde, et il lui accorda sa gr&acirc;ce avec une cl&eacute;mence qui sera lou&eacute;e dans tous les journaux et dans tous les si&egrave;cles. Un brave chirurgien gu&eacute;rit Candide en trois semaines avec les &eacute;mollients enseign&eacute;s par Dioscoride, Il avait d&eacute;j&agrave; un peu de peau et pouvait marcher, quand le roi des Bulgares livra bataille au roi des Abares.</p>', '2017-09-06 10:28:09'),
(3, 3, '<em><strong>Comment Candide se sauva d&rsquo;entre les Bul-gares, et ce qu&rsquo;il devint</strong></em>', '<p>Rien n''&eacute;tait si beau, si leste, si brillant, si bien ordonn&eacute; que les deux arm&eacute;es. Les trompettes, les fifres, les hautbois, les tambours, les canons, formaient une harmonie telle qu''il n''y en eut jamais en enfer. Les canons renvers&egrave;rent d''abord &agrave; peu pr&egrave;s six mille hommes de chaque c&ocirc;t&eacute;&nbsp;; ensuite la mousqueterie &ocirc;ta du meilleur des mondes environ neuf &agrave; dix mille coquins qui en infectaient la surface. La ba&iuml;onnette fut aussi la raison suffisante de la mort de quelques milliers d''hommes. Le tout pouvait bien se monter &agrave; une trentaine de mille &acirc;mes. Candide, qui tremblait comme un philosophe, se cacha du mieux qu''il put pendant cette boucherie h&eacute;ro&iuml;que.<br /> <br /> Enfin, tandis que les deux rois faisaient chanter des Te Deum chacun dans son camp, il prit le parti d''aller raisonner ailleurs des effets et des causes. Il passa par-dessus des tas de morts et de mourants, et gagna d''abord un village voisin&nbsp;; il &eacute;tait en cendres&nbsp;: c''&eacute;tait un village abare que les Bulgares avaient br&ucirc;l&eacute;, selon les lois du droit public. Ici des vieillards cribl&eacute;s de coups regardaient mourir leurs femmes &eacute;gorg&eacute;es, qui tenaient leurs enfants &agrave; leurs mamelles sanglantes&nbsp;; l&agrave; des filles &eacute;ventr&eacute;es apr&egrave;s avoir assouvi les besoins naturels de quelques h&eacute;ros rendaient les derniers soupirs&nbsp;; d''autres, &agrave; demi br&ucirc;l&eacute;es, criaient qu''on achev&acirc;t de leur donner la mort. Des cervelles &eacute;taient r&eacute;pandues sur la terre &agrave; c&ocirc;t&eacute; de bras et de jambes coup&eacute;s.<br /> <br /> Candide s''enfuit au plus vite dans un autre village&nbsp;: il appartenait &agrave; des Bulgares, et des h&eacute;ros abares l''avaient trait&eacute; de m&ecirc;me. Candide, toujours marchant sur des membres palpitants ou &agrave; travers des ruines, arriva enfin hors du th&eacute;&acirc;tre de la guerre, portant quelques petites provisions dans son bissac, et n''oubliant jamais Mlle Cun&eacute;gonde. Ses provisions lui manqu&egrave;rent quand il fut en Hollande&nbsp;; mais ayant entendu dire que tout le monde &eacute;tait riche dans ce pays-l&agrave;, et qu''on y &eacute;tait chr&eacute;tien, il ne douta pas qu''on ne le trait&acirc;t aussi bien qu''il l''avait &eacute;t&eacute; dans le ch&acirc;teau de monsieur le baron avant qu''il en e&ucirc;t &eacute;t&eacute; chass&eacute; pour les beaux yeux de Mlle Cun&eacute;gonde.</p>', '2017-09-06 10:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `commentary`
--

CREATE TABLE IF NOT EXISTS `commentary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `dateCrea` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idResponse` int(11) DEFAULT NULL,
  `signalment` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article` (`article`) USING BTREE,
  KEY `id_reponse` (`idResponse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `commentary`
--

INSERT INTO `commentary` (`id`, `article`, `pseudo`, `content`, `dateCrea`, `idResponse`, `signalment`, `lvl`) VALUES
(73, 3, 'lola', 'Vivement la suite !!!', '2017-09-06 10:36:46', NULL, 0, 0),
(76, 1, 'Julie', 'j''adore !!', '2017-09-06 10:39:52', NULL, 0, 0),
(80, 1, 'marion', 'Pas mal du tous !!!', '2017-09-09 17:55:08', NULL, 1, 0),
(81, 2, 'Peter', 'Vivement la suite !!!!', '2017-12-06 21:44:12', NULL, 0, 0),
(82, 2, 'marc', 'Pareil, j’attends la suite avec impatience', '2017-12-06 21:45:14', 81, 0, 1),
(83, 2, 'paul', 'Moi aussi', '2017-12-06 21:45:51', 82, 0, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `commentary_ibfk_1` FOREIGN KEY (`idResponse`) REFERENCES `commentary` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentary_ibfk_2` FOREIGN KEY (`article`) REFERENCES `article` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
