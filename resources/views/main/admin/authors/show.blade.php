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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ __('Детально') }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Основная карточка автора -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <!-- Шапка профиля -->
                <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center">
                            <!-- Аватар автора -->
                            <div class="flex-shrink-0 h-16 w-16 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-300 text-2xl font-bold">
                                {{ substr($author->name, 0, 2) }}
                            </div>
                            <div class="ml-4">
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $author->name }}</h2>
                                <div class="mt-1 flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    <span class="flex items-center">
                                        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                        Добавлен: {{ $author->created_at->format('d.m.Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 sm:mt-0 flex space-x-3">
                            <a href="{{ route('authors.edit', $author) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Редактировать
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Основная информация -->
                <div class="px-6 py-5">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <!-- Блок с биографией -->
                        <div class="sm:col-span-2">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Биография</h3>
                            <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-4">
                                @if($author->bio)
                                <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $author->bio }}</p>
                                @else
                                <p class="text-gray-400 italic">Биография не указана</p>
                                @endif
                            </div>
                        </div>

                        <!-- Контактная информация -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Контактная информация</h3>
                            <div class="space-y-3">
                                @if($author->url)
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Ссылка на профиль</p>
                                    <a href="{{ $author->url }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline break-all">{{ $author->url }}</a>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Статистика -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Статистика</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Количество материалов</p>
                                    <p class="text-gray-900 dark:text-white font-medium">{{ $author->contents->count() }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Последнее обновление</p>
                                    <p class="text-gray-900 dark:text-white font-medium">{{ $author->updated_at->format('d.m.Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Материалы автора -->
                <div class="px-6 py-5 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Материалы автора</h3>

                    @if($author->contents->isEmpty())
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Нет материалов</h4>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Этот автор еще не создал ни одного материала.</p>
                    </div>
                    @else
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Название</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Дата создания</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Статус</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($author->contents as $content)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $content->title }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $content->created_at->format('d.m.Y') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200">Опубликовано</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>