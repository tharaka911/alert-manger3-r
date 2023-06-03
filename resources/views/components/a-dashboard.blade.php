<div class="bg-gray-800 dark:bg-gray-900 p-6 lg:p-8">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 ml-2 rounded"
        style="float: right; margin-top: 10px;"> Add Project </button>
    <table class="min-w-full divide-y divide-gray-700 dark:divide-gray-600">
        <thead>
            <tr>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">No</th>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">Project Name</th>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">Domain Name</th>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">Date</th>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">API Key</th>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example project rows -->

            {{-- @foreach ($projects as $project) --}}
            <tr class="bg-gray-700 dark:bg-gray-800">
                <td class="py-4 px-6 text-gray-300 dark:text-gray-400">1</td>
                <td class="py-4 px-6 text-gray-300 dark:text-gray-400">Project 6</td>
                <td class="py-4 px-6 text-gray-300 dark:text-gray-400">example6.com</td>
                <td class="py-4 px-6 text-gray-300 dark:text-gray-400">May 31, 2023</td>
                <td class="py-4 px-6 text-gray-300 dark:text-gray-400">API Key 6 <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 ml-2 rounded">Copy</button>
                </td>
                <td class="py-4 px-6">
                    <button
                        class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded">Delete</button>
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 ml-2 rounded">Logs</button>
                </td>
            </tr>
            {{-- @endforeach --}}


        <tbody>
