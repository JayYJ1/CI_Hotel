<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>
<script>
    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~team4/category/lists/page";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~team4/category/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}
</script>

<!-- DataTales Gallery -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-3 font-weight-bold text-primary">갤러리 분류
		<!-- Topbar Search -->
					<form name="form1" method="post" action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" name="text1" class="form-control bg-light border-1 small" placeholder="Search for..."
								aria-label="Search" aria-describedby="basic-addon2" value="<?=$text1; ?>"  onKeydown="if (event.keyCode == 13) { find_text();}">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button" onClick="javascript:find_text();">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>
			<form name="form2" method="post" action="" style="float:right;">
				<a href="/~team4/category/add<?=$tmp; ?>" class="btn btn-primary">종류 추가</a>
			</form>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="20%">ID(number)</th>
						<th width="10%">name</th>
						<th width="70%">tmi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>번호</th>
						<th>종류명</th>
						<th>추가설명</th>
					</tr>
				</tfoot>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $ID=$row->ID;                                 // 사용자번호
?>
				<tbody>
					<tr>
						<td><?=$ID; ?></td>
						<td><a href="/~team4/category/view/ID/<?=$ID; ?><?=$tmp; ?>"><?=$row->name; ?></a></td>
						<td><?=$row->tmi ;?></td>
					</tr>
				</tbody>
<?
    }
?>
			</table>
		</div>
	</div>
</div>
<?=$pagination; ?>