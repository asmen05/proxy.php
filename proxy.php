<?php
// السماح بطلبات من أي مصدر
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// الحصول على ID من الطلب
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// رابط الـ API الأصلي
$url = "https://high-kora.com:443/TOD/WEB/BEIN/api.php?id=$id";

// إعداد الطلب باستخدام cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Mobile Safari/537.36",
    "Referer: https://high-kora.com/TOD/WEB/BEIN/bs$id.php",
    "Cookie: _ga=GA1.2.649873137.1740151204; _ga_FF54ETMD0E=GS1.1.1740260056.3.1.1740260994.0.0.0"
]);

$response = curl_exec($ch);
curl_close($ch);

// طباعة البيانات
echo $response;
?>
