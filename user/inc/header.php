
<style>
    .navbar{
		background-color: #D770AD;
	}
    #dashboard-menu{
		position: fixed;
		height: 100%;
        background-color: #D770AD;
	}
</style>


<!--dashboard title and logout button-->
<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0 h-font">USER DASHBOARD</h3>
    <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>


    <!--left section navigation-->
    <div class="col-lg-2 border-top border-3 border-secondary" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2 text-light">USER PANEL</h4>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
            <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="userList.php">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="userinquriesform.php">Send Inquries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="userinquriesstatus.php">Inquries Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="userbookingform.php">Send Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="userbookingapproval.php">Booking Approval</a>
                        </li>
            </ul>
            </div>
            </div>
        </nav> 
    </div>
