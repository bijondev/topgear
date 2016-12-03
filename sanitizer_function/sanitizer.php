<?php
// Data Senitizing Functions for Halkhata
// - RainWalker (http://iamrainwalker.wordpress.com/)

# HTMLpurifier Class
require_once('libs/htmlpurifier/HTMLPurifier.auto.php');
# pbkdf2 Class
require_once('libs/pbkdf2.php');

# Define Statics
define("RAIN_HASH_PASS", "r41nw4lk3r");
define("RAIN_HASH_SALT", "0p5h0r4");

# Sanitizing Function --------------------------------------------
function _rainsenitizedata($datainput){
	// Define HTMLpurifier
	$htmlpurifierconfig = HTMLPurifier_Config::createDefault();
	$rainhtmlpurifier 	= new HTMLPurifier($htmlpurifierconfig);
	// Clean XSS & Purify Data
	$senitizeddata	=	$rainhtmlpurifier->purify($datainput);
	// Convert to UTF8
	$senitizeddata	=	utf8_decode($senitizeddata);
	// Convert HTMLspecial Char
	$senitizeddata = htmlspecialchars($senitizeddata, ENT_QUOTES);
	// Return Purified Data
	return $senitizeddata;
}

# UnToxify Sanitized data ----------------------------------------
function _rainutxsenitizedata($datainput){
	// Convert HTMLspecial Char
	$senitizeddata = htmlspecialchars_decode($datainput);
	// Convert to UTF8
	$senitizeddata	=	utf8_decode($senitizeddata);
	// Return Purified Data
	return $senitizeddata;
}

# Create password protected Hash ---------------------------------
function _raingenhash($inputdata){
	$hasheddata	= pbkdf2("SHA256", $inputdata, RAIN_HASH_PASS, 1000, 24, false);
	return $hasheddata;
}

# Create Password Protected & Salted string ----------------------
function _raingensecstring($inputdata){
	$rainhash 	= 	base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(RAIN_HASH_PASS), $inputdata, MCRYPT_MODE_CBC, md5(md5(RAIN_HASH_SALT))));
	$rainhash	=	urlencode(strtr($rainhash,'+/=','-_,'));
	return $rainhash;
}

# Decode Protected Hash to main String ---------------------------
function _raindecodesecstring($inputdata){
	$rainhash = strtr(urldecode($inputdata),'-_,','+/=');
	$rainhash = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(RAIN_HASH_PASS), base64_decode($rainhash), MCRYPT_MODE_CBC, md5(md5(RAIN_HASH_SALT))), "\0");
	return $rainhash;
}

# Genareting Non Matching Uniq IDs -------------------------------
function _rainuniqcodes($prefix, $lenght){
	$random_pred	=	md5(base64_decode(RAIN_HASH_SALT.rand(00000000,99999999).date("F j, Y, g:i a").time().RAIN_HASH_PASS));
	$hashcoderend	= 	strtoupper(pbkdf2("SHA256", $random_pred, RAIN_HASH_PASS, 1000, $lenght, false));
	return $prefix.$hashcoderend;
}


function getMac(){
exec("ipconfig /all", $output);
foreach($output as $line){
if (preg_match("/(.*)Physical Address(.*)/", $line)){
$mac = $line;
$mac = str_replace("Physical Address. . . . . . . . . :","",$mac);
}
}
return $mac;
}

//taken from wordpress
function utf8_uri_encode( $utf8_string, $length = 0 ) {
    $unicode = '';
    $values = array();
    $num_octets = 1;
    $unicode_length = 0;

    $string_length = strlen( $utf8_string );
    for ($i = 0; $i < $string_length; $i++ ) {

        $value = ord( $utf8_string[ $i ] );

        if ( $value < 128 ) {
            if ( $length && ( $unicode_length >= $length ) )
                break;
            $unicode .= chr($value);
            $unicode_length++;
        } else {
            if ( count( $values ) == 0 ) $num_octets = ( $value < 224 ) ? 2 : 3;

            $values[] = $value;

            if ( $length && ( $unicode_length + ($num_octets * 3) ) > $length )
                break;
            if ( count( $values ) == $num_octets ) {
                if ($num_octets == 3) {
                    $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
                    $unicode_length += 9;
                } else {
                    $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
                    $unicode_length += 6;
                }

                $values = array();
                $num_octets = 1;
            }
        }
    }

    return $unicode;
}

//taken from wordpress
function seems_utf8($str) {
    $length = strlen($str);
    for ($i=0; $i < $length; $i++) {
        $c = ord($str[$i]);
        if ($c < 0x80) $n = 0; # 0bbbbbbb
        elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
        elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
        elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
        elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
        elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
        else return false; # Does not match any model
        for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
            if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
                return false;
        }
    }
    return true;
}

//function sanitize_title_with_dashes taken from wordpress
function sanitize($title) {
    $title = strip_tags($title);
    // Preserve escaped octets.
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    // Remove percent signs that are not part of an octet.
    $title = str_replace('%', '', $title);
    // Restore octets.
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

    if (seems_utf8($title)) {
        if (function_exists('mb_strtolower')) {
            $title = mb_strtolower($title, 'UTF-8');
        }
        $title = utf8_uri_encode($title, 200);
    }

    $title = strtolower($title);
    $title = preg_replace('/&.+?;/', '', $title); // kill entities
    $title = str_replace('.', '-', $title);
    $title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');

    return $title;
}


/*
$nastydata	= _rainsenitizedata('<img src="javascript:evil();" onload="evil();" /><h1>test</h1><h2>Cool');
echo "<b>Sanitization Chk 		: </b>"._rainutxsenitizedata($nastydata)."<br>";
$hackdata	=	_raingensecstring("Fuck Yah! Hack ME!");
echo "<b>Protected Hach Chk	: </b>".$hackdata."<br>";
echo "<b>Deoced Hash Chk		: </b>"._raindecodesecstring($hackdata)."<br>";
echo "<b>Hash Chk 				: </b>"._raingenhash('Full Authority!')."<br>";
echo "<b>Uniq Code Chk			: </b>"._rainuniqcodes("R",10);
 * 
 * 
*/
/*function get_client_ip() {
     $ipaddress = '';
     if ($_SERVER['HTTP_CLIENT_IP'])
         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
     else if($_SERVER['HTTP_X_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
     else if($_SERVER['HTTP_X_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
     else if($_SERVER['HTTP_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
     else if($_SERVER['HTTP_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_FORWARDED'];
     else if($_SERVER['REMOTE_ADDR'])
         $ipaddress = $_SERVER['REMOTE_ADDR'];
     else
         $ipaddress = 'UNKNOWN';

     return $ipaddress; 
}*/
?>