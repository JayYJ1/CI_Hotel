<?
    class Booking_m extends CI_Model     // 모델 클래스 선언
    {
		public function getlist($text1, $text2, $text3, $text4)
		{
			if($text3=="0")
				$sql="select * from room where NOT ID IN(select distinct(roomId) from book where '$text1' between start and end - INTERVAL 1 DAY or ('$text2' between start + INTERVAL 1 DAY  and end)) and NOT ID IN(select distinct(roomId) from book where start + INTERVAL 1 DAY between '$text1+1' and '$text2' or end between '$text1+1' and '$text2') and $text4 <= people+1 order by ID";
			else
				$sql="select * from room where ID=$text3 and NOT ID IN(select distinct(roomId) from book where '$text1' between start and end - INTERVAL 1 DAY or ('$text2' between start + INTERVAL 1 DAY  and end)) and NOT ID IN(select distinct(roomId) from book where start + INTERVAL 1 DAY between '$text1+1' and '$text2' or end between '$text1+1' and '$text2') and $text4 <= people+1 order by ID";
			return $this->db->query($sql)->result();
		}


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
		public function rowcount($text1, $text2, $text3, $text4)
		{
			if($text3=="0")
				$sql="select * from room where NOT ID IN(select distinct(roomId) from book where '$text1' between start and end - INTERVAL 1 DAY or ('$text2' between start + INTERVAL 1 DAY  and end)) and NOT ID IN(select distinct(roomId) from book where start + INTERVAL 1 DAY between '$text1+1' and '$text2' or end between '$text1+1' and '$text2') and $text4 <= people+1 order by ID";
			else
				$sql="select * from room where ID=$text3 and NOT ID IN(select distinct(roomId) from book where '$text1' between start and end - INTERVAL 1 DAY or ('$text2' between start + INTERVAL 1 DAY  and end)) and NOT ID IN(select distinct(roomId) from book where start + INTERVAL 1 DAY between '$text1+1' and '$text2' or end between '$text1+1' and '$text2') and $text4 <= people+1 order by ID";
			return $this->db->query($sql)->num_rows();
		}
		function getrow($ID) 
		{
			$sql="select book.*, room.name as room_name, room.people as room_people, member.name as member_name
				  from (book left join room on book.roomId=room.ID) left join member on book.memberId=member.ID where book.ID=$ID";
			return  $this->db->query($sql)->row();
		}
		function insertrow($row)
		{
			 return $this->db->insert("book",$row);
		}
    }
?>