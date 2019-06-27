<?php

declare(strict_types = 1);

$string = 'LOREM IPSUM 87is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
$salt = '';

$crypt = crypt($string, $salt);

echo $crypt;

echo '<br />';

$md5 = md5($string);

echo $md5;


echo '<br />';
$sha1 = sha1($string, false);
echo $sha1;

echo '<br />';
echo hash('sha512', $string);
echo '<br />';
$hash = password_hash(hash('sha512', $string), PASSWORD_BCRYPT);

echo $hash;

echo '<br />';
echo md5_file('../06-26/session.php');
echo '<br />';

echo lcfirst($string);

echo '<br />';

echo ucfirst($string);
echo '<br />';
echo strlen($string);
echo '<br />';
echo ucwords($string);
echo '<br />';
echo number_format(45678905.9823562456275, 0, '.', '|');
echo '<br />';
echo wordwrap($string, 100, '<br />', false);
echo '<br />';
$string = 'My own write text!';
echo substr($string, 0, -10);
echo '<br />';
$string = '<div><p>sone</p><p>liuyalfg kasuryh</p></div>';
echo strip_tags($string, '<p>');
echo '<br />';
echo '<br />';
$ids = [
    1 => 'product',
    3 => 'supply',
    54 => 'product',
];
$url = 'http://www.some.url/%s/%d';
foreach ($ids as $id => $type) {
    echo sprintf($url, $type, $id);
    echo '<br />';
}

echo sprintf("%04d-%02d-%02d", 2019, 4, 21);








