<section class="mt-4">
    <h6 class="text-muted mb-3">Galleries</h6>

    <div class="flex items-center">
        <input type="checkbox" id="galleries_read" name="galleries_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('galleries read') or $role->name === 'superadmin') checked @endif>

        <label for="galleries_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read galleries
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="galleries_create" name="galleries_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('galleries create') or $role->name === 'superadmin') checked @endif>

        <label for="galleries_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create galleries
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="galleries_update" name="galleries_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('galleries update') or $role->name === 'superadmin') checked @endif>

        <label for="galleries_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit galleries
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="galleries_delete" name="galleries_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('galleries delete') or $role->name === 'superadmin') checked @endif>

        <label for="galleries_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete galleries
        </label>
    </div>

</section>
