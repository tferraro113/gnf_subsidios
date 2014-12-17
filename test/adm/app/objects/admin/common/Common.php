<?php

class AdminCommon {

	private $da;
	private $savant;

	public function __construct($da) {
		$this->da = $da;
		$this->savant = new Savant3();
		$this->savant->setPath('template', dirname(__FILE__));
	}

	public function dashboard() {

		return $this->savant->getOutput('dashboard.tpl.php');
	}
	
	public function footer(){
		$languageDao = new GenericDao('crud_languages', $this->da);
		
		$this->savant->languages = $languageDao->find();
		
		return $this->savant->getOutput('footer.tpl.php');
	}

	public function login() {
		if (isset($_SESSION['CRUD_AUTH'])){
			redirect('admin/dashboard');
		}
		
		$languageDao = new GenericDao('crud_languages', $this->da);
		$this->savant->languages = $languageDao->find();
		
		global $sysUser;

		$settingKey = sha1('general');
		$settingDao = new GenericDao('crud_settings', $this->da);
		$params = array();
		$params['conditions'] = array('setting_key = ?', array($settingKey));
		$setting = $settingDao->findFirst($params);
		$setting = unserialize($setting['setting_value']);

		if (isset($_POST['crudUser']) && isset($_POST['crudUser']['name']) && isset($_POST['crudUser']['password'])) {
			if ($sysUser['enable'] == true) {
				if ($_POST['crudUser']['name'] == $sysUser['name'] &&
				$_POST['crudUser']['password'] == $sysUser['password']) {
					$_SESSION['CRUD_AUTH']['user_name'] = $sysUser['name'];
					$_SESSION['CRUD_AUTH']['user_setting_management'] = 1;
					$_SESSION['CRUD_AUTH']['user_global_access'] = 1;
					
					$group = array('group_name' => 'SystemAdmin',
									'group_manage_flag' => 3,
							'group_setting_management' => 1,
							'group_global_access' => 1
					);
					$_SESSION['CRUD_AUTH']['__system_admin__'] = 1;
					$_SESSION['CRUD_AUTH']['group'] = $group;
					redirect("admin/dashboard");
					exit;
				}
			}

			$userDao = new GenericDao('crud_users', $this->da);

			$params = array();
			$params['conditions'] = array('user_name = ? and user_password = ? and user_status = ?', array($_POST['crudUser']['name'], sha1($_POST['crudUser']['password']),1));
			$rs = $userDao->findFirst($params);
			if (!empty($rs)) {
				$groupDao = new GenericDao('crud_groups', $this->da);
				$params = array();
				$params['conditions'] = array('id = ?', array($rs['group_id']));
				$rs1 = $groupDao->findFirst($params);
				if (!empty($rs1)) {
					$rs['group'] = $rs1;
				} else {
					$rs['group'] = array('group_name' => 'None',
							'group_manage_flag' => 0,
							'group_setting_management' => 0,
							'group_global_access' => 0
					);
				}
				unset($rs['group_id']);
				unset($rs['user_password']);
				unset($rs['user_info']);
				$_SESSION['CRUD_AUTH'] = $rs;
				$_SESSION['CRUD_AUTH']['__system_admin__'] = 0;
				if (isset($_POST['remember_me']) && (int)$_POST['remember_me'] == 1){
					Cookie::Set('CRUD_AUTH', serialize(array(base64_encode($_POST['crudUser']['name']), base64_encode(sha1($_POST['crudUser']['password'])))),Cookie::SevenDays);
				}else{
					Cookie::Delete('CRUD_AUTH');
				}
				redirect('admin/dashboard');
			}
		}
		$this->savant->setting = $setting;
		return $this->savant->getOutput('login.tpl.php');
	}

