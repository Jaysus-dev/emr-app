<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div
            class="grid grid-cols-1 md:grid-cols-[2fr_1.3fr] grid-col w-full max-w-4xl shadow-lg h-[550px] rounded-lg overflow-hidden"
        >
            <!-- Left Column: Carousel / Images -->
            <div class="bg-gray-200 relative overflow-hidden">
                <!-- Example: Carousel / images -->
                <img
                    src="https://via.placeholder.com/800x600"
                    alt="News Image"
                    class="object-cover w-full h-full"
                />
                <div
                    class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4 text-center"
                >
                    <h2 class="font-bold text-lg">Latest News</h2>
                    <p class="text-sm">
                        This is your EMR news or carousel section.
                    </p>
                </div>
            </div>

            <!-- Right Column: Login Card -->
            <div class="flex items-center justify-center bg-white p-8">
                <div class="w-full max-w-md flex flex-col justify-center">
                    <h1 class="text-2xl font-bold text-center mb-6">
                        EMR Login
                    </h1>
                    <form class="space-y-4">
                        <input
                            type="text"
                            placeholder="Username"
                            class="w-full p-3 border rounded"
                        />
                        <input
                            type="password"
                            placeholder="Password"
                            class="w-full p-3 border rounded"
                        />
                        <button
                            type="submit"
                            class="w-full bg-blue-600 text-white p-3 rounded hover:bg-blue-700"
                        >
                            Login
                        </button>
                    </form>
                    <p class="text-center text-sm text-gray-500 mt-4">
                        © 2026 Your EMR System
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
