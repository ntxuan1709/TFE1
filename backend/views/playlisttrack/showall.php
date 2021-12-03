<div class="box">
	<div class="box-header">
		<h2 class="box-title">Danh sách playlist-bai hat</h2>
		<a class="btn btn-primary pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=add">Thêm mới playlist-track</a>
	</div>
	<div class="box-body">
		<table id="tabledata" class="table table-bordered">
			<thead>
				<tr>
					<th>Playlist id</th>
					<th>Track id</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($playlisttrack as $plt) 
					{
				?>
						<tr>
							<td><?php echo $plt['playlistid'] ?></td>
							<td><?php echo $plt['trackid'] ?></td>

							<td>
								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=edit&id=
								<?php echo $plt['playlistid'] ?>"
								class= "glyphicon glyphicon-edit" title="Sửa"></a>&nbsp;

								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=delete&id=
								<?php echo $plt['playlistid'] ?>"  title="Xóa">
								<span class="fa fa-trash" onclick="return confirm('Bạn có muốn xóa không?')">
								</span></a>
							</td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	
</div>