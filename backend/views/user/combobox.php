<select name="userid" class="form-control" id="userid">
	<option value="0">-----Chọn người dùng-----</option>
	<?php 
		foreach ($users as $us) 
		{
			if(isset($row['userid']))
			{
				if($row['userid']==$us['userid'])
				{
					echo "<option value='".$us['userid']."' selected >".$us['username']."</option>";
				}else
				{
					echo "<option value='".$us['userid']."'>".$us['username']."</option>";
				}
			}
			else
			{
				echo "<option value='".$us['userid']."'>".$us['username']."</option>";
			}
		}
	?>
</select>