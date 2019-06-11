<html lang="en" class="bg-white antialiased">
<head>
    <title>Test a Webhook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body class="leading-normal">


<header class="flex bg-white border-b border-gray-200 fixed top-0 inset-x-0 z-100 h-16 items-center">
    <div class="w-full mx-auto px-6">
        <div class="flex items-center">
            <div class="w-full sm:w-1/4 xl:w-1/5 pr-6 lg:pr-8">
                <div class="flex items-center">
                    <a href="/" class="block lg:mr-4">
                        @include('logo')
                    </a>
                </div>
            </div>
            <div class="flex flex-grow lg:w-3/4 xl:w-4/5">
                <div class="w-full lg:px-6 xl:w-3/4 xl:px-12">
                    @livewire('endpoint-url', $uuid)
                </div>
            </div>
        </div>
    </div>
</header>

<main class="flex flex-wrap px-6 h-screen pt-16">
    <div class="w-full sm:w-2/6 bg-gray-500">
        @livewire('endpoint-requests', $uuid)
    </div>
    <div class="w-full sm:w-4/6 bg-gray-400">
        {{--        @livewire('endpointRequestDetails', $uuid)--}}
    </div>
</main>

<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@livewireAssets
</body>
</html>
