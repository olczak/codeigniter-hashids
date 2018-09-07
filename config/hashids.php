<?php
// Custom value that will make your hashes unique to your salt.
// If salt is changed, your hashes cannot be decrypted properly.
// Empty string by default.
$config['hashids_salt']             = '';

// Minimum hash length to set for your hashes. Default is 0,
// meaning your hashes will be the shortest possible.
$config['hashids_min_hash_length']  = 0;

// Custom alphabet to set for your hashes. By default it's set
// to lower case letters, upper case letters, and numbers.
$config['hashids_alphabet']         = '';

/* End of file hashids.php */
