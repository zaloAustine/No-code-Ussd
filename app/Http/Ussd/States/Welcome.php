<?php

namespace App\Http\Ussd\States;
use Sparors\Ussd\State;

class Welcome extends State
{
    protected $action = self::INPUT; // for prompt (with input)

    protected function beforeRendering(): void
    {
        $this->menu->text('Welcome To No code Ussd')
            ->lineBreak(2)
            ->line('Select an option')
            ->listing([
                'Airtime Topup',
                'Data Bundle',
                'TV Subscription',
                'ECG/GWCL',
                'Talk To Us'
            ])
            ->lineBreak(2)
            ->text('Powered by No Code');
    }

    protected function afterRendering(string $argument): void
    {
        // If input is equal to 1, 2, 3, 4 or 5, render the appropriate state
        $this->decision->equal("1", Airtime::class)
            ->between(2, 5, Airtime::class)
            ->any(Airtime::class);
    }
}
