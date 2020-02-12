# firewall
My pfSense firewall settings

NoIPv6.patch    - add No-IP IPv6 support to Dynamic DNS
updateDNS.patch - add local bind.php script to update DNS server with nsupdate
                    (it uses /root/rndc.key for authentication)
                  Parameters:
                    ns=<dns server IP> - seems to be working with IPv4 address only (?!)
                    fqdn=<fqdn to be updated>
                    nstype=<A/AAAA>
                    address=<IPv4/IPv6 address to be updated>
                  Result:
                    Result=<Actual IPv4/IPv6 address requested after update>
