<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MessageBlock extends Component
{
    // Konstruktor — wird aufgerufen, wenn die Komponente erstellt wird
    public function __construct()
    {
        // aktuell leer – man könnte hier z. B. Daten übergeben (z. B. Text, Typ etc.)
    }

    // render()-Methode: gibt an, welche View-Datei gerendert werden soll
    public function render(): View|Closure|string
    {
        // Zeigt auf die Datei: resources/views/components/message-block.blade.php
        return view('components.message-block');
    }
}
