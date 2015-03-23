<?php
namespace Azera\Annotation;

class AnnotationTest extends \PHPUnit_Framework_TestCase {
	
	function testAnnotation() {

		$this->assertInstanceOf( Column::class , Annotation::readProperty( [ Entity::class , 'Id' ] , Column::class ) );

		$this->assertCount( 1 , Annotation::readProperty( [ Entity::class , 'Id' ] ) );

	}

}

class Entity {
	
	/** @Column **/
	public $Id;

}

/**	@Annotation **/
class Column {

}
?>