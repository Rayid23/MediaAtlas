<x-app-layout>

    <div class="py-8">
        <!-- Welcome Card с улучшенной визуальной иерархией -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 transition-all duration-200">
                <div class="p-6 md:p-8 flex items-start space-x-4">
                    <!-- Иконка с четкой визуальной ассоциацией -->
                    <div class="flex-shrink-0 p-3 rounded-lg bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                        </svg>
                    </div>

                    <!-- Текст с четкой иерархией и сканируемой структурой -->
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            {{ __("Управление авторами") }}
                        </h1>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __("Здесь вы можете просматривать, создавать и редактировать авторов") }}
                        </p>
                        <div class="mt-3 text-sm text-blue-600 dark:text-blue-400 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                            </svg>
                            {{ __("Всего авторов: ") }}{{ $authors->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Панель действий с четкими визуальными состояниями -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 flex flex-wrap gap-3">
            <!-- Основная кнопка с визуальным акцентом -->
            <a href="{{ route('authors.create') }}" class="flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 dark:focus:ring-blue-700 shadow-md hover:shadow-lg active:scale-[0.98]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                {{ __("Создать автора") }}
            </a>

            <!-- Поле поиска с визуальной обратной связью -->
            <div class="relative flex-grow max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-600 dark:focus:border-blue-600 placeholder-gray-400 dark:placeholder-gray-500 transition-all duration-200" placeholder="{{ __('Поиск авторов...') }}">
            </div>
        </div>


        <!-- Fluent Design inspired author cards -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($authors as $author)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700 transition-all duration-200 hover:translate-y-[-2px]">
                <div class="p-6 md:p-8 space-y-4">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">
                        {{ $author->name }}
                    </h1>
                    <hr class="border-gray-200 dark:border-gray-700">
                    <!-- Apple HIG style list -->
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <span class="inline-block w-32 text-gray-500 dark:text-gray-400 font-medium">Bio</span>
                            <span class="text-gray-800 dark:text-gray-200">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, a fugiat! Expedita necessitatibus, voluptatem suscipit voluptatibus odio magnam molestias culpa nisi perspiciatis nam dolore molestiae quaerat quia soluta, neque unde!</span>
                        </div>
                    </div>
                </div>

                <!-- Material Design action area -->
                <div class="px-6 pb-6 md:px-8 md:pb-8">
                    <div class="border-t border-gray-100 dark:border-gray-700 pt-6 flex space-x-3">
                        <a href="{{ route('authors.show', $author->id) }}" class="px-4 py-2 bg-blue-700 border border-blue-300 dark:border-blue-600 text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-700 rounded-lg font-medium transition-colors duration-200">
                            Посмотреть
                        </a>
                        <a href="{{ route('authors.edit', $author->id) }}" class="px-4 py-2 bg-green-600 hover:bg-gray-700 text-white rounded-lg font-medium transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Изменить
                        </a>

                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('Удалить автора?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-4 py-2 bg-red-600 hover:bg-gray-700 text-white rounded-lg font-medium transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                Удалить
                            </button>
                        </form>
                        <a href="{{ $author->url }}" class="px-4 py-2 bg-yellow-600  hover:bg-black-700 text-white rounded-lg font-medium transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Ссылка
                        </a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>