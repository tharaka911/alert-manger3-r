<div class="bg-gray-800 dark:bg-gray-900 p-6 lg:p-8" style="padding-top: 0rem;">
    <form class="mb-4">
        <label for="filter_severity" class="block text-gray-300 dark:text-gray-400">Filter by Severity Level</label>
        <div class="flex mb-2">
            <div class="mr-2">

                <select id="filter_severity" name="filter_severity"
                    class="w-full border-gray-700 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-700 text-gray-300 dark:text-gray-400">
                    <option value="">All</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">Filter</button>
        </div>
    </form>

    <table class="min-w-full divide-y divide-gray-700 dark:divide-gray-600">
        <thead>
            <tr>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">Log ID</th>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">Project ID</th>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">Severity Level</th>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">Message Content</th>
                <th class="py-3 px-4 text-left text-gray-300 dark:text-gray-400">Generated Time</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($logs as $log)
                <tr class="bg-gray-700 dark:bg-gray-800">
                    <td class="py-4 px-6 text-gray-300 dark:text-gray-400">{{ $log->id }}</td>
                    <td class="py-4 px-6 text-gray-300 dark:text-gray-400">{{ $log->project_id }}</td>
                    <td class="py-4 px-6 text-gray-300 dark:text-gray-400">{{ $log->severity_level }}</td>
                    <td class="py-4 px-6 text-gray-300 dark:text-gray-400">{{ $log->msg_content }}</td>
                    <td class="py-4 px-6 text-gray-300 dark:text-gray-400">{{ $log->created_at }}</td>
                </tr>
            @endforeach
            <!-- Display pagination links -->
            {{ $logs->links() }}


        </tbody>
    </table>
</div>
