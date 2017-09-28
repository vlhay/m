
<!DOCTYPE html>
<html lang="en-US" />
<head>

<title>Little Sister’s Kissionary Report</title>
<meta charset="UTF-8" />

<?php 
if (!isset($_GET['url']))
{
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><form method="get">Url: <input name="url" type="text"><input type="submit" value="Leech" ></form>';
}
else
{
$url = $_GET['url'];
$url =  str_replace('http://m.','',$url);
$url =  str_replace('http://','',$url);
$url =  str_replace($url,'http://'.$url ,$url);
$curl = curl_init();
curl_setopt ($curl, CURLOPT_URL, $url);
curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 4.1.2; vi; SAMSUNG Build/JZO54K) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 UCBrowser/9.7.5.418 U3/0.8.0 Mobile Safari/533.1');
$vll = $url;
$vll =  str_replace('http://','',$vll);
$vll =  str_replace('hentailx.com/','',$vll);
$vll =  str_replace('-1.html','',$vll);
$dow = curl_exec($curl);
$dow = explode('Thể loại:',$dow);
$dow = explode('Theo dõi:',$dow[1]);
$dow =  str_replace('</a>',',' ,$dow);
$dow = trim($dow[0]);
$dow = strip_tags($dow,'');
$dow = trim($dow);
$key = curl_exec($curl);
$key = explode('<meta name="Keywords" content="',$key);
$key = explode('<meta name="copyright"',$key[1]);
$key = preg_replace('#<img src="(.*?)" alt="(.*?)" />#is',"<option value='$1'>$1</option>",$key);
$key = str_replace('>','',$key);
$key = str_replace('/','',$key);
$key = str_replace('"','',$key);
$key = trim($key[0]);
$key = strip_tags($key,'');
$des = curl_exec($curl);
$des = explode('<meta name="description" content="',$des);
$des = explode('<link rel="canonical"',$des[1]);
$des = preg_replace('#<img src="(.*?)" alt="(.*?)" />#is',"<option value='$1'>$1</option>",$des);
$des = str_replace('"/>','',$des);
$des = str_ireplace('gaixinh9.com','truyenhay.botay.in',$des);
$des = str_replace('<p>','',$des);
$des = trim($des[0]);
$des = strip_tags($des,'<img>,<br>,<b>,<option>,<u>,<strong>');
$thumb = curl_exec($curl);
$thumb = explode('<div class="thumbnail row list-group-item">',$thumb);
$thumb = explode('</div></div><!-- Detail Images END -->',$thumb[1]);
$thumb = preg_replace('#<img width="(.*?)" height="(.*?)" onerror="(.*?)" src="(.*?)" class="(.*?)" alt="(.*?)" itemprop="(.*?)" />#is',"<option value='$4'>$4</option>",$thumb);
$thumb = preg_replace("#<img src='(.*?)' alt='(.*?)'/>#is",'<option value="$1">$1</option>',$thumb);
$thumb = preg_replace('#<img src="(.*?)" alt="(.*?)">#is',"<option>$1</option>",$thumb);
$thumb = preg_replace('#<img class="(.*?)" src="(.*?)" width="(.*?)" height="(.*?)" />#is',"<option value='$2'>$2</option>",$thumb);
$thumb = str_replace('</div>','',$thumb);
$thumb = str_replace('</p>','',$thumb);
$thumb = str_replace('<p>','',$thumb);
$thumb = trim($thumb[0]);
$thumb = strip_tags($thumb,'<img>,<option>');
$url1= "'$url";
$title = curl_exec($curl);
$lay = explode('update <a href="/doc-truyen/'.$vll.'-chapter-',$title);
$lay = explode('.html" class="chap-link">Chapter',$lay[1]);
$lay = trim($lay[0]);
if (!$lay){
$lay = explode('<!--Chapter List label-->',$title);
$lay = explode('<span class="sr-only">(current)</span>',$lay[1]);
$lay = strip_tags($lay[0]);
$lay = trim($lay);
$lay = substr($lay, -1 , 1 );
}
if (!$lay){$lay = 1;}
$title = explode('<title>',$title);
$title = explode('</title>',$title[1]);
$title = trim($title[0]);
$title = explode('- Hentailx',$title);
$title = trim($title[0]);
$nd = curl_exec($curl);
$nd = explode("<div class='post-body entry-content' id='post_body'>",$nd);
$nd = explode("<div style=' clear:both;'></div>",$nd[1]);
$nd= preg_replace('#<img src="(.*?)" alt="(.*?)" />#is',"[img]$1[/img]",$nd);
$nd= preg_replace('#<img border="(.*?)" src="(.*?)" />#is',"[img]$2[/img]",$nd);
$nd= preg_replace('#<img class="(.*?)" src="(.*?)" width="(.*?)" height="(.*?)" />#is',"[img]$2[/img]",$nd);
$nd = preg_replace('#m.vietgiaitri.com/tag/(.*?)/#is',"truyenhay.botay.in/tag/$1",$nd);
$nd = str_replace('</div>','',$nd);
$nd = str_replace('</p>','',$nd);
$nd = str_replace('<p>','',$nd);
$nd = trim($nd[0]);
$nd = strip_tags($nd,'<iframe>,<img>,<br>,<b>,<i>,<u>,<strong>');
curl_close($curl);
$pt = $_GET['pt'];
$pt = explode('.',$pt);
$bd = $pt[0];
$kt = $pt[1];
if ($bd > $lay || $kt > $lay || $bd > $kt )  {
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>Truyện '.$title.' có '.$lay.' thôi mà !!';
}
else{
if (($kt && !$bd) || ($bd <= 1 && $kt > 0 )) {
$bd = 1;
$thong = 'Leech từ đầu đến trang '.$kt;
}
elseif (!$bd && !$kt ) {
$kt = $lay;
$bd = 1;
$thong = 'Đã leech tất cả '.$lay.' trang' ;
}
elseif (!$kt && $bd) {
$kt = $lay;
$thong = "Đã leech từ trang " .$bd." đến hết";
}
else {
$thong = 'Đã leech từ trang '.$bd.' đến trang '.$kt; 
}
echo '
	<b><u>'.$thong.'</u></b>';
echo '<div class="bkit">Thêm bài viết</div><div class="bkit1">
<form action="http://hentaivn.gq/?panel=1&do=add" method="post"><input type="text" name="title" placeholder="Tên bài viết" value="Truyện Hentai '.$title.' - '.$lay.' chap"/>
<br/><input type="text" name="id" placeholder="url bài viết có thể bỏ trống (ví dụ: share-code-wap4 )" value=""/>
<br/><select name="img">'.$thumb.'</select>
<br/><input type="text" name="keys" placeholder="Keywords" value=""/><br/>
<input type="text" name="desc" placeholder="Description" value=""/><br/>
<input type="text" name="tag" placeholder="Tag, bài, viết" value="truyenhentai, hentai online, '.$key.'"/><br/>
<select name="cat"><option value="hentai" selected="selected">hentai</option>
</select>';
echo '<textarea name="text[]">[b] Truyện có '.$lay.' Chap[/b]';
if($kt == 1)
{
$cuoi = '<div class="container reading-pagination" id="reading-pagination-bottom">';
}
else {
$cuoi = '<div class="container reading-pagination" id="reading-pagination-bottom">';
}
$bv = curl_init();
for ($i= 1; $i <= $kt ; $i++) { 
   
if ($lay==1){$long =  'http://hentailx.com/doc-truyen/'.$vll.'-oneshot.html';  }
elseif($i==2){
$long = 'http://hentailx.com/doc-truyen/'.$vll.'-chapter-2-.html';}
else{
$long = 'http://hentailx.com/doc-truyen/'.$vll.'-chapter-'.$i.'.html';}
curl_setopt ($bv, CURLOPT_URL, $long);
curl_setopt ($bv, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($bv, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 4.1.2; vi; SAMSUNG Build/JZO54K) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 UCBrowser/9.7.5.418 U3/0.8.0 Mobile Safari/533.1');
$bai = curl_exec($bv);
$bai = explode('<div class="container" id="content_chap">',$bai);
$bai = explode($cuoi,$bai[1]);
$bai = trim($bai[0]);
$bai = strip_tags($bai,'<img>');
$bai = preg_replace("#<img(.*?)src=\"(.*?)\"(.*?)>#is",'[img]$2[/img]',$bai);
$bai = preg_replace("#<img(.*?)src=\'(.*?)\'(.*?)>#is",'[img]$2[/img]',$bai);
$bai = preg_replace('/<p>(Chap|Chương|Phần)(.*)<\/p>/i', '<p><b>$1$2</b></p>', $bai);
$bai = preg_replace('/(truyenvip.pro|truyenvip)/i', $_SESSION['domain'], $bai);
echo '  [/br][b]Chapter '.$i.'[/b]'.$bai.'  [img]https://i.imgur.com/DT9RYZb.jpg?1[/img]';
}
curl_close($bv);


$long = 'http://hentailx.com/doc-truyen/'.$vll.'-chapter-'.$lay.'.html';
curl_setopt ($bv, CURLOPT_URL, $long);
curl_setopt ($bv, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($bv, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 4.1.2; vi; SAMSUNG Build/JZO54K) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 UCBrowser/9.7.5.418 U3/0.8.0 Mobile Safari/533.1');
$bai = curl_exec($bv);
$bai = explode('<div class="container" id="content_chap">',$bai);
$bai = explode($cuoi,$bai[1]);
$bai = trim($bai[0]);
$bai = strip_tags($bai,'<img>');
$bai = preg_replace("#<img(.*?)src=\"(.*?)\"(.*?)>#is",'[img]$2[/img]',$bai);
$bai = preg_replace("#<img(.*?)src=\'(.*?)\'(.*?)>#is",'[img]$2[/img]',$bai);
$bai = preg_replace('/<p>(Chap|Chương|Phần)(.*)<\/p>/i', '<p><b>$1$2</b></p>', $bai);
$bai = preg_replace('/(truyenvip.pro|truyenvip)/i', $_SESSION['domain'], $bai);
echo '  [/br][b]Chapter '.$lay.'[/b]'.$bai.'  [img]https://i.imgur.com/DT9RYZb.jpg?1[/img]';
}
curl_close($bv);
$t= strip_tags($bai,'');
$f= substr( $t, 0, 500);
echo '</textarea><br/><input type="submit" class="myLink" name="submit" value="Đăng Bài"/>
</form></div>';
}}
?>
