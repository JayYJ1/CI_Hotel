
<script>
			function find_text()
			{
				form1.action="/~team4/review/lists/text1/" + form1.text1.value + "/text2/" + form1.text2.value + "/page";
				form1.submit();
			}

			$(function(){
				$("#text1") .datetimepicker({
					locale: 'ko',
					format: 'YYYY-MM-DD',
					defaultDate: moment()
				});
				$("#text2") .datetimepicker({
					locale: 'ko',
					format: 'YYYY-MM-DD',
					defaultDate: moment()
				});

				$("#text1") .on("dp.change", function (e){
					find_text();
				});
				$("#text2") .on("dp.change", function (e){
					find_text();
				});
			});
</script>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-3 font-weight-bold text-primary">리뷰 목록
		<!-- Topbar Search -->
					<form name="form1" method="post" action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="form-inline">
							<div class="input-group date" id="text1">
								<input type="text" name="text1" class="form-control bg-light border-1 small" placeholder="Search for..."
									aria-label="Search" aria-describedby="basic-addon2" value="<?=$text1; ?>"  onKeydown="if (event.keyCode == 13) { find_text();}">
								<div class="input-group-append">
									<div class="input-group-text">
										<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
									</div>
								</div>
							</div>

							&nbsp; -&nbsp;

							<div class="input-group date" id="text2">
								<input type="text" name="text2" class="form-control bg-light border-1 small" placeholder="Search for..."
									aria-label="Search" aria-describedby="basic-addon2" value="<?=$text2; ?>"  onKeydown="if (event.keyCode == 13) { find_text();}">
								<div class="input-group-append">
									<div class="input-group-text">
										<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
									</div>
								</div>
							</div>
							&nbsp;
								<button class="btn btn-primary" type="button" onClick="find_text();">
									<i class="fas fa-search fa-sm"></i>
								</button>
						</div>
					</form>		
<?
	$tmp = $text1 ? "/text1/$text1/text2/$text2/page/$page" : "/page/$page";
?>
			<a href="/~team4/review/add<?=$tmp; ?>" style="float:right;" class="btn btn-primary">리뷰 추가</a>					
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID(number)</th>
						<th>User</th>
						<th>Day</th>
						<th>Title</th>
						<th>Content</th>
						<th>Ratings</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>번호</th>
						<th>회원명</th>
						<th>작성 날짜</th>
						<th>제목</th>
						<th>내용</th>
						<th>별점</th>
					</tr>
				</tfoot>
				<tbody>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $ID=$row->ID;                                 // 리뷰 번호
?>
					<tr>
						<td><?=$ID; ?></td>
						<td><?=$row->user; ?></td>
						<td><?=$row->day;?></td>
						<td><a href="/~team4/review/view/ID/<?=$ID; ?><?=$tmp; ?>"><?=$row->title; ?></a></td>
						<td><?=$row->content; ?></td>
						<td>
<?
	if($row->ratings == 0) echo("☆☆☆☆☆");
	else if($row->ratings == 1) echo("★☆☆☆☆");
	else if($row->ratings == 2) echo("★★☆☆☆");
	else if($row->ratings == 3) echo("★★★☆☆");
	else if($row->ratings == 4) echo("★★★★☆");
	else if($row->ratings == 5) echo("★★★★★");
	else echo("");
?>
						</td>
					</tr>
<?
    }
?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?=$pagination; ?>