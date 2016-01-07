<?php
class EtudiantMysqli extends ModelMysqli {
	public function selectAllMt() {
		$this->_stmt = $this->_mysqli->prepare("SELECT * FROM students WHERE filiere = 1 ORDER BY name");
		$this->_stmt->execute();
		$result = $this->bindResult();
		return $result;
	}

	public function selectAllRea() {
		$this->_stmt = $this->_mysqli->prepare("SELECT * FROM students WHERE filiere = 0 ORDER BY name");
		$this->_stmt->execute();
		$result = $this->bindResult();
		return $result;
	}

	public function getWebSiteByid($id){
		$url = '#';
		if (is_array($id) && isset($id[0]))
			$id = $id[0];
		$this->_stmt = $this->_mysqli->prepare("SELECT website FROM students WHERE id=?");
		$array = array("i", &$id);
		$this->bindParam($array);
		$this->_stmt->execute();
		$result = $this->bindResult();
		if (isset($result[0]['website']))
		{
			if (strpos($result[0]['website'],'http')){
				$url = $result[0]['website'];
			}else{
				$url = 'http://'.$result[0]['website'];
			}
		}
		return $url;
	}
}
