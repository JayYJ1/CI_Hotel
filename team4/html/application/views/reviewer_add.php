		<script>
		$(function() {
			$('#day').datetimepicker({
				locale: 'ko',
				format: 'YYYY-MM-DD',
				defaultDate: moment()
			});
		});
		</script>
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center" style="flex-direction: column;">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center" >
						<br/><br/><br/><br/><br/>
						<h2>리뷰 작성 페이지</h2>
						<p>리뷰를 작성해주세요</p>
					</div>
				</div>

				<div class="container form-control">
							
					<form class="row contact_form" action="" name="form1" method="post" id="contactForm" enctype="multipart/form-data">
						<input type="hidden" class="form-control btn btn-light" id="name" name="userNameNum" value="<?=$row->ID ;?>">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" class="form-control btn btn-light" style="color:black;" id="name" name="user" value="<?=$row->name ;?>" disabled>
							</div>
							<!-- 제목 -->
							<div class="form-group">
								<input type="text" class="form-control btn btn-light" id="subject" name="title" placeholder="제목을 입력하세요">
							</div>
							<!-- 날짜 지정 -->
							<div class="form-group">
								<div class="input-group input-group-sm date" id="day">
								<input type="text" name="day" value="<?=set_value("day"); ?>" class="form-control form-control-sm" style="text-align: center;"/>
									<? if (form_error("day")==true) echo form_error("day"); ?>
									<div class="input-group-append">
										<div class="input-group-text">
											<div class="input-group-addon"><i class="far fa-calendar-alt fa-2x"></i></div>
										</div>
									</div>
								</div>
							</div>
							<!-- 별점 -->
							<div class="form-group">
								<select name="ratings" class="form-control form-control-sm btn-light">
									<option value="0">☆☆☆☆☆</option>
									<option value="1">★☆☆☆☆</option>
									<option value="2">★★☆☆☆</option>
									<option value="3">★★★☆☆</option>
									<option value="4">★★★★☆</option>
									<option value="5">★★★★★</option>
								</select>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<textarea class="form-control btn-light" name="content" id="message" rows="10" placeholder="내용을 입력하세요"></textarea>
							</div>
							<input type="file" name="pic" value="" class="form-control form-control-sm" />
						</div>
						<div class="col-md-12 text-right" align="">
							<button type="submit" value="submit" class="btn theme_btn button_hover">작성하기</button>
							<input type="button" value="이전화면으로" class="btn theme_btn button_hover" onClick="history.back();" />
						</div>

					</form>
				</div>
			</div>
        </section>
        <!--================Banner Area =================-->
