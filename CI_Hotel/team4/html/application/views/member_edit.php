		<br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">사용자</div>

				<form name="form1" method="post" action="">
					<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
						<td width="80%" align="left"><?=$row->ID; ?></td>
					</tr>
						<tr>
							<td width="20%" class="mycolor2" style="vertical-align:middle">
								 아이디(필수)
							</td>
							<td width="80%" align="right">
								<div class="form-inline">
									<input type="text" name="uid" value="<?=$row->uid; ?>" class="form-control form-control-sm" size="20" maxlength="20" />
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
									<input type="text" name="pwd" value="<?=$row->pwd; ?>" class="form-control form-control-sm" size="20" maxlength="20" />
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
									<input type="text" name="name" value="<?=$row->name; ?>" class="form-control form-control-sm" size="20" maxlength="20" />
								</div>
								<? if (form_error("name")==true) echo form_error("name"); ?>
							</td>
						</tr>
			<?
				$phone1 = trim(substr($row->phone,0,3));
				$phone2 = trim(substr($row->phone,3,4));
				$phone3 = trim(substr($row->phone,7,4));
			?>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 전화
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
								<input type="text" name="phone1" 
											 class="form-control form-control-sm" size="3" maxlength="3" value="<?=$phone1; ?>">&nbsp;-&nbsp;
								<input type="text" name="phone2" 
											 class="form-control form-control-sm" size="4" maxlength="4" value="<?=$phone2; ?>">&nbsp;-&nbsp;
								<input type="text" name="phone3" 
											 class="form-control form-control-sm" size="4" maxlength="4" value="<?=$phone3; ?>">
							</div>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
								 이메일
							</td>
							<td width="80%" align="right">
								<div class="form-inline">
									<input type="email" name="email" value="<?=$row->email; ?>" class="form-control form-control-sm" size="20" maxlength="20" />
								</div>
							</td>
						</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							등급
						</td>
						<td width="80%" align="left">
							<div class="form-inline">
			<? if($row->rank==0) { ?>
								<input type="radio" name="rank" value="0" checked> 고객&nbsp;&nbsp;
								<input type="radio" name="rank" value="1"> 관리자
			<? } else { ?>
								<input type="radio" name="rank" value="0" > 고객&nbsp;&nbsp;
								<input type="radio" name="rank" value="1" checked> 관리자
			<? } ?>
							</div>
						</td>
					</tr>
					</table>
				<div align="center">
					<input type="submit" value="저장" class="btn btn-sm mycolor1"> &nbsp;
					<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
				</div>
			</form>
		</div>

