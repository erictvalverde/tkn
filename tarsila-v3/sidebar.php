<aside id="sidebar">

<?php
    global $post;
    $categories = get_the_category($post->ID);
    $catID = $categories[0]->cat_ID;
    $catName = $categories[0]->category_nicename;
?>
<?php if(is_page()){ ?>

    <span class="imgholder"> <?php the_post_thumbnail(); ?> </span>

<?php }elseif(in_category(array(1,4))){ ?>

    <ul id="thumblist">
    <?php $my_query = new WP_Query('showposts=10&cat='.$catID); while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" class="imgholder ajax" data-filter="#ajax-filter" data-target="#main">
                <?php  if(in_category(1)){
                    the_post_thumbnail('thumbnail');
                }else{
                    the_title();
                } ?>
            </a>
        </li>
    <?php endwhile; ?>
    </ul>
    

<?php }else{ ?>
    
<div id="search-3" class="widget widget_search">
    <h2>Search</h2>
    <?php get_search_form(); ?>
</div>        

<div id="categories-3" class="widget widget_categories">        
    <h2><?php _e('Categories','basic-theme-br');?></h2>
    <ul>
        <?php wp_list_categories('child_of=58&title_li='); ?>
    </ul>
</div>

<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>

    

<?php endif; ?>

<?php } ?>
</aside>