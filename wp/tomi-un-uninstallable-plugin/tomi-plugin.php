<?php
/*
Plugin Name: Tomi Un-uninstallable Plugin
Description: A WP pluign that is hard to uninstall
Version: 0.0.1
Author: Tomi Novak
*/

/*  Copyright 2015  Tomi Novak (email : dev.tomi33@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('TOMI_PLUGIN', __FILE__);

class TomiPlugin {

    function __construct() {
        register_deactivation_hook(TOMI_PLUGIN, array($this, 'deactivate'));
    }

    public function deactivate() {
        /* optional */
        $url = site_url() . '/wp-admin/plugins.php';
        header('Location: ' . $url);
        /* end optional */
        die(':D');
    }

}

$TomiPlugin = new TomiPlugin();
