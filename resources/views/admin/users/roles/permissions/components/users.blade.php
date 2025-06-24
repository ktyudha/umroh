<section class="mt-4">
    <h6 class="text-muted mb-3">Users</h6>

    <div class="flex items-center">
        <input type="checkbox" id="users_read" name="users_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('users read') or $role->name === 'superadmin') checked @endif>

        <label for="users_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read users
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="users_create" name="users_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('users create') or $role->name === 'superadmin') checked @endif>

        <label for="users_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create users
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="users_update" name="users_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('users update') or $role->name === 'superadmin') checked @endif>

        <label for="users_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit users
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="users_delete" name="users_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('users delete') or $role->name === 'superadmin') checked @endif>

        <label for="users_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete users
        </label>
    </div>

</section>
