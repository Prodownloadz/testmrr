<?php
include('include/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ini_set('memory_limit', '-1');
    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'add-new-case') {
        $Data = json_decode($_POST['Data']);
        session_start();
        $status = '0';
        $created_on = date("Y-m-d H:i:s");
        $created_by = $_SESSION['user_id'];
        $review_services = json_encode($Data[8]);
        $add_on_services = json_encode($Data[9]);
        $medical_charts = json_encode($Data[10]);

        //        $case_files = [];
        //        $share_link = [];
        //        for ($index = 0; $index < count($Data[12]); $index++) {
        //            $file_name = $Data[12][$index];
        //            $case_files[] = $file_name;
        ////            if (!move_uploaded_file($_FILES['file']['tmp_name'][$index], "../admin/webupload/original/" . $file_name)) {
        ////                echo '0';
        ////            }
        ////            $filePath = "../admin/webupload/original/" . $file_name;
        ////            $chunk = 0;
        ////            $chunks = 0;
        ////            $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
        ////            if ($out) {
        ////                $in = @fopen($_FILES['file']['tmp_name'][$index], "rb");
        ////                if ($in) {
        ////                    while ($buff = fread($in, 4096)) {
        ////                        fwrite($out, $buff);
        ////                    }
        ////                } else {
        ////                    echo '0';
        ////                }
        ////                @fclose($in);
        ////                @fclose($out);
        ////                @unlink($_FILES['file']['tmp_name'][$index]);
        ////            } else {
        ////                echo '0';
        ////            }
        ////            (!$chunks || $chunk == $chunks - 1) ? rename("{$filePath}.part", $filePath) : '';
        ////            $destination = 'Case-Files';
        ////
        ////            $append_url = 'https://content.dropboxapi.com/2/files/upload_session/append_v2';
        ////            $start_url = 'https://content.dropboxapi.com/2/files/upload_session/start';
        ////            $finish_url = 'https://content.dropboxapi.com/2/files/upload_session/finish';
        ////
        ////            $info_array = array();
        ////            $info_array['close'] = false;
        ////
        ////            $headers = array('Authorization: Bearer 3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT',
        ////                'Content-Type: application/octet-stream',
        ////                'Dropbox-API-Arg: ' . json_encode($info_array));
        ////
        ////            $chunk_size = 50000000;
        ////
        ////            $path = '../admin/webupload/original/' . $file_name;
        ////            $fp = fopen($path, 'rb');
        ////            $fileSize = filesize($path);
        ////            $tosend = $fileSize;
        ////            $first = $tosend > $chunk_size ? $chunk_size : $tosend;
        ////
        ////            $ch = curl_init($start_url);
        ////            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        ////            curl_setopt($ch, CURLOPT_POST, true);
        ////            curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $first));
        ////            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        ////            $response = curl_exec($ch);
        ////            $tosend -= $first;
        ////
        ////            $resp = explode('"', $response);
        ////
        ////            $sesion = $resp[3];
        ////            $posicion = $first;
        ////            error_log($response);
        ////
        ////            $info_array["cursor"] = array();
        ////            $info_array["cursor"]["session_id"] = $sesion;
        ////
        ////            while ($tosend > $chunk_size) {
        ////                $info_array["cursor"]["offset"] = $posicion;
        ////                $headers[2] = 'Dropbox-API-Arg: ' . json_encode($info_array);
        ////
        ////                curl_setopt($ch, CURLOPT_URL, $append_url);
        ////                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        ////                curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $chunk_size));
        ////                $response = curl_exec($ch);
        ////
        ////                $tosend -= $chunk_size;
        ////                $posicion += $chunk_size;
        ////
        ////                if ($response != "null") {
        ////                    exit(-1);
        ////                }
        ////            }
        ////            unset($info_array["close"]);
        ////            $info_array["cursor"]["offset"] = $posicion;
        ////            $info_array["commit"] = array();
        ////            $info_array["commit"]["path"] = '/' . $destination . '/' . $file_name;
        ////            $info_array["commit"]["mode"] = array();
        ////            $info_array["commit"]["mode"][".tag"] = "overwrite";
        ////            $info_array["commit"]["autorename"] = true;
        ////            $info_array["commit"]["mute"] = false;
        ////            $info_array["commit"]["strict_conflict"] = false;
        ////            $headers[2] = 'Dropbox-API-Arg: ' . json_encode($info_array);
        ////
        ////            curl_setopt($ch, CURLOPT_URL, $finish_url);
        ////            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        ////            curl_setopt($ch, CURLOPT_POSTFIELDS, $tosend > 0 ? fread($fp, $tosend) : null);
        ////            $response = curl_exec($ch);
        ////            curl_close($ch);
        ////            fclose($fp);
        //
        //            $parameters = array('path' => '/Case-Files/' . $file_name);
        //
        //            $headers = array('Authorization: Bearer 3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT',
        //                'Content-Type: application/json');
        //
        //            $curlOptions = array(
        //                CURLOPT_HTTPHEADER => $headers,
        //                CURLOPT_POST => true,
        //                CURLOPT_POSTFIELDS => json_encode($parameters),
        //                CURLOPT_RETURNTRANSFER => true,
        //                CURLOPT_VERBOSE => true
        //            );
        //
        //            $ch = curl_init('https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings');
        //            curl_setopt_array($ch, $curlOptions);
        //            $response2 = curl_exec($ch);
        //            $data = json_decode($response2, TRUE);
        //            if (!isset($data['error_summary'])) {
        //                $share_link[] = $data['url'];
        //            } else {
        //                $share_link[] = $data['error']['shared_link_already_exists']['metadata']['url'];
        //            }
        //            curl_close($ch);
        //        }
        //
        //        $dropbox_files_link = '';
        //        for ($index1 = 0; $index1 < count($share_link); $index1++) {
        //            $dropbox_files_link .= '<a href="' . $share_link[$index1] . '" target="_blank">' . $share_link[$index1] . '</a><br>';
        //        }
        $case_id = '';
        $query = "INSERT INTO `cases` (attorney_name, law_firm_name, contact_person, contact_number, email, case_name, case_description, case_type, expected_delivery_date, review_services, add_on_services, medical_charts, case_files, output_files, share_link, status, created_on, created_by, last_updated) VALUES ('" . mysqli_real_escape_string($conn, $Data[0]) . "', '" . mysqli_real_escape_string($conn, $Data[6]) . "', '$Data[1]', '$Data[2]', '" . mysqli_real_escape_string($conn, $Data[11]) . "', '" . mysqli_real_escape_string($conn, $Data[3]) . "', '" . mysqli_real_escape_string($conn, $Data[4]) . "', '$Data[5]', '$Data[7]', '$review_services', '$add_on_services', '$medical_charts', NULL, NULL, NULL, '$status', '$created_on', '$created_by', '$created_on')";
        $execute = mysqli_query($conn, $query);
        if ($execute) {
            $case_id = mysqli_insert_id($conn);
            //            $Error = [];
            //            for ($index1 = 0; $index1 < count($case_files); $index1++) {
            //                $query3 = "INSERT INTO `case_files` (case_id, additional_info, case_files, share_link, created_on) VALUES ('$case_id', NULL, '$case_files[$index1]', '$share_link[$index1]', '$created_on')";
            //                $execute3 = mysqli_query($conn, $query3);
            ////                if (!unlink("../admin/webupload/original/" . $case_files[$index1])) {
            ////                    $Error[] = '0';
            ////                }
            //                if (!$execute3) {
            //                    $Error[] = '0';
            //                }
            //            }
            //            if (count($Error) !== 0) {
            //                echo '0';
            //            }
            $query_2 = "SELECT * FROM `customers` WHERE id='$created_by' AND status='1'";
            $execute_2 = mysqli_query($conn, $query_2);
            $Data2 = mysqli_fetch_array($execute_2);
            $email = $Data2['email'];
            $user_name = $Data2['name'];
            $to = $email;
            if ($to) {
                $html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                    <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="padding: 10px; text-align: center;">
                                    <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>Hi, ' . $user_name . '</p>
                                    <p>Your Case is Added</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <thead style="background: #f3f5f3;">
                                            <tr>
                                                <th style="text-align: left; padding: 5px 10px; border: 1px solid #ccc;">Case Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Name :</strong> ' . $Data[3] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Law Firm Name :</strong> ' . $Data[6] . '</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p>Please visit : <a href="https://medicalrecordsreform.com/user-panel/" target="_blank">www.medicalrecordsreform.com/user-panel/</a></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px; margin-top: 0px;">Thank You!</p>
                                                    <p style="margin-bottom: 8px; margin-top: 25px;">Regards, </p>
                                                    <p style="margin-bottom: 8px; margin-top: 0px;"><strong>Case Admin Team,</strong> </p>
                                                    <p style="margin-bottom: 8px; margin-top: 0px;"><b>Medical Records Reform LLC.</b></p>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>';
                $subject = "Case Added";
                $name = "Medical Records Reform LLC";
                $reply = "support@medicalrecordsreform.com.test-google-a.com";
                $headers = "From: " . strip_tags($name) . " <" . strip_tags($reply) . ">\r\n";
                $headers .= "Reply-To: " . strip_tags($reply) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $html = utf8_decode($html);
                mail($to, $subject, $html, $headers);
            }

            $to = "support@medicalrecordsreform.com.test-google-a.com, Medicalrecordsreformmrr@gmail.com";
            if ($to) {
                $html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                    <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="padding: 10px; text-align: center;">
                                    <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>Hi, Admin</p>
                                    <p>New Case is Added</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <thead style="background: #f3f5f3;">
                                            <tr>
                                                <th style="text-align: left; padding: 5px 10px; border: 1px solid #ccc;">Case Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Attorney (or) Requestor Name :</strong> ' . $Data[0] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Law Firm Name :</strong> ' . $Data[6] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Contact Person Name :</strong> ' . $Data[1] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Contact Number :</strong> ' . $Data[2] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Email :</strong> ' . $Data[11] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Name :</strong> ' . $Data[3] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Description :</strong> ' . $Data[4] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Requested Services :</strong></p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;">
                                                        Review Services : ' . implode(', ', $Data[8]) . ' <br>
                                                        Add on Services : ' . implode(', ', $Data[9]) . ' <br>
                                                        Medical Charts : ' . implode(', ', $Data[10]) . ' <br>
                                                    </p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Type :</strong> ' . $Data[5] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Expected Delivery Date :</strong> ' . $Data[7] . '</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p>Please visit : <a href="https://medicalrecordsreform.com/admin/" target="_blank">www.medicalrecordsreform.com/admin/</a></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>';
                $subject = "New Case Added";
                $headers = "From: " . strip_tags($user_name) . " <" . strip_tags($email) . ">\r\n";
                $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $html = utf8_decode($html);
                mail($to, $subject, $html, $headers);
            }
            echo json_encode(['1', $case_id]);
        } else {
            echo json_encode(['0', '']);
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'upload-case-files') {
        $Data = json_decode($_POST['Data']);

        $case_id = $Data[0];

        $query_2 = "SELECT * FROM `cases` WHERE id = '" . $case_id . "'";
        $execute_2 = mysqli_query($conn, $query_2);
        $Data2 = mysqli_fetch_array($execute_2);

        $created_on = date('Y-m-d H:i:s');

        $case_files = [];
        $share_link = [];
        for ($index = 0; $index < count($Data[1]); $index++) {
            $file_name = $Data[1][$index];
            $case_files[] = $file_name;

            $parameters = array('path' => '/Case-Files/' . $file_name);

            $headers = array(
                'Authorization: Bearer 3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT',
                'Content-Type: application/json'
            );

            $curlOptions = array(
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($parameters),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_VERBOSE => true
            );

            $ch = curl_init('https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings');
            curl_setopt_array($ch, $curlOptions);
            $response2 = curl_exec($ch);
            $data = json_decode($response2, TRUE);
            if (!isset($data['error_summary'])) {
                $share_link[] = $data['url'];
            } else {
                $share_link[] = $data['error']['shared_link_already_exists']['metadata']['url'];
            }
            curl_close($ch);
        }

        $dropbox_files_link = '';
        for ($index1 = 0; $index1 < count($share_link); $index1++) {
            $dropbox_files_link .= '<a href="' . $share_link[$index1] . '" target="_blank">' . $share_link[$index1] . '</a><br>';
        }

        $Error = [];
        for ($index1 = 0; $index1 < count($case_files); $index1++) {
            $query3 = "INSERT INTO `case_files` (case_id, additional_info, case_files, share_link, created_on) VALUES ('$case_id', NULL, '$case_files[$index1]', '$share_link[$index1]', '$created_on')";
            $execute3 = mysqli_query($conn, $query3);
            if (!$execute3) {
                $Error[] = '0';
            }
        }
        if (count($Error) !== 0) {
            echo '0';
        }

        require '../PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls'; //tls
        $mail->SMTPAuth = true;
        $mail->Username = "mrr@medicalrecordsreform.com.test-google-a.com";
        $mail->Password = "vlzyrwwrerbaxdce";

        $mail->setFrom($Data2['email'], 'Case Team - MRR');

        $mail->addAddress('support@medicalrecordsreform.com.test-google-a.com');
        $mail->addAddress('Medicalrecordsreformmrr@gmail.com');

        $html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                    <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="padding: 10px; text-align: center;">
                                    <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>Hi, Admin</p>
                                    <p>Case Files Uploaded!</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <thead style="background: #f3f5f3;">
                                            <tr>
                                                <th style="text-align: left; padding: 5px 10px; border: 1px solid #ccc;">Case Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px;margin-top: 0px;">
                                                        Attorney or Requestor Name : ' . $Data2['attorney_name'] . ' <br>
                                                        Contact Person Name : ' . $Data2['contact_person'] . ' <br>
                                                        Law Firm Name : ' . $Data2['law_firm_name'] . ' <br>
                                                        Case Name : ' . $Data2['case_name'] . ' <br>
                                                        Case Files Links : <br>
                                                        ' . $dropbox_files_link . '
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>';

        $mail->isHTML(true);
        $mail->Subject = "Case Files Uploaded from MRR Guest User";
        $mail->Body = $html;
        $mail->AddReplyTo($Data2['email']);
        if ($mail->send()) {
            $to = $Data2['email'];
            if ($to) {
                $html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                    <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="padding: 10px; text-align: center;">
                                    <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>Hi, ' . $Data2['contact_person'] . '</p>
                                    <p>Your Case Files are Uploaded!</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <thead style="background: #f3f5f3;">
                                            <tr>
                                                <th style="text-align: left; padding: 5px 10px; border: 1px solid #ccc;">Case Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Name :</strong> ' . $Data2['case_name'] . '</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px; margin-top: 0px;">Thank You!</p>
                                                    <p style="margin-bottom: 8px; margin-top: 25px;">Regards, </p>
                                                    <p style="margin-bottom: 8px; margin-top: 0px;"><strong>Case Admin Team,</strong> </p>
                                                    <p style="margin-bottom: 8px; margin-top: 0px;"><b>Medical Records Reform LLC.</b></p>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>';
                $subject = "Case Files Uploaded";
                $name = "Medical Records Reform LLC";
                $reply = "support@medicalrecordsreform.com.test-google-a.com";
                $headers = "From: " . strip_tags($name) . " <" . strip_tags($reply) . ">\r\n";
                $headers .= "Reply-To: " . strip_tags($reply) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $html = utf8_decode($html);
                mail($to, $subject, $html, $headers);
            }
            echo '1';
        } else {
            echo '0';
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'update-case-detail-1') {
        $Data = $_POST['Data'];
        session_start();
        $created_by = $_SESSION['user_id'];
        $last_updated = date("Y-m-d H:i:s");

        $query_2 = "SELECT * FROM `customers` WHERE id='$created_by'";
        $execute_2 = mysqli_query($conn, $query_2);
        $Data2 = mysqli_fetch_array($execute_2);
        $email = $Data2['email'];
        $user_name = $Data2['name'];

        $query = "UPDATE `cases` SET attorney_name='" . mysqli_real_escape_string($conn, $Data[0]) . "', law_firm_name='" . mysqli_real_escape_string($conn, $Data[6]) . "', contact_person='" . mysqli_real_escape_string($conn, $Data[1]) . "', contact_number='$Data[2]', case_name='" . mysqli_real_escape_string($conn, $Data[3]) . "', case_description='" . mysqli_real_escape_string($conn, $Data[4]) . "', case_type='$Data[5]', expected_delivery_date='$Data[7]', last_updated='$last_updated', email='$Data[9]' WHERE id='$Data[8]'";
        $execute = mysqli_query($conn, $query);
        if ($execute) {
            $to = "support@medicalrecordsreform.com.test-google-a.com, Medicalrecordsreformmrr@gmail.com";
            if ($to) {
                $html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                    <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="padding: 10px; text-align: center;">
                                    <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>Hi, Admin</p>
                                    <p>Case Details Updated</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Contact Person :</strong> ' . $Data[1] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Name :</strong> ' . $Data[3] . '</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p>Please visit : <a href="https://medicalrecordsreform.com/admin/" target="_blank">www.medicalrecordsreform.com/admin/</a></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>';
                $subject = "Case Details Updated";
                $headers = "From: " . strip_tags($user_name) . " <" . strip_tags($email) . ">\r\n";
                $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $html = utf8_decode($html);
                mail($to, $subject, $html, $headers);
            }
            echo '1';
        } else {
            echo '0';
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'update-case-detail-2') {
        $Data = json_decode($_POST['Data']);
        session_start();
        $created_by = $_SESSION['user_id'];
        $created_on = date("Y-m-d H:i:s");

        $query_2 = "SELECT * FROM `customers` WHERE id='$created_by'";
        $execute_2 = mysqli_query($conn, $query_2);
        $Data2 = mysqli_fetch_array($execute_2);
        $email = $Data2['email'];
        $user_name = $Data2['name'];

        $query_3 = "SELECT * FROM `cases` WHERE id='$Data[1]'";
        $execute_3 = mysqli_query($conn, $query_3);
        $Data3 = mysqli_fetch_array($execute_3);
        $case_name = $Data3['case_name'];

        $file_name = NULL;
        $case_files = [];
        $share_link = [];
        if (isset($Data[2])) {
            for ($index = 0; $index < count($Data[2]); $index++) {
                $file_name = $Data[2][$index];
                $case_files[] = $file_name;
                //                if (!move_uploaded_file($_FILES['file']['tmp_name'][$index], "../admin/webupload/original/" . $file_name)) {
                //                    echo '0';
                //                }
                //                $filePath = "../admin/webupload/original/" . $file_name;
                //                $chunk = 0;
                //                $chunks = 0;
                //                $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                //                if ($out) {
                //                    $in = @fopen($_FILES['file']['tmp_name'][$index], "rb");
                //                    if ($in) {
                //                        while ($buff = fread($in, 4096)) {
                //                            fwrite($out, $buff);
                //                        }
                //                    } else {
                //                        echo '0';
                //                    }
                //                    @fclose($in);
                //                    @fclose($out);
                //                    @unlink($_FILES['file']['tmp_name'][$index]);
                //                } else {
                //                    echo '0';
                //                }
                //                (!$chunks || $chunk == $chunks - 1) ? rename("{$filePath}.part", $filePath) : '';
                //
                //                $destination = 'Case-Files';
                //
                //                $append_url = 'https://content.dropboxapi.com/2/files/upload_session/append_v2';
                //                $start_url = 'https://content.dropboxapi.com/2/files/upload_session/start';
                //                $finish_url = 'https://content.dropboxapi.com/2/files/upload_session/finish';
                //
                //                $info_array = array();
                //                $info_array['close'] = false;
                //
                //                $headers = array('Authorization: Bearer 3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT',
                //                    'Content-Type: application/octet-stream',
                //                    'Dropbox-API-Arg: ' . json_encode($info_array));
                //
                //                $chunk_size = 50000000;
                //
                //                $path = '../admin/webupload/original/' . $file_name;
                //                $fp = fopen($path, 'rb');
                //                $fileSize = filesize($path);
                //                $tosend = $fileSize;
                //                $first = $tosend > $chunk_size ? $chunk_size : $tosend;
                //
                //                $ch = curl_init($start_url);
                //                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                //                curl_setopt($ch, CURLOPT_POST, true);
                //                curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $first));
                //                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                //                $response = curl_exec($ch);
                //                $tosend -= $first;
                //
                //                $resp = explode('"', $response);
                //
                //                $sesion = $resp[3];
                //                $posicion = $first;
                //                error_log($response);
                //
                //                $info_array["cursor"] = array();
                //                $info_array["cursor"]["session_id"] = $sesion;
                //
                //                while ($tosend > $chunk_size) {
                //                    $info_array["cursor"]["offset"] = $posicion;
                //                    $headers[2] = 'Dropbox-API-Arg: ' . json_encode($info_array);
                //
                //                    curl_setopt($ch, CURLOPT_URL, $append_url);
                //                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                //                    curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $chunk_size));
                //                    $response = curl_exec($ch);
                //
                //                    $tosend -= $chunk_size;
                //                    $posicion += $chunk_size;
                //
                //                    if ($response != "null") {
                //                        exit(-1);
                //                    }
                //                }
                //                unset($info_array["close"]);
                //                $info_array["cursor"]["offset"] = $posicion;
                //                $info_array["commit"] = array();
                //                $info_array["commit"]["path"] = '/' . $destination . '/' . $file_name;
                //                $info_array["commit"]["mode"] = array();
                //                $info_array["commit"]["mode"][".tag"] = "overwrite";
                //                $info_array["commit"]["autorename"] = true;
                //                $info_array["commit"]["mute"] = false;
                //                $info_array["commit"]["strict_conflict"] = false;
                //                $headers[2] = 'Dropbox-API-Arg: ' . json_encode($info_array);
                //
                //                curl_setopt($ch, CURLOPT_URL, $finish_url);
                //                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                //                curl_setopt($ch, CURLOPT_POSTFIELDS, $tosend > 0 ? fread($fp, $tosend) : null);
                //                $response = curl_exec($ch);
                //                curl_close($ch);
                //                fclose($fp);
                //                $path = "../admin/webupload/original/" . $file_name;
                //                $fp = fopen($path, 'rb');
                //                $size = filesize($path);
                //
                //                $cheaders = array(
                //                    'Authorization: Bearer 3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT',
                //                    'Content-Type: application/octet-stream',
                //                    'Dropbox-API-Arg: {"path":"/Case-Files/' . $file_name . '", "mode":"add"}'
                //                );
                //
                //                $ch = curl_init('https://content.dropboxapi.com/2/files/upload');
                //                curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
                //                curl_setopt($ch, CURLOPT_PUT, true);
                //                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                //                curl_setopt($ch, CURLOPT_INFILE, $fp);
                //                curl_setopt($ch, CURLOPT_INFILESIZE, $size);
                //                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                //                $response = curl_exec($ch);
                //                curl_close($ch);
                //                fclose($fp);

                $parameters = array('path' => '/Case-Files/' . $file_name);

                $headers = array(
                    'Authorization: Bearer 3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT',
                    'Content-Type: application/json'
                );

                $curlOptions = array(
                    CURLOPT_HTTPHEADER => $headers,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => json_encode($parameters),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_VERBOSE => true
                );

                $ch = curl_init('https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings');
                curl_setopt_array($ch, $curlOptions);
                $response2 = curl_exec($ch);
                $data = json_decode($response2, TRUE);
                if (!isset($data['error_summary'])) {
                    $share_link[] = $data['url'];
                } else {
                    $share_link[] = $data['error']['shared_link_already_exists']['metadata']['url'];
                }
                curl_close($ch);
            }
        }

        $dropbox_files_link = '';
        for ($index1 = 0; $index1 < count($share_link); $index1++) {
            $dropbox_files_link .= '<a href="' . $share_link[$index1] . '" target="_blank">' . $share_link[$index1] . '</a><br>';
        }

        $Error = [];
        for ($index1 = 0; $index1 < count($case_files); $index1++) {
            $query = "INSERT INTO `case_files` (case_id, additional_info, case_files, share_link, created_on) VALUES ('$Data[1]', '" . mysqli_real_escape_string($conn, $Data[0]) . "', '$case_files[$index1]', '$share_link[$index1]', '$created_on')";
            $execute = mysqli_query($conn, $query);
            //            if (!unlink("../admin/webupload/original/" . $case_files[$index1])) {
            //                $Error[] = '0';
            //            }
            if (!$execute) {
                $Error[] = '0';
            }
        }
        if (count($Error) !== 0) {
            echo '0';
        } else {
            $to = "support@medicalrecordsreform.com.test-google-a.com, Medicalrecordsreformmrr@gmail.com";
            if ($to) {
                $html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                    <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="padding: 10px; text-align: center;">
                                    <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>Hi, Admin</p>
                                    <p>Additional Case Info / File Updated</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Contact Person :</strong> ' . $user_name . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Name :</strong> ' . $case_name . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Uploaded Case File :</strong> <br>' . $dropbox_files_link . '</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p>Please visit : <a href="https://medicalrecordsreform.com/admin/" target="_blank">www.medicalrecordsreform.com/admin/</a></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>';
                $subject = "Additional Case Info / File Updated";
                $headers = "From: " . strip_tags($user_name) . " <" . strip_tags($email) . ">\r\n";
                $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $html = utf8_decode($html);
                mail($to, $subject, $html, $headers);
            }
            echo '1';
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'update-case-detail-3') {
        $Data = $_POST['Data'];
        session_start();
        $created_by = $_SESSION['user_id'];
        $last_updated = date("Y-m-d H:i:s");
        $review_services = empty($Data[1]) ? json_encode([]) : json_encode($Data[1]);
        $add_on_services = empty($Data[2]) ? json_encode([]) : json_encode($Data[2]);
        $medical_charts = empty($Data[3]) ? json_encode([]) : json_encode($Data[3]);

        $query_2 = "SELECT * FROM `customers` WHERE id='$created_by'";
        $execute_2 = mysqli_query($conn, $query_2);
        $Data2 = mysqli_fetch_array($execute_2);
        $email = $Data2['email'];
        $user_name = $Data2['name'];

        $query_3 = "SELECT * FROM `cases` WHERE id='$Data[0]'";
        $execute_3 = mysqli_query($conn, $query_3);
        $Data3 = mysqli_fetch_array($execute_3);
        $case_name = $Data3['case_name'];

        $query = "UPDATE `cases` SET review_services='$review_services', add_on_services='$add_on_services', medical_charts='$medical_charts', last_updated='$last_updated' WHERE id='$Data[0]'";
        $execute = mysqli_query($conn, $query);
        if ($execute) {
            $to = "support@medicalrecordsreform.com.test-google-a.com, Medicalrecordsreformmrr@gmail.com";
            if ($to) {
                $html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                    <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="padding: 10px; text-align: center;">
                                    <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>Hi, Admin</p>
                                    <p>Requested Services Updated</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Contact Person :</strong> ' . $user_name . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Name :</strong> ' . $case_name . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Requested Services :</strong></p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;">
                                                        Review Services : ' . implode(', ', $review_services) . ' <br>
                                                        Add on Services : ' . implode(', ', $add_on_services) . ' <br>
                                                        Medical Charts : ' . implode(', ', $medical_charts) . ' <br>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p>Please visit : <a href="https://medicalrecordsreform.com/admin/" target="_blank">www.medicalrecordsreform.com/admin/</a></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>';
                $subject = "Requested Services Updated";
                $headers = "From: " . strip_tags($user_name) . " <" . strip_tags($email) . ">\r\n";
                $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $html = utf8_decode($html);
                mail($to, $subject, $html, $headers);
            }
            echo '1';
        } else {
            echo '0';
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'case-filter') {
        $filer_data = $_POST['Data'];
        $status = [['New', 'primary'], ['Open', 'warning'], ['Processing', 'info'], ['Completed', 'success']];
        if ($filer_data[0] === '' && $filer_data[1] === '' && $filer_data[2] === '') {
            $query = "SELECT * FROM `cases` WHERE `created_by`='$filer_data[4]' ORDER BY `id` $filer_data[3]";
        } else {
            $query_builder = [];
            if ($filer_data[0]) {
                $query_builder[] = 'case_type=' . '"' . $filer_data[0] . '"' . ' AND';
            }
            if ($filer_data[1]) {
                $query_builder[] = 'case_name=' . '"' . $filer_data[1] . '"' . ' AND';
            }
            if ($filer_data[2] === '0' || $filer_data[2] === '1' || $filer_data[2] === '2' || $filer_data[2] === '3') {
                $query_builder[] = 'status=' . '"' . $filer_data[2] . '"' . ' AND';
            }
            $query = "SELECT * FROM `cases` WHERE " . implode(' ', $query_builder) . " `created_by`='$filer_data[4]' ORDER BY `id` $filer_data[3]";
        }
        $execute = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($execute);
        if ($num_rows !== 0) {
            $count = 0;
            while ($Data = mysqli_fetch_array($execute)) {
                $review_services = json_decode($Data['review_services']);
                $add_on_services = json_decode($Data['add_on_services']);
                $medical_charts = json_decode($Data['medical_charts']);
                $case_files = json_decode($Data['case_files']);
                ?>
                <tr>
                    <td><?php echo ($count + 1); ?></td>
                    <td><?php echo $Data['contact_person']; ?></td>
                    <td><?php echo $Data['contact_number']; ?></td>
                    <td><?php echo $Data['case_name']; ?></td>
                    <td><?php echo $Data['case_type']; ?></td>
                    <td><span class="badge <?php echo 'bg-' . $status[$Data['status']][1]; ?>"><?php echo $status[$Data['status']][0]; ?></span></td>
                    <td>
                        <?php
                        $case_id = $Data['id'];
                        $query3 = "SELECT * FROM `output_files` WHERE `case_id`='$case_id'";
                        $execute3 = mysqli_query($conn, $query3);
                        $count_3 = 0;
                        while ($Data3 = mysqli_fetch_array($execute3)) {
                            ?>
                            <a href="<?php echo $Data3['share_link']; ?>" target="_blank"><?php echo $Data3['output_files']; ?></a><br />
                        <?php } ?>
                    </td>
                    <td>
                        <a href="case-details.php?cid=<?php echo $Data['id']; ?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
                        <?php // if ($Data['status'] === '0' || $Data['status'] === '1') { ?>
                            <!--<button class="case-remove-btn btn btn-danger" id="<?php echo $Data['id']; ?>"><i class="far fa-trash"></i></button>-->
                        <?php // } ?>
                    </td>
                </tr>
                <?php
                $count++;
            }
        } else {
            ?>
            <tr>
                <td class="text-center" colspan="10">No data available in table</td>
            </tr>
            <?php
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'forgot-password') {
        $Data = $_POST['Data'];
        $query = "SELECT * FROM `customers` WHERE email='$Data[0]'";
        $execute = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($execute);
        $Data2 = mysqli_fetch_array($execute, MYSQLI_ASSOC);
        if ($num_rows > 0) {
            $to = $Data[0];
            $otp = sprintf("%06d", mt_rand(1, 999999));

            $query2 = "UPDATE `customers` SET otp='$otp' WHERE email='$Data[0]'";
            $execute2 = mysqli_query($conn, $query2);
            if (!$execute2) {
                echo '0';
            }
            $html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td style="padding: 10px; text-align: center;">
                                <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">
                                <p>Hi, ' . $Data2['name'] . '</p>
                                <p>Your Reset Password OTP is ' . $otp . '</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">
                                <table style="width: 100%; border-collapse: collapse;">
                                    <tfoot>
                                        <tr>
                                            <td style="padding: 10px;">
                                                <p style="margin-bottom: 8px; margin-top: 0px;">Thank You!</p>
                                                <p style="margin-bottom: 8px; margin-top: 25px;">Regards, </p>
                                                <p style="margin-bottom: 8px; margin-top: 0px;"><strong>Case Admin Team,</strong> </p>
                                                <p style="margin-bottom: 8px; margin-top: 0px;"><b>Medical Records Reform LLC.</b></p>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>';
            $subject = "Reset Password";
            $name = "Medical Records Reform LLC";
            $reply = "Medicalrecordsreformmrr@gmail.com";
            $headers = "From: " . strip_tags($name) . " <" . strip_tags($reply) . ">\r\n";
            $headers .= "Reply-To: " . strip_tags($reply) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $html = utf8_decode($html);
            if (!mail($to, $subject, $html, $headers)) {
                echo '0';
            }
            echo '1';
        } else {
            echo '0';
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'verify-otp') {
        $Data = $_POST['Data'];
        $query = "SELECT * FROM `customers` WHERE email='$Data[1]'";
        $execute = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($execute);
        if ($num_rows > 0) {
            $Data2 = mysqli_fetch_array($execute);
            if ($Data2['otp'] === $Data[0]) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'reset-password') {
        $Data = $_POST['Data'];
        $password = md5($Data[0]);
        $query = "UPDATE `customers` SET password='$password' WHERE email='$Data[1]'";
        $execute = mysqli_query($conn, $query);
        if ($execute) {
            echo '1';
        } else {
            echo '0';
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'old-password-check') {
        $Data = $_POST['Data'];
        $password = md5($Data);
        $query = "SELECT * FROM `customers` WHERE password='$password'";
        $execute = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($execute);
        if ($num_rows > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'change-password') {
        $Data = $_POST['Data'];
        $old_password = md5($Data[0]);
        $new_password = md5($Data[1]);
        $query = "UPDATE `customers` SET password='$new_password' WHERE password='$old_password'";
        $execute = mysqli_query($conn, $query);
        if ($execute) {
            echo '1';
        } else {
            echo '0';
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'profile-edit-details') {
        $Data = $_POST['Data'];
        session_start();
        $user_id = $_SESSION['user_id'];
        $name = $Data[0];
        $company = $Data[1];
        $email = $Data[4];
        $state = $Data[2];
        $username = $Data[3];

        $query = "UPDATE `customers` SET name='$name', email='$email', company_name='$company', state='$state', username='$username' WHERE id='$user_id'";
        $execute = mysqli_query($conn, $query);
        if ($execute) {
            echo '1';
        } else {
            echo '0';
        }
    }

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'create-password') {
        $Data = $_POST['Data'];
        $email = $Data[0];
        $query = "SELECT * FROM `create_password` WHERE email='$email' AND token='$Data[1]'";
        $execute = mysqli_query($conn, $query);
        $Data2 = mysqli_fetch_array($execute);
        if ($Data2) {
            $query2 = "SELECT * FROM `cases` WHERE email='$email'";
            $execute2 = mysqli_query($conn, $query2);
            $Data3 = mysqli_fetch_array($execute2);

            $query3 = "SELECT * FROM `customers` WHERE email='$email'";
            $execute3 = mysqli_query($conn, $query3);
            $Data4 = mysqli_fetch_array($execute3);

            if ($Data4) {
                /* Customer Already Created */
                echo '0';
            } else {
                $name = $Data3['contact_person'];
                $company_name = $Data3['law_firm_name'];
                $password = md5($Data[2]);
                $state = $Data3['state'];
                $status = '1';
                $created_on = date('Y-m-d H:i:s');

                $query4 = "INSERT INTO `customers` (name, email, company_name, state, username, password, otp, status, created_on) VALUES ('$name', '$email', '$company_name', '$state', '$email', '$password', NULL, '$status', '$created_on')";
                $execute4 = mysqli_query($conn, $query4);
                if ($execute4) {
                    $customer_id = mysqli_insert_id($conn);
                    $query5 = "UPDATE `cases` SET created_by = '$customer_id' WHERE email='$email'";
                    $execute5 = mysqli_query($conn, $query5);
                    if ($execute5) {
                        $query6 = "DELETE FROM `create_password` WHERE email='$email'";
                        $execute6 = mysqli_query($conn, $query6);
                        if ($execute6) {
                            echo '1';
                        } else {
                            /* Problem to Delete Create Password Table */
                            echo '0';
                        }
                    } else {
                        /* Problem to Update Customer Id to Cases Table */
                        echo '0';
                    }
                } else {
                    /* Problem to Save Customer */
                    echo '0';
                }
            }
        } else {
            /* Email / Token Miss Match */
            echo '0';
        }
    }
}
