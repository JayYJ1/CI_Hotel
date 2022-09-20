<?
    class RoomInfo_m extends CI_Model     // 모델 클래스 선언
    {
		public function getlist()
		{
			$sql="select room.*, roomType.name as roomType_name 
                  from room left join roomType on room.roomtypeId=roomType.ID";
			return $this->db->query($sql)->result();
		}

		function getlist_roomType()
		{
			$sql="select * from roomType order by name";
			return $this->db->query($sql)->result();
		}

		function getrow($ID)  
		{
			$sql="select * from room where room.ID='$ID'";
			return $this->db->query($sql)->row();
		}

		function room_num_rows()
		{
			$sql="select * from room order by ID";
			return $this->db->query($sql)->num_rows();
		}

		function getlist_otherRoom($ID)
		{
			$sql="select * from room where ID not in (select ID from room where ID=$ID) order by rand();";
			return $this->db->query($sql)->result();
		}
    }
?>
