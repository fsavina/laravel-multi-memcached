<?php

if ( ! function_exists ( 'laravel_memcached_servers' ) )
{
	/**
	 * Extract Memcached servers configuration from the given comma-separated string or from the default env variable
	 *
	 * @param string $hosts
	 * @return array
	 */
	function laravel_memcached_servers ( $hosts = null )
	{
		$hosts = trim ( $hosts ?: env ( 'MEMCACHED_HOST', '127.0.0.1' ) );
		
		$servers = [];
		if ( strlen ( $hosts ) )
		{
			foreach ( explode ( ',', $hosts ) as $host )
			{
				$host = explode ( '@', $host, 2 );
				$weight = array_get ( $host, 1, 100 );
				
				$host = explode ( ':', $host[ 0 ], 2 );
				$port = array_get ( $host, 1, env ( 'MEMCACHED_PORT', 11211 ) );
				
				$servers[] = [
					'host'   => $host[ 0 ],
					'port'   => (int) $port,
					'weight' => (int) $weight,
				];
			}
		}
		return $servers;
	}
}
