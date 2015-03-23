<?php
namespace Azera\Annotation;

use Doctrine\Common\Annotations\AnnotationReader,
	Doctrine\Common\Annotations\AnnotationRegistry;
use ReflectionClass,
	ReflectionMethod,
	ReflectionProperty,
	ReflectionFunction;

/**
 * Annotation Reader Utility
 * 
 * @author 	Masoud Zohrabi <mdzzohabi@gmail.com>
 * @uses   	Doctrine Annotations
 * @package Azera\Entity
 * 
 */
class Annotation {
	
	private static $reader;

	/**
	 * Retreive reader object
	 * 
	 * @return Doctrine\Common\Annotations\AnnotationReader
	 * 
	 */
	protected static function reader() {

		return static::$reader ?: static::$reader = new AnnotationReader();

	}

    /**
     * Add namespace to AnnotationReader
     *
     * @param string $namespace Namespace
     */
    public static function addNamespace( $namespace ) {

        self::reader()->addNamespace( $namespace );

    }

    /**
     * Register loader to AnnotationRegistry
     *
     * @param callable $loader  Loader
     */
    public static function registerLoader( $loader ) {

        AnnotationRegistry::registerLoader( $loader );

    }

    /**
     * Register file to AnnotationRegistry
     *
     * @param string $file  File Path
     */
    public static function registerFile( $file ) {

        AnnotationRegistry::registerFile( $file );

    }

	/**
	 * Retreive class annotations
	 * @param string $class Class
	 * @param string $annotation Specified annotation name
	 * @return mixed
	 */
	public static function readClass( $class , $annotation = null ) {

		$ref = $class instanceof ReflectionClass ? $class : new ReflectionClass( $class );

		return $annotation ? static::reader()->getClassAnnotation( $ref , $annotation ) : static::reader()->getClassAnnotations( $ref );

	}

	/**
	 * Retreive method annotations
	 * @param string $method Method
	 * @param string $annotation Specified annotation name
	 * @return mixed
	 */
	public static function readMethod( $method , $annotation = null ) {

		$ref = $method instanceof ReflectionMethod ? $method : new ReflectionMethod( $method[0] , $method[1] );

		return $annotation ? static::reader()->getMethodAnnotation( $ref , $annotation ) : static::reader()->getMethodAnnotations( $ref );

	}

	/**
	 * Retreive method annotations
	 * @param string $method Method
	 * @param string $annotation Specified annotation name
	 * @return mixed
	 */
	public static function readProperty( $property , $annotation = null ) {

		$ref = $property instanceof ReflectionProperty ? $property : new ReflectionProperty( $property[0] , $property[1] );

		return $annotation ? static::reader()->getPropertyAnnotation( $ref , $annotation ) : static::reader()->getPropertyAnnotations( $ref );

	}

}
?>
