<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - English
*
* Author: Ben Edmunds
*         ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/xannia_auth/
*
* Created:  03.14.2010
*
* Description:  English language file for Ion Auth messages and errors
*
*/
// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_page_title']         = 'Login';
$lang['login_subheading']      = 'Login to start transacting';
$lang['login_email_label']  = 'Registered email';
$lang['login_email_placeholder']  = 'Email address';
$lang['login_password_label']  = 'Enter account password';
$lang['login_create_account']	= 'Create an account, it\'s free!';
$lang['login_next_btn']      = 'Next';
$lang['login_login_btn']      = 'Login';
$lang['login_forgot_password'] = 'Forgot your password?';

// Index
$lang['index_heading']           = 'Users';
$lang['index_subheading']        = 'Below is a list of the users.';
$lang['index_fname_th']          = 'First Name';
$lang['index_lname_th']          = 'Last Name';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Groups';
$lang['index_status_th']         = 'Status';
$lang['index_action_th']         = 'Action';
$lang['index_active_link']       = 'Active';
$lang['index_inactive_link']     = 'Inactive';
$lang['index_registration_link']  = 'Create a new user';
$lang['index_create_group_link'] = 'Create a new group';

// Deactivate User
$lang['deactivate_heading']                  = 'Deactivate User';
$lang['deactivate_subheading']               = 'Are you sure you want to deactivate the user \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Yes:';
$lang['deactivate_confirm_n_label']          = 'No:';
$lang['deactivate_submit_btn']               = 'Submit';
$lang['deactivate_validation_confirm_label'] = 'confirmation';
$lang['deactivate_validation_user_id_label'] = 'user ID';

// Registration
$lang['registration_heading']                           = 'Register';
$lang['registration_subheading']                        = 'Please enter the user\'s information below.';
$lang['registration_fname_label']                       = 'First Name:';
$lang['registration_lname_label']                       = 'Last Name:';
$lang['registration_company_label']                     = 'Company Name:';
$lang['registration_identity_label']                    = 'Identity:';
$lang['registration_email_label']                       = 'Email:';
$lang['registration_phone_label']                       = 'Phone:';
$lang['registration_password_label']                    = 'Password:';
$lang['registration_password_confirm_label']            = 'Confirm Password:';
$lang['registration_submit_btn']                        = 'Create User';
$lang['registration_validation_fname_label']            = 'First Name';
$lang['registration_validation_lname_label']            = 'Last Name';
$lang['registration_validation_identity_label']         = 'Identity';
$lang['registration_validation_email_label']            = 'Email Address';
$lang['registration_validation_phone_label']            = 'Phone';
$lang['registration_validation_company_label']          = 'Company Name';
$lang['registration_validation_password_label']         = 'Password';
$lang['registration_validation_password_confirm_label'] = 'Password Confirmation';

