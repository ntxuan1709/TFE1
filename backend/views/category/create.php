<div class='box'>
	<div class='box-header'>
		<h2 class='box-title'>Thêm loại nhạc</h2>
		<a class="btn btn-warning pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=showall">Quay lại</a>
	</div>
	<div class='box-body'>
		<?php
			if(isset($_GET['error']))
			{
				echo "<div class='alert alert-danger alert-dismissible'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<h4><i class='icon fa fa-ban'></i> Thông báo!</h4>".$_GET['error']."
					</div>";
			}
		?>
		<form action="?controller=<?php echo $_GET['controller'] ?>&act=insert" method="POST">
			<div class="col-md-7">
				<div class="form-group">
					<label for="categoryname">Tên loại nhạc</label>
					<input type="text" name="categoryname" class="form-control" id="categoryname" placeholder="Nhập tên loại nhạc">
				</div>
				<div class="form-group">
						<label for="viewno">Lượt xem</label>
						<input type="number" name="viewno" id="viewno" class="form-control">
				</div>
				
				<div>
					<button class="btn btn-primary"> Lưu </button>
				</div>
			</div>
	</form>
</div>
</div>