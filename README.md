Ref: https://www.mageplaza.com/magento-2-module-development/

Installation:
1. Download the code and extract it in /app/code/ directoryof your magento website
2. Enable the module
   php bin/magento module:enable Advcha_HelloWorld
3. Upgrade module database
   php bin/magento setup:upgrade
4. Clean and flush the magento cache
   php bin/magento cache:clean
   php bin/magento cache:flush

