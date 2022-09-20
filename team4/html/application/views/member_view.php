<?
	$ID=$row->ID;                                 // 사용자번호
	$phone1 = trim(substr($row->phone,0,3));			// 전화 : 지역번호 추출
	$phone2 = trim(substr($row->phone,3,4));			// 전화 : 국번호 추출
	$phone3 = trim(substr($row->phone,7,4));			// 전화 : 번호 추출
	$phone = $phone1 . "-" . $phone2 . "-" . $phone3;       // 합치기
	$rank = $row->rank==0 ? "고객" : "관리자" ;     // 0->고객, 1->관리자

	$tmp = $text1 ? "/ID/$ID/text1/$text1/page/$page" : "/ID/$ID/page/$page";
?>
	<br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">사용자</div>

			<form name="form1" method="post" action="">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
						<td width="80%" align="left"><?=$ID; ?></td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 아이디
						</td>
						<td width="80%" align="left">
							<?=$row->uid; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							비밀번호
						</td>
						<td width="80%" align="left">
							<?=$row->pwd; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 이름
						</td>
						<td width="80%" align="left">
							<?=$row->name; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 전화
						</td>
						<td width="80%" align="left">
							<?=$phone; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							이메일
						</td>
						<td width="80%" align="left">
							<?=$row->email; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							등급
						</td>
						<td width="80%" align="left">
							<?=$rank; ?>
						</td>
					</tr>
				</table>
				<div align="center">
					<a href="/~team4/member/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
					<a href="/~team4/member/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
					<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
				</div>
			</form>
		</div>