<div class='box'>
	<div class='box-header'>
		<h2 class='box-title'>Sửa nghệ sĩ</h2>
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
		<form action="?controller=<?php echo $_GET['controller'] ?>&act=update" method="post">
			<div class="col-md-7">
				<input type="hidden" name="artistid" value="<?php echo $row['artistid'] ?>">
				
				<div class="form-group">
					<label for="singername">Tên nghệ sĩ</label>
					<input type="text" name="singername" class="form-control" id="singername" value="<?php echo $row['singername'] ?>" placeholder="Nhập tên nghệ sĩ">
				</div>

				<div class="form-group">
					<label for="picture">Hình ảnh</label>
					<div class="input-group input-group-sm">
						<input type="text" name="picture" id="picture" class="form-control"/>
						<span class="input-group-btn">
							<button type="button" class="btn btn-info btn-flat" onclick="$('#fileuploadArtist').trigger('click')" id="Browse">...</button>
						</span>
					</div>
					<img  src="<?php echo $row['picture'] ?>" id="pictureviewer" width="200">
					<input type="file" style="display: none;" id="fileuploadArtist" name="fileuploadArtist" accept="image/png,image/jpeg,image/gif" onchange="uploadfileArtist('assets/')">
				</div>

				<div class="form-group">
					<label for="birthday">Ngày sinh</label>
					<input type="date" name="birthday" class="form-control" id="birthday" value="<?php echo $row['birthday'] ?>" placeholder="Nhập ngày sinh">
				</div>

				<div class="form-group">
						<label for="description">Mô tả đầy đủ</label>
						<textarea name="description" id="description" class="textarea" style="width:100%;height: 300px;">
							<?php echo $row['description']?>
						</textarea>
				</div>
				<div class="form-group">
						<label for="viewno">Lượt xem</label>
						<input type="number" name="viewno" id="viewno" value="<?php echo $row['viewno'] ?>" class="form-control">
				</div>
				
				<div>
					<button class="btn btn-primary"> Lưu </button>
				</div>
			</div>
	</form>
</div>
</div>