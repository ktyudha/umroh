<section class="mt-4">
    <h6 class="text-muted mb-3">Services</h6>

    <div class="flex items-center">
        <input type="checkbox" id="services_read" name="services_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('services read') or $role->name === 'superadmin') checked @endif>

        <label for="services_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read services
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="services_create" name="services_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('services create') or $role->name === 'superadmin') checked @endif>

        <label for="services_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create services
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="services_update" name="services_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('services update') or $role->name === 'superadmin') checked @endif>

        <label for="services_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit services
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="services_delete" name="services_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('services delete') or $role->name === 'superadmin') checked @endif>

        <label for="services_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete services
        </label>
    </div>

</section>
