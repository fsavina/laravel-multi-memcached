<?php


class LaravelMultiMemcachedTest extends PHPUnit_Framework_TestCase
{
	
	/**
	 * @var array
	 */
	protected $servers;
	
	
	public function setUp ()
	{
		$this->servers = laravel_memcached_servers ();
	}
	
	
	public function testExtractAllServers ()
	{
		$this->assertEquals ( 2, count ( $this->servers ) );
	}
	
	
	public function testServerHostValue ()
	{
		$this->assertArrayHasKey ( 'host', $this->servers[ 0 ] );
		$this->assertEquals ( 'my.first.memcached.server.com', $this->servers[ 0 ][ 'host' ] );
		
		$this->assertArrayHasKey ( 'host', $this->servers[ 1 ] );
		$this->assertEquals ( 'my.second.memcached.server.com', $this->servers[ 1 ][ 'host' ] );
	}
	
	
	public function testServerPortValue ()
	{
		$this->assertArrayHasKey ( 'port', $this->servers[ 0 ] );
		$this->assertEquals ( 11211, $this->servers[ 0 ][ 'port' ] );
		
		$this->assertArrayHasKey ( 'port', $this->servers[ 1 ] );
		$this->assertEquals ( 12345, $this->servers[ 1 ][ 'port' ] );
	}
	
	
	public function testServerWeightValue ()
	{
		$this->assertArrayHasKey ( 'weight', $this->servers[ 0 ] );
		$this->assertEquals ( 100, $this->servers[ 0 ][ 'weight' ] );
		
		$this->assertArrayHasKey ( 'weight', $this->servers[ 1 ] );
		$this->assertEquals ( 90, $this->servers[ 1 ][ 'weight' ] );
	}
	
}