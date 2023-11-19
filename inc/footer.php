<!--include the spesific css file-->
<style>
	<?php
	include('css/footer.css');
	?>
</style>



<!--title and description-->
<div class="container-fluid  mt-5">
 	<div class="row">
 		<div class="col-lg-5 p-4">
 			<h3 class="h-font fw-bold fs-3 mb-2">SCHOOL ROOM BOOKING SYSTEMS</h3>
 			<p><br>
				A platform that simplifies the process of reserving and managing rooms or spaces within a school or educational institution. 
				It allows users to schedule, book, and coordinate the use of various rooms such as classrooms, lecture halls, meeting rooms, libraries, or other facilities.
			</p>
 		</div>

		<!--link-->
 		<div class="col-lg-3 p-4">
 			<h5 class="mb-3">LINKS</h5>
 			<a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
 			<a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
 			<a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About Us</a><br>
			<a href="user/userindex.php" class="d-inline-block mb-2 text-dark text-decoration-none">User Dashboard</a><br>
			<a href="admin/index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Admin Dashboard</a>
 		</div>

		<!--website-->
 		<div class="col-lg-3 p-4">
		 <h5 class="mb-3">VISIT</h5>
 			<a href="https://www.facebook.com/people/Sek-Keb-Pengkalan-Tentera-Darat/100066372350466/" class="d-inline-block text-dark text-decoration-none mb-2">
 				<i class="bi bi-facebook me-1"></i> facebook
 			</a><br> 
 			<a href="https://www.instagram.com/skptdrasmi/" class="d-inline-block text-dark text-decoration-none">
 				<i class="bi bi-instagram me-1"></i> Instagram
 			</a><br>  
 		</div>
 	</div>
 </div>

<!--other footer collum-->
<h6 class="text-center bg-dark text-white p-3 m-0">Design and Developed by NUR NADRAH HAYATI BINTI MOHD HISHAM</h6>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>



<!--js-->
<script>
	function setActive()
	{
		navbar = document.getElementById('dashboard-menu');
		let a_tags = navbar.getElementByTagName('a');

		for(1=0;1<a_tags.length;i++){
			let file = a_tags[i].herf.split('/').pop();
			let file_name = file.split('.')[0];

			if(document.location.herf.indexOf(file_name)>=0){
				a_tags[i].classList.add('active');
			}

		}
	}
</script>