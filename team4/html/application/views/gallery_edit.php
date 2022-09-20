        <br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">갤러리 수정</div>

			<form name="form1" method="post" action="" enctype="multipart/form-data">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							카테고리 선택(필수)
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<select name="categoryId" class="form-control-form-control-sm">
									<option value="">선택하세요</option>
<?
	foreach ($list as $row1)
	{
		if ($row->categoryId==$row1->ID)
			echo("<option value='$row1->ID' selected>$row1->name</option>");
		else
			echo("<option value='$row1->ID'> $row1->name</option>");
	}
?>
								</select>
							</div>
							<? if (form_error("categoryId")==true) echo form_error("categoryId"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 이름
						</td>
						<td width="80%" align="right">
							<div class="form-inline">
								<input type="text" name="name" value="<?=$row->name; ?>" class="form-control form-control-sm" size="20" maxlength="20" />
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle"> 사진 </td>
						<td width="80%" align="left">
							<div class="form-inline">
								<b>파일이름</b> : <?=$row->pic; ?> <br>
								<input type="file" name="pic" value="<?=$row->pic; ?>" class="form-control form-control-sm" />
							</div>
<?
	if ($row->pic)     // 이미지가 있는 경우
		echo("<img src='/~team4/gallery_img/$row->pic' width='200' class='img-fluid img-thumbnail'>");
	else                   // 이미지가 없는 경우
		echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
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
