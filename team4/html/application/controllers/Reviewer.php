<?
/**
	날짜(수정일) : 2021.12.18
	만든 이 : 한정수
*/
    class Reviewer extends CI_Controller {				// reviewuser 클래스 선언
        function __construct()                           // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();                     // 데이터베이스 연결
            $this->load->model("reviewer_m");				 // 모델 reviewer_m 연결
			$this->load->helper(array("url","date"));	// 헬퍼등록
			$this->load->library("pagination");
			$this->load->library('upload');				// 사진 업로드 선언
			$this->load->library('image_lib');
			
			date_default_timezone_set("Asia/Seoul");    // 지역설정
			$today=date("Y-m-d");
        }

        public function index()                         // 제일 먼저 실행되는 함수
        {
            $this->lists();                             // list 함수 호출
        }

        public function lists()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d",strtotime("-1 month")) ;
			$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d") ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$base_url = "/reviewer/lists/text1/$text1/text2/$text2/page";    // $page_segment = 6;
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

			$base_url = "/~team4" . $base_url;

			$config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
			$config["total_rows"] = $this->reviewer_m->rowcount($text1, $text2);  // 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
			$config["base_url"]	 = $base_url;                // 기본 URL
			$this->pagination->initialize($config);           // pagination 설정 적용

			$data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

			$start=$data["page"];                 // n페이지 : 시작위치
			$limit=$config["per_page"];        // 페이지 당 라인수

			$data["text1"]=$text1;
			$data["text2"]=$text2;
			$data["list"] = $this->reviewer_m->getlist($text1,$text2,$start,$limit);   // 해당페이지 자료읽기

            $this->load->view("main_header");                    // 상단출력(메뉴)
            $this->load->view("reviewer_list",$data);           // review_list에 자료전달
            $this->load->view("main_footer");                      // 하단 출력 
        }

		public function add()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
		    $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
		    $text2 = array_key_exists("text2",$uri_array) ? "/text2/" . urldecode($uri_array["text2"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : 0 ;

			$this->load->library("form_validation");
			$this->form_validation->set_rules("userNameNum","유저이름","required");

			$uid=$this->session->userdata("uid");

			if ($this->form_validation->run()==FALSE)
			{ 
				$this->load->view("main_header");
				$data["row"]=$this->reviewer_m->getrowUser($uid);
				$this->load->view("reviewer_add", $data);    // 입력화면 표시
				$this->load->view("main_footer");
			}
			else              // 입력화면의 저장버튼 클릭한 경우
			{				
				$data=array(
					"userNameNum" => $this->input->post("userNameNum",TRUE),
					"day" => $this->input->post("day",TRUE),
					"title" => $this->input->post("title",TRUE),
					"content" => $this->input->post("content",TRUE),
					"ratings" => $this->input->post("ratings",TRUE)
				);
				$picname = $this->call_upload();
				if($picname) $data["pic"] = $picname;

				$this->reviewer_m->insertrow($data); 

				redirect("/~team4/reviewer/lists" . $text1 . $text2 . $page);    //   목록화면으로 이동.
			}
		}

		public function call_upload()
		{
			$config['upload_path'] = './review_img';		// 저장할 경로
			$config['allowed_types'] = 'gif|jpg|png';	// 저장할 파일 종류
			$config['overwrite'] = TRUE;					// overwrite 허용
			$config['max_size'] = 10000000;					// 이미지 최대 파일 크기
			$config['max_width'] = 10000;					// 이미지 최대 가로 길이
			$config['max_height'] = 10000;					// 이미지 최대 세로 길이
			$this->upload->initialize($config);				// 설정 적용

			if (!$this->upload->do_upload('pic'))			// 업로드 시작
				$picname="";								// 실패할 경우 빈 문자열 리턴
			else 
			{
				$picname=$this->upload->data("file_name");	// 성공할 경우 파일 이름 리턴
			
				// 썸네일 환경 설정
				$config['image_library'] = 'gd2';	// gd2 라이브러리 이용 선언
				$config['source_image'] = './review_img/' . $picname;	// 원본 사진 이름
				$config['thumb_marker'] = "";
				$config['new_image'] = './review_img/thumb';	// thumb 저장 폴더
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;		// 가로세로 비율 유지
				$config['width'] = 400;					// thumb 사진 가로길이
				$config['height'] = 303;				// thumb 사진 세로길이
				$this->image_lib->initialize($config);	// 설정 적용

				$this->image_lib->resize();	// thumb 사진 생성
			}
			
			return $picname;
		}

    }
?>
