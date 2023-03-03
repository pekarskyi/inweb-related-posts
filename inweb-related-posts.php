<div class="similar_posts">
    <?php
        $categories = get_the_category($post->ID);
            if ($categories) {
                $category_ids = array();
            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                $args=array(
                'category__in' => $category_ids,
                'post__not_in' => array($post->ID),
                'showposts'=>6,
                'caller_get_posts'=>1);
                $my_query = new wp_query($args);
            if( $my_query->have_posts() ) {

                if(ICL_LANGUAGE_CODE=='ru'):
                echo '<h2>Похожие статьи</h2>';
                elseif(ICL_LANGUAGE_CODE=='uk'):
                echo '<h2>Схожі публікації</h2>';
                endif;
                
                echo '<div class="related_wrapper">';
                while ($my_query->have_posts()) {
                $my_query->the_post();
    ?>

    <div class="related_item">
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
            <?php the_post_thumbnail(); ?></a>
        <div class="related_item_text">
            <span class="related_item_text_date"><?php echo get_the_date(); ?></span>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                <h3><?php the_title(); ?></h3>
				
				<div class="related_item_read_more">
					<?php if(ICL_LANGUAGE_CODE=='ru'): ?>
					Подробнее
					<?php elseif(ICL_LANGUAGE_CODE=='uk'): ?>
					Детальніше
					<?php endif; ?>
				</div>
            </a>
        </div>
        </a>
    </div>

    <?php
        }
        echo '</div>';
        }
        wp_reset_query();
        }
    ?>

    <?php
        $the_cat = get_the_category();
        $category_name = $the_cat[0]->cat_name;
        $category_link = get_category_link( $the_cat[0]->cat_ID );
    ?>

    <div class="related_link_category">
        <a href="<?php echo $category_link ?>" title="<?php echo $category_name ?>">
		
		<?php if(ICL_LANGUAGE_CODE=='ru'): ?>
                Все статьи категории <b><?php echo $category_name ?></b>
                <?php elseif(ICL_LANGUAGE_CODE=='uk'): ?>
                Усі публікації категорії <b><?php echo $category_name ?></b>
                <?php endif; ?>
		</a>
    </div>

</div>
