<?php
##################################################################################################################################
// 	                                          common sense security precautions
##################################################################################################################################
//hide login errors
add_filter('login_errors',create_function('$a', "return null;"));
// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
    remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
    remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
    remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link


}
add_action('init', 'removeHeadLinks');

function theme_translation(){
    load_theme_textdomain('basic-theme-br');
}
add_action('after_setup_theme', 'theme_translation');

//################################################################################################################################
// Add RSS links to <head> section
automatic_feed_links();
	
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Sidebar Widgets',
		'id'   => 'sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
    register_sidebar(array(
        'name' => 'About',
        'id'   => 'about-me',
        'description'   => 'This is the About me on the HP.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
}

add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.
add_theme_support( 'post-thumbnails');
add_theme_support( 'menus' );

//################################################################################################################################
//Override defult search form
function my_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform-n" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="hidden" value="58" name="cat" id="scat" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form' );

//################################################################################################################################
//Show the first image from the post as the thumbnail
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "http://www.tarsilakruse.com.br/wp-content/themes/tarsila-v3/images/img.gif";
  }
  return $first_img;
}

//################################################################################################################################
//ADD paginatio

function pagination($pages = '', $range = 6)
{
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span class=\"oneof\">Page ".$paged." of ".$pages.": </span>";//
         //if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; Primeira</a>";
         if($paged > 1 && $showitems < $pages) echo "<a class=\"anterior\" href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a class=\"proxima\" href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Última &raquo;</a>";
         echo "</div>\n";
     }
}

/* Include Admin Option Panel File */
    include(TEMPLATEPATH . "/admin/index.php");

?>