<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	<div class="menu">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mt-5">
					<a id="all_student" href="" class="btn btn-primary btn-sm">All Student</a>
					<a id="add_student" href="" class="btn btn-primary btn-sm">Add New Student</a>
				</div>
			</div>
		</div>
	</div>

<div class="app">

</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>


	allData();

	function allData(){
		$.ajax({
	url: 'ajax_template/all_students.php',
	success: function(data){
		$('#all_data').html(data);
			}

		});
	}

	$('#add_student').click(function(e){
		e.preventDefault();
		$.ajax({
			url:'create.php',
			success: function(data){
				$('.app').html(data);
			}
		});

	});

	$(document).on('click', '#profile', function(e){
		e.preventDefault();
		let id =$(this).attr('profile_id');
		$.ajax({
			method: 'POST',
			data: {
				id: id
			},
			url: 'profile.php',
			success: function(data){
				$('.app').html(data);
				allData();
			}

		});

	});


	$(document).on('click', '#back', function(e){
		e.preventDefault();
		$.ajax({
			url: 'data.php',
			success: function(data){
				$('.app').html(data);
				allData();
			}


		});


	});

	$('#all_student').click(function(e){
		e.preventDefault();
		$.ajax({
			url: 'data.php',
			success: function(data){
				$('.app').html(data);
				allData();
			}
		});

	});

	$.ajax({
			url: 'data.php',
			success: function(data){
				$('.app').html(data);
			}
		});

		$(document).on('submit', '#student_form', function(e){
			e.preventDefault();
			$.ajax({
				url: 'ajax_template/ajax.php',
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data){
					swal({
						title: 'Student Added',
						text: 'Successfully',
						icon: 'success'
					});

					$('#student_form')['0'].reset();

				}
			});

		});

		/**
		 * Edit Form for view
		 */
		
		$(document).on('click', '#update_student', function(e){
		e.preventDefault();
		let id =$(this).attr('update_id');
		$.ajax({
			method: 'POST',
			data: {
				id: id,
			},
			url: 'edit.php',
			success: function(data){
				$('.app').html(data);
				
			}

		});

	});

		/**
		 * Edit Form for update
		 */

	$(document).on('submit', '#student_update', function(e){
			e.preventDefault();
			$.ajax({
				url: 'ajax_template/edit.php',
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data){

					swal({
						title: 'Student Added',
						text: 'Successfully',
						icon: 'success'
					});

					$('#student_update')['0'].reset();

				}
			});

		});


		/**
		 * Edit End
		 */

		$(document).on('click', 'a.delete_btn', function(e){
			e.preventDefault();
			
			let id = $(this).attr('delete_id');

			swal({
				title: 'Are you Sure?',
				text: 'Want to Delete Student Data',
				icon: 'warning',
				buttons: true,
				dangerMode: true
			})
			.then((confirmation)=>{

				if(confirmation){

					$.ajax({
				url: 'ajax_template/delete.php',
				method: "POST",
				data: {
					id: id
				},
				success: function(data){
					
					swal('done', 'ID Deleted Successfully !', 'success');
					allData();
				}

			})
				}else{
					swal('Safe', 'Your Data is Safe', 'success');
				}

			});


		});

	</script>

</body>
</html>