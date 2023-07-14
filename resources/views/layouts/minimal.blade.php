<x-layouts.base>
    <div class="flex flex-col justify-center min-h-full px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            {{-- <div class="w-24 h-24 mx-auto text-primary">
                <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z"></path>
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z"></path>
                </svg>
            </div> --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mx-auto text-primary" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 15h-6.5a2.5 2.5 0 1 1 0 -5h.5"></path>
                <path d="M15 12v6.5a2.5 2.5 0 1 1 -5 0v-.5"></path>
                <path d="M12 9h6.5a2.5 2.5 0 1 1 0 5h-.5"></path>
                <path d="M9 12v-6.5a2.5 2.5 0 0 1 5 0v.5"></path>
            </svg>
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mx-auto text-primary" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 21l18 0"></path>
                <path d="M5 21v-14l8 -4v18"></path>
                <path d="M19 21v-10l-6 -4"></path>
                <path d="M9 9l0 .01"></path>
                <path d="M9 12l0 .01"></path>
                <path d="M9 15l0 .01"></path>
                <path d="M9 18l0 .01"></path>
            </svg> --}}
            <h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-center text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="link">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex justify-center w-full px-3 py-3 text-sm font-medium leading-6 text-white rounded-md shadow-sm bg-primary-light hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
                <div>
                    <button type="submit" class="flex justify-center w-full px-3 py-3 text-sm font-medium leading-6 text-white rounded-md shadow-sm bg-primary hover:bg-primary-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
                <div>
                    <button type="submit" class="flex justify-center w-full px-3 py-3 text-sm font-medium leading-6 text-white rounded-md shadow-sm bg-primary-dark hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>

            <p class="mt-10 text-sm text-center text-gray-500">
                Not a member?
                <a href="#" class="font-medium leading-6 text-primary-light hover:text-indigo-500">Start a 14 day free trial</a>
            </p>
            <p class="mt-2 text-sm text-center text-gray-500">
                Not a member?
                <a href="#" class="link">Start a 14 day free trial</a>
            </p>
        </div>
        <div class="flex flex-col items-center justify-center">
            <div class="font-thin">thin</div>
            <div class="font-extralight">extralight</div>
            <div class="font-light">light</div>
            <div class="font-normal text-primary">normal</div>
            <div class="font-medium text-primary">medium</div>
            <div class="font-semibold text-primary">semibold</div>
            <div class="font-bold text-orange-500">bold</div>
            <div class="font-extrabold">extrabold</div>
            <div class="font-black">black</div>
        </div>
    </div>

</x-layouts.base>
