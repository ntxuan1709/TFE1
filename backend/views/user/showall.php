<div class="box">
	<div class="box-header">
		<h2 class="box-title">Danh sách User</h2>
	</div>
	<div class="box-body">
		<table id="tabledata" class="table table-bordered">
			<thead>
				<tr>
					<th>Tên user</th>
					<th>Tên đầy đủ</th>
					<th>Hình ảnh</th>
					<th>Email</th>
					<th>Số điện thoại</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($listuser as $u) 
				{
					?>
					<tr>
						<td><?php echo $u['username'] ?></td>
						<td><?php echo $u['fullname'] ?></td>
						<td><?php echo $u['picture'] ?></td>
						<td><?php echo $u['email'] ?></td>
						<td><?php echo $u['phone'] ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
	
</div>