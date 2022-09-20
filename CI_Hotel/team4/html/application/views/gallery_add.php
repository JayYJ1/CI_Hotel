        <br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">사진 추가</div>

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
	$categoryId=set_value("categoryId");
	foreach ($list as $row)
	{
		if ($row->ID==$categoryId)
			echo("<option value='$row->ID' selected>$row->name</option>");
		else
			echo("<option value='$row->ID'> $row->name</option>");
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
								<input type="text" name="name" value="<?=set_value("name"); ?>" class="form-control form-control-sm" size="20" maxlength="20" />
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">사진 추가</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<input type="file" name="pic" value="" class="form-control form-control-sm" />
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
