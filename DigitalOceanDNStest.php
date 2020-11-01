#!/usr/bin/env php7.4
<?php
$_UserAgent = 'phpDynDNS/0.7';
$realparentif = 'enp0s31f6';
$_dnsService = 'digitalocean';
$_dnsHost = 'ip';
$_dnsDomain = 'kocsihaz.hu';
// $_dnsDomain = '_dummy.test';
$_dnsPass = 'd89f5180c72358535302f12b4502e871084c9381c4998449aa6f2b63038f03a7';
$server = 'https://api.digitalocean.com/v2/domains/';
$isv6 = ($_dnsService === 'digitalocean-v6');
$url = $server . $_dnsDomain . '/records';
$ch = curl_init();
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch, CURLOPT_USERAGENT, $_UserAgent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_INTERFACE, 'if!' . $realparentif);
curl_setopt($ch, CURLOPT_TIMEOUT, 120); // Completely empirical
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer {$_dnsPass}"));
echo "getting $url\n";
curl_setopt($ch, CURLOPT_URL, $url);
$output = json_decode(curl_exec($ch));
echo "returned: $output\n";
if (!is_array($output->domain_records)) {
        $output->domain_records = array();
}
$_domain_records = $output->domain_records;
$_count = count($_domain_records);
$_total = 0;
if (property_exists($output, 'meta')) {
        $meta = $output->meta;
        if (property_exists($meta, 'total')) {
                $_total = $meta->total;
        }
}
echo "total=$_total count=$_count\n";
$_next = '...';
$_last = '';
while ($_next != $_last) {
        $_next = '';
        if (property_exists($output, 'links')) {
                $links = $output->links;
                if (property_exists($links, 'pages')) {
                        $pages = $links->pages;
                        if (property_exists($pages, 'next')) {
                                $_next = $pages->next;
                        }
                        if (property_exists($pages, 'last')) {
                                $_last = $pages->last;
                        }
                        if ($_next != '') {
                                echo "getting $_next\n";
                                curl_setopt($ch, CURLOPT_URL, $_next);
                                $output = json_decode(curl_exec($ch));
                                if (!is_array($output->domain_records)) {
                                        $output->domain_records = array();
                                }
                                $_domain_records = array_merge($_domain_records,$output->domain_records);
                        }
                }
        }
}
$_count = count($_domain_records);
echo "total=$_total count=$_count\n";
foreach($_domain_records as $dnsRecord) {
        // NS records are named @ in DO's API, so check type as well
        // https://redmine.pfsense.org/issues/9171
        if ($_dnsHost == $dnsRecord->name && ($dnsRecord->type == 'AAAA' || $dnsRecord->type == 'A')) {
                $recordID = $dnsRecord->id;
                echo "ID=$dnsRecord->id name=$dnsRecord->name type=$dnsRecord->type data=$dnsRecord->data --- FOUND\n";
        } elseif ($dnsRecord->id != '') {
                echo "ID=$dnsRecord->id name=$dnsRecord->name type=$dnsRecord->type data=$dnsRecord->data\n";
        }
}
echo "\n";
?>
