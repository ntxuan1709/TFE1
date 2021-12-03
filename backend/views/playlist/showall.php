<div class="box">
	<div class="box-header">
		<h2 class="box-title">Danh sách playlist</h2>
		<a class="btn btn-primary pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=add">Thêm mới playlist</a>
	</div>
	<div class="box-body">
		<?php
			if(isset($_GET['error']))
			{
				echo "<div class='alert alert-danger alert-dismissible'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<h4><i class='icon fa fa-ban'></i> Thông báo!</h4>".$_GET['error']."
					</div>";
			}
		?>
		<table id="tabledata" class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên playlist</th>
					<th>Lượt xem</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($listplaylist as $pl) 
					{
				?>
						<tr>
							<td><?php echo $pl['playlistid'] ?></td>
							<td><?php echo $pl['playlistname'] ?></td>
							<td><?php echo $pl['categoryid'] ?></td>
							<td>
								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=edit&id=
								<?php echo $pl['playlistid'] ?>"
								class= "glyphicon glyphicon-edit" title="edit"></a>&nbsp;

								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=delete&id=
								<?php echo $pl['playlistid'] ?>"  title="delete">
								<span class="fa fa-trash" onclick="return confirm('Bạn có muốn xóa không?')">
								</span></a>
								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=detail&id=<?php echo $pl['playlistid']; ?>"  title="Xem chi tiết"><span class="glyphicon glyphicon-list-alt"></span></a>
							</td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	
</div>