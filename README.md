# codeigniter-hashids
Simple codeigniter integration of Hashids


Installation
-------------------------------------
1. Copy helpers/hashids_helper.php to application/helpers folder
2. Copy library/Hashids.php to application/library folder
3. Copy config/hashids.php to application/config folder
4. Make required changes in config/hashids.php

Usage
-------------------------------------

	$this->load->helper('hashids');
  
	Encrypt: <?=hashids_encrypt(1234)?>
	Decrypt: <?=hashids_decrypt("1lj")?>
	Custom Encrypt: <?=hashids_encrypt(1234, 'alternate config salt', 10)?>
	Custom Encrypt: <?=hashids_decrypt('pjxalngQJ3', 'alternate config salt', 10)?>
  
Based on https://github.com/sekati/codeigniter-hashids
