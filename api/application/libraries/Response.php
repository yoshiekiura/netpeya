<?php

/**
* 
*/
class Response
{
	
	const UNSUPPORTED_REQUEST_METHOD = array('status' => 'Failed', 'code' => 505, 'message' => 'Unsupported request method');
    const SALE_APPROVED = array('status' => 'Successful', 'code' => 200, 'message' => 'Sale has been approved');
    const SALE_FAILED = array('status' => 'Failed', 'code' => 420);
    const AUTH_FAILED = array('status' => 'Failed', 'code' => 300, 'message' => 'Access denied');
    const MERCHANT_NOT_FOUND = array('status' => 'Failed', 'code' => 301, 'message' => 'Merchant account not found');
    const UNAUTHORIZED_IP = array('status' => 'Failed', 'code' => 303, 'message' => 'Unauthorized IP');

    // VALIDATION RESPONSES
    const SIGNATURE_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'signature field is required.');
	const MERCHANT_ID_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'merchant_id field is required.');
	const PAYMENT_METHOD_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'payment_method field is required.');
    const PAYMENT_METHOD_INVALID = array('status' => 'Failed', 'code' => 505, 'message' => 'Invalid payment_method.');

	const AMOUNT_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'amount field is required.');
	const AMOUNT_FIELD_WRONG_TYPE = array('status' => 'Failed', 'code' => 505, 'message' => 'amount must be a number.');
	const AMOUNT_FIELD_BELOW_MIN = array('status' => 'Failed', 'code' => 505, 'message' => 'amount must be a greater than 0.50');
	const CURRENCY_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'currency field is required.');
	const CURRENCY_FIELD_WRONG_LENGTH = array('status' => 'Failed', 'code' => 505, 'message' => 'currency must be in 3 letter form eg: USD for United States Dollar.');
	const CUREENCY_FIELD_VALUE_UNSUPPORTED = array('status' => 'Failed', 'code' => 505, 'message' => 'Unsupported currency.');

	// CARD FIELDS VALIDATION

    const CARD_NUMBER_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'card_number field is required.');
    const CARD_NUMBER_FIELD_LENGTH = array('status' => 'Failed', 'code' => 505, 'message' => 'Unsupported card.');
    const CARD_NUMBER_BLACKLISTED = array('status' => 'Failed', 'code' => 505, 'message' => 'card_number blacklisted');
    const CARD_HOLDER_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'card_holder field is required.');
    const CARD_EXP_MONTH_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'card_expiry_month field is required.');
    const CARD_EXP_MONTH_FIELD_WRONG_TYPE = array('status' => 'Failed', 'code' => 505, 'message' => 'card_expiry_month wrong value, must be eg: 02 for February.');
    const CARD_EXP_YEAR_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'card_expiry_year field is required.');
    const CARD_EXP_YEAR_FIELD_WRONG_TYPE = array('status' => 'Failed', 'code' => 505, 'message' => 'card_expiry_year wrong value, must be eg: 2018.');
    const CARD_CVV_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'card_cvv field is required.');
    const CARD_CVV_FIELD_WRONG_TYPE = array('status' => 'Failed', 'code' => 505, 'message' => 'card_cvv wrong value.');

    // XANNIA FIELDS VALIDATION

    const XANNIA_EMAIL_FIELD_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'xannia_email field is required.');
    const NO_XANNIA_WALLET_WITH_ENOUGH_FUNDS = array('status' => 'Failed', 'code' => 505, 'message' => 'No Xannia wallet with enough funds found for this user.');
    const FAILED_TO_CHARGE_XANNIA_CUSTOMER = array('status' => 'Failed', 'code' => 505, 'message' => 'Failed to charge this Xannia customer, payment was reverted.');
    const XANNIA_CUSTOMER_NOT_FOUND = array('status' => 'Failed', 'code' => 505, 'message' => 'No Xannia account associated with provided email.');


    const MERCHANT_NO_ENOUGH_FUNDS = array('status' => 'Failed', 'code' => 505, 'message' => 'You have insufficient funds to make this payout.');

    const DESCRIPTOR_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'Descriptor field missing.');
    const DESCRIPTOR_COMPANY_NAME_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'Descriptor company name missing.');
    const DESCRIPTOR_PRODUCT_NAME_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'Descriptor product name missing.');
    const DESCRIPTOR_WEBSITE_MISSING = array('status' => 'Failed', 'code' => 505, 'message' => 'Descriptor website missing.');


    

}