<div id="popup" class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="bg-gray-900 p-6 lg:p-8 relative w-4/5">
        <button type="button" class="absolute top-4 right-4 bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded">Close</button>
        <form action="/add_project" method="POST">
            @csrf
            <div class="mb-4">
                <label for="project_name" class="block text-gray-400">Project Name</label>
                <input type="text" id="project_name" name="project_name" class="w-full border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-800 text-white">
            </div>
            <div class="mb-4">
                <label for="domain_name" class="block text-gray-400">Domain Name</label>
                <input type="text" id="domain_name" name="domain_name" class="w-full border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-800 text-white">
            </div>
            <div class="mb-4">
                <label for="api_key" class="block text-gray-400">Telegram API Key</label>
                <input type="text" id="api_key" name="api_key" class="w-full border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-800 text-white">
            </div>
            <div class="mb-4">
                <label for="channel_id" class="block text-gray-400">Telegram Channel ID</label>
                <input type="text" id="channel_id" name="channel_id" class="w-full border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-800 text-white">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Submit</button>
        </form>
    </div>
</div>
