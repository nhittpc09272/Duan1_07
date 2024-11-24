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
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<style>
				.contact_form_area {
					padding: 20px;
					background: #f9f9f9;
					border-radius: 8px;
					box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
				}

				#mapBox {
					border: 1px solid #ddd;
					border-radius: 8px;
					margin-top: 20px;
				}
			</style>

		</head>

		<body>
			<!--================Contact Area =================-->
			<section class="contact_area section_gap_bottom">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="contact_form_area">
								<h3>Liên hệ với chúng tôi</h3>
								<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="form-group col-md-6">
										<input type="text" class="form-control" id="name" name="name" placeholder="Tên của bạn" required>
									</div>
									<div class="form-group col-md-6">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email của bạn" required>
									</div>
									<div class="form-group col-md-12">
										<input type="text" class="form-control" id="subject" name="subject" placeholder="Tiêu đề" required>
									</div>
									<div class="form-group col-md-12">
										<textarea class="form-control" id="message" name="message" rows="4" placeholder="Nội dung" required></textarea>
									</div>
									<div class="form-group col-md-12 text-right">
										<button type="submit" class="btn btn-primary">Gửi</button>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-6">
							<h3>Vị trí của chúng tôi</h3>
							<div id="mapBox" class="mapBox" style="height: 400px; width: 100%;"></div>
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
			<script>
				document.addEventListener("DOMContentLoaded", function() {
					const form = document.getElementById("contactForm");

					form.addEventListener("submit", function(event) {
						event.preventDefault(); // Ngăn form gửi đi để kiểm tra

						const name = document.getElementById("name").value.trim();
						const email = document.getElementById("email").value.trim();
						const subject = document.getElementById("subject").value.trim();
						const message = document.getElementById("message").value.trim();

						if (!name || !email || !subject || !message) {
							Swal.fire({
								icon: 'error',
								title: 'Lỗi nhập liệu!',
								text: 'Vui lòng điền đầy đủ tất cả các trường.',
								confirmButtonText: 'OK'
							});
						} else {
							Swal.fire({
								icon: 'success',
								title: 'Gửi thành công!',
								text: 'Thông tin của bạn đã được gửi.',
								confirmButtonText: 'OK'
							}).then(() => {
								form.submit(); // Gửi form sau khi thông báo thành công
							});
						}
					});
				});
			</script>
			<script>
				function initMap() {
					const location = {
						lat: 10.376528,
						lng: 105.432789
					}; // Tọa độ Đồng Tháp
					const map = new google.maps.Map(document.getElementById("mapBox"), {
						zoom: 15,
						center: location,
					});
					new google.maps.Marker({
						position: location,
						map: map,
						title: "Văn phòng của chúng tôi",
					});
				}
			</script>
			<script async defer
				src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
			</script>

		</body>

		</html>
<?php

	}
}
?>