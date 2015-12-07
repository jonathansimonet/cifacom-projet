<?php
class ProjetMysqli extends ModelMysqli {
	public function selectLast6() {
		$this->_stmt = $this->_mysqli->prepare("SELECT id, title, video_image_link FROM projets ORDER BY id DESC LIMIT 6");
		$this->_stmt->execute();
		$result = $this->bindResult();
		return $result;
	}

	public function selectAll() {
		$this->_stmt = $this->_mysqli->prepare("SELECT id, title, video_image_link FROM projets ORDER BY id DESC");
		$this->_stmt->execute();
		$result = $this->bindResult();
		return $result;
	}

	public function selectLast3Mt() {
		$this->_stmt = $this->_mysqli->prepare("SELECT id, title, video_image_link FROM projets WHERE filiere = 1 ORDER BY id DESC LIMIT 3");
		$this->_stmt->execute();
		$result = $this->bindResult();
		return $result;
	}

	public function selectLast3Rea() {
		$this->_stmt = $this->_mysqli->prepare("SELECT id, title, video_image_link FROM projets WHERE filiere = 0 ORDER BY id DESC LIMIT 3");
		$this->_stmt->execute();
		$result = $this->bindResult();
		return $result;
	}

	public function selectAllById($id) {
		$this->_stmt = $this->_mysqli->prepare("SELECT * FROM projets WHERE id=?");
		$array = array("i", &$id);
		$this->bindParam($array);
		$this->_stmt->execute();
		$result = $this->bindResult();
	    return $result[0];
	}

	public function countProject(){
		$this->_stmt = $this->_mysqli->prepare("SELECT COUNT(*) FROM projets");
		$this->_stmt->execute();
		$result = $this->bindResult();
		return $result[0]['COUNT(*)'];

	}

	public function selectForCurrentPage($start, $epp){
		$this->_stmt = $this->_mysqli->prepare("SELECT id, title, video_image_link FROM projets ORDER BY id DESC LIMIT $start, $epp");
		$this->_stmt->execute();
		$result = $this->bindResult();
		return $result;
	}
}
