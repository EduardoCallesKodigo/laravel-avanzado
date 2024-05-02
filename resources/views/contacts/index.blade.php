<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contacts List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="mb-4">
                        <a href="{{ route('contacts.create') }}" class="bg-green-500 dark:bg-green-700 hover:bg-green-600 dark:hover:bg-green-800 text-white font-bold py-2 px-4 rounded">Create Contact</a>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">NAME</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">AGE</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">EMAIL</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $contact->id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $contact->name }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $contact->age }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $contact->email }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <div>
                                        <a href="{{ route('contacts.edit', $contact->id) }}" class="bg-yellow-500 dark:bg-yellow-700 hover:bg-yellow-600 dark:hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                        <button type="button" onclick="confirmDelete('{{ $contact->id }}')" class="bg-red-400 dark:bg-red-600 hover:bg-red-500 dark:hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id){
        alertify.confirm("This is a confirm dialog.",
        function(e){
            if(e) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = `/contacts/${id}`;
                form.innerHTML = '@csrf @method("DELETE")';
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
