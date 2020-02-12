# firewall
My pfSense firewall settings

NoIPv6.patch    - add No-IP IPv6 support to Dynamic DNS<br>
updateDNS.patch - add local bind.php script to update DNS server with nsupdate<br>
                    (it uses /root/rndc.key for authentication)<br>
<p style="text-ident: 40px">Parameters:<br>
                    ns=&lt;dns server IP&gt; - seems to be working with IPv4 address only (?!)<br>
                    fqdn=&lt;fqdn to be updated&gt;<br>
                    nstype=&lt;A/AAAA&gt;<br>
                    address=&lt;IPv4/IPv6 address to be updated&gt;<br>
                  Result:<br>
                    Result=&lt;Actual IPv4/IPv6 address requested after update&gt;<br>
