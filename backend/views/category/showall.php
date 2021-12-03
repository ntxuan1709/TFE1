<div class="box">
	<div class="box-header">
		<h2 class="box-title">Danh sách thể loại</h2>
		<a class="btn btn-primary pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=add">Thêm mới thể loại</a>
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
					<th>Tên thể loại</th>
					<th>Lượt xem</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($listcategory as $ca) 
					{
				?>
						<tr>
							<td><?php echo $ca['categoryid'] ?></td>
							<td><?php echo $ca['categoryname'] ?></td>
							<td><?php echo $ca['viewno'] ?></td>
							<td>
								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=edit&id=
								<?php echo $ca['categoryid'] ?>"
								class= "glyphicon glyphicon-edit" title="Sửa"></a>&nbsp;

								<a href="?controller=
								<?php echo $_GET['controller'] ?>
								&act=delete&id=
								<?php echo $ca['categoryid'] ?>"  title="Xóa">
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