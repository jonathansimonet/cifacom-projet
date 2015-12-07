<?php
/**
 * Ressource Mysqli
 *
 * @version 0.1.0 Première version
 * @date 28/02/2015
 * @author Léo Ricard (design) - Raphaël Couderc (développement)
 */
class MysqliRessource {

	/**
	 * @var Mysqli Ressource Mysqli
	 */
	private static $_mysqli;

	/**
	 * Renvoie la valeur d'un paramètre de configuration
	 *
	 * @param string $dbname Nom de la base de données à utilisé (facultatif, sinon, on a le chercher dans le fichier de configuration)
	 * @return Mysqli Ressource Mysqli
	 */
	public static function ressource($dbname = null) {
		if (self::$_mysqli == null) {
			$host = Config::get("host");
			$login = Config::get("login");
			$mdp = Config::get("mdp");
			if ($dbname == null) {
				$dbname = Config::get("dbname_default");
			}
			self::$_mysqli = new mysqli($host, $login, $mdp, $dbname);
			self::$_mysqli->set_charset("utf8");
			if (self::$_mysqli->connect_error) {
				die('Connect Error (' . self::$_mysqli->connect_errno . ') ' . self::$_mysqli->connect_error);
			}
		}
		return self::$_mysqli;
	}

	/**
	 * Destruction de la ressource Mysqli
	 *
	 * @todo Vérifier l'utilité de la méthode ...
	 */
	public static function destruct() {
		if (self::$_mysqli) {
			self::$_mysqli->close();
		}
	}
}
