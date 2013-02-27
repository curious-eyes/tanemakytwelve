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
            while ( have_posts() ) : the_post();
                // 現在のページIDを取得（無理矢理かも。。。）
                // このページIDの子ページを、各メンバーの自己紹介ページとして取得するため
                foreach($posts as $post) {
                    $thisPostId = $post->ID;
                }
            endwhile;
            $users = get_users(array('orderby'=>'ID', 'order'=>'ASC',
                )
            );?>
        <?php
        if ( is_user_logged_in() ) { // ログインしている人だけ表示 start
            $pathToTemplate = get_bloginfo('stylesheet_directory');
        ?>

        <?php foreach ($users as $user) : ?>
            <?php
            echo '<div class="member">';
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

            // 自己紹介ページを取得（メンバー一覧の子ページとして作成したページを取得）
            $mypages = get_pages(array('sort_order'=>'desc'
            , 'sort_column'=>'ID'
            , 'child_of'=>$thisPostId
            , 'post_status'=>'private,publish'
            , 'authors'=>$user->ID));
            if(count($mypages)>0){
                echo '<p>';
                foreach($mypages as $mypage) {
                    echo '<strong><a href="'.$mypage->guid.'">'.$mypage->post_title.'</a></strong><br />';
                }
                echo '</p>';
            }
            echo '</div>';
            ?>
        <?php endforeach; ?>

        <?php
        }else{
            // ログインしている人だけ表示 start
            echo '<div><p>会員限定コンテンツです。<br />ログインしてください。</p></div>';
        }
        ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>