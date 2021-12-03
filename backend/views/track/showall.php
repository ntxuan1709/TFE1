<div class="box">
	<div class="box-header">
		<h2 class="box-title">Danh sách bài hát</h2>
		<a class="btn btn-primary pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=add">Thêm mới bài hát</a>
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
					<th>Tên bài hát</th>
					<th>Hình ảnh</th>
					<th>Đường dẫn</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($listtrack as $tr) 
					{
				?>
						<tr>
							<td><?php echo $tr['trackid'] ?></td>
							<td><?php echo $tr['trackname'] ?></td>
							<td><img src="assets/<?php echo $tr['picture']; ?>" width="80"/></td>
							<td><?php echo $tr['url'] ?></td>
							<td>								
								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=edit&id=
								<?php echo $tr['trackid'] ?>"
								class= "glyphicon glyphicon-edit" title="edit"></a>&nbsp;

								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=delete&id=
								<?php echo $tr['trackid'] ?>"  title="delete">
								<span class="fa fa-trash" onclick="return confirm('Bạn có muốn xóa không?')">
								</span></a>&nbsp;
								
								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=detail&id=<?php echo $tr['trackid']; ?>"  title="Xem chi tiết"><span class="glyphicon glyphicon-list-alt"></span></a>
							</td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	
</div>