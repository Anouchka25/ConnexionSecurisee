public function check_database($password){
    $username = $this->input->post('username');
    $result = $this->um->login($username, $password);
    if($result){
      $sess_array = array();
      foreach($result as $row){
        $sess_array = array(
                       'id'=>$row->id,
                       'username'=>$row->username
                      );
        $this->session->set_userdata('loggedIn',$sess_array);
      }
      return true;
    }else{
      $this->form_validation->set_message('check_database', 'Invalid Username or Password.');
      return false;
    }
  }
