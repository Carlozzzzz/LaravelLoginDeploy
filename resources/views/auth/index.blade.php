@include('auth.partials.header')

<section class="h-[100vh] ">
    <div class="flex flex-col items-center bg-gray-100 h-full w-full pt-10">
        <div class="min-w-[400px] bg-gray-200 h-auto rounded border-2 border-gray-300">
            <div class="login-header bg-gray-700 text-white text-center font-bold text-2xl p-4">
                <h1>Login Page</h1>
            </div>
            <div class="login-content p-4">
                <form action="/login/process" method="POST">
                    @csrf
                    <div class="input-group px-10 py-4 flex flex-wrap justify-between items-center text-xl">
                        <label class="w-[30%] " for="email">Email : </label>
                        <input class="w-[68%] text-gray-500  rounded focus:outline-none border-2 border-gray-400 p-1" type="email" class="border-2" name="email" value="{{ old('email')}}">
                        @error('email')
                            <p class="text-red-500 text-xs p-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="input-group px-10 py-4 flex flex-wrap justify-between items-center text-xl">
                        <label class="w-[30%] " for="email">Password : </label>
                        <input class="w-[68%] text-gray-500  rounded focus:outline-none border-2 border-gray-400 p-1" type="password" class="border-2" name="password" value="{{ old('password')}}">
                        @error('password')
                            <p class="text-red-500 text-xs p-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="button-group text-center mt-2">
                        <button type="submit" class="bg-blue-600 px-7 py-3 text-white text-lg font-bold rounded">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('auth.partials.footer')