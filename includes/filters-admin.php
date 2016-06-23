<?php

// Block direct access
if (! defined('ABSPATH')) {
    exit;
}

// Only in admin
if (! is_admin()) {
    return;
}
