<section class="mt-4">
    <h6 class="text-muted mb-3">Transportation trips</h6>

    <div class="flex items-center">
        <input type="checkbox" id="transportation_trips_read" name="transportation_trips_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('transportation trips read') or $role->name === 'superadmin') checked @endif>

        <label for="transportation_trips_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read transportation trips
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="transportation_trips_create" name="transportation_trips_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('transportation trips create') or $role->name === 'superadmin') checked @endif>

        <label for="transportation_trips_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create transportation trips
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="transportation_trips_update" name="transportation_trips_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('transportation trips update') or $role->name === 'superadmin') checked @endif>

        <label for="transportation_trips_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit transportation trips
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="transportation_trips_delete" name="transportation_trips_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('transportation trips delete') or $role->name === 'superadmin') checked @endif>

        <label for="transportation_trips_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete transportation trips
        </label>
    </div>

</section>
