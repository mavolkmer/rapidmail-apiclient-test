# rapidmail-apiclient-test
minimalistic testing of rapidmail-apiv3-client

this repo is a result of https://github.com/rapidmail/rapidmail-apiv3-client-php/issues/18

## How to use
- clone repo to your testing-server
- copy `.env.example` to `.env` and update with your own values
- run `composer install`
- check your connection to RapidMail API by creating a new recipient  
  and getting their response by calling the appropriate script:
  - via RapidMail API-client: `client.php`
  - via Guzzle: `guzzle.php`
  - via php-curl: `curl.php`
