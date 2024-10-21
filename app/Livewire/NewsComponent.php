<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
class NewsComponent extends Component
{
    public $news = [];



    public function fetchNews()
    {
        // Получаем RSS-ленту
        $response = Http::withOptions([
            'verify' => storage_path('certs/cacert.pem')
        ])->get('https://lenta.ru/rss');

        // Парсинг XML
        $rssData = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);

        // Преобразуем в массив
        $rssArray = json_decode(json_encode($rssData), true);

        // Теперь обрабатываем элементы
        if (isset($rssArray['channel']['item']) && is_array($rssArray['channel']['item'])) {
            foreach ($rssArray['channel']['item'] as $item) {
                // Проверяем, есть ли описание в поле <description>
                $description = isset($item['description']) && is_string($item['description']) ? strip_tags($item['description']) : null;

                // Если описание пустое, пытаемся получить его со страницы
                if (empty($description)) {
                    $description = $this->fetchDescriptionFromUrl($item['link']);
                }

                \App\Models\News::create([
                    'title' => is_array($item['title']) ? implode(", ", $item['title']) : $item['title'],
                    'content' => $description ?: 'Описание не найдено',
                    'image' => isset($item['enclosure']['@attributes']['url']) ? $item['enclosure']['@attributes']['url'] : null,
                ]);
            }
        } else {
            $this->info('Новости не найдены или структура данных изменилась.');
        }
    }

    private function fetchDescriptionFromUrl($url)
    {
        // Получаем HTML страницы
        $pageResponse = Http::withOptions([
            'verify' => storage_path('certs/cacert.pem')
        ])->get($url);

        // Проверяем кодировку страницы и преобразуем ее в UTF-8
        $html = mb_convert_encoding($pageResponse->body(), 'UTF-8', mb_detect_encoding($pageResponse->body(), ['UTF-8', 'ISO-8859-1', 'Windows-1251'], true));

        // Используем Symfony DomCrawler для быстрого парсинга
        $crawler = new Crawler($html);

        // Ищем мета-тег с описанием
        $description = $crawler->filterXpath('//meta[@name="description"]')->attr('content');

        return $description ?: 'Описание не найдено';
    }



    public function render()
    {
        $this->news = \App\Models\News::latest()->take(10)->get();

        return view('livewire.news-component', ['news' => $this->news]);
    }
}
