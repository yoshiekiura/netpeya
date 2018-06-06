<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Form_validation extends CI_Form_validation
{
    public function getErrorsArray()
    {
        return array($this->_error_array);
    }
    
    public function set_errors($fields)
    {
            if (is_array($fields) and count($fields))
            {
                foreach($fields as $key => $val)
                {
                    $this->_field_data[$key]['error'] = $val;
                    $this->_error_array[$key] = $val;
             }
         }
     }
     
    public function is_array_only_integers($array) 
    {
        if (is_array($array)) 
        {
            $result = array_filter($array, 'is_numeric') === $array;
            if (!$result) $this->set_message('is_array_only_integers', 'The %s should contains only integer values.');
            
            return $result;
        } 
        else 
        {
            $this->set_message('is_array_only_integers', 'The %s should be an array.');
            return FALSE;
        }
    }
}