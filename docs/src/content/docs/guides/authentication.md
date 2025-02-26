---
title: Authentication
description: How to authenticate with Moneybird using moneybird-api-php.
---

To set up and authenticate MoneybirdApiClient against the Moneybird API, follow these steps:

1. Install the package using Composer:
   ```bash
   composer require sandorian/moneybird-api-php
   ```

2. Obtain your API key and administration ID from the Moneybird API dashboard.

3. Create a new MoneybirdApiClient instance:
   ```php
   use Moneybird\MoneybirdApiClient;

   $moneybird = new MoneybirdApiClient('YOUR_API_KEY', 'YOUR_ADMINISTRATION_ID');
   ```

4. You can now use the `$moneybird` object to interact with the Moneybird API.

Remember to replace 'YOUR_API_KEY' and 'YOUR_ADMINISTRATION_ID' with your actual credentials.
