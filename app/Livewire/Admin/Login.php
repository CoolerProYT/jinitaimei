<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login(){
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ],
        [
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'email.exists' => '邮箱不存在',
            'password.required' => '密码不能为空'
        ]);

        if(auth()->attempt(['email' => $this->email, 'password' => $this->password])){
            return redirect()->route('dashboard');
        }else{
            return $this->addError('password', '密码错误');
        }
    }

    public function render()
    {
        return view('livewire.admin.login');
    }
}
