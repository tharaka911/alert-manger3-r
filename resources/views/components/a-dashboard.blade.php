@if (session('success'))
    <div id="alert-success" class="alert alert-success"
        style="transition: transform 0.5s cubic-bezier(0.075, 0.82, 0.165, 1); transform: translateX(150%);">
        <i class="mr-2 align-middle icon-sm mdi mdi-check"></i>{{ session('success') }}
    </div>
    <script>
        let alert_success = document.getElementById('alert-success');
        setTimeout(() => {
            alert_success.style.transform = 'translateX(0)';
        }, 1000);
        setTimeout(() => {
            alert_success.style.transform = 'translateX(150%)';
            setTimeout(() => {
                alert_success.style.display = 'none';
            }, 500);
        }, 6000);
    </script>
@endif
<div id="main" class="bg-gray-800 dark:bg-gray-900 p-6 lg:p-8" style="padding-top: 0rem;">
    <button id="add-project-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 ml-2 rounded"
        style="float: right; margin-top: 10px;">Add Project</button>

    <form class="mb-4">
        <label for="filter_project" class="block text-gray-300 dark:text-gray-400">Filter by Project</label>
        <div class="flex mb-2">
            <div class="mr-2">
                <input type="text" id="filter_project" name="filter_project"
                    class="w-full border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-700 text-gray-300 dark:text-gray-400">
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Filter</button>
        </div>

    </form>



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


            @foreach ($projects as $project)
                <tr class="bg-gray-700 dark:bg-gray-800">
                    <td class="py-4 px-6 text-gray-300 dark:text-gray-400">{{ $project->id }}</td>
                    <td class="py-4 px-6 text-gray-300 dark:text-gray-400">{{ $project->project_name }}</td>
                    <td class="py-4 px-6 text-gray-300 dark:text-gray-400">{{ $project->domain_name }}</td>
                    <td class="py-4 px-6 text-gray-300 dark:text-gray-400">{{ $project->created_at }}</td>

                    <td class="py-4 px-6 text-gray-300 dark:text-gray-400">
                        <span id="full-api-key" style="display: none;">{{ $project->project_api_key }}</span>
                        <span
                            id="short-api-key">{{ substr($project->project_api_key, 0, 5) . str_repeat('*', 3) }}</span>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 ml-2 rounded w-20"
                            onclick="copyApiKey('{{ $project->project_api_key }}')">Copy</button>
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{ route('logs') . '/' . $project->project_api_key }}">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded w-20 mb-2">Logs
                            </button>
                        </a>

                        <button
                            class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded w-20">Delete</button>

                    </td>


                </tr>
            @endforeach
        <tbody>
</div>

<div id="popup" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="bg-gray-900 p-6 lg:p-8 relative w-4/5">
        <button id="close-btn" type="button"
            class="absolute top-4 right-4 bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded">Close</button>

        <form method="POST" action="/project">

            @csrf
            <div class="mb-4">
                <label for="project_name" class="block text-gray-400">Project Name</label>
                <input type="text" id="project_name" name="project_name"
                    class="w-full border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-800 text-white"
                    required>
            </div>
            <div class="mb-4">
                <label for="domain_name" class="block text-gray-400">Domain Name</label>
                <input type="text" id="domain_name" name="domain_name"
                    class="w-full border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-800 text-white"
                    required>
            </div>
            <div class="mb-4">
                <label for="api_key" class="block text-gray-400">Telegram Bot API Key</label>
                <input type="text" id="api_key" name="api_key"
                    class="w-full border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-800 text-white"
                    required>
            </div>
            <div class="mb-4">
                <label for="channel_id" class="block text-gray-400">Telegram Channel ID</label>
                <input type="text" id="channel_id" name="channel_id"
                    class="w-full border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-800 text-white"
                    required>
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Submit</button>
        </form>
    </div>
</div>


<script>
    const addProjectBtn = document.getElementById('add-project-btn');
    const closeBtn = document.getElementById('close-btn');
    const popup = document.getElementById('popup');

    addProjectBtn.addEventListener('click', function() {
        popup.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', function() {
        popup.classList.add('hidden');
    });

    //copy function
    function copyApiKey(apiKey) {

        navigator.clipboard.writeText(apiKey)
            .then(function() {
                alert("API key copied to clipboard!");
            })
            .catch(function(error) {
                console.error("Unable to copy API key: ", error);
            });
    }
</script>

<style>
    /* Additional styles for the popup */
    #popup {
        background-color: rgba(0, 0, 0, 0.8);
        /* Darken the background */
    }

    #popup>div {
        width: 50%;
        max-width: 600px;
    }

    #popup form {
        margin-top: 20px;
    }
</style>
