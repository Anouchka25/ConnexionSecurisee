public function login($username, $password){
    $sha_password = sha1($password);
   $this->db->select('
            users.id,
            users.username,
            users.email,
            users.password')
          ->from('users')
          ->where("(users.email = '$username' OR users.username = '$username')")
          ->where('password', $sha_password);
    $query = $this->db->get();
    if($query->num_rows() == 1){
      return $query->result();
    }else{
      return false;
    }
  }
