        <br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">카테고리 사진 추가</div>

			<form name="form1" method="post" action="" enctype="multipart/form-data">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							카테고리 이름(필수)
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<input type="text" name="name" value="<?=set_value("name"); ?>" class="form-control form-control-sm" />
							</div>
							<? if (form_error("name")==true) echo form_error("name"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle"> 사진(필수) </td>
						<td width="80%" align="left">
							<div class="form-inline">
								<input type="file" name="pic" value="" class="form-control form-control-sm" required/>
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle"> 추가정보(필수) </td>
						<td width="80%" align="left">
							<div class="form-inline">
								<textarea type="text" name="tmi" value="" class="form-control form-control-sm" ></textarea>
							</div>
							<? if (form_error("tmi")==true) echo form_error("tmi"); ?>
						</td>
					</tr>
				</table>
				<div align="center">
					<input type="submit" value="저장" class="btn btn-sm mycolor1" /> &nbsp;
					<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();" />
				</div>
			</form>
		</div>
