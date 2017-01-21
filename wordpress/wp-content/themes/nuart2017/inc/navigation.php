<?

// class Blank_walker_nav_menu extends Walker_Nav_Menu {

//     private $current_parent;
//     /**
//      * Starts the list before the elements are added.
//      *
//      * @see Walker::start_lvl()
//      *
//      * @since 3.0.0
//      *
//      * @param string $output Passed by reference. Used to append additional content.
//      * @param int    $depth  Depth of menu item. Used for padding.
//      * @param array  $args   An array of arguments. @see wp_nav_menu()
//      */
//     function start_lvl( &$output, $depth = 0, $args = array() ) {
//         // depth dependent classes
//         $str_empty = isset($this->current_parent) ? 'sub-cur-active' : 'no-sub-nav';
//         $output .= '<div class="sub-nav '.$str_empty.'">';
//         $output = trim($output);
//     }

//     /**
//      * Ends the list of after the elements are added.
//      *
//      * @see Walker::end_lvl()
//      *
//      * @since 3.0.0
//      *
//      * @param string $output Passed by reference. Used to append additional content.
//      * @param int    $depth  Depth of menu item. Used for padding.
//      * @param array  $args   An array of arguments. @see wp_nav_menu()
//      */
//     function end_lvl( &$output, $depth = 0, $args = array() ) {
//         $output .= '</div>';
//         $output = trim($output);
//     }

//     /**
//      * Start the element output.
//      *
//      * @see Walker::start_el()
//      *
//      * @since 3.0.0
//      *
//      * @param string $output Passed by reference. Used to append additional content.
//      * @param object $item   Menu item data object.
//      * @param int    $depth  Depth of menu item. Used for padding.
//      * @param array  $args   An array of arguments. @see wp_nav_menu()
//      * @param int    $id     Current item ID.
//      */
//     function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

//         $this->current_parent = null;
        
//         if($depth == 0)
//         {
//             $current_element_markers = array( 'current-menu-item', 'current-menu-parent', 'current-menu-ancestor' );
//             $current_class = array_intersect( $current_element_markers, $item->classes ); 

//             // If element has a 'current' class, it is an ancestor of the current element
//             $ancestor_of_current = !empty($current_class);  

//             $item->classes = apply_filters( 'nav_menu_css_class', array_filter( $item->classes ), $item, $args );
//             // If this is a top-level link and not the current, or ancestor of the current menu item - stop here.
//             if (in_array('current_page_parent', $item->classes) || 
//                 in_array('current-menu-parent', $item->classes) || 
//                 (in_array('menu-item-has-children', $item->classes) && in_array('current-menu-item', $item->classes)))
//             {
//                $this->current_parent = $item;
//             }
//         }
//        /* if($depth > 0 && (!isset($this->current_parent) || $this->current_parent->ID != $item->menu_item_parent))
//         {
//             return;
//         }*/

//         $output = trim($output);

//         $class_names = $value = '';

//         $classes = empty( $item->classes ) ? array() : (array) $item->classes;
//         $classes[] = 'menu-item-' . $item->ID;

//         *
//          * Filter the CSS class(es) applied to a menu item's <li>.
//          *
//          * @since 3.0.0
//          *
//          * @param array  $classes The CSS classes that are applied to the menu item's <li>.
//          * @param object $item    The current menu item.
//          * @param array  $args    An array of arguments. @see wp_nav_menu()
         
//         $final_classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args );
//         $class_names = join( ' ', $final_classes );
//         $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

//         /**
//          * Filter the ID applied to a menu item's <li>.
//          *
//          * @since 3.0.1
//          *
//          * @param string The ID that is applied to the menu item's <li>.
//          * @param object $item The current menu item.
//          * @param array $args An array of arguments. @see wp_nav_menu()
//          */
//         $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
//         $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';


//         $atts = array();
//         $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
//         $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
//         $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
//         $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

//         /**
//          * Filter the HTML attributes applied to a menu item's <a>.
//          *
//          * @since 3.6.0
//          *
//          * @param array $atts {
//          *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
//          *
//          *     @type string $title  The title attribute.
//          *     @type string $target The target attribute.
//          *     @type string $rel    The rel attribute.
//          *     @type string $href   The href attribute.
//          * }
//          * @param object $item The current menu item.
//          * @param array  $args An array of arguments. @see wp_nav_menu()
//          */
//         $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

//         $attributes = '';
//         foreach ( $atts as $attr => $value ) {
//             if ( ! empty( $value ) ) {
//                 $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
//                 $attributes .= ' ' . $attr . '="' . $value . '"';
//             }
//         }

//         $item_output = '<a'. $attributes.$id . $class_names .'>';
//         /** This filter is documented in wp-includes/post-template.php */
//         $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
//         $item_output .= '</a>';
    
//         $output .= trim($item_output);
//     }

//     /**
//      * Ends the element output, if needed.
//      *
//      * @see Walker::end_el()
//      *
//      * @since 3.0.0
//      *
//      * @param string $output Passed by reference. Used to append additional content.
//      * @param object $item   Page data object. Not used.
//      * @param int    $depth  Depth of page. Not Used.
//      * @param array  $args   An array of arguments. @see wp_nav_menu()
//      */
//     function end_el( &$output, $item, $depth = 0, $args = array() ) {
//     }
// }




// add_filter( 'nav_menu_css_class', 'add_parent_url_menu_class', 10, 2 );

// function add_parent_url_menu_class( $classes = array(), $item = false ) {
//     // Get current URL
//     $current_url = current_url();
//     if ( strpos($current_url, $item->url) !== false ) {
//         // Add the 'parent_url' class
//        $classes[] = 'current-menu-parent';
//     }
//     return $classes;
// }

