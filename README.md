# firewall
<p><font size=+1>My pfSense firewall settings</font>
<p><b>NoIPv6.patch</b> - <i>add No-IP IPv6 support to Dynamic DNS</i></p>
<p><b>DigitalOceanv6AAAAfix.patch</b> - <i>Do IPv6 AAAA fix for IPV6 records</i></p>
<p><b>pfsense_dhcpv6_ddns_update_static.patch</b> - <i>fix IPv6 config to update static leases in DDNS</i></p>
<p><b>updateDNS.patch</b> - <i>add local bind.php script to update DNS server with nsupdate</i>
<p style="text-ident: 60px">(it uses /root/rndc.key for authentication)</p>
<p style="text-ident: 40px">Parameters:
<p style="text-ident: 60px">ns=&lt;dns server IP&gt; seems to be working with IPv4 address only (?!)</p>
<p style="text-ident: 60px">fqdn=&lt;fqdn to be updated&gt;</p>
<p style="text-ident: 60px">nstype=&lt;A/AAAA&gt;</p>
<p style="text-ident: 60px">address=&lt;IPv4/IPv6 address to be updated&gt;</p></p>
<p style="text-ident: 40px">Result:
<p style="text-ident: 60px">Result=&lt;Actual IPv4/IPv6 address requested after update&gt;</p></p></p>
<p style="text-ident: 20px"><i>NOTE: Local certificate's CA must be inserted to the trust store to get it work.</i></p></p>
