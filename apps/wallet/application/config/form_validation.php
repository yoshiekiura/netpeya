<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
        'login' => array(
            array(
                    'field' => 'email',
                    'label' => 'lang:email',
                    'rules' => 'required|valid_email',
                    'errors' => array(
		                'required' => 'The <strong>%s</strong> field is required.'
			        )
            ),
            array(
                    'field' => 'password',
                    'label' => 'lang:password',
                    'rules' => 'required',
                    'errors' => array(
		                'required' => 'The <strong>%s</strong> field is required.'
			        )
            )
        ),
        'register' => array(
            array(
                    'field' => 'first_name',
                    'label' => 'lang:first_name',
                    'rules' => 'required',
                    'errors' => array(
		                'required' => 'The <strong>%s</strong> field is required.'
			        )
            ),
            array(
                    'field' => 'last_name',
                    'label' => 'lang:last_name',
                    'rules' => 'required',
                    'errors' => array(
		                'required' => 'The <strong>%s</strong> field is required.'
			        )
            ),
            array(
                    'field' => 'email',
                    'label' => 'email',
                    'rules' => 'required|valid_email',
                    'errors' => array(
		                'required' => 'The <strong>%s</strong> field is required.',
		                'valid_email' => 'Please enter a valid email'
			        )
            ),
            array(
                    'field' => 'password',
                    'label' => 'lang:password',
                    'rules' => 'required|regex_match[/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/]',
                    'errors' => array(
		                'required' => 'The <strong>%s</strong> field is required.',
		                'regex_match' => 'The <strong>%s</strong> must be strong: <ul style="margin-left:10px"><li>At least 6 characters long</li><li>Include at least 1 uppercase letter</li><li>Include at least 1 lowercase letter</li><li>At least 1 digit</li></ul>'
			        )
            ),
            array(
                    'field' => 'terms',
                    'label' => 'lang:terms',
                    'rules' => 'required',
                    'errors' => array(
		                'required' => 'You need to <strong>agree to terms &amp; conditions</strong>'
			        )
            ),
            array(
                    'field' => 'country_id',
                    'label' => 'lang:country',
                    'rules' => 'required|integer',
                    'errors' => array(
                        'required' => 'The <strong>%s</strong> field is required.',
                        'integer' => 'Please select your country.'
                    )
            ),
            array(
                    'field' => 'currency_id',
                    'label' => 'lang:currency',
                    'rules' => 'required|integer',
                    'errors' => array(
                        'required' => 'The <strong>%s</strong> field is required.',
                        'integer' => 'Please select your default currency.'
                    )
            )
    ),
        'forgot_password' => array(
            array(
                'field' => 'email',
                'label' => 'lang:Email',
                'rules' => 'required|valid_email',
                'errors' => array(
	                'required' => 'The <strong>%s</strong> field is required.',
		            'valid_email' => 'Please enter a valid email'
		        )
        )
    ),
        'reset_password' => array(
            array(
                'field' => 'code',
                'label' => 'lang:Code',
                'rules' => 'required|integer',
                'errors' => array(
                    'required' => 'The <strong>%s</strong> field is required.',
                    'integer' => 'Please enter a valid %s'
                )
            ),
            array(
                'field' => 'password',
                'label' => 'lang:password',
                'rules' => 'required|regex_match[/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/]',
                'errors' => array(
                    'required' => 'The <strong>%s</strong> field is required.',
                    'regex_match' => 'The <strong>%s</strong> must be strong: <ul style="margin-left:10px"><li>At least 6 characters long</li><li>Include at least 1 uppercase letter</li><li>Include at least 1 lowercase letter</li><li>At least 1 digit</li></ul>'
                )
            ),
            array(
                'field' => 'repeat_password',
                'label' => 'lang:Repeat Password',
                'rules' => 'required|matches[password]',
                'errors' => array(
                    'required' => 'The <strong>%s</strong> field is required.',
                    'matches' => 'Passwords do not match.'
                )
            )
    )
);