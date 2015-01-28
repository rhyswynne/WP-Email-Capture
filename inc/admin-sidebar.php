<?php

function wp_email_capture_admin_sidebar($sidestring)
{
    $sidebararray = explode(',', $sidestring); 
    
    echo '<div class="postbox-container" style="width:24%;padding-left:10px;float:left;"><div class="metabox-holder"><div class="meta-box-sortables">';
    
    foreach ($sidebararray as $widgettitle) 
    {
        echo "<div id='wpemailcapture_premium".$widgettitle."' class='postbox'>";
        switch($widgettitle){
            case 'support':
                echo '<h3 class="hndle"><span>'.__('Need Help?','WPEC').'</span></h3>';
				echo '<div class="inside">';
				echo '<p>'.__('If you are having problems with this plugin, please read the','WPEC').' <a href="http://wpemailcapture.com/free-plugin/frequently-asked-questions/">'.__('Frequently Asked Questions','WPEC').'</a>, '.__('or alternatively','WPEC').' <a href="http://wpemailcapture.com/support/">'.__('submit a support request here','WPEC').'</a>.</p></div>';
                break;
            case 'affiliates':
                echo '<h3 class="hndle"><span>'.__('Recommended Services','WPEC').'</span></h3>';
				echo '<div class="inside">';
				echo '<p>'.__('We recommend the following services for sending out emails:-','WPEC').'</p>';
                echo '<ul>';
                echo '<li><strong><a href="http://wpemailcapture.com/recommends/aweber">Aweber</a></strong></li>';
                echo '<li><strong><a href="http://wpemailcapture.com/recommends/mailchimp">MailChimp</a></strong></li>';
                echo '<li><strong><a href="http://wpemailcapture.com/recommends/madmimi">MadMimi</a></strong></li>';
                echo '</ul>';
                echo '</div>';
                break;
            case 'globaldescription':
                echo '<h3 class="hndle"><span>'.__('Global List Management','WPEC').'</span></h3>';
				echo '<div class="inside">';
				echo '<p>'.__('This page allows you to create lists, either','WPEC').' <strong>'.__('external lists','WPEC').'</strong> '.__('(WP Email Capture is compatible with most major email marketing software packages), or a new','WPEC').' <strong>'.__('WP Email Capture List','WPEC').'</strong>.' .__('You can create as many different lists as you wish','WPEC').'.</p>';
                echo '</div>';
                break;
            case 'listdescriptionpremium':
                echo '<h3 class="hndle"><span>' .__('Add/Edit WP Email Capture List','WPEC').'</span></h3>';
				echo '<div class="inside">';
				echo '<p>' .__('This is the page for managing WP Email Capture Lists. From this page you can:-','WPEC').'</p>';
                echo '<ul>';
                echo '<li><strong>' .__('Make Changes To Your Lists','WPEC').'</strong> - ' .__('such as the name and the pages redirected to on form completion','WPEC').'.</li>';
                echo '<li><strong>' .__('Email Options','WPEC').'</strong> - ' .__('such as where the email comes from and what emails sent to the subscriber contains','WPEC').'.</li>';
                echo '<li><strong>' .__('Error Options','WPEC').'</strong> - ' .__('the errors that are displayed to subscribers who incorrectly fill in the form','WPEC').'.</li>';
                echo '<li><strong>' .__('Styling Options','WPEC').'</strong> - ' .__('change the button image (or use an image), as well as what to ask the user for besides their name','WPEC').'.</li>';
                echo '</ul>';
                echo __('You can also on this page do the following','WPEC'). ':-';
                echo '<ul>';
                echo '<li>'.__('Manage List Subscribers','WPEC').'</li>';
                echo '<li>'.__('Delete Temporary Emails','WPEC').'</li>';
                echo '<li>'.__('Empty the entire list','WPEC').'</li>';
                echo '</ul>';                                                
                echo '</div>';
                break;
            case 'getwpemailcapturepremiumdescription':
                $link = get_option('wp_email_capture_theme_affiliate_link');
                if (!$link)
                {
                    $link = "http://wpemailcapture.com/pricing/?utm_source=plugin&utm_medium=banner&utm_term=2point5&utm_campaign=internalbanner";
                }
                echo '<h3 class="hndle"><span>'.__('Get WP Email Capture Premium','WPEC').'</span></h3>';
				echo '<div class="inside">';
				echo '<p>'.__('Unlock the <strong>true</strong> power of WP Email Capture with the Premium version. With multiple lists, and stat tracking, WP Email Capture Premium is the missing link in your WordPress Email Marketing Puzzle','WPEC').'.</p>';                                                
                echo '<p style="text-align:center;"><a href="'.$link.'"><img src="'.plugins_url('images/WP-EC-262-x-218.png' , dirname(__FILE__)).'" alt="WP Email Capture"></a></p>';
                echo '</div>';
                break;
            case 'exlistdescriptionpremium':
                echo '<h3 class="hndle"><span>'.__('Add/Edit External List','WPEC').'</span></h3>';
				echo '<div class="inside">';
				echo '<p>'.__('This is the page for managing External lists through WP Email Capture. Simply copy & paste the code from your Email Marketing software into the page below and you can embed your newsletter subscriptions into posts, pages or sidebars easily using WP Email Capture. If you do not have an Email Marketing Service, a few are recommended below','WPEC').'.</p>';                                                
                echo '</div>';
                break;
            case 'donations':
                echo '<h3 class="hndle"><span>'.__('Donations','WPEC').'</span></h3><div class="inside">
                <p>'.__('If you like this plugin, please consider a small donation to help with future versions and plugins.','WPEC'). '</p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="8590914">
                <input type="image" src="https://www.paypal.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
                <img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                </form></div>';
                break;
            case 'news':
                $wpemailcapturefeed = wp_email_capture_fetch_rss_feed();
                echo '<h3 class="hndle"><span>'.__('Latest News','WPEC').'</span></h3><div class="inside">
                <p>'.__('The latest news and tutorials from WP Email Capture','WPEC').'.</p>';
                echo '<ul>';
                if ($wpemailcapturefeed) {
                    foreach ( $wpemailcapturefeed as $item ) {
    			    	$url = preg_replace( '/#.*/', '', esc_url( $item->get_permalink(), $protocolls=null, 'display' ) );
    					echo '<li>';
    					echo '<a href="'.$url.'#utm_source=wpadmin&utm_medium=sidebarwidget&utm_term=newsitem&utm_campaign=wpemailcapture">'. esc_html( $item->get_title() ) .'</a> ';
    					echo '</li>';
    			    }
                }
                echo '</ul></div>';  
                break;
            case 'supportus':
                echo '<h3 class="hndle"><span>'.__('Support Us!','WPEC').'</span></h3><div class="inside">
                <p>'.__('We would like you if you would not mind, doing one of the following if you are a fan of WP Email Capture','WPEC').'.</p>';
                echo '<ul>';
                echo '<li><a href="http://wordpress.org/extend/plugins/wp-email-capture/">'.__('Rate the plugin 5* on WordPress.org','WPEC').'</a></li>';
                echo '<li><a href="http://twitter.com/WPEmailCapture">'.__('Follow @WPEmailCapture on Twitter','WPEC').'</a></li>';
                echo '<li><a href="http://facebook.com/WPEmailCapture">'.__('Like us on Facebook','WPEC').'</a></li>';
                echo '</ul></div>';  
                break;
            case 'becomeanaffiliate':
                echo '<h3 class="hndle"><span>'.__('Become An Affiliate!','WPEC').'</span></h3><div class="inside">
                <p>'.__('Earn upto','WPEC'). ' <strong>$30</strong> '.__('per sale of WP Email Capture','WPEC'). '! <a href="http://wpemailcapture.com/affiliates"><strong>'.__('Join our affilite programme today','WPEC').'</strong></a>.</p></div>';
                break;
            case 'supportpage':
                echo '<h3 class="hndle"><span>'.__('WP Email Capture Options','WPEC').'</span></h3><div class="inside">
                <p>'.__('On this page you can make changes that to the way in which WP Email Capture runs','WPEC').'.</p></div>';
                break;
        }
        echo "</div>";
    }
    echo '</div></div></div>';
  
} 
?>