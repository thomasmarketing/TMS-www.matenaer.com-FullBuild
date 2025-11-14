<?php
/**
 * PHPUnit bootstrap for RPM Default Theme (Bitbucket Pipelines)
 * Runs without WordPress (no wp-load.php required)
 */

$ds = DIRECTORY_SEPARATOR;
$tests_dir = __DIR__;

// Load Composer autoloader if available
$autoload = realpath($tests_dir . $ds . '..' . $ds . '..' . $ds . 'vendor' . $ds . 'autoload.php');
if (file_exists($autoload)) {
    require_once $autoload;
} else {
    fwrite(STDERR, "Composer autoload not found. Run 'composer install' before testing.\n");
    exit(1);
}

// Optional: load your test file if needed
$theme_test_file = realpath($tests_dir . $ds . '..' . $ds . 'test.php');
if ($theme_test_file && file_exists($theme_test_file)) {
    require_once $theme_test_file;
}
