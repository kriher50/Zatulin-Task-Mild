<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Livewire\NewsComponent;

class FetchNews extends Command
{
    protected $signature = 'news:fetch';
    protected $description = 'Получайте последние новости из различных источников()';

    public function handle()
    {
        // Здесь вызываем метод для получения новостей
        $newsComponent = new NewsComponent();
        $newsComponent->fetchNews();

        $this->info('Успех!');
    }
}
