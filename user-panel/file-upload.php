<?php

$files = $_FILES['file'];
$response_data = [];
for ($index = 0; $index < count($files['name']); $index++) {
    $file_name = $files['name'][$index];
    $tmp_name = $files['tmp_name'][$index];
    $filePath = $tmp_name;
    $chunk = 0;
    $chunks = 0;
    $out = fopen($filePath . ".part", $chunk == 0 ? "wb" : "ab");
    if ($out) {
        $in = fopen($tmp_name, "rb");
        if ($in) {
            while ($buff = fread($in, 2048)) {
                fwrite($out, $buff);
            }
        } else {
            echo '0';
        }
        fclose($in);
        fclose($out);
        unlink($tmp_name);
    } else {
        echo '0';
    }
    (!$chunks || $chunk == $chunks - 1) ? rename("{$filePath}.part", $filePath) : '';
    $destination = 'Case-Files';
    $append_url = 'https://content.dropboxapi.com/2/files/upload_session/append_v2';
    $start_url = 'https://content.dropboxapi.com/2/files/upload_session/start';
    $finish_url = 'https://content.dropboxapi.com/2/files/upload_session/finish';
    $info_array = array();
    $info_array['close'] = false;

    $headers = array('Authorization: Bearer 3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT',
        'Content-Type: application/octet-stream',
        'Dropbox-API-Arg: ' . json_encode($info_array));
    $chunk_size = 50000000;
//    $path = 'admin/webupload/original/' . $file_name;
    $path = $tmp_name;
    $fp = fopen($path, 'rb');
    $fileSize = filesize($path);
    $tosend = $fileSize;
    $first = $tosend > $chunk_size ? $chunk_size : $tosend;

    $ch = curl_init($start_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $first));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $tosend -= $first;

    $resp = explode('"', $response);

    $sesion = $resp[3];
    $posicion = $first;
    error_log($response);

    $info_array["cursor"] = array();
    $info_array["cursor"]["session_id"] = $sesion;
    while ($tosend > $chunk_size) {
        $info_array["cursor"]["offset"] = $posicion;
        $headers[2] = 'Dropbox-API-Arg: ' . json_encode($info_array);

        curl_setopt($ch, CURLOPT_URL, $append_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $chunk_size));
        $response = curl_exec($ch);

        $tosend -= $chunk_size;
        $posicion += $chunk_size;

        if ($response != "null") {
            exit(-1);
        }
    }
    unset($info_array["close"]);
    $info_array["cursor"]["offset"] = $posicion;
    $info_array["commit"] = array();
    $info_array["commit"]["path"] = '/' . $destination . '/' . $file_name;
    $info_array["commit"]["mode"] = array();
    $info_array["commit"]["mode"][".tag"] = "overwrite";
    $info_array["commit"]["autorename"] = true;
    $info_array["commit"]["mute"] = false;
    $info_array["commit"]["strict_conflict"] = false;
    $headers[2] = 'Dropbox-API-Arg: ' . json_encode($info_array);
    curl_setopt($ch, CURLOPT_URL, $finish_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $tosend > 0 ? fread($fp, $tosend) : null);
    $response = curl_exec($ch);
    $response_data[] = json_decode($response, true)['name'];
    curl_close($ch);
    fclose($fp);
}

if (count($files['name']) === count($response_data)) {
    echo '1';
} else {
    echo '0';
}
