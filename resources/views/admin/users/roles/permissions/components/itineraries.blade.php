<section class="mt-4">
    <h6 class="text-muted mb-3">Itineraries</h6>

    <div class="flex items-center">
        <input type="checkbox" id="itineraries_read" name="itineraries_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('itineraries read') or $role->name === 'superadmin') checked @endif>

        <label for="itineraries_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read itineraries
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="itineraries_create" name="itineraries_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('itineraries create') or $role->name === 'superadmin') checked @endif>

        <label for="itineraries_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create itineraries
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="itineraries_update" name="itineraries_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('itineraries update') or $role->name === 'superadmin') checked @endif>

        <label for="itineraries_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit itineraries
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="itineraries_delete" name="itineraries_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('itineraries delete') or $role->name === 'superadmin') checked @endif>

        <label for="itineraries_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete itineraries
        </label>
    </div>

</section>
