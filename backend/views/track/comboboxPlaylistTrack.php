<select name="trackid" id="trackid" class="form-control">
	<option value="0">----- Chọn bài hát  ------</option>
	<?php 
		foreach ($tracks as $tr) 
		{
			if(isset($row["trackid"]))
			{
				if($row["trackid"]==$tr["trackid"])
				{
					echo "<option value='".$tr["trackid"]."' selected>".$tr["trackname"]."</option>";
				}else
				{
					echo "<option value='".$tr["trackid"]."'>".$tr["trackname"]."</option>";
				}
			}else
				{
					echo "<option value='".$tr["trackid"]."'>".$tr["trackname"]."</option>";
				}

			
		}
	?>
</select>