// Edit User
$lang['edit_user_heading']                           = 'Edit User';
$lang['edit_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['edit_user_fname_label']                       = 'First Name:';
$lang['edit_user_lname_label']                       = 'Last Name:';
$lang['edit_user_company_label']                     = 'Company Name:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Phone:';
$lang['edit_user_password_label']                    = 'Password: (if changing password)';
$lang['edit_user_password_confirm_label']            = 'Confirm Password: (if changing password)';
$lang['edit_user_groups_heading']                    = 'Member of groups';
$lang['edit_user_submit_btn']                        = 'Save User';
$lang['edit_user_validation_fname_label']            = 'First Name';
$lang['edit_user_validation_lname_label']            = 'Last Name';
$lang['edit_user_validation_email_label']            = 'Email Address';
$lang['edit_user_validation_phone_label']            = 'Phone';
$lang['edit_user_validation_company_label']          = 'Company Name';
$lang['edit_user_validation_groups_label']           = 'Groups';
$lang['edit_user_validation_password_label']         = 'Password';
$lang['edit_user_validation_password_confirm_label'] = 'Password Confirmation';

// Create Group
$lang['create_group_title']                  = 'Create Group';
$lang['create_group_heading']                = 'Create Group';
$lang['create_group_subheading']             = 'Please enter the group information below.';
$lang['create_group_name_label']             = 'Group Name:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Create Group';
$lang['create_group_validation_name_label']  = 'Group Name';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Edit Group';
$lang['edit_group_saved']                  = 'Group Saved';
$lang['edit_group_heading']                = 'Edit Group';
$lang['edit_group_subheading']             = 'Please enter the group information below.';
$lang['edit_group_name_label']             = 'Group Name:';
$lang['edit_group_desc_label']             = 'Description:';
$lang['edit_group_submit_btn']             = 'Save Group';
$lang['edit_group_validation_name_label']  = 'Group Name';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = 'Change Password';
$lang['change_password_old_password_label']                    = 'Old Password:';
$lang['change_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['change_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['change_password_submit_btn']                            = 'Change';
$lang['change_password_validation_old_password_label']         = 'Old Password';
$lang['change_password_validation_new_password_label']         = 'New Password';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Forgot Password
$lang['forgot_password_heading']                 = 'Forgot Password';
$lang['forgot_password_subheading']              = 'Please enter your %s so we can send you an email to reset your password.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Submit';
$lang['forgot_password_validation_email_label']  = 'Email Address';
$lang['forgot_password_identity_label'] = 'Identity';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'No record of that email address.';
$lang['forgot_password_identity_not_found']         = 'No record of that username.';

// Reset Password
$lang['reset_password_heading']                               = 'Change Password';
$lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Change';
$lang['reset_password_validation_new_password_label']         = 'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Account Creation
$lang['account_creation_successful']            = 'Account Successfully Created';
$lang['account_creation_unsuccessful']          = 'Unable to Create Account';
$lang['account_creation_duplicate_email']       = 'Email Already Used or Invalid';
$lang['account_creation_duplicate_identity']    = 'Identity Already Used or Invalid';
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful']          = 'Password Successfully Changed';
$lang['password_change_unsuccessful']        = 'Unable to Change Password';
$lang['forgot_password_successful']          = 'Password Reset Email Sent';
$lang['forgot_password_unsuccessful']        = 'Unable to email the Reset Password link';

// Activation
$lang['activate_successful']                 = 'Account Activated';
$lang['activate_unsuccessful']               = 'Unable to Activate Account';
$lang['deactivate_successful']               = 'Account De-Activated';
$lang['deactivate_unsuccessful']             = 'Unable to De-Activate Account';
$lang['activation_email_successful']         = 'Activation Email Sent. Please check your inbox or spam';
$lang['activation_email_unsuccessful']       = 'Unable to Send Activation Email';
$lang['deactivate_current_user_unsuccessful']= 'You cannot De-Activate your self.';

// Login / Logout
$lang['login_successful']                    = 'Logged In Successfully';
$lang['login_unsuccessful']                  = 'Incorrect Login';
$lang['login_unsuccessful_not_active']       = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful']                   = 'Logged Out Successfully';

// Account Changes
$lang['update_successful']                   = 'Account Information Successfully Updated';
$lang['update_unsuccessful']                 = 'Unable to Update Account Information';
$lang['delete_successful']                   = 'User Deleted';
$lang['delete_unsuccessful']                 = 'Unable to Delete User';

// Groups
$lang['group_creation_successful']           = 'Group created Successfully';
$lang['group_already_exists']                = 'Group name already taken';
$lang['group_update_successful']             = 'Group details updated';
$lang['group_delete_successful']             = 'Group deleted';
$lang['group_delete_unsuccessful']           = 'Unable to delete group';
$lang['group_delete_notallowed']             = 'Can\'t delete the administrators\' group';
$lang['group_name_required']                 = 'Group name is a required field';
$lang['group_name_admin_not_alter']          = 'Admin group name can not be changed';

// Activation Email
$lang['email_activation_subject']            = 'Account Activation';
$lang['email_activate_heading']              = 'Activate account for %s';
$lang['email_activate_subheading']           = 'Please click this link to %s.';
$lang['email_activate_link']                 = 'Activate Your Account';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_forgot_password_heading']       = 'Reset Password for %s';
$lang['email_forgot_password_subheading']    = 'Please click this link to %s.';
$lang['email_forgot_password_link']          = 'Reset Your Password';

// New Password Email
$lang['email_new_password_subject']          = 'New Password';
$lang['email_new_password_heading']          = 'New Password for %s';
$lang['email_new_password_subheading']       = 'Your password has been reset to: %s';

$lang['balance'] = 'Balance';
$lang['currency'] = 'Currency';
$lang['wallet_id'] = 'Wallet ID';
$lang['delete'] = 'Delete';
$lang['edit'] = 'Edit';
$lang['default'] = 'Default';
$lang['make_default'] = 'Make default';
$lang['remove_default'] = 'Remove default';
$lang['account_status'] = 'Account status';
$lang['account'] = 'Account';
$lang['add_a_wallet'] = 'Add a wallet';
$lang['deposit'] = 'Deposit';
$lang['withdraw'] = 'Withdraw';
$lang['dashboard'] = 'Dashboard';
$lang['transfer'] = 'Transfer';
