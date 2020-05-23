<?php
/**
 * Class TestJSON
 *
 * @since   1.0.0
 * @package Awesome9\JSON
 * @author  Awesome9 <me@awesome9.co>
 */

namespace Awesome9\JSON\Test;

use Awesome9\JSON\JSON;

/**
 * JSON test case.
 */
class TestJSON extends \WP_UnitTestCase {

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function test_should_throw_if_config_not_set_exception() {
		JSON::get()
			->hooks();
	}

	/**
	 * Add something to JSON object.
	 */
	public function test_add() {
		$manager = JSON::get()->set_object_name( 'awesome9' )->hooks();

		// Empty.
		$manager->add( '', 'shakeeb' );

		// Key don't exists.
		$manager->add( 'test', 'value' );
		$this->assertArrayEquals(
			$this->getPrivate( $manager, 'data' ),
			[ 'awesome9' => [ 'test' => 'value' ] ]
		);

		// Key exists and not array overwrite.
		$manager->add( 'test', 'changed' );
		$this->assertArrayEquals(
			$this->getPrivate( $manager, 'data' ),
			[ 'awesome9' => [ 'test' => 'changed' ] ]
		);

		// Key exists and array merge.
		$manager->add( 'name', [ 'first' => 'shakeeb' ] );
		$this->assertArrayEquals(
			$this->getPrivate( $manager, 'data' ),
			[
				'awesome9' => [
					'test' => 'changed',
					'name' => [
						'first' => 'shakeeb',
					],
				],
			]
		);

		$manager->add( 'name', [ 'last' => 'ahmed' ] );
		$this->assertArrayEquals(
			$this->getPrivate( $manager, 'data' ),
			[
				'awesome9' => [
					'test' => 'changed',
					'name' => [
						'first' => 'shakeeb',
						'last'  => 'ahmed',
					],
				],
			]
		);
	}

	/**
	 * Remove something from JSON object.
	 */
	public function test_remove() {
		$manager = JSON::get();

		$manager->add( 'name', 'shakeeb' );
		$manager->remove( 'test' );
		$this->assertArrayEquals(
			$this->getPrivate( $manager, 'data' ),
			[ 'awesome9' => [ 'name' => 'shakeeb' ] ]
		);
	}

	/**
	 * Print data.
	 */
	public function test_output() {
		$manager = JSON::get();

		$manager->add( 'name', 'shakeeb' );
		$manager->add( 'count', 10 );
		$manager->add( 'isRegistered', true );
		$script  = '';
		$script .= "<script type='text/javascript'>\n";
		$script .= "/* <![CDATA[ */\n";
		$script .= "var awesome9 = {\"name\":\"shakeeb\",\"count\":10,\"isRegistered\":true};" . PHP_EOL . "\n";
		$script .= "/* ]]> */\n";
		$script .= "</script>\n";

		$this->expectOutputString( $script );
		$manager->output();
	}

	/**
	 * Empty output.
	 */
	public function test_empty_output() {
		$manager = JSON::get();

		$manager->clear_all();
		$this->expectOutputString( '' );
		$manager->output();
	}

	/**
	 * Empty object.
	 */
	public function test_empty_object() {
		$manager = JSON::get();

		$manager->add( 'name', 'shakeeb' );
		$manager->remove( 'name' );
		$this->expectOutputString( '' );
		$manager->output();
	}

	public function assertArrayEquals( $array1, $array2 ) {
		$this->assertEquals( json_encode( $array1 ), json_encode( $array2 ) );
	}

	public function getPrivate( $obj, $attribute ) {
		$getter = function() use ( $attribute ) {
			return $this->$attribute;
		};
		$get = \Closure::bind( $getter, $obj, get_class( $obj ) );
		return $get();
	}
}
