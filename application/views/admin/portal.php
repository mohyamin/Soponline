    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>
            Interactive Landing Page with App Cards
        </title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }

            @keyframes fadeInDown {
                0% {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fadeInUp {
                0% {
                    opacity: 0;
                    transform: translateY(20px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fadeInDown {
                animation: fadeInDown 0.8s ease forwards;
            }

            .animate-fadeInUp {
                animation: fadeInUp 0.8s ease forwards;
            }
        </style>
    </head>

    <body class="bg-gray-50 min-h-screen flex flex-col">
        <header class="bg-white shadow sticky top-0 z-50">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <nav class="space-x-6 hidden md:flex">
                    <a class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300" href="#apps">Apps</a>
                    <a class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300" href="#about">About</a>
                    <a class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300" href="#contact">Contact</a>
                </nav>
                <button aria-label="Toggle menu" class="md:hidden text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-600 rounded" id="menu-btn">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
            </div>
            <div class="hidden md:hidden bg-white px-6 pb-4" id="mobile-menu">
                <a class="block py-2 text-gray-700 hover:text-blue-600 font-medium" href="#apps">Apps</a>
                <a class="block py-2 text-gray-700 hover:text-blue-600 font-medium" href="#about">About</a>
                <a class="block py-2 text-gray-700 hover:text-blue-600 font-medium" href="#contact">Contact</a>
            </div>
        </header>

        <main class="flex-grow container mx-auto px-6 py-12">
            <section class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4 animate-fadeInDown">
                    Welcome to Our Application Portal
                </h2>
                <p class="text-gray-700 text-lg animate-fadeInUp">
                    Portal yang menyediakan seluruh aplikasi internal Bank of India Indonesia
                </p>
            </section>

            <!-- Card App -->
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="apps">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transform transition-transform duration-300 hover:scale-105 focus:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 cursor-pointer"
                    onclick="redirectToLogin()" role="button" tabindex="0">
                    <img class="w-full h-48 object-cover" src="https://storage.googleapis.com/a1aa/image/89254774-4a16-4d6f-2c87-33315ad481e7.jpg" alt="Dashboard App Preview" />
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-semibold mb-2 text-gray-900">
                            SOP Online
                        </h3>
                        <p class="text-gray-700 flex-grow">
                            Seluruh SOP dan kebijakan disimpan disini
                        </p>
                        <button onclick="window.location.href='<?= site_url('login') ?>'">
                            Go to Login
                        </button>

                    </div>
                </div>
            </section>

            <section class="mt-20 max-w-4xl mx-auto text-center px-4" id="about">
                <h2 class="text-3xl font-bold text-gray-900 mb-6 animate-fadeInUp">
                    About Our Apps
                </h2>
                <p class="text-gray-700 text-lg leading-relaxed animate-fadeInUp" style="animation-delay: 0.2s;">
                    All our applications are developed using CodeIgniter 3, ensuring a lightweight, fast, and secure experience.
                </p>
            </section>

            <section class="mt-20 max-w-4xl mx-auto text-center px-4" id="contact">
                <h2 class="text-3xl font-bold text-gray-900 mb-6 animate-fadeInUp">
                    Contact Us
                </h2>
                <p class="text-gray-700 text-lg mb-6 animate-fadeInUp" style="animation-delay: 0.2s;">
                    Have questions or want to learn more? Reach out to us anytime!
                </p>
                <a class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded focus:outline-none focus:ring-4 focus:ring-blue-400 transition animate-fadeInUp"
                    href="mailto:contact@myapps.com">
                    <i class="fas fa-envelope mr-2"></i>
                    Email Us
                </a>
            </section>
        </main>

        <footer class="bg-white border-t mt-20 py-6">
            <div class="container mx-auto px-6 text-center text-gray-600 text-sm select-none">
                © 2025 IT Division. All rights reserved.
            </div>
        </footer>

        <script>
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // fungsi redirect khusus login
            function redirectToLogin() {
                window.location.href = "<?= site_url('login') ?>";
            }
        </script>
    </body>

    </html>