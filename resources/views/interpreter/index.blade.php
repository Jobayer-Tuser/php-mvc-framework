<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/code-editor.svg">
    <title>Online PHP Editor - Execute PHP Code online and generate output.</title>
    <meta name="title" content="Online PHP Editor - Execute PHP Code online and generate output." />
    <meta name="description" content="Execute simple PHP Code online and generate output. Built with Core PHP." />

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fira-code:500,600" rel="stylesheet" />

    <script src="dist/js/compiler.js"></script>
    <link rel="stylesheet" href="/dist/css/tailwind.css" />

</head>

<body class="antialiased font-mono min-h-screen flex flex-col bg-slate-800 text-white">
<header class="max-w-7xl mx-auto px-6 md:px-8 py-8 flex items-center justify-between w-full">
    <a href="index.php" class="flex items-center gap-x-4">
        <h1 class="text-lg font-medium">
            Online PHP Editor
        </h1>
    </a>

    <nav class="flex items-center gap-x-8">
        <a href="https://github.com/me-shaon/online-php-editor" target="_blank" title="GitHub">
            <img class="w-8 h-8" src="assets/img/github-mark-white.png" alt="GitHub">
        </a>
    </nav>
</header>

<main class="max-w-7xl mx-auto px-6 md:px-8 flex-1 w-full flex flex-col">
    <div class="grid grid-cols-2 gap-x-10 flex-1 mt-5 pb-5">
        <div class="gap-y-4 flex flex-col">
            <div class="flex items-center justify-between">
                <p class="font-medium">
                    Write some PHP code in the editor below and run:
                </p>

                <button id="runButton" class="bg-white rounded-xl text-md text-gray-900 px-4 py-px">Run</button>
            </div>

            <div id="editor" class="flex-1 border border-slate-100 rounded-lg overflow-hidden"></div>
        </div>

        <div class="gap-y-4 flex flex-col">
            <p class="font-medium">
                See the output here:
            </p>

            <div class="relative bg-editor flex-1 border border-slate-100 rounded-lg" id="output-wrapper">
                <div role="status" id="loader" class="absolute inset-0 bg-opacity-50 flex items-center justify-center" style="display: none;">
                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-purple-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>

                <div id="error" class="absolute text-red-600 inset-0 p-6 rounded-lg" style="display: none;">
                    <p class="font-bold">
                        Error:
                    </p>

                    <p id="error-message" class="mt-2 font-mono text-sm"></p>
                </div>

                <div class="h-full p-6" id="output"></div>
            </div>
        </div>
    </div>
</main>

<footer class="py-4 px-6 md:px-8 text-xs">
    <p class="text-center">
        Developed and maintained by <a href="" class="underline" target="_blank">Md. Jobayer Al Mahmud</a>. Copyright &copy; <?= date('Y') ?>.
    </p>
</footer>

</body>
</html>