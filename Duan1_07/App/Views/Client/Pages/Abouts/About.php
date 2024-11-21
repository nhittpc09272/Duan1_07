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
    <title>Giới thiệu về chúng tôi</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        header p {
            margin: 5px 0;
            font-size: 1.1rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        section {
            margin: 40px 0;
        }

        h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin: 10px 0;
        }

        /* ===== Hero Section ===== */
        .hero {
            background-image: url(/public/assets/client/img/aboutus.jpg)  no-repeat center center/cover;
            color: #fff;
            text-align: center;
            padding: 100px 20px;
        }
        .hero h2 {
            font-size: 2.5rem;
            margin: 0;
        }
        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        /* ===== About Us Section ===== */
        .about-us {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
        }
        .about-us img {
            max-width: 100%;
            border-radius: 8px;
        }
        .about-us .content {
            flex: 1;
        }

        /* ===== Team Section ===== */
        .team {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .team-member {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
            padding: 20px;
            width: calc(33% - 40px);
            margin: 10px;
        }
        .team-member img {
            max-width: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .team-member h4 {
            margin: 10px 0 5px;
        }
        .team-member p {
            font-size: 0.9rem;
            color: #555;
        }

    
    </style>
</head>
<body>



<!-- Hero Section -->
<div class="hero">
    <h2>Chúng tôi là ai?</h2>
    <p>Câu chuyện phía sau thương hiệu 5TV và cách chúng tôi phát triển để phục vụ khách hàng tốt nhất.</p>
</div>

<div class="container">

    <!-- About Us Section -->
    <section class="about-us">
        <div class="content">
            <h2>Về 5TV</h2>
            <p>5TV là một thương hiệu hàng đầu trong lĩnh vực thời trang, mang đến sự kết hợp hoàn hảo giữa chất lượng và phong cách. Với nhiều năm kinh nghiệm, chúng tôi tự hào phục vụ hàng nghìn khách hàng trên toàn quốc.</p>
            <p>Chúng tôi cam kết không ngừng cải tiến để cung cấp các sản phẩm hiện đại, tiện lợi và phù hợp với mọi đối tượng.</p>
        </div>
        <img src="/public/assets/client/img/shoes.jpg" alt="Hình ảnh về 5TV">
    </section>

    <!-- Team Section -->
    <section>
        <h2>Các thành viên</h2>
        <div class="team">
            <div class="team-member">
                <img src="https://via.placeholder.com/100" alt="Team Member">
                <h4>Thạch Thị Nhi</h4>
                <p>PC09272</p>
            </div>
            <div class="team-member">
                <img src="https://via.placeholder.com/100" alt="Team Member">
                <h4>Nguyễn Quốc Anh</h4>
                <p>PC09326</p>
            </div>
            <div class="team-member">
                <img src="https://via.placeholder.com/100" alt="Team Member">
                <h4>Nguyễn Trung Nhựt</h4>
                <p>PC09449</p>
            </div>
            <div class="team-member">
                <img src="https://via.placeholder.com/100" alt="Team Member">
                <h4>Nguyễn Văn Quí</h4>
                <p>PC09563</p>
            </div>
            <div class="team-member">
                <img src="https://via.placeholder.com/100" alt="Team Member">
                <h4>Phan Ngọc Thanh Trúc</h4>
                <p>PC09380</p>
            </div>
            
        </div>
    </section>

</div>



</body>
</html>


<?php
    }
}
?>
