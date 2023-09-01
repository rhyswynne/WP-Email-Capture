WP Email Capture
================
Requires at least: 6.2
Tested up to: 6.2
Requires PHP: 8.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Description
-----------
This creates a 2 field form (Name & Email) for capturing emails. Email is double opt in, and allows you to forward opt in to services such as ebooks or software. When you are ready to begin your email marketing campaign, simply export the list into your chosen email marketing software or service. WP Email Capture now comes with a number of [integrations and extensions](https://www.wpemailcapture.com/downloads/?utm_source=description&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture), including [WP Email Capture Premium](https://www.wpemailcapture.com/premium?utm_source=description&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture) allows you to build multiple lists, track stats and have custom fields and templates

WP Email Capture Free Features:-

* Widget Ready.
* Uses Wordpress' internal wp_mail function for sending mail.
* Easily integrated with posts & pages.
* Dashboard Widget.
* Export data into CSV files, compatible with most major Email Marketing Programmes (including Aweber, Mailchimp, Groupmail, Constant Contact)
* Double opt in, so compatible with CAN-SPAM act.
* And completely free!

For more details please visit the official site of [WP Email Capture](https://www.wpemailcapture.com/?utm_source=description&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture)

**Now Released is WP Email Capture Premium!** You get all the above features plus the following:-

* Stat tracking - track the visitors to your site and where your sign ups come from.
* Autoresponders - Create an autoresponder email, an email sent to the user when they sign up to your site.
* Multiple lists - Create multiple lists for your site.
* Build External Lists - If you have a Mailchimp or Aweber account, you can use WP Email Capture to build to these services directly.
* Custom Fields - You can capture more than just visitors name & email, add your own custom fields to capture (such as phone number or Address).

You also get premium support and further documentation. For more information, and to purchase, [visit the plans and pricing page](https://www.wpemailcapture.com/premium/?utm_source=wpemailcapturepremium&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture).

Keep in Contact:-

* [WP Email Capture on Facebook](http://www.facebook.com/wpemailcapture)
* [@WPEmailCapture](http://www.twitter.com/wpemailcapture) on Twitter
* For support requests please visit the [FAQ's](https://www.wpemailcapture.com/free-plugin/frequently-asked-questions/?utm_source=contact&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture), or leave a message in the [Wordpress Support Forum](http://wordpress.org/support/plugin/wp-email-capture). 
* For general feature requests or bug notices [please contact me directly](http://wpemailcapture.com/contact/?utm_source=contact&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture), however any support requests sent via the contact form, Facebook Page or Twitter Feed will be ignored - please use the WordPress Support Forum - please note I'm unable to support CSS or styling queries, please read the "Stylings" area on [other notes](http://wordpress.org/plugins/wp-email-capture/other_notes/?utm_source=contact&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture).

Translation Credits:-

Translations have been done by the following parties. Thank you!

* French Translation: Olivier - http://www.ticket-system.net/ & Andrew Patton (@andpatton) - http://www.acusti.ca/
* German Translation: Stephan - http://www.computersniffer.com/, Marc Nilius (@libertello) - http://www.libertello.de/ and Ov3rFly
* Brazilian Portugese Translation: Nick Lima (@nick_linux) - http://www.nicklima.com.br
* Dutch Translation: Sander - http://www.zanderz.net/
* Hungarian Translation: Surbma - http://surbma.hu/
* Spanish Translation: David Bravo - http://dimensionmultimedia.com
* Italian Translation: Giuseppe Marino - http://it.gravatar.com/gpmarino
* Serbian Translation: Borisa Djuraskovic - http://www.webhostinghub.com/
* Croatian Translation: Lem Treursić - http://grafika-dizajn.com/

Installation
------------
1. Upload the plugin (unzipped) into `/wp-content/plugins/`.
2. Activate the plugin under the "Plugins" menu.
3. Create a page on your site for "sign up" (this page will be forwarded to when the form is just filled in, informs the users that they need to click on a link in the email.
4. Create a page on your site "confirmation" (thanking them for their enquiry, links to download etc).
5. After creating these, fill in the settings in the "Settings > WP Email Capture" page, making sure the URL of the "sign up" page is in the "Page to redirect to on sign up" text box and the "confirmation" page URL is in the "Page to redirect to on confirmation of email address" text box.

The form can be inserted into the site at any location. However, to put the form anywhere, insert the following code into your template

`<?php if (function_exists('wp_email_capture_form')) { wp_email_capture_form(); } ?>` 

If you want to insert the form within a page, insert into any post or page the string `[wp_email_capture_form]`. It will be replaced with a simple form.

You can also add a widget to any widget enabled area by going to Appearance > Widgets in the WordPress Administration.

If you need more help, please read this guide on [how to set up WP Email Capture](http://wpemailcapture.com/2012/10/how-to-set-up-wp-email-capture-free/?utm_source=installation&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture)

Stylings
--------
To style your form, you need to add to your CSS file the following ID declarations. `wp_email_capture` is for sidebar & template widgets, `wp_email_capture_2` is for on page forms.

```
#wp_email_capture
{

}
#wp_email_capture label.wp-email-capture-name
{

}
#wp_email_capture label.wp-email-capture-email
{

}
#wp_email_capture input.wp-email-capture-name
{

}
#wp_email_capture input.wp-email-capture-email
{

}
#wp_email_capture_2
{

}
#wp_email_capture_2 label.wp-email-capture-name
{

}
#wp_email_capture_2 label.wp-email-capture-email
{

}
#wp_email_capture_2 input.wp-email-capture-name
{

}
#wp_email_capture_2 input.wp-email-capture-email
{

}
```

Bugs/Suggestions/Support
========================
Please report any bugs, support and suggestions to the [WP Email Capture Support Page](http://www.wpemailcapture.com/support/?utm_source=support&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture)