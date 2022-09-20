<?
    class Login_m extends CI_Model // 모델 클래스 선언
    {
        public function getrow($uid,$pwd) //멤버 리스트
		{
			$sql="select * from member where uid='$uid' and pwd='$pwd'";
			return $this->db->query($sql)->row();
		}
    }
?>
