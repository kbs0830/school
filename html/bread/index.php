<?php
include 'includes/db.php';
include 'includes/header.php';

// 顯示最新消息
$sql = "SELECT * FROM news ORDER BY date DESC LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>最新消息 - Bread</title>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">
        <main>
            <h1 class="mb-4">最新消息</h1>
            <div class="row">
                <?php
                // 顯示資料庫中的最新消息
                while($row = $result->fetch_assoc()):
                    $imagePath = 'images/' . htmlspecialchars($row['image']);
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['title']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($row['date']); ?></small></p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsModal" data-title="<?php echo htmlspecialchars($row['title']); ?>" data-description="<?php echo htmlspecialchars($row['description']); ?>" data-image="<?php echo htmlspecialchars($row['image']); ?>" data-date="<?php echo htmlspecialchars($row['date']); ?>">
                                    了解更多
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- 以下是靜態的最新消息資料 -->
            <h2 class="mt-5">其他最新消息</h2>
            <div class="row">
                <?php
                // 靜態最新消息資料
                $newsData = [
                    [
                        'title' => '板橋大遠百營業至2024/7/31止',
                        'description' => '板橋大遠百店營業至2024/7/31止 百貨內部即將改裝,櫃位面積縮減 為維護香帥服務品質,故不再續約',
                        'datetime' => '2024-08-09',
                        'image' => '遠百搬遷-1-72x54.jpg',
                        'url' => '/'
                    ],
                    [
                        'title' => '2024/5/15起門市營業時間異動公告',
                        'description' => '2024年5月15日起門市營業時間異動公告',
                        'datetime' => '2024-08-08',
                        'image' => '門市營業公告-72x54.jpg',
                        'url' => '/'
                    ],
                    [
                        'title' => '4/18日起誠品站前門市新址',
                        'description' => '誠品站前門市即將搬新家 ! 2022/4/18日起，誠品站前店將於台北車站B1(M8出口斜對面)繼續為您服務 !  ',
                        'datetime' => '2024-08-07',
                        'image' => '2020414-誠品遷移啟事(M8出口對面)-百貨門市POP、官網最新消息-21x29.7cm-72x54.jpg',
                        'url' => '/'
                    ],
                    [
                        'title' => '2023母親節活動',
                        'description' => '母親節蛋糕送禮最佳選擇，母親節蛋糕首選，用料新鮮實在的香帥母親節蛋糕，用心堅持四十年的好味道！招牌經典芋泥卷、紅 ',
                        'datetime' => '2024-08-06',
                        'image' => '2023banner-72x54.jpg',
                        'url' => '/'
                    ],
                    [
                        'title' => '2022 黑貓宅急便通知11/10~11/20 無法指',
                        'description' => '',
                        'datetime' => '2024-08-05',
                        'image' => 'IMG_5766-72x54.jpg',
                        'url' => '/'
                    ],
                    [
                        'title' => '2018行政院環保署最新規定',
                        'description' => '【2018行政院環保署】 即日起本場所將不免費提供購物用塑膠袋 如有不便之處，敬請見諒！ 更多詳情資訊，請參考 行政院環',
                        'datetime' => '2024-08-04',
                        'image' => '1-4_120-72x54.jpg',
                        'url' => '/'
                    ],
                ];

                foreach ($newsData as $news):
                    $imagePath = 'images/' . htmlspecialchars($news['image']);
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($news['title']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($news['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($news['description']); ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($news['datetime']); ?></small></p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsModal" data-title="<?php echo htmlspecialchars($news['title']); ?>" data-description="<?php echo htmlspecialchars($news['description']); ?>" data-image="<?php echo htmlspecialchars($news['image']); ?>" data-date="<?php echo htmlspecialchars($news['datetime']); ?>">
                                    了解更多
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <!-- 模態框 -->
    <div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="newsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newsModalLabel">最新消息</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" class="img-fluid mb-3" alt="News Image">
                    <h5 id="modalTitle"></h5>
                    <p id="modalDescription"></p>
                    <p><small class="text-muted" id="modalDate"></small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 引入 Bootstrap JS 和依賴的 Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // 使用 JavaScript 處理模態框資料
        $('#newsModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // 按鈕
            var title = button.data('title'); // 取得資料
            var description = button.data('description');
            var image = button.data('image');
            var date = button.data('date');

            var modal = $(this);
            modal.find('.modal-title').text(title);
            modal.find('#modalDescription').text(description);
            modal.find('#modalDate').text(date);
            modal.find('#modalImage').attr('src', 'images/' + image);
        });
    </script>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
