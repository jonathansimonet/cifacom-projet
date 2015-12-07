<?php
require 'include/lessc.php';
include_once('pagination.php');

try {
    lessc::ccompile('less/index.less', 'css/index.css');
}
catch (exception $ex) {
    exit('lessc fatal error:'.$ex->getMessage());
}
require 'include/Config.php';
require 'include/MysqliRessource.php';
require 'include/ModelMysqli.php';
require 'include/ProjetMysqli.php';
$projetMysqli = new ProjetMysqli();
$count = $projetMysqli->countProject();
$projets = $projetMysqli->selectAll();
$total = 1;
if (!empty($count)) {
	$total = $count;
}
$epp = 10; // nombre d'entrées à afficher par page (entries per page)
$nbPages = ceil($total/$epp);
$current = 1;
if (isset($_GET['p']) && is_numeric($_GET['p'])) {
	$page = intval($_GET['p']);
	if ($page >= 1 && $page <= $nbPages) {
		// cas normal
		$current=$page;
	} else if ($page < 1) {
		// cas où le numéro de page est inférieure 1 : on affecte 1 à la page courante
		$current=1;
	} else {
		//cas où le numéro de page est supérieur au nombre total de pages : on affecte le numéro de la dernière page à la page courante
		$current = $nbPages;
	}
}
// $start est la valeur de départ du LIMIT dans notre requête SQL (dépend de la page courante)
$start = ($current * $epp - $epp);

// Récupération des données à afficher pour la page courante
$projets = $projetMysqli->selectForCurrentPage($start, $epp);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Projets réalisés - Cifa3com</title>
		<meta name="description" content="">
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/index.css">
		<style>
			.videos h2 {
				margin: 1em 0;
				text-align: center;
				font-size: 2em;
			}
		</style>
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<header>
			<nav>
				<div class="logo">
					<a href="http://www.cifacom.com/">
						<img src="img/logo.png" alt="Cifacom">
					</a>
				</div>
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="equipe-pedagogique.php">Equipe pédagogique</a></li>
					<li><a href="formation-realisateur-audiovisuel.php">Formation Réalisateur</a></li>
					<li><a href="formation-monteur-truquiste.php">Formation monteur truquiste</a></li>
					<li><a href="projets-realises.php" class="active">Projets réalisés</a></li>
					<li><a href="#contact">Contactez-nous</a></li>
				</ul>
			</nav>
		</header>
		<section class="presentation">
			<div style="background-image:url('img/slide1.jpg')"></div>
			<h1>
				<span>
					<span>Bachelor</span>
					<br>Réalisateur / Monteur Truquiste
				</span>
			</h1>
		</section>
		<section class="videos">
			<h2>Projets réalisés</h2>
			<?php foreach($projets as $v): ?>
			<a href="video.php?id=<?=$v['id']?>" class="video" style="background-image: url('<?=$v['video_image_link']?>')">
				<div class="play">
					<img src="img/play.png" alt="Play">
				</div>
				<h4><?=$v['title']?></h4>
			</a>
			<?php endforeach ?>
			<?php echo paginate(curPageURL(), '?p=', $nbPages, $current); ?>
		</section>
		<div class="clear"></div>
		<footer>
			<div class="map"></div>
			<form id="contact" method="post">
				<h3>Contactez-<span>nous</span></h3>
				<input type="text" name="nom" placeholder="Nom*">
				<input type="email" name="email" placeholder="Email*">
				<textarea name="message" placeholder="Message*"></textarea>
				<button type="submit">Envoyer</button>
			</form>
			<div class="bottom">
				<div class="left">
					<div class="logo">
						<img src="img/logo2.png" alt="Logo Cifacom">
					</div>
					<ul>
						<li>
							<a href="https://www.facebook.com/ecole.cifacom/" target="_blank">
								<img src="img/fb.png" alt="Facebook">
							</a>
						</li>
						<li>
							<a href="https://plus.google.com/+cifacom/" target="_blank">
								<img src="img/gplus.png" alt="Google+">
							</a>
						</li>
						<li>
							<a href="https://twitter.com/cifacom" target="_blank">
								<img src="img/twitter.png" alt="Twitter">
							</a>
						</li>
						<li>
							<a href="https://instagram.com/explore/tags/cifacom/" target="_blank">
								<img src="img/instagram.png" alt="Instagram">
							</a>
						</li>
					</ul>
				</div>
				<div class="right">
					<div class="adrs">
						<img src="img/adrs.png" alt="Adresse">
						Ecole Cifacom
						<br>27 ter rue du progrès 93100
						<br>Montreuil
					</div>
					<div class="tel">
						<img src="img/tel.png" alt="Téléphone">
						01 41 72 08 08
					</div>
				</div>
			</div>
		</footer>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>
