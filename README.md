# firewall
<p>My pfSense firewall settings
<p>NoIPv6.patch    - add No-IP IPv6 support to Dynamic DNS</p>
<p>updateDNS.patch - add local bind.php script to update DNS server with nsupdate
<p style="text-ident: 60px">(it uses /root/rndc.key for authentication)</p>
<p style="text-ident: 40px">Parameters:
<p style="text-ident: 60px">ns=&lt;dns server IP&gt; seems to be working with IPv4 address only (?!)</p>
<p style="text-ident: 60px">fqdn=&lt;fqdn to be updated&gt;</p>
<p style="text-ident: 60px">nstype=&lt;A/AAAA&gt;</p>
<p style="text-ident: 60px">address=&lt;IPv4/IPv6 address to be updated&gt;</p></p>
<p style="text-ident: 40px">Result:
<p style="text-ident: 60px">Result=&lt;Actual IPv4/IPv6 address requested after update&gt;</p></p></p></p>
