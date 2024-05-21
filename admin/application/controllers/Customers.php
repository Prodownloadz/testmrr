<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

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
        $data['logged'] = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $query = $this->db->order_by("id", "DESC")->get('customers');
        $customers = $query->result_array();
        $arr['content'] = $customers;

        if ($arr['admin_id']) {
            $this->load->view('customers/customers', $arr);
        } else {
            $this->load->view('welcome_message', $arr);
        }
    }

    public function statusModal() {
        $customer_id = $this->input->post()['Data'];
        $query = $this->db->where('id', $customer_id)->get('customers');
        $customers = $query->result_array();
        ?>
        <select class="customer_status form-control" id="<?= $customers[0]['id']; ?>">
            <option value="">Select Status</option>
            <option value="1" <?= $customers[0]['status'] === '1' ? 'selected' : ''; ?>>Active</option>
            <option value="0" <?= $customers[0]['status'] === '0' ? 'selected' : ''; ?>>In Active</option>
        </select>
        <span class="customer_status_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please select status *</span>
        <?php
    }

    public function statusUpdate() {
        $Data = $this->input->post()['Data'];
        $query = $this->db->where('id', $Data[1])->get('customers');
        $customers = $query->result_array();
        $update = array(
            'status' => $Data[0]
        );
        $this->db->where('id', $Data[1]);
        $execute = $this->db->update('customers', $update);
        if ($execute) {
            $email = $customers[0]['email'];
            $user_name = $customers[0]['name'];
            $status = [['In Active', 'danger'], ['Active', 'success']];
            if ($Data[0] === '1') {
                $msg = 'Your Account has been Revoked';
            } else {
                $msg = 'Your Account has been Suspended, Please Contact Admin, support@medicalrecordsreform.com';
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
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 10px;">
                                                    <p style="margin-bottom: 8px;margin-top: 0px;"><strong>Login Status :</strong> ' . $status[$Data[0]][0] . '</p>
                                                    <p style="margin-bottom: 8px;margin-top: 0px;">' . $msg . '</p>
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
                $subject = "Account Status";
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

//    public function customeradd() {
//        $data['logged'] = false;
//        $arr['admin_id'] = $this->my_session->get('admin_id');
//        $arr['username'] = $this->my_session->get('username');
//
//        $this->db->select('*');
//        $this->db->from('web_customer');
//        // $this->db->where('id',$salespersonid);
//        $query = $this->db->get();
//        $arr['content1'] = $query->result_array();
//        if ($arr['admin_id']) {
//            $this->load->view('customer/customeradd', $arr);
//        } else {
//            $this->load->view('welcome_message', $arr);
//        }
//    }
//
//    public function customeredit() {
//        $data['logged'] = false;
//        $arr['admin_id'] = $this->my_session->get("admin_id");
//        $arr['username'] = $this->my_session->get("username");
//
//        $id = $this->input->get('id', TRUE);
//
//        $this->db->select('*');
//        $this->db->from('web_customer');
//        $this->db->where('id', $id);
//        $query = $this->db->get();
//        $arr['content'] = $query->result_array();
//
//        if ($arr['admin_id']) {
//            $this->load->view('customer/customeredit', $arr);
//        } else {
//            $this->load->view('welcome_message', $arr);
//        }
//    }
//
//    public function add() {
//        $data['logged'] = false;
//        $arr['admin_id'] = $this->my_session->get('admin_id');
//        $arr['username'] = $this->my_session->get('username');
//
//        $customer_name = $this->input->post('customer_name');
//        $customer_mobile = $this->input->post('customer_mobile');
//        $customer_address = $this->input->post('customer_address');
//        $eb_number = $this->input->post('eb_number');
//        $dth_number = $this->input->post('dth_number');
//        $bank_name = $this->input->post('bank_name');
//        $ifsc_code = $this->input->post('ifsc_code');
//        $account_number = $this->input->post('account_number');
//        $idproof = $this->input->post('idproof');
//        $salesperson_name = $this->input->post('salesperson_name');
//        //	$qrcode  = $this->input->post('qrcode');
//        $url = $this->input->post('url');
//        // echo $url;die;
//
//        include("resize-class.php");
//        if ($_FILES['idproof']['name'] != "") {
//            $path_parts = pathinfo($_FILES['idproof']['name']);
//            $image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
//            $imgname = $image_path;
//
//            $source = $_FILES['idproof']['tmp_name'];
//            $originalpath = "webupload/original/" . $imgname;
//            $thumbnailpath = "webupload/thumb/" . $imgname;
//            move_uploaded_file($source, $originalpath);
//            $resizeObj = new resize($originalpath);
//            $resizeObj->resizeImage(350, 350, 'crop');
//            $resizeObj->saveImage($thumbnailpath, 100);
//        }
//        /* 	if($_FILES['url']['name'] != "")
//          {
//          $path_parts = pathinfo($_FILES['url']['name']);
//          $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
//          $qrcodeimg=$image_path;
//
//          $source =  $_FILES['url']['tmp_name'];
//          $originalpath  = "webupload/original/".$qrcodeimg;
//          $thumbnailpath = "webupload/thumb/".$qrcodeimg;
//          move_uploaded_file($source,$originalpath);
//          $resizeObj = new resize($originalpath);
//          $resizeObj -> resizeImage(350, 350, 'crop');
//          $resizeObj -> saveImage($thumbnailpath, 100);
//          } */
//
//        $date = date('Y-m-d');
//        $status = "Enable";
//        $data = array(
//            'customer_name' => $customer_name,
//            'customer_mobile' => $customer_mobile,
//            'customer_address' => $customer_address,
//            'eb_number' => $eb_number,
//            'bank_name' => $bank_name,
//            'ifsc_code' => $ifsc_code,
//            'account_number' => $account_number,
//            'salesperson_id' => $salesperson_name,
//            'idproof' => $imgname,
//            'qrcode' => $url,
//            'status' => $status,
//            'date' => $date,
//            'update_date' => $date
//        );
//
//        $this->db->insert('web_customer', $data);
//        header('Location:' . BEGIN_PATH . '/customer');
//    }
//
//    public function edit() {
//        $data['logged'] = false;
//        $arr['admin_id'] = $this->my_session->get('admin_id');
//        $arr['username'] = $this->my_session->get('username');
//
//        $id = $this->input->post('id');
//        $customer_name = $this->input->post('customer_name');
//        $customer_mobile = $this->input->post('customer_mobile');
//        $customer_address = $this->input->post('customer_address');
//        $eb_number = $this->input->post('eb_number');
//        $dth_number = $this->input->post('dth_number');
//        $bank_name = $this->input->post('bank_name');
//        $ifsc_code = $this->input->post('ifsc_code');
//        $account_number = $this->input->post('account_number');
//        include("resize-class.php");
//
//        $date = date('Y-m-d');
//        $status = "Enable";
//        $update = array(
//            'customer_name' => $customer_name,
//            'customer_mobile' => $customer_mobile,
//            'customer_address' => $customer_address,
//            'eb_number' => $eb_number,
//            'bank_name' => $bank_name,
//            'ifsc_code' => $ifsc_code,
//            'account_number' => $account_number,
//            'status' => $status,
//            'update_date' => $date
//        );
//
//        $this->db->where('id', $id);
//        $this->db->update('web_customer', $update);
//        header('Location:' . BEGIN_PATH . '/customer');
//    }
//
//    public function customerview() {
//        $data['logged'] = false;
//        $arr['admin_id'] = $this->my_session->get("admin_id");
//        $arr['username'] = $this->my_session->get("username");
//
//        $cid = $this->input->get('cid');
//
//        $this->db->select('*');
//        $this->db->from('web_customer');
//        $this->db->where('id', $cid);
//        $query = $this->db->get();
//        $arr['content'] = $query->result_array();
//        //$salespersonid= $arr['content'][0]['salesperson_id'];
//        //echo $salespersonid;die;
//
//        $this->db->select('*');
//        $this->db->from('web_customer');
//        //$this->db->where('id',$salespersonid);
//        $query = $this->db->get();
//        $arr['content1'] = $query->result_array();
//        if ($arr['admin_id']) {
//            $this->load->view('customer/customerview', $arr);
//        } else {
//            $this->load->view('welcome_message', $arr);
//        }
//    }
//
//    public function update() {
//        $data['logged'] = false;
//        $arr['admin_id'] = $this->my_session->get("admin_id");
//        $arr['username'] = $this->my_session->get("username");
//
//        $uid = $_REQUEST['uid'];
//        $accept_status = $_REQUEST['accept_status'];
//
//        $update = array(
//            'status' => $accept_status
//        );
//
//        $this->db->where('id', $uid);
//        $this->db->update('web_customer', $update);
//
//        header('Location:' . BEGIN_PATH . '/customer');
//    }

    public function delete() {
        $data['logged'] = false;
        $arr['admin_id'] = $this->input->post('admin_id');
        $arr['username'] = $this->input->post('username');

        $customer_id = $this->input->get('id', TRUE);
        $this->db->where('id', $customer_id);
        $this->db->limit(1);
        $this->db->delete('customers');

        $this->db->where('created_by', $customer_id);
        $this->db->delete('cases');

        header('Location:' . BEGIN_PATH . '/customers');
    }

//
//    public function delpayment() {
//        $data['logged'] = false;
//        $arr['admin_id'] = $this->input->post('admin_id');
//        $arr['username'] = $this->input->post('username');
//
//        $did = $this->input->get('did', TRUE);
//
//        $this->db->where('id', $did);
//        $this->db->limit(1);
//        $this->db->delete('web_amount');
//
//        header('Location:' . BEGIN_PATH . '/customer/customerPaymentlist');
//    }
//
//    public function customerPaymentlist() {
//        $data['logged'] = false;
//        $arr['admin_id'] = $this->my_session->get("admin_id");
//        $arr['username'] = $this->my_session->get("username");
//
//        $this->db->select('*');
//        $this->db->from("web_amount");
//        //$this->db->where("status","1");
//        $this->db->order_by("id", "DESC");
//        $query = $this->db->get();
//        $arr['content'] = $query->result_array();
////print_r($arr['content']);die;
//        if ($arr['admin_id']) {
//            $this->load->view('customer/customerpaymentlist', $arr);
//        } else {
//            $this->load->view('welcome_message', $arr);
//        }
//    }
}
