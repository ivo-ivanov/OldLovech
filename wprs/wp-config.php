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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'vjbcnnnB0v5EIzJ4ClV8BAvjr7C5JJc+v0GuDx19O1B9k33aO8ts+647JcTqmo4HqVcT2wTVjvQuYXkas1lB7A==');
define('SECURE_AUTH_KEY',  'UqBq7eSrpuBNZxfl2rbdUNOGt7QyCxxi2BZcftkrc3tbcgPrOUwPnocczyUuohysivMFgq577YGdGwzOpKJ05w==');
define('LOGGED_IN_KEY',    '+kpGE2PiQQgo00XjQcR+0rXy5C3sYJPZbUmIdNhzys2JWJDjIxkAy/GMsSxivLvfs6YWwhttNMbmfIIZts8+VQ==');
define('NONCE_KEY',        'kWj93MFwCTyM5cilbPV3lTpUzbBZW+HyCacfwQJGMBGmUOykh9SO995ltFPNr66ZWClkAyq7NI3zIlre3lPcGg==');
define('AUTH_SALT',        'UTXA7zDN8MK2waGfDNNujBMCcayTJl4aa+wDoOYO7Lo8BC4lBu3K9GYng5wZJ8/zHEhZoSQXghDWhdDlj+Ucng==');
define('SECURE_AUTH_SALT', '6tht9TPKbq/GLht8hejgeJ8NC+HqCMBuS8K+966f+TZZw4nWODiag9h2pPUZEhGCMUsnwR0R63sC/YB5hIL3ug==');
define('LOGGED_IN_SALT',   'n30eoydNrZOV++hkFNm+DS/5uenETszcje6vG/reP0JDjBcjBf/MyEAtfk0oKdeZrfr6VntIqi0cuLpaV5t7uw==');
define('NONCE_SALT',       'upCXCYMkMX+hmsQur5uiofwfNrC1jwBpjVxYcvFnhjcE/Yb7ZHT39UsgBZHwC559+Vv4vpBhGCH3A48vMPRXoQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
