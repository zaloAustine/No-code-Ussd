<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class Airtime extends State
{
    protected function beforeRendering(): void
    {
        //
        $this->menu->text('Buy AirTime')
            ->lineBreak(2)
            ->line('Select a package')
            ->listing([
                '10',
                '20',
                '50',
                '100',
                '200'
            ])
            ->lineBreak(2)
            ->text('Powered by No Code');
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}