	public function signup(){
		$lang = Lang::singleton();
		require LIBRARY . '/recaptcha/recaptchalib.php';
		$errors = array();
		$settingKey = sha1('general');
		$settingDao = new GenericDao('crud_settings', $this->da);
		$userDao = new GenericDao('crud_users', $this->da);
		$params = array();
		$params['conditions'] = array('setting_key = ?', array($settingKey));
		$setting = $settingDao->findFirst($params);
		$setting = unserialize($setting['setting_value']);
		if ((int)$setting['disable_registration'] == 1){
			exit;
		}
		if (isPost()){
			$validate = Validation::singleton();
			if (!$validate->notEmpty($_POST['crudUser']['name'])){
				$errors[] = sprintf($lang->line('please_enter_value'), $lang->line('user_name'));
			}else{
				$params = array();
				$params['conditions'] = array('user_name = ?', array(trim($_POST['crudUser']['name'])));
				$user = $userDao->findFirst($params);

				if (!empty($user)){
					$errors[] = $lang->line('account_already_exits');
				}

			}

			if (!$validate->notEmpty($_POST['crudUser']['password'])){
				$errors[] = sprintf($lang->line('please_enter_value'), $lang->line('password'));
			}

			if (!$validate->notEmpty($_POST['crudUser']['confirm_password'])){
				$errors[] = sprintf($lang->line('please_enter_value'), $lang->line('confirm_password'));
			}

			if ($validate->notEmpty($_POST['crudUser']['password']) && $validate->notEmpty($_POST['crudUser']['confirm_password'])){
				if ($_POST['crudUser']['password'] != $_POST['crudUser']['confirm_password']){
					$errors[] = $lang->line('password_confirm_password_do_not_match');
				}
			}

			if (!$validate->notEmpty($_POST['crudUser']['email'])){
				$errors[] = sprintf($lang->line('please_enter_value'), $lang->line('email'));
			}else if (!$validate->email($_POST['crudUser']['email'])){
				$errors[] = sprintf($lang->line('please_provide_valid_email'), $lang->line('email'));
			}else{
				$params = array();
				$params['conditions'] = array('user_email = ?', array(trim($_POST['crudUser']['email'])));
				$user = $userDao->findFirst($params);

				if (!empty($user)){
					$errors[] = $lang->line('email_already_exits');
				}
			}

			if ((int)$setting['enable_recaptcha'] == 1){
				$privatekey = $setting['recaptcha_private_key'];
				$resp = recaptcha_check_answer ($privatekey,
						$_SERVER["REMOTE_ADDR"],
						$_POST["recaptcha_challenge_field"],
						$_POST["recaptcha_response_field"]);

				if (!$resp->is_valid) {
					$errors[] = $lang->line('recaptcha_was_not_correct');
				}
			}

			if (count($errors) == 0){
				$_SESSION['signup_complete'] = 1;
				$user = array();

				$user['user_name'] = $_POST['crudUser']['name'];
				$user['user_password'] = sha1($_POST['crudUser']['password']);
				$user['user_email'] = $_POST['crudUser']['email'];

				if (isset($setting['require_email_activation']) && (int)$setting['require_email_activation'] == 1){
					$time = time();
					$code = sha1('activate'.$user['user_email'].$time).'-'.$time;
					$user['user_code'] = $code;
					$user['user_status'] = 0;
				}else{
					$user['user_status'] = 1;
				}

				if (isset($setting['default_group'])){
					$user['group_id'] = $setting['default_group'];
				}else{
					$user['group_id'] = 0;
				}

				$userDao->insert($user);
				if (isset($setting['require_email_activation']) && (int)$setting['require_email_activation'] == 1){
					$params = array();
					$params['conditions'] = array('setting_key = ?', array(sha1('new_user')));
					$newUserEmail = $settingDao->findFirst($params);
					$newUserEmail = unserialize($newUserEmail['setting_value']);

					require_once LIBRARY.'/PHPMailer/class.phpmailer.php';

					$mail = new PHPMailer();
					if ((int)$setting['enable_smtp'] == 1){
						$mail->IsSMTP();
						if (isset($setting['smtp_auth']) && !empty($setting['smtp_auth'])){
							$mail->SMTPSecure = $setting['smtp_auth'];
						}
						$mail->Host       = $setting['smtp_host']; // SMTP server
						$mail->Port       = $setting['smtp_port'];  // set the SMTP port for the GMAIL server
						if ((int)$setting['enable_smtp_auth'] == 1){
							$mail->SMTPAuth   = true;                  // enable SMTP authentication
							$mail->Username   = $setting['smtp_account']; // SMTP account username
							$mail->Password   = $setting['smtp_password'];        // SMTP account password
						}
					}

					$mail->AddAddress($user['user_email']);
					$mail->SetFrom($setting['email_address'], $lang->line('please_do_not_reply'));

					$mail->Subject = $newUserEmail['send_link_subject'];

					$body = $newUserEmail['send_link_body'];

					$siteAddress = siteURL().__SELF__;
					$activationLink = siteURL().strUrl('admin/activate.php?code='.$code);

					$body = str_replace('{site_address}', $siteAddress, $body);
					$body = str_replace('{user_name}', $user['user_name'], $body);
					$body = str_replace('{user_email}', $user['user_email'], $body);
					$body = str_replace('{activation_link}', $activationLink, $body);

					$mail->Body = $body;
					$mail->Send();
				}

				redirect('admin/signup_complete.php');
			}

		}
			
		$this->savant->setting = $setting;
		$this->savant->errors = $errors;

		return $this->savant->getOutput('signup.tpl.php');
			
	}

