<?php
	function build_query($post_search){
		$clean_words = str_replace(","," ",$post_search);
		$search_words = explode(' ', $clean_words);
		$final_words = array();
		foreach($search_words as $words){
			if(!empty($words)):
				$final_words[] = $words;
			endif;
		}
		$where_list = array();
		foreach($final_words as $word){
			 $where_list[] = " description LIKE '%$word%' ";
		}

		$where_clause = implode('OR', $where_list);
		if(!empty($where_clause)):
				$where_clause = "WHERE $where_clause";
		endif;
		return $where_clause; 
	}
?>