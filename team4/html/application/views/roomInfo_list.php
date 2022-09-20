        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
					<h2 class="page-cover-tittle">방 소개</h2>
					<ol class="breadcrumb">
						<li><a href="/~team4/main">Main</a></li>
						<li class="active">방 소개</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">편안한 휴식을 위한 방</h2>
                    <p style="color:red;">방마다 수용인원과 크기가 다를 수 있음에 주의하세요!</p>
                </div>

<?
	// 카테고리 목록
	foreach ($list as $row)
	{
		$roomID[] = $row->ID;
		$roomName[] = $row->name;
		$roomPrice[] = $row->price;
		$roomPic[] = $row->pic;
	}	
?>
	<!-- 화면 carousel3-->
					<div id="carouselExampleIndicators3" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="5000" >
						<div class="carousel-inner">
<?
	if($row_count == 0) {
		echo("<div class='carousel-item active'>
				<div style='float:center;'>
					<div class='accomodation_item text-center'>
						<h5> 카테고리가 없습니다. </h5>
					</div>
				</div>
			</div>
		");
	}
	else {							
		$row_mod = $limit;
		for($i=0; $i < ($row_count/$limit); $i++) {
			
			if( $i+1 > ($row_count/$limit)) {
				$row_mod = $row_count % $limit;
			}
?>
							<div class="carousel-item <? if($i == 0) {echo("active");} ?>">
<?
			for($j = $i*$limit; $j < ($i*$limit) + $row_mod; $j++) {
?>							
								<div class="<? if($j == $i*$limit) echo("room-item-first"); else echo("room-item");?>">
									<div class="accomodation_item text-center">
											<div class="hotel_img">
												<img src="/~team4/room_img/<?=$roomPic[$j]; ?>" width="260" height="270" alt="post">
												<a href="/~team4/roomInfo/view/ID/<?=$roomID[$j]; ?>" class="btn theme_btn button_hover" >상세 보기</a>
											</div>
										<h4 class="sec_h4" ><?=$roomName[$j]; ?></h4></a>
										<h5><?=$roomPrice[$j]; ?>원</h5>

									</div>
								</div>
<?
			}
?>
							</div>
<?
		}
	}
?>
						</div>

<?
	if($row_count > 0) {
?>
						<a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
<?
	}
?>
					</div>
	<!-- 화면 carousel3 -->

	<!-- 화면 carousel2 -->
					<div id="carouselExampleIndicators2" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="5000" >
						<div class="carousel-inner">
<?
	if($row_count == 0) {
		echo("<div class='carousel-item active'>
				<div style='float:center;'>
					<div class='accomodation_item text-center'>
						<h5> 카테고리가 없습니다. </h5>
					</div>
				</div>
			</div>
		");
	}
	else {			
		$limit = 2;
		$row_mod = $limit;
		for($i=0; $i < ($row_count/$limit); $i++) {
			
			if( $i+1 > ($row_count/$limit)) {
				$row_mod = $row_count % $limit;
			}
?>
							<div class="carousel-item <? if($i == 0) {echo("active");} ?>">
<?
			for($j = $i*$limit; $j < ($i*$limit) + $row_mod; $j++) {
?>							
								<div class="<? if($j == $i*$limit) echo("room-item-first"); else echo("room-item");?>">
									<div class="accomodation_item text-center">
										<div class="hotel_img">
											<img src="/~team4/room_img/<?=$roomPic[$j]; ?>" width="260" height="270" alt="post">
											<a href="/~team4/roomInfo/view/ID/<?=$roomID[$j]; ?>" class="modal_sel btn theme_btn button_hover" >상세 보기</a>
										</div>
										<h4 class="sec_h4" ><?=$roomName[$j]; ?></h4></a>
										<h5><?=$roomPrice[$j]; ?>원</h5>

									</div>
								</div>
<?
			}
?>
							</div>
<?
		}
	}
?>
						</div>

<?
	if($row_count > 0) {
?>
						<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
<?
	}
?>
					</div>
	<!-- 화면 carousel2 -->

	<!-- 화면 carousel1 -->
					<div id="carouselExampleIndicators1" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="5000" >
						<div class="carousel-inner">
<?
	if($row_count == 0) {
		echo("<div class='carousel-item active'>
				<div style='float:center;'>
					<div class='accomodation_item text-center'>
						<h5> 카테고리가 없습니다. </h5>
					</div>
				</div>
			</div>
		");
	}
	else {	
		$limit = 1;
		$row_mod = $limit;
		for($i=0; $i < ($row_count/$limit); $i++) {
			
			if( $i+1 > ($row_count/$limit)) {
				$row_mod = $row_count % $limit;
			}
?>
							<div class="carousel-item <? if($i == 0) {echo("active");} ?>">
<?
			for($j = $i*$limit; $j < ($i*$limit) + $row_mod; $j++) {
?>							
								<div class="<? if($j == $i*$limit) echo("room-item-first"); else echo("room-item");?>">
									<div class="accomodation_item text-center">
										<div class="hotel_img">
										<img src="/~team4/room_img/<?=$roomPic[$j]; ?>" width="260" height="270" alt="post">
											<a href="/~team4/roomInfo/view/ID/<?=$roomID[$j]; ?>" class="modal_sel btn theme_btn button_hover" >상세 보기</a>
										</div>
										<h4 class="sec_h4" ><?=$roomName[$j]; ?></h4></a>
										<h5><?=$roomPrice[$j]; ?>원</h5>

									</div>
								</div>
<?
			}
?>
							</div>
<?
		}
	}
?>
						</div>

<?
	if($row_count > 0) {
?>
						<a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
<?
	}
?>
					</div>
	<!-- 화면 carousel1-->
			</div>
        </section>

        <!--================ Accomodation Area  =================-->
        

        <!--================ Recent Area  =================-->

        

        <!--================ start footer Area  =================-->	

							<!-- 푸터 -->

		<!--================ End footer Area  =================-->
