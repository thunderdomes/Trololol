<div class="middle-content">
<div id="posts">
<?php foreach($posts as $post): ?>
    <div class="post">
        <p>Autor: <?php echo $post->author->username; ?></p>
        <p><?php echo $post->content; ?></p>
    </div>
<?php endforeach; ?>
</div>
</div>
<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    'itemSelector' => 'div.post',
    'loadingText' => 'Loading...',
    'donetext' => 'This is the end... my only friend, the end',
    'pages' => $pages,
)); ?>