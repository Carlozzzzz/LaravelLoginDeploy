@include('partials.header')

    <section class=" h-[100vh] p-4" id="userCreate">
        <div class="max-w-sm rounded overflow-hidden shadow-lg mt-5 mx-auto">
            <img class="w-[200px] object-cover bg-gray-100 rounded-full m-4 mx-auto" src="{{ $data_recordfile->user_image }}" alt="User image">
            <div class="px-6 py-4">
                <div class="font-bold text-center text-xl mb-2">Edit User</div>
            </div>

            <form action="/user/update/{{ $data_recordfile->id }}" method="POST" enctype="multipart/form-data" class="px-6 py-4 border-t">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" placeholder="Enter your name" autocomplete="off" value="{{ old('name', $data_recordfile->name) }}">
                    @error('name')
                        <p class="text-red-400 text-xs px-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="emal" name="email" placeholder="Enter your email"  autocomplete="off" value="{{ old('email', $data_recordfile->email) }}">
                    @error('email')
                        <p class="text-red-400 text-xs px-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="userImage">
                    User Image
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="userImage" type="file" name="user_image" >
                    @error('user_image')
                    <p class="text-red-400 text-xs px-1">
                        {{ $message }}
                    </p>
                @enderror
                </div>
                <div class="flex justify-end">
                    <button type=submit class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Save</button>
                    <a href="/users" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ms-1">Cancel</a>
                </div>
            </form>
           
          </div>
          
    </section>
@include('partials.footer')

