<?php



	include 'func.php';
	$data = rcg();
	$count = count($data);

	//$pic = rcgp($name);
echo '<br><br>';

   //All code jumps every four over in array
    
    //starts 1 ip
	for ($i=1; $i<$count; $i+=4){ 
	$haystackd = explode(":", $data[$i]);
	$ip = $haystackd[0];
	$ipA[] = $ip;
	$port = $haystackd[1];
	$portA[] = $port;
	}
    
    //starts 2 type
   for ($i=2; $i<$count; $i+=4){ 
	$type = strtolower($data[$i]);
	$typeA[] = $type;
	}

    //starts 3 date
    for ($i=3; $i<$count; $i+=4){ 
	$date = $data[$i];
	$dateA[] = $date;
	}


    /*

	    	$haystackd = explode(":", $data[$i]);
    	$ip = $haystackd[0];
    	$port = $haystackd[1];

    */

    	echo '<pre># proxychains.conf  VER 4
#
#        HTTP, SOCKS4, SOCKS5 tunneling proxifier with DNS.
#	

# The option below identifies how the ProxyList is treated.
# only one option should be uncommented at time,
# otherwise the last appearing option will be accepted
#
dynamic_chain
#
# Dynamic - Each connection will be done via chained proxies
# all proxies chained in the order as they appear in the list
# at least one proxy must be online to play in chain
# (dead proxies are skipped)
# otherwise EINTR is returned to the app
#
#strict_chain
#
# Strict - Each connection will be done via chained proxies
# all proxies chained in the order as they appear in the list
# all proxies must be online to play in chain
# otherwise EINTR is returned to the app
#
random_chain
#
# Random - Each connection will be done via random proxy
# (or proxy chain, see  chain_len) from the list.
# this option is good to test your IDS :)

# Make sense only if random_chain
#chain_len = 2

# Quiet mode (no output from library)
#quiet_mode

# Proxy DNS requests - no leak for DNS data
proxy_dns 

# set the class A subnet number to usefor use of the internal remote DNS mapping
# we use the reserved 224.x.x.x range by default,
# if the proxified app does a DNS request, we will return an IP from that range.
# on further accesses to this ip we will send the saved DNS name to the proxy.
# in case some control-freak app checks the returned ip, and denies to 
# connect, you can use another subnet, e.g. 10.x.x.x or 127.x.x.x.
# of course you should make sure that the proxified app does not need
# *real* access to this subnet. 
# i.e. dont use the same subnet then in the localnet section
#remote_dns_subnet 127 
#remote_dns_subnet 10
remote_dns_subnet 224

# Some timeouts in milliseconds
tcp_read_time_out 15000
tcp_connect_time_out 8000

# By default enable localnet for loopback address ranges
# RFC5735 Loopback address range
localnet 127.0.0.0/255.0.0.0
# RFC1918 Private Address Ranges
# localnet 10.0.0.0/255.0.0.0
# localnet 172.16.0.0/255.240.0.0
# localnet 192.168.0.0/255.255.0.0


# Example for localnet exclusion
## Exclude connections to 192.168.1.0/24 with port 80
# localnet 192.168.1.0:80/255.255.255.0

## Exclude connections to 192.168.100.0/24
# localnet 192.168.100.0/255.255.255.0

## Exclude connections to ANYwhere with port 80
# localnet 0.0.0.0:80/0.0.0.0

# ProxyList format
#       type  host  port [user pass]
#       (values separated by tab or blank)
#
#
#        Examples:
#
#            	socks5	192.168.67.78	1080	lamer	secret
#		http	192.168.89.3	8080	justu	hidden
#	 	socks4	192.168.1.49	1080
#	        http	192.168.39.93	8080	
#		
#
#       proxy types: http, socks4, socks5
#        ( auth types supported: "basic"-http  "user/pass"-socks )
#
[ProxyList]
# add proxy here ...
# meanwile
# defaults set to "tor"</pre>';
$icount = count($ipA);
echo '<pre>';
for ($i=1; $i<$icount; $i++) { 
	echo '<br>';
print_r($typeA[$i]);print_r($ipA[$i]);echo " ";print_r($portA[$i]);
echo '<br>';
echo "#";print_r($dateA[$i]);echo " ";//print_r($countryA[$i]);
echo '<br>';

}
echo '</pre>';


?>

