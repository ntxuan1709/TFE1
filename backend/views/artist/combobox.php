<select name="artistid" id="artistid" class="form-control">
	<option value="0">----- Chọn loại ca sĩ  ------</option>
	<?php 
		foreach ($artists as $ar) 
		{
			if(isset($row["artistid"]))
			{
				if($row["artistid"]==$ar["artistid"])
				{
					echo "<option value='".$ar["artistid"]."' selected>".$ar["singername"]."</option>";
				}else
				{
					echo "<option value='".$ar["artistid"]."'>".$ar["singername"]."</option>";
				}
			}else
				{
					echo "<option value='".$ar["artistid"]."'>".$ar["singername"]."</option>";
				}

			
		}
	?>
</select>
