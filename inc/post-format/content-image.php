<article <?php post_class(); ?>>
    <header class="entry-header">
		<h2 class="entry-name">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<ul class="entry-meta">
			<li><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d H:i');?></li>
      <?php if( dopt('d_showcategory_b')!="" ) : ?>
			   <li><i class="fa fa-pencil-square-o"></i> <?php the_category(','); ?></li>
      <?php endif; ?>
			<li class="comments_meta"><i class="fa fa-comments-o"></i> <?php comments_popup_link('暂无评论', '1 条评论', '% 条评论'); ?></li>
			<li class="views_meta"><i class="fa fa-eye"></i> <a><?php mzw_post_views(' 访问量');?></a></li>
		</ul>
    </header>
	<div class="entry-image">
		<?php catch_that_image();?>
	</div>
    <div class="entry-content" itemprop="description">
        <?php
		$pc=$post->post_content;
		$st=strip_tags(apply_filters('the_content',$pc));
		if(has_excerpt())
			the_excerpt();
		elseif(preg_match('/<!--more.*?-->/',$pc) || mb_strwidth($st)<500)
			the_content_nopic('');
		elseif(function_exists('mb_strimwidth'))
			echo'<p>'.mb_strimwidth($st,0,500,' ...').'</p>';
		else the_content_nopic('');
		?>
    </div>
    <footer class="entry-footer clearfix">
    <span class="tag-links in-list"><?php the_tags( '', '', '' ); ?></span>
		<div class="post-more">
			<a href="<?php the_permalink(); ?>">阅读全文</a>
		</div>
    <?php if( dopt('d_ding_b') != '' ) : ?>
		<div class="post-love">
			<a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite post-love-link <?php if(isset($_COOKIE['mzw_ding_'.$post->ID])) echo ' done';?>" title="点个赞"><i class="fa fa-heart-o"></i>
			<span class="love-count">
				<?php
          if( get_post_meta($post->ID,'mzw_ding',true) )
            echo get_post_meta($post->ID,'mzw_ding',true);
          else
            echo '0';
        ?>
			</span></a>
		</div>
    <?php endif; ?>
	</footer>
</article>
