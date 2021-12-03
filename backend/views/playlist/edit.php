<div class='box'>
	<div class='box-header'>
		<h2 class='box-title'>Sửa playlist nhạc</h2>
		<a class="btn btn-warning pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=showall">Quay lại</a>
	</div>
	<div class='box-body'>
		<form action="?controller=<?php echo $_GET['controller'] ?>&act=update" method="post">
			<div class="col-md-7">
				<input type="hidden" name="playlistid" value="<?php echo $row['playlistid'] ?>">
				<div class="form-group">
					<label for="playlistname">playlistname</label>
					<input type="text" name="playlistname" class="form-control" id="playlistname" value="<?php echo $row['playlistname'] ?>" placeholder="Nhập tên nghệ sĩ">
				</div>
				<div class="form-group">
						<label for="viewno">Lượt xem</label>
						<input type="number" name="viewno" id="viewno" value="<?php echo $row['viewno']?>" class="form-control">
				</div>

				<div class="form-group">
				<label for="userid">Userid</label>
				<?php 
						include_once "views/user/combobox.php";
				?>
				</div>
				<div class="form-group">
					<label for="categoryid">Thể loại nhạc</label>
					<?php 
						include_once "views/category/combobox.php";
					?>
				</div>	
				
				<div>
					<button class="btn btn-primary"> Lưu </button>
				</div>
			</div>
	</form>
</div>
</div>