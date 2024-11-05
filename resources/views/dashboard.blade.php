<x-app-layout> <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Subscription') }} </h2> </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">

                <div class="mt-4">
                    <div class="grid grid-cols-4 gap-4">
                        <div class="shadow-md border rounded-2xl p-8 bg-white">
                            <div class="flex justify-between">
                                <h2 class="font-bold text-2xl">Basic monthly plan</h2>
                                <h2>$10.00/month</h2>
                            </div>
                            <div class="mt-4">
                                <x-paddle-button :checkout="$basicMonthly" class="p-4 w-full rounded-xl bg-sky-500 text-white">
                                    Subscribe
                                </x-paddle-button>
                            </div>
                        </div>

                        <div class="shadow-md border rounded-2xl p-8 w-full bg-white">
                            <div class="flex justify-between">
                                <h2 class="font-bold text-2xl">Basic yearly plan</h2>
                                <h2>$8.00/month</h2>
                            </div>
                            <div class="mt-4">
                                <x-paddle-button :checkout="$basicYearly" class="p-4 w-full rounded-xl bg-sky-500 text-white">
                                    Subscribe
                                </x-paddle-button>
                            </div>
                        </div>

                        <div class="shadow-md border rounded-2xl p-8 w-full bg-white">
                            <div class="flex justify-between">
                                <h2 class="font-bold text-2xl">Pro Monthly plan</h2>
                                <h2>25.00/month</h2>
                            </div>

                            <div class="mt-4">
                                <x-paddle-button :checkout="$proMonthly" class="p-4 w-full rounded-xl bg-sky-500 text-white">
                                    Subscribe
                                </x-paddle-button>
                            </div>
                        </div>

                        <div class="shadow-md border rounded-2xl p-8 w-full bg-white">
                            <div class="flex justify-between">
                                <h2 class="font-bold text-2xl">Pro yearly plan</h2>
                                <h2>$20.00/year</h2>
                            </div>

                            <div class="mt-4">
                                <x-paddle-button :checkout="$proYearly" class="p-4 w-full rounded-xl bg-sky-500 text-white">
                                    Subscribe
                                </x-paddle-button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
