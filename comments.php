<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number() ) { ?>
	<div class="qodef-comment-holder clearfix" id="comments">
		<?php if ( have_comments() ) { ?>
			<div class="qodef-comment-holder-inner">
				<div class="qodef-comments-title">
					<h5><?php esc_html_e( 'Comments', 'dessau' ); ?></h5>
				</div>
				<div class="qodef-comments">
					<ul class="qodef-comment-list">
						<?php wp_list_comments( array_unique( array_merge( array( 'callback' => 'dessau_select_comment' ), apply_filters( 'dessau_select_comments_callback', array() ) ) ) ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
			<p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'dessau' ); ?></p>
		<?php } ?>
	</div>
	<?php
		$qodef_commenter = wp_get_current_commenter();
		$qodef_req       = get_option( 'require_name_email' );
		$qodef_aria_req  = ( $qodef_req ? " aria-required='true'" : '' );
	    $qodef_consent  = empty( $qodef_commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		
		$qodef_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit_comment',
			'title_reply'          => esc_html__( 'Post a Comment', 'dessau' ),
			'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h4>',
			'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'dessau' ),
			'cancel_reply_link'    => esc_html__( 'cancel reply', 'dessau' ),
			'label_submit'         => esc_html__( 'Submit', 'dessau' ),
			'comment_field'        => apply_filters( 'dessau_select_comment_form_textarea_field', '<textarea id="comment" placeholder="' . esc_attr__( 'Type your message here...', 'dessau' ) . '" name="comment" cols="45" rows="6" aria-required="true"></textarea>' ),
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'fields'               => apply_filters( 'dessau_select_comment_form_default_fields', array(
				'author' => '<input id="author" name="author" placeholder="' . esc_attr__( 'Your name goes here...', 'dessau' ) . '" type="text" value="' . esc_attr( $qodef_commenter['comment_author'] ) . '"' . $qodef_aria_req . ' />',
				'email'  => '<input id="email" name="email" placeholder="' . esc_attr__( 'Your email goes here...', 'dessau' ) . '" type="text" value="' . esc_attr( $qodef_commenter['comment_author_email'] ) . '"' . $qodef_aria_req . ' />',
				'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $qodef_consent . ' />' .
							 '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'dessau' ) . '</label></p>',
			) )
		);

	$qodef_args = apply_filters( 'dessau_select_comment_form_final_fields', $qodef_args );
		
	if ( get_comment_pages_count() > 1 ) { ?>
		<div class="qodef-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>

    <?php
    $qodef_show_comment_form = apply_filters('dessau_select_show_comment_form_filter', true);
    if($qodef_show_comment_form) {
    ?>
        <div class="qodef-comment-form">
            <div class="qodef-comment-form-inner">
                <?php comment_form( $qodef_args ); ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>	