<?php
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR');
function camelize($str) {
	$func = create_function('$c', 'return strtoupper($c[1]);');
	return preg_replace_callback('/_([a-z])/', $func, $str);
}
function mysqli_connection() {
	global $mysqli;
	@$mysqli = new mysqli('localhost', 'root', '', 'cpa');
	@$mysqli->set_charset("utf8");
	if($mysqli->connect_errno) {
		echo '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /><title>Problème de connexion à la base de données</title></head><body><div style="margin:auto; text-align:center; -webkit-border-radius:1em; -moz-border-radius:1em; border-radius:1em; font-weight:bold; position:absolute; top:10%; width:96%; padding:1em; border:1px solid red; background-color:white; color:black;">';
		echo '<h2>Erreur lors de la tentative de connexion à la base de données ...</h2>';
		echo '<br />Certaines fonctionnalités du site peuvent ne pas fonctionner correctement.';
		echo '<br />Veuillez rafraîchir la page (en appuyant sur F5) ou réessayer ultérieurement. Si le problème persiste, veuillez en avertir l\'administrateur. Merci d\'avance.</div></body></html>';
		exit();
	}
}
function secure_html($txt) {
	$txt = htmlspecialchars($txt, ENT_HTML5 | ENT_QUOTES);
	return $txt;
}
/*function smileys_apostrof2img($msg) {
	$msg = preg_replace('`\((angel|angry|bandit|bartlett|beer|bigsmile|blushing|bow|brokenheart|bug|cake|call|cash|clapping|coffee|cool|crying|dancing|devil|doh|drink|drunk|dull|dulltauri|emo|envy|evilgrin|facepalm|finger|fingerscrossed|flower|fubar|giggle|handshake|happy|headbang|heart|heidy|hi|highfive|hollest|hug|inlove|itwasntme|kiss|lalala|lipssealed|mail|makeup|malthe|mmm|mooning|movie|muscle|music|nerd|ninja|no|nod|oliver|party|pizza|poolparty|priidu|puking|punch|rain|rock|rofl|sadsmile|shake|sleepy|smile|smirk|smoking|speechless|star|sunshine|surprised|swear|sweating|talking|thinking|thumbsup|time|tmi|toivo|tongueout|tumbleweed|wait|waiting|whew|wink|wondering|worried|wtf|yawning)\)`iSu', '<div class="smiley-ico $1" style="background-image: url(\'/img/smileys/$1.png\')" alt="$1"></div>', $msg);
	$liste_smiley1 = array(
						':)',
						':(',
						':D',
						':O',
						';)',
						';(',
						':/',
						':|',
						'(:|'
					);
	$liste_smiley2 = array(
						'<div class="smiley-ico smile" style="background-image: url(\'/img/smileys/smile.png\')" alt="smile"></div>',
						'<div class="smiley-ico sadsmile" style="background-image: url(\'/img/smileys/sadsmile.png\')" alt="sadsmile"></div>',
						'<div class="smiley-ico bigsmile" style="background-image: url(\'/img/smileys/bigsmile.png\')" alt="bigsmile"></div>',
						'<div class="smiley-ico surprised" style="background-image: url(\'/img/smileys/surprised.png\')" alt="surprised"></div>',
						'<div class="smiley-ico wink" style="background-image: url(\'/img/smileys/wink.png\')" alt="wink"></div>',
						'<div class="smiley-ico crying" style="background-image: url(\'/img/smileys/crying.png\')" alt="crying"></div>',
						'<div class="smiley-ico speechless" style="background-image: url(\'/img/smileys/speechless.png\')" alt="speechless"></div>',
						'<div class="smiley-ico speechless" style="background-image: url(\'/img/smileys/speechless.png\')" alt="speechless"></div>',
						'<div class="smiley-ico sweating" style="background-image: url(\'/img/smileys/sweating.png\')" alt="sweating"></div>'
					);
	$msg = str_replace($liste_smiley1, $liste_smiley2, $msg);
	return $msg;
}*/
mysqli_connection();

function random($car) {
	$string = "";
	$chaine = "abcdefghijklmnpqrstuvwxy0123456789-_";
	srand((double)microtime()*1000000);
	for($i=0; $i<$car; $i++) {
		$string .= $chaine[rand()%strlen($chaine)];
	}
	return $string;
}
