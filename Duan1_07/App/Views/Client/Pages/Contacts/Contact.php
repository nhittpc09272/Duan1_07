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
			<meta charset="UTF-8">
			<title>Liên hệ</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
			<style>
				body {
					background-color: #f9f9f9;
				}

				.contact_area {
					padding: 50px 0;
				}

				.contact_form {
					background: #ffffff;
					padding: 30px;
					border-radius: 8px;
					box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
								<form id="contactForm">
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
										<button type="button" id="submitBtn" class="btn btn-primary">Gửi</button>
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
			<script>
				// Xử lý sự kiện khi người dùng nhấn nút gửi
				document.getElementById('submitBtn').addEventListener('click', function() {
					// Lấy giá trị từ các trường nhập liệu
					const name = document.getElementById('name').value.trim();
					const email = document.getElementById('email').value.trim();
					const subject = document.getElementById('subject').value.trim();
					const message = document.getElementById('message').value.trim();

					// Kiểm tra nếu có trường nào bị bỏ trống
					if (!name || !email || !subject || !message) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Vui lòng điền đầy đủ thông tin!',
						});
					} else {
						// Hiển thị thông báo thành công
						Swal.fire({
							icon: 'success',
							title: 'Gửi thành công!',
							text: 'Cảm ơn bạn đã liên hệ với chúng tôi!',
						});

						// Reset form
						document.getElementById('contactForm').reset();
					}
				});
			</script>
		</body>

		</html>

<?php

	}
}
?>