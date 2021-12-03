<div class='box'>
	<div class='box-header'>
		<h2 class='box-title'>Thêm mới nhạc sĩ</h2>
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
		<form action="?controller=<?php echo $_GET['controller'] ?>&act=insert" method="post">
			<div class="col-md-7">
				<div class="form-group">
					<label for="composername">Tên nhạc sĩ</label>
					<input type="text" name="composername" class="form-control" id="composername" placeholder="Nhập tên nghệ sĩ">
				</div>

				<div class="form-group">
					<label for="picture">Hình ảnh</label>
					<div class="input-group input-group-sm">
						<input type="text" name="picture" id="picture" class="form-control"/>
						<span class="input-group-btn">
							<button type="button" class="btn btn-info btn-flat" onclick="$('#fileuploadComposer').trigger('click')" id="Browse">...</button>
						</span>
					</div>
					<img  src="assets/images/admin.jpg" id="pictureviewer" width="200">
					<input type="file" style="display: none;" id="fileuploadComposer" name="fileuploadComposer" accept="image/png,image/jpeg,image/gif" onchange="uploadfileComposer('assets/')">
				</div>

				<div class="form-group">
					<label for="birthday">Ngày sinh</label>
					<input type="date" name="birthday" class="form-control" id="birthday" placeholder="Nhập ngày sinh">
				</div>

				<div class="form-group">
						<label for="description">Mô tả đầy đủ</label>
						<textarea name="description" id="description" class="textarea" style="width:100%;height: 300px;">		
						</textarea>
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