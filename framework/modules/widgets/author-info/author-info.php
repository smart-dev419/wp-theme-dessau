<?php

class DessauSelectAuthorInfoWidget extends DessauSelectWidget {
	public function __construct() {
		parent::__construct(
			'qodef_author_info_widget',
			esc_html__( 'Dessau Author Info Widget', 'dessau' ),
			array( 'description' => esc_html__( 'Add author info element to widget areas', 'dessau' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Custom CSS Class', 'dessau' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'author_username',
				'title' => esc_html__( 'Author Username', 'dessau' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		extract( $args );
		
		$extra_class = '';
		if ( ! empty( $instance['extra_class'] ) ) {
			$extra_class = $instance['extra_class'];
		}
		
		$authorID = 1;
		if ( ! empty( $instance['author_username'] ) ) {
			$author = get_user_by( 'login', $instance['author_username'] );
			
			if ( $author ) {
				$authorID = $author->ID;
			}
		}
		
		$author_info = get_the_author_meta( 'description', $authorID );
		?>
		
		<div class="widget qodef-author-info-widget <?php echo esc_html( $extra_class ); ?>">
			<div class="qodef-aiw-inner">
				<a itemprop="url" class="qodef-aiw-image" href="<?php echo esc_url( get_author_posts_url( $authorID ) ); ?>">
					<?php echo dessau_select_kses_img( get_avatar( $authorID, 138 ) ); ?>
				</a>
				<?php if ( $author_info !== "" ) { ?>
					<h4 class="qodef-aiw-title"><?php esc_html_e( 'About Author', 'dessau' ); ?></h4>
					<p itemprop="description" class="qodef-aiw-text"><?php echo wp_kses_post( $author_info ); ?></p>
				<?php } ?>
			</div>
		</div>
		<?php
	}
}