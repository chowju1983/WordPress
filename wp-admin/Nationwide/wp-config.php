<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Nationwide' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ROcp@oS@wfh,(K-?h0YP>tjbp7gyeFS=j8&P:xq;!0:SVRANi4%)VD;l0uklRjw/' );
define( 'SECURE_AUTH_KEY',  '$&u!J.|S*`d9k_k#*%t*)AOus@SbA#6f]>N[(86m}I!6]<%sEEO:Im^9hsZ:p&:V' );
define( 'LOGGED_IN_KEY',    'xKI{w2.E!L7F,?=@*6a4wXEVrfT>AG&5^h{dG[~Ylnx4<jrO4XUHK=K%B>tFFCXf' );
define( 'NONCE_KEY',        ';1Rr>a~;AZ=$PMT#;(rg_BV-7Rqn-)0N@TQ>3 z!bMhm1|`_cGI94Ury SD5#oC ' );
define( 'AUTH_SALT',        'f=4!{c+{le9,T:bgy]>c-9>Piss&(=,N7vE(y-21$0Dr/p{D>#{R[Dj n/{V>K{P' );
define( 'SECURE_AUTH_SALT', '<UoK]`?$B_x$9h-VXJW:u/M(BS-.RsS2tWpe~P4Dao#j~qD/CTB;3!`|8su*7:|`' );
define( 'LOGGED_IN_SALT',   'E5%?v}--XK9bO8ZJG5MV,;|73,XiIwpkNnrB5`{?A,hw&v}b^8Y%b:OeL7Z7g!@^' );
define( 'NONCE_SALT',       '9Zi cw8Vw^)Cg&ec]O-<y2OI;HzL,rXD,0quI7GcQ8`a#bNtiQ|.yPw]a td:Kwm' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