	public function activate(){
		$lang = Lang::singleton();
		if (isset($_GET['code'])){
			$settingDao = new GenericDao('crud_settings', $this->da);
			$userDao = new GenericDao('crud_users', $this->da);

			$params = array();
			$params['conditions'] = array('user_code = ?', array($_GET['code']));
			$user = $userDao->findFirst($params);
			if (!empty($user)){
				$ary = explode('-', $_GET['code']);
				if ($_GET['code'] == sha1('activate'.$user['user_email'].$ary[1]).'-'.$ary[1]){
					$user['user_code'] = '';
					$user['user_status'] = 1;
					$userDao->save($user);

					$params = array();
					$params['conditions'] = array('setting_key = ?', array(sha1('general')));
					$setting = $settingDao->findFirst($params);
					$setting = unserialize($setting['setting_value']);

					$params = array();
					$params['conditions'] = array('setting_key = ?', array(sha1('new_user')));
					$newUserEmail = $settingDao->findFirst($params);
					$newUserEmail = unserialize($newUserEmail['setting_value']);

					require_once LIBRARY.'/PHPMailer/class.phpmailer.php';

					$mail = new PHPMailer();
					
					if ((int)$setting['enable_smtp'] == 1){
						$mail->IsSMTP();
						if (isset($setting['smtp_auth']) && !empty($setting['smtp_auth'])){
							$mail->SMTPSecure = $setting['smtp_auth'];
						}
						$mail->Host       = $setting['smtp_host']; // SMTP server
						$mail->Port       = $setting['smtp_port'];  // set the SMTP port for the GMAIL server
						if ((int)$setting['enable_smtp_auth'] == 1){
							$mail->SMTPAuth   = true;                  // enable SMTP authentication
							$mail->Username   = $setting['smtp_account']; // SMTP account username
							$mail->Password   = $setting['smtp_password'];        // SMTP account password
						}
					}

					$mail->AddAddress($user['user_email']);
					$mail->SetFrom($setting['email_address'], $lang->line('please_do_not_reply'));

					$mail->Subject = $newUserEmail['activated_subject'];

					$body = $newUserEmail['activated_body'];

					$siteAddress = siteURL().__SELF__;

					$body = str_replace('{site_address}', $siteAddress, $body);
					$body = str_replace('{user_name}', $user['user_name'], $body);
					$body = str_replace('{user_email}', $user['user_email'], $body);

					$mail->Body = $body;
					$mail->Send();
					$_SESSION['activate_complete'] = 1;

					redirect('admin/activate_complete.php');
				}
			}

		}
	}


	public function signupComplete(){
		if (isset($_SESSION['signup_complete']) && $_SESSION['signup_complete'] == 1){
			unset($_SESSION['signup_complete']);

			return $this->savant->getOutput('signup_complete.tpl.php');
		}else{
			redirect('admin/login.php');
		}
	}

