<?php

namespace App\Views\Client\Pages\Contacts;

use App\Views\BaseView;

class Contact extends BaseView
{
	public static function render($data = null)
	{
		// Lấy dữ liệu form và lỗi từ session (nếu có)
		$errors = $_SESSION['contact_errors'] ?? [];
		$formData = $_SESSION['contact_data'] ?? [];

		// Xóa session sau khi lấy dữ liệu
		unset($_SESSION['contact_errors']);
		unset($_SESSION['contact_data']);
?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
 
		<!-- Kiểm tra và hiển thị thông báo -->
		<?php if (isset($_SESSION['notification'])): ?>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<script>
				Swal.fire({
					icon: '<?php echo $_SESSION['notification']['type']; ?>',
					title: '<?php echo $_SESSION['notification']['message']; ?>',
					showConfirmButton: false,
					timer: 1500
				});
			</script>
			<?php unset($_SESSION['notification']); // Xóa thông báo sau khi hiển thị 
			?>
		<?php endif; ?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

		<style>
			/* Giữ nguyên style cũ và thêm */
			.contact-info {
				background-color: #f4f4f4;
				padding: 30px;
				border-radius: 8px;
				margin-top: 20px;
			}

			.contact-info-item {
				margin-bottom: 20px;
				display: flex;
				align-items: center;
			}

			.contact-info-item i {
				font-size: 2rem;
				color: #007bff;
				margin-right: 15px;
			}

			.form-group.has-error .form-control {
				border-color: #dc3545;
			}

			.form-group .error-message {
				color: #dc3545;
				font-size: 0.875rem;
				margin-top: 0.25rem;
			}
		</style>

		<section class="contact_area">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="contact_form">
							<h3>Liên hệ với chúng tôi</h3>

							<!-- Hiển thị thông báo chung từ session -->
							<?php if (isset($_SESSION['notification'])): ?>
								<div class="alert alert-<?= $_SESSION['notification']['type'] ?> alert-dismissible fade show" role="alert">
									<?= $_SESSION['notification']['message'] ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php unset($_SESSION['notification']); ?>
							<?php endif; ?>

							<form method="post" action="/contact/send-email" id="contactForm">
								<div class="form-group <?= isset($errors['name']) ? 'has-error' : '' ?>">
									<label for="name">Tên của bạn</label>
									<input
										type="text"
										class="form-control"
										id="name"
										name="name"
										placeholder="Nhập tên của bạn"
										value="<?= htmlspecialchars($formData['name'] ?? '') ?>">
									<?php if (isset($errors['name'])): ?>
										<div class="error-message"><?= $errors['name'] ?></div>
									<?php endif; ?>
								</div>

								<div class="form-group <?= isset($errors['email']) ? 'has-error' : '' ?>">
									<label for="email">Email</label>
									<input
										type="email"
										class="form-control"
										id="email"
										name="email"
										placeholder="Nhập email của bạn"
										value="<?= htmlspecialchars($formData['email'] ?? '') ?>">
									<?php if (isset($errors['email'])): ?>
										<div class="error-message"><?= $errors['email'] ?></div>
									<?php endif; ?>
								</div>

								<div class="form-group <?= isset($errors['subject']) ? 'has-error' : '' ?>">
									<label for="subject">Tiêu đề</label>
									<input
										type="text"
										class="form-control"
										id="subject"
										name="subject"
										placeholder="Nhập tiêu đề"
										value="<?= htmlspecialchars($formData['subject'] ?? '') ?>">
									<?php if (isset($errors['subject'])): ?>
										<div class="error-message"><?= $errors['subject'] ?></div>
									<?php endif; ?>
								</div>

								<div class="form-group <?= isset($errors['message']) ? 'has-error' : '' ?>">
									<label for="message">Nội dung</label>
									<textarea
										class="form-control"
										id="message"
										name="message"
										rows="5"
										placeholder="Nhập nội dung tin nhắn"><?= htmlspecialchars($formData['message'] ?? '') ?></textarea>
									<?php if (isset($errors['message'])): ?>
										<div class="error-message"><?= $errors['message'] ?></div>
									<?php endif; ?>
								</div>

								<div class="text-right">
									<button type="submit" class="btn btn-primary">Gửi</button>
								</div>
							</form>
						</div>
					</div>

					<!-- Phần còn lại giữ nguyên -->
					<div class="col-lg-6">
						<!-- Map và contact info giữ nguyên như cũ -->
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

				<!-- Phần contact info giữ nguyên như cũ -->
				<div class="row mt-5">
					<div class="col-12">
						<div class="contact-info">
							<h4 class="text-center mb-4">Tại sao nên liên hệ với chúng tôi?</h4>
							<div class="row">
								<div class="col-md-4 contact-info-item">
									<i class="fas fa-headset"></i>
									<div>
										<h5>Hỗ trợ 24/7</h5>
										<p>Chúng tôi luôn sẵn sàng hỗ trợ bạn mọi lúc, mọi nơi.</p>
									</div>
								</div>
								<div class="col-md-4 contact-info-item">
									<i class="fas fa-shield-alt"></i>
									<div>
										<h5>Bảo mật thông tin</h5>
										<p>Mọi thông tin liên hệ đều được bảo mật tuyệt đối.</p>
									</div>
								</div>
								<div class="col-md-4 contact-info-item">
									<i class="fas fa-reply-all"></i>
									<div>
										<h5>Phản hồi nhanh chóng</h5>
										<p>Chúng tôi cam kết phản hồi trong vòng 24h.</p>
									</div>
								</div>
							</div>

							<div class="text-center mt-4">
								<h5>Các câu hỏi thường gặp</h5>
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-outline-primary mr-2">Thanh toán</button>
									<button type="button" class="btn btn-outline-primary mr-2">Vận chuyển</button>
									<button type="button" class="btn btn-outline-primary">Bảo hành</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper. js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
	}
}
?>