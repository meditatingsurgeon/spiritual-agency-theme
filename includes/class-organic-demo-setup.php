<?php
/**
 * Configure One Click Demo Import with theme specific options
 *
 * @package Organic Agency
 * @since Organic Agency 1.0
 */

if ( ! class_exists( 'Organic_Demo_Setup' ) ) :
	/**
	 * Configures One Click Demo Import with theme specific demo and options
	 */
	class Organic_Demo_Setup {
		/**
		 * Adds filters to One Click Demo Import
		 */
		public function __construct() {
			add_filter( 'pt-ocdi/import_files', array( $this, 'set_import_files' ) );
			add_action( 'pt-ocdi/after_import', array( $this, 'ocdi_after_import_setup' ) );
			add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
		}
		/**
		 * Loads the import files
		 */
		public function set_import_files() {
			return array(
				array(
					'import_file_name'             => 'Default Demo Import',
					'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/default-demo-content.xml',
					'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/default-demo-customizer.dat',
					'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/default-demo-widgets.wie',
					'preview_url'                  => esc_url( 'https://organicthemes.com/demo/agency/' ),
				),
			);
		}
		/**
		 * Sets default pages
		 *
		 * @param @array $settings Array of settings.
		 */
		public function set_reading_options( $settings ) {
			$reading_settings = $settings['reading_settings'];
			if ( ! empty( $reading_settings ) ) {
				$homepage = get_page_by_title( html_entity_decode( $reading_settings['homepage'] ) );
				$blog     = get_page_by_title( html_entity_decode( $reading_settings['blog'] ) );
				if ( ( isset( $homepage ) && $homepage->ID ) && ( isset( $blog ) && $blog->ID ) ) {
					update_option( 'show_on_front', 'page' );
					update_option( 'page_on_front', $homepage->ID );
					update_option( 'page_for_posts', $blog->ID );
					return true;
				}
			}
			return false;
		}
		/**
		 * Sets WooCommerce pages
		 *
		 * @param @array $settings Array of settings.
		 */
		public function set_woocommerce_pages( $settings ) {
			if ( class_exists( 'Woocommerce' ) && ! empty( $settings['woocommerce_pages'] ) ) {
				foreach ( $settings['woocommerce_pages'] as $woo_name => $woo_title ) {
					$woopage = get_page_by_title( $woo_title );
					if ( isset( $woopage ) && property_exists( $woopage, 'ID' ) ) {
						update_option( $woo_name, $woopage->ID );
					}
				}
				return true;
			}
			return false;
		}
		/**
		 * Adds menu links to shop page in primary menu and vertical menu
		 */
		public function add_shop_page_to_menu() {
			$main_menu    = wp_get_nav_menu_items( 'Left Menu' );
			$primary_flag = false;
			if ( is_array( $main_menu ) ) {
				foreach ( $main_menu as $m ) {
					if ( property_exists( $m, 'post_title' ) && 'Shop' === $m->post_title ) {
						$primary_flag = true;
					}
				}
			}
			$main_menu = wp_get_nav_menu_object( 'Left Menu' );
			if ( false === $primary_flag && property_exists( $main_menu, 'term_id' ) ) {
				wp_update_nav_menu_item(
					$main_menu->term_id,
					0,
					array(
						'menu-item-title'     => 'Shop',
						'menu-item-object-id' => wc_get_page_id( 'shop' ),
						'menu-item-object'    => 'page',
						'menu-item-status'    => 'publish',
						'menu-item-type'      => 'post_type',
						'menu-item-position'  => 2,
					)
				);
			}
		}
		/**
		 * Sets navigation menus
		 *
		 * @param @array $settings Array of settings.
		 */
		public function set_nav_menus( $settings ) {
			if ( is_array( $settings['navigation'] ) ) {
				$locations = get_theme_mod( 'nav_menu_locations' );
				$menus     = wp_get_nav_menus();
				foreach ( (array) $menus as $theme_menu ) {
					foreach ( (array) $settings['navigation'] as $import_menu ) {
						if ( $theme_menu->name === $import_menu['name'] ) {
							$locations[ $import_menu['location'] ] = $theme_menu->term_id;
						}
					}
				}
				set_theme_mod( 'nav_menu_locations', $locations );
				return true;
			}
			return false;
		}
		/**
		 * Filter to be executed after import
		 */
		public function ocdi_after_import_setup() {
			$settings = array(
				'reading_settings'  => array(
					'homepage' => 'Home',
					'blog'     => 'Blog',
				),
				'woocommerce_pages' => array(
					'woocommerce_shop_page_id' => 'Shop',
				),
				'navigation'        => array(
					0 => array(
						'name'     => 'Left Menu',
						'location' => 'left-menu',
					),
					1 => array(
						'name'     => 'Right Menu',
						'location' => 'right-menu',
					),
					2 => array(
						'name'     => 'Mobile Menu',
						'location' => 'mobile-menu',
					),
					3 => array(
						'name'     => 'Social Menu',
						'location' => 'social-menu',
					),
				),
			);
			$this->set_reading_options( $settings );
			if ( class_exists( 'Woocommerce' ) ) {
				WC_Install::create_pages();
			}
			$this->set_nav_menus( $settings );
			update_option( 'organic_agency_demo_imported', 1 );
			flush_rewrite_rules();
			if ( class_exists( 'Woocommerce' ) ) {
				$this->add_shop_page_to_menu();
			}
		}
	}
	new Organic_Demo_Setup();
endif;
