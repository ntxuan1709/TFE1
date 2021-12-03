<select name="categoryid" id="categoryid" class="form-control">
	<option value="0">----- Chọn loại thể loại  ------</option>
	<?php 
		foreach ($categories as $ca) 
		{
			if(isset($row["categoryid"]))
			{
				if($row["categoryid"]==$ca["categoryid"])
				{
					echo "<option value='".$ca["categoryid"]."' selected>".$ca["categoryname"]."</option>";
				}else
				{
					echo "<option value='".$ca["categoryid"]."'>".$ca["categoryname"]."</option>";
				}
			}else
				{
					echo "<option value='".$ca["categoryid"]."'>".$ca["categoryname"]."</option>";
				}

			
		}
	?>
</select>
