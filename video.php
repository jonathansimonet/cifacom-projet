<?php
require 'include/lessc.php';
try {
    lessc::ccompile('less/video.less', 'css/video.css');
}
catch (exception $ex) {
    exit('lessc fatal error:'.$ex->getMessage());
}
require 'include/Config.php';
require 'include/MysqliRessource.php';
require 'include/ModelMysqli.php';
require 'include/EtudiantMysqli.php';
require 'include/ProjetMysqli.php';
$etudiantMysqli = new EtudiantMysqli();
$projetMysqli = new ProjetMysqli();
if(isset($_GET['id']) && !empty($_GET['id']) && ctype_digit($_GET['id'])) {
	$id = (int) $_GET['id'];
	$projet = $projetMysqli->selectAllById($id);
	if($projet['filiere']==1) {
		$projets = $projetMysqli->selectLast3Mt();
	}
	else {
		$projets = $projetMysqli->selectLast3Rea();
	}
}
else {
	header('Location: index.php');
	exit();
}
$crochet =  array("[", "]");

function daylimotion_id_by_url($url){
	$media_url = "";
	preg_match('#<object[^>]+>.+?http://www.dailymotion.com/swf/video/([A-Za-z0-9]+).+?</object>#s', $url, $matches);
	if(!isset($matches[1])) {
		preg_match('#http://www.dailymotion.com/video/([A-Za-z0-9]+)#s', $url, $matches);
		if(!isset($matches[1])) {
			preg_match('#http://www.dailymotion.com/embed/video/([A-Za-z0-9]+)#s', $url, $matches);
			if(strlen($matches[1])){ $media_url = $matches[1]; }
		}elseif(strlen($matches[1])){
			$media_url = $matches[1];
		}
	}elseif(strlen($matches[1])){
		if(strlen($matches[1])){ $media_url = $matches[1]; }
	}

	return $media_url;
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?=$projet['title']?> - Cifa3com</title>
		<meta name="description" content="">
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/video.css">
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
					<li><a href="projets-realises.php">Projets réalisés</a></li>
					<li><a href="#contact">Contactez-nous</a></li>
				</ul>
			</nav>
		</header>
		<section class="presentation">
			<div class="videowrapper">
				<?php if ($projet['type_video'] == 'YouTube'):?>
					<?= preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"800\" height=\"400\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$projet['video_link']);?>
				<?php elseif($projet['type_video'] == 'Dailymotion'):;?>
					<?php $idvideo = daylimotion_id_by_url($projet['video_link'])?>
					<iframe frameborder="0" width="800" height="400" src="//www.dailymotion.com/embed/video/<?=$idvideo?>" allowfullscreen></iframe><br />
				<?php endif?>
			</div>
		</section>
		<section class="detail">
			<h2><?=$projet['title']?></h2>
			<div class="left">
				<h3>
					Vidéo réalisée dans le cadre du <?=$projet['modules']?>
					<!--<span>Entre le 13/12/15</span>-->
				</h3>
				<p><?=nl2br($projet['synopsis'])?></p>
			</div>
			<div class="right rea">
				<h3>Etudiants</h3>
				<?php $pattern = '/\[([A-Za-z0-9 ]+?)\]/'?>
				<?php $students = explode(';',$projet['student_infos'])?>
				<ul class="student-project">
					<?php foreach($students as $student): ?>

						<?php preg_match_all( '#\[(\w+)]#', $student, $id ); ?>
						<?php $trueid = str_replace($crochet,'',$id[0])?>
						<?php $website = $etudiantMysqli->getWebSiteByid($trueid)?>
						<li><a target="_blank" href=<?=$website?>><?= preg_replace($pattern, '', $student); ?></a></li>
					<?php endforeach ?>
				</ul>
				<span class="project-winners">
					<<?=nl2br($projet['synopsis'])?>
				</span>
			</div>
		</section>
		<section class="videos">
			<h2>Travaux de nos étudiants <?php if($projet['filiere']==1): ?>monteurs truquiste<?php else: ?>réalisateur<?php endif?></h2>
			<?php foreach($projets as $v): ?>
			<a href="video.php?id=<?=$v['id']?>" class="video" style="background-image: url('<?=$v['video_image_link']?>')">
				<div class="play">
					<img src="img/play.png" alt="Play">
				</div>
				<h4><?=$v['title']?></h4>
			</a>
			<?php endforeach ?>
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
	</body>
</html>
