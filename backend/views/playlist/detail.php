<div class="box">
	<div class="box-header">
		<h2 class="box-title">Playlist <?php echo $row['playlistname']?></h2>
		<a class="btn btn-warning pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=showall">Quay lại</a>
	</div>
	<div class="box-body">
		<table id="tabledata" class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên playlist</th>
					<th>Lượt xem</th>
					<th>User id</th>
					<th>category id</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
					<tr>
							<td><?php echo $row['playlistid'] ?></td>
							<td><?php echo $row['playlistname'] ?></td>
							<td><?php echo $row['viewno'] ?></td>
							<td><?php echo $row['userid'] ?></td>
							<td><?php echo $row['categoryid'] ?></td>
						
						<td>
								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=edit&id=
								<?php echo $row['playlistid'] ?>"
								class= "glyphicon glyphicon-edit" title="edit"></a>&nbsp;

								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=delete&id=
								<?php echo $row['playlistid'] ?>"  title="delete">
								<span class="fa fa-trash" onclick="return confirm('Bạn có muốn xóa không?')">
								</span></a>
						</td>
					</tr>
			</tbody>
		</table>
	</div>
	
</div>