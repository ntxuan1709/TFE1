<div class='box'>
	<div class='box-header'>
		<h2 class='box-title'>Thêm mới nhạc</h2>
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
					<input type="hidden" id="trackid" name="trackid" class="form-group" value="<?php echo $row['trackid'] ?>">

					<div class="form-group">
						<label for="trackname">Tên nhạc</label>
						<input type="text" name="trackname" class="form-control" id="trackname"
						value="<?php echo $row['trackname'] ?>"
						placeholder="Nhập tên nghệ sĩ">
					</div>

					<div class="form-group">
						<label for="picture">Hình ảnh</label>
						<div class="input-group input-group-sm">
							<input type="text" name="picture" id="picture" class="form-control"/>
							<span class="input-group-btn">
								<button type="button" class="btn btn-info btn-flat" onclick="$('#fileuploadTrack').trigger('click')" id="Browse">...</button>
							</span>
						</div>
						<img  src="assets/images/admin.jpg" id="pictureviewer" width="200">
						<input type="file" style="display: none;" id="fileuploadTrack" name="fileuploadTrack" accept="image/png,image/jpeg,image/gif" onchange="uploadfileTrack('assets/')">
					</div>

					<div class="form-group">
						<label for="url">URL</label>
						<div class="input-group input-group-sm">
							<input type="text" name="url" id="url" class="form-control"/>
							<span class="input-group-btn">
								<button type="button" class="btn btn-info btn-flat" onclick="$('#fileuploadMp3').trigger('click')" id="Browse">...</button>
							</span>
						</div>
						<input type="file" style="display: none;" id="fileuploadMp3" name="fileuploadMp3" accept="mp3" onchange="uploadfileMp3('assets/')">
					</div>

					<div class="form-group">
						<label for="during">Thời lượng</label>
						<input type="time" min="0:00" max="0:13" name="during" id="during" value="<?php echo $row['during'] ?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="description">Mô tả</label>
						<textarea name="description" id="description" class="textarea" style="width:100%;height: 300px;">	
							<?php echo $row['description'] ?>"
						</textarea>
					</div>
					<div class="form-group">
						<label for="viewno">Lượt xem</label>
						<input type="number" name="viewno" id="viewno" value="<?php echo $row['during'] ?>" class="form-control">
					</div>
				</div>

				<div class="col-md-5">
					<div class="form-group">
						<label for="composerid">Nhạc sĩ</label>
						<?php 
							include_once "views/composer/combobox.php";
						 ?>
					</div>
					<div class="form-group">
						<label for="categoryid">Thể loại nhạc</label>
						<?php 
							include_once "views/category/comboboxtrack.php";
						 ?>
					</div>	
				</div>
				
				<div>
						<button class="btn btn-primary"> Lưu </button>
				</div>
		</form>
</div>
</div>