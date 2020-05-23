<?php
/**
 * JSON functions
 *
 * @since   1.0.0
 * @package Awesome9\JSON
 * @author  Awesome9 <me@awesome9.co>
 */

namespace Awesome9\JSON;

/**
 * Add to JSON object.
 *
 * @since  1.0.0
 *
 * @param string $key         Unique identifier.
 * @param mixed  $value       The data itself can be either a single or an array.
 * @param string $object_name Name for the JavaScript object.
 *                            Passed directly, so it should be qualified JS variable.
 */
function add( $key, $value, $object_name = false ) {
	JSON::get()->add( $key, $value, $object_name );
}

/**
 * Remove from JSON object.
 *
 * @since  1.0.0
 *
 * @param string $key         Unique identifier.
 * @param string $object_name Name for the JavaScript object.
 *                            Passed directly, so it should be qualified JS variable.
 */
function remove( $key, $object_name = false ) {
	JSON::get()->remove( $key, $object_name );
}
