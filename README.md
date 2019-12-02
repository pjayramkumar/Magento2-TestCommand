# Magento2-TestCommand
This is module provide sample test command with argument and option to create CMS Page in Magento 2

![Magento >= 2.0.0](https://img.shields.io/badge/magento-%3E=2.0.0-blue.svg)

Installation 
--------------

- php bin/magento module:enable Elightwalk_SampleCommand
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile

Module Commands 
--------------

- php bin/magento create:cms_page hellopage -t "Hello Page"


Troubleshoot 
--------------

- If you facing merory issue during the above commands follow to add params in the command -d memory_limit=-1 for example php bin/magento -d memory_limit=-1 setup:upgrade


Help & Contact  
--------------

For extra help contact us on https://www.elightwalk.com/
