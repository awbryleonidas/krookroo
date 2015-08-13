<?php
/**
* Name:  auto_login
*
* Author: Rossette Romilla
*		  rlromilla_05@yahoo.com
*
* Created:  08.13.2015
*
* Description:  random character from any given string.
*
* Requirements: ion_auth_model
*
*/
class Auto_login{
	function test_function($user_id, $hash){
		$this->users_model->auto_login($user_id, $hash);

		redirect('http://myurlname.com', 'refresh'); //modify this
	}

	public function auto_login($user_id, $hash)
	{
		$query = $this->db->where('user_id', $user_id)->limit(1)->get('users');

		if ($query->num_rows() === 1)
		{
			$user = $query->row();

			$hash_check = sha1($user->user_id . $user->user_firstname . $user->user_lastname);

			//checking generated hash instead of password; if matched, login user
			if ($hash == $hash_check)
			{
				//copied from ion_auth method of logging in
				$this->load->model('ion_auth_model');

				$this->ion_auth_model->set_session($user);

				$this->ion_auth_model->update_last_login($user->user_id);

				$this->ion_auth_model->clear_login_attempts($user->user_username);

				$this->ion_auth_model->remember_user($user->user_id);

				return TRUE;
			}

		}
		else
		{
			return FALSE;
		}
	}
}