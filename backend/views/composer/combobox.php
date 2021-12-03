<select name="composerid" id="composerid" class="form-control">
	<option value="0">----- Chọn nhạc sĩ  ------</option>
	<?php 
		foreach ($composers as $co) 
		{
			if(isset($row["composerid"]))
			{
				if($row["composerid"]==$co["composerid"])
				{
					echo "<option value='".$co["composerid"]."' selected>".$co["composername"]."</option>";
				}else
				{
					echo "<option value='".$co["composerid"]."'>".$co["composername"]."</option>";
				}
			}else
				{
					echo "<option value='".$co["composerid"]."'>".$co["composername"]."</option>";
				}

			
		}
	?>
</select>
