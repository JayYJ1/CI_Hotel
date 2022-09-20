<?
    class Gallery_m extends CI_Model						 // 모델 클래스 선언
    {
        public function getlist($text1,$start,$limit)
        {    
			if (!$text1)
				$sql="select gallery.*, category.name as cName from gallery left join category on gallery.categoryId = category.ID order by category.name limit $start,$limit";   // 전체 자료
			else
				$sql="select gallery.*, category.name as cName from gallery left join category on gallery.categoryId = category.ID where gallery.categoryId=$text1 order by category.name limit $start,$limit";
 
            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function gallery_list($text1)
        {    
			if (!$text1)
				$sql="select gallery.*, category.name as cName from gallery left join category on gallery.categoryId = category.ID order by category.name";   // 전체 자료
			else
				$sql="select gallery.*, category.name as cName from gallery left join category on gallery.categoryId = category.ID where gallery.categoryId=$text1 order by category.name";
			
            return $this->db->query($sql)->result();       // 쿼리실행, 결과 리턴
        }

		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from gallery left join category on gallery.categoryId = category.ID";
			else
				$sql="select * from gallery left join category on gallery.categoryId = category.ID where category.name like '%$text1%'";
	
			return $this->db->query($sql)->num_rows();
		}

		function getrow($ID)
		{
			$sql="select gallery.*, category.name as cName from gallery left join category on gallery.categoryId=category.ID where gallery.ID=$ID";
			return $this->db->query($sql)->row();
		}

		function deleterow($ID)
		{
			$sql="delete from gallery where ID=$ID";
			return  $this->db->query($sql);
		}

		function insertrow($row)
		{
			 return $this->db->insert("gallery",$row);
		}
		
		function updaterow($row, $ID)
		{
			$where=array("ID"=>$ID);
			return $this->db->update("gallery",$row,$where);
		}

		function category_row_num()
		{
			$sql="select * from category order by ID";
			return $this->db->query($sql)->num_rows();
		}

		function getlist_category()
		{
			$sql="select * from category order by ID";
			return $this->db->query($sql)->result();
		}
    }
?>
