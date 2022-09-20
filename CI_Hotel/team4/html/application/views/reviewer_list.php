<script>
		function find_text()
		{
			form1.action="/~team4/reviewer/lists/text1/" + form1.text1.value + "/text2/" + form1.text2.value + "/page";
			form1.submit();
		}

		$(function(){
			$("#text1").datetimepicker({
				locale: 'ko',
				format: 'YYYY-MM-DD',
				defaultDate: moment()
			});
			$("#text2").datetimepicker({
				locale: 'ko',
				format: 'YYYY-MM-DD',
				defaultDate: moment()
			});

			$("#text1").on("dp.change", function (e) {
				find_text();
			});
			$("#text2").on("dp.change", function (e) {
				find_text();
			});
		});


</script>
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h3>고객님들의 소중한 추억</h3>
						<h2>Induk Royal</h2>
						<h4>Induk Royal에 대한 좋았던 추억과 특별한 추억을 사진과 한 줄 평으로 공유해보세요!!<br />
						별점으로 고객님의 만족도를 표현 할 수 있어요.</h4>
					</div>
				</div>
            </div>
        <!--================Banner Area =================-->

			<div class="hotel_booking_area position">
				<div class="container">
					<form name="form1" method="post" action=""> 
						<div class="hotel_booking_table" >
							<div class="col-md-3">
								<h2>리뷰 날짜 검색</h2>
							</div>
							<br/>
							<div class="col-md-9">
								<div class="boking_table">
									<div class="row">
										<div class="col-md-6">
											<div class="book_tabel_item">
												<div class="form-group">
													<div class='input-group date' id='text1'>
														<input type='text' name='text1' class="form-control" placeholder="시작 날짜" value="<?=$text1; ?>"/>
														<span class="input-group-addon">
															<i class="far fa-calendar-alt fa-lg"></i>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="book_tabel_item">
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
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
        </section>

        <!--================ Reviewer Area  =================-->
<?
	$text1 = $text1 ? "/text1/$text1" : "";
	$text2 = $text2 ? "/text2/$text2" : "";
	$tmp = $text1 . $text2 . "/page/$page";
?>
        <section class="latest_blog_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">고객님들의 리뷰 페이지</h2>
                    <p>👀저희 리조트에 대한 소감들을 볼 수 있고 작성할 수도 있습니다!🎤</p>
				<!-- 리뷰 작성 -->
				<p>								
<?
	if($this->session->userdata("uid"))	{
		echo("<a href='/~team4/reviewer/add$tmp' style='float:right;' class='btn btn-warning'>리뷰 작성하기</a>");
	}
?>				
				</p>
                </div>


				<!-- 리뷰 목록 -->
                <div class="row mb_30 testimonial_slider owl-carousel">
<?
    foreach ($list as $row)
	{
?>
                    <div class="col-lg col-md">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
<?
	if ($row->pic)     // 이미지가 있는 경우
		echo("<img src='/~team4/review_img/$row->pic' class='img-fluid' alt='post'>");
	else                   // 이미지가 없는 경우
		echo("<img src='' class='img-fluid' alt='post'>");
?>
                            </div>
                            <div class="details">
                                <div class="tags">
<?
	if($row->ratings == 0) echo("☆☆☆☆☆");
	else if($row->ratings == 1) echo("★☆☆☆☆");
	else if($row->ratings == 2) echo("★★☆☆☆");
	else if($row->ratings == 3) echo("★★★☆☆");
	else if($row->ratings == 4) echo("★★★★☆");
	else if($row->ratings == 5) echo("★★★★★");
	else echo("");
?>
                                </div>
                                <h4 class="sec_h4"><?=$row->title ;?></h4>
								<h6 class="sec_h6">작성자 : <?=$row->user ;?></h6>
                                <p><?=$row->content ;?></p>
                                <h6 class="date title_color"><?=$row->day ;?></h6>
                            </div>	
                        </div>
                    </div>
<?
	}
?>
                </div>
            </div>
        </section>

        <!--================ End Reviewer Area  =================-->