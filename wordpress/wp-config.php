<!-- This is just a template file. You will need to enter the appropriate information in your own wp-config file. -->
<?php

/*
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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


// WARNING!!!!!!!!!!!!! Tests to see if the file exists, first testing local, then staging, after defaulting to production if neither of the previous files exist.
// You will need to add the local and cruise files in your application directory.

if (file_exists( dirname( __FILE__ ) . '/../local' )) {
  // Local Environment

  define('WP_ENV', 'local');

  define('WP_DEBUG', true);

  define('DB_NAME', 'db_dev');

  /** MySQL database username */
  define('DB_USER', 'root');

  /** MySQL database password */
  define('DB_PASSWORD', 'root');

  /** MySQL hostname */
  define('DB_HOST', 'localhost');

  /** Database Charset to use in creating database tables. */
  define('DB_CHARSET', 'utf8');

  /** The Database Collate type. Don't change this if in doubt. */
  define('DB_COLLATE', '');

} elseif (file_exists( dirname( __FILE__ ) . '/../cruise' ) ) {

  // Staging Environment
  define('WP_ENV', 'cruise');

  define('WP_DEBUG', true);

  define('DB_NAME', 'db_cruise');

  /** MySQL database username */
  define('DB_USER', 'cruise_user');

  /** MySQL database password */
  define('DB_PASSWORD', 'cruise_password');

  /** MySQL hostname */
  define('DB_HOST', 'cruise host server');

  /** Database Charset to use in creating database tables. */
  define('DB_CHARSET', 'utf8');

  /** The Database Collate type. Don't change this if in doubt. */
  define('DB_COLLATE', '');

} else {

  // Production Environment
  define('WP_ENV', 'production');

  define('WP_DEBUG', false);

  // ... production db constants

  define('DB_NAME', 'db_production');

  /** MySQL database username */
  define('DB_USER', 'production_user');

  /** MySQL database password */
  define('DB_PASSWORD', 'production_password');

  /** MySQL hostname */
  define('DB_HOST', 'production host server');

  /** Database Charset to use in creating database tables. */
  define('DB_CHARSET', 'utf8');

  /** The Database Collate type. Don't change this if in doubt. */
  define('DB_COLLATE', '');
}


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9Vw+q#<Vp|@8jE/Z9};@FLZ5nB^@}%/l!AGS(]K+c<?oEA0pTT37z+S$Gy=CdG:;');
define('SECURE_AUTH_KEY',  'X&dQ(`4~G~fR=!-A5!o`+x-|b`Y1CX6S9Zk12x%^nI)Z2 Z,,7%YKBvZvez_Mu0z');
define('LOGGED_IN_KEY',    'Y)-d<hVKy3u#:Y|ymW-a23,zUuUl#J27`i[{+uZ_*yi;c,8^]3 %}dcV),C64V]:');
define('NONCE_KEY',        'b:y|@bJt;QAA+}i/{v}_U_3;n+ .]zJZliDd45-s/plckwOQ08eYB6>:>A)NtjOk');
define('AUTH_SALT',        '6B4}T8P2F-:L-]V(gY~I.u,?P^x/`M;;rg#c ,nx[!jRC`|auH?,]eNyiC|k*/|O');
define('SECURE_AUTH_SALT', 'F8*W;l-,|C!{,No;J0;$%>YI,.BGomOsUBd2-+%nWoAHtlu: 5f+xE-wpguoY@{4');
define('LOGGED_IN_SALT',   'UGQL;U[ZZzM@-D1S``JNy1G4&I~lzpnT_Z8@{MLIbp/tcM!m`Faw/e &u]-}<opW');
define('NONCE_SALT',       '6Mbrk=MM,36,#oH|=6O.&#p,SFo<rX[14tO?W[SE]{3e*C]|kTo%h9t?zydZvrd#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');