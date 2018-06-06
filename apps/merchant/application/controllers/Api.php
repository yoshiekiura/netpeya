<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library("braintree_lib");

        $this->load->model("auth_model");

    }

    public function getCountry() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->load->model("country_model");

        $this->form_validation->set_rules("countryID", "Country ID", "required|numeric|is_natural_no_zero");

        $countryID = $this->input->post("countryID");

        if ($this->form_validation->run()) {
            $result = $this->country_model->getCountryID($countryID);

        } else {
            $errors = $this->form_validation->getErrorsArray();
        }
        return $this->formatData($result, $errors);
    }

    public function login() {
        $result = array();
        $errors = array();

        $this->form_validation->set_rules("user", "User", "required");

        $user = json_decode($this->input->post("user"), TRUE);

        $user['email_address'] = strtolower($user['login_email']);

        if ($this->form_validation->run()) {
            $is_logged = $this->auth_model->login($user['email_address'], $user['login_password']);

            if($is_logged) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $errors = $this->xannia_auth->errors();
            }
        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function logout() {
        if($this->xannia_auth->logout()) {
           redirect('login', 'refresh');
        }
    }

    public function change_password() {
        $result = array();
        $errors = array();
        $this->form_validation->set_rules("new_password", "New Password", "required");
        $this->form_validation->set_rules("old_password", "Old Password", "required");

        $email = $this->user['email_address'];
        $old_password = $this->input->post("old_password");
        $new_password = $this->input->post("new_password");

        $valid = $this->xannia_auth->validate_password($email, $old_password);
        if($valid) {
            if ($this->form_validation->run() && $valid) {
                $res = $this->xannia_auth->reset_password($email, $new_password);
                if($res) {
                    $result['success'] = true;
                } else {
                    $result['success'] = false;
                }
            } else {
                $result['success'] = false;
                $errors = $this->form_validation->getErrorsArray();
            }
        } else {
            $result['success'] = false;
            $result['message'] = 'Wrong current password';
        }

        return $this->formatData($result, $errors);
    }

    public function forgot_password() {
        $result = array();
        $errors = array();

        $this->form_validation->set_rules("email", "Email", "required");

        $email = $this->input->post("email");

        if ($this->form_validation->run()) {

            $user = $this->user_model->getUserInfo($email);

            if($user) {
                $user = $user['user'];
                $res = $this->auth_model->forgotten_password($email);
                if($res) {
                    $user = $this->user_model->getUserInfo($email)['user'];
                    $this->postmark->from('no-reply@xannia.com', 'Xannia');
                    $this->postmark->to($user['email_address'], $user['first_name'] . ' ' . $user['last_name']);
                    $this->postmark->subject('Reset password');
                    $this->postmark->message_html($this->load->view('templates/email/forgot_password', $user, true));
                    $this->postmark->send();
                    $result['success'] = true;
                } else {
                    $result['success'] = false;
                    $result['message'] = 'Failed to send link, please try again.';
                }
            } else {
                $result['success'] = false;
                $result['message'] = 'You are not registered, create an account for free!';
            }
        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function complete_forgot_password() {
        $result = array();
        $errors = array();

        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("password", "Password", "required");

        $email = $this->input->post("email");
        $password = $this->input->post("password");

        if ($this->form_validation->run()) {
            $res = $this->xannia_auth->reset_password($email, $password);
            if($res) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $result['message'] = 'Failed to send link, please try again.';
            }
        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function clear_lockdown() {
        $result = array();
        $errors = array();

        $this->form_validation->set_rules("identity", "Identity", "required");

        $identity = $this->input->post("identity");

        if ($this->form_validation->run()) {

            if($this->auth_model->clear_login_attempts($identity)) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $errors = $this->xannia_auth->errors();
            }
        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function register() {
        $result = array();
        $errors = array();

        $this->form_validation->set_rules("user", "User", "required");

        $user = json_decode($this->input->post("user"), TRUE);
        $user['email_address'] = strtolower($user['register_email']);

        if ($this->form_validation->run()) {
            $res = $this->auth_model->create_user($user);
            if ($res) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $errors = $this->xannia_auth->errors();
            }
        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function setup_complete() {
        $result = array();
        $errors = array();

        $this->form_validation->set_rules("user", "User", "required");

        $user = json_decode($this->input->post("user"), TRUE);

        if ($this->form_validation->run()) {
            $res = $this->user_model->finish_setup($user);
            if ($res) {
                $is_logged = $this->auth_model->login($res['email_address'], $user['finish_setup_password']);
                if($is_logged) {
                    $result['success'] = true;
                } else {
                    $result['success'] = false;
                    $errors = $this->xannia_auth->errors();
                }
            } else {
                $result['success'] = false;
                $errors = $this->xannia_auth->errors();
            }
        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function activate_account() {
        $result = array();
        $errors = array();

        $this->form_validation->set_rules("hash", "Hash", "required");
        $this->form_validation->set_rules("id", "Id", "required");

        $id = $this->input->post("id");
        $hash = $this->input->post("hash");

        if ($this->form_validation->run()) {
            $res = $this->auth_model->activate($id, $hash);
            if ($res) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $errors = $this->xannia_auth->errors();
            }
        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function update_user() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->form_validation->set_rules("user", "User", "required");

        $user = json_decode($this->input->post("user"), TRUE);

        if ($this->form_validation->run()) {
            $res = $this->auth_model->update($this->session->userdata('user_id'), $user);
            if ($res > 0) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $errors = $this->xannia_auth->errors();
            }
        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function add_merchant_account() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->form_validation->set_rules("currency_id", "Currency ID", "required");
        $this->form_validation->set_rules("account_name", "Account Name");

        $currency_id = $this->input->post("currency_id");
        $account_name = $this->input->post("account_name");

        if ($this->form_validation->run()) {
            if ($this->account_model->addMerchantAccount($currency_id, null, $account_name)) {
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $errors = $this->xannia_auth->errors();
            }
        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function getRecipient() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->form_validation->set_rules("recipient_identity", "Recipient ID", "required");

        $recipient_identity = $this->input->post("recipient_identity");

        if ($this->form_validation->run()) {
            $res = $this->user_model->getUserInfo($recipient_identity);
            if ($res > 0) {
                $result = $res;
                $result['success'] = true;
            } else {
                $result['success'] = false;
                $errors = $this->xannia_auth->errors();
            }
        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function transferMoney() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $none_account_holder = false;

        $this->form_validation->set_rules("sender_wallet_id", "Sender Wallet ID", "required");
        $this->form_validation->set_rules("recipient_email", "Recipient Email", "required");
        $this->form_validation->set_rules("currency_to", "Currency To", "required");
        $this->form_validation->set_rules("amount", "Amount", "required");
        $this->form_validation->set_rules("includes_fees", "Includes Fees", "required");

        $recipient_email = $this->input->post("recipient_email");
        $amount = (double)str_replace(' ', '', $this->input->post("amount"));
        $sender_wallet_id = $this->input->post("sender_wallet_id");
        $currency_to = $this->input->post("currency_to");
        $includes_fees = $this->input->post("includes_fees") == 'true' ? true : false;

        if ($this->form_validation->run()) {
            $fees = (double)$this->config->item('internal_transfer_fee', 'xannia');

            $total_fees = (double)(($fees / 100) * $amount);

            $sender_wallet = $this->account_model->getWalletByID($sender_wallet_id, $this->session->userdata('user_id'));

            $recipient_data = $this->user_model->getUserInfo($recipient_email);
            $sender_data = $this->user_model->getUserById($this->session->userdata('user_id'));

            if(!$recipient_data) {
                $recipient_data = $this->user_model->create_automatic_user($recipient_email, $currency_to);
                $none_account_holder = true;
            }

            if ($recipient_data){
                $sender = $sender_data;
                $recipient = $recipient_data['user'];

                $recipient_wallet = $this->account_model->getWalletByCurrencyCode($currency_to, $recipient['id']);
                if(!$recipient_wallet) {
                    $recipient_wallet = $this->account_model->getDefaultWallet($recipient['id']);
                }

                $amount_after_fees = (double)$amount;
                $amount_after_rates = (double)$amount;

                if($currency_to != $sender_wallet['wallet_currency_code']) {
                    $cc = new CurrencyConverter();
                    $cc_result = $cc->convert($currency_to, $sender_wallet['wallet_currency_code'], $amount);
                    $amount_after_rates = isset($cc_result['amount']) ? $cc_result['amount'] : $cc_result;

                    $amount_after_rates += $total_fees;
                }


                if($includes_fees) {
                    $amount_after_fees -= $total_fees;
                } else {
                    $amount_after_rates += $total_fees;
                }

                $recipient_amount = $amount_after_fees;

                if($recipient_wallet['wallet_currency_code'] != $currency_to) {

                    $cc = new CurrencyConverter();
                    $cc_result = $cc->convert($currency_to, $recipient_wallet['wallet_currency_code'], $recipient_amount);
                    $recipient_amount = isset($cc_result['amount']) ? $cc_result['amount'] : $cc_result;
                }

                if($amount_after_rates <= $sender_wallet['wallet_balance']) {
                    $transfer = $this->account_model->transferMoney($sender_wallet_id, $recipient['id'], $amount_after_rates, $recipient_amount, $recipient_wallet['wallet_id']);
                    if ($transfer) {
                        $recipient_description = "Transfer from " . $this->user['first_name'] . ' ' . $this->user['last_name'];
                        $sender_description = "Transfer to " . ($recipient['first_name'] == '' ? $recipient['email_address'] : $recipient['first_name']) . ' ' . $recipient['last_name'];

                        $res = $this->transaction_model->addTransaction($recipient['id'], transaction_model::MONEY_IN, $recipient_wallet['wallet_id'], $recipient_description, $recipient_amount, transaction_model::APPROVED);
                        $res2 = $this->transaction_model->addTransaction($this->user['id'], transaction_model::MONEY_OUT, $sender_wallet_id, $sender_description, $amount_after_rates, transaction_model::APPROVED);

                        if($res && $res2) {
                            $this->load->model('recipient_model');

                            $email_data = array();
                            $email_data['sender'] = $sender;
                            $email_data['recipient'] = $recipient;
                            $email_data['currency'] = $currency_to;
                            $email_data['amount'] =  $recipient_amount;
                            $this->postmark->from('no-reply@xannia.com', 'Xannia');
                            $this->postmark->to($recipient['email_address'], $recipient['first_name'] . ' ' . $recipient['last_name']);
                            $this->postmark->subject('You have received funds');

                            if($none_account_holder) {
                                $this->postmark->message_html($this->load->view('templates/email/automatic_registration', $email_data, true));
                            } else {
                                $this->postmark->message_html($this->load->view('templates/email/received_funds', $email_data, true)); // REPLACE WITH A DIFF TEMPLATE
                            }
                            $this->postmark->send();

                            $recipient_saved = $this->recipient_model->getByRecipientId($recipient['id']);
                            $result['recipient_saved'] = $recipient_saved ? true : false;
                            $result['recipient_id'] = $recipient['id'];
                            $result['success'] = true;
                        }
                    } else {
                        $result['success'] = false;
                        $result['message'] = 'Transfer failed, please try again.';
                    }
                } else {
                    $result['success'] = false;
                    $result['message'] = 'You have insuficient balance.';
                }
            } else {
                $result['success'] = false;
                $result['message'] = 'Recipient not found.';
            }

        } else {
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function getGraphData() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $result['success'] = true;
        $result['total_money_in'] = 0;
        $result['total_money_out'] = 0;
        $result['money_in'] = array();
        $result['money_out'] = array();

        $today = date('m/d/Y');

        for ($i=0; $i < 30; $i++) {
            $d = date_create($today);
            date_sub($d, date_interval_create_from_date_string($i . ' days'));
            array_push($result['money_in'], array(date_format($d, 'm/d/Y'), 0));
            array_push($result['money_out'], array(date_format($d, 'm/d/Y') , 0));
        }
        $this->form_validation->set_rules("wallet_id", "Wallet ID", "required");
        $wallet_id = $this->input->post("wallet_id");

        if ($this->form_validation->run()) {
            $moneyIn = $this->transaction_model->getMoneyInForGraph();
            $moneyOut = $this->transaction_model->getMoneyOutForGraph();
            if ($moneyIn || $moneyOut) {
                for($i = 0; $i < count($result['money_in']); $i++) {
                    $curr_date = $result['money_in'][$i][0];
                    foreach ($moneyIn as $in) {
                        $d = date($in['formated_date']);
                        if($curr_date == $d) {
                            $result['total_money_in'] += $in['amount_after_charges'];
                            $result['money_in'][$i][1] += $in['amount_after_charges'];
                        }
                    }
                }

                for($i = 0; $i < count($result['money_out']); $i++) {
                    $curr_date = $result['money_out'][$i][0];
                    foreach ($moneyOut as $out) {
                        $d = date($out['formated_date']);
                        if($curr_date == $d) {
                            $result['total_money_out'] += $out['amount_after_charges'];
                            $result['money_out'][$i][1] += (float)$out['amount_after_charges'];
                        }
                    }
                }

            }
        } else {
            $result['success'] = false;
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function get_sales() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->form_validation->set_rules("status", "Status", "required");
        $this->form_validation->set_rules("date_range", "Date Range", "required");

        $status = $this->input->post("status");
        $date_range = str_replace(' ', '', $this->input->post("date_range"));

        var_dump($date_range);die();
        $date_from = explode("-",$date_range)[0];
        $date_to = explode("-",$date_range)[1];

        if ($this->form_validation->run()) {
            //var_dump($sale_type, $wallet_id, $status, $date_from, $date_to);die();
            $sales = $this->transaction_model->getUserSales($status, $date_from, $date_to);
            $result['sales'] = $sales;
            $result['success'] = true;
        } else {
            $result['success'] = false;
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function become_merchant() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        if ($this->user_model->become_merchant()) {
            $result['success'] = true;
        } else {
            $result['success'] = false;
        }

        return $this->formatData($result, $errors);
    }

    public function get_rates() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->form_validation->set_rules("from", "From", "required");
        $this->form_validation->set_rules("to", "To", "required");
        $this->form_validation->set_rules("amount", "Amount", "required");

        $from = $this->input->post("from");
        $to = $this->input->post("to");
        $amount = $this->input->post("amount");

        if ($this->form_validation->run()) {
            $cc = new CurrencyConverter();
            $result['exchange_result'] = $cc->convert($from, $to, $amount);
            $result['success'] = true;
        } else {
            $result['success'] = false;
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function add_recipient() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->form_validation->set_rules("recipient_id", "Recipient Id", "required");

        $recipient_id = $this->input->post("recipient_id");

        if ($this->form_validation->run()) {
            $this->load->model('recipient_model');
            $res = $this->recipient_model->addRecipient($recipient_id);
            if($res) {
                $result['success'] = true;
            }
        } else {
            $result['success'] = false;
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function add_allowed_ip() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->form_validation->set_rules("new_ip", "New IP", "required");

        $new_ip = $this->input->post("new_ip");

        if ($this->form_validation->run()) {
            $this->load->model('allowedips_model');
            $res = $this->allowedips_model->addIP($this->user['id'], $new_ip);
            if($res) {
                $result['success'] = true;
            }
        } else {
            $result['success'] = false;
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function refresh_api_keys() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->load->model('apikey_model');
        $res = $this->apikey_model->refreshKeys($this->user['id']);

        if($res) {
            $result = $res;
            $result['success'] = true;
        } else {
            $result['success'] = false;
        }

        return $this->formatData($result, $errors);
    }

    public function delete_ip() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->form_validation->set_rules("id", "ID", "required");

        $id = $this->input->post("id");

        if ($this->form_validation->run()) {
            $this->load->model('allowedips_model');
            $res = $this->allowedips_model->deleteIP($id);
            if($res) {
                $result['success'] = true;
            }
        } else {
            $result['success'] = false;
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function upload_files() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        set_time_limit(0);
        ini_set('max_execution_time', 259200);
        ini_set('max_input_time', 259200);
        ini_set('memory_limit', '300M');
        ini_set('upload_max_filesize', '200M');
        ini_set('post_max_size', '200M');

        $result = array();
        $errors = array();

        $config = array(
            'allowed_types' => 'zip',
            'max_size' => 250000,
            'upload_path' => FCPATH . '/uploads',
            'file_name' => $this->user['xannia_number']
        );

        $this->load->library('upload', $config);
        $this->upload->overwrite = true;

        if (!$this->upload->do_upload('file'))
        {
            $result['message'] = array('error' => $this->upload->display_errors());
            $result['success'] = false;
        } else {
            $res = $this->auth_model->update($this->session->userdata('user_id'), array('is_verified' => 1));
            $result['success'] = true;
        }

        return $this->formatData($result, $errors);
    }

    public function refund_sale(){
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->form_validation->set_rules("id", "Id", "required");

        $id = $this->input->post("id");

        if ($this->form_validation->run()) {
            $this->load->model('transaction_model');
            $sale = $this->transaction_model->getTransactionByID($id);
            $method = $this->paymentmethod_model->getMethodByID($sale['payment_method_id']);
            if($sale && $method) {
                $refunded = false;
                if(strtolower($method['external_processor']) == 'braintree') {
                    $bt_trans = Braintree_Transaction::find($sale['external_transaction_id']);

                    if(strtolower($bt_trans->status) == 'settled' || strtolower($bt_trans->status) == 'settling') {
                        $res = Braintree_Transaction::refund($sale['external_transaction_id']);
                        $refunded = $res->success;
                    } else {
                        $res = Braintree_Transaction::void($sale['external_transaction_id']);
                        $refunded = $res->success;
                    }
                } elseif(strtolower($method['external_processor']) == 'xannia') {
                    $this->load->model('xanniacustomer_model');
                    $res = $this->xanniacustomer_model->doRefund($sale['external_transaction_id']);
                    if($res) {
                        // Send email to user
                        $refunded = true;
                    }
                }

                if($refunded) {
                    $res = $this->user_model->deductFunds((int)$this->session->userdata('user_id'), $sale['amount_after_charges']);
                    if($res) {
                        $this->transaction_model->markAsRefunded($sale['id']);
                        $result['success'] = true;
                    } else {
                        $result['success'] = false;
                    }
                }
            }
        } else {
            $result['success'] = false;
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    public function change_user_environment() {
        if (!$this->xannia_auth->logged_in())
        {
            redirect('login', 'refresh');
        }

        $result = array();
        $errors = array();

        $this->form_validation->set_rules("id", "ID", "required");

        $id = $this->input->post("id");

        if ($this->form_validation->run()) {
            $this->load->model('usersession_model');
            $res = $this->usersession_model->updateUserSessionEnvironment((int)$this->session->userdata('user_id'), $id);
            if($res) {
                $result['success'] = true;
            }
        } else {
            $result['success'] = false;
            $errors = $this->form_validation->getErrorsArray();
        }

        return $this->formatData($result, $errors);
    }

    private function formatData($data, $errors)
    {
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_header( "Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS" );
        $this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
        //$this->output->set_header('Content-Type: application/json');
        $this->output->set_content_type( 'application/json' );
        $this->output->set_output(json_encode(array('data' => $data, 'errors' => $errors), JSON_NUMERIC_CHECK));
        //echo(json_encode(array('data' => $data, 'errors' => $errors), JSON_NUMERIC_CHECK));
    }
}
