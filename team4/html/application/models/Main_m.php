<?
    class Main_m extends CI_Model     // 모델 클래스 선언
    {
		function getlist_room()
		{
			$sql="select * from room order by ID";
			return $this->db->query($sql)->result();
		}
		
		function getlist_member()
		{
			$sql="select * from member order by name";
			return $this->db->query($sql)->result();
		}

		function getlist_review()
		{
			$sql="select review.*, member.name as user from review left join member on review.userNameNum=member.ID order by rand();";
			return $this->db->query($sql)->result();
		}
    }
?>