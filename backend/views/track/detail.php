<div class="box">
	<div class="box-header">
		<h2 class="box-title"> Bài hát <?php echo $row['trackname']?></h2>
		<a class="btn btn-warning pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=showall">Quay lại</a>
	</div>
	<div class="box-body">
		<table id="tabledata" class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên bài hát</th>
					<th>Hình ảnh</th>
					<th>Đường dẫn</th>
					<th>Độ dài</th>
 					<th>Mô tả</th>
 					<th>Lượt xem</th>
					<th>Composer id</th>
					<th>Category id</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $row['trackid'] ?></td>
					<td><?php echo $row['trackname'] ?></td>
					<td><img src="assets/<?php echo $row['picture']; ?>" width="80"/></td>
					<td><?php echo $row['url'] ?></td>
 					<td><?php echo $row['during'] ?></td>
					<td><?php echo $row['description'] ?></td>
					<td><?php echo $row['viewno'] ?></td>
					<td><?php echo $row['composerid'] ?></td>
					<td><?php echo $row['categoryid'] ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	
</div>