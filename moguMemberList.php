<?php
/**
 * Template Name: 部活メンバーリスト
 */

get_header(); ?>

<style type='text/css'><!--
    .member {
        width: 98%;
        padding-top: 25px;
        border-top: solid 1px #e3e3e3;
    }

    .member p{
        line-height: 24px;
        margin-bottom: 24px;
    }
    .member p.fullname {
        font-size: x-large;
    }
--></style>

	<div id="primary" class="site-content">
		<div id="content" role="main">

            <?php
            $users = get_users(array('role'=>'editor',
                               'orderby'=>'ID', 'order'=>'ASC',
                )
            );?>

        <?php foreach ($users as $user) : ?>
            <?php
            echo '<div class="member">';
            $last_name = $user->last_name;
            $first_name = $user->first_name;
            $user_desc = $user->description;
            echo '<p style="display:inline;float:right;">'.get_avatar($user->ID, 150).'</p>';
            echo '<p class="fullname"><strong>'.$last_name." ".$first_name.'</strong></p>';
            echo '<p><strong>・自己紹介</strong><br />'.nl2br($user_desc).'</p>';
            echo "</div>";
            ?>
        <?php endforeach; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>