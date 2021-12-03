<div class="box">
	<div class="box-header">
		<h2 class="box-title">nghệ sĩ <?php echo $row['composername']?></h2>
		<a class="btn btn-warning pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=showall">Quay lại</a>
	</div>
	<div class="box-body">
		<table id="tabledata" class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên nhạc sĩ</th>
					<th>Hình ảnh</th>
					<th>Ngày sinh</th>
					<th>Mô tả</th>
					<th>Lượt xem</th>
				</tr>
			</thead>
			<tbody>
						<tr>
							<td><?php echo $row['composerid'] ?></td>
							<td><?php echo $row['composername'] ?></td>
							<td><img src="assets/<?php echo $row['picture']; ?>" width="80"/></td>
							<td><?php echo $row['birthday'] ?></td>
							<td><?php echo $row['description'] ?></td>
							<td><?php echo $row['viewno'] ?></td>
						</tr>
			</tbody>
		</table>
	</div>
	
</div>