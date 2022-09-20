	<br>
	<div class="my_container">
        <div class="alert mycolor1" role="alert">리뷰 추가</div>

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
	$userNameNum=set_value("userNameNum");
	foreach ($userList as $row1)
	{
		if ($row1->ID==$userNameNum)
			echo("<option value='$row1->ID' selected>$row1->name</option>");
		else
			echo("<option value='$row1->ID'> $row1->name</option>");
	}
?>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">날짜</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<div class="input-group input-group-sm date" id="day">
								<input type="text" name="day" value="<?=set_value("day"); ?>" class="form-control form-control-sm" />
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
							<input type="text" name="title" value="" class="form-control form-control-sm">
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">내용</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="text" name="content" value="" class="form-control form-control-sm" />
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">별점</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<select name="ratings" class="form-control form-control-sm">
								<option value="">선택하세요</option>
								<option value="0">☆☆☆☆☆</option>
								<option value="1">★☆☆☆☆</option>
								<option value="2">★★☆☆☆</option>
								<option value="3">★★★☆☆</option>
								<option value="4">★★★★☆</option>
								<option value="5">★★★★★</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">사진</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<input type="file" name="pic" class="form-control form-control-sm" />
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