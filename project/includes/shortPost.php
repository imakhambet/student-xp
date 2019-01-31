<!-- odkaz na vybrany prispevek -->
<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
    <div class="post">
        
        <div class="descr"><h2 class="post-title"><?php echo $post['title'] ?></h2> 
        
        Published by <?php echo $post['author'] ?><br>
        Country:
        
        <!-- vlajka -->
        <?php if($post['country'] === "OTHER"):?>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoKw19F-4ZcdcCm3BDPJp5fGNOqprAAgWOrvnMQAGBQrzxv8EdPA" width="22" height="13" alt="other">
        <?php else: ?>
            <img src="https://gitlab.fel.cvut.cz/ismukmak/flags/raw/master/flags-medium/<?php echo mb_strtolower($post['country']);?>.png" width="22" height="13" alt="flag">
        <?php endif; ?>
        <?php echo $post['country'];?><br>
        
        University: <?php echo $post['university'] ?>
        <h5 class="readMore">Read more...</h5>
        </div>
    </div>
    <?php echo getSmallImage($post['title']); ?>
</a>