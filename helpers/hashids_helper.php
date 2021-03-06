<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

define('HASHIDS_VERSION', '1.0.5');

/**
 * Create the hashid object using config settings unless override values are passed thru.
 *
 * @access  public
 * @return  object
 */
if( ! function_exists('hashids_createobject'))
{
    function hashids_createobject($salt_ov=NULL, $min_hash_length_ov=NULL, $alphabet_ov=NULL)
    {
        $CI =& get_instance();
        $CI->config->load('hashids');
        $salt               = (!$salt_ov) ? $CI->config->item('hashids_salt') : $salt_ov;
        $min_hash_length    = (!$min_hash_length_ov) ? $CI->config->item('hashids_min_hash_length') : $min_hash_length_ov;
        $alphabet           = (!$alphabet_ov) ? $CI->config->item('hashids_alphabet') : $alphabet_ov;
        $CI->load->library('Hashids', ['salt' => $salt, 'min_hash_length' => $min_hash_length, 'alphabet' =>  $alphabet]);
    }
}

/**
 * Encrypt an ID or array of ID's to a hashid.
 *
 * @access  public
 * @param   interger or array input
 * @return  string  hashid
 */
if( ! function_exists('hashids_encrypt'))
{
    function hashids_encrypt($input, $salt=NULL, $min_hash_length=NULL, $alphabet=NULL)
    {
        $CI =& get_instance();
        if( !is_array($input) ) $input = array( intval($input) );
        hashids_createobject($salt, $min_hash_length, $alphabet);
        return $CI->hashids->encrypt($input);
    }
}

/**
 * Decrypt a hashid to an integer or array of integers.
 *
 * @access  public
 * @param   string  hashid
 * @return  array or integer - array returned if more than one value exists, else integer - NULL if not decryptable.
 */
if( ! function_exists('hashids_decrypt'))
{
    function hashids_decrypt($hash, $salt='', $min_hash_length=0, $alphabet='')
    {
        $CI =& get_instance();
        hashids_createobject($salt, $min_hash_length, $alphabet);
        $output     = $CI->hashids->decrypt($hash);
        if(count($output) < 1) return NULL;
        return (count($output) == 1) ? reset($output) : $output;
    }
}

/* End of file hashids_helper.php */
