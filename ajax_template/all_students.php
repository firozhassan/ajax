<?php 


$connection = new mysqli('localhost', 'root', '', 'ajax');

$data = $connection->query("SELECT * FROM students");

$y = 1;
while($student = $data->fetch_object()) :


            ?>
						<tr>
							<td><?php echo $y; $y++; ?></td>
							<td><?php echo $student->name?></td>
							<td><?php echo $student->email?></td>
							<td><?php echo $student->cell?></td>
							<td><?php echo $student->username?></td>
							<td><img src="photos/<?php echo $student->photo?>" alt=""></td>
							<td>
								<a id="profile" profile_id="<?php echo $student->id?>" class="btn btn-sm btn-info" href="#">View</a>
								<a id="update_student" update_id="<?php echo $student->id?>" class="btn btn-sm btn-warning" href="#">Edit</a>
								<a delete_id="<?php echo $student->id?>" class="btn btn-sm btn-danger delete_btn" href="#">Delete</a>
							</td>
						</tr>
            <?php



endwhile;


?>



