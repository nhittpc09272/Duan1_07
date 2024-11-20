<?php

namespace App\Views\Client\Pages\Contacts;

use App\Views\BaseView;

class Contact extends BaseView
{
    public static function render($data = null)
    {
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/fav.png">
	<meta name="author" content="CodePixar">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title> </title>

	<link rel="stylesheet" href="/public/assets/client/css/linearicons.css">
	<link rel="stylesheet" href="/public/assets/client/css/owl.carousel.css">
	<link rel="stylesheet" href="/public/assets/client/css/themify-icons.css">
	<link rel="stylesheet" href="/public/assets/client/css/font-awesome.min.css">
	<link rel="stylesheet" href="/public/assets/client/css/nice-select.css">
	<link rel="stylesheet" href="/public/assets/client/css/nouislider.min.css">
	<link rel="stylesheet" href="/public/assets/client/css/bootstrap.css">
	<link rel="stylesheet" href="/public/assets/client/css/main.css">
    <link rel="stylesheet" href="/App/Views/Client/Layouts/Header.php">
</head>

<body>
	<!--================Contact Area =================-->
	<section class="contact_area section_gap_bottom">
		<div class="container">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15717.681978491186!2d105.7391729871582!3d9.982081500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1732118700915!5m2!1svi!2s" 
			width="1300" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div class="row">
				<div class="col-lg-3">
					<div class="contact_info">
						<div class="info_item">
							<i class="lnr lnr-home"></i>
							<h6>Địa chỉ</h6>
						</div>
						<div class="info_item">
							<i class="lnr lnr-phone-handset"></i>
							<h6><a href="#">Số điện thoại</a></h6>
						</div>
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<h6><a href="#">Email</a></h6>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'name'">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button type="submit" value="submit" class="primary-btn">Gửi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
    <link rel="stylesheet" href="/App/Views/Client/Layouts/Footer.php">
	<div id="success" class="modal modal-message fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-close"></i>
					</button>
					<h2>Thank you</h2>
					<p>Your message is successfully sent...</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Modals error -->

	<div id="error" class="modal modal-message fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-close"></i>
					</button>
					<h2>Sorry !</h2>
					<p> Something went wrong </p>
				</div>
			</div>
		</div>
	</div>
	<!--================End Contact Success and Error message Area =================-->


	<script src="/public/assets/client/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="/public/assets/client/js/vendor/bootstrap.min.js"></script>
	<script src="/public/assets/client/js/jquery.ajaxchimp.min.js"></script>
	<script src="/public/assets/client/js/jquery.nice-select.min.js"></script>
	<script src="/public/assets/client/js/jquery.sticky.js"></script>
	<script src="/public/assets/client/js/nouislider.min.js"></script>
	<script src="/public/assets/client/js/jquery.magnific-popup.min.js"></script>
	<script src="/public/assets/client/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="/public/assets/client/js/gmaps.min.js"></script>
	<script src="/public/assets/client/js/main.js"></script>
</body>

</html>
<?php

    }
}
?>
