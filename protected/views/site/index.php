<div id="posts">
<?php foreach($posts as $post): ?>
    <div class="post">
        <h2><?php echo $post->title; ?></h2>
        <img src="http://24.media.tumblr.com/3e77a90609b0e79a5c9b7b05326b1f82/tumblr_mrwuvni0o71sdbfjbo1_1280.jpg">
        <p>Autor: <?php echo $post->author->username; ?></p>
        <p><?php echo $post->content; ?></p>
    </div>
<?php endforeach; ?>
</div>
<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    'itemSelector' => 'div.post',
    'loadingText' => 'Loading...',
    'donetext' => 'This is the end... my only friend, the end',
    'pages' => $pages,
)); ?>