<?php
/**
 * Primary navigation walker (Bootstrap + mega menu markup).
 *
 * Mega menu structure in Appearance → Menus:
 *
 * Services  → add CSS class: mega
 *   Pediatric Services
 *     Physical therapy
 *     Occupational therapy
 *     …
 *   Specialized Services
 *     …
 *   Health & Wellness Services
 *     …
 *
 * Enable “CSS Classes” under Screen Options on the Menus screen.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom walker for the primary header menu.
 */
class Revive_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Whether the current top-level branch is a mega menu.
	 *
	 * @var bool
	 */
	private $in_mega = false;

	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( 0 === (int) $depth && $this->in_mega ) {
			$output .= '<div class="mega-menu" id="services-mega-menu" role="region" aria-label="' . esc_attr__( 'Services menu', 'revive-integrative-health' ) . '" data-mega-panel>';
			$output .= '<div class="mega-menu__inner container"><div class="row g-4 g-lg-5">';
			return;
		}

		if ( 1 === (int) $depth && $this->in_mega ) {
			$output .= '<ul class="mega-menu__list list-unstyled mb-0">';
			return;
		}

		$output .= '<ul class="sub-menu">';
	}

	/**
	 * Ends the list after the elements are added.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		if ( 0 === (int) $depth && $this->in_mega ) {
			$output .= '</div></div></div>';
			return;
		}

		if ( 1 === (int) $depth && $this->in_mega ) {
			$output .= '</ul></div>';
			return;
		}

		$output .= '</ul>';
	}

	/**
	 * Starts the element output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes      = empty( $item->classes ) ? array() : (array) $item->classes;
		$has_children = in_array( 'menu-item-has-children', $classes, true );
		$is_current   = in_array( 'current-menu-item', $classes, true )
			|| in_array( 'current-menu-ancestor', $classes, true )
			|| in_array( 'current-menu-parent', $classes, true )
			|| in_array( 'current_page_item', $classes, true );

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
		$url   = ! empty( $item->url ) ? $item->url : '';

		// Column heading inside mega menu (linked when a real URL is set).
		if ( 1 === (int) $depth && $this->in_mega ) {
			$output .= '<div class="col-12 col-lg-4">';
			$heading_url = self::revive_navigable_url( $url );
			if ( $heading_url ) {
				$output .= '<h3 class="mega-menu__heading"><a href="' . esc_url( $heading_url ) . '" class="mega-menu__heading-link">' . esc_html( $title ) . '</a></h3>';
			} else {
				$output .= '<h3 class="mega-menu__heading">' . esc_html( $title ) . '</h3>';
			}
			if ( ! $has_children ) {
				$output .= '</div>';
			}
			return;
		}

		// Links inside a mega column.
		if ( 2 === (int) $depth && $this->in_mega ) {
			$link_url = self::revive_navigable_url( $url );
			if ( $link_url ) {
				$output .= '<li><a href="' . esc_url( $link_url ) . '" class="mega-menu__link">' . esc_html( $title ) . '</a></li>';
			} else {
				$output .= '<li><span class="mega-menu__link">' . esc_html( $title ) . '</span></li>';
			}
			return;
		}

		// Top-level item.
		if ( 0 === (int) $depth ) {
			$this->in_mega = in_array( 'mega', $classes, true ) && $has_children;

			$li_classes = array( 'nav-item', 'menu-item-' . (int) $item->ID );
			if ( $this->in_mega ) {
				$li_classes[] = 'site-header__mega-item';
			}
			if ( $is_current ) {
				$li_classes[] = 'current-menu-item';
			}

			$output .= '<li class="' . esc_attr( implode( ' ', array_map( 'sanitize_html_class', $li_classes ) ) ) . '">';

			$link_classes = array( 'nav-link', 'site-header__nav-link', 'p-0' );
			if ( $is_current ) {
				$link_classes[] = 'is-active';
			}

			$nav_url = self::revive_navigable_url( $url );
			$atts    = array(
				'href'  => $nav_url ? $nav_url : '#',
				'class' => implode( ' ', $link_classes ),
			);

			if ( $this->in_mega ) {
				$atts['id']                = 'services-mega-trigger';
				$atts['aria-expanded']     = 'false';
				$atts['aria-controls']     = 'services-mega-menu';
				$atts['data-mega-trigger'] = '';
			}

			if ( $is_current ) {
				$atts['aria-current'] = 'page';
			}

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( '' === $value && 'data-mega-trigger' === $attr ) {
					$attributes .= ' ' . esc_attr( $attr );
					continue;
				}
				$attributes .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
			}

			$output .= '<a' . $attributes . '>' . esc_html( $title ) . '</a>';
			return;
		}

		// Non-mega nested fallback.
		$nav_url = self::revive_navigable_url( $url );
		$output .= '<li class="nav-item"><a class="nav-link site-header__nav-link p-0" href="' . esc_url( $nav_url ? $nav_url : '#' ) . '">' . esc_html( $title ) . '</a>';
	}

	/**
	 * Return a navigable URL, or empty string for placeholders like "#".
	 *
	 * @param string $url Raw menu item URL.
	 * @return string
	 */
	private static function revive_navigable_url( $url ) {
		$url = trim( (string) $url );
		if ( '' === $url || '#' === $url || 0 === stripos( $url, 'javascript:' ) ) {
			return '';
		}
		return $url;
	}

	/**
	 * Ends the element output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Page data object.
	 * @param int      $depth  Depth of page.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( ( 1 === (int) $depth || 2 === (int) $depth ) && $this->in_mega ) {
			return;
		}

		if ( 0 === (int) $depth ) {
			$output     .= '</li>';
			$this->in_mega = false;
			return;
		}

		$output .= '</li>';
	}
}
