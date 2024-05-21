<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cases extends CI_Controller {

    var $site_title;
    var $css;
    var $base_url;
    var $data = array();

    public function __construct() {
        parent::__construct();

        $this->load->library('my_session');
        $this->load->library('auth');
    }

    public function index() {
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $this->db->order_by('id', 'DESC');
        $this->db->where('created_by !=', NULL);
        $query = $this->db->get('cases');

        $cases = $query->result_array();
        $arr['content'] = $cases;

        if ($arr['admin_id']) {
            $this->load->view('case/cases', $arr);
        } else {
            $this->load->view('welcome_message', $arr);
        }
    }

    public function just_submitted_cases() {
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $this->db->order_by('id', 'DESC');
        $this->db->where('created_by', NULL);
        $query = $this->db->get('cases');

        $cases = $query->result_array();
        $arr['content'] = $cases;

        if ($arr['admin_id']) {
            $this->load->view('case/cases', $arr);
        } else {
            $this->load->view('welcome_message', $arr);
        }
    }

    public function casestatus() {
        $data['logged'] = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $case_status = $this->input->get('status', TRUE);

        $this->db->where('status', $case_status);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get('cases');
        $cases = $query->result_array();
        $arr['content'] = $cases;

        if ($arr['admin_id']) {
            $this->load->view('case/casestatus', $arr);
        } else {
            $this->load->view('welcome_message', $arr);
        }
    }

    public function caseview() {
        $data['logged'] = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $case_id = $this->input->get('cid');

        $this->db->where('id', $case_id);
        $query = $this->db->get('cases');
        $cases = $query->result_array();

        $arr['content'] = $cases;

        if ($arr['admin_id']) {
            $this->load->view('case/caseview', $arr);
        } else {
            $this->load->view('welcome_message', $arr);
        }
    }

    public function casesedit() {
        $data['logged'] = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $id = $this->input->get('cid', TRUE);

        $this->db->where('id', $id);
        $query = $this->db->get('cases');
        $arr['content'] = $query->result_array();

        if ($arr['admin_id']) {
            $this->load->view('case/casesedit', $arr);
        } else {
            $this->load->view('welcome_message', $arr);
        }
    }

    public function edit() {
        ini_set('memory_limit', '-1');

        $data['logged'] = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $Data = json_decode($this->input->post('Data'));

        $cid = $Data->cid;
        $files = $Data->files;

        $output_files = [];
        $share_link = [];
        for ($index = 0; $index < count($files); $index++) {
            $file_name = $files[$index];
            $output_files[] = $file_name;
//            if (!move_uploaded_file($_FILES['file']['tmp_name'][$index], 'webupload/output/' . $file_name)) {
//                echo '0';
//            }
//            $filePath = "webupload/output/" . $file_name;
//            $chunk = 0;
//            $chunks = 0;
//            $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
//            if ($out) {
//                $in = @fopen($_FILES['file']['tmp_name'][$index], "rb");
//                if ($in) {
//                    while ($buff = fread($in, 4096)) {
//                        fwrite($out, $buff);
//                    }
//                } else {
//                    echo '0';
//                }
//                @fclose($in);
//                @fclose($out);
//                @unlink($_FILES['file']['tmp_name'][$index]);
//            } else {
//                echo '0';
//            }
//            (!$chunks || $chunk == $chunks - 1) ? rename("{$filePath}.part", $filePath) : '';
//
//            $destination = 'Output-Files';
//
//            $append_url = 'https://content.dropboxapi.com/2/files/upload_session/append_v2';
//            $start_url = 'https://content.dropboxapi.com/2/files/upload_session/start';
//            $finish_url = 'https://content.dropboxapi.com/2/files/upload_session/finish';
//
//            $info_array = array();
//            $info_array['close'] = false;
//
//            $headers = array('Authorization: Bearer 3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT',
//                'Content-Type: application/octet-stream',
//                'Dropbox-API-Arg: ' . json_encode($info_array));
//
//            $chunk_size = 50000000;
//
//            $path = './webupload/output/' . $file_name;
//            $fp = fopen($path, 'rb');
//            $fileSize = filesize($path);
//            $tosend = $fileSize;
//            $first = $tosend > $chunk_size ? $chunk_size : $tosend;
//
//            $ch = curl_init($start_url);
//            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//            curl_setopt($ch, CURLOPT_POST, true);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $first));
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            $response = curl_exec($ch);
//            $tosend -= $first;
//
//            $resp = explode('"', $response);
//
//            $sesion = $resp[3];
//            $posicion = $first;
//            error_log($response);
//
//            $info_array["cursor"] = array();
//            $info_array["cursor"]["session_id"] = $sesion;
//
//            while ($tosend > $chunk_size) {
//                $info_array["cursor"]["offset"] = $posicion;
//                $headers[2] = 'Dropbox-API-Arg: ' . json_encode($info_array);
//
//                curl_setopt($ch, CURLOPT_URL, $append_url);
//                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//                curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $chunk_size));
//                $response = curl_exec($ch);
//
//                $tosend -= $chunk_size;
//                $posicion += $chunk_size;
//
//                if ($response != "null") {
//                    exit(-1);
//                }
//            }
//            unset($info_array["close"]);
//            $info_array["cursor"]["offset"] = $posicion;
//            $info_array["commit"] = array();
//            $info_array["commit"]["path"] = '/' . $destination . '/' . $file_name;
//            $info_array["commit"]["mode"] = array();
//            $info_array["commit"]["mode"][".tag"] = "overwrite";
//            $info_array["commit"]["autorename"] = true;
//            $info_array["commit"]["mute"] = false;
//            $info_array["commit"]["strict_conflict"] = false;
//            $headers[2] = 'Dropbox-API-Arg: ' . json_encode($info_array);
//
//            curl_setopt($ch, CURLOPT_URL, $finish_url);
//            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $tosend > 0 ? fread($fp, $tosend) : null);
//            $response = curl_exec($ch);
//            curl_close($ch);
//            fclose($fp);

            $parameters = array('path' => '/Output-Files/' . $file_name);

            $headers = array('Authorization: Bearer 3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT',
                'Content-Type: application/json');

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
        for ($index2 = 0; $index2 < count($output_files); $index2++) {
            $output_files_filter = array(
                'case_id' => $cid,
                'output_files' => $output_files[$index2],
            );
            $query = $this->db->get_where('output_files', $output_files_filter);
            $is_output_files = $query->row();
            $created_on = date("Y-m-d H:i:s");
            $post_data = array(
                'case_id' => $cid,
                'output_files' => $output_files[$index2],
                'share_link' => $share_link[$index2],
                'created_on' => $created_on
            );
            if (!$is_output_files) {
                if (!$this->db->insert('output_files', $post_data)) {
                    $Error[] = '0';
                }
            } else {
                $this->db->where($output_files_filter);
                $u_output_files = $this->db->update('output_files', array('created_on' => $created_on));
                if (!$u_output_files) {
                    $Error[] = '0';
                }
            }
//            $path = str_replace('\\', '/', FCPATH);
//            unlink($path . 'webupload/output/' . $output_files[$index2]);
        }

        if (count($Error) !== 0) {
            echo '0';
        }

        $this->db->where('id', $cid);
        $query = $this->db->get('cases');
        $arr['content'] = $query->result_array();
        $user_id = $arr['content'][0]['created_by'];
        $case_name = $arr['content'][0]['case_name'];

        if ($user_id) {
            $this->db->where('id', $user_id);
            $query2 = $this->db->get('customers');
            $arr['content2'] = $query2->result_array();
            $email = $arr['content2'][0]['email'];
            $user_name = $arr['content2'][0]['name'];
        } else {
            $email = $arr['content'][0]['email'];
            $user_name = $arr['content'][0]['contact_person'];
        }
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
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>Delivery File Added</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Name :</strong> ' . $case_name . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Delivery File :</strong> ' . $dropbox_files_link . '</p>
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
            $subject = "Delivery File Added";
            $name = "Medical Records Reform LLC";
            $reply = "support@medicalrecordsreform.com";
            $headers = "From: " . strip_tags($name) . " <" . strip_tags($reply) . ">\r\n";
            $headers .= 'Cc: support@medicalrecordsreform.com' . "\r\n";
            $headers .= "Reply-To: " . strip_tags($reply) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $html = utf8_decode($html);
            if (mail($to, $subject, $html, $headers)) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }

    public function delete() {
        $data['logged'] = false;
        $arr['admin_id'] = $this->input->post('admin_id');
        $arr['username'] = $this->input->post('username');

        $case_id = $this->input->get('id', TRUE);
        $this->db->where('id', $case_id);
        $this->db->limit(1);
        $this->db->delete('cases');

        header('Location:' . BEGIN_PATH . '/cases');
    }

    public function remove_output_file() {
        $id = $this->input->get('id', TRUE);
        $case_id = $this->input->get('case_id', TRUE);
        $this->db->where('id', $id);
        $this->db->limit(1);
        $this->db->delete('output_files');

        header('Location:' . BEGIN_PATH . '/cases/caseview?cid=' . $case_id);
    }

    public function update() {
        $data['logged'] = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $case_id = $_REQUEST['cid'];
        $case_status = $_REQUEST['case_status'];
        $status = [['New', 'primary'], ['Open', 'warning'], ['Processing', 'info'], ['Completed', 'success']];

        $last_updated = date("Y-m-d H:i:s");
        $update = array(
            'last_updated' => $last_updated,
            'status' => $case_status
        );

        $this->db->where('id', $case_id);
        $query = $this->db->get('cases');
        $arr['content'] = $query->result_array();
        $user_id = $arr['content'][0]['created_by'];
        $case_name = $arr['content'][0]['case_name'];

        if ($user_id) {
            $this->db->where('id', $user_id);
            $query2 = $this->db->get('customers');
            $arr['content2'] = $query2->result_array();
            $email = $arr['content2'][0]['email'];
            $user_name = $arr['content2'][0]['name'];
        } else {
            $email = $arr['content'][0]['email'];
            $user_name = $arr['content'][0]['contact_person'];
        }

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
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <p>Case Status Updated</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Name :</strong> ' . $case_name . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Case Status :</strong> ' . $status[$case_status][0] . '</p>
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
            $subject = "Case Status Updated";
            $name = "Medical Records Reform LLC";
            $reply = "support@medicalrecordsreform.com";
            $headers = "From: " . strip_tags($name) . " <" . strip_tags($reply) . ">\r\n";
            $headers .= "Reply-To: " . strip_tags($reply) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $html = utf8_decode($html);
            mail($to, $subject, $html, $headers);
        }
        $this->db->where('id', $case_id);
        $this->db->update('cases', $update);

        header('Location:' . BEGIN_PATH . '/cases/caseview?cid=' . $case_id);
    }

    public function bulkDownload() {
        set_time_limit(0);
ini_set('memory_limit', '20000M');
        $data['logged'] = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $case_id = $_REQUEST['case_id'];

        $this->db->where('case_id', $case_id);
        $query = $this->db->get('case_files');
        $case_files = $query->result_array();

        $this->load->library('zip');
        $this->load->helper('file');

        foreach ($case_files as $item) {
            $in_filepath = '/Case-Files/' . $item['case_files'];
            $out_filepath = $item['case_files'];

            $out_fp = fopen($out_filepath, 'w+');
            if ($out_fp === FALSE) {
                echo "fopen error; can't open $out_filepath\n";
            }
            $url = 'https://content.dropboxapi.com/2/files/download';
            $header_array = array(
                'Authorization: Bearer 3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT',
                'Content-Type:',
                'Dropbox-API-Arg: {"path":"' . $in_filepath . '"}'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header_array);
            curl_setopt($ch, CURLOPT_FILE, $out_fp);
            $metadata = null;
            curl_setopt($ch, CURLOPT_HEADERFUNCTION, function ($ch, $header) use (&$metadata) {
                $prefix = 'dropbox-api-result:';
                if (strtolower(substr($header, 0, strlen($prefix))) === $prefix) {
                    $metadata = json_decode(substr($header, strlen($prefix)), true);
                }
                return strlen($header);
            });
            $output = curl_exec($ch);
            if ($output === FALSE) {
                echo "curl error: " . curl_error($ch);
            }
            curl_close($ch);
            fclose($out_fp);
            $this->zip->read_file($metadata['name']);
            $path = str_replace('\\', '/', FCPATH);
            unlink($path . $item['case_files']);
        }
        $this->zip->download("case-$case_id-files.zip");
    }
    
    public function file_upload() {
        
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
            $destination = 'Output-Files';
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
    }

}
