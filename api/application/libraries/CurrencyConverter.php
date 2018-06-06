<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Alessandro Minoccheri
V 1.1.2
09-04-2014
https://github.com/AlessandroMinoccheri
*/
class CurrencyConverter {

    private $dbTable;
    private $CI;
    private $rate;
    private $fromCurrency;
    private $toCurrency;
    private $amount;
    private $hourDifference;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config->load('currency_converter', TRUE);
        $this->dbTable = $this->CI->config->item('currency_converter_db_table', 'currency_converter');
        $this->rate = 0;
    }
    public function convert($fromCurrency, $toCurrency, $amount, $saveIntoDb = true, $hourDifference = 1) {
        $this->fromCurrency = $fromCurrency;
        $this->toCurrency = $toCurrency;
        $this->amount = $amount;
        $this->hourDifference = $hourDifference;
        if($this->fromCurrency != $this->toCurrency){
            if ($this->fromCurrency == "PDS") {
                $this->fromCurrency = "GBP";
            }

            if ($saveIntoDb == true) {
                return $this->saveIntoDatabase();
            }
            $this->rate = $this->getRates();
            $value = (double)$this->rate * (double)$amount;
            return (double)$value;
        }
        return (double)$this->amount;
    }
    private function saveIntoDatabase()
    {
        $this->checkIfExistTable();
        $this->CI->db->select('*');
        $this->CI->db->from($this->dbTable);
        $this->CI->db->where('from', $this->fromCurrency);
        $this->CI->db->where('to', $this->toCurrency);
        $query = $this->CI->db->get();
        foreach ($query->result() as $row) {
            $lastUpdated = $row->modified;
            $now = date('Y-m-d H:i:s');
            $dStart = new DateTime($now);
            $dEnd = new DateTime($lastUpdated);
            $diff = $dStart->diff($dEnd);
            if ($this->needToUpdateDatabase($diff, $row)) {
                $this->updateDatabase($row);
            } else{
                $this->rate = $row->rates;
            }
        }
        if (count($query->result()) <= 0) {
            $this->rate = $this->getRates();
            $data = array(
                'from'  => $this->fromCurrency,
                'to' => $this->toCurrency,
                'rates' => $this->rate,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            );
            $this->CI->db->insert($this->dbTable,$data);
        }
        $value = (double)$this->rate * (double)$this->amount;
        return (double)$value;
    }
    private function updateDatabase($row)
    {
        $this->rate = $this->getRates();
        $data = array(
            'from'  => $this->fromCurrency,
            'to' => $this->toCurrency,
            'rates' => $this->rate,
            'modified' => date('Y-m-d H:i:s'),
        );
        $this->CI->db->where('id', $row->id);
        $this->CI->db->update($this->dbTable, $data);
    }
    private function needToUpdateDatabase($diff, $row)
    {
        if (
            ((int)$diff->y >= 1) ||
            ((int)$diff->m >= 1) ||
            ((int)$diff->d >= 1) ||
            ((int)$diff->h >= $this->hourDifference) ||
            ((double)$row->rates == 0)
        ) {
            return true;
        }
        return false;
    }
    private function getRates()
    {
        $url = 'http://api.fixer.io/latest?base=' . $this->fromCurrency . '&symbols=' . $this->toCurrency;
        $handle = @fopen($url, 'r');
        if ($handle) {
            $result = fgets($handle, 4096);
            fclose($handle);
        }
        if (isset($result)) {
            $conversion = json_decode($result, true);
            if (isset($conversion['rates'][$this->toCurrency])) {
                return $conversion['rates'][$this->toCurrency];
            }
        }
        return $this->rate = 0;
    }
    private function checkIfExistTable()
    {
        if ($this->CI->db->table_exists($this->dbTable)) {
            return(true);
        } else {
            $this->CI->load->dbforge();
            $this->CI->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'from' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '5',
                    'null' => FALSE
                ),
                'to' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '5',
                    'null' => FALSE
                ),
                'rates' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '10',
                    'null' => FALSE
                ),
                'created' => array(
                    'type' => 'DATETIME'
                ),
                'modified' => array(
                    'type' => 'DATETIME'
                )
            ));
            $this->CI->dbforge->add_key('id', TRUE);
            $this->CI->dbforge->create_table($this->dbTable, TRUE);
        }
    }
    public function getCurrencyTable()
    {
        return $this->dbTable;
    }
}