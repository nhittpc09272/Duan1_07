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

			<link href="/public/assets/client/css/bootstrap.min.css" rel="stylesheet">
			<link href="/public/assets/client/css/main.css" rel="stylesheet">
			<link rel="stylesheet" href="/public/assets/client/css/linearicons.css">
			<link rel="stylesheet" href="/public/assets/client/css/font-awesome.min.css">
			<link rel="stylesheet" href="/public/assets/client/css/font-awesome.min.css">
			<link rel="stylesheet" href="/public/assets/client/css/themify-icons.css">
			<link rel="stylesheet" href="/public/assets/client/css/bootstrap.css">
			<link rel="stylesheet" href="/public/assets/client/css/owl.carousel.css">
			<link rel="stylesheet" href="/public/assets/client/css/nice-select.css">
			<link rel="stylesheet" href="/public/assets/client/css/nouislider.min.css">
			<link rel="stylesheet" href="/public/assets/client/css/ion.rangeSlider.css" />
			<link rel="stylesheet" href="/public/assets/client/css/ion.rangeSlider.skinFlat.css" />
			<link rel="stylesheet" href="/public/assets/client/css/magnific-popup.css">
		</head>
		<style>
			.contact_form {
				background: #ffffff;
				padding: 30px;
				border-radius: 8px;
				box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
				border-radius: 8px;
				border-color: black;
			}

			.contact_form h3 {
				margin-bottom: 20px;
				color: #333;
				font-weight: bold;
			}

			#mapBox {
				height: 400px;
				width: 100%;
				border: 1px solid #ddd;
				border-radius: 8px;
				margin-top: 20px;
			}

			.btn-primary {
				background-color: #007bff;
				border-color: #007bff;
				padding: 10px 20px;
				border-radius: 5px;
			}

			.btn-primary:hover {
				background-color: #0056b3;
				border-color: #0056b3;
			}
		</style>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		</head>

		<body>
			<section class="contact_area">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="contact_form">
								<h3>Liên hệ với chúng tôi</h3>
								<form method="post" action="/contact/send-email" id="contactForm">
									<div class="form-group">
										<label for="name">Tên của bạn</label>
										<input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên của bạn">
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn">
									</div>
									<div class="form-group">
										<label for="subject">Tiêu đề</label>
										<input type="text" class="form-control" id="subject" name="subject" placeholder="Nhập tiêu đề">
									</div>
									<div class="form-group">
										<label for="message">Nội dung</label>
										<textarea class="form-control" id="message" name="message" rows="5" placeholder="Nhập nội dung tin nhắn"></textarea>
									</div>
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Gửi</button>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-6">
							<h3 class="text-center">Vị trí của chúng tôi</h3>
							<div id="mapBox">
								<iframe
									src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.3475094294713!2d105.43060097416704!3d10.376528292563024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310ac6e2b2cf6d6f%3A0x17beff170d8b76e6!2zRMawxqFuZyBUaMOocA!5e0!3m2!1svi!2s!4v1696600548759!5m2!1svi!2s"
									width="100%"
									height="400"
									style="border:0;"
									allowfullscreen=""
									loading="lazy">
								</iframe>
							</div>
						</div>
					</div>
				</div>
			</section>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		</body>

		</html>
<?php

	}
}
?>