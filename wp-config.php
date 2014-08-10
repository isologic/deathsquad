<?php
/**
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
define('DB_NAME', 'assemblywp');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 's3rpent666');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Xjy-|[PlaVRK}=$RV`l)UnmfQMl4Yb=|}MxUO5K)*:&M8F4XI_(^_-WRzR2_D-wi');
define('SECURE_AUTH_KEY',  '-|S)+%{tB!/<+p^jvC$9+B&bE,1+t:k.YWUvZ,LdxYYR+}@6$*N,6aA%EUFd^BC ');
define('LOGGED_IN_KEY',    '>*ocF$}1U;V)i}$X@wI=Hli7l[KO~|!XT2$ r$fiOtrj2irO>%K-3$&_HdA+4y/{');
define('NONCE_KEY',        '1lv$LJ@SCEz+$wk+g5.Fg0<%oAH*/#+Blqdi-)_F RF011rdqoU.sECu]jv1!et>');
define('AUTH_SALT',        'mRK^E$k[QO`?S;+s5xY&+rHuSk)R$N2/X8E|/PthF;}?D48_G%l6c08+XSaMvPJh');
define('SECURE_AUTH_SALT', 'H4AiiwuHC.M{pUWxBPuo>Aw6AOE(%Bv5oH]O:[{X3uiVK1]P7&XA-p|uYh$8L-4G');
define('LOGGED_IN_SALT',   '/,g[z+~S4{A^|H1e*dwBCWr3@9-%he^-G:GapfeOM|gMR8-{aG=hH-28v%V_b{Dx');
define('NONCE_SALT',       'g.N`^HLA<;-4mn9,ph!tWmPB}cxh/@C @e)aK#-Bd@@RSHE#z-l+|VOv`28<9Q#t');

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

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


define('FS_METHOD','direct');

/**
 * Limit the number of post revisions to prevent database bloating
 * https://managewp.com/enhanced-performance-code-snippets
 */

define( 'WP_POST_REVISIONS', 6 );
