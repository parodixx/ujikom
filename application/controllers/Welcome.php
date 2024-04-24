<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['abc'] = 'auth/Login';
		$this->load->view('auth/templates/index', $data);
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('Welcome');
		} else {
			$input = $this->input->post(null, true);

			$username = $input['username'];
			$password = $input['password'];

			$user = $this->db->get_where('user', ['username' => $username])->row_array();
			// var_dump($user);
			// exit;

			if ($user) {
				if (password_verify($password, $user['password'])) {
					$data['username'] = $user['username'];
					$data['role_id'] = $user['role_id'];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else if ($user['is_active'] == 'aktif') {
						redirect('admin/petugass');
					} else {
						redirect('Welcome');
					}
				} else {
					$this->session->set_flashdata("error", 'Masukan username yang benar!!');
					redirect('Welcome');
				}
			} else {
				$this->session->set_flashdata("error", 'Masukan password yang benar!!');
				redirect('Welcome');
			}
		}
	}

	public function register()
	{
		$data = [
			'nama' => $this->input->post('nama_petugas'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => '2',
			'is_active' => $this->input->post('status'),
		];

		// var_dump($data);
		// die;

		$this->db->insert('user', $data);
		
		redirect('admin/petugas');
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect('Welcome');
	}
}
