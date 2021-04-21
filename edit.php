<?php

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $connection = new mysqli('localhost', 'root', '', 'ajax');
    
    $data = $connection->query("SELECT * FROM students WHERE id='$id' ");

    $student_info = $data->fetch_object();


}


?>
    
    
    <div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Add Student</h2>
				<form id="student_update" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php echo $student_info->name ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php echo $student_info->email ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php echo $student_info->cell ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control" value="<?php echo $student_info->username ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="" type="file">
						<input name="update_id" value="<?php echo $id ?>" class="" type="hidden">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Add Student">
					</div>
				</form>
			</div>
		</div>
	</div>
