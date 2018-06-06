<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Transaction_model extends MY_Model {

        const SALE = 1;
        const PAYOUT = 2;
        const PENDING = 1;
        const APPROVED = 2;
        const DECLINED = 3;
        const REFUNDED = 4;

        public function __construct() {
            parent::__construct();

            $this->user_id = $this->session->userdata('user_id');

            if($this->session->all_userdata()) {
                $this->load->model('usersession_model');

                $session = $this->usersession_model->getUserSession($this->session->userdata('user_id'));

                if(isset($session)) {
                    if(array_key_exists('environment_id', $session)) {
                        if($session['environment_id'] == MY_Controller::SANDBOX) {
                            $this->xannia_db = $this->load->database('merchant_sandbox', true);
                        }
                    }
                }
            }
        }

        public function getUserSales($filters = null, $limit = 0, $start = 0) {
            $limit = $limit == 0 ? 30 : $limit;

            $filter_str = $filters ? $this->createExtraSQL($filters) : '';

            $sql = "SELECT t.*, t.id as sale_id, t.ts_created as sale_date,pm.can_refund as method_can_refund, pm.external_fee, pm.internal_fee, ts.name as sale_status,pm.name as payment_method_name, pm.slag as payment_method_slag
                 FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                 INNER JOIN payment_methods pm on pm.id = t.payment_method_id WHERE t.transaction_type_id = 1 AND t.user_id = {$this->user_id} " . $filter_str . " ORDER BY t.ts_created DESC LIMIT {$limit} OFFSET " . $start;

            $query = $this->xannia_db->query($sql);
            $sales = $query->result_array();

            return $sales;
        }

        public function getUserTransactions($filters = null, $limit = 0, $start = 0) {
            $limit = $limit == 0 ? 30 : $limit;

            $filter_str = $filters ? $this->createExtraSQL($filters) : '';

            $sql = "SELECT t.*, t.id as sale_id, t.ts_created as sale_date,pm.can_refund as method_can_refund, pm.external_fee, pm.internal_fee, ts.name as sale_status,pm.name as payment_method_name, pm.slag as payment_method_slag
                 FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                 INNER JOIN payment_methods pm on pm.id = t.payment_method_id WHERE t.user_id = {$this->user_id} " . $filter_str . " ORDER BY t.ts_created ASC LIMIT {$limit} OFFSET " . $start;

            $query = $this->xannia_db->query($sql);
            $transactions = $query->result_array();

            return $transactions;
        }

        public function getTotalTransactionsRowsCount($filters) {
            $filter_str = $filters ? $this->createExtraSQL($filters) : '';

            $sql = "SELECT t.*
                 FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                 INNER JOIN payment_methods pm on pm.id = t.payment_method_id WHERE t.user_id = {$this->user_id} " . $filter_str . " ORDER BY t.ts_created DESC";

            $query = $this->xannia_db->query($sql);

            return $query->num_rows();
        }

        public function getUserTransactionsMethodSummary($filters = null, $limit = 30, $start = 0) {
            $filter_str = $filters ? $this->createExtraSQL($filters) : '';

            $sql = "SELECT pm.name as method, pm.slag as method_slag, SUM(t.amount_before_charges) as gross_income, SUM(t.total_charges) as total_charges, SUM(t.amount_after_charges) as net_income, IFNULL(method_count.sales_count, 0) sales_count
                 FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                 INNER JOIN payment_methods pm on pm.id = t.payment_method_id
                 LEFT JOIN (
                    SELECT COUNT(*) as sales_count, pm.id
                    FROM transactions t INNER JOIN payment_methods pm on pm.id = t.payment_method_id WHERE t.user_id = {$this->user_id} AND t.transaction_status_id = 2 " . $filter_str  ." GROUP BY pm.name
                 ) method_count ON method_count.id = pm.id
                  WHERE t.transaction_type_id = 1 AND t.transaction_status_id = 2 AND t.user_id = {$this->user_id} " . $filter_str . "  GROUP BY pm.name ORDER BY sales_count DESC LIMIT {$limit} OFFSET " . $start;

            $query = $this->xannia_db->query($sql);
            $sales = $query->result_array();

            return $sales;
        }

        public function getBalanceSummary($filters = null, $limit = 30, $start = 0) {
            $filter_str = $filters ? $this->createExtraSQL($filters) : '';

            $sql = "SELECT t.ts_created as entry_date, SUM(t.amount_before_charges) as gross_income, SUM(t.total_charges) as total_charges, SUM(t.amount_after_charges) as net_income, payouts.Total_debit as payouts
                 FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                 INNER JOIN payment_methods pm on pm.id = t.payment_method_id
                 LEFT JOIN (
                   SELECT IFNULL(SUM(t.amount_after_charges), 0) as Total_debit, t.user_id
                     FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                     INNER JOIN payment_methods pm on pm.id = t.payment_method_id WHERE t.transaction_type_id = 2 AND t.transaction_status_id = 2 OR t.transaction_status_id = 4 AND t.user_id = {$this->user_id} " . $filter_str . "  GROUP BY DAY(t.ts_created) ORDER BY t.ts_created ASC LIMIT {$limit} OFFSET " . $start . "
                 ) payouts ON payouts.user_id = {$this->user_id}
                  WHERE t.transaction_type_id = 1 AND t.transaction_status_id = 2 OR t.transaction_status_id = 4 AND t.user_id = {$this->user_id} " . $filter_str . "  GROUP BY DAY(t.ts_created) ORDER BY t.ts_created ASC LIMIT {$limit} OFFSET " . $start;

            $query = $this->xannia_db->query($sql);
            $sales = $query->result_array();

            return $sales;
        }

        public function getBalanceSummaryTotalRowsCount($filters) {
            $filter_str = $filters ? $this->createExtraSQL($filters) : '';

            $sql = "SELECT t.ts_created as entry_date, SUM(t.amount_before_charges) as gross_income, SUM(t.total_charges) as total_charges, SUM(t.amount_after_charges) as net_income, payouts.Total_debit as payouts
                 FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                 INNER JOIN payment_methods pm on pm.id = t.payment_method_id
                 LEFT JOIN (
                   SELECT IFNULL(SUM(t.amount_after_charges), 0) as Total_debit, t.user_id
                     FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                     INNER JOIN payment_methods pm on pm.id = t.payment_method_id WHERE t.transaction_type_id = 2 AND t.transaction_status_id = 2 AND t.user_id = {$this->user_id} " . $filter_str . "  GROUP BY DAY(t.ts_created) ORDER BY t.ts_created DESC
                 ) payouts ON payouts.user_id = {$this->user_id}
                  WHERE t.transaction_type_id = 1 AND t.transaction_status_id = 2 AND t.user_id = {$this->user_id} " . $filter_str . "  GROUP BY DAY(t.ts_created) ORDER BY t.ts_created DESC";

            $query = $this->xannia_db->query($sql);

            return $query->num_rows();
        }

        public function getUserPayouts($filters = null, $limit = 0, $start) {
            $limit = $limit == 0 ? 100 : $limit;

            $filter_str = $filters ? $this->createExtraSQL($filters) : '';

            $sql = "SELECT t.*, t.id as payout_id, t.ts_created as payout_date,pm.can_refund as method_can_refund, pm.external_fee, pm.internal_fee, ts.name as payout_status,pm.name as payment_method_name, pm.slag as payment_method_slag
                 FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                 INNER JOIN payment_methods pm on pm.id = t.payment_method_id WHERE t.transaction_type_id = 2 AND t.user_id = {$this->user_id} " . $filter_str . " ORDER BY t.ts_created DESC LIMIT {$limit} OFFSET " . $start;

            $query = $this->xannia_db->query($sql);
            $payouts = $query->result_array();

            return $payouts;
        }

        public function getTransactionById($id) {
            $sql = "SELECT * FROM transactions WHERE id = ?";
            $query = $this->xannia_db->query($sql, array((int)$id));

            return $query->row_array();
        }

        public function markAsRefunded($id) {
            $sql = "UPDATE transactions SET is_refunded = 1, closing_balance = closing_balance - amount_after_charges, transaction_status_id = " . self::REFUNDED . " WHERE id = {$id}";
            $query = $this->xannia_db->query($sql);
            if ($query > 0) {
                return true;
            }

            return false;
        }

        public function getTotalSalesRowsCount($filters) {
            $filter_str = $filters ? $this->createExtraSQL($filters) : '';

            $sql = "SELECT t.*
                 FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                 INNER JOIN payment_methods pm on pm.id = t.payment_method_id WHERE t.transaction_type_id = 1 AND t.user_id = {$this->user_id} " . $filter_str . " ORDER BY t.id DESC";

            $query = $this->xannia_db->query($sql);

            return $query->num_rows();
        }

        public function getTotalPayoutsRowsCount($filters) {
            $filter_str = $filters ? $this->createExtraSQL($filters) : '';

            $sql = "SELECT t.*
                 FROM transactions t INNER JOIN transaction_statuses ts on ts.status_code = t.transaction_status_id
                 INNER JOIN payment_methods pm on pm.id = t.payment_method_id WHERE t.transaction_type_id = 2 AND t.user_id = {$this->user_id} " . $filter_str . " ORDER BY t.id DESC";

            $query = $this->xannia_db->query($sql);

            return $query->num_rows();
        }

        private function createExtraSQL($filters) {
            $filter_str = '';


            if($filters) {
                $search_date_range_from = $filters['search_date_range_from'];
                $search_date_range_to = $filters['search_date_range_to'];
                if($search_date_range_from && $search_date_range_to) {
                    $filter_str .= "AND DATE(t.ts_created) BETWEEN STR_TO_DATE('{$search_date_range_from}', '%Y/%m/%d') AND STR_TO_DATE('{$search_date_range_to}', '%Y/%m/%d') ";
                }

                if(array_key_exists('search_status', $filters)) {
                    $search_status = $filters['search_status'];
                    $filter_str .= "AND t.transaction_status_id IN (";
                    foreach($search_status as $status) {
                        $key = array_search($status, $search_status);
                        if($key == count($search_status) - 1) {
                            $filter_str .= $status . ') ';
                        } else {
                            $filter_str .= $status . ', ';
                        }
                    }
                }

                if(array_key_exists('search_payment_method', $filters)) {
                    $search_payment_method = $filters['search_payment_method'];
                    $filter_str .= "AND t.payment_method_id IN (";
                    foreach($search_payment_method as $method) {
                        $key = array_search($method, $search_payment_method);
                        if($key == count($search_payment_method) - 1) {
                            $filter_str .= $method . ') ';
                        } else {
                            $filter_str .= $method . ', ';
                        }
                    }
                }

                if(array_key_exists('search_order_ref', $filters)) {
                    if($filters['search_order_ref']) {
                        $search_order_ref = $filters['search_order_ref'];
                        $filter_str .= "AND t.order_reference = '{$search_order_ref}' ";
                    }
                }

                if(array_key_exists('search_amount_from', $filters) && array_key_exists('search_amount_to', $filters)) {
                    if($filters['search_amount_from'] && $filters['search_amount_to']) {
                        $search_amount_from = $filters['search_amount_from'];
                        $search_amount_to = $filters['search_amount_to'];

                        $filter_str .= "AND t.amount_after_charges >= {$search_amount_from} AND t.amount_after_charges <= {$search_amount_to} ";
                    }
                } elseif(array_key_exists('search_amount_from', $filters) && !array_key_exists('search_amount_to', $filters)) {
                    if($filters['search_amount_from'] && !$filters['search_amount_to']) {
                        $search_amount_from = $filters['search_amount_from'];
                        $search_amount_to = $filters['search_amount_to'];

                        $filter_str .= "AND t.amount_after_charges >= {$search_amount_from} ";
                    }
                } elseif(!array_key_exists('search_amount_from', $filters) && array_key_exists('search_amount_to', $filters)) {
                    if(!$filters['search_amount_from'] && $filters['search_amount_to']) {
                        $search_amount_from = $filters['search_amount_from'];
                        $search_amount_to = $filters['search_amount_to'];

                        $filter_str .= "AND t.amount_after_charges <= {$search_amount_to} ";
                    }
                }
            }

            return $filter_str;
        }

        public function getMoneyInForGraph() {
            $sql = "
                    SELECT t.*, t.amount_after_charges as amount, DATE_FORMAT(t.ts_created, '%m/%d/%Y') as formated_date
                    FROM transactions t
                    WHERE t.user_id = ?
                    AND t.transaction_status_id = 2
                    AND t.transaction_type_id = 1
                    AND t.ts_created BETWEEN NOW() - INTERVAL 30 DAY AND NOW()
                    ORDER BY t.id DESC";
            $query = $this->xannia_db->query($sql, array((int)$this->user_id));
            $transactions = $query->result_array();

            return $transactions;
        }

        public function getLastMonthMoneyIn() {
            $sql = "
                SELECT t.*, t.amount_after_charges as amount, DATE_FORMAT(t.ts_created, '%m/%d/%Y') as formated_date
                FROM transactions t
                WHERE t.user_id = ?
                AND t.transaction_status_id = 2
                    AND t.transaction_type_id = 1
                AND t.ts_created BETWEEN DATE_SUB(DATE_SUB(CURDATE(), INTERVAL (DAY(CURDATE())-1) DAY), INTERVAL 1 MONTH) AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
                ORDER BY t.id DESC";
            $query = $this->xannia_db->query($sql, array((int)$this->user_id));
            $transactions = $query->result_array();

            return $transactions;
        }

        public function getLastMonthMoneyOut() {
            $sql = "
                SELECT t.*, t.amount_after_charges as amount, DATE_FORMAT(t.ts_created, '%m/%d/%Y') as formated_date
                FROM transactions t
                WHERE t.user_id = ?
                AND t.transaction_status_id = 2
                AND t.transaction_type_id = 2
                AND t.ts_created BETWEEN DATE_SUB(DATE_SUB(CURDATE(), INTERVAL (DAY(CURDATE())-1) DAY), INTERVAL 1 MONTH) AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
                ORDER BY t.id DESC";
            $query = $this->xannia_db->query($sql, array((int)$this->user_id));
            $transactions = $query->result_array();

            return $transactions;
        }

        public function getThisMonthMoneyIn() {
            $sql = "
                SELECT t.*, t.amount_after_charges as amount, DATE_FORMAT(t.ts_created, '%m/%d/%Y') as formated_date
                FROM transactions t
                WHERE t.user_id = ?
                AND t.transaction_status_id = 2
                AND t.transaction_type_id = 1
                AND MONTH(t.ts_created) = MONTH(NOW())
                ORDER BY t.id DESC";
            $query = $this->xannia_db->query($sql, array((int)$this->user_id));
            $transactions = $query->result_array();

            return $transactions;
        }

        public function getThisMonthMoneyOut() {
            $sql = "
                SELECT t.*, t.amount_after_charges as amount, DATE_FORMAT(t.ts_created, '%m/%d/%Y') as formated_date
                FROM transactions t
                WHERE t.user_id = ?
                AND t.transaction_status_id = 2
                AND t.transaction_type_id = 2
                AND MONTH(t.ts_created) = MONTH(NOW())
                ORDER BY t.id DESC";
            $query = $this->xannia_db->query($sql, array((int)$this->user_id));
            $transactions = $query->result_array();

            return $transactions;
        }

        public function getMoneyOutForGraph() {
            $sql = "
                    SELECT t.*, t.amount_after_charges as amount, DATE_FORMAT(t.ts_created, '%m/%d/%Y') as formated_date
                    FROM transactions t
                    WHERE t.user_id = ?
                    AND t.transaction_status_id = 2
                    AND t.transaction_type_id = 2
                    AND t.ts_created BETWEEN NOW() - INTERVAL 30 DAY AND NOW()
                    ORDER BY t.id DESC";
            $query = $this->xannia_db->query($sql, array((int)$this->user_id));
            $transactions = $query->result_array();

            return $transactions;
        }

        public function getMostUsedMethods($start_date = null, $end_date = null) {
            $extra = "MONTH(t.ts_created) = MONTH(NOW())";
            if($start_date && $end_date) {
                $extra = "DATE(t.ts_created) BETWEEN STR_TO_DATE('{$start_date}', '%Y/%m/%d') AND STR_TO_DATE('{$end_date}', '%Y/%m/%d')";
            }

            $sql = "SELECT pm.id, pm.name, pm.slag, count(pm.name) total_sales
                    FROM transactions t JOIN payment_methods pm ON pm.id = t.payment_method_id
                    WHERE t.user_id = ? AND t.transaction_type_id = 1 AND " . $extra . " GROUP BY pm.name ORDER BY total_sales DESC, pm.name ASC LIMIT 3";

            $query = $this->xannia_db->query($sql, array((int)$this->user_id));
            $methods = $query->result_array();

            $counter = 0;
            foreach($methods as $method) {
                $sql = "SELECT count(pm.name) total_sales
                    FROM transactions t JOIN payment_methods pm ON pm.id = t.payment_method_id
                    WHERE t.user_id = ? AND t.transaction_type_id = 1 AND t.payment_method_id = ? AND  t.ts_created BETWEEN DATE_SUB(DATE_SUB(CURDATE(), INTERVAL (DAY(CURDATE())-1) DAY), INTERVAL 1 MONTH) AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) GROUP BY pm.name ORDER BY total_sales DESC LIMIT 1";

                $query = $this->xannia_db->query($sql, array((int)$this->user_id, (int)$method['id']));
                $last_month_sales = $query->row_array();
                $last_month_sales = $last_month_sales['total_sales'] != null ? $last_month_sales['total_sales'] : 0;
                $methods[$counter]['last_month_sales'] = $last_month_sales;

                $percent = Tools::calculatePercent((int)$method['total_sales'], (int)$last_month_sales);
                $methods[$counter]['sales_perc'] = $percent;

                $counter++;
            }

            return $methods;
        }
    }
 ?>