<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web Bán Laptop</title>
    <style>
        
        body {
            background-color: #f4f4f4;
        }

        .intro-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .intro-section h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .intro-section p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .intro-section img {
            width: 100%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .intro-section img:hover {
            transform: scale(1.1);
        }

        .features-section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .feature {
            flex: 1;
            max-width: 300px;
            padding: 20px;
            margin: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .feature h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .feature p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        .cta-section {
            text-align: center;
            margin-top: 30px;
        }

        .cta-button {
            font-size: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin: 5px;
            text-decoration: none;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="intro-section">
        <h1>Chào mừng đến với Trang Web Bán Laptop</h1>
        <p>Đắm mình trong thế giới công nghệ với những chiếc laptop đẳng cấp và hiện đại nhất.</p>
        <img src="upload/mac.jpg" alt="Laptop Image">
    </div>

    <div class="features-section">
        <div class="feature">
            <h2>Đa Dạng Sản Phẩm</h2>
            <p>Khám phá một loạt các laptop từ các thương hiệu hàng đầu trên thế giới.</p>
        </div>
        <div class="feature">
            <h2>Hiệu Suất Cao</h2>
            <p>Trải nghiệm hiệu suất vượt trội với các dòng laptop chạy trên các chip xử lý mạnh mẽ.</p>
        </div>
        <div class="feature">
            <h2>Thiết Kế Sang Trọng</h2>
            <p>Chọn lựa những chiếc laptop với thiết kế đẹp mắt, nhẹ nhàng và tiện ích.</p>
        </div>
    </div>

    <div class="cta-section">
        <a href="index.php" class="cta-button">Khám Phá Ngay</a>
    </div>
</body>

</html>
