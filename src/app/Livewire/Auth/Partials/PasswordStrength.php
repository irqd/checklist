<?php

namespace App\Livewire\Auth\Partials;

use Livewire\Attributes\Modelable;
use Livewire\Component;
use ZxcvbnPhp\Zxcvbn;

class PasswordStrength extends Component
{
    private array $strengths = [
        'Too weak',
        'Weak',
        'Good',
        'Strong',
        'Very strong',
    ];

    #[Modelable]
    public string $password = '';

    // This gets re-rendered every time the password changes
    public function render()
    {
        $strength = (new Zxcvbn())->passwordStrength($this->password);

        return view('livewire.auth.partials.password-strength', [
            'strength' => $this->strengths[$strength['score']],
            'score' => $strength['score'],
        ]);
    }
}
