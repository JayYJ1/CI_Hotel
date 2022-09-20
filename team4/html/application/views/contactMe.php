       <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">직원 소개</h2>
                    <ol class="breadcrumb">
                        <li><a href="/~team4/main">Main</a></li>
                        <li class="active">직원 소개</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area section_gap">
            <div class="container">
                
				<!-- kakao map api -->
				<div id="map" style="width:100%;height:350px;"></div>

				<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=a254ba352533efabb9e31b36a8c572b2"></script>
				<script>
				var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
					mapOption = { 
						center: new kakao.maps.LatLng(37.63150831276873, 127.0548431731536), // 지도의 중심좌표
						level: 3 // 지도의 확대 레벨
					};

				var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다
				</script>
				<br/>
				<!--================학번,이름=================-->
				<div style="padding:30px;"></div>
				<div class="d-flex justify-content-around">
					<h1>
						<a href="#" class="genric-btn danger circle" margin-right="10px">201712046<br>한정수</br></a>
					</h1>
					<h1>
						<a href="#" class="genric-btn success circle">201812044<br>임호성</br></a>
					</h1>	
					<h1>
						<a href="#" class="genric-btn info circle">2016120691<br>전영준</br></a>
					</h1>
					<h1>
						<a href="#" class="genric-btn primary circle">201718048<br>유재우</br></a>
					</h1>
				</div>
				<div style="padding:30px;"></div>
				<!--================학번,이름=================-->

				
				
                    <div class="d-flex justify-content-around">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-code"></i>
                                <h6>사용한 기술 스택</h6>
                                <p>PHP v7.3.18</br>CodeIgniter v3.1.11</br>BootStrap v4.0.0-beta.2</br>MySQL Ver 15.1<br/>MariaDB-10.3.22</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>사용 템플릿(홈페이지)</h6>
                                <a href="https://themewagon.com/themes/free-bootstrap-hotel-template-royal/">
								free-bootstrap-hotel-template-royal</a>
                            </div></br>
                            <div class="info_item">
                                <i class="lnr lnr-license"></i>
                                <h6>사용 템플릿(관리자)</h6>
                                <a href="https://startbootstrap.com/theme/sb-admin-2">startbootstrap.com/theme/sb-admin-2</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->

<!--================Contact Success and Error message Area =================-->
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Thank you</h2>
                        <p>Your message is successfully sent...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Sorry !</h2>
                        <p> Something went wrong </p>
                    </div>
                </div>
            </div>
        </div>
<!--================End Contact Success and Error message Area =================-->
      

        <script src="/~team4/my/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="/~team4/my/vendors/isotope/isotope-min.js"></script>

        <!-- contact js -->
        <script src="/~team4/my/js/jquery.form.js"></script>
        <script src="/~team4/my/js/jquery.validate.min.js"></script>
        <script src="/~team4/my/js/contact.js"></script>
<?
	echo CI_VERSION;
?>