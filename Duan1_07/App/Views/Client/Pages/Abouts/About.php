<?php
namespace App\Views\Client\Pages\Abouts;

use App\Views\BaseView;

class About extends BaseView
{
    public static function render($data = null)
    {
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu về 5TV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Giữ lại style cũ và bổ sung */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/public/assets/client/img/aboutus.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 150px 20px;
        }

        .team-member {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .milestone {
            background-color: #f8f9fa;
            padding: 50px 0;
            text-align: center;
        }

        .milestone-item {
            margin: 20px 0;
        }

        .milestone-item i {
            font-size: 3rem;
            color: #007bff;
            margin-bottom: 15px;
        }

        .milestone-item h3 {
            font-weight: bold;
            color: #333;
        }

        .mission-vision {
            background-color: #ffffff;
            padding: 50px 0;
        }

        .mission-vision-item {
            background-color: #f4f4f4;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
    </style>
</head>
<body>

<!-- Hero Section -->
<div class="hero">
    <div class="container">
        <h2 class="display-4">Câu chuyện 5TV</h2>
        <p class="lead">Khát vọng kiến tạo giá trị và phong cách sống mới</p>
    </div>
</div>

<div class="container">
    <!-- About Us Section -->
    <section class="about-us my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Về 5TV</h2>
                <p>5TV ra đời với sứ mệnh mang đến những sản phẩm chất lượng, hiện đại và phù hợp với mọi đối tượng. Chúng tôi không chỉ là một thương hiệu, mà còn là người đồng hành trong hành trình khẳng định phong cách của bạn.</p>
            </div>
            <div class="col-md-6">
                <img src="/public/assets/client/img/shoes.jpg" alt="5TV Story" class="img-fluid rounded">
            </div>
        </div>
    </section>

    <!-- Milestone Section -->
    <section class="milestone">
        <div class="container">
            <div class="row">
                <div class="col-md-4 milestone-item">
                    <i class="fas fa-users"></i>
                    <h3>5000+</h3>
                    <p>Khách hàng tin tưởng</p>
                </div>
                <div class="col-md-4 milestone-item">
                    <i class="fas fa-shopping-bag"></i>
                    <h3>10000+</h3>
                    <p>Sản phẩm đã bán</p>
                </div>
                <div class="col-md-4 milestone-item">
                    <i class="fas fa-globe"></i>
                    <h3>3+</h3>
                    <p>Năm kinh nghiệm</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="mission-vision">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mission-vision-item">
                    <h3>Sứ mệnh</h3>
                    <p>Mang đến những sản phẩm chất lượng, góp phần nâng cao trải nghiệm và phong cách sống của khách hàng.</p>
                </div>
                <div class="col-md-6 mission-vision-item">
                    <h3>Tầm nhìn</h3>
                    <p>Trở thành thương hiệu hàng đầu trong lĩnh vực thời trang, được yêu mến bởi chất lượng và dịch vụ.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team my-5">
        <div class="container">
            <h2 class="text-center mb-4">Đội ngũ của chúng tôi</h2>
            <div class="row">
                <?php 
                $team = [
                    ['name' => 'Thạch Thị Nhi', 'code' => 'PC09272', 'avatar' => 'https://via.placeholder.com/150'],
                    ['name' => 'Nguyễn Quốc Anh', 'code' => 'PC09326', 'avatar' => 'https://via.placeholder.com/150'],
                    ['name' => 'Nguyễn Trung Nhựt', 'code' => 'PC09449', 'avatar' => 'https://via.placeholder.com/150'],
                    ['name' => 'Nguyễn Văn Quí', 'code' => 'PC09563', 'avatar' => 'https://via.placeholder.com/150'],
                    ['name' => 'Phan Ngọc Thanh Trúc', 'code' => 'PC09380', 'avatar' => 'https://via.placeholder.com/150']
                ];

                foreach ($team as $member): ?>
                    <div class="col-md-4 mb-4">
                        <div class="team-member text-center p-3 rounded">
                            <img src="<?= $member['avatar'] ?>" alt="<?= $member['name'] ?>" class="rounded-circle mb-3" width="150" height="150">
                            <h4><?= $member['name'] ?></h4>
                            <p class="text-muted"><?= $member['code'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min .js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    }
}
?>