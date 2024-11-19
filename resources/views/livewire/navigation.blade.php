<div>
    <header class="bg-black">

        <x-container class="px-4 py-4">

            <div class="flex justify-between items-center space-x-8">

                <button class="text-2xl">
                    <i class="fas fa-bars text-white"></i>
                </button>

                <div class="flex items-center space-x-2">
                    <a href="/">
                        <img src="{{ asset('storage/images/LogoNav.png') }}" alt="Neuma Racing" class="h-12">
                    </a>
                </div>

                <div class="flex-1 hidden md:block">
                    <x-input class="w-full" placeholder="Buscar por producto" />
                </div>

                <div class="flex space-x-8 items-center">
                    <button class="text-2xl md:text-3xl">
                        <i class="fas fa-user text-white"></i>
                    </button>

                    <button class="text-2xl md:text-3xl">
                        <i class="fas fa-shopping-cart text-white"></i>
                    </button>
                </div>

            </div>

            <div class="mt-4 md:hidden">
                <x-input class="w-full" placeholder="Buscar por producto" />
            </div>

        </x-container>

    </header>

    <div class="fixed top-0 left-0 inset-0 bg-black bg-opacity-25 z-10"></div>

    <div class="fixed top-0 left-0 z-20">

        <div class="flex">

            <div class="w-80 h-screen bg-white">

                <div class="bg-black px-4 py-3 text-white font-semibold">
                    <div class="flex justify-between items-center">

                        <span class="text-lg">
                            ¡Hola!
                        </span>

                        <button>
                            <i class="fas fa-times"></i>
                        </button>

                    </div>

                </div>

                <div class="h-[calc(100vh-52px) overflow-auto">

                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <a href=""
                                    class="flex item-center justify-between px-4 py-4 text-gray-700 hover:bg-gray-400">
                                    {{ $category->name }}

                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>

            </div>

            <div>

            </div>

        </div>

    </div>
</div>
