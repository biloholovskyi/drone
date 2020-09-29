<?php


/*************************************************
## Post Comment Customization
*************************************************/


// Theme custom comment list
function quadron_custom_commentlist($comment, $args, $depth) {

  $GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class('nt-comment-item'); ?> id="li-comment-<?php comment_ID() ?>">

		<div id="comment-<?php comment_ID(); ?>">

			<div class="nt-comment-left">

                <div class="nt-comment-avatar">
					<?php echo get_avatar($comment,$size='70' ); ?>
				</div>

                <?php if ($comment->comment_approved == '0') : ?>
					<em><?php esc_html_e('Your comment is awaiting moderation.', 'quadron') ?></em>
					<br />
				<?php endif; ?>

			</div>

			<div class="nt-comment-right">

				<div class="nt-comment-author comment__author-name">
                    <?php echo get_comment_author_link(); ?>
                </div>
                <div class="nt-comment-date">
                    <span class="post-meta__item __date-post">
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                            <?php printf(esc_html__('%1$s at %2$s', 'quadron'), get_comment_date(),  get_comment_time()) ?>
                        </a>
                        <?php edit_comment_link(esc_html__('(Edit)', 'quadron'),'  ','') ?>
                    </span>
                </div>

				<div class="nt-comment-content nt-theme-content nt-clearfix"><?php comment_text() ?></div>


                <div class="nt-comment-date post-meta">

                    <div class="nt-comment-reply-content post-meta__item"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>

				</div>

			</div>

		</div>
<?php
}



// Unset URL from comment form
function quadron_move_comment_form_below( $fields ) {

    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;

    return $fields;

}
add_filter( 'comment_form_fields', 'quadron_move_comment_form_below' );



// Add placeholder for Name and Email
function quadron_move_modify_comment_form_fields($fields){

	$commenter     = wp_get_current_commenter();
	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';
	$req           = get_option( 'require_name_email' );
	$aria_req      = ( $req ? " aria-required='true'" : '' );
	$html_req      = ( $req ? " required='required'" : '' );
	$html5         = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : false;

    $fields['author'] = '<div class="row form-default"><div class="col-12 col-lg-4"><div class="form-group"><label class="placeholder-label">' . esc_attr__( 'Full Name', 'quadron' ) . '</label><input class="nt-form-input form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' required /></div></div>';
    $fields['email'] = '<div class="col-12 col-lg-4"><div class="form-group"><label class="placeholder-label">'.esc_attr__( 'E-mail', 'quadron' ).'</label><input class="nt-form-input form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' required/></div></div>';
    $fields['url'] = '<div class="col-12 col-lg-4"><div class="form-group"><label class="placeholder-label">'.esc_attr__( 'Add your website URL', 'quadron'  ).'</label><input class="nt-form-input form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" required/></div></div></div>';
    return $fields;
}
add_filter('comment_form_default_fields','quadron_move_modify_comment_form_fields');

function quadron_modify_comment_form_text_area($arg) {
    $arg['comment_field'] = '<div class="row form-default"><div class="col-12"><div class="form-group"><label class="placeholder-label">' . esc_attr__( 'Comment', 'quadron' ) . '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="6" aria-required="true"></textarea></div></div></div>';
    return $arg;
}

add_filter('comment_form_defaults', 'quadron_modify_comment_form_text_area');

// add class comment form button
function quadron_addclass_form_button( $arg ) {

  // $arg contains all the comment form defaults
  // simply redefine one of the existing array keys to change the comment form
  // see http://codex.wordpress.org/Function_Reference/comment_form for a list
  // of array keys
  // add Foundation classes to the button class
  $arg['class_submit'] = 'btn mt-0';
  // return the modified array

  return $arg;

}
// run the comment form defaults through the newly defined filter
add_filter( 'comment_form_defaults', 'quadron_addclass_form_button' );
