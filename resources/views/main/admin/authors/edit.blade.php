<x-app-layout>
    <div class="py-8">
        <!-- Улучшенные хлебные крошки с визуальными подсказками -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('authors.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white transition-colors duration-150">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            {{ __('Все авторы') }}
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('authors.show', $author) }}" class="ml-1 text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white transition-colors duration-150">
                                {{ $author->name }}
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ __('Редактирование') }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Основная форма редактирования -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <!-- Заголовок формы с иконкой -->
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                    <div class="flex items-center">
                        <div class="p-2 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('Редактирование автора') }}</h2>
                    </div>
                </div>

                <!-- Форма с четкой структурой -->
                <form action="{{ route('authors.update', $author) }}" method="POST" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @csrf
                    @method('PUT')

                    <div class="px-6 py-5 space-y-6">
                        <!-- Поле имени -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                {{ __('Имя автора') }} <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" required
                                class="block w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-600 dark:focus:border-blue-600 transition-all duration-200 @error('name') border-red-300 @enderror">
                            @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Поле ссылки -->
                        <div>
                            <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                {{ __('Ссылка на профиль') }}
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="url" name="url" id="url" value="{{ old('url', $author->url) }}"
                                    class="block w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-600 dark:focus:border-blue-600 transition-all duration-200 @error('url') border-red-300 @enderror"
                                    placeholder="https://example.com/author">
                                @error('url')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Мультиселект контентов -->
                        <div class="mt-6"
                            data-selected='@json($author->contents->map(function($content) { return ["id" => $content->id, "title" => $content->title]; }))'
                            data-contents='@json($contents->map(function($content) { return ["id" => $content->id, "title" => $content->title]; }))'>

                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                {{ __('Связанные материалы') }}
                            </label>

                            <!-- Контейнер выбора с четкой визуальной обратной связью -->
                            <div class="relative">
                                <!-- Поле ввода с индикатором выбранных элементов -->
                                <div class="flex items-center flex-wrap gap-2 p-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 min-h-[42px]">
                                    <!-- Выбранные элементы (чипсы) -->
                                    <template x-for="(item, index) in selectedContents" :key="item.id">
                                        <div class="flex items-center px-3 py-1 bg-blue-50 dark:bg-blue-900/30 rounded-full text-sm text-blue-700 dark:text-blue-300">
                                            <span x-text="escapeHtml(content.title)"></span>
                                            <button @click="removeContent(index)" type="button" class="ml-2 text-blue-500 hover:text-blue-700 dark:hover:text-blue-200">
                                                &times;
                                            </button>
                                        </div>
                                    </template>

                                    <!-- Поле поиска -->
                                    <input x-model="searchQuery"
                                        @click="showDropdown = true"
                                        @keydown.escape="showDropdown = false"
                                        type="text"
                                        class="flex-grow px-2 py-1 bg-transparent border-0 focus:ring-0 focus:outline-none min-w-[100px]"
                                        placeholder="{{ $contents->isEmpty() ? 'Нет доступных материалов' : 'Поиск материалов...' }}"
                                        :disabled="{{ $contents->isEmpty() ? 'true' : 'false' }}">
                                </div>

                                <!-- Выпадающий список с материалами -->
                                <div x-show="showDropdown"
                                    @click.away="showDropdown = false"
                                    class="absolute z-10 mt-1 w-full bg-white dark:bg-gray-800 shadow-lg rounded-md border border-gray-200 dark:border-gray-700 max-h-60 overflow-auto">
                                    <!-- Состояние загрузки -->
                                    <div x-show="isLoading" class="p-4 text-center text-gray-500">
                                        Загрузка...
                                    </div>

                                    <!-- Состояние пустого списка -->
                                    <div x-show="!isLoading && filteredContents.length === 0" class="p-4 text-center text-gray-500">
                                        Материалы не найдены
                                    </div>

                                    <!-- Список материалов -->
                                    <template x-for="content in filteredContents" :key="content.id">
                                        <div @click="toggleContent(content)"
                                            class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer flex items-center"
                                            :class="{ 'bg-blue-50 dark:bg-blue-900/30': isSelected(content) }">
                                            <input type="checkbox"
                                                class="h-4 w-4 text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500"
                                                :checked="isSelected(content)"
                                                readonly>
                                            <span class="ml-3 text-sm text-gray-700 dark:text-gray-300" x-text="content.title"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Скрытые input'ы для формы -->
                            <template x-for="content in selectedContents" :key="content.id">
                                <input type="hidden" name="contents[]" :value="content.id">
                            </template>

                            <!-- Подсказка -->
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Выберите материалы, связанные с этим автором
                            </p>
                        </div>


                        <!-- Поле биографии -->
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                {{ __('Биография') }}
                            </label>
                            <textarea id="bio" name="bio" rows="4"
                                class="block w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-600 dark:focus:border-blue-600 transition-all duration-200 @error('bio') border-red-300 @enderror">{{ old('bio', $author->bio) }}</textarea>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ __('Максимум 500 символов') }}</p>
                            @error('bio')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Футер формы с кнопками действий -->
                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/30 border-t border-gray-200 dark:border-gray-700 flex justify-between">
                        <a href="{{ route('authors.show', $author) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            {{ __('Отмена') }}
                        </a>
                        <div class="flex space-x-3">
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                {{ __('Предпросмотр') }}
                            </button>
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                {{ __('Сохранить изменения') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
       
    </script>
    
</x-app-layout>