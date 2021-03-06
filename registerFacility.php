<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
	header("signinPage.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="CSS/bootstrap.css">    <!-- All pages -->
	<link rel="stylesheet" href="CSS/dashboard.css">    <!-- For pages that uses side navbar -->
	<link rel="stylesheet" href="CSS/master.css">   <!-- All pages  -->
    <style>
        .container
        {
            background-color: #ffffff;
            border: solid 1px;
            border-color: rgba(0, 0, 0, 0.1);
            padding: 50px;
            border-radius: 10px;
        }

        .container-2
        {
            margin-top: 50px;
        }
    </style>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="JavaScript/jquery-3.5.1.min.js" crossorigin="anonymous"></script> <!-- Required by Bootstrap 4 -->
	<script src="JavaScript/popper.min.js" crossorigin="anonymous"></script> <!-- Required by Bootstrap 4 -->
	<script src="JavaScript/bootstrap.bundle.js" crossorigin="anonymous"></script> <!-- Required by Bootstrap 4 -->
	<script src="JavaScript/sweetalert2.all.min.js" crossorigin="anonymous"></script> <!-- SweetAlert2 js -->
	<script src="https://kit.fontawesome.com/fea17f5e62.js" crossorigin="anonymous"></script> <!-- Icon CDN -->

	<title>Add Facility - Marina BookIt</title>
</head>
<body>
<div class="flex-container naviBar sticky-top" style="padding: 10px">
    <div>
        <img src="img/logo.png" id="logo">
    </div><?php
	if ($_SESSION['userType'] == 1) //Admin
	{
		echo '
            <div class="dropdown d1">
                <button class="btn btn-outline-dark" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align: left">
                    Add Facility <span class="fas fa-angle-down" style="right: -47px; position: relative;"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="Dashboard.php">Home</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Booking Management</h6>    
                        <a class="dropdown-item" href="listOfBooking.php">List of booking</a>
                    <div class="dropdown-divider"></div>
                    
                    <h6 class="dropdown-header">Staff Management</h6>
                        <a class="dropdown-item" href="listOfStaff.php">List of staff</a>
                        <a class="dropdown-item" href="registerStaff.php">Register staff</a>
                    <div class="dropdown-divider"></div>
                    
                    <h6 class="dropdown-header">Facility Management</h6>
                        <a class="dropdown-item" href="listOfFacility.php">List of facility</a>
                        <a class="dropdown-item active" href="registerFacility.php">Add facility</a>
                </div>
            </div>
        ';
	}

    elseif ($_SESSION['userType'] == 2) //Staff
	{
		echo '
            <div class="dropdown d1">
                <button class="btn btn-outline-dark" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu <span class="fas fa-angle-down"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Booking Management</a>
                    <a class="dropdown-item" href="#">Booking Management</a>
                    <a class="dropdown-item" href="#">Booking Management</a>
                </div>
            </div>
        ';
	}

    elseif ($_SESSION['userType'] == 3) //Member
	{
		echo '
            <div class="dropdown d1">
                <button class="btn btn-outline-dark" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu <i class="fas fa-angle-down"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Booking Management</a>
                    <a class="dropdown-item" href="#">Booking Management</a>
                    <a class="dropdown-item" href="#">Booking Management</a>
                </div>
            </div>
        ';
	}

	?>

    <div class="dropdown">
        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<?php echo $_SESSION['userName'] ?>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="ProfileUser.php">View profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="Handler/signoutHandler.php">Sign out</a>

        </div>
    </div>
</div>

<div class="container-2">
    <div class="container">

        <div class="row">
            <div class="col text-center">
                <h3>Add Facility</h3>
                <p>Add new rooms or facility of the complex</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-3"></div>

            <div class="col-6">
                <form class="form-group" method="post" action="Handler/facilityHandler.php">
                    <div class="form-group">
                        <label for="facilityName">NAME</label>
                        <input class="form-control" type="text" name="facilityName" id="facilityName">
                    </div>

                    <div class="form-group">
                        <label for="facilityCapacity">CAPACITY</label>
                        <input class="form-control" type="text" name="facilityCapacity" id="facilityCapacity">
                    </div>

                    <div class="form-group">
                        <label for="facilityRate">RENTAL RATE PER DAY</label>
                        <input class="form-control" type="text" name="facilityRate" id="facilityRate">
                    </div>

                    <div class="form-group">
                        <label for="facilityDescription">DESCRIPTION</label>
                        <textarea class="form-control" type="text" name="facilityDescription" id="facilityDescription" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="facilityAmenities">TYPE</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="facilityType" value="Formal" id="radio1">
                            <label class="form-check-label" for="radio1">Formal</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="facilityType" value="Sports" id="radio2">
                            <label class="form-check-label" for="radio2">Sports</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="facilityAmenities">AMENITIES</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilityAmenities[]" value="Pool" id="checkBox1">
                            <label class="form-check-label" for="checkBox1">Pool</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilityAmenities[]" value="Seat" id="checkBox2">
                            <label class="form-check-label" for="checkBox2">Seats</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilityAmenities[]" value="Table" id="checkBox3">
                            <label class="form-check-label" for="checkBox3">Tables</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilityAmenities[]" value="PA" id="checkBox4">
                            <label class="form-check-label" for="checkBox4">PA System</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilityAmenities[]" value="Aircond" id="checkBox5">
                            <label class="form-check-label" for="checkBox5">Air Conditioning</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark" name="facilitySubmitBtn" style="float: right">Save</button>
                </form>
            </div>

            <div class="col-3"></div>
        </div>
    </div>
</div>
<!-- Local JavaScript -->
<script>
    let url = new URL(window.location.href);
    let searchParams = new URLSearchParams(url.search);
    var msg = searchParams.get('msg');
    if(msg === 'insert')
    {
        Swal.fire
        (
            'Registered',
            'New facility has been added.',
            'success'
        )
    }
<!-- Optional CDN -->

</body>
</html>
