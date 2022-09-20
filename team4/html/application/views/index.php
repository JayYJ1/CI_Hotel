<script>
			function find_text()
			{
				form1.action="/~team4/booking/lists/text1/" + form1.text1.value + "/text2/" + form1.text2.value + "/text3/" + form1.text3.value + "/text4/" + form1.text4.value + "/page";
				form1.submit();
			}
			function find_room()
			{
				var start = form1.text1.value;
				var end = form1.text2.value;
				var arrStart = start.split('-');
				var arrEnd = end.split('-');
				var datStart = new Date(arrStart[0], arrStart[1], arrStart[2]);
				var datEnd = new Date(arrEnd[0], arrEnd[1], arrEnd[2]);

				var diff = new Date() - new Date(arrStart[0], arrStart[1]-1, arrStart[2]);
				var currDay = 24*60*60*1000;
				var diff_day = diff/currDay;
				
				if(datStart >= datEnd){
					alert('시작일보다 종료일이 커야합니다.');
				}
				else if(diff_day >= 0 ){
					alert('시작일이 오늘보다 커야합니다.');
				}
				else{
					find_text();
				}
			}

			$(function(){
				$("#text1") .datetimepicker({
					locale: 'ko',
					format: 'YYYY-MM-DD',
					defaultDate: moment()
				});
				$("#text2") .datetimepicker({
					locale: 'ko',
					format: 'YYYY-MM-DD',
					defaultDate: moment()
				});

			});
</script>
		<!--================Header Area =================-->

<!-- 헤더 -->

        <!--================Header Area =================-->
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
					<h3>인덕 로열 리조트에 오신 것을 환영합니다.</h3>
						<h2>Induk Royal</h2>
						<h4>더 편안하고 고급스러운 휴식의 세상으로 초대합니다.</h4>
					</div>
				</div>
            </div>
            <div class="hotel_booking_area position">
                <div class="container">
					<form name="form1" method="post" action="" >
						<div class="hotel_booking_table">
							<div class="col-md-3">
								<h2>예약하기</h2>
							</div>
							<div class="col-md-9">
								<div class="boking_table">
									<div class="row">
										<div class="col-md-4">
											<div class="book_tabel_item">
												<div class="form-group">
													<div class='input-group date' id='text1'>
														<input type='text' name='text1' class="form-control" placeholder="시작 날짜" value="<?=$text1; ?>"/>
														<span class="input-group-addon">
															<i class="far fa-calendar-alt fa-lg"></i>
														</span>
													</div>
												</div>
												<div class="form-group">
													<div class='input-group date' id='text2'>
														<input type='text' name='text2' class="form-control" placeholder="종료 날짜" value="<?=$text2; ?>"/>
														<span class="input-group-addon">
															<i class="far fa-calendar-alt fa-lg"></i>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="book_tabel_item">
												<div class="input-group">

														<select name="text3" class="wide">
															<option value="0">선택하세요.</option>
															<?
																foreach ($list_room as $row)
																{
																	if($row->ID==$text3)
																		echo("<option value='$row->ID' selected>$row->name</option>");
																	else
																		echo("<option value='$row->ID'>$row->name</option>");
																}
															?>		
														</select>													
												</div>
												<div class="input-group">
													<select name="text4" class="wide">
													<option value="0">선택하세요.</option>
													<?
														$maxPeople = 4;
														for($i=1;$i<=$maxPeople;$i++){
															if($i==$text4){
																	echo("<option value='$i' selected>$i");
																	echo("명</option>");
															}
															else{
																echo("<option value='$i'>$i");
																echo("명</option>");
															}
														}
															
													?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-4">

																								
												<a class="book_now_btn button_hover" href="javascript:find_room();">찾아보기</a>

										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
                </div>   
			</div>
        </section>
        <!--================Banner Area =================-->

         <!--================ About History Area  =================-->
        <section class="about_history_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex align-items-center">
                        <div class="about_content ">
                            <h2 class="title title_color" align="center">Induk Royal<br>"특별한 휴식을 위하여"<br>힐링 & 휴식</h2>
                            <p>고품격 Refresh를 제공하는 생활 속의 리조트를 주제로 개발된 "Induk Royal"은 다양하고 독특한 시설을 갖춘 사계절 종합리조트입니다.</p>
                            <a href="#" class="button_hover theme_btn_two">Request Custom Price</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="/~team4/my/image/about_bg.jpg" alt="img">
                    </div>
                </div>
            </div>
        </section>
        <!--================ About History Area  =================-->
        
        <!--================ Facilities Area  =================-->
        <section class="facilities_area section_gap">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">  
            </div>
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_w">편의시설</h2>
                    <p>Induk Royal만의 시설</p>
                </div>
                <div class="row mb_30">
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-dinner"></i>레스토랑</h4>
                            <p>최고의 셰프들이 만들어주는 양식 뷔페를 먹고 기분 좋은 아침을 시작하세요.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-bicycle"></i>헬스 클럽</h4>
                            <p>여행하러 와서 근 손실 걱정하는 당신을 위한 맞춤 공간!</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-drop"></i>인피니티 풀</h4>
                            <p>일상에서 벗어나 자연에서 즐기는 인피니티 풀</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-car"></i>발렛파킹</h4>
                            <p>수준급의 기사님들이 차를 대기시키고 주차시켜드립니다.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr-coffee-cup"></i>카페</h4>
                            <p>편안한 분위기와 깔끔하고 고급스러운 원두를 사용한 카페</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class="lnr lnr lnr-funnel"></i>바 & 라운지</h4>
                            <p>연인과 함께 편안하게 술과 음악을 즐길 수 있는 바 & 라운지</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Facilities Area  =================-->
        
         <!--================ Review Area  =================-->
        <section class="latest_blog_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">리조트 경험 후기</h2>
                    <p></p>

                </div>


				<!-- 리뷰 목록 -->
                <div class="row mb_30 testimonial_slider owl-carousel">
<?
    foreach ($list_review as $row1)
	{
?>
                    <div class="col-lg col-md">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
<?
	if ($row1->pic)     // 이미지가 있는 경우
		echo("<img src='/~team4/review_img/$row1->pic' class='img-fluid' alt='post'>");
	else                   // 이미지가 없는 경우
		echo("<img src='' class='img-fluid' alt='post'>");
?>
                            </div>
                            <div class="details">
                                <div class="tags">
<?
	if($row1->ratings == 0) echo("☆☆☆☆☆");
	else if($row1->ratings == 1) echo("★☆☆☆☆");
	else if($row1->ratings == 2) echo("★★☆☆☆");
	else if($row1->ratings == 3) echo("★★★☆☆");
	else if($row1->ratings == 4) echo("★★★★☆");
	else if($row1->ratings == 5) echo("★★★★★");
	else echo("");
?>
                                </div>
                                <h4 class="sec_h4"><?=$row1->title ;?></h4>
								<h6 class="sec_h6">작성자 : <?=$row1->user ;?></h6>
                                <p><?=$row1->content ;?></p>
                                <h6 class="date title_color"><?=$row1->day ;?></h6>
                            </div>	
                        </div>
                    </div>
<?
	}
?>
                </div>
				<br/>
            </div>
        </section>

        <!--================ End Review Area  =================-->
        

        <!--================ start footer Area  =================-->	

							<!-- 푸터 -->

		<!--================ End footer Area  =================-->
