<?php

/**
 * White labeling for the theme builder.
 *
 * @since 1.0
 */
final class FLThemeBuilderWhiteLabel {

	/**
	 * @return void
	 */
	static public function init() {
		add_filter( 'all_plugins',         __CLASS__ . '::plugins_page' );
		add_filter( 'gettext',             __CLASS__ . '::plugin_gettext' );
		add_filter( 'fl_plugin_info_data', __CLASS__ . '::fl_plugin_info', 10, 2 );
	}

	/**
	 * White labels the plugin update lightbox.
	 *
	 * @since 1.10.3.1
	 * @return string
	 */
	static public function fl_plugin_info( $info, $response ) {
		if ( false !== strpos( $info->name, 'Beaver Themer' ) ) {
			$brand = FLBuilderModel::get_branding();
			if ( __( 'Page Builder', 'fl-theme-builder' ) !== $brand ) {
				$info->name = $brand . ' - Themer Add-On';
			}
		}
		return $info;
	}

	/**
	 * White labels the Themer plugin using the gettext filter
	 * to cover areas that we can't access like the Customizer.
	 *
	 * @since 1.0.3.1
	 * @return string
	 */
	static public function plugin_gettext( $text ) {
		global $pagenow;
		if ( is_admin() && in_array( $pagenow, array( 'plugins.php', 'update-core.php' ) ) && 'Beaver Themer' == $text ) {
			$brand    = FLBuilderModel::get_branding();
			$default  = __( 'Page Builder', 'fl-theme-builder' );
			if ( $default != $brand ) {
				$text = $brand . ' - Themer Add-On';
			}
		}
		return $text;
	}

	/**
	 * White labels the themer builder on the plugins page.
	 *
	 * @since 1.0
	 * @param array $plugins An array data for each plugin.
	 * @return array
	 */
	static public function plugins_page( $plugins ) {
		$default  = __( 'Page Builder', 'fl-theme-builder' );
		$branding = FLBuilderModel::get_branding();
		$key	  = plugin_basename( FL_THEME_BUILDER_DIR . 'bb-theme-builder.php' );

		if ( isset( $plugins[ $key ] ) && $branding != $default ) {
			$plugins[ $key ]['Name']	   = $branding . ' - Themer Add-On';
			$plugins[ $key ]['Title']	   = $branding . ' - Themer Add-On';
			$plugins[ $key ]['Author']	   = '';
			$plugins[ $key ]['AuthorName'] = '';
			$plugins[ $key ]['PluginURI']  = '';
		}

		return $plugins;
	}
}

FLThemeBuilderWhiteLabel::init();
