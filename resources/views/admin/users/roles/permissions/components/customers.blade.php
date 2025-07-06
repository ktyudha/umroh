<section class="mt-4">
    <h6 class="text-muted mb-3">Customers</h6>

    <div class="flex items-center">
        <input type="checkbox" id="customers_read" name="customers_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('customers read') or $role->name === 'superadmin') checked @endif>

        <label for="customers_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read customers
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="customers_create" name="customers_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('customers create') or $role->name === 'superadmin') checked @endif>

        <label for="customers_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create customers
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="customers_update" name="customers_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('customers update') or $role->name === 'superadmin') checked @endif>

        <label for="customers_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit customers
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="customers_delete" name="customers_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('customers delete') or $role->name === 'superadmin') checked @endif>

        <label for="customers_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete customers
        </label>
    </div>

</section>
