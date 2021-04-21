<?php

$id = $_POST['id'];

$connection = new mysqli('localhost', 'root', '', 'ajax');

$data = $connection->query("SELECT * FROM students WHERE id='$id' ");

$student_profile = $data->fetch_object();


?>

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>User Profile: <?php echo $student_profile->name?> </h2>
				<img style="width:300px;" src="photos/<?php echo $student_profile->photo?>" alt="">
				<h1><?php echo $student_profile->name?></h1>
				<h3><?php echo $student_profile->cell?></h3>

				<table class="table">
					<tr>
						<td>Email</td>
						<td><?php echo $student_profile->email?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><?php echo $student_profile->username?></td>
					</tr>
					<tr>
						<td>Cell</td>
						<td><?php echo $student_profile->cell?></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>Name</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>Name</td>
					</tr>
				</table>
						<a id="back" class="btn btn-sm btn-primary" href="#">Back</a>
			</div> 
		</div>
	</div>
	