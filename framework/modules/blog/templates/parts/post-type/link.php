<?php
$title_tag = isset($link_tag) ? $link_tag : 'h5';
$post_link_meta = get_post_meta(get_the_ID(), "qodef_post_link_link_meta", true );

if(dessau_select_get_blog_module() == 'list') {
    $post_link = get_the_permalink();
	$target = "_self";
} else {
	$target = "_blank";
    if(!empty($post_link_meta)) {
        $post_link = esc_html($post_link_meta);
    }
}
?>

<div class="qodef-post-link-holder">
    <div class="qodef-post-link-holder-inner">
        <<?php echo esc_attr($title_tag);?> itemprop="name" class="qodef-link-title qodef-post-title">
        <?php if(isset($post_link) && $post_link != '') { ?>
        <a itemprop="url" href="<?php echo esc_url($post_link); ?>" title="<?php the_title_attribute(); ?>" target="<?php echo esc_attr($target); ?>">
            <?php } ?>
            <?php echo get_the_title(); ?>
            <?php if(isset($post_link) && $post_link != '') { ?>
        </a>
        <?php } ?>
        </<?php echo esc_attr($title_tag);?>>
    </div>
</div>