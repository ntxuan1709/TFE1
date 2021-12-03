<div class='box'>
	<div class='box-header'>
		<h2 class='box-title'>Thêm mới TrackArtist</h2>
		<a class="btn btn-warning pull-right" href="?controller=<?php echo $_GET['controller'] ?>&act=showall">Quay lại</a>
	</div>
	<div class='box-body'>

		<form action="?controller=<?php echo $_GET['controller'] ?>&act=insert" method="post">
			<div class="col-md-7">

				<div class="form-group">
					<label for="artistid">Ca sĩ</label>
					<?php 
					include_once "views/artist/combobox.php";
					?>
				</div>
				<div class="form-group">
					<label for="trackid">Nhạc</label>
					<?php 
					include_once "views/track/comboboxTrackArtist.php";
					?>
				</div>	
				<div>
					<button class="btn btn-primary"> Lưu </button>
				</div>
			</div>

		</form>
	</div>
</div>