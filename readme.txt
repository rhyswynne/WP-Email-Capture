=== WordPress Email Marketing Plugin - WP Email Capture ===
Tags: email marketing, email, mailing list, widget ready, gutenberg ready, gdpr
Requires at least: 5.0
Tested up to: 6.2
Version: 3.11.1
Stable tag: 3.11.1
Contributors: rhyswynne
Donate link: https://www.wpemailcapture.com/premium/?utm_source=donatelink&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture

Double opt-in form for building your email list. Define landing pages to distribute your ebooks & software.

== Description ==
This creates a 2 field form (Name & Email) for capturing emails. Email is double opt in, and allows you to forward opt in to services such as ebooks or software. When you are ready to begin your email marketing campaign, simply export the list into your chosen email marketing software or service. WP Email Capture now comes with a number of [integrations and extensions](https://www.wpemailcapture.com/downloads/?utm_source=description&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture), including [WP Email Capture Premium](https://www.wpemailcapture.com/premium?utm_source=description&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture) allows you to build multiple lists, track stats and have custom fields and templates

WP Email Capture Free Features:-

* Widget Ready.
* Uses Wordpress' internal wp_mail function for sending mail.
* Easily integrated with posts & pages.
* Dashboard Widget.
* GDPR Friendly
* Export data into CSV files, compatible with most major Email Marketing Programmes (including Aweber, Mailchimp, Groupmail, Constant Contact)
* Double opt in, so compatible with CAN-SPAM act.
* reCAPTCHA integration
* And completely free!

For more details please visit the official site of [WP Email Capture](https://www.wpemailcapture.com/?utm_source=description&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture)

**Now Released is WP Email Capture Premium!** You get all the above features plus the following:-

* Stat tracking - track the visitors to your site and where your sign ups come from.
* Autoresponders - Create an autoresponder email, an email sent to the user when they sign up to your site.
* Multiple lists - Create multiple lists for your site.
* Build External Lists - If you have a Constant Contact, Mailchimp or Aweber account, you can use WP Email Capture to build to these services directly.
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

== Installation ==
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

== Bugs/Suggestions/Support ==
Please report any bugs, support and suggestions to the [WP Email Capture Support Page](http://www.wpemailcapture.com/support/?utm_source=support&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture)

== Stylings ==
To style your form, you need to add to your CSS file the following ID declarations. `wp_email_capture` is for sidebar & template widgets, `wp_email_capture_2` is for on page forms.

`#wp_email_capture
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

}`

== Screenshots ==
1. The Dashboard Widget
2. The Options Page
3. It's appearance within the template

== Frequently Asked Questions ==
= Can I see/export/autoconfirm "Unverified" Email Addresses? =
No.

= Why Not? =
In accordance with the CANSPAM act, I have hidden Unverified emails from view. They can not be seen. Sorry, but the temptation is too big to spam unverified emails. Hence the removal.

= Can Registered Users access the "thank you" page after signup? They try signing up again and get a 'user has already been registered' error =
Yes they can, however they can't go through the registration process. If you are using [WP Email Capture Premium](http://wpemailcapture.com/premium/?utm_source=faq&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture), you can send an autoresponder after signing up (which can contain a link to the "thank you" page). Alternatively, add a notice on your landing page to encourage users to bookmark the page.

= I am Upgrading to WP Email Capture 2.3+, why has my WP Email Capture Sidebar Widget disappeared? =
The WP Email Capture version 2.3 saw the introduction of multiple sidebar widgets. This was coded differently to the pre 2.3 WP Email Capture sidebar widget. As such you will have to recreate the sidebar widget. It's easy to do, but apologies for this - I am working on a fix!

= Often My Email Is Going Into Spam, how can I stop this? =
The most likely cause is by putting an email address that doesn't exist in the "From Which Email Address". Please don't put a noreply@, as spam eats this up. Also, make sure your email address is from your server (rather than a @gmail/@hotmail/@yahoo email address). Finally, try improving your deliverability rate by sending your emails through SMTP using [WP Mail SMTP](http://wordpress.org/plugins/wp-mail-smtp/).

= Does this piece of software send out email? =
No. I feel that to do so would be counter productive, as sending out email could have a detrimental effect on your server. There are a number of services we recommend, such as Aweber, to send out lists built on WP Email Capture.

= Does it work with Wordpress MU? =
This plugin is unsupported for Wordpress MU. Some people have reported success in using it. Others haven't. I have been unable to figure out why (I've been unable to get it working for Wordpress MU).

= For some reason, no emails are being sent. No errors either. What could be the issue? =
This is sometimes the case if your hosting (usually Godaddy) disables certain ways of sending mail. If you use [WP Mail SMTP](http://wordpress.org/extend/plugins/wp-mail-smtp/), you can send emails in a different way that works.

= Does it work with [theme_name]? =
This plugin does use widgets, so probably yes :)

= How do I include the name in my emails I send to people? =
Wherever you put in %NAME% (spelt exactly like that, uppercase as well), it will be replaced with the name given by the user.

== Change Log ==
= 3.11.1 =
* Tested with 6.2

= 3.11 =
* Major update - fixed a Unauthenticated Broken Access Control security bug which could allow non authenticated users to download the lists.

= 3.10 =
* Major update - fixed a XSS security bug.

= 3.9.3 =
* Tested with 6.0
* Made compatible with Moosend
* Fixed a notice bug in the recaptcha which meant it would not work for certain forms with WP_DEBUG switched on

= 3.9.2 =
* Tested with 5.9
* Fix a bug that reCAPTCHA wasn't working for particular forms as we load jQuery late.
* Updated the main block to use more Gutenberg calls

= 3.9.1 =
* Tested with 5.7

= 3.9 =
* Added the ability to spam check using reCAPTCHA

= 3.8.2 =
* Tested to 5.5.

= 3.8.1 =
* Version with all the missing files from 3.8!

= 3.8 =
* Added a new button to the classic editor allowing you to place the form anywhere.

= 3.7.3 =
* Fixed a small bug in the site.

= 3.7.2 =
* Tested to 5.3.

= 3.7.1 =
* Corrected the "Requires at Least" as it was showing as being incompatible in the plugin store (when it is).

= 3.7 =
* Added filter - `wp_email_capture_change_user_present_error_url`, needed for an additional plugin - [WP Email Capture: Returning User Redirect](https://www.wpemailcapture.com/downloads/wp-email-capture-returning-user-redirect/?utm_source=changelog&utm_medium=wordpressorgreadme&utm_campaign=wpemailcapture).
* Tested with WordPress 5.2
* Fixed a few CSS changes on the option pages.

= 3.6.6 =
* Tested up to 5.1

= 3.6.5 =
* Tested with Constant Contact so reflected help screens to mention that.

= 3.6.4 =
* Clarified further a couple of options that people were having problems with.

= 3.6.3 =
* Some files didn't manage to upload. I've now pushed them live.

= 3.6.2 =
* Fixed a bug in Gutenberg.
* Checking for "register_block_type" rather than "the_gutenberg_project" in prep for 5.0

= 3.6.1 =
* Added Gutenberg information to the help section.
* Removed a spelling mistake in one of the URL's on the setup form.

= 3.6 =
* Fix Gutenberg compatability bug. If you use Gutenberg, you may have to recreate your blocks, hence the version major bump. Otherwise you should be fine.

= 3.5.4 =
* Added a note should a version of MySQL earlier than 5.6 is shared.

= 3.5.3 =
* Fixed a bug that saving with GDPR switched off resulted in a display error (even though it was saved correctly)

= 3.5.2 =
* A few cosmetic changes to the help pages. Could use more work but is a bit neater for now.

= 3.5.1 =
* Fix a bug that the Privacy Policy checkbox didn't work on widgets.

= 3.5 =
* Integration with WordPress' GDPR checker.
* You can have a checkbox on your forms, explicitly giving consent to users to sign up to your newsletter.
* You can delete data after a period of time on the site.
* You can search the database, allowing you to see and delete what data you have for people
* Improved the changelog routine, allowing it to be updated more frequently.

= 3.4.2 =
* Introduced "wp_email_capture_is_premium" function, to make further development easier.
* Fixed a bug from Gutenberg 3.4 that called a undefined variable (blocks.source.children & blocks.source.attr).
* Switched from wp.blocks.InspectorControls.TextControl to wp.components.TextControl.

= 3.4.1 =
* Fixes a fatal error

= 3.4 =
* Added Default Styles should you wish to activate them.
* Gutenberg Compatibility!

= 3.3.4 =
* Fix a few dead links in the plugin

= 3.3.3 =
* Fix bug in header on export (props Ov3rfly).
* Tested in 4.9

= 3.3.2 =
* Make it compatible with 4.8
* Make the "Buy Link" in WP Email Capture include a coupon
* Include links to compatible services on the Plugin Dashboard

= 3.3.1 =
* Fixes a conflict with other plugins that send HTML emails.

= 3.3 =
* Introduced the ability to have "HTML" enabled lists.
* Introduced the ability to send emails without headers. Useful for Amazon SES.
* Added a charset on export of CSV. (Props Ov3rfly)

= 3.2 =
* Correction in the German translation (props [Lars Kasper](http://larskasper.de/))
* Added a wp_email_capture_extra_checks action, that will allow people to run checks on the name/email address.
* Removed some legacy code that was commented out.
* Fix an encoding issue for new installs, now the tables match the database's encoding.
* Fixed a bug for new installs that had a "The plugin generated XXX characters of unexpected output during activation.".

= 3.1.4 =
* Fixed a bug that caused an "Unexpected Output" on some database setups.
* Used UNIQUE KEY rather than PRIMARY KEY, so activation and deactivation doesn't cause database errors.

= 3.1.3 =
* Added wp_email_capture_complete_before_redirect action. Allowing data to be manipulated before the redirect.
* Added Extensions area of dashboard.

= 3.1.2 =
* Reward linkers with a voucher code.
* Included the "Last Temporary Signup" date, so they get know the last attempted signup.
* Tested up to 4.5.

= 3.1.1 =
* Removed a redundant file that, if hacked in, could lead to an injection of content. This file was *not* called normally but in order to remove it upgrade to this version. ** Update strongly required **
* Fixed a bug which saw a notice appear of a missing option on the upgrade and dashboard page.
* Removed a double header in Dashboard widget (props Ove3rfly).
* Correct textdomain used in some files (props Ov3rfly).
* Removed all PHP closing tags through the site (props Ov3rfly).

= 3.1 =
* Removed the default widget title should widget text be blank (props [Hassan Raza](http://hassan-raza.com/)).
* Changed word from "Update" to "Upgrade" for large lists as it was confusing people.
* Changed to new Text Domain as per WordPress' new internationalisation integration (wp-email-capture).

= 3.0.2 =
* Fixed an error with "Error: " displaying on the free version.

= 3.0.1 =
* Fixed a minor security issue in the display.php
* Removed Tracking (for now)

= 3.0 =
* Massive refactor of code, to help improve it.
* Fixed a bug that the "Hide Notice" dismissive now works.
* Updated French Translation (thanks [Andrew](http://www.acusti.ca/))
* Added Croatian Translation (thanks [Lem Treursić](http://grafika-dizajn.com/))
* Added Welcome Screen
* Added P tag around text widget introduction.
* Added better help documentation within the plugin.
* Added signup & confirm actions, to allow users to remove/add their own actions.
* Added a filter to the display form, so it can be changed.
* Add a filter for other subscription plugins (props [Dylan Kuhn](http://www.cyberhobo.net/))
* Changed menu structure
* Made compatible with WordPress 4.3, with new widget structure.
* Made compatible with new language packs.

= 2.11 =
* German Translation Updated (thanks Ove3rfly)
* Added the filter `wp_email_capture_dashboard_capability`, which means you can choose the capability you wish users to access the dashboard widget (thanks Ove3rfly).
* Added a few small fixes with the text (thanks Ove3rfly).

= 2.10 =
* Italian Translation Done (thanks [Guiseppe](http://it.gravatar.com/gpmarino)!)
* Serbian Translation Done (thanks [Borisa](http://www.webhostinghub.com/)!)

= 2.9 (17/12/13) =
* Fixed a small bug that produced warnings should security fields not be passed.
* Style buttons in a style for WordPress 3.8.
* Remove a rogue mysql_real_escape_string() call making it compatible with WordPress 3.9.
* Introduced stylings.

= 2.8 (10/11/13) =
* Introduced Spanish Translation (thanks David Bravo!)
* Added a feature whereby you can select the delimiter you wish to use.

= 2.7.7 (08/07/13) =
* Fixed a few bug fixes that were spotted in Debug Mode (from forum member Ov3rfly).

= 2.7.6 (12/06/13) =
* You can now translate error messages.

= 2.7.5 (28/01/13) =
* Added an option "wp_email_capture_theme_affiliate_link", so theme designers can add this option on activation with their affiliate link to WP Email Capture.

= 2.7.4 (14/01/13) =
* Added "title" attributes to the form fields, allowing WP Email Capture to play better with themes.

= 2.7.3 (06/01/13) =
* Fixed the emails so that HTML characters (ampersands, speech marks, etc) in names/subjects/content are encoded properly.

= 2.7.2 (11/12/12) =
* Compatible with WordPress 3.5. Critical upgrade if you're using WP 3.5
* Fixed an admin page error so if the news feed wasn't pulling from my site, then you will get an empty box, rather than an ugly error.

= 2.7.1 (24/11/12) =
* Fixed a small bug that appears that error messages weren't appearing when sites had the defeault permalink structure.
* Fixed a redirection bug that users using the default URL structure were having, that caused a usability error.

= 2.7 (20/11/12) =
* Upgraded Hungarian Translation (thanks [Surbma](http://surbma.hu/)!)
* Rewritten areas of the readme file as it was confusing people (sorry!)

= 2.6 (07/10/12) =
* Added a checkbox that allows site owners to specify if "Name" is a required field.

= 2.5.1 (12/08/12) =
* Recoded the RSS feed fetching code so it works on more servers and doesn't use a http based referrer.

= 2.5 (01/08/12) =
* A nag (which you can hide) should you not have the plugin set up correctly with a subscription or confirmation page.
* More CSS classes on each individual elements of the form.

= 2.3.7 (23/07/12) =
* Improved wording of on page options, as well as documentation.

= 2.3.6 (08/07/12) =
* Better error handling, if the settings for the plugin aren't filled in then the plugin doesn't fail.

= 2.3.5 (01/06/12) =
* Added a "textwidget" class to the Widget Text Area so you can style it the same as all other text.
* More things you are able to translate, including buttons and more!
* Added Hungarian Translation.

= 2.3.1 (22/5/12) =
* Bug fixes so notices shouldn't appear in debug mode.
* Added a for attribute to the form for accessibility.

= 2.3 (09/5/12) =
* Added support to multiple widgets.
* Added language support for the Dutch language.

= 2.2 (17/4/12) =
* The [Jemjabella](http://www.jemjabella.co.uk) update, after the individual who supplied most of the bug fixes, cheers!
* Added language support for Brazilian Portugese & German.

= 2.1.1 (03/02/12) =
* Actually fixed the display bug talked about in 2.1
* Edited the Dashboard widget so that it's only displayed to user admins.

= 2.1 (30/01/12) =
* Internationalisation Completed - with French Language Pack
* Fixed a Small Display bug with the Plugin that occured in latest version of Wordpress.

= 2.0.1 (28/10/10) =
* Fixed a small security bug which occurred in the previous version.

= 2.0 (3/10/10) =
* Switched functions to use the non depreciated functions
* Compatible with Spam Free
* Added a "Delete entire list" button in Wordpress.

= 1.9 (20/01/10) =
* Fixed a small bug that resulted in the display for [The plugin does not have a valid header.]
* Fixed a small phpmail bug

= 1.8.1 (13/01/10) =
* Included more information in sent mail including IP, Date & Referral Page

= 1.6 (18/10/09) =
* You can now delete people from the confirmed members list (requested update!)

= 1.5 (04/10/09) =
* Fixed small error on the error checking form.

= 1.4 (03/10/09) =
* Added a check for duplicate emails.

= 1.3 (30/09/09) =
* Added a new feature where you can mention the name of the recipient of the email within the email by using the %NAME% string.
* Better default title & text for the WP Email Capture Widget.
* Fixed a bug that dropped the last character of the "From" name.

= 1.2 (27/09/09) =
* Fixed errors with the programme when using non pretty permalinks (they now work now)
* Compatible with windows based PHP configurations (1.1 introduced a function that didn't work on windows boxes).

= 1.1 revision 2 (24/09/09) =
* Fixed compatability issue with All in One SEO.
* Blogs which are on a subdomain now can use the plugin (http://www.domian.com/wordpress/)

= 1.1 revision 1 (23/09/09)  =
* Fixed small upgrade bug

= 1.1 (22/09/09) =
* Fixed short tag problem in tempdata.php
* Emails that are not valid emails aren't processed

= 1.0 RC 1 (17/09/09) =
* First Release!
* Dashboard Widget added.

= 0.4 (14/09/09) =
* Used more secure internal wp_mail class for sending out mail
* Implemented [wp_email_form] class for implementing plugin on form

= 0.3 (12/09/09) =
* Switch to headers, rather than meta refreshes for updating the page

= 0.2 (09/09/09) =
* Fixed small error in the plugin when using permalinks
* Implemented more security to the plugin

= 0.1 (07/09/09) =
* Plugin Launched