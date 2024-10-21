<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold text-center mb-6 text-primary dark:text-highlight">Новости</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($news as $newsItem)
            <div class="p-5 bg-columns border border-gray-300 dark:bg-gray-800 rounded-lg shadow-lg hover:shadow-emerald-900 transition-shadow duration-900">
                <h2 class="text-xl font-semibold text-title dark:text-highlight">{{ $newsItem['title'] }}</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $newsItem['content'] }}</p>
                @if($newsItem['image'])
                    <img src="{{ $newsItem['image'] }}" alt="{{ $newsItem['title'] }}" class="mt-4 rounded-lg w-full h-auto object-cover">
                @endif
            </div>
        @endforeach
    </div>
</div>
