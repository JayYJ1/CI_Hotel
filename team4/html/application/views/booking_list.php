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

			$(document).on('click', '.modal_sel', function(){
				$('#roomname').text($(this).data('roomname'));
				$('#username').val($(this).data('username'));
				$('#start').val($(this).data('start'));
				$('#end').val($(this).data('end'));
				$('#price').val($(this).data('price'));
				$('#txtprice').val($(this).data('price').toLocaleString() + '원');
				$('#pic').attr('src', $(this).data('pic'));

				$('#roomId').val($(this).data('roomid'));
				$('#memberId').val($(this).data('memberid'));

				select_room($(this).data('people'));				
				$('.nice-select').last().css({'display':'none'});
				$('#count').css({'display':'inline-block'});

				select_people();
			});
			function select_room(people)
			{			
				form_booking.count.options.length=0;															
					for(var i=1;i<=people+1;i++){
						form_booking.count.add(new Option(i+"명", i));
					}													
			}
			function select_people(){
				var diff = new Date(form_booking.end.value) - new Date(form_booking.start.value);
				var currDay = 24*60*60*1000;
				var day = parseInt(diff/currDay);
				var prices = parseInt(form_booking.price.value) * day;

				if (form_booking.count.value >= form_booking.count.options.length)
				{
					prices = prices + parseInt(prices/2);
				}
				
				$('#prices').val(prices);
				$('#txtprices').text('합계 : ' + prices.toLocaleString() + '원');
			}
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
						<h3>간편하고 편리한 예약</h3>
						<h2>Induk Royal</h2>
						<h4>방마다 수용인원과 크기가 다를 수 있음에 주의하세요!</h4>
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

        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            <div class="container">
				<div class="section_title text-center">
                    <h2 class="title_color">예약 서비스</h2>
                    <p>인원수와 용도에 맞는 방을 선택해주세요.</p>
                </div>                
					<?
						foreach($list as $row)
						{
							$cid[] = $row->ID;
							$cpic[] = $row->pic;
							$cprice[] = $row->price;
							$cname[] = $row->name;
							$cpeople[] = $row->people;
						}// 사용자번호
					?>
