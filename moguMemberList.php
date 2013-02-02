<?php
/**
 * Template Name: 部活メンバーリスト
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

            <?php
            $users = get_users(array('role'=>'editor',
                               'orderby'=>'ID', 'order'=>'DESC',
                )
            );
        foreach ($users as $user) {
            $last_name = $user->last_name;
            $first_name = $user->first_name;
            $user_desc = $user->description;
            echo $last_name." ".$first_name." (".nl2br($user_desc).")";
            echo "<br /><br />";
        }
            ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>