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
define('DB_NAME', 'jaygro5_g3cbohv');

/** MySQL database username */
define('DB_USER', 'jaygro5_g3cbohv');

/** MySQL database password */
define('DB_PASSWORD', 'BggjKb8wBQQx5');

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
define('AUTH_KEY',         'yquunhdfomgcfvz8nxpl4udnffdnwkcchnuebj8wrkor4ynkutiqxqt1kzix4o6r');
define('SECURE_AUTH_KEY',  'oplszjjrre0sumblaq7fzhkigebroctpetldcglmhjsezcfghrrnlsns0kmnxq0n');
define('LOGGED_IN_KEY',    'mljoknh09tsr5hvd4m2ygvwmakzndtaenzh9lqf5wud56uxhpets7jw0vnrqhmcu');
define('NONCE_KEY',        'upxc7gys6zzquxc19dfbkufmoswinaiwjg3rc2251k8hurtpfdgsmss2tew10fv5');
define('AUTH_SALT',        'sb5pfuqdozboiozf39jyhm9nyrxqtoobssdlrdw6csubun7luwoznrafojbztmt2');
define('SECURE_AUTH_SALT', 's8pj8ocgxhvv4kmi80nck38miyacfigafzpth4qbhr9lp0tqreryjww4kg9huna9');
define('LOGGED_IN_SALT',   'nedflasvbbnpmix0gdmnvn6pmbtm1yfqzuemrcgukuxttz0zh4bm35vbz0ubelza');
define('NONCE_SALT',       'ni6c3tl7ad7iy5oic7mw0nyfgh1ags2jueuqra0qctsp72gz8odmn9cmevrgaxt9');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