<!---------------큰 화면 시작----------------->
				<div id="carouselExampleIndicators3" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="5000">
				  <div class="carousel-inner">
					<?
						if($row_count == 0){
						echo("<div class='carousel-item active'>
								<div style='float:center;'>
									<div class='accomodation_item text-center'>

										<h5> 찾으시는 방이 없습니다</h5>
									</div>
								</div>
							</div>
						");
						}
						else{							
							$row_mod = $limit;
							for($i=0; $i<($row_count/$limit); $i++){
								
								if($i+1 > ($row_count/$limit)){
									$row_mod = $row_count % $limit;
								}																
					?>

					<div class="carousel-item <?if($i==0){echo("active");}?>" >
					<?
						for($j=$i*$limit; $j<($i * $limit)+$row_mod;$j++){
					?>
						<div class="<?if($j == $i*$limit) echo("room-item-first"); else echo("room-item");?>">
							<div class="accomodation_item text-center">
								<div class="hotel_img">
									<img src="/~team4/room_img/<?=$cpic[$j]?>" alt="" width="260" height="270">
									<a href='#exampleModal' data-toggle='modal' class="modal_sel btn theme_btn button_hover" data-roomid='<?=$cid[$j];?>' data-roomname='<?=$cname[$j];?>' data-start='<?=$text1;?>' data-end='<?=$text2;?>' data-price='<?=$cprice[$j]?>' data-people='<?=$cpeople[$j];?>' data-pic='/~team4/room_img/<?=$cpic[$j];?>' data-username='<?=$this->session->userdata("name");?>' data-memberid='<?=$this->session->userdata("ID");?>'>예약하기</a>
								</div>
								<a href='#exampleModal' data-toggle='modal' class="modal_sel" data-roomid='<?=$cid[$j];?>' data-roomname='<?=$cname[$j];?>' data-start='<?=$text1;?>' data-end='<?=$text2;?>' data-price='<?=$cprice[$j]?>' data-pic='/~team4/room_img/<?=$cpic[$j];?>' data-people='<?=$cpeople[$j];?>' data-username='<?=$this->session->userdata("name");?>' data-memberid='<?=$this->session->userdata("ID");?>'><h4 class="sec_h4" ><?=$cname[$j]?></h4></a>
								<h5><?=number_format($cprice[$j])?>원</h5>
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
					  if($row_count > 0){
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

<!---------------큰 화면 끝----------------->
<!---------------중간 화면 시작----------------->
				<div id="carouselExampleIndicators2" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="5000">
				  <div class="carousel-inner">
					<?
						$limit = 2;
						if($row_count == 0){
						echo("<div class='carousel-item active'>
								<div style='float:center;'>
									<div class='accomodation_item text-center'>

										<h5> 찾으시는 방이 없습니다</h5>
									</div>
								</div>
							</div>
						");
						}
						else{							
							$row_mod = $limit;
							for($i=0; $i<($row_count/$limit); $i++){
								
								if($i+1 > ($row_count/$limit)){
									$row_mod = $row_count % $limit;
								}																
					?>

					<div class="carousel-item <?if($i==0){echo("active");}?>" >
					<?
						for($j=$i*$limit; $j<($i * $limit)+$row_mod;$j++){
					?>
						<div class="<?if($j == $i*$limit) echo("room-item-first"); else echo("room-item");?>">
							<div class="accomodation_item text-center">
								<div class="hotel_img">
									<img src="/~team4/room_img/<?=$cpic[$j]?>" alt="" width="260" height="270">
									<a href='#exampleModal' data-toggle='modal' class="modal_sel btn theme_btn button_hover" data-roomid='<?=$cid[$j];?>' data-roomname='<?=$cname[$j];?>' data-start='<?=$text1;?>' data-end='<?=$text2;?>' data-price='<?=$cprice[$j]?>' data-people='<?=$cpeople[$j];?>' data-pic='/~team4/room_img/<?=$cpic[$j];?>' data-username='<?=$this->session->userdata("name");?>' data-memberid='<?=$this->session->userdata("ID");?>'>예약하기</a>
								</div>
								<a href='#exampleModal' data-toggle='modal' class="modal_sel" data-roomid='<?=$cid[$j];?>' data-roomname='<?=$cname[$j];?>' data-start='<?=$text1;?>' data-end='<?=$text2;?>' data-price='<?=$cprice[$j]?>' data-pic='/~team4/room_img/<?=$cpic[$j];?>' data-people='<?=$cpeople[$j];?>' data-username='<?=$this->session->userdata("name");?>' data-memberid='<?=$this->session->userdata("ID");?>'><h4 class="sec_h4" ><?=$cname[$j]?></h4></a>
								<h5><?=number_format($cprice[$j])?>원</h5>
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
					  if($row_count > 0){
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
<!---------------중간 화면 끝----------------->
<!---------------작은 화면 시작----------------->
				<div id="carouselExampleIndicators1" class="carousel carousel-dark slide" data-bs-ride="carousel" data-interval="0">
				  <div class="carousel-inner">
					<?
						$limit = 1;
						if($row_count == 0){
						echo("<div class='carousel-item active'>
								<div style='float:center;'>
									<div class='accomodation_item text-center'>

										<h5> 찾으시는 방이 없습니다</h5>
									</div>
								</div>
							</div>
						");
						}
						else{							
							$row_mod = $limit;
							for($i=0; $i<($row_count/$limit); $i++){
								
								if($i+1 > ($row_count/$limit)){
									$row_mod = $row_count % $limit;
								}																
					?>

					<div class="carousel-item <?if($i==0){echo("active");}?>" >
					<?
						for($j=$i*$limit; $j<($i * $limit)+$row_mod;$j++){
					?>
						<div class="<?if($j == $i*$limit) echo("room-item-first"); else echo("room-item");?>">
							<div class="accomodation_item text-center">
								<div class="hotel_img">
									<img src="/~team4/room_img/<?=$cpic[$j]?>" alt="" width="260" height="270">
									<a href='#exampleModal' data-toggle='modal' class="modal_sel btn theme_btn button_hover" data-roomid='<?=$cid[$j];?>' data-roomname='<?=$cname[$j];?>' data-start='<?=$text1;?>' data-end='<?=$text2;?>' data-price='<?=$cprice[$j]?>' data-people='<?=$cpeople[$j];?>' data-pic='/~team4/room_img/<?=$cpic[$j];?>' data-username='<?=$this->session->userdata("name");?>' data-memberid='<?=$this->session->userdata("ID");?>'>예약하기</a>
								</div>
								<a href='#exampleModal' data-toggle='modal' class="modal_sel" data-roomid='<?=$cid[$j];?>' data-roomname='<?=$cname[$j];?>' data-start='<?=$text1;?>' data-end='<?=$text2;?>' data-price='<?=$cprice[$j]?>' data-pic='/~team4/room_img/<?=$cpic[$j];?>' data-people='<?=$cpeople[$j];?>' data-username='<?=$this->session->userdata("name");?>' data-memberid='<?=$this->session->userdata("ID");?>'><h4 class="sec_h4" ><?=$cname[$j]?></h4></a>
								<h5><?=number_format($cprice[$j])?>원</h5>
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
					  if($row_count > 0){
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
<!---------------------작은화면 끝------------------------->
<!---------모달 시작---------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">예약하기</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body" style="text-align:center">
			<div class="container">
                <div class="row">
                    <div class="col-md-7 d_flex">
                        <div class="about_content">
                            <h2 class="title title_color" id="roomname"></h2>
							<br>
        <form name="form_booking" method="post" action="">
			<input type="hidden" name="roomId" id="roomId" value="">
			<input type="hidden" name="memberId" id="memberId" value="">
			<input type="hidden" name="price" id="price" value="">
			<input type="hidden" name="prices" id="prices" value="">

          <div class="form-inline">
            회&nbsp;&nbsp;원&nbsp;&nbsp;명 : &nbsp;&nbsp;
            <input type="text" name="username" id="username" size="30" value="" class="form-control form-control-sm" readonly>
          </div>
		  <div style="height:10px"></div>
          <div class="form-inline">
            체&nbsp;&nbsp;크&nbsp;&nbsp;인 : &nbsp;&nbsp;
            <input type="text" name="start" id="start" size="30" value="" class="form-control form-control-sm" readonly>
          </div>
		  <div style="height:10px"></div>
          <div class="form-inline">
            체크아웃 : &nbsp;&nbsp;
            <input type="text" name="end" id="end" size="30" value="" class="form-control form-control-sm" readonly>
          </div>
		  <div style="height:10px"></div>
          <div class="form-inline">
            가격(1일) : &nbsp;&nbsp;
            <input type="text" name="txtprice" id="txtprice" size="30" value="" class="form-control form-control-sm" readonly>
          </div>
		  <div style="height:10px"></div>
          <div class="form-inline">
            예약인원 : &nbsp;&nbsp;
            <select name="count" id="count" class="nice-select form-control form-control-sm" onChange="javascript:select_people();">
			</select>
			</div>
		</form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img class="img-fluid" src="" id='pic' alt="img" width="260" height="270" style="float:right;">
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer alert-secondary" style="text-align:center;justify-content:space-between;padding-left:30px;padding-right:30px;">
		<div id="txtprices" style="font-weight:bold;">
			합계 : 
		</div>
		<div style="justify-content:flex-end;">
			<button type="button" class="btn btn-sm btn-secondary" onclick="javascript:form_booking.submit();">예약</button>
	        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">닫기</button>
		</div>
        
      </div>
    </div>
  </div>
</div>
<!----------모달 끝------------>
			</div>
        </section>


        <!--================ Accomodation Area  =================-->
        

        <!--================ Recent Area  =================-->

        

        <!--================ start footer Area  =================-->	

							<!-- 푸터 -->

		<!--================ End footer Area  =================-->
