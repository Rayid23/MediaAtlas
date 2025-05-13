<x-app-layout>
    <div class="py-8">
        <style>
            .form_label {
                position: relative;
                min-height: 88px;
            }

            .form_text {
                vertical-align: top;
                display: block;
                margin-bottom: 6px;
                font-weight: 500;
                font-size: 12px;
                line-height: 16px;
                letter-spacing: 0.04em;
                color: #686ea1;
            }

            .form_text:after {
                content: "*";
                position: relative;
                top: 0;
                font-size: 13px;
                color: #f00;
            }

            .form_label input,
            .field_multiselect {
                position: relative;
                width: 100%;
                display: block;
                min-height: 46px;
                border: 1px solid rgb(199, 191, 241);
                box-sizing: border-box;
                border-radius: 8px;
                padding: 12px 40px 10px 16px;
                font-size: 14px;
                color: rgb(9, 233, 20);
                outline-color: rgb(28, 67, 122);
            }

            .form_label input::placeholder,
            .field_multiselect::placeholder {
                color: rgb(197, 36, 31);
            }

            .form_label input:hover,
            .field_multiselect:hover {
                box-shadow: 0 0 2px rgba(0, 0, 0, 0.16);
            }

            .form_label input:focus,
            .field_multiselect:focus {
                box-shadow: 0 0 2px rgba(0, 0, 0, 0.16);
            }

            .field_multiselect_help {
                position: absolute;
                max-width: 100%;
                background-color: rgb(212, 187, 45);
                top: -48px;
                left: 0;
                opacity: 0;
            }

            .form_label input.error {
                border-color: #eb5757;
            }

            .error_text {
                color: #eb5757;
            }

            .field_multiselect {
                padding-right: 60px;
            }

            .field_multiselect:after {
                content: "";
                position: absolute;
                right: 14px;
                top: 15px;
                width: 6px;
                height: 16px;
                background: url("data:image/svg+xml,%3Csvg width='6' height='16' viewBox='0 0 6 16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M3 0L6 5H0L3 0Z' fill='%23A8ACC9'/%3E%3Cpath d='M3 16L6 11H0L3 16Z' fill='%23A8ACC9'/%3E%3C/svg%3E") 50% 50% no-repeat;
            }

            .multiselect_block {
                position: relative;
                width: 100%;
            }

            .field_select {
                position: absolute;
                top: calc(100% - 2px);
                left: 0;
                width: 100%;
                border: 2px solid rgb(28, 67, 122);
                border-bottom-right-radius: 2px;
                border-bottom-left-radius: 2px;
                box-sizing: border-box;
                outline-color: rgb(28, 67, 122);
                z-index: 6;
                background-color: #686ea1;
            }

            .field_select[multiple] {
                overflow-y: auto;
            }

            .field_select option {
                display: block;
                padding: 8px 16px;
                width: calc(370px - 32px);
                cursor: pointer;
            }

            .field_select option:checked {
                background-color: rgb(28, 67, 122);
            }

            .field_select option:hover {
                background-color: rgb(28, 67, 122);
            }

            .field_multiselect button {
                position: relative;
                padding: 7px 34px 7px 8px;
                background: rgb(28, 67, 122);
                border-radius: 4px;
                margin-right: 9px;
                margin-bottom: 10px;
            }

            .field_multiselect button:hover,
            .field_multiselect button:focus {
                background-color: rgb(28, 67, 122);
            }

            .field_multiselect button:after {
                content: "";
                position: absolute;
                top: 7px;
                right: 10px;
                width: 16px;
                height: 16px;
                background: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M19.4958 6.49499C19.7691 6.22162 19.7691 5.7784 19.4958 5.50504C19.2224 5.23167 18.7792 5.23167 18.5058 5.50504L12.5008 11.5101L6.49576 5.50504C6.22239 5.23167 5.77917 5.23167 5.50581 5.50504C5.23244 5.7784 5.23244 6.22162 5.50581 6.49499L11.5108 12.5L5.50581 18.505C5.23244 18.7784 5.23244 19.2216 5.50581 19.495C5.77917 19.7684 6.22239 19.7684 6.49576 19.495L12.5008 13.49L18.5058 19.495C18.7792 19.7684 19.2224 19.7684 19.4958 19.495C19.7691 19.2216 19.7691 18.7784 19.4958 18.505L13.4907 12.5L19.4958 6.49499Z' fill='%234F5588'/%3E%3C/svg%3E") 50% 50% no-repeat;
                background-size: contain;
            }

            .multiselect_label {
                position: absolute;
                top: 1px;
                left: 2px;
                width: 100%;
                height: 44px;
                cursor: pointer;
                z-index: 3;
            }

            .field_select {
                display: none;
            }

            input.multiselect_checkbox {
                position: absolute;
                right: 0;
                top: 0;
                width: 40px;
                height: 40px;
                border: none;
                opacity: 0;
            }

            .multiselect_checkbox:checked~.field_select {
                display: block;
            }

            .multiselect_checkbox:checked~.multiselect_label {
                width: 40px;
                left: initial;
                right: 4px;
                background: rgb(28, 67, 122) url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M19.4958 6.49499C19.7691 6.22162 19.7691 5.7784 19.4958 5.50504C19.2224 5.23167 18.7792 5.23167 18.5058 5.50504L12.5008 11.5101L6.49576 5.50504C6.22239 5.23167 5.77917 5.23167 5.50581 5.50504C5.23244 5.7784 5.23244 6.22162 5.50581 6.49499L11.5108 12.5L5.50581 18.505C5.23244 18.7784 5.23244 19.2216 5.50581 19.495C5.77917 19.7684 6.22239 19.7684 6.49576 19.495L12.5008 13.49L18.5058 19.495C18.7792 19.7684 19.2224 19.7684 19.4958 19.495C19.7691 19.2216 19.7691 18.7784 19.4958 18.505L13.4907 12.5L19.4958 6.49499Z' fill='%234F5588'/%3E%3C/svg%3E") 50% 50% no-repeat;
            }

            .multiselect_checkbox:checked~.field_multiselect_help {
                opacity: 1;
            }
        </style>
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
                <form action="{{ route('authors.update', $author->id) }}" method="POST" class="divide-y divide-gray-200 dark:divide-gray-700">
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

                        <div class="form_label">
                            <span class="form_text">Your technology</span>
                            <div class="multiselect_block">
                                <label for="select-1" class="field_multiselect">Technology</label>
                                <input id="checkbox-1" class="multiselect_checkbox" type="checkbox">
                                <label for="checkbox-1" class="multiselect_label"></label>
                                <select id="select-1" class="field_select" name="contents[]" multiple style="@media (min-width: 768px) { height: calc(4 * 38px)}">
                                    @foreach ($contents as $content)
                                        <option value="{{ $content->id }}">{{ $content->title }}</option>
                                    @endforeach
                                </select>
                                <span class="field_multiselect_help">You can select several items by pressing <b>Ctrl(or Command)+Element</b></span>
                            </div>
                            <span class="error_text"></span>
                        </div>

                        <script>
                            let multiselect_block = document.querySelectorAll(".multiselect_block");
                            multiselect_block.forEach(parent => {
                                let label = parent.querySelector(".field_multiselect");
                                let select = parent.querySelector(".field_select");
                                let text = label.innerHTML;
                                select.addEventListener("change", function(element) {
                                    let selectedOptions = this.selectedOptions;
                                    label.innerHTML = "";
                                    for (let option of selectedOptions) {
                                        let button = document.createElement("button");
                                        button.type = "button";
                                        button.className = "btn_multiselect";
                                        button.textContent = option.value;
                                        button.onclick = _ => {
                                            option.selected = false;
                                            button.remove();
                                            if (!select.selectedOptions.length) label.innerHTML = text
                                        };
                                        label.append(button);
                                    }
                                })
                            })
                        </script>

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

</x-app-layout>