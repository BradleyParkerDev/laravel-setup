<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Setup</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col items-center justify-center min-h-screen">

    <div class="text-center flex flex-col items-center">
        <!--  GIF -->
        <div x-data="confettiComponent()" class="w-auto h-auto">
            <img @click="startConfettiEffect" src="{{ asset('ElePHPant.gif') }}" alt="ElePHPant GIF" class="mb-6 w-48 h-auto mx-auto">
        </div>

        <!-- Dynamic Greeting -->
        <h1 class="text-4xl font-bold mb-4">{{ $greeting }}</h1>

        <!-- Counter with Increment/Decrement Buttons -->
        <div x-data="{ count: 0 }" class="mt-6">
            <span class="text-2xl font-semibold mb-4 block" x-text="count"></span>
            <div class="flex justify-center space-x-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded" @click="if (count > 0) count--">Decrement</button>
                <button class="bg-green-500 text-white px-4 py-2 rounded" @click="count++">Increment</button>
            </div>
        </div>
    </div>

    <script>
        // Define the Alpine.js component for confetti
        const confettiComponent = ()=> {
            return {
                startConfettiEffect() {
                    const duration = 15 * 1000; // Duration in milliseconds
                    const animationEnd = Date.now() + duration;
                    const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

                    const randomInRange = (min, max) => {
                        return Math.random() * (max - min) + min;
                    }

                    const interval = setInterval(() => {
                        const timeLeft = animationEnd - Date.now();

                        if (timeLeft <= 0) {
                            clearInterval(interval);
                            return;
                        }

                        const particleCount = 50 * (timeLeft / duration);
                        // Generate confetti from two origins
                        confetti({
                            ...defaults,
                            particleCount,
                            origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 },
                        });
                        confetti({
                            ...defaults,
                            particleCount,
                            origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 },
                        });
                    }, 250); // Trigger every 250ms
                }
            };
        }
    </script> 
</body>
</html>
