<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu Hỏi Thường Gặp</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Câu Hỏi Thường Gặp về Laptop</h1>

        <div class="accordion" id="faqAccordion">

            <!-- Câu hỏi 1 -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Làm thế nào để chọn một laptop phù hợp với nhu cầu của tôi?
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Để chọn laptop phù hợp, bạn cần xác định mục đích sử dụng (ví dụ: làm việc văn phòng, đồ họa, gaming), ngân sách, yêu cầu về cấu hình và trọng lượng.
                    </div>
                </div>
            </div>

            <!-- Câu hỏi 2 -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Làm thế nào để kiểm tra cấu hình của một laptop?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        Bạn có thể kiểm tra cấu hình bằng cách vào "Cài đặt hệ thống" (Windows) hoặc "About This Mac" (MacOS). Thông tin về CPU, RAM, ổ cứng sẽ được hiển thị ở đây.
                    </div>
                </div>
            </div>

            <!-- Câu hỏi 3 -->
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Làm thế nào để bảo quản và bảo dưỡng laptop?
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Để bảo quản laptop, tránh tiếp xúc với nước, giữ laptop sạch sẽ, sử dụng túi chống sốc khi mang theo. Bảo dưỡng bằng cách làm sạch bụi và đảm bảo làm mát hệ thống.
                    </div>
                </div>
            </div>

            <!-- Câu hỏi 4 -->
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Làm thế nào để kiểm tra thông tin về bảo hành của laptop?
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                    <div class="card-body">
                        Bạn có thể kiểm tra thông tin về bảo hành trên trang web của nhà sản xuất hoặc liên hệ với đại lý cung cấp dịch vụ để biết thêm chi tiết.
                    </div>
                </div>
            </div>
            <!-- Câu hỏi 4 -->
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Làm thế nào để nâng cấp ổ cứng của laptop?
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                    <div class="card-body">
                        Để nâng cấp ổ cứng, bạn cần chọn ổ cứng tương thích với laptop, sao lưu dữ liệu quan trọng, thay thế ổ cứng cũ và cài đặt lại hệ điều hành.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Link to Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>