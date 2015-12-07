<?php
/**
 * Classe dont hérite les classes faisant appel à Mysqli
 *
 * Classe abstraite dont peuvent hériter les classes faisant appel à Mysqli
 * Permet de simplifier les fonctions de Mysqli
 *
 * @author Raphaël Couderc
 * @version 0.1.0 Première version
 */
abstract class ModelMysqli {
	protected $_mysqli;
	protected $_stmt;
	public function __construct() {
		$this->_mysqli = MysqliRessource::ressource();
	}

	protected function bindParam(array $array) {
		$ref = new ReflectionClass('mysqli_stmt');
		$method = $ref->getMethod("bind_param");
		$method->invokeArgs($this->_stmt, $array);
	}

	/**
	* @todo Faire la meêm chose en sortant un tableau d'objet (correspond à un paramètre donné)
	*/
	protected function bindResult() {
		$meta = $this->_stmt->result_metadata();
		while ($field = $meta->fetch_field()) {
			$params[] = &$row[$field->name];
		}
		call_user_func_array(array($this->_stmt, 'bind_result'), $params);
		$result = array();
		while ($this->_stmt->fetch()) {
			foreach($row as $key => $val) {
				$c[$key] = $val;
			}
			$result[] = $c;
		}
		return $result;
	}
}