	public function activateComplete(){
		if (isset($_SESSION['activate_complete']) && $_SESSION['activate_complete'] == 1){
			unset($_SESSION['activate_complete']);
			return $this->savant->getOutput('activate_complete.tpl.php');
		}else{
			redirect('admin/login.php');
		}
	}

	public function SendResetPasswordLink(){
		$lang = Lang::singleton();
		if (isset($_POST['user_email']) && isAjax()){
			$sendLink = true;

			$settingDao = new GenericDao('crud_settings', $this->da);
			$userDao = new GenericDao('crud_users', $this->da);

			$params = array();
			$params['conditions'] = array('setting_key = ?', array(sha1('general')));
			$setting = $settingDao->findFirst($params);
			$setting = unserialize($setting['setting_value']);
				
			if ((int)$setting['disable_reset_password'] == 1){
				exit;
			}
				
			$params = array();
			$params['conditions'] = array('user_email = ? and user_status = 1', array(trim($_POST['user_email'])));
			$user = $userDao->findFirst($params);
			if (!empty($user)){
				if (!empty($user['user_code'])){
					$aryCode = explode('-', $user['user_code']);
					if ($user['user_code'] != sha1('reset_password'.$user['user_email'].$aryCode[1]).'-'.$aryCode[1]){
						$sendLink = false;
					}
				}
			}else{
				$sendLink = false;
			}

			if ($sendLink == true){
				$time = time();
				$code = sha1('reset_password'.$user['user_email'].$time).'-'.$time;
				$user['user_code'] = $code;
				$userDao->save($user);

				$params = array();
				$params['conditions'] = array('setting_key = ?', array(sha1('reset_password')));
				$resetPasswordEmail = $settingDao->findFirst($params);
				$resetPasswordEmail = unserialize($resetPasswordEmail['setting_value']);

				require_once LIBRARY.'/PHPMailer/class.phpmailer.php';
					
				$mail = new PHPMailer();
				if ((int)$setting['enable_smtp'] == 1){
					$mail->IsSMTP();
					if (isset($setting['smtp_auth']) && !empty($setting['smtp_auth'])){
						$mail->SMTPSecure = $setting['smtp_auth'];
					}
					$mail->Host       = $setting['smtp_host']; // SMTP server
					$mail->Port       = $setting['smtp_port'];  // set the SMTP port for the GMAIL server
					if ((int)$setting['enable_smtp_auth'] == 1){
						$mail->SMTPAuth   = true;                  // enable SMTP authentication
						$mail->Username   = $setting['smtp_account']; // SMTP account username
						$mail->Password   = $setting['smtp_password'];        // SMTP account password
					}
				}
					
				$mail->AddAddress($user['user_email']);
				$mail->SetFrom($setting['email_address'], $lang->line('please_do_not_reply'));
					
				$mail->Subject = $resetPasswordEmail['request_subject'];
					
				$body = $resetPasswordEmail['request_body'];
					
				$siteAddress = siteURL().__SELF__;
				$resetLink = siteURL().strUrl('admin/reset_password.php?code='.$code);
					
				$body = str_replace('{site_address}', $siteAddress, $body);
				$body = str_replace('{user_name}', $user['user_name'], $body);
				$body = str_replace('{user_email}', $user['user_email'], $body);
				$body = str_replace('{reset_link}', $resetLink, $body);
					
				$mail->Body = $body;
				$mail->Send();
			}

			if ($sendLink == true){
				$var['send_link'] = 1;
			}else{
				$var['send_link'] = 0;
			}

			echo json_encode($var);
		}
	}

