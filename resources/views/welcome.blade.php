<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancun Music Festival</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <header class="sticky top-0 shadow bg-gray-900 text-white">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a href="/" class="flex items-center mb-4 md:mb-0">
                <img class="h-8 pr-3"
                    src="https://static.vecteezy.com/system/resources/previews/011/571/244/original/circle-flag-of-mexico-free-png.png"
                    alt="Cancun Music Festival">
                <span class="font-semibold text-xl tracking-tight">Cancun Music Festival</span>
            </a>

            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a href="#registration-form" class="mx-5 hover:underline">Register</a>
                <a href="{{ route('login') }}" class="mx-5 hover:underline">Login</a>
            </nav>
        </div>
    </header>

    @if ($message = Session::get('success'))
        <div class="p-4 mb-4 text-sm text-green-800 text-center rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-bold">{{ $message }}</span>
        </div>
    @endif
    @error('email')
        <div class="p-4 mb-4 text-sm text-red-800 text-center rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="font-bold">{{ $message }} Try a different one!</span>
        </div>
    @enderror
    @error('phone')
        <div class="p-4 mb-4 text-sm text-red-800 text-center rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="font-bold">{{ $message }}</span>
        </div>
    @enderror

    <main class="container mx-auto py-10 px-5">
        <h1 class="text-4xl font-bold mb-10">Welcome to the Cancun Music Festival!</h1>

        <p class="text-lg mb-8">
            Join us for a weekend of amazing music from top international artists, surrounded by the stunning beauty of
            Cancun. Over 30 musical groups are performing!
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 py-5">
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img class="w-full h-64 object-cover"
                    src="https://images.unsplash.com/photo-1562359326-f3d6633d3517?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"
                    alt="Artist">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Artist 1</h2>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et lacus eget libero consectetur
                        sagittis.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img class="w-full h-64 object-cover"
                    src="https://images.unsplash.com/photo-1616534697074-a39246667cb7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1480&q=80"
                    alt="Artist">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Artist 2</h2>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et lacus eget libero consectetur
                        sagittis.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img class="w-full h-64 object-cover"
                    src="https://images.unsplash.com/photo-1520224327482-f7863d2c3865?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"
                    alt="Artist">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Artist 3</h2>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et lacus eget libero consectetur
                        sagittis.
                    </p>
                </div>
            </div>
        </div>

        <div class="my-10">
            <h2 class="text-2xl font-bold mb-5">About the Festival</h2>

            <p class="text-lg text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, aspernatur
                incidunt voluptatum hic deleniti, eius et voluptates nihil nostrum repellendus optio. Temporibus maxime
                minima beatae
                perspiciatis voluptatem fuga, harum obcaecati? Proin consectetur quam eget facilisis gravida. Sed eget
                placerat est, a posuere nulla. Praesent porta tristique nulla velinterdum.
                Morbi a arcu eu enim pellentesque malesuada. Duis quis dui vel augue pharetra suscipit. Donec vitae
                libero ac leo tempor sodales.</p>
        </div>

        <div class="my-10" id="registration-form">
            <h2 class="text-2xl font-bold mb-5">Register Now!</h2>
            <p class="text-lg text-gray-700">This year's Cacun Music Festival is FREE, but registration is required to
                attend. Please fill out the form below to register for the event.</p>
            <div class="mt-5 border border-gray-200 rounded-lg shadow p-7">
                <form action="{{ route('guests.store') }}" method="POST" class="grid md:grid-cols-3 md:gap-5">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-lg font-bold mb-2">Full Name</label>
                        <input type="text" id="name" name="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-lg font-bold mb-2">Email</label>
                        <input type="email" id="email" name="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 text-lg font-bold mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('phone') }}" required>
                    </div>
                    <div class="flex items-center justify-center md:col-span-3">
                        <button type="submit"
                            class="px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-700">Register Now</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-10">
        <div class="container mx-auto text-center">
            <p class="text-lg">© 2023 Cacun Music Festival. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
