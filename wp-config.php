<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sueerik_WPKarisan');

/** MySQL database username */
define('DB_USER', 'sueerik_karisan');

/** MySQL database password */
define('DB_PASSWORD', '[!RDmN;7FR=B');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
// define('AUTH_KEY',        '.n-Fz IK>s00g6E5N[*vY?I*@&~bmlOKDY~,s3{f/Y05atn-TPqjmAQAFv~+cs#&');
// define('SECURE_AUTH_KEY', 'YcHXoihSkaWllTjDwDJr|Ealg{#Lb#jV!)Nwwq1,CgJ`p,*Z?,%Ir)8GuY4BDEFY');
// define('LOGGED_IN_KEY',   '|H)@Fkc2Wg{C.f@0x4V|+go0P;NE9;P?zI^!//h_<8C|fk=H9Z*Qx&dqT`S91LJY');
// define('NONCE_KEY',       '&E#+uNfSy6?}Qdr~4WH^Qu-*M$EeC;S;f ^-=>r(I#hIaN.IF+o2$xQ{+{9O$g;G');

define('AUTH_KEY',        'zQb,%BA`1f1]E}M QER$W-YoIXWh|uj.*o|8FRu-53il->Ox!$05A:+-bGk|bwg[');
define('SECURE_AUTH_KEY', '}A[#<:vbD5bvr&H}[+;G,%2$WKIHdWOe&6fK/B|),x&hg>sD~:$=k~_d^K8%5yz_');
define('LOGGED_IN_KEY',   'Mv[x.5<q+j{}vAR%6HP3?K;=m&YPI:+jXExEC?V!f8Yj;0SXgNU[+(V/$r.KoV,_');
define('NONCE_KEY',       '+apT(16-Xj2m~<V@NHC9tE[,x FF;+pdA,&peG(7q&1&v%LH&:xUJ*[TY[y,8e1y');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'karisanmedia_wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
