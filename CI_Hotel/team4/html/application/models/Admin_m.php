<?
    class Admin_m extends CI_Model     // 모델 클래스 선언
    {
// start between '$text1' and '$text2'
		public function getlist($text1)
		{
			$sql="select room.name as room_name, count(book.ID) as book_cnt
			  from room right join book on room.ID=book.roomId
			  where $text1=MONTH(book.start)
			  group by room.name
			  order by book_cnt desc limit 10";	
			return $this->db->query($sql)->result();
		}

		public function getlist2($text2)
		{
			$sql="select
				sum(if(month(book.start)=1, book.prices, 0)) as s1,
				sum(if(month(book.start)=2, book.prices, 0)) as s2,
				sum(if(month(book.start)=3, book.prices, 0)) as s3,
				sum(if(month(book.start)=4, book.prices, 0)) as s4,
				sum(if(month(book.start)=5, book.prices, 0)) as s5,
				sum(if(month(book.start)=6, book.prices, 0)) as s6,
				sum(if(month(book.start)=7, book.prices, 0)) as s7,
				sum(if(month(book.start)=8, book.prices, 0)) as s8,
				sum(if(month(book.start)=9, book.prices, 0)) as s9,
				sum(if(month(book.start)=10, book.prices, 0)) as s10,
				sum(if(month(book.start)=11, book.prices, 0)) as s11,
				sum(if(month(book.start)=12, book.prices, 0)) as s12
			  from room right join book on room.ID=book.roomId
			  where $text2=YEAR(book.start)";
			return $this->db->query($sql)->result();
		}
		public function rowcount( $today)
		{
			$sql="select book.ID from book
			  where $today=YEAR(book.start)";	
			return $this->db->query($sql)->num_rows();
		}

		public function reviewcount($today)
		{
			$sql="select distinct(userNameNum) from review where $today=YEAR(day)";	
			return $this->db->query($sql)->num_rows();
		}
    }
?>