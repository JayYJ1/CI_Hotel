        <br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">사용자</div>

			<form name="form1" method="post" action="">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 아이디(필수)
						</td>
						<td width="80%" align="right">
							<div class="form-inline">
								<input type="text" name="uid" value="<?=set_value("uid"); ?>" class="form-control form-control-sm" size="20" maxlength="20" />
							</div>
							<? if (form_error("uid")==true) echo form_error("uid"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 비밀번호(필수)
						</td>
						<td width="80%" align="right">
							<div class="form-inline">
								<input type="text" name="pwd" value="<?=set_value("pwd"); ?>" class="form-control form-control-sm" size="20" maxlength="20" />
							</div>
							<? if (form_error("pwd")==true) echo form_error("pwd"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 이름(필수)
						</td>
						<td width="80%" align="right">
							<div class="form-inline">
								<input type="text" name="name" value="<?=set_value("name"); ?>" class="form-control form-control-sm" size="20" maxlength="20" />
							</div>
							<? if (form_error("name")==true) echo form_error("name"); ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 전화
						</td>
						<td width="80%" align="right">
							<div class="form-inline">
								<input type="text" name="phone1" 
											 class="form-control form-control-sm" size="3" maxlength="3" value=""> - 
								<input type="text" name="phone2" 
											 class="form-control form-control-sm" size="4" maxlength="4" value=""> - 
								<input type="text" name="phone3" 
											 class="form-control form-control-sm" size="4" maxlength="4" value="">
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 이메일
						</td>
						<td width="80%" align="right">
							<div class="form-inline">
								<input type="email" name="email" value="" class="form-control form-control-sm" size="20" maxlength="20" />
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							등급
						</td>
						<td width="80%" align="right">
							<div class="form-inline">
								<input  type="radio" name="rank" value="0" checked> 사용자&nbsp;&nbsp;
								<input  type="radio" name="rank" value="1"> 관리자
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
