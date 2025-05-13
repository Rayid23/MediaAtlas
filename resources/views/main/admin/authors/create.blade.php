<x-app-layout>
    <div class="py-8">
        <!-- Улучшенная карточка заголовка с системой статусов -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xs border border-gray-100 dark:border-gray-700 transition-all duration-200 hover:shadow-sm">
                <div class="p-6 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-start space-x-4">
                        <!-- Иконка с контекстным цветом -->
                        <div class="flex-shrink-0 p-3 rounded-xl bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300 shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>

                        <!-- Иерархичная текстовая информация -->
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white leading-tight">
                                {{ __("Управление авторами") }}
                            </h1>
                            <p class="text-gray-600 dark:text-gray-400 mt-1 max-w-2xl">
                                {{ __("Создавайте, редактируйте и управляйте авторами контента в системе") }}
                            </p>

                            <!-- Статусная информация с иконками -->
                            <div class="mt-3 flex flex-wrap gap-3">
                                <div class="inline-flex items-center text-sm font-medium px-2.5 py-0.5 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    {{ __("Последнее обновление: сегодня") }}
                                </div>
                                <div class="inline-flex items-center text-sm font-medium px-2.5 py-0.5 rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    {{ __("Активно") }} {{ $authors->count() }} {{ trans_choice('автор|автора|авторов', $authors->count()) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Быстрые действия -->
                    <div class="flex-shrink-0 flex flex-col sm:flex-row gap-2">
                        <!-- Add Modal -->
                        <button id="openModalBtn" class="flex items-center justify-center px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-indigo-300 focus:ring-opacity-50 shadow-md hover:shadow-lg active:scale-[0.98]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            {{ __("Добавить автора") }}
                        </button>
                        <a href="{{ route('authors.index') }}" class="flex items-center justify-center px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-indigo-300 focus:ring-opacity-50 shadow-md hover:shadow-lg active:scale-[0.98]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L4.414 9H17a1 1 0 110 2H4.414l3.293 3.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            {{ __("Вернуться") }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Панель управления с фильтрами -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-4 shadow-xs">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <!-- Поиск с автодополнением -->
                    <div class="relative flex-grow max-w-xl">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-indigo-600 dark:focus:border-indigo-600 placeholder-gray-400 dark:placeholder-gray-500 transition-all duration-200" placeholder="{{ __('Поиск по имени, email или биографии...') }}" autocomplete="off">
                    </div>

                    <!-- Группа фильтров -->
                    <div class="flex flex-wrap gap-2">
                        <select class="block w-full sm:w-auto pl-3 pr-8 py-2.5 text-base border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-indigo-600 dark:focus:border-indigo-600 rounded-lg bg-white dark:bg-gray-800 transition-all duration-200">
                            <option selected>{{ __('Все статусы') }}</option>
                            <option>{{ __('Активные') }}</option>
                            <option>{{ __('Неактивные') }}</option>
                            <option>{{ __('Верифицированные') }}</option>
                        </select>

                        <select class="block w-full sm:w-auto pl-3 pr-8 py-2.5 text-base border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:focus:ring-indigo-600 dark:focus:border-indigo-600 rounded-lg bg-white dark:bg-gray-800 transition-all duration-200">
                            <option selected>{{ __('Сортировка') }}</option>
                            <option>{{ __('По имени (А-Я)') }}</option>
                            <option>{{ __('По имени (Я-А)') }}</option>
                            <option>{{ __('По дате (новые)') }}</option>
                            <option>{{ __('По дате (старые)') }}</option>
                        </select>

                        <button class="flex items-center px-3 py-2.5 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 rounded-lg text-gray-700 dark:text-gray-200 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            {{ __('Фильтры') }}
                        </button>
                    </div>


                </div>
            </div>
        </div>

        <!-- Модальное окно для добавления автора -->
        <div class="modal fade fixed inset-0 z-50 overflow-y-auto hidden" id="exampleModal" tabindex="-1" aria-hidden="false">
            <div class="modal-backdrop fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity"></div>
            <div class="modal-container min-h-screen flex items-center justify-center p-4">
                <div class="modal-content bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 w-full max-w-md transform transition-all">
                    <!-- Заголовок модального окна -->
                    <div class="modal-header p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            Добавить нового автора
                        </h3>
                        <button type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Тело модального окна с формой -->
                    <div class="modal-body p-6">
                        <form action="{{ route('authors.store') }}" id="addAuthorForm" class="space-y-4" method="POST">
                            @csrf
                            @method('POST')
                            <!-- Прогресс-бар для многошаговых форм (если нужно) -->
                            <div class="progress-bar hidden">
                                <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 mb-1">
                                    <span>Шаг 1 из 3</span>
                                    <span>33% завершено</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5">
                                    <div class="bg-indigo-600 h-1.5 rounded-full" style="width: 33%"></div>
                                </div>
                            </div>

                            <!-- Поле "Имя" -->
                            <div class="form-group">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Имя
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        class="block w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                                        placeholder="Лев"
                                        required>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none hidden">
                                        <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <span class="text-center text-sm text-red-500 dark:text-red-400">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Поле "Добавление ссылки на их профиль" -->
                            <div class="form-group">
                                <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Ccылка на профиль
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input
                                        type="text"
                                        id="url"
                                        name="url"
                                        placeholder="https://example.com/author-profile"
                                        class="block w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                                        aria-describedby="dateHelp">

                                </div>
                                <span class="text-center text-sm text-red-500 dark:text-red-400">
                                    @error('url')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Поле "Биография" -->
                            <div class="form-group">
                                <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Краткая биография
                                    <span class="text-xs text-gray-500 dark:text-gray-400 ml-1">(необязательно)</span>
                                </label>
                                <textarea
                                    id="bio"
                                    name="bio"
                                    rows="3"
                                    class="block w-full px-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                                    placeholder="Известный русский писатель, автор романов 'Война и мир' и 'Анна Каренина'..."></textarea>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Максимум 500 символов</p>
                                <div class="flex justify-end mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    <span id="bioCounter">0</span>/500
                                </div>
                                <span class="text-center text-sm text-red-500 dark:text-red-400">
                                    @error('bio')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </form>
                    </div>

                    <!-- Футер модального окна -->
                    <div class="modal-footer p-6 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                        <button type="button" class="px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                            Отмена
                        </button>
                        <button type="submit" form="addAuthorForm" class="px-4 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 -ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Добавить автора
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Основной контент -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Состояние загрузки (пример) -->
            <div class="mb-6 hidden">
                <div class="flex items-center justify-center py-8">
                    <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-indigo-500"></div>
                </div>
            </div>

            <!-- Состояние пустого списка (пример) -->
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-dashed border-gray-300 dark:border-gray-700 p-8 text-center hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-14 w-14 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">{{ __("Авторы не найдены") }}</h3>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 max-w-md mx-auto">
                    {{ __("Попробуйте изменить параметры поиска или добавьте нового автора с помощью кнопки выше") }}
                </p>
                <button class="mt-4 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition-colors duration-200">
                    {{ __("Создать первого автора") }}
                </button>
            </div>

            <!-- Таблица авторов (заглушка) -->
            <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-xs">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __("Автор") }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __("Статус") }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __("Материалы") }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __("Действия") }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($authors as $author)
                            <!-- Пример строки автора -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-300 font-medium">
                                            {{ substr($author->name, 0, 2) }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $author->name }}
                                            </div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                {{ "@" . strtolower(str_replace(' ', '_', $author->name)) }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200">
                                        {{ __("Активен") }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center">
                                        <span class="mr-2">{{ $author->contents->count() }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('authors.show', $author->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 transition-colors duration-200 p-1 rounded-md hover:bg-indigo-50 dark:hover:bg-indigo-900/30">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('authors.edit', $author->id) }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300 transition-colors duration-200 p-1 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('Удалить автора?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 transition-colors duration-200 p-1 rounded-md hover:bg-red-50 dark:hover:bg-red-900/30">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>


                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Пагинация -->
            <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __("Показано") }} <span class="font-medium">1</span> {{ __("до") }} <span class="font-medium">10</span> {{ __("из") }} <span class="font-medium">24</span> {{ __("авторов") }}
                </div>
                <nav class="flex items-center space-x-1">
                    <button class="px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200">
                        {{ __("Назад") }}
                    </button>
                    <button class="px-3 py-1.5 rounded-lg border border-indigo-500 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300 font-medium">
                        1
                    </button>
                    <button class="px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                        2
                    </button>
                    <button class="px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                        3
                    </button>
                    <button class="px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                        {{ __("Вперед") }}
                    </button>
                </nav>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('openModalBtn').addEventListener('click', () => {
            document.getElementById('exampleModal').classList.remove('hidden');
        });

        document.querySelectorAll('#exampleModal button[type="button"]').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('exampleModal').classList.add('hidden');
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const openBtn = document.getElementById('openModalBtn');
            const modal = document.getElementById('exampleModal');

            // Обработчик открытия
            openBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            // Обработчик закрытия (для всех кнопок закрытия)
            modal.querySelectorAll('button[type="button"]').forEach(btn => {
                btn.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });
            });

            // Закрытие при клике на фон
            modal.addEventListener('click', (e) => {
                if (e.target === modal || e.target.classList.contains('modal-backdrop')) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>


</x-app-layout>