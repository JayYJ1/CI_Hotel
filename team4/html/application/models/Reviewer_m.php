<?
    class Reviewer_m extends CI_Model     // 모델 클래스 선언
    {

		public function getlist($text1,$text2, $start,$limit)
		{
			$sql="select review.*, member.name as user
			  from review left join member on review.userNameNum=member.ID
			  where review.day between '$text1' and '$text2' order by review.day limit $start,$limit";
			return $this->db->query($sql)->result();
		}

		public function rowcount($text1, $text2)
		{
			$sql="select * from review where review.day between '$text1' and '$text2'";
			return $this->db->query($sql)->num_rows();
		}

		function getrow($ID) {
			$sql="select review.*, member.name as user
              from review left join member on review.userNameNum=member.ID 
              where review.='$ID'";
			return $this->db->query($sql)->row();
		}

		function getrowUser($uid) {
			$sql="select * from member where member.uid='$uid'";
			return $this->db->query($sql)->row();
		}

		function getUserList()
		{
			$sql="select * from member order by ID asc";
			return $this->db->query($sql)->result();
		}

		function deleterow($ID)  {
			$sql="delete from review where ID=$ID";
			return  $this->db->query($sql);
		}

		function insertrow($row)  {
			return  $this->db->insert("review",$row);
		}

		function updaterow($row, $ID)
		{
			$where=array("ID"=>$ID);
			return $this->db->update( "review", $row, $where );
		}

    }
?>
