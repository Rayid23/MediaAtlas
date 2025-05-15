<x-app-layout>
    <div class="py-8">
        <!-- Welcome Card с улучшенной визуальной иерархией -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xs border border-gray-100 dark:border-gray-700/50 transition-all duration-200 hover:shadow-sm">
                <div class="p-6 md:p-8 flex flex-col md:flex-row items-start md:items-center gap-6">
                    <!-- Иконка с акцентом -->
                    <div class="flex-shrink-0 p-3.5 rounded-xl bg-blue-50/70 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 ring-8 ring-blue-50/20 dark:ring-blue-900/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                        </svg>
                    </div>

                    <!-- Текстовая часть с четкой иерархией -->
                    <div class="flex-1 min-w-0">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2 tracking-tight">
                            {{ __("Управление контентом") }}
                        </h1>
                        <p class="text-gray-600 dark:text-gray-300/90 text-base leading-6 mb-4">
                            {{ __("Создавайте, редактируйте и организуйте ваш контент") }}
                        </p>

                        <div class="flex flex-wrap items-center gap-4">
                            <!-- Статистика с иконкой -->
                            <div class="inline-flex items-center text-sm font-medium px-3 py-1.5 rounded-lg bg-gray-50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-blue-500 dark:text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                                </svg>
                                {{ $contents->count() }} {{ trans_choice('контент|контента|контентов', $contents->count()) }}
                            </div>

                            <!-- Кнопка действия -->
                            <a href="#" class="inline-flex items-center text-sm font-medium px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white shadow-xs transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                {{ __("Добавить новый") }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Карточки контента в сетке -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($contents->isEmpty())
            <!-- Состояние пустого списка -->
            <div class="text-center py-16 bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/50">
                <div class="mx-auto h-24 w-24 flex items-center justify-center rounded-full bg-gray-50 dark:bg-gray-700/50 text-gray-400 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">{{ __("Контент не найден") }}</h3>
                <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto mb-6">{{ __("Начните добавлять контент, чтобы он появился здесь") }}</p>
                <a href="#" class="inline-flex items-center px-4 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium shadow-xs transition-colors duration-200">
                    {{ __("Создать первый контент") }}
                </a>
            </div>
            @else
            <!-- Сетка карточек -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($contents as $content)
                <div class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700/50 overflow-hidden shadow-xs hover:shadow-sm transition-shadow duration-200">

                    @if($content->category->name == 'Youtube')
                    <div class="h-60 bg-gradient-to-r from-blue-50/50 to-blue-100/30 dark:from-gray-700 dark:to-gray-700/80 flex items-center justify-center text-gray-400 dark:text-gray-500">
                        <iframe
                            width="100%"
                            height="100%"
                            src="{{ $content->url }}"
                            title="{{ $content->title }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>
                    @else
                    <div class="h-60 bg-gradient-to-r from-blue-50/50 to-blue-100/30 dark:from-gray-700 dark:to-gray-700/80 flex items-center justify-center text-gray-400 dark:text-gray-500">
                        <img src="{{ $content->image }}">
                    </div>
                    @endif
                    <!-- Тело карточки -->
                    <div class="p-5">
                        <!-- Категория и статус -->
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200">
                                {{ $content->category->name ?? 'Без категории' }}
                            </span>
                            <span class="inline-flex items-center text-xs text-gray-500 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $content->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <!-- Заголовок и описание -->
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 line-clamp-1">{{ $content->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-300/90 text-sm mb-4 line-clamp-2">{{ $content->description }}</p>

                        <!-- Футер карточки -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-1.5">
                                @foreach($content->authors as $author)
                                <span class="inline-flex items-center text-xs font-medium text-gray-500 dark:text-gray-400">
                                    {{ $author->name }}
                                </span>
                                @endforeach
                            </div>

                            <div class="flex space-x-2">
                                <a href="#" class="p-1.5 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 rounded-md transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="#" class="p-1.5 text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 rounded-md transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Пагинация -->
            <div class="mt-8 flex items-center justify-center">
                <nav class="inline-flex rounded-md shadow-xs">
                    <a href="#" class="px-3 py-2 rounded-l-md border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="px-4 py-2 border-t border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm font-medium text-blue-600 dark:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                        1
                    </a>
                    <a href="#" class="px-4 py-2 border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                        2
                    </a>
                    <a href="#" class="px-4 py-2 border-t border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                        3
                    </a>
                    <a href="#" class="px-3 py-2 rounded-r-md border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>