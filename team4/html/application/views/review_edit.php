	<br>
	<div class="my_container">
        <div class="alert mycolor1" role="alert">리뷰 수정</div>

		<script>
		$(function() {
			$('#day').datetimepicker({
				locale: 'ko',
				format: 'YYYY-MM-DD',
				defaultDate: moment()
			});
		});
		</script>

        <form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">

			<table class="table table-bordered table-sm mymargin5">
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">유저</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<select name="userNameNum" class="form-control-form-control-sm">
								<option value="">선택하세요.</option>
<?
	foreach ($list as $row1)
	{
		if ($row->userNameNum==$row1->ID)
			echo("<option value='$row1->ID' selected>$row1->name</option>");
		else
			echo("<option value='$row1->ID'>$row1->name</option>");
	}
?>
							</select>
						</div>
						<? if (form_error("userNameNum")==true) echo form_error("userNameNum"); ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">날짜</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<div class="input-group input-group-sm date" id="day">
								<input type="text" name="day" value="<?=$row->day; ?>" class="form-control form-control-sm" />
									<? if (form_error("day")==true) echo form_error("day"); ?>
								<div class="input-group-append">
									<div class="input-group-text">
										<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">제목</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="title" value="<?=$row->title; ?>" class="form-control form-control-sm">
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">내용</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="content" value="<?=$row->content; ?>" class="form-control form-control-sm" />
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">별점</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<select name="ratings" class="form-control form-control-sm">
								<option value="">선택하세요</option>
								<option value="0" <? if($row->ratings == 0) echo("selected");?> >☆☆☆☆☆</option>
								<option value="1" <? if($row->ratings == 1) echo("selected");?> >★☆☆☆☆</option>
								<option value="2" <? if($row->ratings == 2) echo("selected");?> >★★☆☆☆</option>
								<option value="3" <? if($row->ratings == 3) echo("selected");?> >★★★☆☆</option>
								<option value="4" <? if($row->ratings == 4) echo("selected");?> >★★★★☆</option>
								<option value="5" <? if($row->ratings == 5) echo("selected");?> >★★★★★</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">사진</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<b>파일이름</b> : <?=$row->pic; ?> <br>
							<input type="file" name="pic" value="<?=$row->pic; ?>" class="form-control form-control-sm" />
						</div>
<?
	if ($row->pic)     // 이미지가 있는 경우
		echo("<img src='/~team4/review_img/$row->pic' style='height:260px;' class='img-fluid img-thumbnail'>");
	else                   // 이미지가 없는 경우
		echo("<img src='' style='height:260px;' class='img-fluid img-thumbnail'>");
?>
					</td>
				</tr>
			</table>

		<div align="center">
            <input type="submit" value="저장" class="btn btn-sm mycolor1" /> &nbsp;
            <input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();" />
        </div>
        </form>
	</div>