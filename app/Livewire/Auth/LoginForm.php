<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $passwordVisible = false;

    protected $rules = [
        'email' => 'required',
        'password' => 'required|min:6',
    ];
    protected $messages = [
        'email.required' => 'Email wajib diisi.',
        'password.required' => 'Password wajib diisi.',
    ];

    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            $user = Auth::user(); // Ambil setelah login berhasil

            if ($user->role === 'employee') {
                return redirect()->route('employees.show', $user->employee);
            }

            return redirect()->intended('/dashboard');
        }

        $this->addError('email', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
