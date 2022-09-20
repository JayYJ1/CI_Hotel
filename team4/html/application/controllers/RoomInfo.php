<?
    class RoomInfo extends CI_Controller {       // roomInfo클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("roomInfo_m");    // 모델 roomInfo_m 연결
			$this->load->helper(array("url","date")); // 헬퍼등록
        }

        public function index()                            // 제일 먼저 실행되는 함수
        {
            $this->lists();                                        // list 함수 호출
        }

        public function lists()
        {
			$limit = 3;

			$data["limit"] = $limit;
			$data["row_count"]= $this->roomInfo_m->room_num_rows();  // 전체 레코드개수 구하기
			$data["list"] = $this->roomInfo_m->getlist();   // 해당페이지 자료읽기

            $this->load->view("main_header");                    // 상단출력(메뉴)
            $this->load->view("roomInfo_list", $data);           // roomInfo_list에 자료전달
            $this->load->view("main_footer");                      // 하단 출력 
        }

		public function view()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
			$ID	= array_key_exists("ID",$uri_array) ? $uri_array["ID"] : "" ;

			$data["list"] = $this->roomInfo_m->getlist_otherRoom($ID);
			$data["row"] = $this->roomInfo_m->getrow($ID);

            $this->load->view("main_header");
            $this->load->view("roomInfo_view", $data);
            $this->load->view("main_footer");
        }
    }
?>
