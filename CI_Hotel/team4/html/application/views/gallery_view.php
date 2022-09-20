<?
	$ID=$row->ID;                                 // 사용자번호

	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>
<script>
	function zoomimage(iname, pname)
	{
		w=window.open("/~team4/gallery/zoom/iname/" + iname + "/pname/" + pname,
			"imageview", "resizable=yes, scrollbars=yes, status=no, width=600, height=550");
		w.focus();
	}
</script>
	<br>
		<div class="my_container">
			<div class="alert mycolor1" role="alert">갤러리 상세</div>

			<form name="form1" method="post" action="">
				<table class="table table-bordered table-sm mymargin5">
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
						<td width="80%" align="left"><?=$ID; ?></td>
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
							분류
						</td>
						<td width="80%" align="left">
							<?=$row->cName; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="mycolor2" style="vertical-align:middle">
							사진
						</td>
						<td width="80%" align="left">
<?
	$iname=$row->pic ? $row->pic : "";                       
	$pname=$row->name;

	if ($row->pic)     // 이미지가 있는 경우
		echo("<a href='javascript:zoomimage(\"$iname\", \"$pname\");'><img src='/~team4/gallery_img/$row->pic' width='300' class='img-fluid img-thumbnail'></a>");
	else                   // 이미지가 없는 경우
		echo("<img src='' width='300' class='img-fluid img-thumbnail'>");
?>
						</td>
					</tr>
				</table>
				<div align="center">
					<a href="/~team4/gallery/edit/ID/<?=$ID; ?><?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
					<a href="/~team4/gallery/del/ID/<?=$ID; ?><?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a> &nbsp;
					<a href="/~team4/gallery/lists<?=$tmp; ?>" class="btn btn-sm mycolor1">이전 페이지로</a>
				</div>
			</form>
		</div>