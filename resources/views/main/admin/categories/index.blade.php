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
                            {{ __("Управление категориями") }}
                        </h1>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __("Здесь вы можете просматривать, создавать и редактировать категории") }}
                        </p>
                        <div class="mt-3 text-sm text-blue-600 dark:text-blue-400 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                            </svg>
                            {{ __("Всего категориев: ") }}{{ $categories->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Панель действий с четкими визуальными состояниями -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 flex flex-wrap gap-3">
            <!-- Основная кнопка с визуальным акцентом -->
            <a href="{{ route('categories.create') }}" class="flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 dark:focus:ring-blue-700 shadow-md hover:shadow-lg active:scale-[0.98]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                {{ __("Создать категорию") }}
            </a>

            <!-- Поле поиска с визуальной обратной связью -->
            <div class="relative flex-grow max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-600 dark:focus:border-blue-600 placeholder-gray-400 dark:placeholder-gray-500 transition-all duration-200" placeholder="{{ __('Поиск категории...') }}">
            </div>
        </div>


        <!-- Category Cards Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($categories as $category)
                <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition-all duration-200 hover:translate-y-[-2px] group">
                    <div class="p-5">
                        <!-- Clear visual hierarchy -->
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-{{ $category->color }}-100 dark:bg-{{ $category->color }}-900/20 flex items-center justify-center text-{{ $category->color }}-600 dark:text-{{ $category->color }}-300">
                                @if($category->icon)
                                <i class="{{ $category->icon }} text-lg"></i>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                                @endif
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                {{ $category->name }}
                            </h3>
                        </div>

                        <!-- Minimal cognitive load with clear metadata -->
                        <div class="space-y-2">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $category->description ?? 'Описание отсутствует' }}
                            </p>
                            <div class="flex justify-between items-center text-xs text-gray-500 dark:text-gray-400">
                                <span>{{ $category->contents->count() }} элементов</span>
                                <span>Обновлено {{ $category->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <!-- Clear call-to-action -->
                        <div class="mt-4 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <a href="{{ route('categories.show', $category->id) }}" class="px-2 py-1 text-xs bg-blue-600 hover:bg-blue-700 text-white rounded-md transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                Просмотр
                            </a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="px-2 py-1 text-xs border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-colors duration-150">
                                Изменить
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="px-2 py-1 text-xs bg-red-500 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-colors duration-150">
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>