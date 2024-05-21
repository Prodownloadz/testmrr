<?php

include './user-panel/include/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ini_set('memory_limit', '-1');
    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'add-new-case-guest') {
        $Data = json_decode($_POST['Data']);

        $review_services = implode(', ', $Data[11]);
        $add_on_services = implode(', ', $Data[12]);
        $medical_charts = implode(', ', $Data[13]);

        $review_services_02 = json_encode($Data[11]);
        $add_on_services_02 = json_encode($Data[12]);
        $medical_charts_02 = json_encode($Data[13]);

        $status = '0';
        $created_on = date("Y-m-d H:i:s");

        //        $case_files = [];
        //        $share_link = [];
        //        for ($index = 0; $index < count($Data[15]); $index++) {
        //            $file_name = $Data[15][$index];
        //            $case_files[] = $file_name;
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
        //        $dropbox_files_link = '';
        //        for ($index1 = 0; $index1 < count($share_link); $index1++) {
        //            $dropbox_files_link .= '<a href="' . $share_link[$index1] . '" target="_blank">' . $share_link[$index1] . '</a><br>';
        //        }

        $NULL = NULL;
        $case_id = '';
        $query = "INSERT INTO `cases` (attorney_name, law_firm_name, contact_person, contact_number, email, email_2, case_name, case_description, case_type, expected_delivery_date, review_services, add_on_services, medical_charts, case_files, output_files, share_link, status, state, country, notes, created_on, created_by, last_updated) VALUES ('" . mysqli_real_escape_string($conn, $Data[0]) . "', '" . mysqli_real_escape_string($conn, $Data[8]) . "', '" . mysqli_real_escape_string($conn, $Data[1]) . "', '$Data[3]', '$Data[2]', '$Data[16]', '" . mysqli_real_escape_string($conn, $Data[5]) . "', '" . mysqli_real_escape_string($conn, $Data[7]) . "', '$Data[6]', '$Data[10]', '" . $review_services_02 . "', '" . $add_on_services_02 . "', '" . $medical_charts_02 . "', '', '', '', '$status', '$Data[4]', '" . mysqli_real_escape_string($conn, $Data[9]) . "', '" . mysqli_real_escape_string($conn, $Data[14]) . "', '$created_on', NULL, NULL)";
        $execute = mysqli_query($conn, $query);
        if ($execute) {
            $case_id = mysqli_insert_id($conn);
            //            $Error = [];
            //            for ($index1 = 0; $index1 < count($case_files); $index1++) {
            //                $query3 = "INSERT INTO `case_files` (case_id, additional_info, case_files, share_link, created_on) VALUES ('$case_id', NULL, '$case_files[$index1]', '$share_link[$index1]', '$created_on')";
            //                $execute3 = mysqli_query($conn, $query3);
            //                if (!$execute3) {
            //                    $Error[] = '0';
            //                }
            //            }
            //            if (count($Error) !== 0) {
            //                echo '0';
            //            }
        }

        require './PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls'; //tls
        $mail->SMTPAuth = true;
        $mail->Username = "mrr@medicalrecordsreform.com";
        $mail->Password = "vlzyrwwrerbaxdce";

        $mail->setFrom($Data[2], 'Case Team - MRR');

        $mail->addAddress('support@medicalrecordsreform.com');
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
                                                    <p style="margin-bottom: 8px;margin-top: 0px;">
                                                        Attorney or Requestor Name : ' . $Data[0] . ' <br>
                                                        Contact Person Name : ' . $Data[1] . ' <br>
                                                        Law Firm Name : ' . $Data[8] . ' <br>
                                                        Email 1 : ' . $Data[2] . ' <br>
                                                        Email 2 : ' . $Data[16] . ' <br>
                                                        Contact Number : ' . $Data[3] . ' <br>
                                                        Country : ' . $Data[9] . ' <br>
                                                        State : ' . $Data[4] . ' <br>
                                                        Case Name : ' . $Data[5] . ' <br>
                                                        Case Type : ' . $Data[6] . ' <br>
                                                        Case Description : ' . $Data[7] . ' <br>
                                                        Review Services : ' . $review_services . ' <br>
                                                        Add on Services : ' . $add_on_services . ' <br>
                                                        Medical Charts : ' . $medical_charts . ' <br>
                                                        Expected Delivery Date : ' . $Data[10] . ' <br>
                                                        Notes to us : ' . $Data[14] . '
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
        $mail->Subject = "New Case from MRR Guest User";
        $mail->Body = $html;
        $mail->AddReplyTo($Data[2]);
        if ($mail->send()) {
            $to = $Data[2];
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
                                    <p>Hi, ' . $Data[1] . '</p>
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
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Name :</strong> ' . $Data[5] . '</p>
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
                $reply = "support@medicalrecordsreform.com";
                $headers = "From: " . strip_tags($name) . " <" . strip_tags($reply) . ">\r\n";
                $headers .= "Reply-To: " . strip_tags($reply) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $html = utf8_decode($html);
                mail($to, $subject, $html, $headers);

                /* Create a Password Mail */
                $mail = new PHPMailer;
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Debugoutput = 'html';

                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl'; //tls
                $mail->SMTPAuth = true;
                $mail->Username = "noreply@medicalrecordsreform.com";
                $mail->Password = "MediNP(Reform)&22";

                $mail->setFrom('support@medicalrecordsreform.com', 'Medical Records Reform LLC');
                $mail->addAddress($to);
                $mail->isHTML(true);
                $mail->Subject = "Create a Password";

                $token = generate_token();
                $query4 = "INSERT INTO `create_password` (`email`, `token`, `created_at`) VALUES ('$to', '$token', '$created_on')";
                $execute4 = mysqli_query($conn, $query4);
                if (!$execute4) {
                    echo json_encode(['0', '']);
                }

                $cp_html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                    <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="padding: 10px; text-align: center;">
                                    <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>Hi, ' . $Data[1] . '</p>
                                    <p>Sending you this email because we received your case information.</p>
                                    <p>Request you to create password by clicking the button below for Login in to your Case account ( <a href="https://medicalrecordsreform.com/user-panel/" target="_blank">https://medicalrecordsreform.com/user-panel/</a> ) of Medical Records Reform LLC that will allow to keep your case files secure, track your cases and the status of them with us.</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <a href="https://medicalrecordsreform.com/user-panel/create-password.php?token=' . $token . '&email=' . $to . '" style="box-sizing: border-box; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #2d3748; border-bottom: 8px solid #2d3748; border-left: 18px solid #2d3748; border-right: 18px solid #2d3748; border-top: 8px solid #2d3748;" target="_blank">Create a Password</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>If you do not wish to login into your account, no further action is required.</p>
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
                </div>';
                $mail->Body = $cp_html;
                if (!$mail->send()) {
                    echo json_encode(['0', '']);
                }
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

        require './PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls'; //tls
        $mail->SMTPAuth = true;
        $mail->Username = "mrr@medicalrecordsreform.com";
        $mail->Password = "RecordsM22Mrr#";

        $mail->setFrom($Data2['email'], 'Case Team - MRR');

        $mail->addAddress('support@medicalrecordsreform.com');
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
                $reply = "support@medicalrecordsreform.com";
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

    if (isset($_POST) && isset($_POST['Id']) && $_POST['Id'] === 'is-check-customer') {
        $email = $_POST['email'];
        $query = "SELECT * FROM `customers` WHERE email='$email'";
        $execute = mysqli_query($conn, $query);
        $Data = mysqli_fetch_array($execute);
        if ($Data) {
            /* Customer Already Created */
            echo '0';
        } else {
            /* New Customer */
            echo '1';
        }
    }
}

function generate_token()
{
    $string = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($string), 0, 25);
}
