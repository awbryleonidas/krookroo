<?php
/**
* Name:  generateRandomString
*
* Author:	Aubrey Leonidas
*			che.leonidas@gmail.com
*			@awbryleonidas
*
* Created:  08.13.2015
*
* Description:  gets remote content using curl or filegetcontents from a certain endpoint
*
* Requirements: n/a
*
*/
class Getremotecontents{

	function get_sample_contents()
	{
		$endpoint = 'http://sampleAPI.com.ph';

		$output = $this->_get_remote_content('curl', $endpoint);

		//log_message('debug', 'The API output: ' . print_r(json_decode($output), TRUE));

		if ($output)
		{
			return $output;
		}
		else
		{
			return FALSE;
		}
	}

	private function _get_remote_content($method = 'curl', $endpoint)
	{
		if ($method == 'curl')
		{
			// use curl
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $endpoint);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSLVERSION, 3);
			// curl_setopt($ch, CURLOPT_SSLVERSION, 'TLSV1');
			// curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'TLSV1');

			$output = curl_exec($ch);
			curl_close($ch);
		}
		else if ($method == 'filegetcontents')
		{
			$output = file_get_contents($endpoint);
		}


		return $output;
	}
}