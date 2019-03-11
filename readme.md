<p align="center">Class 'Locale' not found issue on CakePHP 3</p>
<p>Solution Xampp (Windows)</p><br>

<p>Open /xampp/php/php.ini</p>
<p>Change ;extension=php_intl.dll to  extension=php_intl.dll (remove the semicolon)</p>
<p>Copy all the /xamp/php/ic*.dll files to /xampp/apache/bin</p>
<p>Restart apache in the Xampp control panel</p>
<p>Solution Linux (thanks to Annamalai Somasundaram)</p><br>

<p>Install the php5-intl extension sudo apt-get install php5-intl</p><br>

<p>1.1. Alternatively use sudo yum install php5-intl if you are on CentOS or Fedora.</p><br>

<p>Restart apache sudo service apache2 restart</p><br>

<p>Solution Mac/OSX (homebrew) (thanks to deizel)</p><br>

<p>Install the php5-intl extension brew install php56-intl</p>
<p>If you get No available formula for php56-intl follow these instructions.</p>
<p>Restart apache sudo apachectl restart</p>
<p>Eventually you can run composer install to check if it's working.</p>