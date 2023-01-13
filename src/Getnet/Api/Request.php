<?php
	
	namespace Source\Api;
	
	use Exception;
	use Source\Api\Getnet;
	use Source\Api\Exception\GetnetException;
	
	class Request
	{
		private $baseUrl = '';
		const CURL_TYPE_AUTH = "AUTH";
		const CURL_TYPE_POST = "POST";
		const CURL_TYPE_PUT = "PUT";
		const CURL_TYPE_GET = "GET";
		const CURL_TYPE_DELETE = "DELETE";
		
		/**
		 *
		 * Request constructor.
		 *
		 * @param Getnet $credentials
		 */
		public function __construct(Getnet $credentials)
		{
			$this->baseUrl = $credentials->getEnvironment()->getUrlApi();
			
			if (! $credentials->getAuthorization()) {
				$this->auth($credentials);
			}
		}
		
		/**
		 *
		 * @param Getnet $credentials
		 * @return Getnet
		 */
		public function auth(Getnet $credentials): Getnet
		{
			$url_path = "/auth/oauth/v2/token";
			
			$params = [
				"scope" => "oob",
				"grant_type" => "client_credentials"
			];
			
			$querystring = http_build_query($params);
			
			try {
				$response = $this->send($credentials, $url_path, self::CURL_TYPE_AUTH, $querystring);
			} catch (Exception $e) {
				throw new GetnetException($e->getMessage(), 100);
			}
			
			$credentials->setAuthorization($response["access_token"]);
			
			return $credentials;
		}
		
		/**
		 *
		 * @param Getnet $credentials
		 * @param mixed $url_path
		 * @param mixed $method
		 * @param mixed $jsonBody
		 */
		private function send(Getnet $credentials, $url_path, $method, $jsonBody = null)
		{
			$curl = curl_init($this->getFullUrl($url_path));
			
			$defaultCurlOptions = array(
				CURLOPT_CONNECTTIMEOUT => 60,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_TIMEOUT => 60,
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json; charset=utf-8'
				),
				CURLOPT_SSL_VERIFYHOST => 2,
				CURLOPT_SSL_VERIFYPEER => 0
			);
			
			// Auth
			if ($method === self::CURL_TYPE_AUTH) {
				$defaultCurlOptions[CURLOPT_HTTPHEADER][0] = 'application/x-www-form-urlencoded';
				curl_setopt($curl, CURLOPT_USERPWD, $credentials->getClientId() . ":" . $credentials->getClientSecret());
			} else {
				$defaultCurlOptions[CURLOPT_HTTPHEADER][] = 'Authorization: Bearer ' . $credentials->getAuthorization();
			}
			
			// Add custom method
			if (in_array($method, [
				self::CURL_TYPE_DELETE,
				self::CURL_TYPE_PUT
			])) {
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
			}
			
			// Add body params
			if (! empty($jsonBody)) {
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS, is_string($jsonBody) ? $jsonBody : json_encode($jsonBody));
			}
			
			curl_setopt($curl, CURLOPT_ENCODING, "");
			curl_setopt_array($curl, $defaultCurlOptions);
			
			$response = null;
			$errorMessage = '';
			
			try {
				$response = curl_exec($curl);
			} catch (Exception $e) {
				throw new GetnetException("Request Exception, error: {$e->getMessage()}", 100);
			}
			
			// Verify error
			if ($response === false) {
				$errorMessage = curl_error($curl);
			}
			
			$statusCode = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
			curl_close($curl);
			
			if ($statusCode >= 400) {
				// TODO see what it means code 100
				throw new GetnetException($response, 100);
			}
			
			// Status code 204 don't have content. That means $response will be always false
			// Provides a custom content for $response to avoid error in the next if logic
			if ($statusCode === 204) {
				return [
					'status_code' => 204
				];
			}
			
			if (! $response) {
				throw new GetnetException("Empty response, curl_error: $errorMessage", $statusCode);
			}
			
			$responseDecode = json_decode($response, true);
			
			if (is_array($responseDecode) && isset($responseDecode['error'])) {
				throw new GetnetException($responseDecode['error_description'], 100);
			}
			
			return $responseDecode;
		}
		
		/**
		 *
		 * Get request full url
		 *
		 * @param string $url_path
		 * @return string $url(config) + $url_path
		 */
		private function getFullUrl(string $url_path): string
		{
			if (stripos($url_path, $this->baseUrl, 0) === 0) {
				return $url_path;
			}
			
			return $this->baseUrl . $url_path;
		}
		
		/**
		 *
		 * @return string
		 */
		public function getBaseUrl(): string
		{
			return $this->baseUrl;
		}
		
		/**
		 *
		 * @param Getnet $credentials
		 * @param mixed $url_path
		 * @return mixed * @throws Exception
		 * @throws Exception
		 */
		public function get(Getnet $credentials, $url_path)
		{
			return $this->send($credentials, $url_path, self::CURL_TYPE_GET);
		}
		
		/**
		 *
		 * @param Getnet $credentials
		 * @param mixed $url_path
		 * @param mixed $params
		 */
		public function post(Getnet $credentials, $url_path, $params)
		{
			return $this->send($credentials, $url_path, self::CURL_TYPE_POST, $params);
		}
		
		/**
		 *
		 * @param Getnet $credentials
		 * @param mixed $url_path
		 * @param mixed $params
		 * @return mixed * @throws Exception
		 * @throws Exception
		 */
		public function put(Getnet $credentials, $url_path, $params)
		{
			return $this->send($credentials, $url_path, self::CURL_TYPE_PUT, $params);
		}
		
		/**
		 *
		 * @param Getnet $credentials
		 * @param mixed $url_path
		 * @return mixed * @throws Exception
		 * @throws Exception
		 */
		public function delete(Getnet $credentials, $url_path)
		{
			return $this->send($credentials, $url_path, self::CURL_TYPE_DELETE);
		}
		
	}