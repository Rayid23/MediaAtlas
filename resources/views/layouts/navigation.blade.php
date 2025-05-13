<nav x-data="{ open: false }" class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm border-b border-gray-100 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Логотип и основное меню -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('admin.dashboard') }}" class="shrink-0 group" aria-label="Dashboard">
                    <x-application-logo class="h-9 w-auto text-gray-900 dark:text-gray-50 group-hover:scale-105 transition-transform duration-300" />
                </a>

                <!-- Основные разделы -->
                <div class="hidden sm:flex space-x-1">
                    <x-nav-link
                        :href="route('admin.dashboard')"
                        :active="request()->routeIs('admin.dashboard')"
                        class="px-4 py-2 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200"
                        active-class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold"
                        inactive-class="text-gray-600 dark:text-gray-300">
                        {{ __('Главная') }}
                    </x-nav-link>
                    <x-nav-link
                        :href="route('authors.index')"
                        :active="request()->routeIs('authors.index')"
                        class="px-4 py-2 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200"
                        active-class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold"
                        inactive-class="text-gray-600 dark:text-gray-300">
                        {{ __('Авторы') }}
                    </x-nav-link>
                    <x-nav-link
                        :href="route('categories.index')"
                        :active="request()->routeIs('categories.index')"
                        class="px-4 py-2 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200"
                        active-class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold"
                        inactive-class="text-gray-600 dark:text-gray-300">
                        {{ __('Категории') }}
                    </x-nav-link>
                    <x-nav-link
                        :href="route('genres.index')"
                        :active="request()->routeIs('genres.index')"
                        class="px-4 py-2 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200"
                        active-class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold"
                        inactive-class="text-gray-600 dark:text-gray-300">
                        {{ __('Жанры') }}
                    </x-nav-link>
                    <x-nav-link
                        :href="route('admin.dashboard')"
                        :active="request()->routeIs('admin.dashboard')"
                        class="px-4 py-2 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200"
                        active-class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold"
                        inactive-class="text-gray-600 dark:text-gray-300">
                        {{ __('Контенты') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Личный кабинет -->
            <div class="hidden sm:flex items-center">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-100/70 dark:bg-gray-800/70 hover:bg-gray-200/70 dark:hover:bg-gray-700/70 border border-gray-200/50 dark:border-gray-700/50 transition-all duration-200 hover:shadow-sm group">
                            <span class="truncate max-w-[160px]">{{ Auth::user()->name }}</span>
                            <svg class="ml-2 h-4 w-4 text-gray-500 dark:text-gray-400 group-hover:text-gray-600 dark:group-hover:text-gray-300 transition-transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="py-1 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-900">
                        <x-dropdown-link :href="route('profile.edit')" class="px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            {{ __('Настройки профиля') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="px-4 py-2 text-red-600 hover:bg-red-50/50 dark:hover:bg-red-900/20 transition-colors">
                                {{ __('Выйти') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Мобильное меню (кнопка) -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none transition-colors duration-200" aria-label="Открыть меню">
                    <svg class="h-6 w-6 transition-transform duration-300" :class="{ 'rotate-90': open }" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Мобильное меню (контент) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden hidden bg-white/95 dark:bg-gray-900/95 backdrop-blur-sm border-t border-gray-100 dark:border-gray-800 transition-all duration-300">
        <div class="pt-2 pb-2 space-y-1 px-2">
            <x-responsive-nav-link
                :href="route('admin.dashboard')"
                :active="request()->routeIs('admin.dashboard')"
                class="px-4 py-3 rounded-lg font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors"
                active-class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold">
                {{ __('Обзор панели') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                :href="route('authors.index')"
                :active="request()->routeIs('authors.index')"
                class="px-4 py-3 rounded-lg font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors"
                active-class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold">
                {{ __('Авторы') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                :href="route('genres.index')"
                :active="request()->routeIs('genres.index')"
                class="px-4 py-3 rounded-lg font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors"
                active-class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold">
                {{ __('Жанры') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                :href="route('categories.index')"
                :active="request()->routeIs('categories.index')"
                class="px-4 py-3 rounded-lg font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors"
                active-class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold">
                {{ __('Категории') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link
                :href="route('admin.dashboard')"
                :active="request()->routeIs('admin.dashboard')"
                class="px-4 py-3 rounded-lg font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors"
                active-class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold">
                {{ __('Контенты') }}
            </x-responsive-nav-link>
        </div>

        <!-- Профиль пользователя -->
        <div class="pt-3 pb-2 border-t border-gray-100/50 dark:border-gray-800/50">
            <div class="px-4 py-3">
                <div class="text-base font-semibold text-gray-900 dark:text-white truncate">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-1 space-y-1 px-2">
                <x-responsive-nav-link
                    :href="route('profile.edit')"
                    class="px-4 py-3 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    {{ __('Редактировать профиль') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="px-4 py-3 rounded-lg text-red-600 hover:bg-red-50/50 dark:hover:bg-red-900/20 transition-colors">
                        {{ __('Выход из системы') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>