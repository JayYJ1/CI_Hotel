<?
	$ID=$row->ID;                                 // 사용자번호

	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
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
							 카테고리 이름
						</td>
						<td width="80%" align="left">
							<?=$row->name; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle"> 사진 </td>
						<td width="80%" align="left">
							<div class="form-inline">
								<b>파일이름</b> : <?=$row->pic; ?> <br>
							</div>
<?
	if ($row->pic)     // 이미지가 있는 경우
		echo("<img src='/~team4/category_img/$row->pic' width='200’ class='img-fluid img-thumbnail'>");
	else                   // 이미지가 없는 경우
		echo("<img src='' width='200’ class='img-fluid img-thumbnail'>");
?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							 추가 정보
						</td>
						<td width="80%" align="left">
							<?=$row->tmi; ?>
						</td>
					</tr>
				</table>
				<div align="center">
					<a href="/~team4/category/edit/ID/<?=$ID; ?><?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
					<a href="/~team4/category/del/ID/<?=$ID; ?><?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
					<a href="/~team4/category/lists<?=$tmp; ?>" class="btn btn-sm mycolor1">이전 페이지로</a>
				</div>
			</form>
		</div>