<?php namespace Models;


/*
 * Articles Model
 * Date Created: 12-15-2015
 * Author: Travis Pronschinske
 *
 */



class Articles extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function Articles(){
		return $this->db->select("SELECT * FROM " . PREFIX . "article");
	}

	public function getArticle($articleUrl){
		return $this->db->select("SELECT * FROM " . PREFIX . "article WHERE articleUrl = :articleUrl", array(':articleUrl' => $articleUrl));
	}

	public function getArticleParentUrl($parentArticleId){
			 $this->db->select("SELECT * FROM " . PREFIX . "article WHERE parentArticle=:parentArticle", array(':parentArticle' => $parentArticleId));
	}

  public function getAllArticles(){
    return $this->db->select("SELECT * FROM " . PREFIX . "article");
  }

	public function getArticleById($articleId){
		return $this->db->select("SELECT * FROM " . PREFIX . "article WHERE articleId=:articleId", array(':articleId' => $articleId));
	}

	public function createArticle($pageData){
		 $this->db->insert(PREFIX . 'article', $pageData);
	}

	public function updateArticle($data, $where){
		 $this->db->update(PREFIX . "article", $data, $where);
	}

	public function deleteArticle($articleId){
		$where = array('articleId' => $articleId);
	  $this->db->delete(PREFIX . 'article', $where);
	}


}


?>
