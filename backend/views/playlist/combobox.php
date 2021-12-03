<select name="playlistid" id="playlistid" class="form-control">
	<option value="0">----- Chọn loại nhạc  ------</option>
	<?php 
		foreach ($playlists as $pl) 
		{
			if(isset($row["playlistid"]))
			{
				if($row["playlistid"]==$pl["playlistid"])
				{
					echo "<option value='".$pl["playlistid"]."' selected>".$pl["playlistname"]."</option>";
				}else
				{
					echo "<option value='".$pl["playlistid"]."'>".$pl["playlistname"]."</option>";
				}
			}else
				{
					echo "<option value='".$pl["playlistid"]."'>".$pl["playlistname"]."</option>";
				}

			
		}
	?>
</select>
