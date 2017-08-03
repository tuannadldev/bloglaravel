<?php 
$redis=new Redis() or die("Can not load Redis.");
$redis->connect('127.0.0.1'); 

// Hash data type

$array = array(
	'user_id'=>1001,
	'username'=>'Nguyen Anh Tuan',
	'email'=>'tuannadldev@gmail.com',
	'password'=>md5('nguyendinhthienan110117'),
	'age'=>34	
);
$array1 = array(
        'user_id'=>1002,
        'username'=>'Nguyenn Dinh Thien An',
        'email'=>'nguyendinhthienan@gmail.com',
        'password'=>md5('nguyenanhtuan150982'),
	'age'=>1
        );

$redis->hmset('hashUser',$array);
$redis->hmset('hashUser',$array1);
$redis->hincrby('hashUser','age',1);

$infoUser = $redis->hgetall('hashUser');
echo '<pre>';print_r($infoUser); 




die;
$name = $redis->hget('myuser','name');
echo '<pre>'.$name;
$user = $redis->hgetall('myuser');
echo '<pre>';print_r($user);

die;
// Sorted Set data type
$redis->zadd('zset',10,'a');
$redis->zadd('zset',15,'b');
$redis->zadd('zset',12.5,'c');
$sequen = $redis->zrange('zset',0,-1);
echo '<pre>';print_r($sequen);

$scoreA = $redis->zscore('zset','a');
echo 'scoreA:'.$scoreA.'<pre>';
$redis->zadd('zset',7,'a');
$scoreA = $redis->zscore('zset','a');
echo '_____'.$scoreA;









die;
//// sets type
$member = $redis->sismember('giadinh','Nguyen Anh Tuan');
echo $member;
$member1 = $redis->sismember('giadinh','Nguyen Trong Binh');
echo '<br/>';print_r($member1);



die;
$sadd =  $redis->smembers('giadinh');
echo '<pre>';print_r($sadd);
$thanhvien = $redis->smembers('hoten');
echo '<pre>';print_r($thanhvien);
$sinter = $redis->sinter('giadinh','hoten');
echo '<pre>';print_r($sinter);

$a = $redis->scard('giadinh');
echo $a;

$b = $redis->scard('hoten');
echo '<pre>';
print_r($b);



//$redis->sadd('hoten','Nguyen Trong Binh');




die;
$redis->del('giadinh');
$redis->sadd('giadinh','Nguyen Trong Binh');
$redis->sadd('giadinh','Ngo Thi Chau');
$redis->sadd('giadinh','Nguyen Anh Tuan');
$redis->sadd('giadinh','Nguyen Thi Quynh Trang');
$redis->sadd('giadinh','Nguyen Minh Tuan');
$redis->sadd('giadinh','Nguyen Dinh Thien An');

$redis->sadd('hoten','Nguyen Trong Binh111');
$redis->sadd('hoten','Ngo Thi Chau');
$redis->sadd('hoten','Nguyen Anh Tuan11');
$redis->sadd('hoten','Nguyen Thi Quynh Trang');
$redis->sadd('hoten','Nguyen Minh Tuan');
$redis->sadd('hoten','Nguyen Dinh Thien An111');

$member = $redis->smembers('giadinh');

$sinter = $redis->sinter('hoten','giadinh');


echo '<pre>';print_r($member);
echo '<pre>$sinter';print_r($sinter);

$a = $redis->sismember('giadinh','Nguyen Trong Binh');
echo $a;
die;
//$list = "PHP Frameworks List";
$redis->lpush('mylist', "Nguyen anh tuan2");
/*$redis->rpush('mylist', "Symfony 1.4");
$redis->lpush('mylist', "Zend Framework");
*/
echo "Number of frameworks in list: " . $redis->llen('mylist') . "<br>";
$arList0 = $redis->lrange('mylist', 0, -1);
$arList = $redis->lrange('mylist', 0, 1);
$arList1 = $redis->lrange('mylist', 1, -1);


echo "<pre>";
print_r($arList0);
echo "</pre>";

echo "<pre>";
print_r($arList);
echo "</pre>";

echo "<pre>";
print_r($arList1);
echo "</pre>";
$redis->ltrim('mylist',3,-1);
$b = $redis->lrange('mylist',0,-1);
echo "<pre>";
print_r($b);
echo "</pre>";

// the last entry in the list
//echo $redis->rpop('mylist') . "<br>";

// the first entry in the list
//echo $redis->lpop('mylist') . "<br>";


die;




echo '<hr/>';
$redis=new Redis() or die("Can not load Redis.");
$redis->connect('127.0.0.1'); 
$redis->set('Redis test_key', 1);
echo 'Nguyen Anh Tuan <BR/>';
$a = $redis->get('Redis test_key');
echo $a;
$redis->set('key1','Hai dau');
$redis->setnx('key1','Hai dau la Nguyen Anh Tuan');

$b = $redis->get('key1');
echo $b;
$redis->setnx('key2','Nguyen Anh Tuan thuong goi la Hai Dau');
echo $redis->get('key2');
echo '<hr/>INCR';
$redis->set('key3',10);
echo $redis->get('key3');
echo '<br/>';
$redis->incr('key3');
echo $redis->get('key3');
$x = $redis->get('key3');
$y = $redis->get('key3');
$x = $x+1;
$y = $y+1;
$redis->set('key3',$x);
$redis->set('key3',$y);
echo '__________ <br/>';
echo $redis->get('key3');
?>
