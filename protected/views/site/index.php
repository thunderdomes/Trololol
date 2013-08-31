<div id="posts">
<?php foreach($posts as $post): ?>
    <div class="post">
        <h2><?php echo $post->title; ?></h2>
        <img src="<?php echo Yii::app()->createUrl('image/default/create/',array(
            'id' =>$post->image_id,
            'version'=>'normal'
        )); ?>">
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