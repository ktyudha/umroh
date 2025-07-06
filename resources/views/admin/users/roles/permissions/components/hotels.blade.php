<section class="mt-4">
    <h6 class="text-muted mb-3">Hotels</h6>

    <div class="flex items-center">
        <input type="checkbox" id="hotels_read" name="hotels_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('hotels read') or $role->name === 'superadmin') checked @endif>

        <label for="hotels_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read hotels
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="hotels_create" name="hotels_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('hotels create') or $role->name === 'superadmin') checked @endif>

        <label for="hotels_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create hotels
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="hotels_update" name="hotels_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('hotels update') or $role->name === 'superadmin') checked @endif>

        <label for="hotels_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit hotels
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="hotels_delete" name="hotels_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('hotels delete') or $role->name === 'superadmin') checked @endif>

        <label for="hotels_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete hotels
        </label>
    </div>

</section>
