		<script>
			$(function(){
				$("#start") .datetimepicker({
					locale: 'ko',
					format: 'YYYY-MM-DD',
					defaultDate: moment()
				});
				$("#end") .datetimepicker({
					locale: 'ko',
					format: 'YYYY-MM-DD',
					defaultDate: moment()
				});

				$("#start") .on("dp.change", function (e){
					select_people();
				});
				$("#end") .on("dp.change", function (e){
					select_people();
				});
			});

			
			function select_room()
			{
				var str;
				str = form1.sel_roomId.value;
				form1.roomId.value = str[0];				
				form1.count.options.length=0;

				if(str=="")
				{
					form1.count.value="";
					form1.price.value = 0;
				}
				else
				{					
					str = str.split("^^");	
					form1.price.value = str[2];
					for(var i=1;i<=parseInt(str[1])+1;i++){
						form1.count.add(new Option(i+"명", i));
					}
				}	
				select_people();
			}
			function select_people(){
				
				var diff = new Date(form1.end.value) - new Date(form1.start.value);
				var currDay = 24*60*60*1000;
				var day = parseInt(diff/currDay);

				var prices = parseInt(form1.price.value) * day;

				
				if (form1.count.value >= form1.count.options.length)
				{
					prices = prices + parseInt(prices/2);
				}
				
				form1.prices.value = prices;
				if (prices>0)
				{
					form1.txtprices.value = prices.toLocaleString() + '원';
				}
				else
				{
				form1.txtprices.value = '0원';
				}

				
			}
			window.onload = function(){
				var str;
				str = form1.sel_roomId.value;
				form1.roomId.value = str[0];				
				
				str = str.split("^^");	
				form1.price.value = str[2];
			}
		</script>
		
		<br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">예약 목록</div>

			<form name="form1" method="post" action="">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
						<td width="80%" align="left"><?=$row->ID; ?></td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							방이름
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
							<input type="hidden" name="roomId" value="<?=$row->roomId;?>">
								<select name="sel_roomId" class="form-control form-control-sm" onchange="select_room();">
									<option value="">선택하세요.</option>
									<?
										$roomId=set_value("roomId");
										foreach($list1 as $row1){
											$t1 = "$row1->ID^^$row1->people^^$row1->price";
											if($row1->ID==$row->roomId)
												echo("<option value='$t1' selected>$row1->name</option>");
											else
												echo("<option value='$t1'>$row1->name</option>");
										}
									?>		

								</select>
							</div>
							<? If (form_error("roomtypeId")==true) echo form_error("roomtypeId"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							회원명
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<select name="memberId" class="form-control form-control-sm">
									<option value="">선택하세요.</option>
									<?
										$memberId=set_value("memberId");
										foreach($list2 as $row2){
											if($row2->ID==$row->memberId)
												echo("<option value='$row2->ID' selected>$row2->name</option>");
											else
												echo("<option value='$row2->ID'>$row2->name</option>");
										}
									?>		
								</select>
							</div>
							<? If (form_error("memberId")==true) echo form_error("memberId"); ?>
						</td>
					</tr>

					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							체크인
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
							<div class="input-group input-group-sm date" id="start">
								<input  type="text" name="start" class="form-control form-control-sm" size="20" maxlength="20" value="<?=$row->start;?>">&nbsp;
								<? If (form_error("start")==true) echo form_error("start"); ?>
								<div class="input-group-append">
									<div class="input-group-text">
										<div class="input-group-addon"> <i class="far fa-calendar-alt fa-lg"> </i></div>
									</div>
								</div>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							체크아웃
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
							<div class="input-group input-group-sm date" id="end">
								<input  type="text" name="end" class="form-control form-control-sm" size="20" maxlength="20" value="<?=$row->end; ?>">&nbsp;
								<? If (form_error("end")==true) echo form_error("end"); ?>
								<div class="input-group-append">
									<div class="input-group-text">
										<div class="input-group-addon"> <i class="far fa-calendar-alt fa-lg"> </i></div>
									</div>
								</div>
							</div>
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							예약인원
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<select name="count" class="form-control form-control-sm" onchange="select_people();">
									<?
										for($i=1; $i<=($row->room_people + 1); $i++){
											if ($row->count == $i)
												echo("<option value='$i' selected> $i 명</option>");
											else
												echo("<option value='$i'> $i 명</option>");											
										}
									?>
								</select>
							</div>
							<? If (form_error("count")==true) echo form_error("count"); ?>
						</td>
					</tr>

					<input type="hidden" name="price" value="">
					<input type="hidden" name="prices" value="<?=$row->prices;?>">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							가격
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<input type="text" name="txtprices" value="<?=number_format($row->prices);?>원" class="form-control form-control-sm" readonly/>
							</div>
						</td>
					</tr>
				</table>
				<div align="center">
					<input type="submit" value="저장" class="btn btn-sm mycolor1" /> &nbsp;
					<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();" />
				</div>
			</form>
		</div>
