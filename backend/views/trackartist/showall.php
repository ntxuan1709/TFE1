<div class="box">
	<div class="box-header">
		<h2 class="box-title">Danh sách Bài hát- ca sĩ</h2>
		<a class="btn btn-primary pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=add">Thêm mới TrackArtist</a>
	</div>
	<div class="box-body">
		<table id="tabledata" class="table table-bordered">
			<thead>
				<tr>
					<th>Artist id</th>
					<th>Track id</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($listtrackartist as $ta) 
					{
				?>
						<tr>
							<td><?php echo $ta['artistid'] ?></td>
							<td><?php echo $ta['trackid'] ?></td>

							<td>
								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=edit&id=
								<?php echo $ar['artistid'] ?>"
								class= "glyphicon glyphicon-edit" title="edit"></a>&nbsp;

								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=delete&id=
								<?php echo $ar['artistid'] ?>"  title="delete">
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