<script>
    function find_text()
	{
		if (!form1.text1.value)					// 값이 없는 경우, 전체 자료
			form1.action="/~team4/member/lists/page";
		else                                    // 값이 있는 경우, text1 값 전달
			form1.action="/~team4/member/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}
</script>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-3 font-weight-bold text-primary">회원 목록
		<!-- Topbar Search -->
					<form name="form1" method="post" action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" name="text1" class="form-control bg-light border-1 small" placeholder="Search for..."
								aria-label="Search" aria-describedby="basic-addon2" value="<?=$text1; ?>"  onKeydown="if (event.keyCode == 13) { find_text();}">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button" onClick="find_text();">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>
						</div>
					</form>
			<a href="/~team4/member/add<?=$tmp; ?>" style="float:right;" class="btn btn-primary">회원 추가</a>
		</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID(number)</th>
						<th>userId</th>
						<th>password</th>
						<th>name</th>
						<th>phone</th>
						<th>email</th>
						<th>rank</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>번호</th>
						<th>유저 아이디</th>
						<th>비밀번호</th>
						<th>이름</th>
						<th>전화번호</th>
						<th>이메일</th>
						<th>등급</th>
					</tr>
				</tfoot>
				<tbody>
<?
    foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
    {
        $ID=$row->ID;                                 // 사용자번호
        $phone1 = trim(substr($row->phone,0,3));			// 전화 : 지역번호 추출
        $phone2 = trim(substr($row->phone,3,4));			// 전화 : 국번호 추출
        $phone3 = trim(substr($row->phone,7,4));			// 전화 : 번호 추출
        $phone = $phone1 . "-" . $phone2 . "-" . $phone3;       // 합치기
        $rank = $row->rank==0 ? "고객" : "관리자" ;     // 0->고객, 1->관리자 
?>
					<tr>
						<td><?=$ID; ?></td>
						<td><?=$row->uid; ?></td>
						<td><?=$row->pwd; ?></td>
						<td><a href="/~team4/member/view/ID/<?=$ID; ?><?=$tmp; ?>"><?=$row->name; ?></a></td>
						<td><?=$phone; ?></td>
						<td><?=$row->email; ?></td>
						<td><?=$rank; ?></td>
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