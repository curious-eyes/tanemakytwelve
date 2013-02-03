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
    .member img.social{
        width: 48px;
        height: 48px;
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
            $pathToTemplate = get_bloginfo('template_directory');
            $facebook = $user->facebook;
            $twitter = $user->twitter;
            $google = $user->google;
            echo '<p style="display:inline;float:right;">'.get_avatar($user->ID, 150).'</p>';
            echo '<p class="fullname"><strong>'.$user->last_name." ".$user->first_name.'</strong></p>';
            echo '<p><strong>・自己紹介</strong><br />'.nl2br($user->user_description).'</p>';
            if (strlen($facebook)){
                echo '<a href="http://www.facebook.com/'.$facebook.'" target="_blank"><img class="social" src="'.$pathToTemplate.'/images/social/Facebook.png" alt="facebook" /></a>';
            }
            if (strlen($twitter)){
                echo '<a href="http://www.twitter.com/'.$twitter.'" target="_blank"><img src="'.$pathToTemplate.'/images/social/Twitter.png" alt="twitter" /></a>';
            }
            if (strlen($google)){
                echo '<a href="http://plus.google.com/u/0/'.$google.'" target="_blank"><img class="social" src="'.$pathToTemplate.'/images/social/Google plus.png" alt="googleplus" /></a>';
            }
            echo "</div>";
            ?>
        <?php endforeach; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>