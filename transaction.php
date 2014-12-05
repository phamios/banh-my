<?php

header('Content-Type: text/html; charset=utf-8');
define('CORE_API_HTTP_USR', 'merchant_13429');
define('CORE_API_HTTP_PWD', '134290987asdashd98as7duas87dt6asygdtfas6d78aussad');

$bk = 'https://www.baokim.vn/the-cao/restFul/send';
$seri = isset($_POST['txtseri']) ? $_POST['txtseri'] : '';
$sopin = isset($_POST['txtpin']) ? $_POST['txtpin'] : '';
//Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
$mang = isset($_POST['chonmang']) ? $_POST['chonmang'] : '';
$user = $_POST['txtuser'];


	if($mang=='MOBI'){
			$ten = "Mobifone";
		}
	else if($mang=='VIETEL'){
			$ten = "Viettel";
		}
	else if($mang=='GATE'){
			$ten = "Gate";
		}
	else if($mang=='VTC'){
			$ten = "VTC";
		}
	else $ten ="Vinaphone";

//Mã MerchantID dang kí trên Bảo Kim
$merchant_id = '13429';
//Api username 
$api_username = 'dkvsgamethuvietnet';
//Api Pwd d
$api_password = 'dkvsgamethuvietnet98ujdbsjGUdhfgt988i';
//Mã TransactionId 
$transaction_id = time();
//mat khau di kem ma website dang kí trên B?o Kim
$secure_code = '596d14ecfa36a1a2';

$arrayPost = array(
	'merchant_id'=>$merchant_id,
	'api_username'=>$api_username,
	'api_password'=>$api_password,
	'transaction_id'=>$transaction_id,
	'card_id'=>$mang,
	'pin_field'=>$sopin,
	'seri_field'=>$seri,
	'algo_mode'=>'hmac'
);

ksort($arrayPost);

$data_sign = hash_hmac('SHA1',implode('',$arrayPost),$secure_code);

$arrayPost['data_sign'] = $data_sign;

$curl = curl_init($bk);

curl_setopt_array($curl, array(
	CURLOPT_POST=>true,
	CURLOPT_HEADER=>false,
	CURLINFO_HEADER_OUT=>true,
	CURLOPT_TIMEOUT=>30,
	CURLOPT_RETURNTRANSFER=>true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTPAUTH=>CURLAUTH_DIGEST|CURLAUTH_BASIC,
	CURLOPT_USERPWD=>CORE_API_HTTP_USR.':'.CORE_API_HTTP_PWD,
	CURLOPT_POSTFIELDS=>http_build_query($arrayPost)
));

$data = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$result = json_decode($data,true);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = time();
//$time = time();
if($status==200){
    $amount = $result['amount'];
	switch($amount) {
		case 10000: $xu = 10000; break;
		case 20000: $xu = 20000; break;
		case 30000: $xu = 30000; break;
		case 50000: $xu= 50000; break;
		case 100000: $xu = 100000; break;
		case 200000: $xu = 200000; break;
		case 300000: $xu = 300000; break;
		case 500000: $xu = 500000; break;
		case 1000000: $xu = 1000000; break;
	}
	
    // Xu ly thong tin tai day
	$file = "carddung.log";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"Tai khoan: ".$user.", Loai the: ".$ten.", Menh gia: ".$amount.", Thoi gian: ".$time);
	fwrite($fh,"\r\n");
	fclose($fh);
	echo '<script>alert("Bạn đã thanh toán thành công thẻ '.$ten.' mệnh giá '.$amount.' ");</script>';

}
else{ 
	echo 'Status Code:' . $status . '<hr >';   
    $error = $result['errorMessage'];
	echo $error;
    $file = "cardsai.log";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"Tai khoan: ".$user.", Ma the: ".$sopin.", Seri: ".$seri.", Noi dung loi: ".$error.", Thoi gian: ".$time);
	fwrite($fh,"\r\n");
	fclose($fh);
	echo '<script>alert("Thong tin the cao khong hop le!");</script>';
}

