	<br>
	<div class="my_container">
        <div class="alert mycolor1" role="alert">리뷰 상세</div>
<?
	$ID=$row->ID;                                 // 사용자번호

	$text1 = $text1 ? "/text1/$text1" : "";
	$text2 = $text2 ? "/text2/$text2" : "";
	$tmp = $text1 . $text2 . "/page/$page";
?>
        <form name="form1" method="post" action="">

			<table class="table table-bordered table-sm mymargin5">
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">유저</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<?=$row->user; ?>
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">날짜</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<?=$row->day; ?>
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">제목</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<?=$row->title; ?>
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">내용</td>
					<td width="80%" align="left">
						<div class="form-inline">
							<?=$row->content; ?>
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">별점</td>
					<td width="80%" align="left">
						<div class="form-inline">
<?
	if($row->ratings == 0) echo("☆☆☆☆☆");
	else if($row->ratings == 1) echo("★☆☆☆☆");
	else if($row->ratings == 2) echo("★★☆☆☆");
	else if($row->ratings == 3) echo("★★★☆☆");
	else if($row->ratings == 4) echo("★★★★☆");
	else if($row->ratings == 5) echo("★★★★★");
	else echo("");
?>
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2" style="vertical-align:middle">사진</td>
					<td width="80%" align="left">
						<div class="form-inline">
<?
	if ($row->pic)     // 이미지가 있는 경우
		echo("<img src='/~team4/review_img/$row->pic' class='img-fluid img-thumbnail'>");
	else                   // 이미지가 없는 경우
		echo("<img src='' class='img-fluid img-thumbnail'>");
?>
						</div>
					</td>
				</tr>
			</table>

		<div align="center">
            <a href="/~team4/review/edit/ID/<?=$ID; ?><?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~team4/review/del/ID/<?=$ID; ?><?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
            <a href="/~team4/review/lists<?=$tmp; ?>" class="btn btn-sm mycolor1">이전 페이지로</a>
        </div>
        </form>
	</div>