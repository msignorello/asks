<?php
$lanipaddy =  exec("/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'");
echo "LAN IP: ".$lanipaddy;
echo " // ";
$tunipaddy = exec("/sbin/ifconfig tun0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'");
echo "VPN IP: ".$tunipaddy;
?>
