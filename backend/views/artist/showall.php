<div class="box">
	<div class="box-header">
		<h2 class="box-title">Danh sách nghệ sĩ</h2>
		<a class="btn btn-primary pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=add">Thêm mới nghệ sĩ</a>
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
					<th>Tên ca sĩ</th>
					<th>Hình ảnh</th>
					<th>Ngày sinh</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($listartist as $ar) 
					{
				?>
						<tr>
							<td><?php echo $ar['artistid'] ?></td>
							<td><?php echo $ar['singername'] ?></td>
							<td><img src="assets/<?php echo $ar['picture']; ?>" width="80"/></td>
							<td><?php echo $ar['birthday'] ?></td>
							<td>
								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=edit&id=
								<?php echo $ar['artistid'] ?>"
								class= "glyphicon glyphicon-edit" title="Sửa"></a>&nbsp;

								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=delete&id=
								<?php echo $ar['artistid'] ?>"  title="Xóa">
								<span class="fa fa-trash" onclick="return confirm('Bạn có muốn xóa không?')">
								</span></a>&nbsp;
								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=detail&id=<?php echo $ar['artistid']; ?>"  title="Xem chi tiết"><span class="glyphicon glyphicon-list-alt"></span></a>
							</td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	
</div>