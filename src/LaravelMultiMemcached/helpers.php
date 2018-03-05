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
		$hosts = trim ( $hosts ?: getenv ( 'MEMCACHED_HOST' ) );
		
		$servers = [];
		if ( strlen ( $hosts ) )
		{
			foreach ( explode ( ',', $hosts ) as $host )
			{
				$host = explode ( '@', $host, 2 );
				$weight = isset( $host[ 1 ] ) ? $host[ 1 ] : 100;
				
				$host = explode ( ':', $host[ 0 ], 2 );
				$port = isset( $host[ 1 ] ) ? $host[ 1 ] : getenv ( 'MEMCACHED_PORT' );
				
				
				$servers[] = [
					'host'   => $host[ 0 ],
					'port'   => (int) $port ?: 11211,
					'weight' => (int) $weight,
				];
			}
		}
		return $servers;
	}
}
