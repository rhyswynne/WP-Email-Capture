<?php

/**
 * Function to generate the sidebar on admin pages.
 *
 * @param  string   $sidestring     Comma separated string with all admin boxes.
 * @return void
 */
function wp_email_capture_admin_sidebar( $sidestring ) {
    $sidebararray = explode( ',', $sidestring );

    echo '<div class="postbox-container" style="width:24%;padding-left:10px;float:left;"><div class="metabox-holder"><div class="meta-box-sortables">';

    foreach ( $sidebararray as $widgettitle ) {
        echo "<div id='wpemailcapture_premium". $widgettitle . "' class='postbox'>";
        switch ( $widgettitle ) {
        
            case 'support':
                echo '<h3 class="hndle"><span>'.__( 'Need Help?', 'wp-email-capture' ).'</span></h3>
                    <div class="inside">
                    <p>'.__( 'If you are having problems with this plugin, please read the', 'wp-email-capture' ).' <a href="http://wpemailcapture.com/free-plugin/frequently-asked-questions/?utm_source=admin-sidebar&utm_medium=plugin&utm_campaign=wpemailcapture">'.__( 'Frequently Asked Questions', 'wp-email-capture' ).'</a>, '.__( 'or alternatively', 'wp-email-capture' ).' <a href="http://wpemailcapture.com/support/?utm_source=admin-sidebar&utm_medium=plugin&utm_campaign=wpemailcapture">'.__( 'submit a support request here', 'wp-email-capture' ).'</a>.</p>
                    </div>';
                break;

            case 'affiliates':
                echo '<h3 class="hndle"><span>'.__( 'Recommended Services', 'wp-email-capture' ).'</span></h3>
                    <div class="inside">
                    <p>'.__( 'We recommend the following services for sending out emails:-', 'wp-email-capture' ).'</p>
                    <ul>
                        <li><strong><a href="http://wpemailcapture.com/recommends/aweber">Aweber</a></strong></li>
                        <li><strong><a href="http://wpemailcapture.com/recommends/mailchimp">MailChimp</a></strong></li>
                        <li><strong><a href="http://wpemailcapture.com/recommends/madmimi">MadMimi</a></strong></li>
                    </ul>
                    </div>';
                break;

            case 'globaldescription':
                echo '<h3 class="hndle"><span>'.__( 'Global List Management', 'wp-email-capture' ).'</span></h3>
                        <div class="inside">
                            <p>'.__( 'This page allows you to create lists, either', 'wp-email-capture' ).' <strong>'.__( 'external lists', 'wp-email-capture' ).'</strong> '.__( '(WP Email Capture is compatible with most major email marketing software packages), or a new', 'wp-email-capture' ).' <strong>'.__( 'WP Email Capture List', 'wp-email-capture' ).'</strong>.' .__( 'You can create as many different lists as you wish', 'wp-email-capture' ).'.</p>
                        </div>';
                break;

            case 'listdescriptionpremium':
                echo '<h3 class="hndle"><span>' .__( 'Add/Edit WP Email Capture List', 'wp-email-capture' ).'</span></h3>
                        <div class="inside">
                            <p>' .__( 'This is the page for managing WP Email Capture Lists. From this page you can:-', 'wp-email-capture' ).'</p>
                            <ul>
                                <li><strong>' .__( 'Make Changes To Your Lists', 'wp-email-capture' ).'</strong> - ' .__( 'such as the name and the pages redirected to on form completion', 'wp-email-capture' ).'.</li>
                                <li><strong>' .__( 'Email Options', 'wp-email-capture' ).'</strong> - ' .__( 'such as where the email comes from and what emails sent to the subscriber contains', 'wp-email-capture' ).'.</li>
                                <li><strong>' .__( 'Error Options', 'wp-email-capture' ).'</strong> - ' .__( 'the errors that are displayed to subscribers who incorrectly fill in the form', 'wp-email-capture' ).'.</li>
                                <li><strong>' .__( 'Styling Options', 'wp-email-capture' ).'</strong> - ' .__( 'change the button image (or use an image), as well as what to ask the user for besides their name', 'wp-email-capture' ).'.</li>
                            </ul>' .
                        __( 'You can also on this page do the following', 'wp-email-capture' ). ':-' .
                        '<ul>
                            <li>'.__( 'Manage List Subscribers', 'wp-email-capture' ).'</li>
                            <li>'.__( 'Delete Temporary Emails', 'wp-email-capture' ).'</li>
                            <li>'.__( 'Empty the entire list', 'wp-email-capture' ).'</li>
                        </ul>
                    </div>';
                break;

            case 'getwpemailcapturepremiumdescription':

                $link = get_option( 'wp_email_capture_theme_affiliate_link' );

                if ( !$link ) {

                    $link = "http://wpemailcapture.com/premium/?utm_source=plugin&utm_medium=banner&utm_term=2point5&utm_campaign=internalbanner";

                }
                echo '<h3 class="hndle"><span>'.__( 'Get WP Email Capture Premium', 'wp-email-capture' ).'</span></h3>
                        <div class="inside">
                            <p>'.__( 'Unlock the <strong>true</strong> power of WP Email Capture with the Premium version. With multiple lists, and stat tracking, WP Email Capture Premium is the missing link in your WordPress Email Marketing Puzzle', 'wp-email-capture' ).'.</p>
                            <p style="text-align:center;"><a href="'.$link.'"><img src="'. plugins_url( 'images/WP-EC-262-x-218.png' , dirname(__FILE__) ).'" alt="WP Email Capture" style="width:100%;"></a></p>
                        </div>';
                break;

            case 'exlistdescriptionpremium':
                echo '<h3 class="hndle"><span>'.__( 'Add/Edit External List', 'wp-email-capture' ).'</span></h3>
                        <div class="inside">
                            <p>'.__( 'This is the page for managing External lists through WP Email Capture. Simply copy & paste the code from your Email Marketing software into the page below and you can embed your newsletter subscriptions into posts, pages or sidebars easily using WP Email Capture. If you do not have an Email Marketing Service, a few are recommended below', 'wp-email-capture' ).'.</p>
                        </div>';
                break;

            case 'donations':
                echo '<h3 class="hndle"><span>'.__( 'Donations', 'wp-email-capture' ).'</span></h3><div class="inside">
                <p>'.__( 'If you like this plugin, please consider a small donation to help with future versions and plugins.', 'wp-email-capture' ). '</p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="8590914">
                <input type="image" src="https://www.paypal.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
                <img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                </form></div>';
                break;

            case 'news':
                $wpemailcapturefeed = wp_email_capture_fetch_rss_feed();

                echo '<h3 class="hndle"><span>'.__( 'Latest News', 'wp-email-capture' ).'</span></h3><div class="inside">
                <p>'.__( 'The latest news and tutorials from WP Email Capture', 'wp-email-capture' ).'.</p>

                <ul>';
                
                if ( $wpemailcapturefeed ) {
                    foreach ( $wpemailcapturefeed as $item ) {
                        $url = preg_replace( '/#.*/', '', esc_url( $item->get_permalink(), $protocolls=null, 'display' ) );
                        echo '<li>
                            <a href="'.$url.'#utm_source=wpadmin&utm_medium=sidebarwidget&utm_term=newsitem&utm_campaign=wpemailcapture">'. esc_html( $item->get_title() ) .'</a>
                            </li>';
                    }
                }
                echo '</ul></div>';
                break;

            case 'supportus':
                echo '<h3 class="hndle"><span>'.__( 'Support Us!', 'wp-email-capture' ).'</span></h3><div class="inside">
                <p>'.__( 'We would like you if you would not mind, doing one of the following if you are a fan of WP Email Capture', 'wp-email-capture' ).'.</p>

                <ul>
                    <li><a href="http://wordpress.org/extend/plugins/wp-email-capture/">'.__( 'Rate the plugin 5* on WordPress.org', 'wp-email-capture' ).'</a></li>
                    <li><a href="http://twitter.com/WPEmailCapture">'.__( 'Follow @WPEmailCapture on Twitter', 'wp-email-capture' ).'</a></li>
                    <li><a href="http://facebook.com/WPEmailCapture">'.__( 'Like us on Facebook', 'wp-email-capture' ).'</a></li>
                </ul></div>';
                break;

            case 'becomeanaffiliate':
                echo '<h3 class="hndle"><span>'.__( 'Become An Affiliate!', 'wp-email-capture' ).'</span></h3><div class="inside">
                <p>'.__( 'Earn upto', 'wp-email-capture' ). ' <strong>$30</strong> '.__( 'per sale of WP Email Capture', 'wp-email-capture' ). '! <a href="http://wpemailcapture.com/affiliates/?utm_source=admin-sidebar&utm_medium=plugin&utm_campaign=wpemailcapture"><strong>'.__( 'Join our affilite programme today', 'wp-email-capture' ).'</strong></a>.</p></div>';
                break;

            case 'supportpage':
                echo '<h3 class="hndle"><span>'.__( 'WP Email Capture Options', 'wp-email-capture' ).'</span></h3><div class="inside">
                <p>'.__( 'On this page you can make changes that to the way in which WP Email Capture runs', 'wp-email-capture' ).'.</p></div>';
                break;
        }
        echo "</div>";
    }
    echo '</div></div></div>';

}
?>
