<?php
/**
 * Created by PhpStorm.
 * User: Lazaro
 * Date: 23/05/2015
 * Time: 04:41 PM
 */

foreach ($news as $news_item): ?>

    <h2><?php echo $news_item->id ?></h2>
    <div id="main">
        <?php echo $news_item->email ?>
    </div>
    <p><a href="news/<?php echo $news_item->email ?>">Email</a></p>

<?php endforeach ?>