	public function resetPassword(){
		$lang = Lang::singleton();
		if (isPost()){
			$errors = array();
			$resetFlag = false;

			$settingDao = new GenericDao('crud_settings', $this->da);
			$userDao = new GenericDao('crud_users', $this->da);

			$params = array();
			$params['conditions'] = array('user_code = ?  and user_status = 1', array($_GET['code']));
			$user = $userDao->findFirst($params);
			if (!empty($user)){
				if (!empty($user['user_code'])){
					$ary = explode('-', $_GET['code']);
					if ($_GET['code'] == sha1('reset_password'.$user['user_email'].$ary[1]).'-'.$ary[1]){
						if (time() - $ary[1] < 24*60*60){
							$validate = Validation::singleton();

							if (!$validate->notEmpty($_POST['data']['user_password'])){
								$errors[] = sprintf($lang->line('please_enter_value'), $lang->line('password'));
							}

							if (!$validate->notEmpty($_POST['data']['user_confirm_password'])){
								$errors[] = sprintf($lang->line('please_enter_value'), $lang->line('confirm_password'));
							}

							if ($validate->notEmpty($_POST['data']['user_password']) && $validate->notEmpty($_POST['data']['user_confirm_password'])){
								if ($_POST['data']['user_password'] != $_POST['data']['user_confirm_password']){
									$errors[] = $lang->line('password_confirm_password_do_not_match');
								}
							}
							if (count($errors) == 0){
								$user['user_code'] = '';
								$user['user_password'] = sha1($_POST['data']['user_password']);
								$userDao->save($user);

								$params = array();
								$params['conditions'] = array('setting_key = ?', array(sha1('general')));
								$setting = $settingDao->findFirst($params);
								$setting = unserialize($setting['setting_value']);

								$params = array();
								$params['conditions'] = array('setting_key = ?', array(sha1('reset_password')));
								$resetPasswordEmail = $settingDao->findFirst($params);
								$resetPasswordEmail = unserialize($resetPasswordEmail['setting_value']);

								require_once LIBRARY.'/PHPMailer/class.phpmailer.php';

								$mail = new PHPMailer();
								
								if ((int)$setting['enable_smtp'] == 1){
									$mail->IsSMTP();
									if (isset($setting['smtp_auth']) && !empty($setting['smtp_auth'])){
										$mail->SMTPSecure = $setting['smtp_auth'];
									}
									$mail->Host       = $setting['smtp_host']; // SMTP server
									$mail->Port       = $setting['smtp_port'];  // set the SMTP port for the GMAIL server
									if ((int)$setting['enable_smtp_auth'] == 1){
										$mail->SMTPAuth   = true;                  // enable SMTP authentication
										$mail->Username   = $setting['smtp_account']; // SMTP account username
										$mail->Password   = $setting['smtp_password'];        // SMTP account password
									}
								}

								$mail->AddAddress($user['user_email']);
								$mail->SetFrom($setting['email_address'], $lang->line('please_do_not_reply'));

								$mail->Subject = $resetPasswordEmail['success_subject'];

								$body = $resetPasswordEmail['success_body'];

								$siteAddress = siteURL().__SELF__;

								$body = str_replace('{site_address}', $siteAddress, $body);
								$body = str_replace('{user_name}', $user['user_name'], $body);
								$body = str_replace('{user_email}', $user['user_email'], $body);

								$mail->Body = $body;
								$mail->Send();
								$_SESSION['reset_password_complete'] = 1;
								$resetFlag = true;
							}
						}else{
							$errors['user_code'] = $lang->line('your_reset_password_code_is_expired');
						}
					}
				}
			}else{
				$errors['user_code'] =  $lang->line('your_reset_password_code_id_not_existed');
			}

			if ($resetFlag == true){
				redirect('admin/reset_password_complete.php');
			}else{
				$this->savant->code = $_GET['code'];
				$this->savant->errors = $errors;
				return $this->savant->getOutput('reset_password.tpl.php');
			}

		}else{
			$this->savant->code = $_GET['code'];
			$this->savant->errors = array();
			return $this->savant->getOutput('reset_password.tpl.php');
		}
	}

	public function resetPasswordComplete(){
		if (isset($_SESSION['reset_password_complete']) && $_SESSION['reset_password_complete'] == 1){
			unset($_SESSION['reset_password_complete']);
			return $this->savant->getOutput('reset_password_complete.tpl.php');
		}else{
			redirect('admin/login.php');
		}
	}

	public function logout() {
		unset($_SESSION['CRUD_AUTH']);
		Cookie::Delete('CRUD_AUTH');
		redirect('admin/login.php');
	}

}