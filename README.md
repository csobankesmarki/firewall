# firewall
My pfSense firewall settings

NoIPv6.patch    - add No-IP IPv6 support to Dynamic DNS<br>
updateDNS.patch - add local bind.php script to update DNS server with nsupdate<br>
                    (it uses /root/rndc.key for authentication)<br>
                  Parameters:<br>
                    ns=<dns server IP> - seems to be working with IPv4 address only (?!)<br>
                    fqdn=<fqdn to be updated><br>
                    nstype=<A/AAAA><br>
                    address=<IPv4/IPv6 address to be updated><br>
                  Result:<br>
                    Result=<Actual IPv4/IPv6 address requested after update><br>
