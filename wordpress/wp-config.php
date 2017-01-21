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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nuartaberdeen');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'ClA4`;lN68ps5_z$pHgoJ((&nyvd=9|az$PC|~Cw]7jMA&`aT49Sc*Si^P>{Z= 5');
define('SECURE_AUTH_KEY',  'KaTtjd|/r.!T{CJUG%zK?gF#done2(:g>${6SQcAXEDyySa50WB=w@D]&2f|[4KH');
define('LOGGED_IN_KEY',    'L09@K!E<PB>kSN~D6X!C*P5-TDO@yCvy]jqKb DMooV+4pg6Pr<UkJN>]:OY1H %');
define('NONCE_KEY',        'sh6G_o@Tmws2+)krQB.;<3|f>p}tpVTEIEX*-|M@kJAhvtKW*myjdLvKO>|8jU-y');
define('AUTH_SALT',        '2s&g]<NA}l)]}$_^PE!O-[MuYq];Vy4<SMRFY[Do@@ftW!(#3Y!Z&3yJ_l`T1mP@');
define('SECURE_AUTH_SALT', '~r(Yssq0f+On.}}xRn4?mlPLn02~H.kq^k&S_[1-#1Jj#u[)a5zqRI$FTkkvk@(c');
define('LOGGED_IN_SALT',   ')jw.B ~N,PudDXR<WC#Z$]yHWhMQsGj9kJJ,VP~TgB@^fIh**q0NF7I-Qu|P5YJ.');
define('NONCE_SALT',       'SFm uo=Xm=v7l),bF19;Z5Qe(|1#wv+LZ1*WTRp)jo=]|vc@81)9L|,DQJpEYn;2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'na_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
