<?php
/**
 * Template Name: 部活メンバーリスト
 */

get_header(); ?>

<style type='text/css'><!--
    .member {
        width: 98%;
        margin-top: 24px;
        padding-top: 24px;
        border-top: solid 1px #e3e3e3;
        float: left;
    }

    .member p{
        line-height: 24px;
        margin-bottom: 24px;
    }
    .member p.avatar{
        display:inline;
        float:right;
        margin-left:5px;
    }
    .member p.fullname {
        font-size: x-large;
        margin-top: 16px;
    }
    .member img.social{
        width: 48px;
        height: 48px;
    }
--></style>

	<div id="primary" class="site-content">
		<div id="content" role="main">

            <?php
            $users = get_users(array('orderby'=>'ID', 'order'=>'ASC',
                )
            );?>

        <?php foreach ($users as $user) : ?>
            <?php
            echo '<div class="member">';
            $pathToTemplate = get_bloginfo('stylesheet_directory');
            $pathToRoot = get_bloginfo('url');
            $page_id = $user->page_id;
            $facebook = $user->facebook;
            $twitter = $user->twitter;
            $google = $user->google;
            echo '<p class="avatar">'.get_avatar($user->ID, 150).'</p>';
            if (strlen($google) > 0){
                echo '<span style="float:right;"><a href="http://plus.google.com/u/0/'.$google.'" target="_blank"><img class="social" src="'.$pathToTemplate.'/images/social/Google plus.png" alt="googleplus" /></a></span>';
            }
            if (strlen($facebook) > 0){
                echo '<span style="float:right;"><a href="http://www.facebook.com/'.$facebook.'" target="_blank"><img class="social" src="'.$pathToTemplate.'/images/social/Facebook.png" alt="facebook" /></a></span>';
            }
            if (strlen($twitter) > 0){
                echo '<span style="float:right;"><a href="http://www.twitter.com/'.$twitter.'" target="_blank"><img src="'.$pathToTemplate.'/images/social/Twitter.png" alt="twitter" /></a></span>';
            }
            echo '<p class="fullname"><strong>'.$user->last_name." ".$user->first_name.'</strong></p>';
            echo '<p>'.nl2br($user->user_description).'</p>';
            if (intval($page_id) > 0){
                echo '<p><strong><a href="'.$pathToRoot.'/?page_id='.$page_id.'">自己紹介ページへ</strong></p></a><br />';
            }
            echo '</div>';
            ?>
        <?php endforeach; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>