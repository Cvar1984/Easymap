<?
system("clear");
error_reporting(0);
@ini_set('memory_limit', '64M');
@header('Content-Type: text/html; charset=UTF-8');
function input($pesan){
	global $green;
	echo "$green ( ! ) $pesan ( ! )\n\n";
	echo " Cvar1984@P22DX:~# ";
}
function getsource($url, $proxy) {
$curl=curl_init($url);
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
if($proxy) {
$proxy=explode(':', autoprox());
curl_setopt($curl, CURLOPT_PROXY, $proxy[0]);
curl_setopt($curl, CURLOPT_PROXYPORT, $proxy[1]);
}
$content = curl_exec($curl);
curl_close($curl);
return $content;
}
$green="\e[92m";
$red="\e[91m";
function asciiart() {
system("clear");
echo "\n \e[93m
  ____|
  __|    _` |  __| |   | __ `__ \   _` | __ \
  |     (   |\__ \ |   | |   |   | (   | |   |
 _____|\__,_|____/\__, |_|  _|  _|\__,_| .__/
                 ____/                 _|";
echo "\n \e[36m
 Author  : Cvar1984
 Code    : PHP
 Github  : http://github.com/Cvar1984
 Team    : Blackhole Security
 Version : 1.4 ( Alpha )
 Date    : 31-12-2017";
}
input:
input("Target Host");
$host=trim(fgets(STDIN, 1024));
if(strpos($host, '://') !== false) {
echo "\n$red ( ! ) Please Input URL Without http:// or https:// ( ! ) \n";
goto input;
}elseif(strpos($host, '.') == false) {
echo "\n$red ( ! ) URL Format false ( ! ) \n";
goto input;
}elseif(strpos($host, ' ') !== false) {
echo "\n$red ( ! ) URL Format false ( ! ) \n";
goto input;
}else {
$hostsl = "";
goto menu;
}
menu:
asciiart();
echo "\n";
echo "$red =========================== Cvar1984 ))=====(@)> \n";
echo "\n$green";
echo " |_(01) Update >> \n";
echo " |__(02) Nmap SQL-I Scan >> \n";
echo " |___(03) Hydra Brute FTP >> \n";
echo " |____(04) GOOGLE >> \n";
echo " |_____(05) Curl Grab Banner >> \n";
echo " |___\__(06) Quick Find >> \n";
echo " |____@__(07) Admin Finder++ >> \n";
echo " |___/____(08) Nmap wp-brute >> \n";
echo " |__|__\___(09) SQL-I Scan >> \n";
echo " |__|__/___(10) Bing >> \n";
echo " |___\____(11) Nmap Hearbeat >> \n";
echo " |____@__(12) Nmap Whois Domain >> \n";
echo " |___/__(13) Nmap SSH Brute >> \n";
echo " |_____(14) Nmap CSRF Scan >> \n";
echo " |____(15) Nmap Webdav Scan >> \n";
echo " |___(16) Nmap SMTP Brute >> \n";
echo " |__(17) Nmap Vulscan >> \n";
echo " |_(EX) Exit >> \n";
echo "\n";
echo "$red =========================== Cvar1984 ))=====(@)> \n";
input("Chose Your Action");
$pilih=trim(fgets(STDIN, 1024));
if(!in_array($pilih, array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','EX','ex',), true)) {
echo "\n $red ( ! ) Input false ( ! ) $green\n";
trim(fgets(STDIN, 1024));
goto menu;
}else {
if($pilih == "01" ) {
system("git pull");
goto menu;
}elseif($pilih == "02") {
echo " ( ! ) CTRL + X For Info ( ! )";
system("nmap -T4 -sV --script http-sql-injection.nse $host -v");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "03") {
input("user");
$user=trim(fgets(STDIN, 1024));
input("Threads");
$threads=trim(fgets(STDIN, 1024));
input("min char");
$char1=trim(fgets(STDIN, 1024));
input("max char");
$char2=trim(fgets(STDIN, 1024));
system("hydra -t $threads -V -f -l $user -x $char1:$char2:a1 ftp://$host");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "04") {
input("query");
$query=trim(fgets(STDIN, 1024));
system("lynx google.com/search?q=$query");
goto menu;
}elseif($pilih == "05") {
system("curl -v $host");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "06") {
input("filename or extension");
$filename=trim(fgets(STDIN, 1024));
system("find /storage/emulated/0/ |grep $filename;find /storage/sdcard1/ |grep $filename;find /data/data/com.termux/files/home/ |grep $filename");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "07") {
echo " ( ! ) Scanning : $hostsl" . "$host \n";
echo "\n ( ! ) Loading Crawler File ....\n";
if(file_exists("admin.ini")) {
echo "\n ( ! ) db admin found Scanning  Admin Pannel ( ! )\n";
$crawllnk=file_get_contents("admin.ini");
$crawls=explode(',', $crawllnk);
echo "\n URLs Loaded : " . count($crawls) . "\n\n";
foreach($crawls as $crawl) {
$url=$hostsl . $host . "/" . $crawl;
$handle=curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
$response=curl_exec($handle);
$httpCode=curl_getinfo($handle, CURLINFO_HTTP_CODE);
if($httpCode == 200) {
echo "\n\n (URL)=> $url : ";
echo "$red Found! $green";
}elseif ($httpCode == 404) {
}else {
echo "\n\n (URL)=> $url : ";
echo "HTTP Response : " . $httpCode;
}
curl_close($handle);
}
}else {
echo "\n ( ! ) 404 File Not Found ( ! ) \n";
}
if(file_exists("backup.ini")) {
echo "\n ( ! ) crawler history found ( ! )\n";
$crawllnk=file_get_contents("backup.ini");
$crawls=explode(',', $crawllnk);
echo "\n URLs Loaded: " . count($crawls) . "\n\n";
foreach ($crawls as $crawl) {
$url=$hostsl . $host . "/" . $crawl;
$handle=curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
$response=curl_exec($handle);
$httpCode=curl_getinfo($handle, CURLINFO_HTTP_CODE);
if($httpCode == 200) {
echo "\n\n (URL)=> $url : $red Found! $green";
}elseif($httpCode == 404) {
}else {
echo "\n\n (URL)=> $url : ";
echo "HTTP Response : " . $httpCode;
}
curl_close($handle);
}
}else {
echo "\n ( ! ) 404 File Not Found ( ! ) \n";
}if(file_exists("others.ini")) {
echo "\n ( ! ) 200 General Crawler File Found! Scanning The Site ( ! )\n";
$crawllnk=file_get_contents("others.ini");
$crawls=explode(',', $crawllnk);
echo "\n URLs Loaded: " . count($crawls) . "\n\n";
foreach($crawls as $crawl) {
$url=$hostsl . $host . "/" . $crawl;
$handle=curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
$response=curl_exec($handle);
$httpCode=curl_getinfo($handle, CURLINFO_HTTP_CODE);
if($httpCode == 200) {
echo "\n\n (URL)=> $url : ";
echo " $red Found! $green";
}elseif($httpCode == 404) {
}else {
echo "\n\n (URL)=> $url : ";
echo "HTTP Response: " . $httpCode;
}curl_close($handle);
}
}else {
echo "\n ( ! ) 404 File Not Found ( ! )";
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}
}elseif($pilih == "08") {
echo " ( i ) Press Any Key To Info ( i )";
system("nmap -T4 -sV http-wordpress-brute.nse $host -v");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "09") {
$reallink=$hostsl . $host;
$srccd=file_get_contents($reallink);
$lwwww=str_replace("www.", "", $host);
echo "( ! ) Scanning : $hostsl" . "$host \n";
$lulzurl=$reallink;
$html=file_get_contents($lulzurl);
$dom= new DOMDocument;
@$dom->loadHTML($html);
$links=$dom->getElementsByTagName('a');
$vlnk=0;
foreach($links as $link) {
$lol=$link->getAttribute('href');
if(strpos($lol, '?') !== false) {
echo "\n ( + ) " . $lol . "\n";
echo " ( ! )";
$sqllist=file_get_contents('sqlerrors.ini');
$sqlist=explode(',', $sqllist);
if(strpos($lol, '://') !== false) {
$sqlurl=$lol . "'";
}else {
$sqlurl=$hostsl . $host . "/" . $lol . "'";
}
$sqlsc=file_get_contents($sqlurl);
$sqlvn="Not Vulnerable";
foreach($sqlist as $sqli) {
if(strpos($sqlsc, $sqli) !== false)
$sqlvn="Vulnerable!!";
}
echo $sqlvn;
$vlnk++;
}
}
echo "\n ( ! ) Scanning : " . $green . $vlnk;
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "10") { 
input("Dork");
$dork=trim(fgets(STDIN,1024));
$do=urlencode($dork);
$npage=1;
$npages=30000;
$allLinks=array();
$lll=array();
while($npage <= $npages) {
$x=getsource("http://www.bing.com/search?q=".$do."&first=" . $npage."&FORM=PERE4", $proxy);
if($x) {
preg_match_all('#<h2><a href="(.*?)" h="ID#', $x, $findlink);
foreach($findlink[1] as $fl) array_push($allLinks, $fl);
$npage=$npage + 10;
if(preg_match("(first=" . $npage . "&amp)siU", $x, $linksuiv) == 0) break;
} else 
break;
}
$URLs=array();
foreach($allLinks as $url){
$exp=explode("/", $url);
$URLs[]=$exp[2];
}
$array=array_filter($URLs);
$array=array_unique($array);
$sss=count(array_unique($array));
foreach($array as $domain) {
echo"\n http://".$domain.'/';
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}
}elseif($pilih == "11") {
echo " ( i ) Press Any Key To Info ( i )";
system("nmap -d --script ssl-heartbleed.nse --script-args vulns.showall -sV $host");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih =="12") {
echo " ( i ) Press Any Key To Info ( i )";
system("nmap -sV -T4 --script whois-domain.nse -v -d $host");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "13") {
echo " ( i ) Press Any Key To Info ( i )";
system("nmap -sV -T4 --script ssh-brute.nse $host -d -v -Pn");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "14") {
echo " ( i ) Press Any Key To Info ( i )";
system("nmap -sV -Pn -T4 --script http-csrf.nse -v -d $host");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "15") {
echo " ( i ) Press Any Key To Info ( i )";
system("nmap -sV -T4 --script http-webdav-scan.nse -v -d -Pn $host");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "16") {
echo " ( i ) Press Any Key To Info ( i )";
system("nmap -sV -T4 --script smtp-brute.nse $host -v");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "17") {
echo " ( i ) Press Any Key To Info ( i )";
system("nmap -sV -T4 --script vulscan/vulscan.nse -v $host");
echo "\n ( ! ) Press Enter ( ! )";
trim(fgets(STDIN, 1024));
goto menu;
}elseif($pilih == "e" or "E" ) {
die();
}else {
goto input;
}
}
?>