public function login()
    {
        if(!empty($_POST)){
            
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            
            $isExists = App::get('database')->auth_login($email, $password,"users");
            
            if(isset($_SESSION['userData']))
            {
                if(!empty($_SESSION['userData']['role_id']))
                {
                    return $_SESSION['userData']['role_id'] == 1 ? redirect("admin-dash") : redirect("user-dash");
                }
                else
                {
                    $_SESSION['error']="Username and password is invalid";
                    return redirect(('admin-login'));
                }

            }else
            {
                $_SESSION['error']="Fill the all fields";
                return redirect(('admin-login'));
            }
        }else if(isset($_SESSION['userData']))
        {
            return redirect('admin-dash');
        }else
        {
            return view('admin/admin-login');
        }
    }