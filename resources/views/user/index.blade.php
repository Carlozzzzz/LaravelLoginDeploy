@include('partials.header')

<x-message />


<div class="header flex justify-end p-2 mt-2 relative">
    <a href="/user/create" class=" items-end bg-green-400 font-bold m-2 p-2 rounded hover:bg-green-600 ease-in-out duration-300"><i class='bx bxs-plus-circle text-lg'></i> Add User</a>
</div>


<section class="flex justify-center align-center p-4">
    <table class="bg-slate-100 w-full">
        <thead>
            <tr class="bg-slate-800 text-white font-bold">
                <td scope="col" class="p-4 border-2"></td>
                <td scope="col" class="p-4 border-2">Name</td>
                <td scope="col" class="p-4 border-2">Email</td>
                <td scope="col" class="p-4 border-2">Action</td>
            </tr>
        </thead>
        <tbody>
            @if (isset($data_datatablefile))
                @foreach ($data_datatablefile as $data)
                    <tr>
                        <td class="p-4 border-2">Thumbnail</td>
                        <td class="p-4 border-2">{{ $data->name }}</td>
                        <td class="p-4 border-2">{{ $data->email }}</td>
                        <td class="text-center align-middle border-2">
                            <div class="flex text-white font-bold uppercase p-4">
                                <a href="/user/edit/{{ $data->id }}" class="bg-blue-600 px-2.5 py-1 rounded">Edit</a>
                                <form action="/user/destroy/{{ $data->id }}" method="POST">
                                    @method('DELETE');
                                    @csrf
                                    <button class="bg-red-600 px-2.5 py-1 ms-0.5 rounded">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
    
        </tbody>
    </table>

</section>
@include('partials.footer')