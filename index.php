<?php
include "header.php";
include $_SERVER['DOCUMENT_ROOT'] . '/database/main.php';
?>

    <div class="container">
        <?php foreach ($newsArray as $news): ?>
            <div class="card">
                <div class="card__body">
                    <span class="tag tag-red">Technology</span>
                    <h4><?php echo htmlspecialchars($news['title']);?></h4>
                    <p><?php echo htmlspecialchars(getFirstSentence($news['content'])); ?></p>
                </div>
                <div class="card__footer">
                    <div class="user">
                        <div class="user__info">
                            <small><?php echo htmlspecialchars($news['publication_date']); ?></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="container">
        <a href="news.php" class="index-button">Все новости</a>
        <a href="feedback_form.php" class="index-button">Обратная связь</a>
    </div>

<?php
include "footer.php";
?>