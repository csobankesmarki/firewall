#!/usr/bin/env bash

curl -X GET -H "Content-Type: application/json" -H "Authorization: Bearer <token>" "https://api.digitalocean.com/v2/domains/kocsihaz.hu/records"
